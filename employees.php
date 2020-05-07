<?php
include_once "header.php";
if(!in_array($_SESSION["userRole"], array(1))) { 
    header("location: index.php?restcrict=1"); 
}



?>



<body>
    <?php
$employees = Model::getAllUsers();





?>
    <br>
    <h2>Uživatelé</h2>
    <a class="btn btn-secondary background-btn" href="addUser.php">Přidat uživatele</a>

    <div class="table-responsive">
        <table class=" tbl table table-striped table-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Jméno</th>
                    <th>Přijmení</th>
                    <th>Email</th>
                    <th>Úprava</th>
                    <th>Stav</th>

                </tr>
            </thead>
            <tbody>

                <?php
            foreach ($employees as $employee) {
                ?><tr>
                    <td> <?php echo $employee['id_user'] ?></td>
                    <td> <?php echo $employee['firstname'] ?></td>
                    <td> <?php echo $employee['surname'] ?></td>
                    <td> <?php echo $employee['email'] ?></td>
                    <td> <a href="edit_user.php?id_user=<?= $employee['id_user'] ?>">upravit </a> </td>
                    <td>  </td>
                </tr> <?php
            }
                ?>

            </tbody>
        </table>
    </div>