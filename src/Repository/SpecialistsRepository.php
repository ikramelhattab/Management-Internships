<?php

namespace App\Repository;

use App\Entity\Specialists;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Specialists|null find($id, $lockMode = null, $lockVersion = null)
 * @method Specialists|null findOneBy(array $criteria, array $orderBy = null)
 * @method Specialists[]    findAll()
 * @method Specialists[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecialistsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Specialists::class);
    }

    // /**
    //  * @return Specialists[] Returns an array of Specialists objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Specialists
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
