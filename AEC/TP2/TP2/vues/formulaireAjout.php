
<link rel="stylesheet" href="vues/style.css">

<div class="wrapper ajout">
    <form method="GET" action="index.php">
        <fieldset>
            <legend>Ajout article</legend>
            <label for="titre">Titre :</label><input type="text" name="titre"/><br>
            <label for="titre">Texte :</label><textarea name="texte" cols="30" rows="10"></textarea><br>
            <input type="hidden" name="commande" value="ajoutArticle"/>
            <input type="submit" value="Ajouter"/>
        </fieldset>
        
    </form>
</div>


<?php
    if(isset($donnees["messageErreur"]))
        echo "<p>" . $donnees["messageErreur"] . "</p>";   
?>