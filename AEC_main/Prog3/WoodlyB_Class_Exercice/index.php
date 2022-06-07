<?php
require 'class/animal.php';
require 'class/pet.php';
require 'class/owner.php';

$speedy = new pet();

$speedy->name="Speedy";
$speedy->birthday="1993-12-23";
$speedy->setType("Dog");


//echo $speedy->calcAge();


$owner1 = new Owner("Jim","705 Gotham","j4W","911","GPD@gmail.com");


$owner2 = new Owner("Lukas","574","Monteal","438","Lukas@gmail.com");

unset($owner1 , $owner2);


//echo $speedy->getType();




/*

echo "<pre>";
var_dump($speedy, $owner1);
echo "</pre>";*/

