<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @ORM\Table(name="app_faq")
 * @ORM\Entity(repositoryClass="App\Repository\FaqRepository")
 */

class Faq
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    
    private $id;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $questions;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $reponses;
    public function getId()
    {
        return $this->id;
    }

    public function getQuestions()
    {
        return $this->questions;
    }

    public function getReponses()
    {
        return $this->reponses;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setQuestions($questions)
    {
        $this->questions = $questions;
    }

    public function setReponses($reponses)
    {
        $this->reponses = $reponses;
    }

    
    
}