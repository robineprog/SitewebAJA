<?php

namespace App\Repository;

use App\Entity\CategorieArticlesBoutique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategorieArticlesBoutique|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieArticlesBoutique|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieArticlesBoutique[]    findAll()
 * @method CategorieArticlesBoutique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieArticlesBoutiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieArticlesBoutique::class);
    }

    // /**
    //  * @return CategorieArticlesBoutique[] Returns an array of CategorieArticlesBoutique objects
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
    public function findOneBySomeField($value): ?CategorieArticlesBoutique
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
