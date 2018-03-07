<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\DBAL\Types\DateTimeType;

/**
 * @ORM\Table(name="app_products")
 * @ORM\Entity(repositoryClass="App\Repository\ProductsRepository")
 */

class Products
{
 
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Review", mappedBy="Review")
     */
    private $products;
    
    /**
     * @ORM\Column(type="string", nullable=true ,length=3)
     */
    private $status;
    
    /**
     * @ORM\Column(type="string", nullable=true, length=255)
     */
    private $image;
    
    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Image", cascade={"persist"})
     */
    private $imageobj;

    /**
     * @ORM\Column(type="string", nullable=true ,length=10)
     */
    private $soldes;
    
    /**
     * @ORM\Column(type="string", nullable=true ,length=10)
     */
    private $prixAvant;
    
    /**
     * @ORM\Column(type="string", nullable=false ,length=10)
     */
    private $prixActuel;
    
    /**
     * @ORM\Column(type="string", nullable=false ,length=50)
     * @Assert\NotBlank()
     */
    private $nomDelArticle;
    
    /**
     * @ORM\Column(type="string", nullable=true ,length=10)
     */
    private $taille;
    
    /**
     * @ORM\Column(type="string", nullable=true ,length=10)
     * @Assert\Blank()
     */
    private $color;
    
    /**
     * @ORM\Column(type="string", nullable=false ,length=30)
     */
    private $collection;
    
    /**
     * @ORM\Column(type="string", nullable=false ,length=30)
     * @Assert\NotBlank()
     */
    private $marque;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\NotBlank()
     */
    private $description;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\NotBlank()
     */
    private $detail;
    
    /**
     * @ORM\Column(type="string", nullable=false ,length=50)
     * @Assert\NotBlank()
     */
    private $categorie;
    
    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $display;
    
    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $avaibility;   
    
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    
    private $countdowndate;
    
    use TechnicalFields;

    public function getImageobj()
    {
        return $this->imageobj;
    }

    public function setImageobj($imageobj)
    {
        $this->imageobj = $imageobj;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getCountdowndate()
    {
        return $this->countdowndate;
    }

    public function setCountdowndate($countdowndate)
    {
        $this->countdowndate = $countdowndate;
    }

    public function getTaille()
    {
        return $this->taille;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getCollection()
    {
        return $this->collection;
    }

    public function getMarque()
    {
        return $this->marque;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDetail()
    {
        return $this->detail;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }

    public function getDisplay()
    {
        return $this->display;
    }

    public function getAvaibility()
    {
        return $this->avaibility;
    }

    public function setTaille($taille)
    {
        $this->taille = $taille;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function setCollection($collection)
    {
        $this->collection = $collection;
    }

    public function setMarque($marque)
    {
        $this->marque = $marque;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setDetail($detail)
    {
        $this->detail = $detail;
    }

    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    public function setDisplay($display)
    {
        $this->display = $display;
    }

    public function setAvaibility($avaibility)
    {
        $this->avaibility = $avaibility;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getSoldes()
    {
        return $this->soldes;
    }

    public function getPrixAvant()
    {
        return $this->prixAvant;
    }

    public function getPrixActuel()
    {
        return $this->prixActuel;
    }

    public function getNomDelArticle()
    {
        return $this->nomDelArticle;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setSoldes($soldes)
    {
        $this->soldes = $soldes;
    }

    public function setPrixAvant($prixAvant)
    {
        $this->prixAvant = $prixAvant;
    }

    public function setPrixActuel($prixActuel)
    {
        $this->prixActuel = $prixActuel;
    }

    public function setNomDelArticle($nomDelArticle)
    {
        $this->nomDelArticle = $nomDelArticle;
    }   
    
}