<?php
include_once  "header.php";
$roles = Model:: getAllRoles();
$roleName = Model::getUserRoleName( $_SESSION["userRole"]);
        

var_dump($_SESSION["userRole"]);
var_dump($roles);
var_dump( $_SESSION["userRole"]);
?>
 
 
  
 <h3>Jsi přihlášen jako <?=     $roleName['role_name'   ]  ?> </h3>
 
