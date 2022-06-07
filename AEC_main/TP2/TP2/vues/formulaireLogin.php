<link rel="stylesheet" href="vues/style.css">
<div class="wrapper login">
        <form method="POST" action="index.php">
            <fieldset>
            Username : <input type="text" name="user"/><br>
            Password : <input type="password" name="pass"/><br>
            <input type="hidden" name="commande" value="login"/>
            <input type="submit" value="Login"/>
            </fieldset>
        </form>

<?php
    
    if(isset($donnees["message"]))
        echo "<p>" . $donnees["message"] . "</p>";
?>
