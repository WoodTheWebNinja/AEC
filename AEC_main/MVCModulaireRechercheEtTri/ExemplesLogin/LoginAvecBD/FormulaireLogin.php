<?php 
    session_start();

    require_once("modele.php");
    //si j'arrive du formulaire, valider les infos
    if(isset($_POST["user"], $_POST["pass"]))
    {
        //vérifier que la combinaison user / pass est valide
        $test = login($_POST["user"], $_POST["pass"]);

        if($test)
        {
            //l'usager doit être authentifié
            $_SESSION["usager"] = $_POST["user"];
            header("Location: PageProtegee.php");
            die();
        }
        else 
        {
            $message = "Combinaison username / password invalide.";
        }
    }

?>
<html>
    <head>
        <title>Page de login</title>
    </head>
    <body>
        <form method="POST">
            Username : <input type="text" name="user"/><br>
            Password : <input type="password" name="pass"/><br>
            <input type="submit" value="Login"/>
        </form>
        <?php
            if(isset($message))
                echo "<p>$message</p>";
        ?>
    </body>
</html>