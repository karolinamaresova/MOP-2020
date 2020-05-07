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






var_dump($submit);
  ?>


<form action="addUser.php" method="post">

  <label for="role">Role</label><br>
  <select id="role" name="role">
  <option value="1">Admin</option>
  <option value="2">Manažer</option>
  <option value="3">Dispečer</option>
  <option value="4">Řidič</option> 
  </select><br>

  <label for="name">Jméno</label>
  <input type="text" name="firstname" class="form-control" id="firstname" aria-describedby="name" placeholder=""
    value="">

  <label for="surname">Přijmení</label>
  <input type="text" name="surname" class="form-control" id="" aria-describedby="" placeholder="" value="">

  <label for="email">Email</label>
  <input type="email" name="email" class="form-control" id="" aria-describedby="" placeholder="" value="">

  <label for="password">Heslo</label>
  <input type="password" name="password" class="form-control" id="" aria-describedby="" placeholder="" value="">





  <br>
  <input type="submit" value="přidat" name="submit">
</form>