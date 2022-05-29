<link rel="stylesheet" href="vues/style.css">
<?php 
    $rangee = mysqli_fetch_assoc($donnees["article"]);
    $idArticle = $rangee["id"];
    $titre = $rangee["titre"];
    $texte = $rangee["texte"];
?>


<div class="wrapper modification">
    
    <form method="POST" action="index.php">
        <fieldset>
            <legend>Modifier article</legend>
            <label for="titre">Titre :</label>
            <input type="text" name="titre" value="<?= $titre ?>"/><br>
            <label for="titre">Texte :</label>
            <textarea name="texte" cols="50" rows="10"><?= $texte ?></textarea>
            <input type="hidden" name="idArticle" value="<?= $idArticle ?>"/><br>
            <input type="hidden" name="commande" value="ModifieArticle"/>
            <input type="submit" value="Sauvegarder"/>
        </fieldset>
        
    </form>
</div>

<?php 
    if(isset($donnees["messageErreur"]))
    {
        echo "<p>{$donnees["messageErreur"]}</p>";
    }
?>