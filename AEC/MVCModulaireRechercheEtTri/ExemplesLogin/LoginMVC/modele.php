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
    define("DBNAME", "login");

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
                //on a un usager de ce username, mais est-ce que le mot de passe est bon?
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

  


