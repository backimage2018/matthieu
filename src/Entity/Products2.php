<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @ORM\Table(name="app_products2")
 * @ORM\Entity(repositoryClass="App\Repository\Products2Repository")
 */
class Products2
{
    
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Image", cascade={"persist"})
     */
    private $image;
    
    public function getId()
    {
        return $this->id;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    
}