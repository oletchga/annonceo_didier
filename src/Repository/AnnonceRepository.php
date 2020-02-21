<?php

namespace App\Repository;

use App\Entity\Annonce;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * se sont de selects where :
 * @method Annonce|null find($id, $lockMode = null, $lockVersion = null)
 * @method Annonce|null findOneBy(array $criteria, array $orderBy = null)
 * @method Annonce[]    findAll()
 * @method Annonce[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnonceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Annonce::class);
    }

    //methode pour recuperer la liste de villes sans doublon de la table Annonce
    /*
     * @return Annonce[] Returns an array of Annonce objects
     */

    public function findRegions( )
    {
//        return $this->createQueryBuilder('a')
//            ->select("a.ville")
//            ->distinct(true)
//            ->orderBy(a.ville, 'ASC')
//            ->getQuery()
//            ->getResult()
//        ;

    //version avec EntityManager
        $entityManager = $this->getEntityManager();
        $requete = $entityManager->createQuery("SELECT DISTINCT a.ville FROM App\Entity\Annonce a ORDER By a.ville");
        return $requete->getResult();

    }

    // /**
    //  * @return Annonce[] Returns an array of Annonce objects
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
    public function findOneBySomeField($value): ?Annonce
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
