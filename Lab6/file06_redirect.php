<?php
session_start();
$link=mysqli_connect("localhost","scott","tiger","instytut");
if(!$link)
{
  $_SESSION['sql_error']="Próba połączenia z bazą wywowała błąd:</br>".mysqli_connect_error();
  header('Location: file06_post.php');
}

  if (isset($_POST['id_prac'])      &&
      is_numeric($_POST['id_prac']) &&
      is_string($_POST['nazwisko'])
  )
    {
      $sql="INSERT INTO pracownicy(id_prac,nazwisko)VALUES(?,?)";
      $stmt=$link->prepare($sql);
      $stmt->bind_param("is",$_POST['id_prac'],$_POST['nazwisko']);
      $result=$stmt->execute();
      if(!$result)
      {
        $_SESSION['sql']="Napotkano błąd sql:</br>".mysqli_error($link);
        header('Location: file06_post.php');
      }
      else
      {
        $_SESSION['sql']="Dodano nowego pracownika.</br>".mysqli_error($link);
        header('Location: file06_get.php');
      }
      $stmt->close();
    }
?>
