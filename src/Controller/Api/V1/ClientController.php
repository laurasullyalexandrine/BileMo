<?php

namespace App\Controller\Api\V1;

use App\Entity\Client;
use App\Repository\ClientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/api-v1', name: 'api_v1_', methods: ['GET'])]
class ClientController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $manager,
        private UserPasswordHasherInterface $hasher,
        private ValidatorInterface $validator,
        private UrlGeneratorInterface $urlGenerator,
        private ClientRepository $clientRepository
    ) {
    }

    
    #[Route('/create-client/{slug}', name: 'create_client', methods: ['POST'])]
    public function create(
        Request $request,
        SerializerInterface $serializer
    ): JsonResponse {
        $client = $serializer->deserialize($request->getContent(), Client::class, 'json');
        $content = $request->toArray();
        $password = $content["password"];
        $client->setPassword(
            $this->hasher->hashPassword(
                $client,
                $password,
            )
        )
            ->setRoles(['ROLE_ADMIN']);

        // Vérifier si il y a une erreur lors de la validation du formulaire
        $errors = $this->validator->validate($client);
        if ($errors->count() > 0) {
            return new JsonResponse(
                $serializer->serialize($errors, 'json'),
                JsonResponse::HTTP_BAD_REQUEST,
                [],
                true
            );
        }
        // Si pas d'erreur enregistrer le nouveau client en BDD
        $this->manager->persist($client);
        $this->manager->flush();

        // Contourner l'erreur circulaire
        $jsonClient = $this->json($client, 200, [], [
            AbstractNormalizer::IGNORED_ATTRIBUTES => [
                'users',
            ]
        ]);

        // Ajouter l'url de vérification 
        $location = $this->urlGenerator->generate('api_v1_client', ['id' => $client->getId()], UrlGeneratorInterface::ABSOLUTE_URL);

        return new JsonResponse($jsonClient, Response::HTTP_CREATED, ["Location" => $location], true);
    }

    #[Route('/clients', name: 'clients', methods: ['GET'])]
    public function getAllUsers(): JsonResponse
    {
        $clients = $this->clientRepository->findAll();

        return $this->json($clients, 200, [], [
            AbstractNormalizer::IGNORED_ATTRIBUTES => [
                'users',
            ]
        ]);
    }

    #[Route('/client/{slug}', name: 'client', methods: ['GET'])]
    public function getOneUser(Client $client): JsonResponse
    {
        return $this->json($client, 200, [], [
            AbstractNormalizer::IGNORED_ATTRIBUTES => [
                'users',
            ]
        ]);
    }
}
