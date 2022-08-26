<?php

namespace App\Repository;

use App\Classe\Search;
use App\Entity\Recipes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Recipes>
 *
 * @method Recipes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Recipes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Recipes[]    findAll()
 * @method Recipes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecipesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recipes::class);
    }

    /**
     * Requète qui permet de récupérer les produits en fonction de la recherche de l'utilisateur
     * @param Recipes[]
     */
    public function findWithSearch (Search $search)
    {
        $query = $this
            ->createQueryBuilder('r')
            ->select('d', 'a', 'r')
            ->join('r.diet' && 'r.allergen', 'r');

        if(!empty($search->diet)) {
            $query = $query
                ->andWhere('d.id IN (:diet)')
                ->setParameter('diet', $search->diet );
        }  

        if(!empty( $search->allergen)) {
            $query = $query
                ->andWhere('a.id IN (:allergen)')
                ->setParameter('allergen', $search->allergen);
        }  

        if (!empty($search->string)) {
            $query = $query
                ->andWhere('r.title LIKE :string') 
                ->setParameter('string', "%{$search->string}%");
        }
        
        return $query->getQuery()->getResult();
    }

    public function add(Recipes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Recipes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Recipes[] Returns an array of Recipes objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Recipes
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
