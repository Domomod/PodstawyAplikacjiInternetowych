<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP</title>
        <meta charset='UTF-8' />
    </head>
    <body>
        <?php 
            require("funkcje.php");
            if(isSet($_POST['wyloguj']))
            {
                echo "Wylogowałeś się z konta";
                $_SESSION['zalogowany'] = 0;
            }
        ?>

        <h1>Nasz system</h1>
        <h2>Logowanie</h2>
        <form action="logowanie.php" method="post">
            <label for="login">Login:</label>
            <input type="text" name="login"/><br>
            <label for="hasło">Hasło:</label>
            <input type="password" name="hasło"/><br>
            <input type="submit" value="Zaloguj" name="zaloguj"/>
        </form>

        <a href="user.php">Jestem już zalogowany</a>

        <h2>Ciasteczka</h2>
        <form action="cookie.php" method="get">
            <label for="czas">Czas życia:</label>
            <input type="number" name="czas" style="width:40px;" value="10">
            <input type="submit" name="utworzCookie" value="Utwórz ciasteczko"/>
        </form>

        <?php 
            if(isset($_COOKIE['nazwa']))
            {
                $val = $_COOKIE['nazwa'];
                echo" Pobrana wartość: $val";
            }
        ?>

    </body>
</html>
