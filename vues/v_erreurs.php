
<ul style="color:red;background-color: rgb(237,210,229);width: 100%;position: relative;top: 104px;">
<?php 
foreach($_REQUEST['erreurs'] as $erreur)
	{
      echo "<li>$erreur</li>";
	}
?>
</ul>
