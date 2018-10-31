<script type="text/javascript">
    function selectIngr() {
    	var idB = encodeURIComponent(document.getElementById('sandwich').value);
    	$.ajax({
    	    type: 'GET',
    	    url: 'RequetesAjax/selectIngr.php?idB='+(idB),
    	    timeout: 3000,
    	    async: false,
    	    success: function(data) {
    		var ret = jQuery.parseJSON(data);

        document.getElementById('sans').options.length = 2;
        var o;
        ret.forEach(function(element) {
          o = new Option(element[1], element[0]);
          $(o).html(element[1]);
          document.getElementById("sans").append(o);
        });

        },
          error: function() {
            alert("Probleme");
          }
      });
    }
</script>

<div id = "contenu">
  <form action="index.php" method="get">

  <input type="text" name="uc" value="profil" style="display:none;">

  <input type="text" name="action" value="setFav" style="display:none;">

  <select name="sandwich" id = "sandwich" onchange="selectIngr();">
  <?php
  foreach($sandwichs as $sandwich)
  {
    $ingredientsB =  $pdo->getIngredientsS($sandwich['id']);
    echo "\t".'<option title="'. $ingredientsB['ingredients'] .'" value="'. $sandwich['id'] .'">'.$sandwich['nom'] .'</option>'."\n";
  }
  ?>
  </select>

  <input type="checkbox" name="salade"> Salade
  <input type="checkbox" name="tomate"> Tomate
  <input type="checkbox" name="oignon"> Oignon

  , Sauce :
  <select name="sauce1">
  <?php
    echo "\t".'<option value=null>Aucune</option>'."\n";
    foreach($sauces as $sauce){
      echo "\t".'<option value="'. $sauce['id'] .'">'.$sauce['nom'] .'</option>'."\n";
    }
  ?>
  </select>
   +
  <select name="sauce2">
    <?php
      echo "\t".'<option value=null>Aucune</option>'."\n";
      foreach($sauces as $sauce){
        echo "\t".'<option value="'. $sauce['id'] .'">'.$sauce['nom'] .'</option>'."\n";
      }
    ?>
  </select>

  <br/>
  Suppléments (Ctrl pour choix multiple):&nbsp;&nbsp;&nbsp;
  <br/>

  <select name="supplement[]" multiple="multiple">
  <?php
    foreach($ingredients as $ingredient){echo "\t".'<option value="'. $ingredient['id'] .'">'.$ingredient['nom'] .'</option>'."\n";}
  ?>
  </select>

  Ingrédient à retirer :
  <select name="sans" id = "sans">
    <option value=null>Aucun</option>
    <option value='0'>Fromage</option>
    <?php
    $IngrSans = $pdo->getIngredientsS2('1');
    foreach($IngrSans as $ingredient){echo "\t".'<option value="'. $ingredient['idB'] .'">'.$ingredient['nom'] .'</option>'."\n";}
    ?>
  </select>

  <br><input type="submit" value="Valider">
</form>
</div>
