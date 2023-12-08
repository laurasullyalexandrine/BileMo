<?php

namespace App\Controller\Api\V1;

use App\Entity\Phone;
use App\Repository\PhoneRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class PhoneController extends AbstractController
{
    #[Route('/api-v1/phones', name: 'api_v1_phones', methods: ['GET'])]
    public function getAllPhones(
        PhoneRepository $phoneRepository,
        Request $request
    ): JsonResponse {
        $page = $request->query->getInt('page', 1);
        $phones = $phoneRepository->findAllWithPagination($page);


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
