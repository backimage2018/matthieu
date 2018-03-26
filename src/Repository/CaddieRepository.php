<?php
namespace App\Repository;

use App\Entity\Caddie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class CaddieRepository extends ServiceEntityRepository
{
    
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Caddie::class);
    }    
    
    public function findAllProductInCaddie($user_id){
        return $this->findBy(["user"=> $user_id]);
    }
    
    public function findOneProductForUser($user_id, $product_id){
        return $this->findOneBy(["user"=> $user_id, "product"=> $product_id]);
    }
   
}