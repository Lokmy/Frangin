<?php if ( ! session_id() ){
  session_start();
}
if ( ! isset($_SESSION['idUser'])){
//  $_SESSION['idUser'] = '00001';
}

$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=frangin", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



$sql = "SELECT * FROM sandwich";
$result = $conn->query($sql);
if ($result->rowCount() > 0) {while($row = $result->fetch(PDO::FETCH_ASSOC)){$sandwichs[] = $row;}}

$sql = "SELECT * FROM sauce";
$result = $conn->query($sql);
if ($result->rowCount() > 0) {while($row = $result->fetch(PDO::FETCH_ASSOC)){$sauces[] = $row;}}
?>



<a href="evenements.php">Évenements</a>
<a href="profil.php">Profil</a>
<a href="invitations.php">Invitations</a>
<button  onclick="window.location='deconnexion.php';">Déconnexion</button>
