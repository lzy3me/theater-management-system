<? include_once("connect.php"); $code=$_REQUEST["id"];?>
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
			<div class="panel-heading">Add Movie</div>
			<div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>รหัส</th>
                            <th>ชื่อภาพยนตร์</th>
                            <th>ความยาว</th>
                            <th>หนังตัวอย่าง</th>
                            <th>โปสเตอร์</th>
                            <th>แนว</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?
                        if($_REQUEST['id'] != "") {
                            $sql="SELECT * FROM movie WHERE ID_MIVE='".$_REQUEST['id']."'";
                            $exec=$conn->query($sql);
                            $column=$exec->fetch();
                            $act="medit";
                        } else {
                            $act="madd";
                        }
                    ?>
                        <form action="action.php?action=<?=$act?>" name="add" method="post">
                                <td><? if($column[0] == $_REQUEST['id'] && $column[0] !=NULL) {
                                            echo "<input type='text' name='txtId' size='3' value='$column[0]' disabled>";
                                        } else {
                                            echo "<input type='text' name='txtId' size='3'>";
                                        }
                                ?></td>
                                <td><input type="text" name="txtName" size="30" value="<?=$column[1];?>"></td>
                                <td><input type="text" name="txtLeng" size="3" value="<?=$column[2];?>"></td>
                                <td><input type="text" name="txtTeser" size="20" value="<?=$column[3];?>"></td>
                                <td><input type="text" name="txtPoster" size="20" value="<?=$column[4];?>"></td>
                                <td><select class="form-control" name="Genr">
                                        <option value=a>Action</option>
                                        <option value=d>Drama</option>
                                        <option value=h>Horror</option>
                                        <option value=c>Comady</option>
                                        <option value=s>Sci-Fi</option>
                                        <option value=u>Unknow</option>
                                    </select>
                                </td>
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