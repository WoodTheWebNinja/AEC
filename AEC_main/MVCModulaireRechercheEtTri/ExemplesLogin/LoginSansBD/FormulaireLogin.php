<?php 
    session_start();

    define("USERNAME", "admin");
    define("PASSWORD", "12345");

    //si j'arrive du formulaire, valider les infos
    if(isset($_POST["user"], $_POST["pass"]))
    {
        //vérifier que la combinaison user / pass est valide
        if($_POST["user"] == USERNAME && $_POST["pass"] == PASSWORD)
        {
            //l'usager doit être authentifié
            $_SESSION["authentifie"] = "oui";
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