<?php
namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class NewsletterRepository extends EntityRepository
{
    public function inscriptionNewsletter($email)
    {
        return $this->createQueryBuilder('u')
        ->where('u.email = :email')
        ->setParameter('email', $email)
        ->getQuery()
        ->getOneOrNullResult();
    }
}