<?php

namespace App\Repository;

use App\Entity\Tafels;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Tafels|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tafels|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tafels[]    findAll()
 * @method Tafels[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TafelsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tafels::class);
    }

    // /**
    //  * @return Tafels[] Returns an array of Tafels objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tafels
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
