<?php
    include_once '../db/connection.php';

    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $email = $_REQUEST['email'];
    
    $request_header = $_REQUEST['request'];

    $DB = new Connection();
    $conn = $DB->initialize();

    if ($request_header == "login") {
        onLogin($username, $password);
    }

    function onLogin($username, $password) {
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