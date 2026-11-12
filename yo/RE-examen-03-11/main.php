<?php
require './config.php';
session_start();

$usersXml = simplexml_load_file("./users.xml");
$connectionsXml = simplexml_load_file("./connections.xml");
$warningsXml = simplexml_load_file("./warnings.xml");


$action = $_GET['action'] ?? '';
$adminAction = $_GET['admin_action'] ?? '';


$userDni = $_GET['dni'] ?? '';
$userName = $_GET['name'] ?? '';
$userLastName = $_GET['last_name'] ?? '';
$userAge = $_GET['age'] ?? '';
$userPassword = $_GET['password'] ?? '';


header("Content-Type: application/xml; charset=utf-8");
// echo $usersXml->asXml();


switch ($action) {

    case "login":
        if (!userExist($userDni, $usersXml)) {
            $loginWarning = $warningsXml->xpath("//warning[@state='unknownUser']");
            echo $loginWarning[0]->asXml();            
            break;
        } 

        $output = loginValidator($userDni, $userPassword, $usersXml);

        if ($output['bool'] == true) {
            
            addNewConnection($connectionsXml, $output['user']->dni);


        } else {
            $loginWarning = $warningsXml->xpath("//warning[@state='incorrectPassword']");
            echo $loginWarning[0]->asXml();

        }

        ///////
        // header('location: ./login.php');
        break;
    

    case "register":
        if (empty($userDni) || empty($userName) || empty($userLastName) || empty($userAge) || empty($userPassword)) {
            $registerWarning = $warningsXml->xpath("//warning[@state='parameters']");
            echo $registerWarning[0]->asXml();            
            break;
        } 
        if (userExist($userDni, $usersXml)) {
            $registerWarning = $warningsXml->xpath("//warning[@state='dniRegistered']");
            echo $registerWarning[0]->asXml();            
            break;
        } 

        addNewUser($usersXml, $userDni, $userName, $userLastName, $userAge, $userPassword);
        
        
        ///////
        // header('location: ./register.php');
        break;

    case "logout":

        if (!userExist($userDni, $usersXml)) {

            $logoutWarning = $warningsXml->xpath("//warning[@state='unknownUser']");
            echo $logoutWarning[0]->asXml();            
            break;
        } 

        if (userActive($userDni, $connectionsXml)) {
            
            closeConnection($userDni, $connectionsXml);
            
        } else {
            $logoutWarning = $warningsXml->xpath("//warning[@state='notExist']");
            echo $logoutWarning[0]->asXml();
        }
        
        // session_destroy();
        break;

    case "admin":

        switch($adminAction){

            case "users":
                echo $usersXml->asXml();
                break;

            case "connections":
                echo $connectionsXml->asXml();
                break;

        }

        break;


}

?>