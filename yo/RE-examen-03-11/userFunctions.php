<?php
require './config.php';


function userActive($userDni, $xmlConnections) {

    $activeConnection = $xmlConnections->xpath("connection[dni = '{$userDni}' and status = 'active']");

    return !empty($activeConnection) ? true : false;

}


function addNewUser($usersXml, $userDni, $userName, $userLastName, $userAge, $userPassword) {

    $newUser = $usersXml->addChild('user');
    $newUser->addChild('dni', $userDni);
    $newUser->addChild('name', $userName);
    $newUser->addChild('last_name', $userLastName);
    $newUser->addChild('age', $userAge);
    $newUser->addChild('password', $userPassword);

    xmlFormater($usersXml, "./xml/users.xml");
    
    echo $newUser[0]->asXml();
}


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


?>