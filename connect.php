<?
    $server="db";
    $user="theater_web";
    $pass="restart0";
    $db="theater";

    try {
        $conn=new PDO("mysql:host=$server;dbname=$db", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connstatus="Connection successfully";
    } catch(PDOException $e) {
        $connstatus="Connection drop : " . $e->getMessage();
    }
?>
