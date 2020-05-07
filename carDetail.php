<?php
include_once 'header.php';

$carRides = Model::getRidesByCar(filter_input(INPUT_GET, 'id_car'));
?>
<br><br>
<h3>Rides</h3>
<a class="btn btn-secondary background-btn" href="addRide.php">Add ride</a>
<div class="table-responsive">
    <table class=" table table-striped ">
        <thead>
            <tr>
                <th>id</th>
                <th>car</th>
                <th>TL</th>
                <th>TA</th>
                <th>PL</th>
                <th>PA</th>
                <th>km</th>
                <th>km</th>
                <th>note</th>
                <th>edit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($carRides) {
                foreach ($carRides as $ride) {
                    ?>
            <tr>

                <td><?= $ride['id_ride'] ?></td>
                <td><?= $ride['id_car'] ?></td>
                <td><?= date("j.n.Y - G:i:s", strtotime($ride['time_left'])) ?></td>
                <td><?= date("j.n.Y - G:i:s", strtotime($ride['time_arrived'])) ?></td>
                <td><?= $ride['place_left'] ?></td>
                <td><?= $ride['place_arrived'] ?></td>
                <td><?= $ride['km_before'] ?></td>
                <td><?= $ride['km_after'] ?></td>
                <td><?= $ride['note'] ?></td>
                <td>
                    <a href="edit_ride.php?id_ride=<?= $ride['id_ride'] ?>">edit </a>
                </td>
            </tr>
                    <?php
                }
            }
            ?>
            
        </tbody>
    </table>