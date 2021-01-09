<? include_once "connect.php"; ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Sign Up</title>
    </head>
    <body>
	<div class="container" style="margin-top:75px">
		<div class="col-sm-4">
		<div class="panel panel-primary">
				<div class="panel-heading">Status Server</div>
				<div class="panel-body">
					<? echo $connstatus; ?>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="panel panel-success" >
				<div class="panel-heading">Register</div>
				<div class="panel-body">
					<form method="post" action="action.php?action=reg" name="member">
						<div class="form-group">
							<label for="username">Username:</label>
							<input type="username" class="form-control" name="username">
						</div>
						<div class="form-group">
							<label for="pwd">Password:</label>
							<input type="password" class="form-control" name="pwd">
						</div>
                        <div class="form-group">
							<label for="name">Name:</label>
							<input type="text" class="form-control" name="name">
						</div>
                        <div class="form-group">
							<label for="pwd">Passkey[สำหรับเจ้าหน้าที่]:</label>
							<input type="password" class="form-control" name="passkey">
						</div>
						<button type="submit" class="btn btn-success">Submit</button>
                        <button class="btn" type="button" onClick="javascript:history.go(-1)">กลับ</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>