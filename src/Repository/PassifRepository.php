<?php

namespace App\Repository;

use App\Entity\Passif;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Passif|null find($id, $lockMode = null, $lockVersion = null)
 * @method Passif|null findOneBy(array $criteria, array $orderBy = null)
 * @method Passif[]    findAll()
 * @method Passif[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PassifRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Passif::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Passif $entity, bool $flush = true): void
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
    public function remove(Passif $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return Passif[] Returns an array of Passif objects
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
    public function findOneBySomeField($value): ?Passif
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */


    public function clickYear()
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT p.type , p.titre , p.poste , p.libelle , b.solde
                FROM passif p
                LEFT JOIN (SELECT poste , SUM(solde) AS solde FROM balance GROUP BY poste) b ON b.poste = p.poste';

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }

    public function clickOrganisme($organisme_id)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT p.type , p.titre , p.poste, p.libelle , b.solde , p.exercice_ex
                FROM passif p 
                LEFT JOIN 
                (SELECT poste , SUM(solde) AS solde FROM balance 
                WHERE id_organisme_id = :organisme_id GROUP BY poste) 
                b ON b.poste = p.poste';

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery(['organisme_id' => $organisme_id]);


        return $resultSet->fetchAllAssociative();
    }

    public function clickDossier($dossier_id)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT p.type , p.titre , p.poste, p.libelle , b.solde 
                FROM passif p 
                LEFT JOIN (SELECT poste , SUM(solde) AS solde FROM balance WHERE id_dossier_id = :dossier_id  GROUP BY poste) 
                b ON b.poste = p.poste';

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery(['dossier_id' => $dossier_id]);

        return $resultSet->fetchAllAssociative();
    }

    public function clickSousDossier($sous_Dossier)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT p.type , p.titre , p.poste, p.libelle , b.solde 
                FROM passif p 
                LEFT JOIN (SELECT poste , SUM(solde) AS solde FROM balance WHERE id_sous_dossier_id  = :sous_Dossier  GROUP BY poste) 
                b ON b.poste = p.poste';

                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery(['sous_Dossier' => $sous_Dossier]);

        return $resultSet->fetchAllAssociative();
    }
}
