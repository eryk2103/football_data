<?php

namespace App\Repository;

use App\Entity\Fixture;
use App\Enum\FixtureStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Fixture>
 */
class FixtureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fixture::class);
    }

    public function findGtByDate(\DateTime $date, int $max = 10): array
    {
        return $this->createQueryBuilder('f')
            ->where('f.datetime > :date')
            ->setParameter('date', new \DateTime())
            ->orderBy('f.datetime', 'ASC')
            ->setMaxResults($max)
            ->getQuery()
            ->getResult();
    }

    public function findInvalid(int $max = 20): array
    {
        return $this->createQueryBuilder('f')
            ->where('f.status = :status')
            ->setParameter('status', FixtureStatus::SCHEDULED)
            ->andWhere('f.datetime < :date')
            ->setParameter('date', new \DateTime())
            ->orderBy('f.datetime', 'ASC')
            ->setMaxResults($max)
            ->getQuery()
            ->getResult();
    }

    public function findAllPaginated(int $page, int $limit): array
    {
        return $this->createQueryBuilder('f')
            ->setFirstResult(($page - 1) * $limit)
            ->setMaxResults($limit)
            ->orderBy('f.datetime', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function countAll(): int
    {
        return $this->createQueryBuilder('f')
            ->select('count(f.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }
    //    /**
    //     * @return Fixture[] Returns an array of Fixture objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('f.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Fixture
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
