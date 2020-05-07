<?php
include_once "header.php";


if(!in_array($_SESSION["userRole"], array(1,3))) { 
  header("location: index.php?restcrict=1"); 
}
$submit = filter_input(INPUT_POST, "submit");
$cars = Model::getAllCars();

if (isset($submit)) {
    $type = filter_input(INPUT_POST, "type");
    $SPZ = filter_input(INPUT_POST, "SPZ");
    
    

    
    $isAdded = Model::addCar($type, $SPZ);


  
    if ($isAdded) {
        echo "zápis proběhl v pořádku";
    } else {
        echo "něco se pos*alo";
    }
}

var_dump($submit);
?>

<form action="addCar.php" method="post">

  

  <label for="type">Typ</label><br>
  <select id="type" name="type">
  <?php 
  foreach ($cars as $car) {?>

  <option value="<?= $car['type']?> "> <?= $car['type'] ?> <?php
  } ?>
  </select><br> 

  <label for="SPZ">SPZ</label>
  <input type="text" name="SPZ" class="form-control" id="SPZ" aria-describedby="" placeholder="" value="">

  
  



  <br>
  <input type="submit" value="přidat" name="submit">
</form>