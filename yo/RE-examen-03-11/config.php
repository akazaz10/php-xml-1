<?php
date_default_timezone_set('Europe/Madrid');

function userExist($userDni, $xmlUsers) {

    $existingUser = $xmlUsers->xpath("user[dni='{$userDni}']");

    return !empty($existingUser) ? true : false;

}

function loginValidator($userDni, $userPassword, $xmlUsers) {

    $existingUser = $xmlUsers->xpath("user[dni='{$userDni}']");
    $user = $existingUser[0];
    $output = [
        'bool'=> (($userPassword == $user->password) ? true : false),
        'user'=> $user
    ];

    return $output;
    
}


function addNewConnection($connectionsXml, $userDni) {

    $newConnection = $connectionsXml->addChild("connection");
    $newConnection->addChild('dni', $userDni);
    $newConnection->addchild('login_time', date('Y-m-d H:i:s'));
    $newConnection->addChild('logout_time', '');
    $newConnection->addChild('status', 'active');

    xmlFormater($connectionsXml, "./connections.xml");  

    echo $newConnection[0]->asXml();

}


function addNewUser($usersXml, $userDni, $userName, $userLastName, $userAge, $userPassword) {

    $newUser = $usersXml->addChild('user');
    $newUser->addChild('dni', $userDni);
    $newUser->addChild('name', $userName);
    $newUser->addChild('last_name', $userLastName);
    $newUser->addChild('age', $userAge);
    $newUser->addChild('password', $userPassword);

    xmlFormater($usersXml, "./users.xml");
    
    echo $newUser[0]->asXml();
}


function userActive($userDni, $xmlConnections) {

    $activeConnection = $xmlConnections->xpath("connection[dni = '{$userDni}' and status = 'active']");

    return !empty($activeConnection) ? true : false;

}



function closeConnection($userDni, $connectionsXml) {

    $currentConnection = $connectionsXml->xpath("//connection[dni = '{$userDni}' and status = 'active']");
    $currentConnection[0]->logout_time = date('Y-m-d H:i:s');
    $currentConnection[0]->status = 'expired';

    xmlFormater($connectionsXml, "./connections.xml");

    echo $currentConnection[0]->asXml();

}

function xmlFormater($xmlData, $route) {

    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($xmlData->asXML());
    $dom->save($route);

}




?>