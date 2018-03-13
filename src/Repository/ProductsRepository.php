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


    public function loadProductsByDisplay()
    {
        return $this->createQueryBuilder('u')
            ->where('u.display = true')
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findOneOr404(array $criteria)
    {
        $entity = $this->findOneBy($criteria);

        if ($entity === null) {
            throw new NotFoundHttpException("Impossible de trouver la resource demandée");
        }

        return $entity;
    }


}