<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


trait TechnicalFields {
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $user_creation;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $user_delete;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $user_modif;
    
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_creation;
    
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_delete;
    
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_modif;
    
    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default":false})
     */
    private $deleted;
    public function getUser_creation()
    {
        return $this->user_creation;
    }

    public function getUser_delete()
    {
        return $this->user_delete;
    }

    public function getUser_modif()
    {
        return $this->user_modif;
    }

    public function getDate_creation()
    {
        return $this->date_creation;
    }

    public function getDate_delete()
    {
        return $this->date_delete;
    }

    public function getDate_modif()
    {
        return $this->date_modif;
    }

    public function getDeleted()
    {
        return $this->deleted;
    }

    public function setUser_creation($user_creation)
    {
        $this->user_creation = $user_creation;
    }

    public function setUser_delete($user_delete)
    {
        $this->user_delete = $user_delete;
    }

    public function setUser_modif($user_modif)
    {
        $this->user_modif = $user_modif;
    }

    public function setDate_creation($date_creation)
    {
        $this->date_creation = $date_creation;
    }

    public function setDate_delete($date_delete)
    {
        $this->date_delete = $date_delete;
    }

    public function setDate_modif($date_modif)
    {
        $this->date_modif = $date_modif;
    }

    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }


    /**
     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->create_date = new \DateTime("now");    
    }
    
    /**
     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        $this->update_date = new \DateTime("now"); 
    }
    
    /**
     * @ORM\PreRemove
     */
    public function onPreDelete()
    {
        
    }
    
    
    
}
