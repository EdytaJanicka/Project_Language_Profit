<?php
  if (isset($_GET['id'])) {
    $connect = mysqli_connect("localhost", "root", "", "profit_language");
    mysqli_set_charset($connect, 'utf8');
    $id = $_GET['id'];
    $sql = "DELETE FROM `uzytkownik` WHERE `uzytkownik`.`login` = '$id'";
    mysqli_query($connect, $sql);
  }
  header('location: ../panel_admin.php');
 ?>
