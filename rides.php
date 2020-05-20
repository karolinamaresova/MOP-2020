<?php
include_once  "header.php";
if (!in_array($_SESSION["userRole"], array(1, 4))) {
    header("location: index.php?restcrict=1");
}
?>
<div class="row">

    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="card">
            <div class="card-action">
                <h1>
                    <b>JÍZDY</b>
                    <a class="btn-floating btn-medium waves-effect waves-light black" href="addRide.php">
                        <i class="material-icons">add</i>
                    </a>
                </h1>


            </div>

            <div class="card-content">
                <div class="table-responsive">
                    <?php if ($_SESSION["userRole"] == "1") {
                        $rides = Model::getAllRides(); ?>
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID jízdy</th>
                                    <th>Vozidlo</th>
                                    <th>Uživatel</th>
                                    <th>Čas a datum odjezdu</th>
                                    <th>Čas a datum příjezdu</th>
                                    <th>Místo odjezdu</th>
                                    <th>Místo příjezdu</th>
                                    <th>Počet kilometrů</th>
                                    <th>Poznámka</th>
                                    <th>Status</th>
                                    <th><i class="fa fa-edit small"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($rides as $ride) {
                                ?>
                                    <tr>

                                        <td><?= $ride['id_ride'] ?></td>

                                        <td><?= $ride['type'] . " " . $ride['SPZ'] ?></td>
                                        <th><?= $ride['firstname'] . " " . $ride['surname'] ?></td>
                                        <td><?= date("j.n.Y - G:i:s", strtotime($ride['time_left'])) ?></td>
                                        <td><?= date("j.n.Y - G:i:s", strtotime($ride['time_arrived'])) ?></td>
                                        <td><?= $ride['place_left'] ?></td>
                                        <td><?= $ride['place_arrived'] ?></td>
                                        <td><?= $ride['km_after'] - $ride['km_before'] ?></td>
                                        <td><?= $ride['note'] ?></td>
                                        <td><?= $ride['state'] ?></td>
                                        <td>
                                            <a href="edit_ride.php?id_ride=<?= $ride['id_ride'] ?>"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                } ?>
                            </tbody>
                        </table>
                        <?php

                        // jízdy uživatele
                    } else {
                        $driverRides = Model::getAllDriverRides($_SESSION['userId']['id_user']);
                        if (!is_null($driverRides)) {
                        ?>
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID jízdy</th>
                                        <th>Vozidlo</th>
                                        <th>Čas a datum odjezdu</th>
                                        <th>Čas a datum příjezdu</th>
                                        <th>Místo odjezdu</th>
                                        <th>Místo příjezdu</th>
                                        <th>Počet kilometrů</th>
                                        <th>Poznámka</th>
                                        <th>Status</th>
                                        <th><i class="fa fa-edit small"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($driverRides as $driverRide) {
                                    ?><tr>

                                            <td><?= $driverRide['id_ride'] ?></td>
                                            <td><?= $driverRide['type'] . " " . $driverRide['SPZ'] ?></td>
                                            <td><?= date("j.n.Y - G:i:s", strtotime($driverRide['time_left'])) ?></td>
                                            <td><?= date("j.n.Y - G:i:s", strtotime($driverRide['time_arrived'])) ?></td>
                                            <td><?= $driverRide['place_left'] ?></td>
                                            <td><?= $driverRide['place_arrived'] ?></td>
                                            <td><?= $driverRide['km_after'] - $driverRide['km_before'] ?></td>
                                            <td><?= $driverRide['note'] ?></td>
                                            <td><?= $driverRide['state'] ?></td>


                                            <td>
                                                <a href="edit_ride.php?id_ride=<?= $driverRide['id_ride'] ?>"><i class="fa fa-edit"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                    } ?>

                                </tbody>
                            </table>
                        <?php
                        } else {
                            echo "Nemáte evidovány žádné jízdy.";
                        } ?>


                    <?php
                    }
                    ?>

                </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>



<?php

include_once "footer.php";
