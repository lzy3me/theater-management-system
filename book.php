<? include_once("connect.php"); ?>
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
			<div class="panel-heading">Add Movie</div>
			<div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>รหัส</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>หนัง</th>
                            <th>ที่นั่ง</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?
                        $sql="SELECT * FROM `movie`";
                        $exec=$conn->query($sql);
                    ?>
                        <form action="action.php?action=add" name="add" method="post">
                                <td><input type='text' name='txtId' size='3'></td>
                                <td><input type="text" name="txtName" size="10"></td>
                                <td><input type="text" name="txtSerN" size="10"></td>
                                <td><select class="form-control" name="movie">
                                        <? while($record=$exec->fetch()) {?>
                                            <option value=<?=$record[0]?>><?echo $record[1]?></option><?
                                        }?>
                                    </select></td>
                                    <?
                                        $sql="SELECT * FROM `seat`";
                                        $exec=$conn->query($sql);
                                    ?>
                                    <td><select class="form-control" name="seat">
                                        <? while($seat=$exec->fetch()) {?>
                                            <option value=<?=$seat[0]?>><?echo $seat[1]?></option><?
                                        }?>
                                    </select></td>
                            </tr><tr>
                                <td><button type="submit" class="btn btn-success">Submit</button></td>
                            </tr>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>