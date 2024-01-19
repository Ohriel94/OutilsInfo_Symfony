<?php

namespace App\Repository;

use App\Entity\Gestionnaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @extends ServiceEntityRepository<Gestionnaire>
* @implements PasswordUpgraderInterface<Gestionnaire>
 *
 * @method Gestionnaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gestionnaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gestionnaire[]    findAll()
 * @method Gestionnaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GestionnaireRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gestionnaire::class);
    }

    /**
     * Used to upgrade (rehash) the gestionnaire's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $gestionnaire, string $newHashedPassword): void
    {
        if (!$gestionnaire instanceof Gestionnaire) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $gestionnaire::class));
        }

        $gestionnaire->setPassword($newHashedPassword);
        $this->getEntityManager()->persist($gestionnaire);
        $this->getEntityManager()->flush();
    }

//    /**
//     * @return Gestionnaire[] Returns an array of Gestionnaire objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Gestionnaire
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
