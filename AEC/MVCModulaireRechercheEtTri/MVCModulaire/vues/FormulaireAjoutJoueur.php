<h1>Formulaire d'ajout d'un joueur</h1>
<form method="POST" action="index.php">
    Prénom du joueur : <input type="text" name="prenom"/><br>
    Nom du joueur : <input type="text" name="nom"/><br>
    Équipe : <select name="idEquipe">
        <?php
    //aller populer dynamiquement le select avec les options correspondant aux équipes qui sont dans la BD
    $equipes = $donnees["equipes"]; 

    while($e = mysqli_fetch_assoc($equipes))
    {
        echo "<option value='{$e["id"]}'>{$e["nom"]} de {$e["ville"]}</option>";
    }
        ?>       
    </select> <br>
    Salaire : <input type="number" name="salaire"/><br>
    Pays : <input type="text" name="pays"/><br>
    <input type="hidden" name="commande" value="AjouteJoueur"/>
    <input type="submit" value="Sauvegarder"/>
</form>
<?php 
    if(isset($donnees["messageErreur"]))
    {
        echo "<p>{$donnees["messageErreur"]}</p>";
    }