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


      <li class="nav-item"> <a href="logowanie.php" class="nav-link">Zaloguj się</a> </li>
      <li class="nav-item"> <a href="rejestracja.php" class="nav-link">Zarejestruj się</a> </li>

    </ul>
  </div>
</nav>
</div>



      <div class="jumbotron">
        <div class="bgcolsrej col-lg-8">
          <form class="" action="rejestracja.php" method="post">
            <div class="form-group">
              <label for="email"><h3 class="head3">Login:</h3> </label>
              <input type="text" class="form-control col-lg-4 col-md-6 wd" name="login" id="email" placeholder="Wpisz login">
            </div>
            <div class="form-group">
              <label for="email"><h3 class="head3">Email:</h3> </label>
              <input type="text" class="form-control col-lg-4 col-md-6 wd" name="email" id="email" placeholder="Wpisz email">
            </div>
            <div class="form-group">
              <label for="pwd"><h3 class="head3">Hasło:</h3></label>
              <input type="password" class="form-control col-lg-4 col-md-6 wd" name="pwd" id="pwd" placeholder="Wpisz hasło">
            </div>
            <div class="form-group">
              <label for="pwd"><h3 class="head3">Powtórz Hasło:</h3></label>
              <input type="password" class="form-control col-lg-4 col-md-6 wd" name="pwd1" id="pwd" placeholder="Wpisz hasło ponownie">
            </div>
            <div class="form-group form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Zapamiętaj mnie
              </label>
            </div>
            <button type="submit" class="but" name="butt"><h3 class="head3">Zarejestruj się</h3></button>    <!-- tutaj w razie czego będzie przenosić do panel.php, albo użytkownik wybierze sobie słówka, jeszcze nie zdecydowałam ale póki co sam szablon bez php -->
  </form>
</div>
      </div>

      <?php
          //skrypt 1 - connect
          if(isset($_POST["login"]) && isset($_POST["pwd"]) && isset($_POST["pwd1"]) && isset($_POST["email"])&& isset($_POST["butt"])){

          $login = $_POST["login"];
          $haslo = $_POST["pwd"];
          $haslo1 = $_POST["pwd1"];
          $email = $_POST["email"];

          $connect = mysqli_connect("localhost", "root", "", "profit_language");
          mysqli_set_charset($connect, 'utf8');
          $sql="SELECT `login` FROM `uzytkownik` WHERE `login`='$login'";
          $add= "INSERT INTO `uzytkownik`(`login`, `haslo`, `administrator`, `mail`) VALUES ('$login','$haslo',\"no\",'$email')";
          $result = mysqli_query($connect, $sql);
          if(mysqli_fetch_assoc($result)!=$login){
            if(strlen($login)> 2 && strlen($login) < 11){
              if(strlen($haslo) > 7){
                  if($haslo==$haslo1){

                    mysqli_query($connect, $add);
                    header("Location:logowanie.php");


                  }else{
                    echo "Hasła nie są identyczne";
                  }
            }else{
            echo "Hasło jest za krótkie. Minimum 8 znaków";
          }
          }else{
            echo "Login jest za krótki, albo za długi. Powinien zawierać 3-10 znaków";
          }
          }else{
            echo "Podany login już istnieje";
          }

           mysqli_close($connect);
         }else if(isset($_POST["butt"])){
           echo "Uzupełnij wszystkie pola";
         }

      ?>


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
