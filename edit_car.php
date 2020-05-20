<?php
include_once "header.php";

if (!($_SESSION["userRole"]=="1" || $_SESSION["userRole"] == "3")) {
    header("location:index.php");
}



$idCar = filter_input(INPUT_GET, 'id_car');
$submit = filter_input(INPUT_POST, 'submit');

$type = filter_input(INPUT_POST, 'type');
$SPZ = filter_input(INPUT_POST, 'SPZ');




if (isset($submit)) {
    Model::editCar($type, $SPZ, $idCar);
}

$car = Model::getCarById($idCar);

?>
<form action="" method="post">


  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-action">
          Basic Form Elements
        </div>
        <div class="card-content">
          <form class="col s12">
            <div class="row">
              <div class="input-field col s12">
                <label for="type">Typ</label><br>
                <input type="text" name="type" class="form-control" id="type" value="<?= $car['type'] ?> "disabled>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <label for="SPZ">SPZ</label><br>
                <input type="text" name="SPZ" class="form-control" id="SPZ" value="<?= $car['SPZ'] ?>">
              </div>
            </div>
          </form>
          <div class="clearBoth"></div>
        </div>
      </div>
    </div>
  </div>









  <br>
  <button class="btn waves-effect waves-light black" type="submit" value="přidat" name="submit">UPRAVIT
    <i class="material-icons right">send</i>
  </button>
</form>

<?php

 include_once "footer.php";