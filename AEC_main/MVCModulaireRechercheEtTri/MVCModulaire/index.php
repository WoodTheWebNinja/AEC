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
            require_once("vues/Accueil.html");
            require_once("vues/PiedDePage.php");
            break;
        case "ListeEquipes":
            //afficher la liste des équipes
            //obtenir du modèle les équipes
            $donnees["titre"] = "Liste des équipes";
            $donnees["equipes"] = obtenir_equipes();
            require_once("vues/Entete.php");
            require_once("vues/ListeEquipes.php");
            require_once("vues/PiedDePage.php");
            break;
        case "ListeJoueursParEquipe":
            if(isset($_REQUEST["idEquipe"]) && is_numeric($_REQUEST["idEquipe"]))
            {
                if(isset($_REQUEST["ordre"]))
            {
                switch($_REQUEST["ordre"])
                {
                    case "id":
                    case "prenom":
                    case "nom_joueur":
                    case "nom_equipe":
                    case "salaire":
                    case "pays":
                        $ordre = $_REQUEST["ordre"];
                        break;
                    default:
                        $ordre = "id";
                }
            }
            else 
            {
                $ordre = "id";
            }

                //obtenir les joueurs de l'équipe spécifiée en paramètres
                $donnees["joueurs"] = obtenir_joueurs_par_equipe($_REQUEST["idEquipe"], $ordre);
                $donnees["equipe"] = obtenir_equipe_par_id($_REQUEST["idEquipe"]);

                require_once("vues/Entete.php");
                require_once("vues/ListeJoueurs.php");
                require_once("vues/PiedDePage.php");
            }
            break;
        case "ListeJoueurs":
            
            if(isset($_REQUEST["ordre"]))
            {
                switch($_REQUEST["ordre"])
                {
                    case "id":
                    case "prenom":
                    case "nom_joueur":
                    case "nom_equipe":
                    case "salaire":
                    case "pays":
                        $ordre = $_REQUEST["ordre"];
                        break;
                    default:
                        $ordre = "id";
                }
            }
            else 
            {
                $ordre = "id";
            }
            //obtenir les joueurs de l'équipe spécifiée en paramètres
            $donnees["joueurs"] = obtenir_joueurs($ordre);
            
            require_once("vues/Entete.php");
            require_once("vues/ListeJoueurs.php");
            require_once("vues/PiedDePage.php");
           
            break;
        case "FormulaireAjoutEquipe":
            require_once("vues/Entete.php");
            require_once("vues/FormulaireAjoutEquipe.php");
            require_once("vues/PiedDePage.php");
            break;
        case "AjouteEquipe":
            //procéder à l'insertion
            if(isset($_REQUEST["nom"], $_REQUEST["ville"]))
            {
                //ici mettre la validation nécessaire en fonction des champs du formulaire
                $nom = trim($_REQUEST["nom"]);
                $ville = trim($_REQUEST["ville"]);

                if($nom != "" && $ville != "")
                {
                    $test = ajoute_equipe($nom, $ville);

                    if($test)
                        header("Location: index.php?commande=ListeEquipes");
                    else 
                        header("Location: index.php");
                    
                    die();
                }
                else 
                {
                    //réafficher le formulaire avec des messages d'erreurs
                    $donnees["messageErreur"] = "Il faut entrer des valeurs dans tous les champs.";
                    require_once("vues/Entete.php");
                    require_once("vues/FormulaireAjoutEquipe.php");
                    require_once("vues/PiedDePage.php");
                }
            }
            else
            {
                header("Location: index.php");
                die();
            }
            break;
        case "FormulaireAjoutJoueur":
            require_once("vues/Entete.php");
            $donnees["equipes"] = obtenir_equipes();
            require_once("vues/FormulaireAjoutJoueur.php");
            require_once("vues/PiedDePage.php");
            break;
        case "AjouteJoueur":
            if(isset($_REQUEST["nom"], $_REQUEST["prenom"], $_REQUEST["idEquipe"], $_REQUEST["salaire"], $_REQUEST["pays"]))
            {
                //ici, mettre la validation nécessaire en fonction des champs du formulaire
                $nom = trim($_REQUEST["nom"]); 
                $prenom = trim($_REQUEST["prenom"]);
                $idEquipe = $_REQUEST["idEquipe"]; 
                $salaire = $_REQUEST["salaire"];
                $pays = trim($_REQUEST["pays"]);

                if($nom != "" && $prenom != "" && $pays != "" && is_numeric($idEquipe) && is_numeric($salaire))
                {
                    //procéder à l'insertion
                    $test = ajoute_joueur($nom, $prenom, $idEquipe, $salaire, $pays);

                    if($test)
                        header("Location: index.php?commande=ListeJoueurs");
                    else 
                        header("Location: index.php");
                    
                    die();
                }
                else 
                {
                    //réafficher le formulaire avec des messages d'erreurs
                    $donnees["messageErreur"] = "Il faut entrer des valeurs dans tous les champs.";
                    require_once("vues/Entete.php");
                    $donnees["equipes"] = obtenir_equipes();
                    require_once("vues/FormulaireAjoutJoueur.php");
                    require_once("vues/PiedDePage.php");
                }
            }
            else
            {
                header("Location: index.php");
                die();
            }
            break;
        case "FormulaireModificationJoueur":
            if(isset($_REQUEST["idJoueur"]) && is_numeric($_REQUEST["idJoueur"]))
            {
                $leJoueur = obtenir_joueur_par_id($_REQUEST["idJoueur"]);

                if($leJoueur === false)
                {
                    header("Location: index.php");
                    die();
                }
                else 
                {
                    require_once("vues/Entete.php");
                    $donnees["equipes"] = obtenir_equipes();
                    $donnees["joueur"] = $leJoueur;
                    require_once("vues/FormulaireModificationJoueur.php");
                    require_once("vues/PiedDePage.php");
                }
            }
            else 
            {
                header("Location: index.php");
                die();
            }
            break;
        case "ModifieJoueur":
            if(isset($_REQUEST["idJoueur"], $_REQUEST["nom"], $_REQUEST["prenom"], $_REQUEST["idEquipe"], $_REQUEST["salaire"], $_REQUEST["pays"]))
            {
                //ici, mettre la validation nécessaire en fonction des champs du formulaire
                $nom = trim($_REQUEST["nom"]); 
                $prenom = trim($_REQUEST["prenom"]);
                $idEquipe = $_REQUEST["idEquipe"]; 
                $salaire = $_REQUEST["salaire"];
                $pays = trim($_REQUEST["pays"]);
                $idJoueur = $_REQUEST["idJoueur"];

                if($nom != "" && $prenom != "" && $pays != "" && is_numeric($idEquipe) && is_numeric($salaire) && is_numeric($idJoueur))
                {
                    //procéder à l'insertion
                    $test = modifie_joueur($idJoueur, $nom, $prenom, $idEquipe, $salaire, $pays);

                    if($test)
                        header("Location: index.php?commande=ListeJoueurs");
                    else 
                        header("Location: index.php");
                }
                else 
                {
                    //réafficher le formulaire avec des messages d'erreurs
                    $leJoueur = obtenir_joueur_par_id($_REQUEST["idJoueur"]);

                    if($leJoueur === false)
                    {
                        header("Location: index.php");
                        die();
                    }
                    else 
                    {
                        $donnees["messageErreur"] = "Il faut entrer des valeurs dans tous les champs.";
                        require_once("vues/Entete.php");
                        $donnees["equipes"] = obtenir_equipes();
                        $donnees["joueur"] = $leJoueur;
                        require_once("vues/FormulaireModificationJoueur.php");
                        require_once("vues/PiedDePage.php");
                    }
                }
            }
            else
            {
                header("Location: index.php");
                die();
            }
            break;    
        case "SupprimeJoueur":
            if(isset($_REQUEST["idJoueur"]) && is_numeric($_REQUEST["idJoueur"]))
            {
                //procéder à la suppression
                $test = supprime_joueur($_REQUEST["idJoueur"]);

                if($test)
                {
                    header("Location: index.php?commande=ListeJoueurs");
                    die();
                }
                else 
                {
                    header("Location: index.php");
                    die();

                }
            }
            else 
            {
                header("Location: index.php");
                die();
            }
            break;
        case "FormulaireRechercheJoueur":
            require_once("vues/Entete.php");
            require_once("vues/FormulaireRechercheJoueur.php");
            require_once("vues/PiedDePage.php");
            break;
        case "Recherche":
            if(isset($_REQUEST["txtRecherche"]))
            {
                $donnees["recherche"] = $_REQUEST["txtRecherche"];
                $donnees["joueurs"] = obtenir_joueur_par_recherche($_REQUEST["txtRecherche"]);
                require_once("vues/Entete.php");
                require_once("vues/FormulaireRechercheJoueur.php");
                //afficher les résultats
                require_once("vues/ResultatsRechercheJoueur.php");
                require_once("vues/PiedDePage.php");
            }
            break;
        default:
            //action non traitée, commande invalide -- redirection
            header("Location: index.php");
            die();
    }


?>