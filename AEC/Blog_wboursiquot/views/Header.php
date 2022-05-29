<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="././css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Blog TP2 Woodly Boursiquot </title>
</head>
<body>
<?php

       echo realpath("Header.php");

      if(isset($_SESSION["usager"]) && $_SESSION["usager"] != "visiteur") {
        $_usager = $_SESSION["usager"] ;

      echo  "<a href=" . "index.php?commande=PageBlog" . "> Bonjour . $_usager .  </a> <br>";
      echo  "<a href=" . "index.php?commande=FormulaireAjouterArticle" . "> Voulez-vous ajouter un article ? </a> <br>";
     

    }
    else {
        echo  "<a href=" ."index.php?commande=FormulaireDeLogin" ." >Connectez-nous</a> <br>" ;

    }
   
    ?>
     <br>  
       











    
</body>
</html>

