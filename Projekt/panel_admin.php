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
                        <!--
                        <div class="dropdown-divider"></div>
                        </div>
                        Tutaj mogą być wszystkie słówka
                      -->
                </li>


      <?php
      if(isset($_SESSION['zalogowany'])){
      if($_SESSION['zalogowany'] == true){

        echo <<<HUH
          <li class="nav-item"> <a href="panel_admin.php" class="nav-link">Panel</a> </li>
         <li class="nav-item"><form class="" action="panel_admin.php" method="post"> <button type="submit" class="but1" name="logout"><h3 class="head4">Wyloguj się</h3></button></form> </li>
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
  <div class="jumbotron col-md-8">
    <div class="jumbotron">

      <?php
      $connect = mysqli_connect("localhost", "root", "", "profit_language");
      mysqli_set_charset($connect, 'utf8');
      $sql = "SELECT * FROM `uzytkownik`";

      if(isset($_SESSION['error'])){
        echo "<div class = \"red\">$_SESSION[error]</div>";
        unset($_SESSION['error']);

      }
      if ($result = mysqli_query($connect, $sql)) {

      echo <<<TABLE
      <table class="tabela">
        <tr>
          <th>Login</th>
          <th>Hasło</th>
          <th>Administrator</th>
          <th>Mail</th>
          <th colspan="2">Operacje</th>

        </tr>
TABLE;

      while ($row = mysqli_fetch_assoc($result)) {
        echo <<<ROW
        <tr>
          <td>$row[login]</td>
          <td>$row[haslo]</td>
          <td>$row[administrator]</td>
          <td>$row[mail]</td>
          <td><a href="./scripts/delete_user.php?id=$row[login]" class="nones">Usuń</a></td>
          <td><a href="./panel_admin.php?updateId=$row[login]" class="nones">Aktualizuj</a></td>

        </tr>
ROW;
      }
      ?></table><div class="row"><div class="jumbotron col-md-6 col-sm-12"><?php

      echo <<<FORMADDUSER
      <h3>Dodawanie użytkownika</h3>
      <form class="" action="./scripts/add_user.php" method="post">
        Login : <input type="text" name="login" placeholder="Janusz"><br><br>
        Hasło : <input type="text" name="haslo" placeholder="1234"><br><br>
        Czy admin (1,2,3) : <input type="text" name="administrator"><br><br>
        Mail : <input type="text" name="mail"><br><br>
        <input type="submit" name="button" value="Dodaj użytkownika">
      </form>
</div>


FORMADDUSER;

      if(isset($_GET['updateId'])){
        $id = $_GET['updateId'];
        $sql1 = "SELECT * FROM `uzytkownik` WHERE `login`='$id'";
        $result1 = mysqli_query($connect, $sql1);
        $user = mysqli_fetch_assoc($result1);

        $login = $user['login'];
        $haslo = $user['haslo'];
        $administrator = $user['administrator'];
        $mail = $user['mail'];


?><div class="jumbotron col-md-6 col-sm-12"><?php
        echo <<<FORMUPDATEUSSER
        <h3>Aktualizacja użytkownika</h3>
          <form class="" action="./scripts/update_user.php" method="post">
          Login : <input type="text" name="login" value="$login"><br><br>
          Hasło : <input type="text" name="haslo" value="$haslo"><br><br>
          Czy admin (1,2,3) : <input type="text" name="administrator" value="$administrator"><br><br>
          Mail : <input type="text" name="mail" value="$mail"><br><br>
          <input type="hidden" name="id" value="$id"><br><br>
          <input type="submit" name="" value="Aktualizuj użytkownika">
        </form>
</div>
FORMUPDATEUSSER;
      }


      }else {
        echo "błędne zapytanie";
      }
     ?>
</div>
      </div>
      <?php
      $sql2 ="SELECT `slowa`.`slowo`, `slowa`.`slowo_ang`, `slowa`.`id_slowka`, `dzial`.`dzial` FROM `dzial`, `slowa` WHERE `slowa`.`id_dzialu`=`dzial`.`id_dzialu`; ";

      if ($result2 = mysqli_query($connect, $sql2)) {

      echo <<<TABLES
      <table class="tabela">
        <tr>
          <th>Id słowa</th>
          <th>Słowo</th>
          <th>Słowo ang.</th>
          <th>Dział</th>
          <th colspan="2">Operacje</th>
        </tr>
TABLES;

      while ($row = mysqli_fetch_assoc($result2)) {

        echo <<<ROWS
        <tr>
          <td>$row[id_slowka]</td>
          <td>$row[slowo]</td>
          <td>$row[slowo_ang]</td>
          <td>$row[dzial]</td>
          <td><a href="./scripts/delete_word.php?id=$row[id_slowka]" class="nones">Usuń</a></td>
          <td><a href="./panel_admin.php?updatesId=$row[id_slowka]" class="nones">Aktualizuj</a></td>
</tr>
ROWS;

//ogólnie na tym etapie jestem mocno zirytowana, ponieważ nie działa mi przekazanie id, po
//mimo że wyżej ten sam kod działał UGH, nie rozumiem kompletnie dlaczego za drugim
//razem zmienna nie jest przekazywana, przeryłam całego stock overflowa i nie znalazłam
//nic pożytecznego, więc ogólnie wyżej działa usuwanie, tutaj nie ehhh

      }
      ?></table><div class="row"><div class="jumbotron col-md-6 col-sm-12"><?php

      echo <<<FORMADDWORD
      <h3>Dodawanie Słów</h3>
      <form class="" action="./scripts/add_word.php" method="post">
        Id : <input type="text" name="id_slowo" placeholder="0"><br><br>
        Słowo : <input type="text" name="slowo" placeholder="Fish"><br><br>
        Słowo ang. : <input type="text" name="slowo_ang"><br><br>
        Dział : <input type="text" name="dzial"><br><br>
        <input type="submit" name="button" value="Dodaj Słowo">
      </form>
      </div>
      FORMADDWORD;

      if(isset($_GET['updatesId'])){
        $id1 = $_GET['updatesId'];
        $sql3 ="SELECT `slowa`.`slowo`, `slowa`.`slowo_ang`,`slowa`.`id_dzialu`, `slowa`.`id_slowka`, `dzial`.`dzial` FROM `dzial`, `slowa` WHERE `slowa`.`id_dzialu`=`dzial`.`id_dzialu`; ";
        $result3 = mysqli_query($connect, $sql3);
        $slowo = mysqli_fetch_assoc($result3);
        mysqli_close($connect);

        $slowko = $slowo['slowo'];
        $id_slowka = $slowo['id_slowka'];
        $dzial = $slowo['dzial'];
        $slowo_ang = $slowo['slowo_ang'];


      ?><div class="jumbotron col-md-6 col-sm-12"><?php
        echo <<<FORMUPDATEWORD
        <h3>Aktualizacja Słówek</h3>
          <form class="" action="./scripts/update_user.php" method="post">
          Id : <input type="text" name="id_slowka" value="$id_slowka"><br><br>
          Słówko : <input type="text" name="slowko" value="$slowko"><br><br>
          Słówko ang. : <input type="text" name="slowko_ang" value="$slowo_ang"><br><br>
          Dział : <input type="text" name="dzial" value="$dzial"><br><br>
          <input type="hidden" name="id" value="$id1"><br><br>
          <input type="submit" name="" value="Aktualizuj użytkownika">
        </form>
      </div>
      FORMUPDATEWORD;
      }
    }
  ?>





</div>
</div>

            <div class="jumbotron col-md-4">
              <div class="pan">

                <h3>Login:  <?php echo $_SESSION['login'] ?></h3>

              </div>
            </div>
        </div>

  </body>
</html>
