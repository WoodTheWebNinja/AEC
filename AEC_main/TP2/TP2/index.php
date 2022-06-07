<?php


if(isset($_REQUEST["commande"]))
{
    $commande = $_REQUEST["commande"];
}
else
{
    $commande = "accueil";
}

    session_start();
    require_once("modele.php");
    $donnees = array();
    switch($commande)
    {
        case "accueil":
            $donnees["articles"] = obtenir_articles();
            $donnees["usagers"] = obtenir_usagers();
            require_once("vues/Entete.php");
            require_once("vues/accueil.php");
            require_once("vues/PiedDePage.php");
            break;

        case "formulaireLogin":
            require_once("vues/Entete.php");
            require_once("vues/formulaireLogin.php");
            require_once("vues/PiedDePage.php");
            break;

        case "login":
            if(isset($_POST["user"], $_POST["pass"]))
            {
                $test = login($_POST["user"], $_POST["pass"]);

                if($test)
                {
                    $_SESSION["usager"] = $_POST["user"];
                    header("Location: index.php?commande=accueil");
                    die();
                }
                else 
                {
                    $donnees["message"] = "username ou password invalide.";
                    require_once("vues/Entete.php");
                    require_once("vues/formulaireLogin.php");
                    require_once("vues/PiedDePage.php");
                    
                }
            }
            break;


        case "recherche":
            
            if(isset($_REQUEST["recherche"]))
            {
                $donnees["articles"] = recherche($_REQUEST["recherche"]);
                $donnees["usagers"] = obtenir_usagers();
                require_once("vues/Entete.php");
                require_once("vues/accueil.php");
                require_once("vues/PiedDePage.php");
            }
            break;
        
        case "logout":

            session_start();
            $_SESSION = array();
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }
            session_destroy();
            header("Location: index.php?commande=accueil");   
            break;

        case "supprimer":
            
            if(isset($_REQUEST["idArticle"]))
            {
                $test = supprimerArticle($_REQUEST["idArticle"]);

                if($test)
                {
                    header("Location: index.php?commande=accueil");
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

        case "FormulaireModification":

        if($_SESSION["usager"] != $_REQUEST["idUsager"]) 

        {
            header("Location: index.php");
        }
        
            
        if(isset($_REQUEST["idArticle"]))
        {
            $article = obtenirArticleParId($_REQUEST["idArticle"]);

            if($article === false)
            {
                header("Location: index.php");
                die();
            }
            else
            {
                require_once("vues/Entete.php");
                $donnees["article"] = $article;
                require_once("vues/FormulaireModification.php");
                require_once("vues/PiedDePage.php");
            }
        }
        else 
        {
            header("Location: index.php");
            die();
        }
        break;

        case "ModifieArticle":

            if(isset($_REQUEST["titre"], $_REQUEST["texte"], $_REQUEST["idArticle"]))
            {
                $titre = trim($_REQUEST["titre"]); 
                $texte = trim($_REQUEST["texte"]);
                $idArticle = $_REQUEST["idArticle"];
                if($titre != "" && $texte != "")
                {
                    $test = modifierArticle($idArticle, $titre, $texte);
                    if($test)
                        header("Location: index.php?commande=accueil");
                    else 
                        header("Location: index.php");
                }
                else 
                {
                    $article = obtenirArticleParId($idArticle);
                    if($article === false)
                    {
                        header("Location: index.php");
                        die();
                    }
                    else 
                    {
                        $donnees["messageErreur"] = "Il faut entrer des valeurs dans tous les champs.";
                        require_once("vues/Entete.php");
                        $donnees["article"] = $article;
                        require_once("vues/FormulaireModification.php");
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
        case "FormulaireAjoutArticle":

            if($_SESSION["usager"] != $_REQUEST["idUsager"]) 

            {
                header("Location: index.php");
            }
            else 
            {
                require_once("vues/Entete.php");
                require_once("vues/formulaireAjout.php");
                require_once("vues/PiedDePage.php");
            } 
            break;
            

        case "ajoutArticle":
       
        if(isset($_REQUEST["titre"], $_REQUEST["texte"]))
        {
            $titre = trim($_REQUEST["titre"]); 
            $texte = trim($_REQUEST["texte"]);
            $idAuteur = $_SESSION["usager"];
            if($titre != "" && $texte != "")
            {
                $test = ajouterArticle($titre, $texte, $idAuteur);
                if($test)
                    header("Location: index.php?commande=accueil");
                else 
                    header("Location: index.php");
            }
            else 
            {
                    $donnees["messageErreur"] = "Il faut entrer des valeurs dans tous les champs.";
                    require_once("vues/Entete.php");
                    require_once("vues/FormulaireAjout.php");
                    require_once("vues/PiedDePage.php");
            }
        }
        else
        {
            header("Location: index.php");
            die();
        }
        break;

    }
?>