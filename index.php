<?php
include_once  "header.php";
$roles = Model:: getAllRoles();
$roleName = Model::getUserRoleName( $_SESSION["userRole"]);
        


?>
 
 
  
 <img src="https://www.tapa-global.org/fileadmin/_processed_/csm_4-1_9589c2a54c.png" alt="trucks">
  
<?php 

 include_once "footer.php";