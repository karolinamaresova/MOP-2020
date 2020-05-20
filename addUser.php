<?php
include_once "header.php";
 
if(!in_array($_SESSION["userRole"], array(1))) { 
  header("location: index.php?restcrict=1"); 
}


$submit = filter_input(INPUT_POST, "submit");
$roles = Model::getAllRoles();

if (isset($submit)) {
    $role = filter_input(INPUT_POST, "role");
    $firstname = filter_input(INPUT_POST, "firstname");
    $surname = filter_input(INPUT_POST, "surname");
    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");
    $state = filter_input(INPUT_POST, "state") ?? 'aktivní';

    $isAdded = Model::addUser($role, $firstname, $surname, $email, $password, $state);


    if ($isAdded) {
        echo "zápis proběhl v pořádku";
    } else {
        echo "něco se pos*alo";
    }
}

  ?>


<form action="addUser.php" method="post">

  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-action">
        <h2><b>PŘIDAT UŽIVATELE</b></h2>
        </div>
        <div class="card-content">
          <form class="col s12">

            <div class="row">
              <div class="input-field col s12">
                <label for="role">Role</label><br><br>
                <select id="role" name="role">

                  <?php
  foreach ($roles as $role) { 
   if( $role['id_role'] == $user['id_role']
   )
      {?> <option value="<?= $role['id_role'] ?> " selected><?= $role['role_name'] ?></option>
                  <?php continue; 
      }?>
                  <option value="<?= $role['id_role'] ?>"><?= $role['role_name'] ?></option>

                  <?php
 

}
?>
                </select><br>

              </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <label for="name">Jméno</label>
                  <input type="text" name="firstname" class="form-control" id="firstname" aria-describedby="name"
                    placeholder="" value="">
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12">
                  <label for="surname">Přijmení</label>
                  <input type="text" name="surname" class="form-control" id="surname" aria-describedby="" placeholder=""
                    value="">
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control" id="email" aria-describedby="" placeholder=""
                    value="">
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12">
                  <label for="password">Heslo</label>
                  <input type="password" name="password" class="form-control" id="password" aria-describedby="" placeholder=""
                    value="">

                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <label for="state">Stav</label><br>
                  <input type="text" name="state" class="form-control" value="aktivní" disabled>
                </div>
              </div>
              <button class="btn waves-effect waves-light black" type="submit" value="přidat" name="submit">PŘIDAT
              <i class="material-icons right">send</i>
            </button>
            </div>
            <br>
           
          </form>
          <div class="clearBoth"></div>
        </div>
      </div>
    </div>
  </div>
















</form>

<?php
include_once 'footer.php';