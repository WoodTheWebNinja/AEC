

<?php
 //$usagers = $donnes["usagers"]; 
 $articles = $donnes["articles"];  


?>

<html>
    <head>
        <title>Page Blog</title>
    </head>
    <body>
    <div class="wrap"> 
            <form method="POST" action="index.php" class="form" >
           <input type="text" name="txtRecherche" value=""/><br>
            <input type="hidden" name="commande" value="Recherche"/>
            <input type="submit" value="Rechercher"/>
            </form>
        </div> 



        <h1 class= "title"> Le blog Sportif  <h1>
        <?php  while($rangee = mysqli_fetch_assoc($articles))   { 
            
            $auteur = $rangee["auteur"];

                if ($_SESSION["usager"] == $auteur ) 
                { ?>

                    <div class="blog__post">
                        <div class="blog__container">
                            <h2 class="blog_title space">  <?= htmlspecialchars($rangee["titre"])  ?> </h2>
                            <div class="blog_text space">  <?= htmlspecialchars($rangee["texte"])  ?> </div>
                            <div class="auteur space"> Écrit par: <?= htmlspecialchars($rangee["prenom"])  ?> </div>
                         
                                <a class="btn_modifier" href="index.php?commande=FormulaireModificationArticle&idArticle= <?= htmlspecialchars($rangee["id"])?>&idUsager= <?= htmlspecialchars($rangee["auteur"])?>">  Modifier  </a>
                                <br>
                                <a class="btn_delete" href="index.php?commande=supprimeArticle&idArticle= <?= htmlspecialchars($rangee["id"])?>">  Supprimer  </a>
                           
                        </div>
                    </div>
        <?php  }        
               else {  ?>
                <div class="blog__post">
                    <div class="blog__container">
                        <h2 class="blog_title space">  <?= htmlspecialchars($rangee["titre"])  ?> </h2>
                        <div class="blog_text space">  <?= htmlspecialchars($rangee["texte"])  ?> </div>
                        <div class="auteur space">  <?= htmlspecialchars($rangee["prenom"])  ?> </div>
                    </div>
                </div>
        <?php }
         
         }
                ?>
    

            


        </div>

    </div>   




    </body>
</html>






     


        