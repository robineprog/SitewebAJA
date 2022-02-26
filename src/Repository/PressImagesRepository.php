<?php

namespace App\Repository;

use App\Entity\PressImages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PressImages|null find($id, $lockMode = null, $lockVersion = null)
 * @method PressImages|null findOneBy(array $criteria, array $orderBy = null)
 * @method PressImages[]    findAll()
 * @method PressImages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PressImagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PressImages::class);
    }

    // /**
    //  * @return PressImages[] Returns an array of PressImages objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PressImages
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
