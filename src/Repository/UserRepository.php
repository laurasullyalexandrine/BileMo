<?php

namespace App\Repository;

use App\Entity\User;
use App\Entity\Client;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<User>
 *
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function findUsersByClient(Client $client, int $page, int $maxResult = 10): ?array
    {
        $result = [];
        $query = $this->createQueryBuilder('u')
            ->addSelect('c')
            ->leftJoin('u.client', 'c')
            ->andWhere('c.slug = :slug')
            ->setParameter('slug', $client->getSlug())
            ->orderBy('u.created_at', 'DESC')
            ->setMaxResults($maxResult)
            ->setFirstResult(($page * $maxResult) - $maxResult);
            
            $query->getQuery()
                ->getResult();

        $paginator = new Paginator($query);
        $data = $paginator->getQuery()->getResult();

        // Calculate the number of pages
        $pages =  ceil($paginator->count() / $maxResult);

        // Check that there is data
        if (empty($data)) {
            return $result;
        } 

        return $data;
    }
}
