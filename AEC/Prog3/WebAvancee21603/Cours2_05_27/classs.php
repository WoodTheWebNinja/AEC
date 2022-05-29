<?php 


class Person {
                            // propriete de votre class. Une propriete prive peut juste etre executer dans la class (a linterieur des {} )
        public $nom ;
        public $adresse ;
        public $codePostal;
        public $phone ;
        public $courriel ;
        
   

  // ce que vous voulez exexuter 

        public function setname($nom, $adresse){
                $this -> nom = $nom;
                $this -> adresse = $adresse ; 

        }
}

$objet1 = new Person () ;

/* $objet1 -> nom = "Peter" ; */

$objet1 -> setname("Paul", "Av Sherbooke") ;

var_dump($objet1); 


?>