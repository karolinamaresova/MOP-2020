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
$state =  filter_input(INPUT_POST, 'state');


if (isset($submit)) {
    Model::editUser($idUser, $id_role, $firstname, $surname, $email, $password, $state);
}


$user = Model::getUserById($idUser);

?>
<form action="" method="post">

  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-action">
          Upravit uživatele
        </div>
        <div class="card-content">
          <form class="col s12">
            
            <div class="row">
              <div class="input-field col s12">
              <label for="role">Role</label><br>
                <select id="role" name="role">

                  <?php
  foreach ($roles as $role) {
      if ($role['id_role'] == $user['id_role']
   ) {
          ?> <option value="<?= $role['id_role'] ?> " selected><?= $role['role_name'] ?></option>
                  <?php continue;
      } ?>
                  <option value="<?= $role['id_role'] ?>"><?= $role['role_name'] ?></option>

                  <?php
  }
?>     </select><br>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <label for="firstname">Jméno</label><br><br>
                <input type="text" name="firstname" class="form-control" id="firstname" aria-describedby="name"
                  placeholder="firstname" value="<?= $user['firstname'] ?>">

              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <label for="surname">Přijmení</label><br>
                <input type="text" name="surname" class="form-control" id="surname" aria-describedby="surname"
                  placeholder="surname" value="<?= $user['surname'] ?>">
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <label for="email">Email</label><br>
                <input type="email" name="email" class="form-control" id="surname" aria-describedby="surname"
                  placeholder="surname" value="<?= $user['email'] ?>">
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <label for="password">Heslo</label><br>
                <input type="password" name="password" class="form-control" id="surname" aria-describedby="surname"
                  placeholder="password" value="">
              </div>
            </div>
          
            <div class="row">
              <div class="input-field col s12">
                <label for="state">Stav</label><br>
                <select id="state" name="state">
                  <option value="aktivní">Aktivní</option>
                  <option value="neaktivní">Neaktivní</option>
                  </select><br>
              </div>
            </div>
            <button class="btn waves-effect waves-light black" type="submit" value="přidat" name="submit">UPRAVIT
              <i class="material-icons right">send</i>
            </button>
          </form>
          <div class="clearBoth"></div>
        </div>
      </div>
    </div>
  </div>



<?php

 include_once "footer.php";
