<?php
require_once __DIR__ .DIRECTORY_SEPARATOR . "vendor". DIRECTORY_SEPARATOR  . "autoload.php";
session_start();
$submit = filter_input(INPUT_POST, 'loginSubmit');
if (!empty($submit)) {
    echo "Formulář byl odeslán";
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    var_dump(Model::authenticate($email, $password));
    if (Model::authenticate($email, $password)) {
        $_SESSION["logged"] = true;
        $_SESSION["userRole"] = Model::getUserRole($email);
		$_SESSION["userId"] = Model::getIdByEmail($email);
		
      
        header("location:index.php");
    } else {
        header("location:login.php");
    }
}



//?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href = "assets/css/style.css" rel = "stylesheet">
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<!------ Include the above in your HEAD tag ---------->





<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Přihlášení</h3>
				
			</div>
			<div class="card-body">
				<form method="post" action="login.php">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="email" placeholder="email">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-key"></i></span>
						</div>
						<input type="password" name="password" class="form-control" placeholder="password">
					</div>
					
					<div class="form-group">
                    <div class="text-center">
						<input type="submit" name="loginSubmit" value="Login" class="btn  login_btn ">
                    </div>
                    </div>
				</form>
			</div>
			
		</div>
	</div>
</div>




