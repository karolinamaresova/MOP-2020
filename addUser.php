<?php
include_once "header.php";

if(!in_array($_SESSION["userRole"], array(1))) { 
  header("location: index.php?restcrict=1"); 
}


$submit = filter_input(INPUT_POST, "submit");



if (isset($submit)) {
    $role = filter_input(INPUT_POST, "role");
    $firstname = filter_input(INPUT_POST, "firstname");
    $surname = filter_input(INPUT_POST, "surname");
    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");

    $isAdded = Model::addUser($role, $firstname, $surname, $email, $password);


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
        <h3><b>PŘIDAT UŽIVATELE</b></h3>
        </div>
        <div class="card-content">
          <form class="col s12">

            <div class="row">
              <div class="input-field col s12">
                <label for="role">Role</label><br><br>
                <select id="role" name="role">
                  <option value="1">Admin</option>
                  <option value="2">Manažer</option>
                  <option value="3">Dispečer</option>
                  <option value="4">Řidič</option>
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
                  <input type="text" name="surname" class="form-control" id="" aria-describedby="" placeholder=""
                    value="">
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control" id="" aria-describedby="" placeholder=""
                    value="">
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12">
                  <label for="password">Heslo</label>
                  <input type="password" name="password" class="form-control" id="" aria-describedby="" placeholder=""
                    value="">

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