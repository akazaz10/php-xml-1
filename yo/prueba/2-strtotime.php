<?php 

$xml = simplexml_load_file("./2-strtotime.xml");

$newNode = $xml->addChild("connection");


$fecha = date("Y-m-d H:i:s");

$newNode->addChild("fecha", $fecha);


header("Content-Type: application/xml; charset='utf-8'");

$xml->asXML("./2-strtotime.xml");

echo $xml->asXML();
?>