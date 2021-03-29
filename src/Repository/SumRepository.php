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
}
