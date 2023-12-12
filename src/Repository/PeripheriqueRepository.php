<?php

namespace App\Repository;

use App\Entity\Peripherique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Peripherique>
 *
 * @method Peripherique|null find($id, $lockMode = null, $lockVersion = null)
 * @method Peripherique|null findOneBy(array $criteria, array $orderBy = null)
 * @method Peripherique[]    findAll()
 * @method Peripherique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PeripheriqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Peripherique::class);
    }

//    /**
//     * @return Peripherique[] Returns an array of Peripherique objects
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

//    public function findOneBySomeField($value): ?Peripherique
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
