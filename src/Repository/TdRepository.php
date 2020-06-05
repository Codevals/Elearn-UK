<?php

namespace App\Repository;

use App\Entity\Cours;
use App\Entity\Enseignant;
use App\Entity\Td;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Td|null find($id, $lockMode = null, $lockVersion = null)
 * @method Td|null findOneBy(array $criteria, array $orderBy = null)
 * @method Td[]    findAll()
 * @method Td[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TdRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Td::class);
    }

    /**
    * @return Td[] Returns an array of Td objects
    */

    public function findTdsByCours(Cours $cours)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.cours = :val')
            ->setParameter('val', $cours)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @param Cours $cours
     * @param Enseignant $enseignant
     * @return mixed
     */
    public function findTdsByCoursForEnseignant(Cours $cours, Enseignant $enseignant)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.cours = :valCours')
            ->andWhere('t.enseignant = :valEnseignant')
            ->setParameter('valCours', $cours)
            ->setParameter('valEnseignant', $enseignant)
            ->orderBy('t.id', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }

    // /**
    //  * @return Td[] Returns an array of Td objects
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
    public function findOneBySomeField($value): ?Td
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
