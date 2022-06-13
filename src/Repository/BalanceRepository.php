<?php

namespace App\Repository;

use App\Entity\Balance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Balance|null find($id, $lockMode = null, $lockVersion = null)
 * @method Balance|null findOneBy(array $criteria, array $orderBy = null)
 * @method Balance[]    findAll()
 * @method Balance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BalanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Balance::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Balance $entity, bool $flush = true): void
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
    public function remove(Balance $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return Balance[] Returns an array of Balance objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Balance
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    /** TableTop Passif  */

    public function TableTop($IdPoste)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT Libelle , Solde , Debit 
                FROM balance
                WHERE Poste = :poste
                GROUP BY solde' ;

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery([':poste' => $IdPoste]);

        return $resultSet->fetchAllAssociative();
    }


    public function TableTopOrg($IdOrg , $IdPoste)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT Libelle , SUM(Solde) AS Solde , Debit 
                FROM balance
                WHERE id_organisme_id = :organisme_id 
                AND poste = :poste
                GROUP BY solde
                ORDER BY solde DESC';

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery([':organisme_id' => $IdOrg , ':poste' => $IdPoste]);

        return $resultSet->fetchAllAssociative();
    }
    

    public function TableTopDos($IdDos,$IdPoste)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT Libelle , SUM(Solde) AS Solde , Debit 
                FROM balance
                WHERE id_dossier_id = :IdDos
                AND poste = :IdPoste
                GROUP BY libelle';

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery([':IdDos' => $IdDos , ':IdPoste' => $IdPoste]);

        return $resultSet->fetchAllAssociative();
    }

    public function TableTopSous($IdSous,$IdPoste)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT Libelle , SUM(Solde) AS Solde , Debit 
                FROM balance
                WHERE id_sous_dossier_id = :IdSous
                AND poste = :IdPoste
                GROUP BY Libelle';

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery([':IdSous' => $IdSous , ':IdPoste' => $IdPoste]);

        return $resultSet->fetchAllAssociative();
    }

    /** Tablebutton Passif  */

    public function Tablebutton()
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT Libelle, SUM(Solde) AS Solde
                FROM balance
                WHERE poste = 282 
                GROUP BY Libelle
                ORDER BY date_sys';


                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }

    public function TablebuttonOrg()
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT Libelle , SUM(Solde) AS Solde
                FROM balance
                WHERE id = 3672 ';

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }

    // public function TablebuttonDos($dossier_id)
    // {
    //     $conn = $this->getEntityManager()->getConnection();

    //     $sql = 'SELECT Libelle , SUM(Solde) AS Solde
    //             FROM balance
    //             WHERE id_dossier_id  = :dossier_id 
    //             AND compte = 0
    //             GROUP BY Libelle';

    //             $stmt = $conn->prepare($sql);
    //             $resultSet = $stmt->executeQuery([':dossier_id' => $dossier_id]);

    //     return $resultSet->fetchAllAssociative();
    // }

    // public function TablebuttonSous($sous_Dossier)
    // {
    //     $conn = $this->getEntityManager()->getConnection();

    //     $sql = 'SELECT Libelle ,SUM(Solde) AS Solde
    //             FROM balance
    //             WHERE id_sous_dossier_id  = :sous_Dossier 
    //             AND compte = 0
    //             GROUP BY Libelle';

    //             $stmt = $conn->prepare($sql);
    //             $resultSet = $stmt->executeQuery([':sous_Dossier' => $sous_Dossier]);

    //     return $resultSet->fetchAllAssociative();
    // }

    /** TableTop Cpc  */

    public function TableTopCpc($IdPoste)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT Libelle , SUM(Solde) AS Solde , Debit 
                FROM balance
                WHERE Poste = :IdPoste 
                GROUP BY Libelle';

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery([':IdPoste' => $IdPoste]);

        return $resultSet->fetchAllAssociative();
    }

    public function TableTopCpcOrg($IdPoste,$organisme_id)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT Libelle , SUM(Solde) AS Solde , Debit 
                FROM balance
                WHERE Poste = :IdPoste
                AND id_organisme_id = :organisme_id
                GROUP BY Libelle';

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery([':IdPoste' => $IdPoste ,':organisme_id' => $organisme_id ]);


        return $resultSet->fetchAllAssociative();
    }
    
    public function TableTopCpcDos($IdPoste,$dossier_id)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT Libelle , SUM(Solde) AS Solde , Debit 
                FROM balance
                WHERE Poste = :IdPoste 
                AND id_dossier_id = :dossier_id
                GROUP BY Libelle';

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery([':IdPoste' => $IdPoste ,':dossier_id' => $dossier_id ]);

        return $resultSet->fetchAllAssociative();
    }

    public function TableTopCpcSous($IdPoste,$sous_Dossier)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT Libelle , SUM(Solde) AS Solde , Debit 
                FROM balance
                WHERE Poste = :IdPoste 
                AND id_sous_dossier_id = :sous_Dossier
                GROUP BY Libelle';

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery([':IdPoste' => $IdPoste , ':sous_Dossier' => $sous_Dossier ]);

        return $resultSet->fetchAllAssociative();
    }

     /** Tablebutton Cpc  */

    public function TablebuttonCpc($compte)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT Libelle , SUM(Solde) AS Solde , Debit 
                FROM balance
                WHERE Poste = 0 AND Compte = :compte
                GROUP BY Libelle';


                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery([':compte' => $compte]);

        return $resultSet->fetchAllAssociative();
    }

    public function TablebuttonCpcOrg($organisme_id,$compte)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT Libelle , SUM(Solde) AS Solde , Debit 
                FROM balance
                WHERE Poste = 0 AND Compte = :compte
                AND id_organisme_id = :organisme_id
                GROUP BY Libelle';

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery([ ':compte' => $compte ,':organisme_id' => $organisme_id ]);

        return $resultSet->fetchAllAssociative();
    }

    public function TablebuttonCpcDos($dossier_id,$compte)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT Libelle , SUM(Solde) AS Solde , Debit 
                FROM balance
                WHERE Poste = 0 AND Compte = :compte
                AND id_dossier_id = :dossier_id';

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery([':dossier_id' => $dossier_id , ':compte' => $compte]);

        return $resultSet->fetchAllAssociative();
    }

    public function TablebuttonCpcSous($sous_Dossier,$compte)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT Libelle , SUM(Solde) AS Solde , Debit 
                FROM balance
                WHERE Poste = 0 AND Compte = :compte
                AND id_sous_dossier_id = :sous_Dossier
                GROUP BY Libelle';

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery([':sous_Dossier' => $sous_Dossier , ':compte' => $compte]);

        return $resultSet->fetchAllAssociative();
    }

    /** TableTop Actif  */

    public function TableTopActif($IdPoste)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT Libelle , Solde 
                FROM balance
                WHERE poste = :IdPoste ';

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery([':IdPoste' => $IdPoste]);

        return $resultSet->fetchAllAssociative();
    }

    public function TableTopActifOrg($IdPoste,$organisme_id)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT Libelle , SUM(Solde) AS Solde , Debit 
                FROM balance
                WHERE Poste = :IdPoste
                AND id_organisme_id = :organisme_id
                GROUP BY Libelle';

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery([':IdPoste' => $IdPoste ,':organisme_id' => $organisme_id ]);


        return $resultSet->fetchAllAssociative();
    }
    
    public function TableTopActifDos($IdPoste,$dossier_id)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT Libelle , SUM(Solde) AS Solde , Debit 
                FROM balance
                WHERE Poste = :IdPoste 
                AND id_dossier_id = :dossier_id
                GROUP BY Libelle';

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery([':IdPoste' => $IdPoste ,':dossier_id' => $dossier_id ]);

        return $resultSet->fetchAllAssociative();
    }

    public function TableTopActifSous($IdPoste,$sous_Dossier)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT Libelle , SUM(Solde) AS Solde , Debit 
                FROM balance
                WHERE Poste = :IdPoste 
                AND id_sous_dossier_id = :sous_Dossier
                GROUP BY Libelle';

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery([':IdPoste' => $IdPoste , ':sous_Dossier' => $sous_Dossier ]);

        return $resultSet->fetchAllAssociative();
    }



     /** Tablebutton Actif  */


     public function TablebuttonActif($compte)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT Libelle , SUM(Solde) AS Solde
                FROM balance 
                WHERE Compte = :compte 
                GROUP BY Libelle
                ORDER by date_sys,libelle';


                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery([':compte' => $compte]);

        return $resultSet->fetchAllAssociative();
    }

    public function TablebuttonActifOrg($organisme_id,$compte)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT Libelle , Solde , Debit 
                FROM balance
                WHERE Compte = :compte
                AND id_organisme_id = :organisme_id
                GROUP BY Libelle
                ORDER by date_sys,libelle';

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery([ ':compte' => $compte ,':organisme_id' => $organisme_id ]);

        return $resultSet->fetchAllAssociative();
    }

    public function TablebuttonActifDos($dossier_id,$compte)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT Libelle , Solde , Debit 
                FROM balance
                WHERE Compte = :compte
                AND id_dossier_id = :dossier_id';

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery([':dossier_id' => $dossier_id , ':compte' => $compte]);

        return $resultSet->fetchAllAssociative();
    }

    public function TablebuttonActifSous($sous_Dossier,$compte)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT Libelle , Solde , Debit 
                FROM balance
                WHERE Compte = :compte
                AND id_sous_dossier_id = :sous_Dossier
                GROUP BY Libelle';

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery([':sous_Dossier' => $sous_Dossier , ':compte' => $compte]);

        return $resultSet->fetchAllAssociative();
    }


}
