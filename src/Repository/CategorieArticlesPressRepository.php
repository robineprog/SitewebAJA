<?php

namespace App\Repository;

use App\Entity\CategorieArticlesPress;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategorieArticlesPress|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieArticlesPress|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieArticlesPress[]    findAll()
 * @method CategorieArticlesPress[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieArticlesPressRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieArticlesPress::class);
    }

    // /**
    //  * @return CategorieArticlesPress[] Returns an array of CategorieArticlesPress objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CategorieArticlesPress
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
