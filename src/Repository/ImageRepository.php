<?php
namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class ImageRepository extends EntityRepository 
{
    public function loadImageById($id)
    {
        return $this->createQueryBuilder('u')
            ->where('u.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }
}