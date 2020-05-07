<?php

include_once "header.php";
if (!in_array($_SESSION["userRole"], array(1, 4))) {
    header("location: index.php?restcrict=1");
}

$submit = filter_input(INPUT_POST, "submit");
$selectedDriver = filter_input(INPUT_GET, 'driver');
var_dump($selectedDriver);
$cars = Model::getAllCars();
$users = Model::getAllDrivers();
var_dump($_SESSION);
if (isset($submit)) {
    $idUser = filter_input(INPUT_POST, "user");
    $car = filter_input(INPUT_POST, "car");
    $timeLeft = filter_input(INPUT_POST, "timeL");
    $timeArrived = filter_input(INPUT_POST, "timeA");
    $placeLeft = filter_input(INPUT_POST, "placeL");
    $placeArrived = filter_input(INPUT_POST, "placeA");
    $kmBefore = filter_input(INPUT_POST, "kmBefore");
    $kmAfter = filter_input(INPUT_POST, "kmAfter");
    $note = filter_input(INPUT_POST, "note");
    $state = filter_input(INPUT_POST, "state");
    $isAdded = Model::addRide($idUser, $car, $timeLeft, $timeArrived, $placeLeft, $placeArrived, $kmBefore, $kmAfter, $note, $state);
    if ($isAdded) {
        echo "zápis proběhl v pořádku";
    } else {
        echo "něco se pos*alo";
    }
}

var_dump($_GET);


?>



<form action="addRide.php" method="post">

  <?php
    if ($_SESSION['userRole'] == 4) {
        $getUsersCars = Model::getCarsByUserId($_SESSION['userId']['id_user']);
        $currentUser = Model::getUserById($_SESSION['userId']['id_user']);
        ?>
    <label for="user">Řidič</label><br>
    <input type="text" name="user" id="user" value="<?= $currentUser['firstname'] . " " . $currentUser['surname'] ?>" disabled>
    <br>

    <label for="car">Vozidlo</label><br>
    <select id="car" name="car">
        <?php
        foreach ($getUsersCars as $car) {
            ?>
        <option value="<?= $car['id_car'] ?> "> <?= $car['type'] . " " . $car['SPZ'] ?></option> <?php
        } ?>
    </select><br>
        <?php
    } ?>

  <?php
    if ($_SESSION['userRole'] == 1) {
        ?>
    <label for="select1">Řidič</label><br>
    <select id="select1" name="user" class="form-control">
        <?php
        foreach ($users as $user) {
            ?>
        <option value="<?= $user['id_user'] ?> "> <?= $user['firstname'] . " " .  $user['surname'] ?> <?php
        }
        ?>
    </select><br>

    <label for="select2">Vozidlo</label><br>
    <select id="select2" name="car" class="form-control">
        <?php
        foreach ($getUsersCars as $car) {
            ?>
        <option value="<?= $car['id_car'] ?> "> <?= $car['type'] . " " . $car['SPZ'] ?></option> <?php
        } ?>
    </select><br>
        <?php
    } ?>




  <label for="placeL">Místo odjezdu</label>
  <input type="text" name="placeL" class="form-control" id="" placeholder="">

  <label for="placeA">Místo příjezdu</label>
  <input type="text" name="placeA" class="form-control" id="" placeholder="">

  <label for="timeL">Datum a čas odjezdu</label>
  <input type="datetime-local" name="timeL" class="form-control" id="" placeholder="">

  <label for="timeA">Datum a čas příjezdu</label>
  <input type="datetime-local" name="timeA" class="form-control" id="" placeholder="">

  <label for="kmBefore">Kilometry před</label>
  <input type="text" name="kmBefore" class="form-control" id="" placeholder="">

  <label for="kmAfter">Kilometry po</label>
  <input type="text" name="kmAfter" class="form-control" id="" placeholder="">

  <label for="note">Poznámka</label>
  <input type="text" name="note" class="form-control" id="" placeholder="">

  <label for="state">Status</label>
  <input type="text" name="state" class="form-control" id="" placeholder="">


  <br>
  <input type="submit" value="přidat" name="submit">
</form>

<script>
  $('#select1').change(createSelect2);
  $('#select2').change(selectSelect2);

  function createSelect2() {
    console.log('executed createSelect2');
    var option = $(this).find(':selected').val(),
      dataString = "option=" + option;

      console.log(dataString);
      
      
    if (option != '') {
      $.ajax({
        type: 'GET',
        url: 'localhost/mop/getter.php',
        data: dataString,
        dataType: 'JSON',
        cache: false,
        success: function(data) {
          var output = '<option value="">Select Sth</option>';

          $.each(data.data, function(i, s) {
            var newOption = s;

            output += '<option value="' + newOption + '">' + newOption + '</option>';
          });

          $('#select2').empty().append(output);
        },
        error: function() {
          console.log("Ajax failed, fuck me");
        }
      });
    } else {
      console.log("You have to select at least sth");
    }
  }

  function selectSelect2() {
    var option = $(this).find(':selected').val();
    if (option != '') {
      alert("You selected: " + option);
    } else {
      alert("You have to select at least sth");
    }
  }
</script>