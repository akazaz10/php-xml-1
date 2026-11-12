<?php
require './config.php';


function addNewConnection($connectionsXml, $userDni) {

    $newConnection = $connectionsXml->addChild("connection");
    $newConnection->addChild('dni', $userDni);
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