<?php
session_start();
if (!empty($_POST['login']) && !empty($_POST['haslo']) && !empty($_POST['administrator']) && !empty($_POST['mail'])){

  $connect = mysqli_connect("localhost", "root", "", "profit_language");
  mysqli_set_charset($connect, 'utf8');
 $login = $_POST['login'];
 $haslo = $_POST['haslo'];
 $administrator = $_POST['administrator'];
 $mail = $_POST['mail'];
 $id = $_POST['id'];

 $sql = "UPDATE `uzytkownik` SET `login`='$login',`haslo`='$haslo',`administrator`='$administrator',`mail`='$mail' WHERE `login`='$id';";

 mysqli_query($connect, $sql);
}else{
  $_SESSION['error'] = "Wypełnij wszystkie pola";
}
header('location: ../panel_admin.php');
 ?>
