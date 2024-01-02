<?php

namespace App\Controller\Api;

use App\Entity\User;
use App\Entity\Client;
use App\Repository\UserRepository;
use App\Repository\ClientRepository;
use App\Service\VersioningService;
use Doctrine\ORM\EntityManagerInterface;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Contracts\Cache\TagAwareCacheInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use OpenApi\Annotations as OA;
use Nelmio\ApiDocBundle\Annotation\Model;

#[Route('/api', name: 'api_', methods: ['GET'])]
class UserController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $manager,
        private UserRepository $userRepository,
        private ClientRepository $clientRepository,
        private ValidatorInterface $validator,
        private UrlGeneratorInterface $urlGenerator,
        private TagAwareCacheInterface $cache,
        private SerializerInterface $serializer,
        private VersioningService $versioningService
    ) {
    }

    /**
     * Cette méthode permet de récupérer l'ensemble des utilisateurs d'un client.
     *
     * @OA\Get(
     *     path="/api/users",
     *     summary="Récupérer la liste des utilisateurs",
     *     @OA\Response(
     *         response=200,
     *         description="Renvoie la liste des utilisateurs",
     *         @OA\JsonContent(
     *            type="array",
     *            @OA\Items(ref=@Model(type=User::class))
     *         )
     *     )
     * )
     * @OA\Parameter(
     *     name="page",
     *     in="query",
     *     description="La page que l'on veut récupérer",
     *     @OA\Schema(type="int")
     * )
     * 
     * @OA\Parameter(
     *     name="limit",
     *     in="query",
     *     description="Le nombre d'éléments que l'on veut récupérer",
     *     @OA\Schema(type="int")
     * )
     * @OA\Tag(name="Users")
     *
     * @param Client $client
     * @param Request $request
     * @param UserRepository $userRepository
     * @return JsonResponse
     */
    #[Route('/users/{slug}', name: 'users', methods: ['GET'])]
    public function getAllUsers(
        Client $client,
        Request $request,
        UserRepository $userRepository
    ): JsonResponse {

        // Récupérer le parmètre page depuis l'url
        $page = $request->query->getInt('page', 1);

        // Créer le nom du cache
        $idCache =  "getAllUsers-" . $page;

        // Mettre les données en cache
        $users = $this->cache->get($idCache, function (ItemInterface $item) use ($userRepository, $client, $page) {
            echo ("PAS ENCORE EN CACHE");
            $item->tag("usersCache");
            return $userRepository->findUsersByClient($client, $page);
        });

        // Récupérer la version de l'API
        $version = $this->versioningService->getVersion();

        $context = SerializationContext::create()->setAttribute("client", true);

        // Editer la version
        $context->setVersion($version);

        $jsonUsers = $this->serializer->serialize($users, 'json', $context);

        return new JsonResponse($jsonUsers, Response::HTTP_OK, [], true);
    }

    #[Route('/users/{slug}', name: 'create_user', methods: ['POST'])]
    public function createUser(
        Request $request,
        Client $client
    ): JsonResponse {

        // Récupérer les données reçues de la requête
        $newUser = $this->serializer->deserialize($request->getContent(), User::class, 'json');

        $option = ['cost' => User::HASH_COST];

        $user = new User();
        $user->setFirstname($newUser->getFirstname())
            ->setLastname($newUser->getLastname())
            ->setCivility($newUser->getCivility())
            ->setPhone($newUser->getPhone())
            ->setEmail($newUser->getEmail())
            ->setPassword(
                password_hash(
                    $newUser->getPassword(),
                    PASSWORD_BCRYPT,
                    $option,
                )
            );
        $user->setClient($client);

        // Vérifier si il y a une erreur lors de la validation du formulaire
        $errors = $this->validator->validate($user);
        if ($errors->count() > 0) {
            return new JsonResponse(
                $this->serializer->serialize($errors, 'json'),
                JsonResponse::HTTP_BAD_REQUEST,
                [],
                true
            );
        }
        // Si pas d'erreur enregistrer le nouvel utilisateur en BDD
        $this->manager->persist($user);
        $this->manager->flush();

        // Contourner l'erreur circulaire
        $context = SerializationContext::create()->setAttribute("client", true);
        $jsonUser = $this->serializer->serialize($user, 'json', $context);

        // Ajouter l'url de vérification 
        $location = $this->urlGenerator->generate('api_user', ['slug' => $client->getSlug(), 'id' => $user->getId()], UrlGeneratorInterface::ABSOLUTE_URL);

        return new JsonResponse($jsonUser, Response::HTTP_CREATED, ["Location" => $location], true);
    }





    #[Route('/users/{slug}/{id}', name: 'user', methods: ['GET'])]
    public function getOneUser(
        User $user,
        SerializerInterface $serializer,
    ): JsonResponse {

        $version = $this->versioningService->getVersion();

        $context = SerializationContext::create()->setAttribute("client", true);

        $context->setVersion($version);

        $jsonUser = $serializer->serialize($user, 'json', $context);

        return new JsonResponse($jsonUser, Response::HTTP_OK, [], true);
    }


    #[Route('/users/{slug}/{id}', name: 'update_user', methods: ['PUT'])]
    public function updateUser(
        Request $request,
        SerializerInterface $serializer,
        User $user
    ): JsonResponse {

        // Récupérer les données reçues de la requête
        $newUser = $serializer->deserialize($request->getContent(), User::class, 'json');

        $option = ['cost' => User::HASH_COST];

        // Editer le user
        $user->setFirstname($newUser->getFirstname())
            ->setLastname($newUser->getLastname())
            ->setCivility($newUser->getCivility())
            ->setPhone($newUser->getPhone())
            ->setEmail($newUser->getEmail())
            ->setPassword(
                password_hash(
                    $newUser->getPassword(),
                    PASSWORD_BCRYPT,
                    $option,
                )
            );

        $errors = $this->validator->validate($user);
        if ($errors->count() > 0) {
            return new JsonResponse($serializer->serialize($errors, 'json'), JsonResponse::HTTP_BAD_REQUEST, [], true);
        }

        $content = $request->toArray();

        // Récupérer le client 
        $clientSlug = $content["client_slug"] ?? null;
        $client = $this->clientRepository->findOneBySlug($clientSlug);

        // Vérifier que le bon client est connecté
        if (!$client) {
            throw new HttpException(402, 'Client non trouvé. Merci de vérifier vos données.');
        }

        $user->setClient($client);

        $this->manager->persist($user);
        $this->manager->flush();

        // Vider la cache
        $this->cache->invalidateTags(["usersCache"]);

        return new JsonResponse(null, JsonResponse::HTTP_NO_CONTENT);
    }


    #[Route('/users/{slug}/{id}', name: 'delete_user', methods: ['DELETE'])]
    public function deleteUser(User $user): JsonResponse
    {
        $this->cache->invalidateTags(["usersCache"]);

        $this->manager->remove($user);
        $this->manager->flush();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
