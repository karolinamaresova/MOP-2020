<?php

include_once "header.php";
if (!in_array($_SESSION["userRole"], array(1, 4))) {
    header("location: index.php?restcrict=1");
}

$submit = filter_input(INPUT_POST, "submit");
$selectedDriver = filter_input(INPUT_GET, 'driver');

$cars = Model::getAllCars();
$users = Model::getAllDrivers();

if (isset($submit)) {
    $idUser = ($_SESSION['userRole'] == 4) ? $_SESSION['userId']['id_user'] : filter_input(INPUT_POST, "user");
    $car = filter_input(INPUT_POST, "car");
    $timeLeft = filter_input(INPUT_POST, "timeL");
    $timeArrived = filter_input(INPUT_POST, "timeA");
    $placeLeft = filter_input(INPUT_POST, "placeL");
    $placeArrived = filter_input(INPUT_POST, "placeA");
    $kmBefore = filter_input(INPUT_POST, "kmBefore");
    $kmAfter = filter_input(INPUT_POST, "kmAfter");
    $note = filter_input(INPUT_POST, "note");
    $state = filter_input(INPUT_POST, "state") ?? 'aktivní';
    $isAdded = Model::addRide(
        $idUser,
        $car,
        $timeLeft,
        $timeArrived,
        $placeLeft,
        $placeArrived,
        $kmBefore,
        $kmAfter,
        $note,
        $state
    );

    var_dump($_POST);
    var_dump($state);


    if ($isAdded) {
        echo "zápis proběhl v pořádku";
    } else {
        echo "něco se pokazilo";
    }
}



?>

<form action="addRide.php" method="post">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-action">
          <h2><b>PŘIDAT JÍZDU</b></h2>
        </div>
        <div class="card-content">
          <form class="col s12">

            <?php
            if ($_SESSION['userRole'] == 4) {
                $getUsersCars = Model::getCarsByUserId($_SESSION['userId']['id_user']);
                $currentUser = Model::getUserById($_SESSION['userId']['id_user']);
            ?>

              <!-- <div class="row"> -->
                <div class="input-field col s12">
                  <label for="user">Řidič</label><br>
                  <input type="text" name="user" id="user" value="<?= $currentUser['firstname'] . " " . $currentUser['surname'] ?>" disabled>
                </div>
              <!-- </div> -->

              <div class="row">
                <div class="input-field col s12">
                  <label for="car">Vozidlo</label><br><br>
                  <select id="car" name="car">
                    <?php
                    foreach ($getUsersCars as $car) {
                        ?>
                      <option value="<?= $car['id_car'] ?> "> <?= $car['type'] . " " . $car['SPZ'] ?></option> 
                      <?php
                    } ?>
                  </select><br>
                  </div>
              </div>
                <?php
            }
            ?>

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
                    foreach ($cars as $car) {
                    ?>
                      <option value="<?= $car['id_car'] ?> "> <?= $car['type'] . " " . $car['SPZ'] ?></option> <?php
                                                                                                              } ?>
                  </select><br>
                <?php
            } 
            ?>


                

              <div class="row">
                <div class="input-field col s12">
                  <label for="placeL">Místo odjezdu</label>
                  <input type="text" name="placeL" class="form-control" id="" placeholder="">
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12">
                  <label for="placeA">Místo příjezdu</label>
                  <input type="text" name="placeA" class="form-control" id="" placeholder="">
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12">
                  <label for="timeL">Datum a čas odjezdu</label><br>
                  <input type="datetime-local" name="timeL" class="form-control" id="" placeholder="">
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12">
                  <label for="timeA">Datum a čas příjezdu</label><br>
                  <input type="datetime-local" name="timeA" class="form-control" id="" placeholder="">
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12">
                  <label for="kmBefore">Kilometry před</label>
                  <input type="text" name="kmBefore" class="form-control" id="" placeholder="">

                </div>
              </div>

              <div class="row">
                <div class="input-field col s12">
                  <label for="kmAfter">Kilometry po</label>
                  <input type="text" name="kmAfter" class="form-control" id="" placeholder="">
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12">
                  <label for="note">Poznámka</label>
                  <input type="text" name="note" class="form-control" id="" placeholder="">
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12">
                  <label for="state">Status</label><br>
                  <input type="text" name="state" class="form-control" value="aktivní" disabled>
                </div>
              </div>

              <br>
              <button class="btn waves-effect waves-light black" type="submit" value="přidat" name="submit">
                PŘIDAT
                <i class="material-icons right">send</i>
              </button>
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






</form>
<div class="clearBoth"></div>
</div>
</div>
</div>
</div>

<?php
include_once 'footer.php';
