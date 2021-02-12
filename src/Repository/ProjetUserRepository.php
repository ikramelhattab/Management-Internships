<?php

namespace App\Repository;

use App\Entity\ProjetUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ProjetUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProjetUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProjetUser[]    findAll()
 * @method ProjetUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjetUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProjetUser::class);
    }

    // /**
    //  * @return ProjetUser[] Returns an array of ProjetUser objects
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
    public function findOneBySomeField($value): ?ProjetUser
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
