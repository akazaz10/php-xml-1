<?php
session_start();
require_once './config.php';


// function addNewConnection($connectionsXml, $userDni) {

//     $newConnection = $connectionsXml->addChild("connection");
//     $newConnection->addChild('dni', $_SESSION['dni']);
//     $newConnection->addChild('name', $_SESSION['name']);
//     $newConnection->addChild('last_name', $_SESSION['last_name']);
//     $newConnection->addchild('login_time', date('Y-m-d H:i:s'));
//     $newConnection->addChild('logout_time', '');
//     $newConnection->addChild('status', 'active');

//     xmlFormater($connectionsXml, "./xml/connections.xml");  

//     echo $newConnection[0]->asXml();

// }

function addNewConnection($connectionsXml) {

    $newConnection = $connectionsXml->addChild("connection");
    $newConnection->addChild('dni', $_SESSION['dni'])->addAttribute('from', 'session');
    // $newConnection->addAttribute('session', '');
    $newConnection->addChild('name', $_SESSION['name'])->addAttribute('from', 'session');
    // $newConnection->addAttribute('session', '');
    $newConnection->addChild('last_name', $_SESSION['last_name'])->addAttribute('from', 'session');
    // $newConnection->addAttribute('session', '');
    $newConnection->addchild('login_time', date('Y-m-d H:i:s'));
    $newConnection->addChild('logout_time', '');
    $newConnection->addChild('status', 'active');

    xmlFormater($connectionsXml, "./xml/connections.xml");  

    echo $newConnection[0]->asXml();

}





function closeConnection($userDni, $connectionsXml) {

    $currentConnection = $connectionsXml->xpath("//connection[dni = '{$userDni}' and status = 'active']");
    $currentConnection[0]->logout_time = date('Y-m-d H:i:s');
    $currentConnection[0]->status = 'expired';

    xmlFormater($connectionsXml, "./xml/connections.xml");

    echo $currentConnection[0]->asXml();

}


?>