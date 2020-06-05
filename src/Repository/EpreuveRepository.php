<?php

namespace App\Repository;

use App\Entity\Epreuve;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Epreuve|null find($id, $lockMode = null, $lockVersion = null)
 * @method Epreuve|null findOneBy(array $criteria, array $orderBy = null)
 * @method Epreuve[]    findAll()
 * @method Epreuve[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EpreuveRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Epreuve::class);
    }

    /**
     * @return \Doctrine\ORM\Query, pour retourner les dernière epreuves uploader
     */
    public function findLatest()
    {
        return $this->createQueryBuilder('e')
            ->orderBy('e.id', 'ASC')
            ->getQuery()
            ;
    }

    // /**
    //  * @return Epreuve[] Returns an array of Epreuve objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Epreuve
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
