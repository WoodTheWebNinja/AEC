<?php
    if(isset($donnees["equipe"]))
    {
        $equipe = $donnees["equipe"];
        $rangeeEquipe = mysqli_fetch_assoc($equipe);

        echo "<h1>Liste des joueurs des " . htmlspecialchars($rangeeEquipe["nom"]) . " de " . htmlspecialchars($rangeeEquipe["ville"]) . "</h1>";
    
        echo "
        <table>
            <tr>
                <th><a href='index.php?commande=ListeJoueursParEquipe&idEquipe={$rangeeEquipe["id"]}&ordre=prenom'>Prénom</a></th>
                <th><a href='index.php?commande=ListeJoueursParEquipe&idEquipe={$rangeeEquipe["id"]}&ordre=nom_joueur'>Nom</a></th>
                <th><a href='index.php?commande=ListeJoueursParEquipe&idEquipe={$rangeeEquipe["id"]}&ordre=nom_equipe'>Équipe</a></th>
                <th><a href='index.php?commande=ListeJoueursParEquipe&idEquipe={$rangeeEquipe["id"]}&ordre=salaire'>Salaire</a></th>
                <th><a href='index.php?commande=ListeJoueursParEquipe&idEquipe={$rangeeEquipe["id"]}&ordre=pays'>Pays</a></th>
                <th>Supprimer</th>
                <th>Modifier</th>
            </tr>
        ";
    }
    else 
    {
        echo "<h1>Liste de tous les joueurs</h1>";

?>
<table>
    <tr>
        <th><a href='index.php?commande=ListeJoueurs&ordre=prenom'>Prénom</a></th>
        <th><a href='index.php?commande=ListeJoueurs&ordre=nom_joueur'>Nom</a></th>
        <th><a href='index.php?commande=ListeJoueurs&ordre=nom_equipe'>Équipe</a></th>
        <th><a href='index.php?commande=ListeJoueurs&ordre=salaire'>Salaire</a></th>
        <th><a href='index.php?commande=ListeJoueurs&ordre=pays'>Pays</a></th>
        <th>Supprimer</th>
        <th>Modifier</th>
    </tr>
    
<?php 
}
    //aller chercher les données qui nous intéressent
    $joueurs = $donnees["joueurs"];

    while($rangee = mysqli_fetch_assoc($joueurs))
    {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($rangee["prenom"]) . "</td>";
        echo "<td>" . htmlspecialchars($rangee["nom_joueur"]) . "</td>";
        echo "<td>" . htmlspecialchars($rangee["nom_equipe"]) . "</td>";
        echo "<td>" . htmlspecialchars($rangee["salaire"]) . "</td>";
        echo "<td>" . htmlspecialchars($rangee["pays"]) . "</td>";
        echo "<td><a href='index.php?commande=SupprimeJoueur&idJoueur={$rangee["id"]}'>Supprimer ce joueur</a></td> ";
        echo "<td><a href='index.php?commande=FormulaireModificationJoueur&idJoueur={$rangee["id"]}'>Modifier ce joueur</a></td> ";
        echo "</tr>";
    }

?>
</table>