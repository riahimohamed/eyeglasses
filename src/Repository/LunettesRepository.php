<?php

namespace App\Repository;

use App\Entity\Lunettes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Lunettes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lunettes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lunettes[]    findAll()
 * @method Lunettes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LunettesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lunettes::class);
    }

    /**
    * @return Lunettes[] Returns an array of Lunettes objects
    */
    public function search($query)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.name LIKE :val')
            ->orWhere('l.slug LIKE :val')
            ->orWhere('l.ref LIKE :val')
            ->setParameter('val', '%'.$query.'%')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findVueLimits()
    {
        return $this->createQueryBuilder('l')
            ->orWhere('l.type = :type')
            ->setParameter('type', 'vue')
            ->setMaxResults(3)
            ->setFirstResult(0)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findSoleilLimits()
    {
        return $this->createQueryBuilder('l')
            ->orWhere('l.type = :type')
            ->setParameter('type', 'soleil')
            ->setMaxResults(3)
            ->setFirstResult(0)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findContactLimits()
    {
        return $this->createQueryBuilder('l')
            ->orWhere('l.type = :type')
            ->setParameter('type', 'contact')
            ->setMaxResults(3)
            ->setFirstResult(0)
            ->getQuery()
            ->getResult()
        ;
    }
}
