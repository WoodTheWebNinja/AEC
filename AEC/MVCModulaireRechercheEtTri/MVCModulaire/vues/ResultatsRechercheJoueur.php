<?php 
     //aller chercher les données qui nous intéressent
     $joueurs = $donnees["joueurs"];
    
     if(mysqli_num_rows($joueurs) > 0 )
     {
?>
<table>
    <tr><th>Prénom</th><th>Nom</th><th>Équipe</th><th>Salaire</th><th>Pays</th></tr>
<?php 
   
    while($rangee = mysqli_fetch_assoc($joueurs))
    {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($rangee["prenom"]) . "</td>";
        echo "<td>" . htmlspecialchars($rangee["nom_joueur"]) . "</td>";
        echo "<td>" . htmlspecialchars($rangee["nom_equipe"]) . "</td>";
        echo "<td>" . htmlspecialchars($rangee["salaire"]) . "</td>";
        echo "<td>" . htmlspecialchars($rangee["pays"]) . "</td>";
        echo "</tr>";
    }

?>
</table>
<?php 
     }
     else 
     {
?>
    <p>Pas de résultats pour cette recherche.</p>
         <?php 

     }
?>