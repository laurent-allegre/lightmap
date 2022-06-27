<?php

namespace App\Repository;

use App\Entity\MiseEnSituation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MiseEnSituation>
 *
 * @method MiseEnSituation|null find($id, $lockMode = null, $lockVersion = null)
 * @method MiseEnSituation|null findOneBy(array $criteria, array $orderBy = null)
 * @method MiseEnSituation[]    findAll()
 * @method MiseEnSituation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MiseEnSituationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MiseEnSituation::class);
    }

    public function add(MiseEnSituation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(MiseEnSituation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return MiseEnSituation[] Returns an array of MiseEnSituation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MiseEnSituation
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
