<?php
include_once  "header.php";
if (!in_array($_SESSION["userRole"], array(1, 4))) {
    header("location: index.php?restcrict=1");
}
?>
<br><br>
<h3>Jízdy</h3>
<a class="btn btn-secondary background-btn" href="addRide.php">Přidat jízdu</a>
<div class="table-responsive">
    <?php if ($_SESSION["userRole"] == "1") {
            $rides = Model::getAllRides(); ?>

    <table class=" table table-striped ">
        <thead>
            <tr>
                <th>ID jízdy</th>
                <th>Vozidlo</th>
                <th>Uživatel</th>
                <th>Čas a datum odjezdu</th>
                <th>Čas a datum příjezdu</th>
                <th>Místo odjezdu</th>
                <th>Místo příjezdu</th>
                <th>Počet kilometrů před</th>
                <th>Počet kilometrů po</th>
                <th>Poznámka</th>
                <th>Status</th>
                <th>Úprava</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($rides as $ride) {
                ?>
                    <tr>

                <td><?= $ride['id_ride'] ?></td>

                <td><?= $ride['type'] ?></td>
                <th><?= $ride['firstname'] . " " . $ride['surname']?></td>
                <td><?= date("j.n.Y - G:i:s", strtotime($ride['time_left'])) ?></td>
                <td><?= date("j.n.Y - G:i:s", strtotime($ride['time_arrived'])) ?></td>
                <td><?= $ride['place_left'] ?></td>
                <td><?= $ride['place_arrived'] ?></td>
                <td><?= $ride['km_before'] ?></td>
                <td><?= $ride['km_after'] ?></td>
                <td><?= $ride['note'] ?></td>
                <td><?= $ride['state'] ?></td>
                <td>
                    <a href="edit_ride.php?id_ride=<?= $ride['id_ride'] ?>">upravit </a>
                </td>




            </tr>
                <?php
            } ?></tbody>
    </table> 
    <?php

    // jízdy uživatele
    } else {
        $driverRides = Model::getAllDriverRides($_SESSION['userId']['id_user']);
        ?>

    <table class=" table table-striped ">
        <thead>
            <tr>
                <th>ID jízdy</th>
                <th>Vozidlo</th>
                <th>Uživatel</th>
                <th>Čas a datum odjezdu</th>
                <th>Čas a datum příjezdu</th>
                <th>Místo odjezdu</th>
                <th>Místo příjezdu</th>
                <th>Počet kilometrů před</th>
                <th>Počet kilometrů po</th>
                <th>Poznámka</th>
                <th>Status</th>
                <th>Úprava</th>


            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($driverRides as $driverRide) {
            ?><tr>

                <td><?= $driverRide['id_ride'] ?></td>
                <td><?= $driverRide['id_car'] ?></td>
                <th><?= $ride['firstname'] . $ride['surname']?></td>
                <td><?= date("j.n.Y - G:i:s", strtotime($driverRide['time_left'])) ?></td>
                <td><?= date("j.n.Y - G:i:s", strtotime($driverRide['time_arrived'])) ?></td>
                <td><?= $driverRide['place_left'] ?></td>
                <td><?= $driverRide['time_arrived'] ?></td>
                <td><?= $driverRide['km_before'] ?></td>
                <td><?= $driverRide['km_after'] ?></td>
                <td><?= $driverRide['note'] ?></td>
                <td><?= $driverRide['state'] ?></td>


                <td>
                    <a href="edit_ride.php?id_ride=<?= $driverRide['id_ride'] ?>">edit </a>
                </td>
            </tr>

<?php
    } ?> </tbody>
    </table> 
        </tbody>
    </table>
        <?php
    }
    ?>


</div>