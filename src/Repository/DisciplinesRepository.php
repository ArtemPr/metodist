<?php

namespace App\Repository;

use App\Entity\Disciplines;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Disciplines|null find($id, $lockMode = null, $lockVersion = null)
 * @method Disciplines|null findOneBy(array $criteria, array $orderBy = null)
 * @method Disciplines[]    findAll()
 * @method Disciplines[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DisciplinesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Disciplines::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Disciplines $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Disciplines $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
}
