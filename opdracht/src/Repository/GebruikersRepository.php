<?php

namespace App\Repository;

use App\Entity\Gebruikers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Gebruikers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gebruikers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gebruikers[]    findAll()
 * @method Gebruikers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GebruikersRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Gebruikers::class);
    }

    // /**
    //  * @return Gebruikers[] Returns an array of Gebruikers objects
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
    public function findOneBySomeField($value): ?Gebruikers
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
