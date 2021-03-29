<?php

namespace App\Repository;

use App\Entity\Sum;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sum|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sum|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sum[]    findAll()
 * @method Sum[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SumRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sum::class);
    }

    // /**
    //  * @return Sum[] Returns an array of Sum objects
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
    public function findOneBySomeField($value): ?Sum
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
