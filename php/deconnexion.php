<?php

if (session_id() ){
  $_SESSION['idUser'] = none;
  session_destroy();
}
?>
<h1>Vous avez été bien déconnecté !</h1>
