<?php

// header("Content-Type: application/xml; charset='utf-8'");

function loginTime($routeXml) {

    $xmlConnections = simplexml_load_file($routeXml);
    $secTotal = 0;

    // foreach ($xmlConnections->connection as $conn) {
    //     // if ((string)$con->dni)
    //     var_dump($conn->dni);

    // }

    foreach ($xmlConnections->connection as $conn) {

    echo $conn->dni;

}


    // echo "<pre>";
    // var_dump($xmlConnections);
    // var_dump($xmlConnections->connection);
    // var_dump($xmlConnections->connection[0]);    
    // var_dump($xmlConnections->connection[1]); 
    // echo "</pre>";
    // echo $xmlConnections->asXML();
    // echo $xmlConnections->connection->asXML();
}


loginTime("./3-foreach.xml");
?>
