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

    
    //structure décisionnelle du contrôleur

    switch($commande)
    {
        case "Accueil":
            //afficher la page d'accueil
            //notre page d'accueil est statique, cela se fait donc seulement en
            //incluant le HTML de notre page d'accueil avec entête et pied de page
            require_once("vues/Entete.php");
            require_once("vues/Accueil.html");
            require_once("vues/PiedDePage.php");
        case "NomDeLaCommande":
            //effectuer les actions nécessaires pour cette commande

            //obtenir le modèle dont j'ai besoin (les données à afficher)

            //afficher la ou les vues qu'on veut afficher
            break;
        case "NomDeLaCommande2":
            break;
        default:
            //action non traitée, commande invalide -- redirection
            header("Location: index.php");
    }


?>