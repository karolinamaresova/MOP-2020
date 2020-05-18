<?php
include_once  "header.php";
$roles = Model:: getAllRoles();
$roleName = Model::getUserRoleName( $_SESSION["userRole"]);
        


?>
 
 
  
 <h3>Jsi přihlášen jako <?=     $roleName['role_name'   ]  ?> </h3>
  
<?php 

 include_once "footer.php";