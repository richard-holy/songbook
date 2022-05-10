<?php
require_once("app/application.php");
require_once("app/user.php");

$application = new Application();
$user = new User($application);


if(!empty($_POST)) {
    // print_r($_POST);
    if(!empty($_POST['remove'])) {
        $user->deleteUser($_POST['remove']);
        $userDeleted = true;
    }
    if(!empty($_POST['newPlayer']) && $_POST['newPlayer'] == 'yes') {
        if(!empty($_POST['username']) && !empty($_POST['fullname']) && !empty($_POST['age']) && !empty($_POST['role'])) {
            $user->createUser($_POST['fullname'], $_POST['username'], $_POST['age'], $_POST['description'], $_POST['role']);
            $userAdded = true;
        } else {
            $missingDetails = true;
        }
    }
}





$players = $user->getAllPlayers();
include_once("view/page.php");




