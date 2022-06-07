<?php 
    //si j'arrive avec une recherche
    if(isset($donnees["recherche"]))
        $recherche = $donnees["recherche"];
    else
        $recherche = "";
?>
<h1>Formulaire de recherche d'un joueur</h1>
<form method="POST" action="index.php">
    Prénom ou nom du joueur : <input type="text" name="txtRecherche" value="<?= $recherche ?>"/><br>
    <input type="hidden" name="commande" value="Recherche"/>
    <input type="submit" value="Rechercher"/>
</form>