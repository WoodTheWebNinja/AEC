



<div class="wrapper form__ajouter">

<h2 class="blog_title" > Ajouter votre article </h2>
    <form method="POST" action="index.php" class="form1">

     <label for="titre">Titre:</label><input type="text" name="titre"/><br>
     <label for="texte">Texte:</label><br><textarea name="texte" cols="35" rows="15"></textarea>
     <input type="hidden" name="commande" value="ajouteArticle"/><br>
     <input type="submit" value="sauvegarder"/><br>

    </form>
</div>
<?php 
    if(isset($donnees["messageErreur"]))
    {
        echo "<p class='erreure'>{$donnees["messageErreur"]}</p>";
    }




