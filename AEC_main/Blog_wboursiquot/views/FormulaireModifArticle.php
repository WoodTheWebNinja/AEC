
<?php 


while($rangee = mysqli_fetch_assoc($article))   {

    $idArticle = $rangee["id"];
    $titre= $rangee["titre"];
    $texte = $rangee["texte"];

}


    
   
?>


<div class="wrapper form__ajouter">

<h2 class="blog_title" > Modifier article </h2>
<form method="POST" action="index.php" class="form" >

 <input type="text" name="titre" value=" <?= $titre  ?>" /><br>
 <br><textarea name="texte" cols="150" rows="25"> <?= $texte  ?> </textarea>
 <input type="hidden" name="idArticle"  value=" <?= $idArticle  ?>  "/>
 <input type="hidden" name="commande" value="ModificationArticle"/><br>
 <br>
 <input type="submit" value="Modifier"/><br>

</form>
</div>
<?php 
if(isset($donnees["messageErreur"]))
{
    echo "<p class='erreure'>{$donnees["messageErreur"]}</p>";
}

