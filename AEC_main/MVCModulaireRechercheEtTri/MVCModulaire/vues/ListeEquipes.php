<h1>Liste des équipes</h1>
<ul>
<?php 
    //aller chercher les données qui nous intéressent
    $equipes = $donnees["equipes"];

    while($rangee = mysqli_fetch_assoc($equipes))
    {
        echo "<li>";
        echo "<a href='index.php?commande=ListeJoueursParEquipe&idEquipe={$rangee["id"]}'>";
        echo htmlspecialchars($rangee["nom"]) . " de " . htmlspecialchars($rangee["ville"]);
        echo "</a></li>";
    }

?>
</ul>