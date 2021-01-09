<?
    session_start();
    if($_SESSION['UserID'] == "") {
        $_SESSION['error'] = "CANT_LOGIN";
        header('location:404.php');
        exit();
    }
    if($_SESSION['Status'] != "ADMIN") {
        $_SESSION['error'] = "YOU_NOT_ADMIN";
        header('location:404.php');
        exit();
    }
    include_once("connect.php");
    $sql="select * from member where UserID='".$_SESSION['UserID']."'";
    $exec=$conn->query($sql);
    $result=$exec->fetch();
?>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <title>Dashboard | TMS</title>
</head>
<body>
    <div>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Theater Management System</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Dashboard</a></li>
                    <li class=""><a href="ticket.php">จัดการตั๋ว</a></li>
                    <li><a href="movie_manage.php">เพิ่ม/ลด ภาพยนตร์</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="profile.php"><span class="glyphicon glyphicon-user">
                    </span><? echo " $result[3]"; ?></a></li>
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out">
                    </span> Logout</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container" style="margin-top:50px">
        <h3>ยินดีต้อนรับ <?echo $result[3]?><br>
        <small>Welcome <?echo $result[3]?></small></h3>
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">รายการ</div>
                    <div class="panel-body">
                    <a href="ticket.php" class="btn btn-success btn-block" role="button">จัดการตั๋ว</a>
                    <a href="movie_manage.php" class="btn btn-success btn-block" role="button">เพิ่ม/ลด ภาพยนตร์</a>
				    </div>
			    </div>
            </div>
            <div class="col-md-4"> 
                <div class="panel panel-primary">
                    <div class="panel-heading">รายการ Booking</div>
                    <div class="panel-body">
                    <table class="table">
                            <thead>
                                <tr>
                                    <td>รหัส</td>
                                    <td>จำนวน</td>
                                </tr>
                            </thead>
                            <tbody>
                                    <?
                                        $sql="SELECT m.ID_MIVE, COUNT(c.ID_MIVE) as sum FROM `movie` as m, `customer` as c
                                                Where c.ID_MIVE=m.ID_MIVE
                                                GROUP BY c.ID_MIVE ORDER BY sum DESC"; 
                                        $exec=$conn->query($sql);
                                        for ($i=0; $i<2; $i++) { 
                                            $column=$exec->fetch();?>
                                        <tr>
                                            <td><?echo $column[0];?></td>
                                            <td><?echo $column[1];?> Book</td>
                                        </tr>
                                        <?}
                                    ?>
                            </tbody>
                        </table>
				    </div>
			    </div>
            </div>
            <div class="col-md-4"> 
                <div class="panel panel-primary">
                    <div class="panel-heading">หนังใหม่ล่าสุด</div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>ภาพยนตร์</td>
                                    <td>รหัส</td>
                                </tr>
                            </thead>
                            <tbody>
                                    <?
                                        $sql="SELECT * FROM `movie` ORDER BY `ID_MIVE` DESC"; 
                                        $exec=$conn->query($sql);
                                        for ($i=0; $i<2; $i++) { 
                                            $column=$exec->fetch();?>
                                        <tr>
                                            <td><a href="movie.php?id=<?=$column[0]?>" target="_blank"><?echo $column[1];?></a></td>
                                            <td><?echo $column[0];?></td>
                                        </tr>
                                        <?}
                                    ?>
                            </tbody>
                        </table>
                    </div>
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
</html>