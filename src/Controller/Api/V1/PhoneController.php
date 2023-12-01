<?php

namespace App\Controller\Api\V1;

use App\Repository\PhoneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class PhoneController extends AbstractController
{
    #[Route('/api-v1/phone', name: 'api_v1_phone', methods: ['GET'])]
    public function getAllPhones(PhoneRepository $phoneRepository): JsonResponse
    {
        $phones = $phoneRepository->findAll();

        // Ignore attributes of related entities
        return $this->json($phones, 200, [], [
            AbstractNormalizer::IGNORED_ATTRIBUTES => [
                'brand',
                'images',
                'phones',
            ]
        ]);
    }
}
