<?php
include_once 'header.php';
if (!in_array($_SESSION["userRole"], array(1, 2, 3,))) {
    header("location: index.php?restcrict=1");
}



$cars = Model::getAllCars();



?>






<div class="card">
    <div class="card-action">

        <h1>
            <b>Vozidla</b>
            <a class="btn-floating btn-medium waves-effect waves-light black" href="addCar.php">
                <i class="material-icons">add</i>
            </a>
        </h1>
    </div>

    <div class="card-content">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Typ vozidla</th>
                        <th>SPZ</th>
                        <th>KM celkem</th>
                       

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
                            

                        </tr>
                    <?php
                    }

                    ?>

                </tbody>
            </table>
        </div>

        <?php

        include_once "footer.php";
