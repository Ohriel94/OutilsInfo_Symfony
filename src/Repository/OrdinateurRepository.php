<?php

namespace App\Repository;

use App\Entity\Ordinateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Ordinateur>
 *
 * @method Ordinateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ordinateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ordinateur[]    findAll()
 * @method Ordinateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrdinateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ordinateur::class);
    }
    public function findOneById($id): ?Ordinateur
    {
        return $this->createQueryBuilder('ordinateur')
            ->andWhere('ordinateur.id = :val')
            ->setParameter('val', $id)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

//    /**
//     * @return Ordinateur[] Returns an array of Ordinateur objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Ordinateur
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
