<?php
include_once "header.php";
  
if (!($_SESSION["userRole"]=="1")) {
    header("location:index.php");
}
$roles = Model::getAllRoles();

$idUser = filter_input(INPUT_GET, 'id_user');


$submit = filter_input(INPUT_POST, 'submit');



$id_role = filter_input(INPUT_POST, 'role');
$firstname= filter_input(INPUT_POST, 'firstname');
$surname = filter_input(INPUT_POST, 'surname');
$email= filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');


if (isset($submit)) {
    Model::editUser($idUser, $id_role, $firstname, $surname, $email, $password);
}


$user = Model::getUserById($idUser);

?>
<form action="" method="post">

  <select id="role" name="role">



 <?php
   foreach ($roles as $role) { 
    if( $role['id_role'] == $user['id_role']
    )
       {?> <option value="<?= $role['id_role'] ?> "selected><?= $role['role_name'] ?></option>
<?php continue; 
       }?>
    <option value="<?= $role['id_role'] ?>"><?= $role['role_name'] ?></option>

  <?php
  

}
?>
 </select><br>

  <label for="name">Jméno</label>
  <input type="text" name="firstname" class="form-control" id="firstname" aria-describedby="name"
    placeholder="firstname" value="<?= $user['firstname'] ?>">

  <label for="surname">Přijmení</label>
  <input type="text" name="surname" class="form-control" id="surname" aria-describedby="surname" placeholder="surname"
    value="<?= $user['surname'] ?>">

  <label for="email">Email</label>
  <input type="email" name="email" class="form-control" id="surname" aria-describedby="surname" placeholder="surname"
    value="<?= $user['email'] ?>">

  <label for="password">Heslo</label>
  <input type="password" name="password" class="form-control" id="surname" aria-describedby="surname"
    placeholder="password" value="">



  <br>
  <input type="submit" value="upravit" name="submit">
</form>