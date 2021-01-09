<?
	session_start();
	include_once ("connect.php");
	$username=$_GET['username'];	$password=md5($_GET['pwd']);
	$sql="SELECT * FROM member WHERE Username = '$username' and Password = '$password'";
	$exec=$conn->query($sql);
	$result=$exec->fetch();
	if(!$result) {
			$status="Username and Password Incorrect!";
	} else {
		$_SESSION["UserID"] = $result["UserID"];
		$_SESSION["Status"] = $result["Status"];
	
		session_write_close();
				
		if($result[4] == "ADMIN") {
			header("location:dashboard.php");
		} else {
			$_SESSION['error'] = "FORBIDDEN_USER";
			header("location:404.php");
		}
	}
	$conn=null;
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Error!</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
	<br><br><br><br><br><br>
		<div class="panel panel-danger">
			<div class="panel-heading">ERROR!</div>
			<div class="panel-body">
				<? echo $status; ?>  <button type="button" onClick="javascript:history.go(-1)"><span></span>back</button>
			</div>
		</div>
	</div>
</body>
</html>