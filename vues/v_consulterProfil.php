<div id="contenu">
  <h1>Profil</h1>
  <?php
    echo "<p>NOM : ".$infos['nom']."</p>";
    echo "<p>PRENOM : ".$infos['prenom']."</p>";
    echo "<p>MAIL : ".$infos['mail']."</p>";

    if(empty($fav)){
      echo "<p>Aucun favori selectionné</p>";
      echo"<button onclick=\"window.location='index.php?uc=profil&action=changeFav'\">Choisir son favori</button>";
    }else {
      echo "<p>Favori : ".$fav['burger'] .", ";

      if($fav['salade'] != 0)echo "salade, ";

      if($fav['tomate'] != 0)echo "tomate, ";

      if($fav['oignon'] != 0)echo "oignon, ";

      if(empty($fav['s1'])){
        echo "sans sauce ";
      }else{
        echo "sauce : ".$fav['s1'];
      }

      if(!empty($fav['s2'])) echo " + ".$fav['s2'];

      if(!empty($fav['retirer']))echo ", sans ".$fav['retirer'] ."";

      if(!empty($fav['supplement']))echo ", supplément : ".$fav['supplement'];

      echo "</p>";
      echo"<button onclick=\"window.location='index.php?uc=profil&action=changeFav'\">Modifier son favori</button>";
    }
  ?>
</div>
