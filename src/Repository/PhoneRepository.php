<?php

namespace App\Repository;

use App\Entity\Phone;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Phone>
 *
 * @method Phone|null find($id, $lockMode = null, $lockVersion = null)
 * @method Phone|null findOneBy(array $criteria, array $orderBy = null)
 * @method Phone[]    findAll()
 * @method Phone[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhoneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Phone::class);
    }

    public function findAllWithPagination(int $page, int $maxResult = 10): ?array
    {
        $result = [];

        $query = $this->createQueryBuilder('p')
            ->setMaxResults($maxResult)
            ->setFirstResult(($page * $maxResult) - $maxResult);

        $query->getQuery()
            ->getResult();

        $pagination = new Paginator($query);
        $data = $pagination->getQuery()->getResult();

        if (empty($data)) {
            return $result;
        }

        return $data;
    }
}

