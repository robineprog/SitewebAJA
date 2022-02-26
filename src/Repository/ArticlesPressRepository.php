<?php

namespace App\Repository;

use App\Entity\ArticlesPress;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArticlesPress|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticlesPress|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticlesPress[]    findAll()
 * @method ArticlesPress[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticlesPressRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticlesPress::class);
    }

    // /**
    //  * @return ArticlesPress[] Returns an array of ArticlesPress objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ArticlesPress
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
