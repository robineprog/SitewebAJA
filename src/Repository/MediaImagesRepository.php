<?php

namespace App\Repository;

use App\Entity\MediaImages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MediaImages|null find($id, $lockMode = null, $lockVersion = null)
 * @method MediaImages|null findOneBy(array $criteria, array $orderBy = null)
 * @method MediaImages[]    findAll()
 * @method MediaImages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MediaImagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MediaImages::class);
    }

    // /**
    //  * @return MediaImages[] Returns an array of MediaImages objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MediaImages
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
