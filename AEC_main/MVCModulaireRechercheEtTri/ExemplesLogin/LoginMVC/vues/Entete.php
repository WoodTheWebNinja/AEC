<html>
    <head>
        <meta charset='utf-8'>
        <title><?php if(isset($donnees["titre"])) echo $donnees["titre"]; ?></title>
    </head>
    <body>
    <?php 
        if(isset($_SESSION["usager"]))        
        {
            echo "<a href='index.php?commande=Logout'>Logout</a>";
        }
    ?>