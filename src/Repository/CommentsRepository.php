<?php
namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class CommentsRepository extends EntityRepository
{
    public function loadFaqById($id)
    {
        return $this->createQueryBuilder('u')
        ->where('u.id = :id')
        ->setParameter('id', $id)
        ->getQuery()
        ->getOneOrNullResult();
    }
}