<?php

class Database extends PDO {

    function __construct() {
        $servername = config::$server;
        $mydatabase = config::$database;
        parent::__construct("mysql:host={$servername};dbname={$mydatabase}", config::$user, config::$password);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }   

}
