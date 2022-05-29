<?php
    /*
        index.php est le CONTRÔLEUR de notre application de type MVC (modulaire).
        
        Toutes les requêtes de notre application sans aucune exception devront passer par ce fichier.

        Le coeur du contrôleur sera sa structure décisionnelle qui traite un paramètre que l'on va nommer commande.
        C'est la valeur de ce paramètre commande qui déterminera les actions posées par le contrôleur.

        IMPORTANT : LE CONTRÔLEUR NE CONTIENT NI REQUÊTE SQL, NI HTML/CSS/JS, seulement du PHP.

        Le SQL va dans le modèle et strictement dans le modèle. 
        Le HTML va dans les vues et strictement dans les vues.

*/
    //réception du paaramètre commande, qui peut arriver en GET ou en POST 
    //(et donc nous utiliserons $_REQUEST)
    if(isset($_REQUEST["commande"]))
    {
        $commande = $_REQUEST["commande"];
    }
    else
    {
        //assigner une commande par défaut -- typiquement la commande qui mène à votre page d'accueil
        $commande = "Accueil";
    }

    session_start();
    //inclure le modele
    require_once("modele.php");
    //création du tableau $donnees qui sera utilisé aussi dans les vues
    $donnees = array();
    //structure décisionnelle du contrôleur
    switch($commande)
    {
        case "Accueil":
            //afficher la page d'accueil
            //notre page d'accueil est statique, cela se fait donc seulement en
            //incluant le HTML de notre page d'accueil avec entête et pied de page
            $donnees["titre"] = "Accueil";
            require_once("vues/Entete.php");
            require_once("vues/Accueil.php");
            require_once("vues/PiedDePage.php");
            break;
        case "FormulaireLogin":
            $donnees["titre"] = "Login";
            require_once("vues/Entete.php");
            require_once("vues/FormulaireLogin.php");
            require_once("vues/PiedDePage.php");
            break;
            break;
        case "Login":
            //si j'arrive du formulaire, valider les infos
            if(isset($_POST["user"], $_POST["pass"]))
            {
                //vérifier que la combinaison user / pass est valide
                $test = login($_POST["user"], $_POST["pass"]);

                if($test)
                {
                    //l'usager doit être authentifié
                    $_SESSION["usager"] = $_POST["user"];
                    header("Location: index.php?commande=PageProtegee");
                    die();
                }
                else 
                {
                    $donnees["message"] = "Combinaison username / password invalide.";
                    $donnees["titre"] = "Login";
                    require_once("vues/Entete.php");
                    require_once("vues/FormulaireLogin.php");
                    require_once("vues/PiedDePage.php");
                
                }
            }
        case "PageProtegee":
            
            //vérifier l'existence d'une variable session qui ne va exister que si l'usager a entré la bonne combinaison user / pass
            if(!isset($_SESSION["usager"]))
            {
                //rediriger l'utilisateur vers la page de login qui, elle, s'occupe d'initialiser la variable session correctement en cas de login
                header("Location: index.php");
                die();
            }
            require_once("vues/Entete.php");
            require_once("vues/PageProtegee.php");
            require_once("vues/PiedDePage.php");
            break;
        case "Logout":
             // Détruit toutes les variables de session
            $_SESSION = array();

            // Si vous voulez détruire complètement la session, effacez également
            // le cookie de session.
            // Note : cela détruira la session et pas seulement les données de session !
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }

            // Finalement, on détruit la session.
            session_destroy();

            header("Location: index.php"); 
         default:
            //action non traitée, commande invalide -- redirection
            header("Location: index.php");
            die();
    }


?>