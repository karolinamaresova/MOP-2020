<?php
include_once "header.php";

if (!in_array($_SESSION["userRole"], array(1, 3))) {
  header("location: index.php?restcrict=1");
}

$cars = Model::GetAllCars();

$idCar = filter_input(INPUT_GET, 'id_car');
$submit = filter_input(INPUT_POST, 'submit');

$SPZ = filter_input(INPUT_POST, 'SPZ');




if (isset($submit)) {
    Model::editCar($SPZ, $idCar);
}

$GetCars = Model::getCarById($idCar);


?>
<form action="" method="post">


  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-action">
          <h2><b>Upravit vozidlo</b></h2>
        </div>
        <div class="card-content">
          <form class="col s12">

            <div class="row">
              <div class="input-field col s12">
                <label for="type">Typ</label><br>
                <input type="text" name="SPZ" class="form-control" id="SPZ" value="<?= $GetCars['type'] ?> "disabled>
                </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <label for="SPZ">SPZ</label><br>
                <input type="text" name="SPZ" class="form-control" id="SPZ" value="<?= $GetCars['SPZ'] ?>">
              </div>
            </div>

            <br>
            <button class="btn waves-effect waves-light black" type="submit" value="přidat" name="submit">UPRAVIT
              <i class="material-icons right">send</i>
            </button>
          </form>
          <div class="clearBoth"></div>
        </div>
      </div>
    </div>
  </div>











  <?php

 include_once "footer.php";