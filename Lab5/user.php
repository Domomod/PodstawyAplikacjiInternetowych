<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP</title>
        <meta charset='UTF-8' />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <?php 
            function check_login()
            {
                require_once("funkcje.php");

                if(isSet($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == 1)
                {
                    echo $_SESSION['zalogowanyImie'] . "<br>";
                }
                else
                {
                    header("Location: index.php");
                }
            }

            function get_extension($file) {
                $extension = explode(".", $file);
                $extension = end($extension);
                return $extension ? $extension : false;
               }

            function process_uploaded_file()
            {/* Postanowiłem zmienić trochę zachowanie strony, każdy użytkonik ma przypisane jedno zdjęcie (rozpoznawane po loginie).
                Coś jak zdjęcie profilowe*/
                
                if(isset($_FILES['myfile']))
                {
                    if( file_exists($_FILES["myfile"]['tmp_name']) 
                    || is_uploaded_file($_FILES["myfile"]['tmp_name'])) 
                    { /*plik załadowany*/ 
                        if($iSize = getimagesize($_FILES["myfile"]["tmp_name"] ))
                        { /*plik jest obrazem*/
                            $cwd = getcwd();
                            $dir = (DIRECTORY_SEPARATOR === '\\'? '\\user_images\\' : "/user_images/");
                            $fName      = $_FILES['myfile']['size'];
                            $fSize      = $_FILES['myfile']['size'];
                            $fTmpName   = $_FILES['myfile']['tmp_name'];
                            $fType      = $_FILES['myfile']['type'];
                            $fExtension = get_extension($fName);


                            list($width, $height, $type, $attr) = $iSize;
                            $max_size = 640;
                            if($width > $max_size)
                            {/*Postanowiłem sprawdzić czy można wyświetlać alerty przy pomocy echo*/
                                echo "
                                <script type=\"text/javascript\">
                                    $(document).ready(function () {
                                        alert('Szerokość zdjęcia przekracza $max_size');
                                    });
                                </script>
                               ";                                
                            }
                            else if($height > $max_size)
                            {
                                echo "
                                <script type=\"text/javascript\">
                                    $(document).ready(function () {
                                        alert('Wysokość zdjęcia przekracza $max_size');
                                    });
                                </script>
                               ";                                          
                            }
                            else
                            {
                                $login =$_SESSION['zalogowanyLogin'];
                                $path = $cwd . $dir . $login . ".jpg";
                                if(!move_uploaded_file($fTmpName, $path))
                                {
                                    echo "W czasie ładowania obrazu wystąpił nieoczekiwany błąd.";
                                }
                            }
                            
                        }
                        else
                        {
                            echo "Wybrany plik nie jest zdjęciem<br>";
                        }
                    }
                }
            }

            function display_image()
            {
                $dir = (DIRECTORY_SEPARATOR === '\\'? 'user_images\\' : "user_images/");
                $fName      = $_SESSION['zalogowanyLogin'] . ".jpg";
                $path = $dir . $fName;
                $size = 250;
                echo "<img src=\"$path\" alt=\"Nie wybrano zdjęcia\" height=\"$size\" width=\"$size\">";
            }
        ?>
    </head>
    <body>
        <?php
            check_login();
            process_uploaded_file();
            display_image();
        ?>

        <form action="user.php" method="post"  enctype='multipart/form-data'> <!-- Ukrywa komunikat "Nie wybrano pliku" oraz wysyła formularz od razu po wybraniu zdjęcia -->
            <input id="upload_file" type="file" onchange="form.submit();" style="display:none;" name="myfile">
            <button id="filthy_hack">Zmień zdjęcie</button>
            <script>$('#filthy_hack').on('click', function() { $('#upload_file').click(); return false;});</script>
        </form>

        <form action="index.php" method="post">
            <input type="submit" value="Wyloguj" name="wyloguj"/>
        </form>

        <a href="index.php">Wróć do logowania</a>
    </body>
</html>
