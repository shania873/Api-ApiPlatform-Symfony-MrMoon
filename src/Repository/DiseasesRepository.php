<?php

namespace App\Repository;

use App\Entity\Diseases;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Diseases>
 *
 * @method Diseases|null find($id, $lockMode = null, $lockVersion = null)
 * @method Diseases|null findOneBy(array $criteria, array $orderBy = null)
 * @method Diseases[]    findAll()
 * @method Diseases[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiseasesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Diseases::class);
    }

//    /**
//     * @return Diseases[] Returns an array of Diseases objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Diseases
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
