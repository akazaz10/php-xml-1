<?php
require './config.php';
session_start();


$xmlUsers = simplexml_load_file("./users.xml");
$xmlConnections = simplexml_load_file("./connections.xml");

// echo "Hola";

// header("Content-Type: application/xml; charset='utf-8'");


// echo $xmlUsers->asXML();
// echo $xmlConnections->asXML();

if (isset($_GET['action'])) {

    // echo "Si se especificó la acción";


    if ($_GET['action'] === 'login') {

        $userDni = $_GET['dni'] ?? '';
        $userPassword = $_GET['password'] ?? '';

        $existingUser = $xmlUsers->xpath("user[dni='{$userDni}']");

        if (empty($existingUser)) {

            echo "El usuario no existe";

        } else {

            $user = $existingUser[0];
            
            if ($userPassword != $user->password) {

                echo "Contraseña incorrecta";

            } else {

                $_SESSION['dni'] = $user->dni;
                $_SESSION['name'] = $user->name;
                $_SESSION['last_name'] = $user->last_name;


                $newConnection = $xmlConnections->addChild("connection");
                $newConnection->addChild('dni', $user->dni);
                $newConnection->addchild('login_time', date('Y-md H:i:s'));
                $newConnection->addChild('logout_time', '');
                $newConnection->addChild('status', 'active');

                xmlFormater($xmlConnections, "./connections.xml");

                echo "Bienvenido " . $user->name;
                echo "<br>";
                echo "<br>";
                echo "<a href='./previewUsers.php' target='_blank'><button>List user data</button></a>";
                echo "<br>";
                echo "<br>";
                echo "<a href='./previewConnections.php' target='_blank'><button>List user Connections</button></a>";
                echo "<br>";
                echo "<br>";
                echo "<ul>";
                echo "<li>DNI: {$_SESSION['dni']}</li>";
                echo "<li>Nombre: {$_SESSION['name']}</li>";
                echo "<li>Apellido: {$_SESSION['last_name']}</li>";
                echo "</ul>";


            }

        }

        // echo "La acción es login<br>";

    } elseif ($_GET['action'] === 'register') {

        $userDni = $_GET['dni'] ?? '';
        $userName = $_GET['name'] ?? '';
        $userLastName = $_GET['last_name'] ?? '';
        $userAge = $_GET['age'] ?? '';
        $userPassword = $_GET['password'] ?? '';

        if (empty($userDni) || empty($userName) || empty($userLastName) || empty($userAge) || empty($userPassword)) {

            echo "ERROR: Todos los parámetros deben ser rellenados";
        } else {

            $existingUser = $xmlUsers->xpath("user[dni = '{$userDni}']");

            if (!empty($existingUser)) {

                echo "El Dni ya está registrado";

            } else {

                $newUser = $xmlUsers->addChild('user');
                $newUser->addChild('dni', $userDni);
                $newUser->addChild('name', $userName);
                $newUser->addChild('last_name', $userLastName);
                $newUser->addChild('age', $userAge);
                $newUser->addChild('password', $userPassword);

                xmlFormater($xmlUsers, "./users.xml");

                echo "Te registraste " . $userName; 

            }
        }
 

        // echo "La acción es register<br>";

    } elseif ($_GET['action'] === 'logout') {

        $userDni = $_GET['dni'] ?? '';

        $activeConnection = $xmlConnections->xpath("connection[dni = '{$userDni}' and status = 'active']");
        
        if (!empty($activeConnection)) {

            $existingUser = $xmlUsers->xpath("user[dni='{$userDni}']");

            $currentConnection = $activeConnection[0];
            $currentConnection->logout_time = date('Y-m-d H:i:s');
            $currentConnection->status = 'expired';

            xmlFormater($xmlConnections, "./connections.xml");

            session_destroy();

            echo "Cerraste tu sesión " . $existingUser[0]->name . " ¡Vuelve pronto!";
        } else {
            echo "No existe ninguna sesión activa " . $existingUser[0]->name;
        }


        // echo "La acción es logout<br>";

    } else {

        echo "La acción no está definida";

    }

    
} else {
    echo "No se especificó ninguna acción";
}


?>