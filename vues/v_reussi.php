
<ul style="color:green;background-color: rgb(80, 208, 80 );width: 100%;position: relative;">
<?php 
foreach($_REQUEST['erreurs'] as $erreur)
	{
      echo "<li>$erreur</li>";
	}
?>
</ul>
