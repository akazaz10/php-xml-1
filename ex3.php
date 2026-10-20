<?php
$xml = new SimpleXMLElement("<note>Hello <to>Tove</to><from>Jani</from>World!</note>");

header('Content-Type: application/xml; charset=utf-8');
echo $xml->asXML();
?>