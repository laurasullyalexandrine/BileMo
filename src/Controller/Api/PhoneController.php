<?php

namespace App\Controller\Api;

use App\Entity\Phone;
use App\Repository\PhoneRepository;
use JMS\Serializer\SerializerInterface;
use JMS\Serializer\SerializationContext;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Contracts\Cache\TagAwareCacheInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PhoneController extends AbstractController
{
    public function __construct(private SerializerInterface $serializer,)
    {}


    #[Route('/api/phones', name: 'api_phones', methods: ['GET'])]
    public function getPhones(
        PhoneRepository $phoneRepository,
        Request $request,
        TagAwareCacheInterface $cache
    ): JsonResponse {
        
        $page = $request->query->getInt('page', 1);
        
        // Mettre en cache 
        $idCache =  "getPhones-" . $page;
        $phones = $cache->get($idCache, function(ItemInterface $item) use ($phoneRepository, $page) {
            $item->tag("phonesCache");
            return $phoneRepository->findAllWithPagination($page);
        }); 

        // Contourner l'erreur de référence circulaire
        $attributesToIgnore = ["brand", "images", "phones"];
        foreach ($attributesToIgnore as $attribute) {
            $context = SerializationContext::create()->setAttribute($attribute, true);
        }

        $jsonPhones = $this->serializer->serialize($phones, 'json', $context);

        return new JsonResponse($jsonPhones, Response::HTTP_OK, [], true);
    }


    #[Route('/api/phone/{slug}/{color}', name: 'api_phone', methods: ['GET'])]
    public function getPhone(Phone $phone): JsonResponse
    {
        // Contourner l'erreur de référence circulaire
        $attributesToIgnore = ["brand", "images", "phones"];
        foreach ($attributesToIgnore as $attribute) {
            $context = SerializationContext::create()->setAttribute($attribute, true);
        }

        $jsonPhone = $this->serializer->serialize($phone, 'json', $context);

        return new JsonResponse($jsonPhone, Response::HTTP_OK, [], true);
    }
}
