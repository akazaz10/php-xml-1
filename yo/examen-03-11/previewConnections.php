<?php
session_start();

header("Content-Type: application/xml; charset='utf-8'");


$xmlConnections = simplexml_load_file("./connections.xml");


echo $xmlConnections->asXML();

?>