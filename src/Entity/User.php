<?php
// src/Entity/User.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="app_users")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields="email", message="Email already taken bitch")
 * @UniqueEntity(fields="username", message="Username already taken bitch")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
 
    /**
     * @ORM\Column(type="string", length=60, unique=true)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;
    
    /**
     * @ORM\Column(type="string", length=25, unique=true)
     * @Assert\NotBlank()
     */
    private $username;
    
    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=4096)
     */
    private $plainPassword;
    
    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;
    
    /**
     * @ORM\Column(type="simple_array")
     */
    private $roles;
    
    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;
    
    public function getId()
    {
        return $this->id;
    }

    public function getIsActive()
    {
        return $this->isActive;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    public function getRoles()
    {
        return $this->roles;
    }

    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getUsername()
    {
        return $this->username;
    }
    
    public function setUsername($username)
    {
        return $this->username = $username;
    }
   
    public function getPlainPassword() {
        return $this->plainPassword;
    }
    
    public function setPlainPassword($password) {
        return $this->plainPassword = $password;
    }
    
    public function getPassword()
    {
        return $this->password;
    }
    
    public function setPassword($password)
    {
        return $this->password = $password;
    }
    
    
    public function eraseCredentials()
    {
    }
    
    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }
    
    public function __construct()
    {
        $this->isActive = true;
        // may not be needed, see section on salt below
        // $this->salt = md5(uniqid('', true));
    }
    
    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }
    
    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
    }
}