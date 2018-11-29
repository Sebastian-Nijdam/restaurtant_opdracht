<?php

namespace App\Repository;

use App\Entity\BestellingenGerecht;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BestellingenGerecht|null find($id, $lockMode = null, $lockVersion = null)
 * @method BestellingenGerecht|null findOneBy(array $criteria, array $orderBy = null)
 * @method BestellingenGerecht[]    findAll()
 * @method BestellingenGerecht[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BestellingenGerechtRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BestellingenGerecht::class);
    }

    // /**
    //  * @return BestellingenGerecht[] Returns an array of BestellingenGerecht objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BestellingenGerecht
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
