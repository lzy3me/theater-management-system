<?
    include_once("connect.php");
    $sql="SELECT ID_CUST, CONCAT(F_NAME, ' ', L_NAME) as NAME, m.NAME_MIVE, s.NAME_SEAT
            FROM customer as c, movie as m, seat as s
            WHERE c.ID_MIVE=m.ID_MIVE and c.CODE_SEAT=s.CODE_SEAT";
    $exec=$conn->query($sql);
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
                    <li class=""><a href="dashboard.php">Dashboard</a></li>
                    <li class="active"><a href="ticket.php">จัดการตั๋ว</a></li>
                    <li><a href="movie_manage.php">เพิ่ม/ลด ภาพยนตร์</a></li>
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
			<div class="panel-heading">Ticket List
            <a href="book.php" class="btn btn-success" role="button">
            <span class="glyphicon glyphicon-plus"></span> เพิ่ม</a></div>
			<div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ชื่อ นามสกุล</th>
                                <th>ชื่อภาพยนตร์</th>
                                <th>ที่นั่ง</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? while($tik=$exec->fetch()) { ?>
                                <tr>
                                    <td><?echo $tik[1];?></td>
                                    <td><?echo $tik[2];?></td>
                                    <td><?echo $tik[3];?></td>
                                    <td><a href="action.php?id=<?=$tik[0];?>&action=drop" class="btn btn-danger" role="button">
                                    <span class="glyphicon glyphicon-trash"></span></a></td>
                                </tr>
                            <? } ?>
                    </tbody>
                </table>
			</div>
		</div>
    </div>
</body>
</html>