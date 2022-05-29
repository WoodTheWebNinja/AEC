<?php 
    session_start();

    //vérifier l'existence d'une variable session qui ne va exister que si l'usager a entré la bonne combinaison user / pass
    if(!isset($_SESSION["usager"]))
    {
        //rediriger l'utilisateur vers la page de login qui, elle, s'occupe d'initialiser la variable session correctement en cas de login
        header("Location: FormulaireLogin.php");
        die();
    }

?>
<html>
    <head>
        <title>Page protégée</title>
    </head>
    <body>
        <h1>Bienvenue sur la page protégée, <?= $_SESSION["usager"] ?></h1>
        <a href="Logout.php">Log out</a>
    </body>
</html>
