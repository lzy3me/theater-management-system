<?
    include_once("connect.php");
    $sql="select * from movie";
    $exec=$conn->query($sql);
?>
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
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="ticket.php">จัดการตั๋ว</a></li>
                    <li class="active"><a href="movie_manage.php">เพิ่ม/ลด ภาพยนตร์</a></li>
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
			<div class="panel-heading">Movie List   
            <a href="movie_form.php" class="btn btn-success" role="button">
            <span class="glyphicon glyphicon-plus"></span> เพิ่ม</a></div>
			<div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>รหัส</th>
                                <th>ชื่อภาพยนตร์</th>
                                <th>ความยาว</th>
                                <th>แนว</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? while($movie=$exec->fetch()) { 
                                switch($movie[5]) {
                                    case "a":
                                        $cal="Action";
                                        break;
                                    case "d":
                                        $cal="Drama";
                                        break;
                                    case "h":
                                        $cal="Horror";
                                        break;
                                    case "c":
                                        $cal="Comady";
                                        break;
                                    case "s":
                                        $cal="Sci-Fi";
                                        break;
                                    default:
                                        $cal="Unknow";
                                }    
                            ?>
                                <tr>
                                    <td><?echo $movie[0];?></td>
                                    <td><?echo $movie[1];?></td>
                                    <td><?echo $movie[2];?></td>
                                    <td><?echo $cal;?></td>
                                    <td><a href="movie_form.php?id=<?=$movie[0]?>&action=edit" class="btn btn-warning" role="button">
                                    <span class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="action.php?id=<?=$movie[0];?>&action=mdrop" class="btn btn-danger" role="button">
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