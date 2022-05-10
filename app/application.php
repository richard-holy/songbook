<?php

class Application {

    private $config;
    private $dbConnection;

    public function __construct() {
        $this->config = parse_ini_file("config/application.ini", true);
        $db = $this->config["db"];
        $this->dbConnection = mysqli_connect($db["host"], $db["username"], $db["password"], $db["database"], $db["port"]);
    }

    public function getDbConnection() {
        return $this->dbConnection;
    }

}