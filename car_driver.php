<?php
include_once "header.php";
if (!in_array($_SESSION["userRole"], array(1, 4))) {
    header("location: index.php?restcrict=1");
}

$submit = filter_input(INPUT_POST, "submit");

$cars = Model::getAllCars();
$users = Model::getAllDrivers();

if (isset($submit)) {
    $idUser = filter_input(INPUT_POST, "id_user");
    $idCar = filter_input(INPUT_POST, "id_car");

    $isAdded = Model::userCar($idUser, $idCar);

    if ($isAdded) {
        echo "zápis proběhl v pořádku";
    } else {
        echo "něco se pos*alo";
    }
}

?>

<form action="car_driver.php" method="post">

<label for="id_user">Řidič</label><br>
<select id="id_user" name="id_user">
<?php 
foreach ($users as $user) { ?>

<option value="<?= $user['id_user'] ?> "> <?= $user['firstname'] . $user['surname']?> <?php
} ?>
</select><br> 


<label for="id_car">Vozidlo</label><br>
<select id="id_car" name="id_car">
<?php 
foreach ($cars as $car) { ?>

<option value="<?= $car['id_car']?> "> <?= $car['SPZ'] ?> <?php
} ?>
</select><br> 
<br>
  <input type="submit" value="přidat" name="submit">
</form>