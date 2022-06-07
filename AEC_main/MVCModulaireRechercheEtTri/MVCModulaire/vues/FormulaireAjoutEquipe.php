<h1>Formulaire d'ajout d'une équipe</h1>
<form method="POST" action="index.php">
    Nom de l'équipe : <input type="text" name="nom"/><br>
    Ville de l'équipe : <input type="text" name="ville"/><br>
    <input type="hidden" name="commande" value="AjouteEquipe"/><br>

    <input type="submit" value="Sauvegarder"/><br>
</form>
<?php 
    if(isset($donnees["messageErreur"]))
    {
        echo "<p>{$donnees["messageErreur"]}</p>";
    }