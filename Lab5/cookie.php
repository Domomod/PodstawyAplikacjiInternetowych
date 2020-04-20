<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP</title>
        <meta charset='UTF-8' />
    </head>
    <body>
        <?php
            require_once("funkcje.php");
            if(isset($_GET['czas']))
            {
                $ttl=$_GET['czas'];
                setcookie("nazwa", "Dlaczego dałeś mi tylko " .$ttl. " sekund życia :c", time() + $ttl, "/");
                if(isset($_COOKIE["nazwa"]))
                {
                    echo "Pomyślnie utworzono cookie<br>";
                }
                else 
                {
                    echo "Utworzenie cookie nie powiodło się<br>";
                }
            }
        ?>
        <a href="index.php">Wstecz</a>
    </body>
</html>
