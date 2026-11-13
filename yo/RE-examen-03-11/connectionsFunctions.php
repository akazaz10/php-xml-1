<?php
session_start();
require_once './config.php';

function addNewConnection($connectionsXml) {

    $newConnection = $connectionsXml->addChild("connection");
    $newConnection->addChild('dni', $_SESSION['dni'])->addAttribute('from', 'session');
    $newConnection->addChild('name', $_SESSION['name'])->addAttribute('from', 'session');
    $newConnection->addChild('last_name', $_SESSION['last_name'])->addAttribute('from', 'session');
    $newConnection->addchild('login_time', date('Y-m-d H:i:s'));
    $newConnection->addChild('logout_time', '');
    $newConnection->addChild('status', 'active');
    $newConnection->addChild('time_connection', '');

    xmlFormater($connectionsXml, "./xml/connections.xml");  

    echo $newConnection[0]->asXml();

}

function closeConnection($userDni, $connectionsXml) {

    $currentConnection = $connectionsXml->xpath("//connection[dni = '{$userDni}' and status = 'active']");
    $currentConnection[0]->logout_time = date('Y-m-d H:i:s');
    $currentConnection[0]->status = 'expired';
    $currentConnection[0]->time_connection = sessionTime($currentConnection[0]->login_time, $currentConnection[0]->logout_time);

    xmlFormater($connectionsXml, "./xml/connections.xml");

    echo $currentConnection[0]->asXml();

}



function sessionTime($loginTime, $logoutTime) {

    $newA = strtotime($loginTime);
    $newB = strtotime($logoutTime);
    $result = $newB - $newA;


    $horas = floor($result / 3600);
    $minutos = floor(($result % 3600) / 60);
    $segundos = $result % 60;

    return "Tiempo de conexión: {$horas} horas, {$minutos} minutos, {$segundos} segundos";;
}


?>