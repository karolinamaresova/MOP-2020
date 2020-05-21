<?php
include_once  "header.php";
$roles = Model:: getAllRoles();
$roleName = Model::getUserRoleName( $_SESSION["userRole"]);
        


?>
 
 
  <h1><b>Vítejte</b></h1><br>
 <img class="trucks" src="https://www.freightlink.co.uk/sites/default/files/styles/news_main/adaptive-image/public/field/image/eurotunnel-coquelles-truck-park.jpg?itok=yUM8eX46" alt="trucks">
  
<?php 

 include_once "footer.php";