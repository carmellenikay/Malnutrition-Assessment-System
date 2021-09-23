<?php
		define("DB_SERVER", "localhost");
        define("DB_USER", "root");
        define("DB_PASSWORD", "");
        define("DB_DATABASE", "legazpidamageassessment");

        $this->con = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
		if($this->con->connect_error)
        {
            die("Connection Failed". $this->conn->connect_error);
            
        }
?>