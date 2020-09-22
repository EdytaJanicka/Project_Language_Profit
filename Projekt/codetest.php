<?php
  $connect = mysqli_connect("localhost", "root", "", "profit_language");
  mysqli_set_charset($connect, "utf8");
  $_SESSION['ileslowek'] = 0;

  $sql = "SELECT `id_slowka`, `slowo`, `slowo_ang`  FROM `slowa` WHERE `id_dzialu`='$dzial'";

  if ($result = mysqli_query($connect, $sql)) {

    while ($row = mysqli_fetch_assoc($result)) {
      $id=$row['id_slowka'];
      $sesja = $_SESSION['login'];
      $sql1 = "SELECT *  FROM `zdane_polaczenie` WHERE `id_slowka`='$id' AND `login`='$sesja';";
      $result1 = mysqli_query($connect, $sql1);
      $rows = mysqli_fetch_assoc($result1);
      echo <<<ROW
      <div class="jumbotron heigh flip-container" onclick="this.classList.toggle('hover');">
  <div class="flipper" class="bgcol">
    <div class="front" class="bgcol">
ROW; if($rows['zdane'] == 'Yes'){
echo <<<ROW1
      <div class="bgcolzdane">
        <p>$row[slowo]</p>
      </div>
    </div>
    <div class="back" >
      <div class="bgcolzdane">
        <form class="inp" action="codetest1.php" method="post">
          <input class="inp inpu" type="text" name="slowoang" placeholder="$row[slowo]">
          <input type="hidden" name="id" value="$row[id_slowka]">
          </form>
      </div>
    </div>
  </div>
</div>
ROW1;
$_SESSION['ileslowek'] = $_SESSION['ileslowek']+1;
}else{
  echo <<<ROW2
        <div class="bgcol">
          <p>$row[slowo]</p>
        </div>
      </div>
      <div class="back" >
        <div class="bgcol">
          <form class="inp" action="codetest1.php" method="post">
            <input class="inp inpu" type="text" name="slowoang" placeholder="$row[slowo]">
            <input type="hidden" name="id" value="$row[id_slowka]">
            </form>
        </div>
      </div>
    </div>
  </div>
  ROW2;

}
}



    }

  ?>
