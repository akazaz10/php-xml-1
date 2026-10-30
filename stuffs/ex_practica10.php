<?php

$xml = simplexml_load_file("practica_modificada.xml");

header('Content-Type: application/xml; charset=UTF-8');
echo $xml->asXML();

?>