<?php

// Para leer y manipular un archivo XML
$xml = simplexml_load_file(__DIR__ . '/nota.xml');


$xml->addAttribute("type","private");

// Mostrar el contenido en el navegador en formato XML
header('Content-Type: application/xml; charset=UTF-8');
echo $xml->asXML();


// Guardar el archivo XML modificado
$xml->asXML(__DIR__ . '/nota.xml');

//////////////////////////////////////////////////////////

// Para leer un archivo XML y mostrarlo tal cual, sin manipularlo

// header('Content-Type: application/xml; charset=UTF-8');
// readfile(__DIR__ . '/nota.xml');

?>
