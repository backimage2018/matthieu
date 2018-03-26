<?php

class magicien extends personnage {
    private $_magie = 100;
    
    public function getMagie() {return $this->_magie;}
    public function setMagie($_magie) {$this->_magie = $_magie;}

    public function bouleDeFeu($cible) {
       $nbDegats = $this -> getMagie();
       $nCible = $cible -> getNickname();
       $cible -> setDegats($cible -> getDegats() + $nbDegats); //
       echo 'Boule de feu a infligé '.$nbDegats.' points de dégats a '. $nCible;
    }
}

?>