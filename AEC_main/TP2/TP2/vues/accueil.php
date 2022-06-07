<link rel="stylesheet" href="vues/style.css">
<div class='container wrapper'>
    <div class="flex">

    <?php
        $articles = $donnees["articles"];
        $usagers = $donnees["usagers"];
  // verifier si un usager est connecter
        if(isset($_SESSION["usager"])) {
            $auteur = $_SESSION["usager"];
            echo"<div class='menu'>Bonjour ". $auteur;
            echo"<a href='index.php?commande=logout'>Se deconnecter</a>";

            while($rangee = mysqli_fetch_assoc($usagers)) 
            {
                
                if($rangee["username"]  == $auteur)
                {
                    $usager = $rangee["username"];
                }
                else
                {
                    $usager = $_SESSION["usager"];
                }
            }    
            echo"<a href='index.php?commande=FormulaireAjoutArticle&idUsager={$usager}'>Ajouter article</a>";
            echo"<form method='POST' action='index.php'>";
            echo"<input type='text' name= 'recherche'>";
            echo"<input type='hidden' name='commande' value='recherche'/>";
            echo"<input type='submit' value='recherche'/>";
            echo"</form></div>";
            if(isset($donnees["message"]))
            {
                echo "<p>" . $donnees["message"] . "</p>";
            }
            
            while($rangee = mysqli_fetch_assoc($articles)) 
            {
                if(strtoupper($rangee["idAuteur"])  == strtoupper($auteur))
                {
                    echo"<div class='item'><h2> Titre : " . htmlspecialchars($rangee["titre"]). "</h2>";
                    echo"<p> Article : " . htmlspecialchars($rangee["texte"]). "</p>";
                    echo"<h2> Auteur : " . htmlspecialchars($rangee["idAuteur"]). "</h2>";
                    echo"<a href='index.php?commande=supprimer&idArticle={$rangee["id"]}'>supprimer</a>";
                    echo"<a href='index.php?commande=FormulaireModification&idArticle={$rangee["id"]}&idUsager={$rangee["idAuteur"]}'>modifier</a></div>";
                }
                else 
                {
                    echo"<div class='item'><h2> Titre : " . htmlspecialchars($rangee["titre"]). "</h2>";
                    echo"<p> Article : " . htmlspecialchars($rangee["texte"]). "</p>";
                    echo"<h2> Auteur : " . htmlspecialchars($rangee["idAuteur"]). "</h2></div>";
                }
            }
        }
        // si pas d'usager connecter 
        else 
        {
            echo"<div class='menu'><a href='index.php?commande=formulaireLogin'>Se connecter</a>"; 
            echo"<form method='GET' action='index.php'>";
            echo"<input type='text' name= 'recherche'>";
            echo"<input type='hidden' name='commande' value='recherche'/>";
            echo"<input type='submit'  value='recherche'/>";
            echo"</form></div>";
            while($rangee = mysqli_fetch_assoc($articles)) 
            {
                echo"<div class='item'><h2> Titre : " . htmlspecialchars($rangee["titre"]). "</h2>";
                echo"<p> Article : " . htmlspecialchars($rangee["texte"]). "</p>";
                echo"<h2> Auteur : " . htmlspecialchars($rangee["idAuteur"]). "</h2></div>";
            }
        }   
    ?>
</div>
