<?php
include_once "header.php";
if (!in_array($_SESSION["userRole"], array(1))) {
    header("location: index.php?restcrict=1");
}



?>



<body>
    <?php
$employees = Model::getAllUsers();





?>









    <div class="card">
        <div class="card-action">
        <h1><b>UŽIVATELÉ</b></h1>
        </div>
        <div class="card-content">
        <a class="btn-floating btn-medium waves-effect waves-light black" href="addUser.php" ><i class="material-icons">add</i></a>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                            <td> </td>
                        </tr> <?php
}
?>

                    </tbody>
                </table>
            </div>
            <?php 

 include_once "footer.php";