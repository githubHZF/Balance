<?php

namespace App\Repository;

use App\Entity\Actif;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Actif|null find($id, $lockMode = null, $lockVersion = null)
 * @method Actif|null findOneBy(array $criteria, array $orderBy = null)
 * @method Actif[]    findAll()
 * @method Actif[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActifRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Actif::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Actif $entity, bool $flush = true): void
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
    public function remove(Actif $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return Actif[] Returns an array of Actif objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Actif
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function clickYear()
    {
        $conn = $this->getEntityManager()->getConnection();

                $sql = 'SELECT a.Titre, a.type , a.Libelle , a.Poste , b.Exer1 , a.Compte, be.Exer2 , (SELECT (COALESCE(b.Exer1, 0) - COALESCE(be.Exer2, 0))) AS Total
                        FROM actif a
                        LEFT JOIN (SELECT Poste , SUM(solde) AS Exer1 FROM balance  GROUP BY Poste) b ON b.Poste = a.Poste
                        LEFT JOIN (SELECT Compte , SUM(solde) AS Exer2 FROM balance WHERE debit = 0 GROUP BY compte) be ON be.Compte = a.Compte'; 

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery();


        return $resultSet->fetchAllAssociative();
    }

    public function clickOrganisme($organisme_id)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT a.Titre, a.type , a.Libelle , a.Poste , b.Exer1 , a.Compte, be.Exer2 , (SELECT (COALESCE(b.Exer1, 0) - COALESCE(be.Exer2, 0))) AS Total
                FROM actif a
                LEFT JOIN (SELECT Poste , SUM(solde) AS Exer1 FROM balance WHERE id_organisme_id  = :organisme_id GROUP BY Poste) b ON b.Poste = a.Poste
                LEFT JOIN (SELECT Compte , SUM(solde) AS Exer2 FROM balance WHERE debit = 0 AND id_organisme_id  = :organisme_id GROUP BY compte) be ON be.Compte = a.Compte';

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery([':organisme_id' => $organisme_id]);


        return $resultSet->fetchAllAssociative();
    }
    public function clickDossier($dossier_id)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT a.Titre, a.type , a.Libelle , a.Poste , b.Exer1 , a.Compte, be.Exer2 , (SELECT (COALESCE(b.Exer1, 0) - COALESCE(be.Exer2, 0))) AS Total
                FROM actif a
                LEFT JOIN (SELECT Poste , SUM(solde) AS Exer1 FROM balance WHERE id_dossier_id  = :dossier_id GROUP BY Poste) b ON b.Poste = a.Poste
                LEFT JOIN (SELECT Compte , SUM(solde) AS Exer2 FROM balance WHERE debit = 0 AND id_dossier_id  = :dossier_id GROUP BY compte) be ON be.Compte = a.Compte';

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery([':dossier_id' => $dossier_id]);


        return $resultSet->fetchAllAssociative();
    }

    public function clickSousDossier($sous_Dossier)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT a.Titre, a.type , a.Libelle , a.Poste , b.Exer1 , a.Compte, be.Exer2 , (SELECT (COALESCE(b.Exer1, 0) - COALESCE(be.Exer2, 0))) AS Total
        FROM actif a
        LEFT JOIN (SELECT Poste , SUM(solde) AS Exer1 FROM balance WHERE id_sous_dossier_id  = :sous_dossier_id GROUP BY Poste) b ON b.Poste = a.Poste
        LEFT JOIN (SELECT Compte , SUM(solde) AS Exer2 FROM balance WHERE debit = 0 AND id_sous_dossier_id  = :sous_dossier_id) be ON be.Compte = a.Compte;';

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery([':sous_dossier_id' => $sous_Dossier]);


        return $resultSet->fetchAllAssociative();
    }
}
