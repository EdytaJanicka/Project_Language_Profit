<?php
session_start();
if(isset($_POST['button']) && !empty($_POST['login']) && !empty($_POST['haslo']) && !empty($_POST['administrator']) && !empty($_POST['mail'])){


  $login = $_POST['login'];
  $haslo = $_POST['haslo'];
  $administrator = $_POST['administrator'];
  $mail = $_POST['mail'];


  $connect = mysqli_connect("localhost", "root", "", "profit_language");
  mysqli_set_charset($connect, 'utf8');

  $sql = "INSERT INTO `uzytkownik` (`login`, `haslo`, `administrator`, `mail`) VALUES ('$login', '$haslo','$administrator', '$mail')";

  mysqli_query($connect, $sql);
  }
  else{
  $_SESSION['error'] = "Wypełnij wszystkie pola";
  }
header('location: ../panel_admin.php');
 ?>
