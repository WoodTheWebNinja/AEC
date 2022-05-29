<br><br>
<br> <a href="index.php">Retourner à la page blog</a>
    </body>
</html>


<?php

       echo realpath("Header.php");

       if(isset($_SESSION["usager"]) && $_SESSION["usager"] != "visiteur") {
        $_usager = $_SESSION["usager"] ;

     
      echo  "<a href=" ."index.php?commande=Logout" ." >Logout</a> <br>" ;

    }
    else {
        echo  "<a href=" ."index.php?commande=FormulaireDeLogin" ." >Connectez-nous</a> <br>" ;

    }
    ?>