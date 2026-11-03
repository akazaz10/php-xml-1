<?php
// 1. Cargamos el archivo
$xml = simplexml_load_file('productos.xml');

// 2. Creamos el nodo principal y le agregamos sus datos hijos
$nuevoProducto = $xml->addChild('producto');
$nuevoProducto->addChild('nombre', 'Teclado Mecánico');
$nuevoProducto->addChild('precio', '45');

// 3. Guardamos sobrescribiendo el archivo directamente
// $xml->asXML('productos.xml');





$dom = new DOMDocument('1.0', 'UTF-8');
$dom->formatOutput = true;
$dom->preserveWhiteSpace = false;
$dom->loadXML($xml->asXML());
$dom->save('productos.xml');
?>