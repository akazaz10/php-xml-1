<?php
require './config.php';
session_start();

$xml = simplexml_load_file("./users.xml");

if (isset($_GET['action'])) {
    
    // 1. CASO LOGIN
    if ($_GET['action'] === 'Login') {

        $userDni = $_GET['dni'] ?? '';
        $userPassword = $_GET['password'] ?? '';

        $existingUser = $xml->xpath("user[dni='{$userDni}']");

        if (empty($existingUser)) {
            echo "El usuario no existe.";
        } else {
            $user = $existingUser[0];

            if ($userPassword !== (string)$user->password) {
                echo "Contraseña incorrecta.";
            } else {
                // Creación de la sesión
                $_SESSION['dni'] = (string)$user->dni;
                $_SESSION['name'] = (string)$user->name;
                $_SESSION['last_name'] = (string)$user->last_name;

                // Registro de la conexión
                $xmlConnections = simplexml_load_file("./connections.xml");
                $newConnection = $xmlConnections->addChild("connection");
                $newConnection->addChild('dni', (string)$user->dni);
                $newConnection->addChild('login_time', date('Y-m-d H:i:s'));
                $newConnection->addChild('logout_time', '');
                $newConnection->addChild('status', 'active');

                xmlFormater($xmlConnections, "./connections.xml");

                echo "Login exitoso. Sesión iniciada para " . (string)$user->name;
            }
        }

    // 2. CASO REGISTRO
    } elseif ($_GET['action'] === 'addUser') {

        $userDni = $_GET['dni'] ?? '';
        $userName = $_GET['name'] ?? '';
        $userLastName = $_GET['last_name'] ?? '';
        $userAge = $_GET['age'] ?? '';
        $userPassword = $_GET['password'] ?? '';

        if (empty($userDni) || empty($userName) || empty($userLastName) || empty($userAge) || empty($userPassword)) {
            echo "Error: Todos los parámetros deben ser rellenados en la URL.";
        } else {
            $existingUser = $xml->xpath("user[dni='{$userDni}']");

            if (!empty($existingUser)) {
                echo "El DNI ya está registrado.";
            } else {
                $newUser = $xml->addChild('user');
                $newUser->addChild('dni', $userDni);
                $newUser->addChild('name', $userName);
                $newUser->addChild('last_name', $userLastName);
                $newUser->addChild('age', $userAge);
                $newUser->addChild('password', $userPassword);

                xmlFormater($xml, "./users.xml");

                echo "Usuario registrado correctamente en el XML.";
            }
        }
    } elseif ($_GET['action'] === 'Logout') {
        
        $userDni = $_GET['dni'] ?? '';
        $xmlConnections = simplexml_load_file("./connections.xml");
        
        // Buscamos la conexión activa de ese DNI
        $activeConnection = $xmlConnections->xpath("connection[dni='{$userDni}' and status='active']");

        if (!empty($activeConnection)) {
            $current = $activeConnection[0];
            $current->logout_time = date('Y-m-d H:i:s');
            $current->status = "expired";
            
            xmlFormater($xmlConnections, "./connections.xml");
            
            // Destruimos la sesión temporal en el servidor
            session_destroy();
            
            echo "Sesión cerrada correctamente y registrada en XML para el DNI: " . $userDni;
        } else {
            echo "No se encontró ninguna sesión activa para ese usuario.";
        }

    }



} else {
    echo "No se especificó ninguna acción en la URL.";
}
?>