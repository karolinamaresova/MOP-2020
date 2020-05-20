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


?>

<form action="addCar.php" method="post">

  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-action">
          <h2><b>PŘIDAT VOZIDLO</b></h2>
        </div>
        <div class="card-content">
          <form class="col s12">

            <div class="row">
              <div class="input-field col s12">
                <label for="type">Typ</label><br><br>
                <select id="type" name="type">
                  <?php 
  foreach ($cars as $car) {?>

                  <option value="<?= $car['type']?> "> <?= $car['type'] ?> </option><?php
  } ?>
                </select>
              </div>

            </div>

            <div class="row">
              <div class="input-field col s12">
                <label for="SPZ">SPZ</label>
                <input type="text" name="SPZ" class="form-control" id="SPZ" aria-describedby="" placeholder="" value="">
              </div>

            </div>


            <button class="btn waves-effect waves-light black" type="submit" value="přidat" name="submit">PŘIDAT
              <i class="material-icons right">send</i>
            </button>
          </form>
          <div class="clearBoth"></div>
        </div>
      </div>
    </div>
  </div>

  <?php
include_once 'footer.php';