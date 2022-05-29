<?php  

    define("SERVER", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DBNAME", "multiusagers");

    function connectDB()
    {
        //se connecter à la base de données
        $connexion = mysqli_connect(SERVER, USERNAME, PASSWORD, DBNAME);

        if(!$connexion)
            trigger_error("Erreur de connexion : " . mysqli_connect_error());
        
        //s'assurer que la connection traite du UTF8
        mysqli_query($connexion, "SET NAMES 'utf8'");

        return $connexion;
    }

    $connexion = connectDB();


    function obtenir_usagers()
    {
        global $connexion; 

        $requete = "SELECT * FROM usagers";

        $resultats = mysqli_query($connexion, $requete);
    
        return $resultats;
    }

    function obtenir_articles() 
    {
        global $connexion; 

        $requete = "SELECT id, titre, texte, idAuteur FROM articles ORDER BY id DESC";

        $resultats = mysqli_query($connexion, $requete);
    
        return $resultats;


    }
    
    function auteur_articles() 
    {
        global $connexion; 

        $requete = "SELECT id, titre, texte, idAuteur, nom, prenom FROM articles JOIN usagers WHERE usagers.username = articles.idAuteur ";

        $resultats = mysqli_query($connexion, $requete);
    
        return $resultats;

    }


    function login($user, $pass)
    {
        global $connexion;

        $requete = "SELECT * FROM usagers WHERE username = ? AND password = ?";

        $reqPrep = mysqli_prepare($connexion, $requete);    

        if($reqPrep !== false)
        {
            mysqli_stmt_bind_param($reqPrep, "ss", $user, $pass);
            mysqli_stmt_execute($reqPrep);
            $resultats = mysqli_stmt_get_result($reqPrep);  
            
            if(mysqli_num_rows($resultats) == 1)
            {
                return true;
            }
            else
            {
                return false;
            }
        }  


    }
    function recherche($texte)
    {
        global $connexion; 

        $texteRecherche = "%$texte%";

        $requete = "SELECT *  FROM articles  WHERE titre  LIKE ? OR texte LIKE ?";

        if($reqPrep = mysqli_prepare($connexion, $requete))
        {
            mysqli_stmt_bind_param($reqPrep, "ss", $texteRecherche, $texteRecherche);

            mysqli_stmt_execute($reqPrep);

            $resultats = mysqli_stmt_get_result($reqPrep);

            return $resultats;
        }
        else 
            return false;  
    } 
    function supprimerArticle($idarticle)
    {
        global $connexion; 

        $requete = "DELETE FROM articles WHERE id = $idarticle";

        
        $resultats = mysqli_query($connexion, $requete);
    
        
        if(mysqli_affected_rows($connexion) > 0)
            return true;
        else
            return false;
       
    }
    function modifierArticle($idArticle, $titre, $texte)
    {    
        global $connexion; 
        $requete = "UPDATE articles SET titre=?, texte=? WHERE id=?";
        if($reqPrep = mysqli_prepare($connexion, $requete))
        {
            mysqli_stmt_bind_param($reqPrep, "ssi", $titre, $texte, $idArticle);
            mysqli_stmt_execute($reqPrep);
            if(mysqli_affected_rows($connexion) > 0)
                return true;
            else
                return false;
        }
        else 
            return false;  
    } 
    function obtenirArticleParId($idArticle)
    {
        global $connexion; 

        $requete = "SELECT id, titre, texte FROM articles WHERE id = $idArticle";

        $resultat = mysqli_query($connexion, $requete);
    
        if(mysqli_num_rows($resultat) > 0)
            return $resultat;
        else
            return false;
    }
    function ajouterArticle($titre, $texte, $idAuteur)
    {    
        global $connexion; 

        $requete = "INSERT INTO articles SET titre=?, texte=?, idAuteur =?";

        if($reqPrep = mysqli_prepare($connexion, $requete))
        {
            mysqli_stmt_bind_param($reqPrep, "sss", $titre, $texte, $idAuteur);

            mysqli_stmt_execute($reqPrep);

            if(mysqli_affected_rows($connexion) > 0)
                return true;
            else
                return false;
        }
        else 
            return false;  
    } 

   

    
    


?>