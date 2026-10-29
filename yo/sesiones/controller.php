<?php
session_start();

if ($_POST['user'] == "akazaz" && $_POST['password'] == "123") {
    $_SESSION['name'] = "Zahir";
    $_SESSION['lastname'] = "Martinez Puerta";
    header("location: home.php");

} else {
    echo "Los datos no son correctos";
}


?>