<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\DBAL\Types\DateTimeType;
 
/**
 * @ORM\Table(name="app_comments")
 * @ORM\Entity(repositoryClass="App\Repository\CommentsRepository") 
 */

class Comments {
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    private $comment;
    
    use TechnicalFields;
}