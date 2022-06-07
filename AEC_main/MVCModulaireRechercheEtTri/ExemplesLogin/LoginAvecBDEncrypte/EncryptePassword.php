<?php
    if(isset($_POST["pass"]))
    {
        $hashed = password_hash($_POST["pass"], PASSWORD_DEFAULT);
    }
?>
<html>
    <head>
        <title>Encryption de mot de passe</title>
    </head>
    <body>
        <form method="POST">
            Password : <input type="text" name="pass"/><br>
            <input type="submit" value="Encrypter"/>
        </form>
        <?php
            if(isset($hashed))
                echo "<p>$hashed</p>";
        ?>
    </body>
</html>