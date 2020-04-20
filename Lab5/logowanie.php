
<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP</title>
        <meta charset='UTF-8' />
        <?php 
            require("funkcje.php");
        ?>
    </head>
    <body>
        <?php 
            if(isSet($_POST["zaloguj"]))
            {
                $name = $_POST["login"];
                $pwd = $_POST["hasło"];
                echo "Przesłany login: " . $name . "<br>Przesłane hasło: " . $pwd;

                if(try_login($name, $pwd, $osoba))
                {
                    $_SESSION['zalogowanyImie'] = $osoba->imieNazwisko;
                    $_SESSION['zalogowanyLogin'] = $osoba->login;

                    $_SESSION['zalogowany'] = 1;
                    header("Location: user.php");
                }
                else
                {
                    header("Location: index.php");
                }

            }
        ?>
    </body>
</html>
