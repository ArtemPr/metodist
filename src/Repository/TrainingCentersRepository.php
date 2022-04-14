<?php

namespace App\Repository;

use App\Entity\TrainingCenters;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TrainingCenters|null find($id, $lockMode = null, $lockVersion = null)
 * @method TrainingCenters|null findOneBy(array $criteria, array $orderBy = null)
 * @method TrainingCenters[]    findAll()
 * @method TrainingCenters[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrainingCentersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TrainingCenters::class);
    }

    public function add(TrainingCenters $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function remove(TrainingCenters $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
}
