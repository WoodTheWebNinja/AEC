<h1>Bienvenue sur le site MVC.</h1>
<?php 
if(!isset($_SESSION["usager"]))
{
    echo "<a href='index.php?commande=FormulaireLogin'>Aller au formulaire de login</a><br>";
}
else 
{
    echo "<a href='index.php?commande=PageProtegee'>Page protégée...</a><br>";
}
?>
