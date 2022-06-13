<?php

namespace App\Repository;

use App\Entity\PDossier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PDossier|null find($id, $lockMode = null, $lockVersion = null)
 * @method PDossier|null findOneBy(array $criteria, array $orderBy = null)
 * @method PDossier[]    findAll()
 * @method PDossier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PDossierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PDossier::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(PDossier $entity, bool $flush = true): void
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
    public function remove(PDossier $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return PDossier[] Returns an array of PDossier objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PDossier
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    // public function SelectOrganisme($organisme_id)
    // {
    //     $conn = $this->getEntityManager()->getConnection();

    //     $sql = 'SELECT id, dossier FROM pdossier 
    //     WHERE id_organisme_id = :organisme_id ';

    //             $stmt = $conn->prepare($sql);
    //             $resultSet = $stmt->executeQuery([':organisme_id' => $organisme_id]);


    //     return $resultSet->fetchAllAssociative();
    // }
}
