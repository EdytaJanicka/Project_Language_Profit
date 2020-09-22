<?php
session_start();

$connect = mysqli_connect("localhost", "root", "", "profit_language");
  mysqli_set_charset($connect, "utf8");

$id = $_POST['id'];
  $sql = "SELECT `id_slowka`, `slowo`, `slowo_ang`, `id_dzialu`  FROM `slowa` WHERE `id_slowka`='$id'";

  if ($result = mysqli_query($connect, $sql)) {

$row = mysqli_fetch_assoc($result);

$sesja = $_SESSION['login'];
$sql1 = "SELECT * FROM `zdane_polaczenie` WHERE `login`='$sesja'";
$result1 = mysqli_query($connect, $sql1);
$zd = mysqli_fetch_assoc($result1);
$ids = $zd['id_slowka'];
if(isset($_POST['slowoang'])){
  $slowo_ang = $_POST['slowoang'];
  if($slowo_ang == $row['slowo_ang']){
    $sql2 ="UPDATE `zdane_polaczenie` SET `zdane`='Yes' WHERE `id_slowka`='$id' AND `login`='$sesja';";
    mysqli_query($connect, $sql2);



}



    }
  }if($row['id_dzialu']=='1' || $row['id_dzialu']=='2' || $row['id_dzialu']=='3'){
 header('location: e12u.php');
}else if($row['id_dzialu']=='4' || $row['id_dzialu']=='5' || $row['id_dzialu']=='6'){
  header('location: e13u.php');
}else header('location: e14u.php');
  ?>
