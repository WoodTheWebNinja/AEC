<?php
    /*
        modele.php est le fichier qui représente notre MODÈLE dans notre architecture MVC. 
        C'est donc dans ce fichier que nous retrouverons TOUTES nos requêtes SQL sans AUCUNE EXCEPTION. 
        C'est aussi ici que se trouvera la connexion à la base de données et les informations nécessaires 
        à celle-ci (username, hostname, password, nom de la base, etc...)
    
    */
    define("SERVER", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DBNAME", "ligue");

    function connectDB()
    {
        //se connecter à la base de données
        $c = mysqli_connect(SERVER, USERNAME, PASSWORD, DBNAME);

        if(!$c)
            trigger_error("Erreur de connexion : " . mysqli_connect_error());
        
        //s'assurer que la connection traite du UTF8
        mysqli_query($c, "SET NAMES 'utf8'");

        return $c;
    }

    $connexion = connectDB();

    function obtenir_equipes()
    {
        global $connexion; 

        $requete = "SELECT id, nom, ville FROM equipe";

        //exécuter la requête avec mysqli...
        $resultats = mysqli_query($connexion, $requete);
    
        //retourner le résultat, comme c'est un select, je retourne $resultats qui contient toutes les équipes
        return $resultats;
    }

    function obtenir_joueurs($order_by = "id")
    {
        global $connexion; 

        $requete = "SELECT joueur.id as id, joueur.nom AS nom_joueur, prenom, equipe.nom AS nom_equipe, salaire, pays FROM joueur JOIN equipe ON joueur.idEquipe = equipe.id order by $order_by";

        //exécuter la requête avec mysqli...
        $resultats = mysqli_query($connexion, $requete);
    
        //retourner le résultat, comme c'est un select, je retourne $resultats qui contient toutes les équipes
        return $resultats;
    }

    function obtenir_joueurs_par_equipe($idEquipe, $order_by = "id")
    {
        global $connexion; 

        $requete = "SELECT joueur.id as id, joueur.nom AS nom_joueur, prenom, equipe.nom AS nom_equipe, salaire, pays FROM joueur JOIN equipe ON joueur.idEquipe = equipe.id WHERE idEquipe = $idEquipe order by $order_by";

        //exécuter la requête avec mysqli...
        $resultats = mysqli_query($connexion, $requete);
    
        //retourner le résultat, comme c'est un select, je retourne $resultats qui contient toutes les équipes
        return $resultats;
    }

    function obtenir_equipe_par_id($idEquipe)
    {
        global $connexion; 

        $requete = "SELECT id, nom, ville FROM equipe WHERE id = $idEquipe";

        //exécuter la requête avec mysqli...
        $resultats = mysqli_query($connexion, $requete);
    
        //retourner le résultat, comme c'est un select, je retourne $resultats qui contient toutes les équipes
        return $resultats;
    }

    function obtenir_joueur_par_id($idJoueur)
    {
        global $connexion; 

        $requete = "SELECT id, prenom, nom, pays, salaire, idEquipe FROM joueur WHERE id = $idJoueur";

        //exécuter la requête avec mysqli...
        $resultat = mysqli_query($connexion, $requete);
    
        //retourner le résultat, comme c'est un select, je retourne $resultats qui contient toutes les équipes
        if(mysqli_num_rows($resultat) > 0)
            return $resultat;
        else
            return false;
    }

    function ajoute_equipe($nom, $ville)
    {
        global $connexion; 

        //ici, on utilise directement $nom et $ville dans la requête SQL et donc on doit préparer la requête
        $requete = "INSERT INTO equipe(nom, ville) values(?,?)";

        if($reqPrep = mysqli_prepare($connexion, $requete))
        {
            //lier les paramètres
            mysqli_stmt_bind_param($reqPrep, "ss", $nom, $ville);

            //exécuter la requête
            mysqli_stmt_execute($reqPrep);

            //est-ce que l'insertion a fonctionné?
            if(mysqli_affected_rows($connexion) > 0)
                return true;
            else
                return false;
        }
        else 
            return false;        
    }

    function ajoute_joueur($n, $p, $idE, $s, $pa)
    {    
        global $connexion; 

        //ici, on utilise directement $nom et $ville dans la requête SQL et donc on doit préparer la requête
        $requete = "INSERT INTO joueur (nom, prenom, idEquipe, salaire, pays) VALUES (?, ?, ?, ?, ?)";

        if($reqPrep = mysqli_prepare($connexion, $requete))
        {
            //lier les paramètres
            mysqli_stmt_bind_param($reqPrep, "ssiis", $n, $p, $idE, $s, $pa);

            //exécuter la requête
            mysqli_stmt_execute($reqPrep);

            //est-ce que l'insertion a fonctionné?
            if(mysqli_affected_rows($connexion) > 0)
                return true;
            else
                return false;
        }
        else 
            return false;  
    } 

    function supprime_joueur($idJ)
    {
        global $connexion; 

        $requete = "DELETE FROM joueur WHERE id = $idJ";

        //exécuter la requête avec mysqli...
        $resultats = mysqli_query($connexion, $requete);
    
        //est-ce que la suppression a fonctionné?
        if(mysqli_affected_rows($connexion) > 0)
            return true;
        else
            return false;
       
    }


    function modifie_joueur($idJ, $n, $p, $idE, $s, $pa)
    {    
        global $connexion; 

        //ici, on utilise directement $nom et $ville dans la requête SQL et donc on doit préparer la requête
        $requete = "UPDATE joueur SET nom=?, prenom=?, idEquipe=?, salaire=?, pays=? WHERE id=?";

        if($reqPrep = mysqli_prepare($connexion, $requete))
        {
            //lier les paramètres
            mysqli_stmt_bind_param($reqPrep, "ssiisi", $n, $p, $idE, $s, $pa, $idJ);

            //exécuter la requête
            mysqli_stmt_execute($reqPrep);

            //est-ce que l'insertion a fonctionné?
            if(mysqli_affected_rows($connexion) > 0)
                return true;
            else
                return false;
        }
        else 
            return false;  
    } 
    
    function obtenir_joueur_par_recherche($texte)
    {    
        global $connexion; 

        //Il faut ajouter les % dans le paramètre que l'on va binder avec la requête AVANT de mettre le ? dans la requête et non pas dans la requête
        $texteRecherche = "%$texte%";
        //ici, on utilise directement $nom et $ville dans la requête SQL et donc on doit préparer la requête
        $requete = "SELECT joueur.nom AS nom_joueur, prenom, equipe.nom as nom_equipe, salaire, pays FROM joueur JOIN equipe ON equipe.id = joueur.idEquipe WHERE prenom LIKE ? OR joueur.nom LIKE ?";
        //ne pas faire ceci
        //$requete = "SELECT joueur.nom AS nom_joueur, prenom, equipe.nom as nom_equipe, salaire, pays FROM joueur JOIN equipe ON equipe.id = joueur.idEquipe WHERE prenom LIKE '%?%' OR joueur.nom LIKE '%?%'";

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
  


