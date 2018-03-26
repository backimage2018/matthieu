<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @ORM\Table(name="app_image")
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 */

class Image {
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\File(mimeTypes={"image/jpeg","image/png"})
     */
    private $url;
    
    private $urlName;
    
    public function getUrlName()
    {
        return $this->urlName;
    }

    public function setUrlName($urlName)
    {
        $this->urlName = $urlName;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }
}