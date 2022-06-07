<?php

     if(isset($_POST["pass"]))
     {
         $hashed = password_hash($_POST["pass"], PASSWORD_DEFAULT);
     }
     
?>
        <div class="login">
        <form method="POST" action="index.php">
                    Username : <input type="text" name="user"/><br>
                    Password : <input type="password" name="pass"/><br>
                    <input type="hidden" name="commande" value="Login"/>
                    <br>
                    <input type="submit" value="Login"/>
                </form>
                
        </div>
        <?php 


    if(isset($donnees["messageErreur"]))
    {
        echo "<p class='erreure'>{$donnees["messageErreur"]}</p>";
    }

   
        ?>