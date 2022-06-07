<?php 
    $rangeeJoueur = mysqli_fetch_assoc($donnees["joueur"]);

    $idJoueur = $rangeeJoueur["id"];
    $prenom = $rangeeJoueur["prenom"];
    $nom = $rangeeJoueur["nom"];
    $salaire = $rangeeJoueur["salaire"];
    $pays = $rangeeJoueur["pays"];
    $idEquipe = $rangeeJoueur["idEquipe"];
   
?>
<h1>Formulaire de modification d'un joueur</h1>
<form method="POST" action="index.php">
    Prénom du joueur : <input type="text" name="prenom" value="<?= $prenom ?>"/><br>
    Nom du joueur : <input type="text" name="nom" value="<?= $nom ?>"/><br>
    Équipe : <select name="idEquipe">
        <?php
    //aller populer dynamiquement le select avec les options correspondant aux équipes qui sont dans la BD
    $equipes = $donnees["equipes"]; 

    while($e = mysqli_fetch_assoc($equipes))
    {
        if($idEquipe == $e["id"])
            echo "<option selected value='{$e["id"]}'>{$e["nom"]} de {$e["ville"]}</option>";
        else 
            echo "<option value='{$e["id"]}'>{$e["nom"]} de {$e["ville"]}</option>";
    }
        ?>       
    </select> <br>
    Salaire : <input type="number" name="salaire" value="<?= $salaire ?>"/><br>
    Pays : <input type="text" name="pays" value="<?= $pays ?>"/><br>
    <input type="hidden" name="idJoueur" value="<?= $idJoueur ?>"/>
    <input type="hidden" name="commande" value="ModifieJoueur"/>
    <input type="submit" value="Sauvegarder"/>
</form>
<?php 
    if(isset($donnees["messageErreur"]))
    {
        echo "<p>{$donnees["messageErreur"]}</p>";
    }