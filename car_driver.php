<?php
include_once "header.php";
if (!in_array($_SESSION["userRole"], array(1, 3))) {
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

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-action">
                    <h2><b>PŘIDĚLIT VOZIDLO ŘIDIČI</b></h2>
                </div>
                <div class="card-content">
                    <form class="col s12">

                        <div class="row">
                            <div class="input-field col s12">
                                <label for="id_user">Řidič</label><br><br>
                                <select id="id_user" name="id_user">
                                    <?php
foreach ($users as $user) {
    ?>

                                    <option value="<?= $user['id_user'] ?> ">
                                        <?= $user['firstname'] . " " . $user['surname']?> <?php
} ?>
                                </select><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <label for="id_car">Vozidlo</label><br><br>
                                <select id="id_car" name="id_car">
                                    <?php
foreach ($cars as $car) {
        ?>

                                    <option value="<?= $car['id_car']?> "> <?= $car['type'] . " -   ". $car['SPZ'] ?> <?php
    } ?>
                                </select><br>
                                <br>
                                <button class="btn waves-effect waves-light black" type="submit" value="přidat"
                                    name="submit">PŘIDĚLIT
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>

                    </form>
                    <div class="clearBoth"></div>
                </div>
            </div>
        </div>
    </div>





</form>

<?php

 include_once "footer.php";