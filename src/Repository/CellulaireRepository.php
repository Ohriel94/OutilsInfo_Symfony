<?php

namespace App\Repository;

use App\Entity\Cellulaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cellulaire>
 *
 * @method Cellulaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cellulaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cellulaire[]    findAll()
 * @method Cellulaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CellulaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cellulaire::class);
    }

//    /**
//     * @return Cellulaire[] Returns an array of Cellulaire objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Cellulaire
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
