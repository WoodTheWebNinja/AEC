<?php 
   /*   Connexion Base de donnée  */
   
    define("SERVER", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DBNAME", "blog");
  
      /*  web dev :  
      define("SERVER", "localhost");
      define("USERNAME", "e2194801");
      define("PASSWORD", "aYoyx9Dsc5cDDxq175rC");
      define("DBNAME", "e2194801");   */   
      


    function connectDB()
    {
        $c = mysqli_connect(SERVER,USERNAME,PASSWORD,DBNAME) ;

        if(!$c) {
            trigger_error("Erreur de connexion :" . mysqli_connect_error());
        }

         mysqli_query($c,"SET NAMES 'utf8'");

         return $c ;
        
        
    }


    $connexion = connectDB();

    function login($user, $pass)
    {

    
        global $connexion;
        //valider que la combinaison est dans la BD en vérifiant qu'il y au moins une rangée dans la BD avec ce username et ce password
        //1. rédiger la requête avec des ? à l'endroit ou vous voudriez mettre des paramètres venant de l'usager (d'un formulaire ou d'un lien)
        $requete = "SELECT * FROM usagers WHERE username = ?";

        //2. préparation de la requête 
        $reqPrep = mysqli_prepare($connexion, $requete);    

        if($reqPrep !== false)
        {
            //3. faire le lien entre les paramètres envoyés par l'usager et les ? dans la requête préparée
            mysqli_stmt_bind_param($reqPrep, "s", $user);
            //4. exécuter la requête préparée
            mysqli_stmt_execute($reqPrep);
            //5. obtenir les résultats
            $resultats = mysqli_stmt_get_result($reqPrep);  
            
            //à partir d'ici, on peut utiliser $resultats comme avant, c'est-à-dire avec mysqli_fetch_assoc, mysqli_num_rows, etc.
            //s'il y a un usager avec la combinaison valide, rediriger vers la page protégée, sinon, réaffichez le formulaire de login
            if(mysqli_num_rows($resultats) == 1)
            {                
                // //on a un usager de ce username, mais est-ce que le mot de passe est bon?
                 $rangee = mysqli_fetch_assoc($resultats);
                 $motDePasseEncrypte = $rangee["password"];
                 //ceci retournera vrai si le mot de passe en clair, lorsqu'encrypté, donne le mot de passe encrypté dans la BD
              
                 return password_verify($pass, $motDePasseEncrypte);
                 
            }
            else
            {
                return false;
            }
        }  
    } 



    function afficher_Blog() 
    {
        global $connexion;

        $requete = "SELECT articles.titre, articles.texte, usagers.prenom, usagers.nom, articles.id, articles.idAuteur  AS auteur 
        FROM articles
        JOIN usagers
        ON usagers.username = articles.idAuteur
        ORDER BY articles.id DESC";

        // requête avec mysqli...
        $resultats = mysqli_query($connexion, $requete);
    
        return $resultats;
    }
    
    
    function obtenir_usagers() 
    {
        global $connexion;

        $requete = "SELECT * FROM usagers";
        $resultats = mysqli_query($connexion, $requete);

        return $resultats;
    }

    function ajoute_Article($titre, $texte , $idAuteur)
    {
        global $connexion ;

        $requete ="INSERT INTO articles SET titre=? , texte=?, idAuteur =?";
        if ($reqPrep = mysqli_prepare($connexion, $requete))
        {    
             //lier les paramètres
            mysqli_stmt_bind_param($reqPrep,"sss", $titre, $texte, $idAuteur) ;

             //executer la requete
            mysqli_stmt_execute($reqPrep); 


            // verifier linsertion de la fonction
            if(mysqli_affected_rows($connexion) > 0)
                return true ;
            else 
                return false ; 
        }
        else 
            return false ; 

        
    }

    function obetenir_article_par_id($idArticle)
    {
        global $connexion ; 

        $requete = "SELECT id, titre, texte FROM articles WHERE id = $idArticle";

        $resultat = mysqli_query($connexion, $requete) ;

        //verefie si la  suppression a fonctionné?
        if(mysqli_num_rows($resultat) > 0)
            return $resultat;
        else
            return false;
    }


    function modifie_article($idArticle, $titre, $texte)
    {    
        global $connexion; 

        $requete = "UPDATE articles SET titre=?, texte=? WHERE id=?";

        if($reqPrep = mysqli_prepare($connexion, $requete))
        {
            //lier les paramètres
            mysqli_stmt_bind_param($reqPrep, "ssi", $titre, $texte, $idArticle );
            

            //exécuter la requête
            mysqli_stmt_execute($reqPrep);

            if(mysqli_affected_rows($connexion) > 0)
                return true;
            else
                return false;
        }
        else 
            return false;  
    } 
    

    function recherche($texte)
    {    
        global $connexion; 

        $texteRecherche = "%$texte%";

        $requete = "SELECT articles.titre AS titre, articles.texte, usagers.prenom, articles.id, articles.idAuteur  AS auteur
        FROM articles
        JOIN usagers ON usagers.username = articles.idAuteur
        WHERE titre 
        LIKE ? OR texte LIKE ?";
        

        if($reqPrep = mysqli_prepare($connexion, $requete))
        {
            //lier les paramètres
            mysqli_stmt_bind_param($reqPrep, "ss", $texteRecherche, $texteRecherche);

            //exécuter la requête
            mysqli_stmt_execute($reqPrep);

            $resultats = mysqli_stmt_get_result($reqPrep);
            return $resultats;
               
        }
        else 
            return false;  
    } 
  
    function supprime_article($idArticle)
    {
        global $connexion; 

        $requete = "DELETE FROM articles WHERE id = $idArticle";

        // requête avec mysqli...
        $resultats = mysqli_query($connexion, $requete);
    
        //verefie si la  suppression a fonctionné?
        if(mysqli_affected_rows($connexion) > 0)
            return true;
        else
            return false;
       
    }

    
   
