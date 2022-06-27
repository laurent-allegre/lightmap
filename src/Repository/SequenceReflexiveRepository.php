<?php

namespace App\Repository;

use App\Entity\SequenceReflexive;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SequenceReflexive>
 *
 * @method SequenceReflexive|null find($id, $lockMode = null, $lockVersion = null)
 * @method SequenceReflexive|null findOneBy(array $criteria, array $orderBy = null)
 * @method SequenceReflexive[]    findAll()
 * @method SequenceReflexive[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SequenceReflexiveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SequenceReflexive::class);
    }

    public function add(SequenceReflexive $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SequenceReflexive $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return SequenceReflexive[] Returns an array of SequenceReflexive objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SequenceReflexive
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
