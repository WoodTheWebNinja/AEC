<?php 

Class Person {
    public $name;
    public $adresse ;
    public $zipCode;
    public $phone;
    public $email; 
  


    public function setName($name){
        $this-> name = $name; 
    }

    public function getName(){
        return $this-> name ;
    }

}


//instance a class

$peter = new Person();
$lisa = new Person(); 


// set property 

//$peter -> name = "Peter";
//$peter-> phone = "514-777-8979";

//$lisa -> name = "Lisa";
//$lisa -> phone = "514-777-9999";

// get property 

echo $peter -> name ; 
echo "<br>";
echo $peter -> phone ; 
echo "<br>";

// Ajouter un nom avec des fonctions 

$lisa -> setName("lisa");
echo $lisa -> getName(); 



//print the object /

//echo "<br>";
//print_r($peter);
//echo "<br>";
//var_dump("Le var dump:", $peter); 


?>