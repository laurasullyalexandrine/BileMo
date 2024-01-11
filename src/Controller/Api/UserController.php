<?php

namespace App\Controller\Api;

use App\Entity\User;
use App\Entity\Client;
use OpenApi\Annotations as OA;
use App\Repository\UserRepository;
use App\Service\VersioningService;
use App\Repository\ClientRepository;
use JMS\Serializer\SerializerInterface;
use Doctrine\ORM\EntityManagerInterface;
use JMS\Serializer\SerializationContext;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Contracts\Cache\TagAwareCacheInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
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
        private VersioningService $versioningService,
        private TokenStorageInterface $token,
    ) {
    }

    /**
     * This method retrieves all the users of a client.
     *
     * @OA\Get(
     *     path="/api/users",
     *     summary="Retrieve user list",
     *     @OA\Response(
     *         response=200,
     *         description="Returns the list of users",
     *         @OA\JsonContent(
     *            type="array",
     *            @OA\Items(ref=@Model(type=User::class))
     *         )
     *     )
     * )
     * @OA\Parameter(
     *     name="page",
     *     in="query",
     *     description="The page you want to retrieve",
     *     @OA\Schema(type="int")
     * )
     * 
     * @OA\Parameter(
     *     name="limit",
     *     in="query",
     *     description="The number of elements to be retrieved",
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

        
        // Road access control
        if ($client !== $this->token->getToken()->getUser()) {
            throw new NotFoundHttpException("Aucune donnée trouvée.");
        }

        // Recover page perimeter from url
        $page = $request->query->getInt('page', 1);
        $limit = $request->query->getInt('limit', UserRepository::DEFAULT_LIMIT);

        // Create cache name
        $idCache =  "getAllUsers-p-" . $page .'l-' . $limit;

        // Caching data
        $users = $this->cache->get($idCache, function (ItemInterface $item) use ($userRepository, $client, $page, $limit) {
            echo ("PAS ENCORE EN CACHE");
            $item->tag("usersCache");
            return $userRepository->findUsersByClient($client, $page, $limit);
        });

        // Retrieve API version
        $version = $this->versioningService->getVersion();

        $context = SerializationContext::create()->setAttribute("client", true);

        // Edit version
        $context->setVersion($version);

        $jsonUsers = $this->serializer->serialize($users, 'json', $context);

        return new JsonResponse($jsonUsers, Response::HTTP_OK, [], true);
    }

    #[Route('/users/{slug}', name: 'create_user', methods: ['POST'])]
    public function createUser(
        Request $request,
        Client $client
    ): JsonResponse {

        if ($client !== $this->token->getToken()->getUser()) {
            throw new AccessDeniedHttpException("Accès refusé: Vous n'êtes pas autorisé à effectuer cette action.");
        }

        // Retrieve data received from the query
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

        // Check for errors during form validation
        $errors = $this->validator->validate($user);
        if ($errors->count() > 0) {
            return new JsonResponse(
                $this->serializer->serialize($errors, 'json'),
                JsonResponse::HTTP_BAD_REQUEST,
                [],
                true
            );
        }
        // If no error, register new user in DB
        $this->manager->persist($user);
        $this->manager->flush();

        // Bypassing the circular reference
        $context = SerializationContext::create()->setAttribute("client", true);
        $jsonUser = $this->serializer->serialize($user, 'json', $context);

        // Add verification url
        $location = $this->urlGenerator->generate('api_user', ['slug' => $client->getSlug(), 'id' => $user->getId()], UrlGeneratorInterface::ABSOLUTE_URL);

        return new JsonResponse($jsonUser, Response::HTTP_CREATED, ["Location" => $location], true);
    }


    #[Route('/users/{slug}/{id}', name: 'user', methods: ['GET'])]
    public function getOneUser(
        Request $request,
        User $user,
        SerializerInterface $serializer,
    ): JsonResponse {

        $attributes = $request->attributes;
        $slug = $attributes->get('slug');
        $client = $this->clientRepository->findOneBySlug($slug);

        if ($client !== $this->token->getToken()->getUser()) {
            throw new NotFoundHttpException("Aucune donnée trouvée.");
        }

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

        $attributes = $request->attributes;
        $slug = $attributes->get('slug');
        $client = $this->clientRepository->findOneBySlug($slug);
        
        if ($client !== $this->token->getToken()->getUser()) {
            throw new AccessDeniedHttpException("Accès refusé: Vous n'êtes pas autorisé à effectuer cette action.");
        }
        // Retrieve data received from the query
        $newUser = $serializer->deserialize($request->getContent(), User::class, 'json');

        $option = ['cost' => User::HASH_COST];

        // Edit user
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

        // Customer recovery
        $clientSlug = $content["client_slug"] ?? null;
        $client = $this->clientRepository->findOneBySlug($clientSlug);

        // Check that the right customer is connected
        if (!$client) {
            throw new HttpException(402, 'Client non trouvé. Merci de vérifier vos données.');
        }

        $user->setClient($client);

        $this->manager->persist($user);
        $this->manager->flush();

        // Empty cache
        $this->cache->invalidateTags(["usersCache"]);

        return new JsonResponse(null, JsonResponse::HTTP_NO_CONTENT);
    }


    #[Route('/users/{slug}/{id}', name: 'delete_user', methods: ['DELETE'])]
    public function deleteUser(
        Request $request,
        User $user): JsonResponse
    {
        $attributes = $request->attributes;
        $slug = $attributes->get('slug');
        $client = $this->clientRepository->findOneBySlug($slug);
        
        if ($client !== $this->token->getToken()->getUser()) {
            throw new AccessDeniedHttpException("Accès refusé: Vous n'êtes pas autorisé à effectuer cette action.");
        }

        $this->cache->invalidateTags(["usersCache"]);

        $this->manager->remove($user);
        $this->manager->flush();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
