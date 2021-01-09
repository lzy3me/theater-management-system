<?php 
	include_once "php/db/connection.php"; 
	$db = new Connection();
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Welcome | TMS</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container" style="margin-top:75px">
		<div class="col-sm-4">
		<div class="panel panel-primary">
				<div class="panel-heading">Status Server</div>
				<div class="panel-body">
					<? echo $db->initialize(); ?>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="panel panel-success" >
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					<h2>Welcome to TMS, Please Login.</h2>
					<form action="check.php" name="member" method="get">
						<div class="form-group">
							<label for="email">Username: admin</label>
							<input type="username" class="form-control" name="username">
						</div>
						<div class="form-group">
							<label for="pwd">Password: 1812</label>
							<input type="password" class="form-control" name="pwd">
							<a href='account.php'>Didn't have an account?</a>
						</div>
						<button type="submit" class="btn btn-success">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>