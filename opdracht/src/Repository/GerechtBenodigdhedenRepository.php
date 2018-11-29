<?php

namespace App\Repository;

use App\Entity\GerechtBenodigdheden;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GerechtBenodigdheden|null find($id, $lockMode = null, $lockVersion = null)
 * @method GerechtBenodigdheden|null findOneBy(array $criteria, array $orderBy = null)
 * @method GerechtBenodigdheden[]    findAll()
 * @method GerechtBenodigdheden[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GerechtBenodigdhedenRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GerechtBenodigdheden::class);
    }

    // /**
    //  * @return GerechtBenodigdheden[] Returns an array of GerechtBenodigdheden objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GerechtBenodigdheden
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
