<?php
$note=<<<XML
<note>
    <to>Tove</to>
    <from>Jani</from>
    <heading>Reminder</heading>
    <body>Do not forget me this weekend!</body>
</note>
XML;

$xml = new SimpleXMLElement($note);

$name = $_GET["name"] ?? "Florian";
$city = $_GET["city"] ?? "Vilanova i la Geltrú";
$from = $_GET["from"] ?? "Jani";

$xml->addChild("name", htmlspecialchars($name, ENT_XML1, "UTF-8"));
$xml->addChild("city", htmlspecialchars($city, ENT_XML1, "UTF-8"));
$xml->from = $from;


// Set the content type to XML
header("Content-type: application/xml; charset=UTF-8");

echo $xml->asXML();
?>