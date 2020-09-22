<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Language Profit</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  </head>
  <body>
    <nav class="navbar navbar-expand-md justify-content-center fixed-top">

  <a class="navbar-brand" href="index.php"><img src="lprofit.png" id="pic"></a>


  <button class="navbar-toggler ml-auto custom-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ">
        <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Kursy</a>
                    <div class="dropdown-menu pows">
                        <a href="e12.php" class="dropdown-item pow">E12</a>
                        <a href="e13.php" class="dropdown-item pow">E13</a>
                        <a href="e14.php" class="dropdown-item pow">E14</a>

                </li>



      <?php
      if(isset($_SESSION['zalogowany'])){
      if($_SESSION['zalogowany'] == true){

        echo <<<HUH
        <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Test</a>
        <div class="dropdown-menu pows">
            <a href="e12u.php" class="dropdown-item pow">E12</a>
            <a href="e13u.php" class="dropdown-item pow">E13</a>
            <a href="e14u.php" class="dropdown-item pow">E14</a>
            </li>
          <li class="nav-item"> <a href="panel.php" class="nav-link">Panel</a> </li>
         <li class="nav-item"><form class="" action="panel.php" method="post"> <button type="submit" class="but1" name="logout"><h3 class="head4">Wyloguj się</h3></button></form> </li>
HUH;

        if(isset($_POST["logout"])){
          session_unset();
            echo <<<POP
          <script type='text/javascript'>
          window.location.reload();
          </script>

POP;
  header("Location:index.php");
        }
      }
      }else{
        echo <<<HUH
        <li class="nav-item"> <a href="logowanie.php" class="nav-link">Zaloguj się</a> </li>
        <li class="nav-item"> <a href="rejestracja.php" class="nav-link">Zarejestruj się</a> </li>
HUH;
}
       ?>
    </ul>
  </div>
</nav>
<div class="row">

<?php


$connect = mysqli_connect("localhost", "root", "", "profit_language");
mysqli_set_charset($connect, "utf8");

$sesja = $_SESSION['login'];
$sql = "SELECT *  FROM `zdane_polaczenie` WHERE `login`='$sesja'  AND `zdane`='Yes';";
$sql1 = "SELECT *  FROM `zdane_polaczenie` WHERE `login`='$sesja';";
$sql2 ="SELECT `zdane_polaczenie`.`zdane`, `slowa`.`id_dzialu` FROM `zdane_polaczenie`, `slowa` WHERE `zdane_polaczenie`.`id_slowka`=`slowa`.`id_slowka` AND `zdane_polaczenie`.`login`='$sesja'  AND `zdane_polaczenie`.`zdane`='Yes' AND (`slowa`.`id_dzialu`='1' OR `slowa`.`id_dzialu`='2' OR `slowa`.`id_dzialu`='3');";
$sql3 = "SELECT * FROM `zdane_polaczenie`, `slowa` WHERE `zdane_polaczenie`.`id_slowka`=`slowa`.`id_slowka` AND `zdane_polaczenie`.`login`='$sesja' AND (`slowa`.`id_dzialu`='1' OR `slowa`.`id_dzialu`='2' OR `slowa`.`id_dzialu`='3');";
$sql4 ="SELECT `zdane_polaczenie`.`zdane`, `slowa`.`id_dzialu` FROM `zdane_polaczenie`, `slowa` WHERE `zdane_polaczenie`.`id_slowka`=`slowa`.`id_slowka` AND `zdane_polaczenie`.`login`='$sesja'  AND `zdane_polaczenie`.`zdane`='Yes' AND (`slowa`.`id_dzialu`='4' OR `slowa`.`id_dzialu`='5' OR `slowa`.`id_dzialu`='6');";
$sql5 = "SELECT * FROM `zdane_polaczenie`, `slowa` WHERE `zdane_polaczenie`.`id_slowka`=`slowa`.`id_slowka` AND `zdane_polaczenie`.`login`='$sesja' AND (`slowa`.`id_dzialu`='4' OR `slowa`.`id_dzialu`='5' OR `slowa`.`id_dzialu`='6');";
$sql6 ="SELECT `zdane_polaczenie`.`zdane`, `slowa`.`id_dzialu` FROM `zdane_polaczenie`, `slowa` WHERE `zdane_polaczenie`.`id_slowka`=`slowa`.`id_slowka` AND `zdane_polaczenie`.`login`='$sesja'  AND `zdane_polaczenie`.`zdane`='Yes' AND (`slowa`.`id_dzialu`='7' OR `slowa`.`id_dzialu`='8' OR `slowa`.`id_dzialu`='9');";
$sql7 = "SELECT * FROM `zdane_polaczenie`, `slowa` WHERE `zdane_polaczenie`.`id_slowka`=`slowa`.`id_slowka` AND `zdane_polaczenie`.`login`='$sesja' AND (`slowa`.`id_dzialu`='7' OR `slowa`.`id_dzialu`='8' OR `slowa`.`id_dzialu`='9');";

$result = mysqli_query($connect, $sql);
$result1 = mysqli_query($connect, $sql1);
$result2 = mysqli_query($connect, $sql2);
$result3 = mysqli_query($connect, $sql3);
$result4 = mysqli_query($connect, $sql4);
$result5 = mysqli_query($connect, $sql5);
$result6 = mysqli_query($connect, $sql6);
$result7 = mysqli_query($connect, $sql7);

$rows = mysqli_num_rows($result);
$rows1 = mysqli_num_rows($result1);
$rows2 = mysqli_num_rows($result2);
$rows3 = mysqli_num_rows($result3);
$rows4 = mysqli_num_rows($result4);
$rows5 = mysqli_num_rows($result5);
$rows6 = mysqli_num_rows($result6);
$rows7 = mysqli_num_rows($result7);



