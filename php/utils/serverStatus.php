<?php
    include_once '../db/connection.php';
    $db = new Connection();
    echo $db->initialize();
?>