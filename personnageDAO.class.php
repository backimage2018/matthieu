<?php

class personnageDAO {
    private $pdo;

    public function getPdo() {return $this->pdo;}
    public function setPdo($pdo) {$this->pdo = $pdo;}
    
    public function __construct($pdo) {$this->pdo = $pdo;}
    
    
    /* ------------------------ SUPPRESSION DES DONNES --------------------------- */
    
    public function deletePersonnageById($persoId) {
        $sql = "DELETE FROM personnage WHERE id=:id;";
        
        // Preparation de la requete SQL
        $prepareStatement = $this -> getPdo() -> prepare ($sql);
      
        // Complete le champ manquant par celui voulu , (le PDO::PARAM oblige a avoir exclusivement un entier et non pas une chaine de caractere)
        $prepareStatement -> bindValue(":id",$persoId,PDO::PARAM_INT);
        
        // Execute la commande SQL
        $prepareStatement -> execute();
    }   
    public function deletePersonnageByNickname($persoNickname) {
        $sql = "DELETE FROM personnage WHERE nickname=:nickname;";

        $prepareStatement = $this -> getPdo() -> prepare ($sql);
        $prepareStatement -> bindValue(":nickname",$persoNickname,PDO::PARAM_STR);
        $prepareStatement -> execute();
    }

    /* ------------------------ CREATION DE DONNES --------------------------- */

    public function addPersonnage($personnage) {
        $sql = 'INSERT INTO personnage (nickname, power, exp, loc, degats) VALUES (:nickname, :power, :exp, :loc, :degats);';
        
        $prepareStatement = $this-> getPdo() -> prepare ($sql);
        $prepareStatement -> bindValue (":nickname", $personnage -> getNickname());
        $prepareStatement -> bindValue (":power", $personnage -> getPower());
        $prepareStatement -> bindValue (":exp", $personnage -> getExp());
        $prepareStatement -> bindValue (":loc", $personnage -> getLoc());
        $prepareStatement -> bindValue (":degats", $personnage -> getDegats());
      
        $prepareStatement -> execute();
        
        /* Recuperation du dernier ID Creer */
        $lastId = $this-> getPdo() -> lastInsertId();
        
        /* Assigne le dernier ID creer au personnage venat d'etre creer */
        $personnage -> setId($lastId);
    }

    /* ------------------------ SELECTIONNER UN PERSONNAGE --------------------------- */

    public function findPersonnage($persoId) {
        $sql = 'SELECT * FROM personnage WHERE id=:id;';
        
        $prepareStatement = $this -> getPdo() -> prepare ($sql);
        $prepareStatement -> bindValue(":id",$persoId);
        $prepareStatement -> execute();
        
        /* Affiche les doonées de la requete avec fetch */
        $result = $prepareStatement-> fetch (PDO::FETCH_ASSOC);
        
        /* On donne aux données qu'on souhaite recuperer, "un modele" */
        $personnageCharge = new personnage();
        $personnageCharge -> hydrate($result);
        //$personnageCharge -> setNickname($result['nickname']);
        //$personnageCharge -> setPower($result['power']);
        //$personnageCharge -> setLoc($result['loc']);
        //$personnageCharge -> setExp($result['exp']);
        //$personnageCharge -> setDegats($result['degats']);
        
       return $personnageCharge;
    }   
    public function findPersonnageByNickname($nickname) {
        $sql = 'SELECT * FROM personnage WHERE nickname=:nickname';
        
        $prepareStatement = $this -> getPdo() -> prepare ($sql);
        $prepareStatement -> bindValue(":nickname",$nickname);
        $prepareStatement -> execute();
        
        /* Affiche les données de la requete avec fetch */
        $result = $prepareStatement-> fetch (PDO::FETCH_ASSOC);
        if ($result) {
            $personnageCharge = new personnage();
            $personnageCharge -> hydrate($result);
            
            return $personnageCharge;
        }
            return null;
         
    }
    
    
    /* ------------------------ SELECTIONNER TOUS LES PERSONNAGES --------------------------- */
    
    public function findAllPersonnage(){
        $sql = 'SELECT * FROM personnage;';
        
        $prepareStatement = $this -> getPdo() -> prepare ($sql);
        $prepareStatement -> execute();
        
        $result = $prepareStatement -> fetchAll (PDO::FETCH_ASSOC);
        
        
        $resultComplete[] = array();
        $incr = 0;
        foreach ( $result as $row ) {
            
            $personnageCharge = new personnage();
            $personnageCharge -> hydrate($row);
            //$personnageCharge -> setNickname($row['nickname']);
            //$personnageCharge -> setPower($row['power']);
            //$personnageCharge -> setLoc($row['loc']);
            //$personnageCharge -> setExp($row['exp']);
            //$personnageCharge -> setDegats($row['degats']);
            $resultComplete[$incr] = $personnageCharge;
            $incr = $incr + 1;
       }

        return $resultComplete; 
    }

    public function findOnePersonnageIfExist($persoNickname) {
        $sql = 'SELECT nickname FROM personnage WHERE nickname=:nickname';
        
        $prepareStatement = $this->getPdo()->prepare ($sql);
        $prepareStatement->bindValue(':nickname',$persoNickname);
        //$prepareStatement -> execute();
        $prepareStatement->execute();
        
        $result = $prepareStatement->fetch(PDO::FETCH_ASSOC);
     
        if ($result) {
            return true;
        }
        return false;

    }


    /* ------------------------ METTRE A JOUR UN PERSONNAGE --------------------------- */

    public function majPersonnageById($persoId){
        $sql = 'UPDATE personnage SET nickname=:nickname, power=:power, exp=:exp, loc=:loc, degats=:degats WHERE id=:id';
        
        $prepareStatement = $this -> getPdo() -> prepare ($sql);
        $prepareStatement -> bindValue (":id",$persoId -> getId());
        $prepareStatement -> bindValue (":nickname",$persoId -> getNickname());
        $prepareStatement -> bindValue (":power",$persoId -> getPower());
        $prepareStatement -> bindValue (":exp",$persoId -> getexp());
        $prepareStatement -> bindValue (":loc",$persoId -> getLoc());
        $prepareStatement -> bindValue (":degats",$persoId -> getDegats());
        $prepareStatement -> execute();
           
    }










































}

?>