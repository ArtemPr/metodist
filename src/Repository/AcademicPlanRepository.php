<?php

namespace App\Repository;

use App\Entity\AcademicPlan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AcademicPlan|null find($id, $lockMode = null, $lockVersion = null)
 * @method AcademicPlan|null findOneBy(array $criteria, array $orderBy = null)
 * @method AcademicPlan[]    findAll()
 * @method AcademicPlan[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AcademicPlanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AcademicPlan::class);
    }

    public function add(AcademicPlan $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function remove(AcademicPlan $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
}
