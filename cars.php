<?php
include_once 'header.php';
if(!in_array($_SESSION["userRole"], array(1,2,3,4))) { 
    header("location: index.php?restcrict=1"); 
}



$cars = Model::getAllCars();



?>
<br>
<h2>Vozidla</h2>
<a class="btn btn-secondary background-btn" href="addCar.php">Přidal vozidlo</a>
<div class="table-responsive">
    <table class=" table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Typ vozidla</th>
                <th>SPZ</th>
                <th>KM celkem</th>
                <th>Úprava</th>

            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($cars as $car) {
            ?> <tr>
                    <td><?= $car['id_car'] ?></td>
                    <td><?= $car['type'] ?></a></td>
                    <td><a href="carDetail.php?id_car=<?= $car['id_car'] ?>"><?= $car['SPZ'] ?></td>
                    <td><?= $car['total_km'] ?></td>
                    <td>
                        <a href="edit_car.php?id_car=<?= $car['id_car'] ?>">upravit </a>
                    </td>

                </tr>
            <?php
            }

            ?>

        </tbody>
    </table>
</div>