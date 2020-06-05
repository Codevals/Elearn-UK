<?php

namespace App\Repository;

use App\Entity\CorrigeType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CorrigeType|null find($id, $lockMode = null, $lockVersion = null)
 * @method CorrigeType|null findOneBy(array $criteria, array $orderBy = null)
 * @method CorrigeType[]    findAll()
 * @method CorrigeType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CorrigeTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CorrigeType::class);
    }

    // /**
    //  * @return CorrigeType[] Returns an array of CorrigeType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CorrigeType
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
