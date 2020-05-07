<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR  . "autoload.php";
session_start();
if (!$_SESSION["logged"]) {
    header("location:login.php");
}


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Target Material Design Bootstrap Admin Template</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="libs/materialize/css/materialize.min.css" media="screen,projection" />
	<!-- Bootstrap Styles-->
	<link href="libs/css/bootstrap.css" rel="stylesheet" />
	<!-- FontAwesome Styles-->
	<link href="libs/css/font-awesome.css" rel="stylesheet" />
	<!-- Morris Chart Styles-->
	<link href="libs/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
	<!-- Custom Styles-->
	<link href="libs/css/custom-styles.css" rel="stylesheet" />
	<!-- Google Fonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="libs/js/Lightweight-Chart/cssCharts.css">
</head>

<body>
	<div id="wrapper">
		<nav class="navbar navbar-default top-navbar" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle waves-effect waves-dark" data-toggle="collapse"
					data-target=".sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand waves-effect waves-dark" href="index.html"><i
						class="large material-icons">track_changes</i> <strong>Vozový park</strong></a>

				<div id="sideNav" href=""><i class="material-icons dp48">toc</i></div>
			</div>

			<ul class="nav navbar-top-links navbar-right">

				<li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown1"><i
							class="fa fa-user fa-fw"></i> <b>John Doe</b> <i
							class="material-icons right">arrow_drop_down</i></a></li>
			</ul>
		</nav>
		<!-- Dropdown Structure -->
		<ul id="dropdown1" class="dropdown-content">
			<li><a href="#"><i class="fa fa-user fa-fw"></i> My Profile</a>

			<li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
			</li>
		</ul>



		<!--/. NAV TOP  -->
		<nav class="navbar-default navbar-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav" id="main-menu">

				<?php if ($_SESSION["userRole"] == "1" || $_SESSION["userRole"] == "2" || $_SESSION["userRole"] == "3") {
                        ?> <li class="nav-item">
                                <a class="nav-link " href="cars.php">
                                    Vozidla <span class="sr-only">(current)</span>
                                </a>
                            </li>
                        <?php
                        }
                        ?>

                        <?php if ($_SESSION["userRole"] == "1" || $_SESSION["userRole"] == "4") {
                        ?> <li class="nav-item">
                                <a class="nav-link" href="rides.php">
                                    Jízdy
                                </a>
                            </li>

                        <?php
                        }
                        ?>

                        <?php if ($_SESSION["userRole"] == "1") {
                        ?> <li class="nav-item">
                                <a class="nav-link" href="employees.php">
                                    Výpis uživatelů </a>
                            </li>



                        <?php
                        } ?>


                        <?php if ($_SESSION["userRole"] == "1" || $_SESSION["userRole"] == "3") {
                        ?> <li class="nav-item">
                                <a class="nav-link" href="car_driver.php">
                                    Přidělení vozidla k řidiči
                                </a>
                            </li>

                        <?php
                        }
                        ?>





				</ul>

			</div>

		</nav>
		<!-- /. NAV SIDE  -->

		<div id="page-wrapper">
			<div class="header">
				<h1 class="page-header">
					Dashboard
				</h1>


			</div>
			
		</div>


		<footer>
			<p></a></p>


		</footer>
	</div>
	<!-- /. PAGE INNER  -->
	</div>
	<!-- /. PAGE WRAPPER  -->
	</div>
	<!-- /. WRAPPER  -->
	<!-- JS Scripts-->
	<!-- jQuery Js -->
	<script src="assets/js/jquery-1.10.2.js"></script>

	<!-- Bootstrap Js -->
	<script src="assets/js/bootstrap.min.js"></script>

	<script src="assets/materialize/js/materialize.min.js"></script>

	<!-- Metis Menu Js -->
	<script src="assets/js/jquery.metisMenu.js"></script>
	<!-- Morris Chart Js -->
	<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
	<script src="assets/js/morris/morris.js"></script>


	<script src="assets/js/easypiechart.js"></script>
	<script src="assets/js/easypiechart-data.js"></script>

	<script src="assets/js/Lightweight-Chart/jquery.chart.js"></script>

	<!-- Custom Js -->
	<script src="assets/js/custom-scripts.js"></script>


</body>

</html>