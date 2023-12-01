<?php

namespace App\Controller\Api\V1;

use App\Entity\Client;
use App\Repository\ClientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    public function __construct(private EntityManagerInterface $manager)
    {
    }

    #[Route('/api-v1/users', name: 'api_v1_users', methods: ['GET'])]
    public function getAllUsers(): JsonResponse
    {

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/Api/V1/UserController.php',
        ]);
    }

    #[Route('/api-v1/create-user/{client_name}', name: 'api_v1_create_user', methods: ['POST'])]
    public function createUser(
        Request $request,
        SerializerInterface $serializer,
        #[MapEntity(mapping: ['client_name' => 'name'])] Client $client
    ): JsonResponse {
        $user = $serializer->deserialize($request->getContent(), User::class, 'json');
        $user->setClient($client);

        $this->manager->persist($user);
        $this->manager->flush();

        return $this->json($user, 200, [], [
            AbstractNormalizer::IGNORED_ATTRIBUTES => [
                'client',
            ]
        ]);
    }
}
