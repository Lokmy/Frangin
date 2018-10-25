<?php
include("menu.php");

    $sql = "SELECT * FROM user WHERE id = '" . $_SESSION['idUser'] . "'";
    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
        // output data of each row
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          $user[] = $row;
        }

    echo "<h2>".$user[0]["nom"]." ".$user[0]["prenom"]."</h2> <h3>Sandwich favori :</h3>";

      $sql = "SELECT * FROM commande WHERE idUser = '" . $_SESSION['idUser'] . "' and idEvent = '00000'";
      $result = $conn->query($sql);
      if ($result->rowCount() > 0) {
          // output data of each row
          while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $fav[] = $row;
          }
          $phrasefav = " favori sélectionné";
          $bouton = "<button onclick=\"window.location='favori.php?first=0';\">Je modifie mon sandwich favori !</button>";
      } else {
        $phrasefav = "Aucun favori sélectionné";
        $bouton = "<button onclick=\"window.location='favori.php?first=1';\">Je choisi mon sandwich favori !</button>";
      }

      echo "<p> $phrasefav $bouton </p>";
    }
?>
