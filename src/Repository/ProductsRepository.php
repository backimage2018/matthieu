<?php
namespace App\Repository;

use App\Entity\Products;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Products::class);
    }


    public function findProductsById(){
        return $this->createQueryBuilder('i')
        ->where('i.id = :id')
        ->getQuery()
        ->getOneOrNullResult();
    }
    
    public function loadProductsByDisplay()
    {
        return $this->createQueryBuilder('u')
            ->where('u.display = true')
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findAllProductsForMen($men, $mixte)
    {
        return $this->createQueryBuilder('p')
        ->where('p.sexe = :men OR p.sexe = :mixte')
        ->setParameter('men', $men)
        ->setParameter('mixte', $mixte)
        ->getQuery()->execute();
    }

    public function findAllProductsForWomen($women, $mixte)
    {
        return $this->createQueryBuilder('p')
        ->where('p.sexe = :women OR p.sexe = :mixte')
        ->setParameter('women', $women)
        ->setParameter('mixte', $mixte)
        ->getQuery()->execute();
    }
    
    public function findAllProductsMenCloth($men, $cloth)
    {
        return $this->createQueryBuilder('p')
        ->where('p.sexe = :men AND p.categorie = :cloth')
        ->setParameter('men', $men)
        ->setParameter('cloth', $cloth)
        ->getQuery()->execute();
    }
    
    public function findAllProductsWomenCloth($women, $cloth)
    {
        return $this->createQueryBuilder('p')
        ->where('p.sexe = :women AND p.categorie = :cloth')
        ->setParameter('women', $women)
        ->setParameter('cloth', $cloth)
        ->getQuery()->execute();
    }
    
    public function findAllProductsPhonesAndAccessories($phone, $accessorie)
    {
        return $this->createQueryBuilder('p')
        ->where('p.categorie = :phone OR p.categorie = :accessorie')
        ->setParameter('phone', $phone)
        ->setParameter('accessorie', $accessorie)
        ->getQuery()->execute();
    }
    
    public function findAllProductsConsumerAndOffice($consumer, $office)
    {
        return $this->createQueryBuilder('p')
        ->where('p.categorie = :consumer OR p.categorie = :office')
        ->setParameter('consumer', $consumer)
        ->setParameter('office', $office)
        ->getQuery()->execute();
    }
    
    public function findAllProductsConsumerElectronic($consumer, $electronic)
    {
        return $this->createQueryBuilder('p')
        ->where('p.categorie = :consumer OR p.categorie = :electronic')
        ->setParameter('consumer', $consumer)
        ->setParameter('electronic', $electronic)
        ->getQuery()->execute();
    }
    
    public function findAllProductsJewelryAndWatche($jewelry, $watche)
    {
        return $this->createQueryBuilder('p')
        ->where('p.categorie = :jewelry OR p.categorie = :watche')
        ->setParameter('jewelry', $jewelry)
        ->setParameter('watche', $watche)
        ->getQuery()->execute();
    }
    
    public function findAllProductsBagsAndShoes($bags, $shoes)
    {
        return $this->createQueryBuilder('p')
        ->where('p.categorie = :bags OR p.categorie = :shoes')
        ->setParameter('bags', $bags)
        ->setParameter('shoes', $shoes)
        ->getQuery()->execute();
    }
    
    
    
    
}