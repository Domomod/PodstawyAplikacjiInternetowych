<?php
session_start();
  $link=mysqli_connect("localhost","scott","tiger","instytut");
  if(!$link)
  {
    echo "Próba połączenia z bazą wywowała błąd:</br>".mysqli_connect_error();
    exit();
  }

  $sql="SELECT * FROM pracownicy";
  $result=$link->query($sql);
  foreach($result as $v){
    echo $v["ID_PRAC"]." ".$v["NAZWISKO"]."<br/>";
  }
  $result->free();
  $link->close();

  echo "<a href='file06_post.php'>Dodaj pracownika</a>";
?>
