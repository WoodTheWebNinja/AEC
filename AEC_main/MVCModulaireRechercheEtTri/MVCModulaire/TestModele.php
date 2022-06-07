<?php

    require_once("modele.php");

    //test de la fonction obtenir_equipes()
    $equipes = obtenir_equipes();
    var_dump($equipes);

    //test de la fonction obtenir_joueurs_par_equipe()
    $joueurs = obtenir_joueurs_par_equipe(1);
    var_dump($joueurs);

    //test de la fonction obtenir_equipe_par_id()
    $joueurs = obtenir_equipe_par_id(1);
    var_dump($joueurs);


     //test de la fonction ajoute_equipe()
     $booleen = ajoute_equipe("test", "test");
     var_dump($booleen);
?>