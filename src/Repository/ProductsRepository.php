<?php
namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class ProductsRepository extends EntityRepository 
{
    public function loadProductsByDisplay()
    {
        return $this->createQueryBuilder('u')
            ->where('u.display = true')
            ->getQuery()
            ->getOneOrNullResult();
    }
}