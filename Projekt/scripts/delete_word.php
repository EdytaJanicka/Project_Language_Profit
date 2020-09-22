<?php
  if (isset($_GET['slowo'])){
    $connect = mysqli_connect("localhost", "root", "", "profit_language");
    mysqli_set_charset($connect, 'utf8');
    $id = $_GET['slowo'];
    $sql = "DELETE FROM `slowa` WHERE `slowa`.`slowo` = '$id'";
    mysqli_query($connect, $sql);
 }
  header('location: ../panel_admin.php');
 ?>
