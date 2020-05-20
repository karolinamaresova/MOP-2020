<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR  . "autoload.php";
session_start();
if (!$_SESSION["logged"]) {
    header("location:login.php");
}

$currUserArr = Model::getUserById($_SESSION['userId']['id_user']);
$currUser = $currUserArr['firstname'] . ' ' . $currUserArr['surname'];

?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Maturitní odborná práce</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/materialize.min.css" media="screen,projection" />

    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
 
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
        
  
   
</head>



<body>

    <div id="wrapper">
        <!-- top navigation  -->
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
               
                <a class="navbar-brand waves-effect waves-dark" href="index.php">
                    <i class="fa fa-truck"></i> Vozový park</a>

                <div id="sideNav" href=""><i class="fa fa-arrow-left"></i></div>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown1">
                        <i class="fa fa-user fa-fw"></i>
                        <?= $currUser ?> 
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">

            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>Odhlásit se</a>
            </li>
        </ul>


        <!-- side navigation -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <?php if (in_array($_SESSION["userRole"], array(1, 2,3 ))){?>
                    <li>
                        <a href="cars.php" class="waves-effect waves-dark">
                            <i class="fa fa-truck"></i></i>Vozidla</a>
                    </li>
<?php }?>


                    <?php if (in_array($_SESSION["userRole"], array(1))) {?>
                    <li>
                        <a href="employees.php" class="waves-effect waves-dark">
                            <i class="fa fa-user"></i>Uživatelé</a>
                    </li>
                    <?php }?>
                    

                    <?php if (in_array($_SESSION["userRole"], array(1, 4))) {?>
                    <li>
                        <a href="rides.php" class="waves-effect waves-dark">
                            <i class="fa fa-road"></i>Jízdy</a>
                    </li>
                    <?php }?>
                    
                    <?php if (in_array($_SESSION["userRole"], array(1, 3))) {?>
                    <li>
                        <a href="car_driver.php" class="waves-effect waves-dark">
                            <i class="fa  fa-truck"></i><i class="fa  fa-user"></i><br>Přidělit vozidlo řidiči</a>
                    </li>
                    <?php }?>
                  





                </ul>

            </div>

        </nav>


        <div id="page-wrapper">

            <h1 class="page-header">

            </h1>


            <div id="page-inner">