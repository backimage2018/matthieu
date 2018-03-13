<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Symfony\Component\Form\FormTypeInterface;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Products", inversedBy="reviews", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(nullable=true)
     */
    private $products;
    
    use TechnicalFields;
    
    public function getId()
    {
        return $this->id;
    }

    public function getMessage()
    {
        return $this->message;
    }



    public function setId($id)
    {
        $this->id = $id;
    }

    public function setMessage($message)
    {
        $this->message = $message;
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