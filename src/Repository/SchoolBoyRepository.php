<?php

namespace App\Repository;

use App\Entity\SchoolBoy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SchoolBoy|null find($id, $lockMode = null, $lockVersion = null)
 * @method SchoolBoy|null findOneBy(array $criteria, array $orderBy = null)
 * @method SchoolBoy[]    findAll()
 * @method SchoolBoy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SchoolBoyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SchoolBoy::class);
    }

//    /**
//     * @return SchoolBoy[] Returns an array of SchoolBoy objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SchoolBoy
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
