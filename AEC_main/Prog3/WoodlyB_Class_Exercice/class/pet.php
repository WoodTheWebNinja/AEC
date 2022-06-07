<?php
require_once "interfaceAge.php";

class Pet extends Animal{
    public $name;
    public $birthday;
   
    // Fonction pour le type 
    public function setType($type){
        $this->type = $type ;
        
    }
 

    public  function getType(){
        return $this->type;
    }

     
    // Fonction pour le nom 
    public function setName($name){
        $this->name = $name;
    }

    
    public function getName(){
        return $this->name;
    }

     
    // Fonction pour la fête  
    public function setBirthDay($birthday){
        $this->birthday = $birthday;
    }

    
    public function getBirthDay(){
        return $this->birthday;
    }

    // Fonction prise internet : https://waytolearnx.com/2019/07/comment-calculer-lage-a-partir-de-la-date-de-naissance-en-php.html

    public function calcAge(){
        $aujourdhui = date("Y-m-d");
        $diff = date_diff(date_create($this->birthday), date_create($aujourdhui));
        return $diff->format('%y');
    }
}

