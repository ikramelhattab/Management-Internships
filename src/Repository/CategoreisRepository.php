<?php

namespace App\Repository;

use App\Entity\Categoreis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Categoreis|null find($id, $lockMode = null, $lockVersion = null)
 * @method Categoreis|null findOneBy(array $criteria, array $orderBy = null)
 * @method Categoreis[]    findAll()
 * @method Categoreis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoreisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categoreis::class);
    }

    // /**
    //  * @return Categoreis[] Returns an array of Categoreis objects
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
    public function findOneBySomeField($value): ?Categoreis
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
