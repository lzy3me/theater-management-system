<?php
    include_once '../db/connection.php';

    class UserManage {
        private $DB;

        function __construct() {
            $this->DB = new Connection();
            $DB->initialize();
        }

        function addUser($username, $email, $password) {
            $status;
            try {
                $stmt = $DB->getConnection();
                $stmt->query('INSERT INTO member (Username, Password) VALUES ($username, $password)');
                $status = "Added";
            } catch (Exception $e) {
                $status = 'ERR: '.$e;
            }
            return $status;
        }
    }
?>