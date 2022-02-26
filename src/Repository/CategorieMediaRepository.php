<?php

namespace App\Repository;

use App\Entity\CategorieMedia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategorieMedia|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieMedia|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieMedia[]    findAll()
 * @method CategorieMedia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieMediaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieMedia::class);
    }

    // /**
    //  * @return CategorieMedia[] Returns an array of CategorieMedia objects
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
    public function findOneBySomeField($value): ?CategorieMedia
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
