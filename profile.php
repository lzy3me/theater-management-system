<?
	session_start();
	if($_SESSION['UserID'] == "") {
		echo "Please Login!";
		exit();
    }
    include_once("connect.php");
    $sql="SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."'";
    $exec=$conn->query($sql);
    $result=$exec->fetch();
?>
<html>
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
                    <li class="disabled success"><a href="#">จัดการตั๋ว</a></li>
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
      <div class="col-sm-6">
        <div class="panel panel-primary">
          <div class="panel-heading">Edit Profile</div>
          <div class="panel-body">
            <form name="form1" method="post" action="save_profile.php">
              <table style="border-collapse: collapse; width: 100%;">
                <tr>
                  <td><b>UserID :</b></td>
                  <td><label for="id"><?php echo $result["UserID"];?></label></td>
                </tr><tr>
                  <td><b>Username :</b></td>
                  <td><lable for="username"><?php echo $result["Username"];?></lable></td>
                </tr><tr>
                  <td><b>Name :</b></td>
                  <td><input name="txtName" type="text" id="txtName" value="<?php echo $result["Name"];?>"></td>
                </tr><tr>
                  <td><b>New Password :</b></td>
                  <td><input name="txtPassword" type="password" id="txtPassword"></td>
                </tr><tr>
                  <td><b>Confirm Password :</b></td>
                  <td><input name="txtConPassword" type="password" id="txtConPassword"></td>
                </tr><tr>
                  <td><b>Status :</b></td>
                  <td><lable for="status"><?php echo $result["Status"];?></lable></td>
                </tr><tr>
                  <td></td>
                  <td><button type="submit" class="btn btn-success">Save</button></td>
                </tr>
              </table>
            </form>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="panel panel-primary">
				  <div class="panel-heading">Admin tool</div>
				  <div class="panel-body">
            <a href="#" data-toggle="popover" title="Admin Passkey" data-content="md5: a5e0a462640a63b77849b95a61085071">Passkey</a><br>
            <a href="admin/md5.php" target="_blank">Md5 Generator</a>
				  </div>
			  </div>
      </div>
    </div>
    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();   
        });
    </script>
</body>