<?php

class User {
    private $application;


    /** @var $application instance of class Appication **/
    public function __construct($application) {
        $this->application = $application;
    }

    public function createUser($fullname, $username, $age, $description, $role) {
        $connection = $this->application->getDbConnection();
        $sqlCommand = "INSERT INTO players (username, fullname, description, age, role) VALUES ('".mysqli_real_escape_string($connection, $_POST['username'])."','".mysqli_real_escape_string($connection, $fullname)."','".mysqli_real_escape_string($connection, $description)."',".mysqli_real_escape_string($connection, $age).",'".mysqli_real_escape_string($connection, $role)."')";
        // echo $sqlCommand;
        $result = mysqli_query($connection, $sqlCommand);
    }

    public function deleteUser($id) {
        $connection = $this->application->getDbConnection();
        mysqli_query($connection, "DELETE FROM players WHERE id=".$id);
    }

    public function getAllPlayers() {
        $connection = $this->application->getDbConnection();
        $result = mysqli_query($connection, "SELECT * FROM players");
        $players = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $players;
    }
}