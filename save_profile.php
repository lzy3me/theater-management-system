<?php
	session_start();
	if($_SESSION['UserID'] == "") {
        $_SESSION['error'] = "CANT_LOGIN";
        header('location:404.php');
        exit();
    }
	include_once("connect.php");
	
	if($_POST["txtPassword"] != $_POST["txtConPassword"]){
		$error=1;
		exit();
    }
    $pass=md5($_POST["txtPassword"]);
    $name=$_POST["txtName"];
	$sql="UPDATE member SET Password ='$pass' 
	,Name = '$name' WHERE UserID = '".$_SESSION["UserID"]."' ";
	$exec=$conn->query($sql);
	$error=0;	
	$conn=null;
?>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Profile | TMS</title>
</head>
<body>
    <div>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Theater Management System</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li class="disabled"><a href="#">จัดการตั๋ว</a></li>
                    <li class="disabled"><a href="#">เพิ่ม/ลด ภาพยนตร์</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"`><a href="profile.php"><span class="glyphicon glyphicon-user">
                    </span><? echo " $result[3]"; ?></a></li>
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out">
                    </span> Logout</a></li>
                </ul>
            </div>
        </nav>
    </div>
	<div class="container" style="margin-top:75px">
		<? if($error == 1) {
				echo "<h1>Error!</h1>";
				echo "<p>Your password isn't match!</p>";
				if($_SESSION['Status'] == "ADMIN") {
					echo "<p>Go to <a href='dashboard.php'>Dashboard</a></p>";
				} else {
					echo "<p>Go to <a href='Home.php'>Home Page</a></p>";
				}
			} else {
				echo "<h1>Save complete!</h1>";
				if($_SESSION['Status'] == "ADMIN") {
					echo "<p>Go to <a href='dashboard.php'>Dashboard</a></p>";
				} else {
					echo "<p>Go to <a href='Home.php'>Home Page</a></p>";
				}
			}

		?>