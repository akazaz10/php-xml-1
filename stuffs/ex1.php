<?php
// <<<XML es una sintaxis llamada heredoc. Permite guardar varias linias de texto dentro de una variable. Se puede llamar de cualquier forma pero tiene que coincidir el nombre de la variable con el nombre de cierre. XML podria ser TEXT por ejemplo pero deberia de cerrarse igual.
$note=<<<XML
<note>
    <to>Tove</to>
    <from>Jani</from>
    <heading>Reminder</heading>
    <body>Do not forget me this weekend!</body>
</note>
XML;

// Convierte el texto que contiene $note en un objeto SimpleXMLElement. Esto permite manipular el contenido del XML de manera más sencilla.
$xml = new SimpleXMLElement($note);

// Add attribute to root element
$xml->addAttribute("type","private");
$xml['type'] = "public"; 

// // Add attribute to body element
// $xml->body->addAttribute("date","2014-01-01");

// // Set the content type to XML para que el navegador lo interprete como un archivo XML y no como texto plano.
header("Content-type: application/xml; charset=UTF-8");

echo $xml->asXML();
?>