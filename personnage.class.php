<?php

class personnage {
    private $_id = null;
    private $_nickname = null;
    private $_power = null;
    private $_exp = 0;
    private $_loc = null;
    private $_degats = 0;

    // GET & SET
    
    public function getId() {return $this->_id;}
    public function setId($_id) {$this->_id = $_id;}
    
    public function getNickname() {return $this->_nickname;}
    public function setNickname($_nickname) {$this->_nickname = $_nickname;}
    public function getPower() {return $this->_power;}
    public function setPower($_power) {$this->_power = $_power;}
    public function getExp() {return $this->_exp;}
    public function setExp($_exp) {$this->_exp = $_exp;}
    public function getLoc() {return $this->_loc;}
    public function setLoc($_loc) {$this->_loc = $_loc;}
    public function getDegats() {return $this->_degats;}
    public function setDegats($_degats) {$this->_degats = $_degats;}
  
 //
    // fonction du personnage.class
    
    public function sedeplacer() {}
    public function frapper($personnageQueLonFrappe) {
        $personnageQueLonFrappe -> _degats = $this -> _power + $personnageQueLonFrappe -> _degats;
        $this -> gagnerExperience();
        echo $this -> getNickname() . " à infliger " .$this->getForce() . " à ". $personnageQueLonFrappe -> getNickname() . "<br>";
    }
    
    public function gagnerExperience() {
        $this -> _exp = $this -> _exp + 1; /* ou exp++ */
    } 
    public function afficherExperience() {
        echo $this->_exp;
    }
  
     // Afficher les caract�ristiques
     
        public function showMeYourSwag() {
            echo "<div style='padding:10px;width:200px;border:1px solid black;margin-bottom:10px;'>- Pseudo : " . $this->getNickname();
            echo "<br>- Force : " . $this->getPower();
            echo "<br>- Expérience : " . $this->getExp();
            echo "<br>- Localisation : " . $this->getLoc();
            echo "<br>- Degats : " . $this->getDegats();
            echo "<br></div>";
        }
        
    // Constructeur
        
     /*   public function __construct($_nickname) {
            $this->_nickname = $_nickname;
        }*/
   
        
    // DEPENDANCE DAO
    
        public function __construct() {}
        
    // Mettre a jour les données dans l'objet personnage
    
        public function hydrate($ligneFetch) {
            foreach ($ligneFetch as $key=>$value) {
                $methodname = 'set'. ucfirst($key);
                if (method_exists($this, $methodname)) {
                    $this->$methodname ($value);}
            }
            
        }
}


?>