<?php

namespace App\Repository;

use App\Entity\Pfa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Pfa|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pfa|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pfa[]    findAll()
 * @method Pfa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PfaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pfa::class);
    }

    // /**
    //  * @return Pfa[] Returns an array of Pfa objects
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
    public function findOneBySomeField($value): ?Pfa
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
