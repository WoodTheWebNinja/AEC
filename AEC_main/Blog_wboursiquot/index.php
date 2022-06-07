<?php 
     // Réception des parametres de commande 

          
     if (isset($_REQUEST["commande"])) {
         $commande = $_REQUEST["commande"];

  
     } else {
         $commande = "PageBlog"; 
     }
     
     session_start();
     // Verifier si l'usager est un visiteur ! Si oui, il est attribué la session usager. Si dans un futur on voudrait rajouter une option de création d'un compte    
     if (count( $_SESSION) === 0) {
        $_SESSION["usager"] = "visiteur";
     }

     //$_SESSION["usager"] = "visiteur";
    
     // Pour debug et identifier les valeurs de session 
    var_dump($_SESSION);
    


     //inclure le modele 
     require_once("modele.php");
     $donnes =array(); 

     //structure décisionnelle du contrôleur 
     switch ($commande) 
    {

        case "PageBlog": 
         

               $donnes["usagers"] = obtenir_usagers(); 
               $donnes["articles"] = afficher_Blog() ;
               require_once("views\Header.php");
               require_once("views\PageBlog.php");
               require_once("views\Footer.php");
               break;
         
        case "FormulaireDeLogin":
           
            $donnes["titre"] = "Login";
            require_once("views/Header.php");
            require_once("views/FormulaireDeLogin.php");
            require_once("views/Footer.php");
            break;

        case "Login":
            // si j'arrive du formulaire , valider les infos 
            if(isset($_POST["user"], $_POST["pass"]))
            {
                
                 // verifer que la combinaison user/pass est valide
               $test = login($_POST["user"], $_POST["pass"]); 

              // a deplacer dans un fichier a part pour creer les pws (Formulaire de creation de compte)
               // $_SESSION["Test Password"] = password_hash($_POST["pass"], PASSWORD_DEFAULT);
                
         
                if($test) 
                {
                    // l'usager doit être authentifié 
                    $_SESSION["usager"] = $_POST["user"]; 
                   /* $_SESSION["usager"] = */
                    $donnes["titre"] = "Login" ; 
                    $donnes["articles"] = afficher_Blog(); 
                    require_once("views\Header.php");
                    require_once("views\PageBlog.php");
                    require_once("views\Footer.php");
                   
                   // header("Location: index.php?commande=PageProtege");
                    die(); 
                  
                }
            
              else 
                {
                    $donnees["messageErreur"] = "Combinaison username / password invalide."; 
                    $donnes["titre"] = "Login" ; 
                   
                    require_once("views\Header.php");
                    require_once("views\FormulaireDeLogin.php");
                    require_once("views\Footer.php");
                    
                }   
            }
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

        case "FormulaireAjouterArticle":

                //  verifier l'existence 
                if(!isset($_SESSION["usager"]))
                {
           
                   header("Location: index.php?commande=FormulaireDeLogin");
                  
                   die();
                }
                else {
                    require_once("views/Header.php");
                require_once("views/FormulaireAjouterArticle.php");
                require_once("views/Footer.php");
                break;
                }
                
        case "ajouteArticle":
                
                if(isset($_REQUEST["titre"], $_REQUEST["texte"]))

                {
                     //ici mettre la validation nécessaire en fonction des champs du formulaire
                $titre = trim($_REQUEST["titre"]);
                $texte = trim($_REQUEST["texte"]);
                $idAuteur = $_SESSION["usager"] ;

                if( $titre != "" && $texte != "")
                {
                    $test = ajoute_Article($titre, $texte , $idAuteur);

                    if($test)
                           header("Location: index.php?commande=PageBlog");
                          
                    else 
                        header("Location: index.php");
                        
                    
                    die();
                }
                else 
                {
                    //réafficher le formulaire avec des messages d'erreurs
                    $donnees["messageErreur"] = "Il faut entrer des valeurs dans tous les champs.";
                    require_once("views/Header.php");
                    require_once("views/FormulaireAjouterArticle.php");
                    require_once("views/Footer.php");
                }
            }
            else
            {
                header("Location: index.php");
                die();
            }
            break;
        
            
        case "FormulaireModificationArticle":
            if(isset ($_REQUEST["idUsager"] ) )
            {
                $auteur= trim($_REQUEST["idUsager"]); 

            
                if ($_SESSION["usager"] != $auteur ) {

                   
                    header("Location: index.php");
                

                }
            }


            if(isset ($_REQUEST["idArticle"] ))
            {
                
                $article = obetenir_article_par_id($_REQUEST["idArticle"]) ;


                    if ($article === false) 
                    {
                       
                        header("Location: index.php");
                        die();

                        

                    }
                    else 
                    {
                        require_once("views/Header.php");
                      //  $donnes["articles"] = afficher_Blog() ;
                        $donnees["article"] = $article;
                        require_once("views/FormulaireModifArticle.php");
                        require_once("views/Footer.php");
                    }
            }        
            else
            {
                header("Location: index.php");
                        die();
            }
            break;

        case "ModificationArticle":
            if(isset($_REQUEST["titre"], $_REQUEST["texte"], $_REQUEST["idArticle"] ))
            {
                    //validation  champs du formulaire
                    $titre = trim($_REQUEST["titre"]); 
                    $texte = trim($_REQUEST["texte"]);
                    $idArticle= trim($_REQUEST["idArticle"]); 

                    if($titre != "" && $texte != "" && is_numeric($idArticle) )
                    {
                        //procéder à l'insertion
                        $test = modifie_article($idArticle, $titre, $texte);

                        if($test)
                            header("Location: index.php?commande=PageBlog");
                        else 
                            header("Location: index.php");
                    }
                    else 
                    {
                        //réafficher le formulaire avec des messages d'erreurs
                        $article = obetenir_article_par_id($idArticle);

                        if($article === false)
                        {
                            header("Location: index.php");
                            die();
                        }
                        else 
                        {
                            $donnees["messageErreur"] = "Il faut entrer des valeurs dans tous les champs.";
                            require_once("views/Header.php");
                           
                            $donnees["article"] = $article;
                            require_once("views/FormulaireModifArticle.php");
                            require_once("views/Footer.php");
                        }
                    }
            }
            else
            {
                    header("Location: index.php");
                    die();
            }
            break;    
        



        case "supprimeArticle":
           
        if(isset($_REQUEST["idArticle"]) )
                              

            {   
                $_SESSION["testif"] = "dans le if " ;

                $idArticle = trim($_REQUEST["idArticle"]); 
                //procéder à la suppression
                $test = supprime_article($_REQUEST["idArticle"]);

                if($test)
                {
                    $_SESSION["testif"] = "true" ;
                    header("Location: index.php?commande=PageBlog");
                    die();
                }
                else 
                {
                    $_SESSION["testif"] = "false" ;
                    header("Location: index.php");
                    die();
                  
                }
            }
            else 
            {
                $_SESSION["testif"] = "autre" ;
                header("Location: index.php");
                die();
               
            }
            break;
        


        case "Recherche":
          if(isset($_REQUEST["txtRecherche"]))
            {
                    $donnees["recherche"] = $_REQUEST["txtRecherche"];
                    $donnes["usagers"] = obtenir_usagers(); 
                    $donnes["articles"] = recherche($_REQUEST["txtRecherche"]);
                    require_once("views\Header.php");
                    require_once("views\PageBlog.php");
                    require_once("views/Footer.php");
            }
          break;
        default:
       
         header("Location: index.php");
       

         die();
        
    }

?>

