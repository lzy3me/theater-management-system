<?php
    class Connection {
        private $HOST = "db";
        private $DB = "theater";
        private $USER = "theater_web";
        private $PASW = "restart0";
        private $CONN;
    
        function initialize() {
            $connstatus;
            try {
                $CONN = new PDO("mysql:host=$this->HOST;dbname=$this->DB", $this->USER, $this->PASW);
                $CONN->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connstatus="Connection successfully";
            } catch (PDOException $e) {
                $connstatus="Connection drop : " .$e;
            }

            return $connstatus;
        }

        function getConnection() {
            return $CONN;
        }
    }
    
?>