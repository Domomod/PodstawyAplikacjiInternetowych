<?php
session_start();

print<<<KONIEC
  <html>
  <head>
    <metahttp-equiv="Content-Type"content="text/html;charset=utf-8"/>
  </head>

  <body>
    <form action="file06_redirect.php" method="POST">
      id_prac <input type="text"name="id_prac">
      nazwisko <input type="text"name="nazwisko">
      <input type="submit"value="Wstaw">
      <input type="reset"value="Wyczysc">
    </form>
KONIEC;

if(isset($_SESSION['sql_error']))
{
  echo "<p style='color:red'> {$_SESSION['sql_error']}</p>";
}

echo "<a href='file06_get.php'>Wyświetl pracowników</a>";
?>
