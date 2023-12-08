<?php

namespace App\Controller\Api\V1;

use App\Entity\User;
use App\Entity\Client;
use App\Repository\UserRepository;
use App\Repository\ClientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/api-v1', name: 'api_v1_', methods: ['GET'])]
class UserController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $manager,
        private UserRepository $userRepository,
        private ClientRepository $clientRepository,
        private ValidatorInterface $validator,
        private UrlGeneratorInterface $urlGenerator
    ) {
    }


    #[Route('/create-user/{slug}', name: 'create_user', methods: ['POST'])]
    public function createUser(
        Request $request,
        SerializerInterface $serializer,
        Client $client
    ): JsonResponse {
        $option = ['cost' => User::HASH_COST];
        $user = $serializer->deserialize($request->getContent(), User::class, 'json');
        $content = $request->toArray();
        $password = $content["password"];
        $user->setClient($client)
            ->setPassword(
                password_hash(
                    $password,
                    PASSWORD_BCRYPT,
                    $option,
                )
            );

        // Vérifier si il y a une erreur lors de la validation du formulaire
        $errors = $this->validator->validate($user);
        if ($errors->count() > 0) {
            return new JsonResponse(
                $serializer->serialize($errors, 'json'),
                JsonResponse::HTTP_BAD_REQUEST,
                [],
                true
            );
        }
        // Si pas d'erreur enregistrer le nouvel utilisateur en BDD
        $this->manager->persist($user);
        $this->manager->flush();

        // Contourner l'erreur circulaire
        $jsonUser = $this->json($user, 200, [], [
            AbstractNormalizer::IGNORED_ATTRIBUTES => [
                'client',
            ]
        ]);

        // Ajouter l'url de vérification 
        $location = $this->urlGenerator->generate('api_v1_user', ['slug' => $client->getSlug(), 'id' => $user->getId()], UrlGeneratorInterface::ABSOLUTE_URL);

        return new JsonResponse($jsonUser, Response::HTTP_CREATED, ["Location" => $location], true);
    }

    #[Route('/users/{slug}', name: 'users', methods: ['GET'])]
    public function getAllUsers(Client $client): JsonResponse
    {
        $users = $this->userRepository->findUsersByClient($client);

        return $this->json($users, 200, [], [
            AbstractNormalizer::IGNORED_ATTRIBUTES => [
                'client',
            ]
        ]);
    }

    #[Route('/user/{slug}/{id}', name: 'user', methods: ['GET'])]
    public function getOneUser(User $user): JsonResponse
    {
        return $this->json($user, 200, [], [
            AbstractNormalizer::IGNORED_ATTRIBUTES => [
                'client',
            ]
        ]);
    }


    #[Route('/update-user/{slug}/{id}', name: 'update_user', methods: ['PUT'])]
    public function updateUser(
        Request $request,
        SerializerInterface $serializer,
        User $user
    ): JsonResponse {

        $updateUser = $serializer->deserialize(
            $request->getContent(),
            User::class,
            'json',
            [AbstractNormalizer::OBJECT_TO_POPULATE => $user]
        );

        $content = $request->toArray();

        $clientSlug = $content["client_slug"] ?? null;
        $client = $this->clientRepository->findOneBySlug($clientSlug);

        if (!$client) {
            throw new HttpException(402, 'Client non trouvé. Merci de vérifier vos données.');
        }

        $updateUser->setClient($client);

        $this->manager->persist($updateUser);
        $this->manager->flush();
        return new JsonResponse(null, JsonResponse::HTTP_NO_CONTENT);
    }


    #[Route('/delete-user/{slug}/{id}', name: 'delete_user', methods: ['DELETE'])]
    public function deleteUser(User $user): JsonResponse
    {
        $this->manager->remove($user);
        $this->manager->flush();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
