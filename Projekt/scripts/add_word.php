<?php
session_start();
if(isset($_POST['button']) && !empty($_POST['id_slowo']) && !empty($_POST['slowo']) && !empty($_POST['slowo_ang']) && !empty($_POST['dzial'])){


  $slowko = $_POST['slowo'];
  $id_slowka = $_POST['id_slowo'];
  $dzial = $_POST['dzial'];
  $slowo_ang = $_POST['slowo_ang'];


  $connect = mysqli_connect("localhost", "root", "", "profit_language");
  mysqli_set_charset($connect, 'utf8');
  $sql = "SELECT * FROM `dzial` WHERE `dzial`='$dzial'";
  $result = mysqli_query($connect, $sql);
  $slowo = mysqli_fetch_assoc($result);
  $iddzial=$slowo['id_dzialu'];
  $sql1 = "INSERT INTO `slowa` (`id_slowka`, `slowo`, `slowo_ang`, `id_dzialu`) VALUES ('$id_slowka', '$slowko','$slowo_ang', '$iddzial')";

  mysqli_query($connect, $sql1);
  }
  else{
  $_SESSION['error'] = "Wypełnij wszystkie pola";
  }
header('location: ../panel_admin.php');
 ?>
