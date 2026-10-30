<?php


// Cargar el archivo XML
$xml = simplexml_load_file("practica.xml");

// Mostrar el XML en el navegador
header('Content-Type: application/xml; charset=UTF-8');
echo $xml->asXML();