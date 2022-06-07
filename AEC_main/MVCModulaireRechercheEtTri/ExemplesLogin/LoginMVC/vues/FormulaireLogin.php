       <form method="POST" action="index.php">
            Username : <input type="text" name="user"/><br>
            Password : <input type="password" name="pass"/><br>
            <input type="hidden" name="commande" value="Login"/>
            <input type="submit" value="Login"/>
        </form>
        <?php
            if(isset($donnees["message"]))
                echo "<p>" . $donnees["message"] . "</p>";
        ?>