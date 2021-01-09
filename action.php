<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Movie | TMS</title>
</head>
<body>
	<div>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Theater Management System</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="disabled"><a href="dashboard.php">Dashboard</a></li>
                    <li class="disabled"><a href="ticket.php">จัดการตั๋ว</a></li>
                    <li class="disabled"><a href="movie_manage.php">เพิ่ม/ลด ภาพยนตร์</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="profile.php"><span class="glyphicon glyphicon-user">
                    </span></a></li>
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out">
                    </span> Logout</a></li>
                </ul>
            </div>
        </nav>
    </div>
	<div class="container" style="margin-top:75px;">
        <div class="panel panel-primary">
			<div class="panel-heading"></div>
			<div class="panel-body">
				<?
					include_once("connect.php");
					$getID=$_REQUEST['id']; // for use in drop and/or delete action
					$id=$_REQUEST['txtId'];				$bookser=$_REQUEST['txtSerN'];
					$name=$_REQUEST['txtName'];			$movie=$_REQUEST['movie'];
					$lenght=$_REQUEST['txtLeng'];		$seat=$_REQUEST['seat'];
					$teser=$_REQUEST['txtTeser'];		
					$poster=$_REQUEST['txtPoster'];
					$genr=$_REQUEST['Genr'];
					// Username and Password for login and Register
					$username=$_REQUEST['username'];
					$password=md5($_REQUEST['pwd']);
					$nameMem=$_REQUEST['name'];			// Member name
					$passkey=$_REQUEST['passkey'];
					if($_REQUEST['action'] == "madd") {
						$sql="INSERT INTO `movie` (`ID_MIVE`, `NAME_MIVE`, `LENGTH_MIVE`, `TESER_MIVE`, `POS_MIVE`, `GENR_MIVE`)
						VALUES ('$id', '$name', '$lenght', '$teser', '$poster', '$genr')";
						$exec=$conn->query($sql);?>
						<script>alert("Your Data was Added!");</script> <?
					}
					if($_REQUEST['action'] == "medit") {
						$sql="UPDATE `movie` SET `ID_MIVE` = '$id', `NAME_MIVE` = '$name', 
							`LENGTH_MIVE` = '$lenght',`TESER_MIVE` = '$teser',`POS_MIVE` = '$poster',
							`GENR_MIVE` = '$genr' WHERE `ID_MIVE` = '$id'";
						$exec=$conn->query($sql); ?>
						<script>alert("Your Data was Edided!");</script> <?
					}
					if($_REQUEST['action'] == "mdrop") {
						$sql="DELETE FROM `movie` WHERE ID_MIVE='$getID'";
						$exec=$conn->query($sql); ?>
						<script>alert("Your Data was Deleted!");</script>
					<?}
					if($_REQUEST['action'] == "drop") {
						$sql="DELETE FROM `customer` WHERE ID_CUST='$getID'";
						$exec=$conn->query($sql); ?>
						<script>alert("Your Data was Deleted!");</script>
					<?}
					if($_REQUEST['action'] == "reg") {
						if($passkey == "a5e0a462640a63b77849b95a61085071") {
							$status="1";
						} else {
							$status="0";
						}
						$sql="INSERT INTO `member` (`Username`, `Password`, `Name`, `Status`)
						VALUES ('$username', '$password', '$nameMem', '$status')";
						$exec=$conn->query($sql);
					}
					if($_REQUEST['action'] == "add") {
						$sql="INSERT INTO `customer` (`ID_CUST`, `F_NAME`, `L_NAME`, `ID_MIVE`, `CODE_SEAT`)
						VALUES ('$id', '$name', '$bookser', '$movie', '$seat')";
						$exec=$conn->query($sql);?>
						<script>alert("Your Data was Added!");</script> <?
					}
					if($_REQUEST['action'] == "login") {
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
					}
				?>
				<button class="btn btn-block" type="button" onClick="javascript:history.go(-1)">กลับ</button>
			</div>
		</div>
	</div>
</body>
</html>