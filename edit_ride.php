<?php
include_once "header.php";

if (!($_SESSION["userRole"] == "1" || $_SESSION["userRole"] == "4")) {
    header("location:index.php");
}



$id_ride = filter_input(INPUT_GET, 'id_ride');

$ride = Model::getRideById($id_ride);

$submit = filter_input(INPUT_POST, 'submit');

if (isset($submit)) {
    $idUser = filter_input(INPUT_POST, 'user');
    $idCar= filter_input(INPUT_POST, 'car');
    $timeLeft = filter_input(INPUT_POST, 'timeLeft');
    $timeArrived= filter_input(INPUT_POST, 'timeArrived');
    $placeLeft = filter_input(INPUT_POST, 'placeLeft');
    $placeArrived = filter_input(INPUT_POST, 'placeArrived');
    $kmBefore = filter_input(INPUT_POST, 'kmBefore');
    $kmAfter = filter_input(INPUT_POST, 'kmAfter');
    $note = filter_input(INPUT_POST, 'note');
    $state = filter_input(INPUT_POST, 'state');

    $isEdited =  Model::editRides($id_ride, $idUser, $idCar, $timeLeft, $timeArrived, $placeLeft, $placeArrived, $kmBefore, $kmAfter, $note, $state );
$ride = Model::getRideById($id_ride);

    if ($isEdited) {
      echo "Zápis proběhl v pořádku";
  }
   else{
     echo  "Něco je špatně"; 
   }
}


?>
<form action="" method="post">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-action">
          Upravit jízdu
        </div>
        <div class="card-content">
          <form class="col s12">


            <?php  if (in_array($_SESSION["userRole"], array(4))) {
            $getUsersCars = Model::getCarsByUserId($_SESSION['userId']['id_user']);
            $currentUser = Model::getUserById($_SESSION['userId']['id_user']);?>
            <div class="row">
              <div class="input-field col s12">
                <label for="name">User</label><br>
                <input type="text" name="user" class="form-control" value="<?= $ride['id_user'] ?>" disabled>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
              <label for="type">Typ</label><br>
                
                <select id="type" name="type">
                <?php
  foreach ($getUsersCars as $car) {
      if ($car['id_car'] == $ride['id_car']
   ) {
          ?> <option value="<?= $car['id_car'] ?> " selected><?= $car['type'] ?></option>
                  <?php continue;
      } ?>
                  <option value="<?= $car['id_car'] ?>"><?= $car['type'] ?></option>

                  <?php
  }
?>     </select><br>

              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <label for="name">Time Left</label><br>
                <input type="text" name="timeLeft" class="form-control" value="<?= $ride['time_left'] ?>">
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <label for="name">Time Arrived</label><br>
                <input type="text" name="timeArrived" class="form-control" value="<?= $ride['time_arrived'] ?>">
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <label for="name">Place Left</label><br>
                <input type="text" name="placeLeft" class="form-control" value="<?= $ride['place_left'] ?>">
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <label for="name">Place Arrived</label><br>
                <input type="text" name="placeArrived" class="form-control" value="<?= $ride['place_arrived'] ?>">
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <label for="name">KM Before</label><br>
                <input type="text" name="kmBefore" class="form-control" value="<?= $ride['km_before'] ?>">
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <label for="name">KM After</label><br>
                <input type="text" name="kmAfter" class="form-control" value="<?= $ride['km_after'] ?>">
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <label for="name">Note</label><br>
                <input type="text" name="note" class="form-control" value="<?= $ride['note'] ?>">

              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <label for="name">Status</label><br>

                <select id="state" name="state">
                  <option value="aktivní" selected>Aktivní</option>
                  <option value="neaktivní">Neaktivní</option>
                </select><br>
              </div>
            </div>
            <br>
            <button class="btn waves-effect waves-light black" type="submit" value="přidat" name="submit">UPRAVIT
              <i class="material-icons right">send</i>
            </button>
          </form>
          <?php } ?>
          <div class="clearBoth"></div>
        </div>
      </div>
    </div>
  </div>

  <?php 

 include_once "footer.php";