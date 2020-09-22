<?php
session_start();
if (!empty($_POST['id_slowka']) && !empty($_POST['slowko']) && !empty($_POST['slowo_ang']) && !empty($_POST['dzial'])){

$connect = mysqli_connect("localhost", "root", "", "profit_language");
mysqli_set_charset($connect, 'utf8');
$slowko = $_POST['slowo'];
$id_slowka = $_POST['id_slowo'];
$dzial = $_POST['dzial'];
$slowo_ang = $_POST['slowo_ang'];
 $id = $_POST['id'];
 $sql = "SELECT * FROM `dzial` WHERE `dzial`='$dzial'";
 $result = mysqli_query($connect, $sql);
 $slowo = mysqli_fetch_assoc($result);
 $iddzial=$slowo['id_dzialu'];
 $sql1 = "UPDATE `slowa` SET `id_slowka`='$id_slowka',`slowo`='$slowko',`slowo_ang`='$slowo_ang',`id_dzial`='$iddzial' WHERE `id_slowka`='$id';";

 mysqli_query($connect, $sql1);
}else{
  $_SESSION['error'] = "Wypełnij wszystkie pola";
}
header('location: ../panel_admin.php');
 ?>