?>

  <div class="jumbotron col-md-8">
    <div class="jumbotron hyh">

      <div class="row">

      <div class=" flex-wrapper  col-md-6   col-sm-12">
        <h3 class="cols">E12:</h3>
        <div class="single-chart col-lg-8 col-md-12">
          <svg viewBox="0 0 36 36" class="circular-chart colors">
            <path class="circle-bg"
            d="M18 2.0845
            a 15.9155 15.9155 0 0 1 0 31.831
            a 15.9155 15.9155 0 0 1 0 -31.831"
            />
            <path class="circle"
            stroke-dasharray="<?php echo round($rows2/$rows3*100,1); ?>, 100"
            d="M18 2.0845
            a 15.9155 15.9155 0 0 1 0 31.831
            a 15.9155 15.9155 0 0 1 0 -31.831"
            />
            <text x="18" y="20.35" class="percentage"><?php echo round($rows2/$rows3*100,1); ?>%</text>
          </svg>
        </div>
      </div>
      <div class=" kis  col-md-6 col-sm-12">
        <h3>Ilość zdanych słówek: <?php echo $rows2; ?>/<?php echo $rows3; ?> </h3>
      </div>
      </div>
      </div>

      <div class="jumbotron">

        <div class="row">

        <div class="flex-wrapper col-md-6   col-sm-12">
          <h3 class="cols">E13:</h3>
          <div class="single-chart col-lg-8 col-md-12">
            <svg viewBox="0 0 36 36" class="circular-chart colors">
              <path class="circle-bg"
              d="M18 2.0845
              a 15.9155 15.9155 0 0 1 0 31.831
              a 15.9155 15.9155 0 0 1 0 -31.831"
              />
              <path class="circle"
              stroke-dasharray="<?php echo round($rows4/$rows5*100,1); ?>, 100"
              d="M18 2.0845
              a 15.9155 15.9155 0 0 1 0 31.831
              a 15.9155 15.9155 0 0 1 0 -31.831"
              />
              <text x="18" y="20.35" class="percentage"><?php echo round($rows4/$rows5*100,1); ?>%</text>
            </svg>
          </div>
        </div>
        <div class=" kis  col-md-6 col-sm-12">
          <h3>Ilość zdanych słówek: <?php echo $rows4; ?>/<?php echo $rows5; ?> </h3>
        </div>
        </div>
        </div>


        <div class="jumbotron">

          <div class="row">

          <div class="flex-wrapper col-md-6   col-sm-12">
            <h3 class="cols">E14:</h3>
            <div class="single-chart col-lg-8 col-md-12">
              <svg viewBox="0 0 36 36" class="circular-chart colors">
                <path class="circle-bg"
                d="M18 2.0845
                a 15.9155 15.9155 0 0 1 0 31.831
                a 15.9155 15.9155 0 0 1 0 -31.831"
                />
                <path class="circle"
                stroke-dasharray="<?php echo round($rows6/$rows7*100,1); ?>, 100"
                d="M18 2.0845
                a 15.9155 15.9155 0 0 1 0 31.831
                a 15.9155 15.9155 0 0 1 0 -31.831"
                />
                <text x="18" y="20.35" class="percentage"><?php echo round($rows6/$rows7*100,1); ?>%</text>
              </svg>
            </div>
          </div>
          <div class=" kis  col-md-6 col-sm-12">
            <h3>Ilość zdanych słówek: <?php echo $rows6; ?>/<?php echo $rows7; ?> </h3>
          </div>
          </div>
          </div>
        </div>
            <div class="jumbotron col-md-4">
              <div class="pan">

                <h3>Login: <?php echo $_SESSION['login']; ?></h3>
                <h3>Ilość wszystkich słówek: <?php echo $rows; ?>/<?php echo $rows1; ?></h3>
                <h3>Procent: <?php echo round($rows/$rows1*100,1); ?>%</h3>

              </div>
            </div>
        </div>

      <footer class="page-footer font-small blue pt-4">
        <div class="container-fluid text-center text-md-left">
          <div class="row">
            <div class="col-md-6 mt-md-0 mt-3">
              <h5 class="text-uppercase">Profit Language</h5>
              <p>Profit Language powstało w zamyśle o młodych ludzi uczących się informatyki.
              Najważniejszym aspektem tego przedmiotu jest z całą pewnością, język angielki, dzięki któremu
            dużo łatwiej jest się nauczyć skomplikowanych zawiłości informatyki.</p>
            </div>
            <hr class="clearfix w-100 d-md-none pb-3">
            <div class="col-md-3 mb-md-0 mb-3">
              <h5 class="text-uppercase">Kontakt</h5>
              <ul class="list-unstyled">
                <li>
                  Numer tel: 111 111 111
                </li>
                <li>
                  Adres: Poznań, ul Grunwaldzka 66/6 61-123
                </li>
                <li>
                  Adres mailowy: language.profit@gmail.com
                </li>
              </ul>
            </div>
            <div class="col-md-3 mb-md-0 mb-3">
              <h5 class="text-uppercase">Linki</h5>
              <ul class="list-unstyled none">
                <li>
                  <a href="https://github.com/EdytaJanicka/Project_Language_Profit" class="none">Github</a>
                </li>
                <li>
                  <a href="#!" class="none">Link 2</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-copyright text-center py-3">© 2018 Copyright:
          <a class="none" href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
        </div>
      </footer>

  </body>
</html>
