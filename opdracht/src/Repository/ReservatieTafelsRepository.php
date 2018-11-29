<?php

namespace App\Repository;

use App\Entity\ReservatieTafels;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ReservatieTafels|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReservatieTafels|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReservatieTafels[]    findAll()
 * @method ReservatieTafels[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReservatieTafelsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ReservatieTafels::class);
    }

    // /**
    //  * @return ReservatieTafels[] Returns an array of ReservatieTafels objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ReservatieTafels
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
