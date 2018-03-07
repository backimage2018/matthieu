<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;

/**
 * @ORM\Table(name="app_review")
 * @ORM\Entity(repositoryClass="App\Repository\ReviewRepository")
 */

class Review
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="text", length=255, nullable=true)
     * @Assert\NotBlank()
     */
    private $message;
    
    /**
     * @ORM\Column(type="string", length=25)
     * @Assert\NotBlank()
     */
    private $username;
    
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateReview;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Products", inversedBy="products")
     */
    private $products;
    
    public function getId()
    {
        return $this->id;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getDateReview()
    {
        return $this->dateReview;
    }


    public function setId($id)
    {
        $this->id = $id;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setDateReview($dateReview)
    {
        $this->dateReview = $dateReview;
    }
    public function getProducts()
    {
        return $this->products;
    }

    public function setProducts($products)
    {
        $this->products = $products;
    }


    
   
}