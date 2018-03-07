<?php
namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class ReviewRepository extends EntityRepository
{
    public function loadReviewById($id)
    {
        return $this->createQueryBuilder('u')
        ->where('u.id = :id')
        ->setParameter('id', $id)
        ->getQuery()
        ->getOneOrNullResult();
    }
}