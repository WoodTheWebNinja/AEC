<?php

class Owner {
    private $name;
    private $adresse;
    private $zipCode;
    private $phone;
    private $email;

    // methods


    public function __construct($name,$adresse,$zipCode,$phone,$email){
        $this->name = $name;
        $this->adresse= $adresse;
        $this->zipCode = $zipCode;
        $this->phone =$phone;
        $this->email = $email;
        
    }
 

 

    public function __destruct(){
       echo  $this->name ."<pre>";
    
       echo  $this->adresse."<pre>";
   
       echo  $this->zipCode."<pre>";
   
       echo  $this->phone."<pre>";

       echo  $this->email."<pre>";
       
        
    }
  
}
?>