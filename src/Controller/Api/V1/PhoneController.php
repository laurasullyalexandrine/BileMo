<?php

namespace App\Controller\Api\V1;

use App\Entity\Phone;
use App\Repository\PhoneRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PhoneController extends AbstractController
{
    #[Route('/api-v1/phones', name: 'api_v1_phones', methods: ['GET'])]
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

    #[Route('/api-v1/phone/{slug}/{color}', name: 'api_v1_phone_slug', methods: ['GET'])]
    public function getPhone(Phone $phone): JsonResponse
    {
        // Ignore attributes of related entities
        return $this->json($phone, 200, [], [
            AbstractNormalizer::IGNORED_ATTRIBUTES => [
                'brand',
                'images',
                'phones',
            ]
        ]);
    }
}
