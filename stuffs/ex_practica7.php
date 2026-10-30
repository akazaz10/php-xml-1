<?php

$xml = simplexml_load_file("practica.xml");


// Recibir por $_GET el producto y añadirlo al documento.

$nuevoProducto = $xml->productos->addChild('producto');
$nuevoProducto->addChild('nombre', $_GET['nombre']);
$nuevoProducto->addChild('marca', $_GET['marca']);
$nuevoProducto->addChild('precio', $_GET['precio']);
$nuevoProducto->addChild('stock', $_GET['stock']);
$nuevoProducto->addChild('descripcion', $_GET['descripcion']);



// Para ver el XML:
header('Content-Type: application/xml; charset=UTF-8');
echo $xml->asXML();