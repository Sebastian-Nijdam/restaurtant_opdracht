<?php

namespace App\Repository;

use App\Entity\OpeningsTijden;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OpeningsTijden|null find($id, $lockMode = null, $lockVersion = null)
 * @method OpeningsTijden|null findOneBy(array $criteria, array $orderBy = null)
 * @method OpeningsTijden[]    findAll()
 * @method OpeningsTijden[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OpeningsTijdenRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OpeningsTijden::class);
    }

    // /**
    //  * @return OpeningsTijden[] Returns an array of OpeningsTijden objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OpeningsTijden
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
