<?php

namespace App\Controller\Api;

use App\Entity\Phone;
use App\Repository\PhoneRepository;
use App\Service\VersioningService;
use JMS\Serializer\SerializerInterface;
use JMS\Serializer\SerializationContext;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Contracts\Cache\TagAwareCacheInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use OpenApi\Annotations as OA;
use Nelmio\ApiDocBundle\Annotation\Model;

#[Route('/api', name: 'api_', methods: ['GET'])]
class PhoneController extends AbstractController
{
    public function __construct(
        private SerializerInterface $serializer,
        private VersioningService $versioningService,
        private TagAwareCacheInterface $cache,
    ) {
    }

    /**
     * This method recovers all BileMo smartphones.
     *
     * @OA\Get(
     *     path="/api/phones",
     *     summary="Retrieve list of smartphones",
     *     @OA\Response(
     *         response=200,
     *         description="Returns a list of smartphones",
     *         @OA\JsonContent(
     *            type="array",
     *            @OA\Items(ref=@Model(type=Phone::class))
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
     * @OA\Tag(name="Phones")
     * 
     * @param PhoneRepository $phoneRepository
     * @param Request $request
     * @param TagAwareCacheInterface $cache
     * @return JsonResponse
     */
    #[Route('/phones', name: 'phones', methods: ['GET'])]
    public function getAllPhones(
        PhoneRepository $phoneRepository,
        Request $request
    ): JsonResponse {

        $page = $request->query->getInt('page', 1);
        $limit = $request->query->getInt('limit', PhoneRepository::DEFAULT_LIMIT);

        // Caching
        $idCache =  "getAllPhones-p-" . $page .'l-' . $limit;

        $phones = $this->cache->get($idCache, function (ItemInterface $item) use ($phoneRepository, $page, $limit) {
            echo ("PAS ENCORE EN CACHE");
            $item->tag("phonesCache");
            return $phoneRepository->findAllWithPagination($page, $limit);
        });

        // Retrieve API version
        $version = $this->versioningService->getVersion();

        // Bypassing the circular reference
        $attributesToIgnore = ["brand", "images", "phones"];
        foreach ($attributesToIgnore as $attribute) {
            $context = SerializationContext::create()->setAttribute($attribute, true);
        }

        // Edit version
        $context->setVersion($version);

        // Empty cache
        $this->cache->invalidateTags(["usersCache"]);
        
        $jsonPhones = $this->serializer->serialize($phones, 'json', $context);

        return new JsonResponse($jsonPhones, Response::HTTP_OK, [], true);
    }


    #[Route('/phones/{slug}/{color}', name: 'phone', methods: ['GET'])]
    public function getPhone(Phone $phone): JsonResponse
    {
        $version = $this->versioningService->getVersion();

        $attributesToIgnore = ["brand", "images", "phones"];
        foreach ($attributesToIgnore as $attribute) {
            $context = SerializationContext::create()->setAttribute($attribute, true);
        }

        $context->setVersion($version);
        
        $jsonPhone = $this->serializer->serialize($phone, 'json', $context);

        return new JsonResponse($jsonPhone, Response::HTTP_OK, [], true);
    }
}
