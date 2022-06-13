<?php

namespace App\Repository;

use App\Entity\Cpc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Cpc|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cpc|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cpc[]    findAll()
 * @method Cpc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CpcRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cpc::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Cpc $entity, bool $flush = true): void
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
    public function remove(Cpc $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return Cpc[] Returns an array of Cpc objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Cpc
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function clickYear()
    {
        $conn = $this->getEntityManager()->getConnection();

            $sql = 'SELECT c.type, c.Grp , c.id , c.Libelle , c.Poste , b.Exer1 , c.Compte , be.Exer2 , (SELECT(b.Exer1 + COALESCE(be.Exer2, 0)))AS Total
                    FROM cpc c 
                    LEFT JOIN (SELECT Poste , SUM(solde) AS Exer1 FROM balance GROUP BY Poste) b ON b.Poste = c.Poste 
                    LEFT JOIN (SELECT Compte , SUM(solde) AS Exer2 FROM balance GROUP BY Compte) be ON be.Compte = c.Compte
                    group by c.id';

                    $stmt = $conn->prepare($sql);
                    $resultSet = $stmt->executeQuery();


        return $resultSet->fetchAllAssociative();
    }

    public function clickOrganisme($organisme_id)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT c.type, c.Grp , c.id , c.Libelle , c.Poste , b.Exer1 , c.Compte , be.Exer2 
                , (SELECT (COALESCE(b.Exer1, 0) + COALESCE(be.Exer2, 0))) AS Total
                FROM cpc c 
                LEFT JOIN (SELECT Poste , SUM(solde) AS Exer1 FROM balance WHERE id_organisme_id = :organisme_id GROUP BY Poste) b ON b.Poste = c.Poste 
                LEFT JOIN (SELECT Compte , SUM(solde) AS Exer2 FROM balance WHERE id_organisme_id = :organisme_id GROUP BY Compte) be ON be.Compte = c.Compte
                group by c.id';

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery(['organisme_id' => $organisme_id]);
                // dd($resultSet->fetchAllAssociative());

        return $resultSet->fetchAllAssociative();
    }
    public function clickDossier($dossier_id)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT c.type, c.Grp , c.id , c.Libelle , c.Poste , b.Exer1 , c.Compte , be.Exer2 , (SELECT (COALESCE(b.Exer1, 0) + COALESCE(be.Exer2, 0))) AS Total
                FROM cpc c 
                LEFT JOIN (SELECT Poste , SUM(solde) AS Exer1 FROM balance WHERE id_dossier_id = :dossier_id GROUP BY Poste) b ON b.Poste = c.Poste 
                LEFT JOIN (SELECT Compte , SUM(solde) AS Exer2 FROM balance WHERE id_dossier_id = :dossier_id GROUP BY Compte) be ON be.Compte = c.Compte
                group by c.id';

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery(['dossier_id' => $dossier_id]);


        return $resultSet->fetchAllAssociative();
    }

    public function clickSousDossier($sous_Dossier)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT c.type, c.Grp , c.id , c.Libelle , c.Poste , b.Exer1 , c.Compte , be.Exer2 , (SELECT (COALESCE(b.Exer1, 0) + COALESCE(be.Exer2, 0))) AS Total
                FROM cpc c 
                LEFT JOIN (SELECT Poste , SUM(solde) AS Exer1 FROM balance WHERE id_sous_dossier_id  = :sous_dossier_id GROUP BY Poste) b ON b.Poste = c.Poste 
                LEFT JOIN (SELECT Compte , SUM(solde) AS Exer2 FROM balance WHERE id_sous_dossier_id  = :sous_dossier_id GROUP BY Compte) be ON be.Compte = c.Compte
                group by c.id';

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery(['sous_dossier_id' => $sous_Dossier]);


        return $resultSet->fetchAllAssociative();
    }

}

// CSS Tooltips