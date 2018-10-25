<?php include("menu.php");?>
<form action="index.php" method="get">
  <select name="sandwich">
<?php
  foreach($sandwichs as $sandwich)
  {
    $sql = 'select GROUP_CONCAT(Concat(i.nom, " x",c.nombre) SEPARATOR ", ") as ingredients from contenusandwich c inner join ingredient i on c.idI = i.id  Where idS = "' . $sandwich['id'] .'" group by c.idS '; // Where id = '" . $_SESSION['idUser'] . "'";
    $result = $conn->query($sql);
    $ingredients = $result->fetch(PDO::FETCH_ASSOC);

    echo "\t".'<option title="'. utf8_encode ($ingredients['ingredients']) .'" value="'. $sandwich['id'] .'">'.utf8_encode ($sandwich['nom']) .'</option>'."\n";
  }
?>
</select>

<input type="checkbox" name="salade"> Salade
<input type="checkbox" name="tomate"> Tomate
<input type="checkbox" name="oignon"> Oignon

<select name="sauce1">
<?phpforeach($sauces as $sauce){echo "\t".'<option value="'. $sauce['id'] .'">'.utf8_encode ($sauce['nom']) .'</option>'."\n";}?>
</select>

<select name="sauce2">
<?phpforeach($sauces as $sauce){echo "\t".'<option value="'. $sauce['id'] .'">'.utf8_encode ($sauce['nom']) .'</option>'."\n";}?>
</select>

<br><input type="submit" value="Submit">


</form>
