<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @ORM\Table(name="app_caddie")
 * @ORM\Entity(repositoryClass="App\Repository\CaddieRepository")
 */

class Caddie
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $quantity;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="caddie", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;
    
    /**
     * @ORM\ManyToOne(targetEntity="Products", inversedBy="caddie", cascade={"persist"})
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $product;
    
    public function __construct()
    {
        $this->quantity = 0;
    }
    
    public function getProduct():Products
    {
        return $this->product;
    }

    public function setProduct($product)
    {
        $this->product = $product;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
}