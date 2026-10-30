<?php

$xml = simplexml_load_file("practica.xml");



// Busca los productos con precio mayor que 20 euros y los muestra en el navegador
foreach ($xml->productos->children() as $producto) {
    if (isset($producto->precio) && floatval($producto->precio) > 20) {
        echo ("Producto: " . $producto->nombre . " - Precio: " . $producto->precio . "<br>");
    }
}


// Para ver el XML:
// header('Content-Type: application/xml; charset=UTF-8');
// echo $xml->asXML();