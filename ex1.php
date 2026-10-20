<?php
header('Content-Type: application/xml; charset=utf-8');

$mia=<<<XML
<day>
<date>2024-06-15</date>
<event>Meeting with team</event>
</day>
XML;


$xmlyo= new SimpleXMLElement($mia);


echo $xmlyo->asXML();

?>


<!-- Función _construct() de PHP -->

<!-- Crea un objeto SimpleXMLElement a partir de una cadena -->



<!-- // $note=<<<XML
// <note>
// <to>Tove</to>
// <from>Jani</from>
// <heading>Reminder</heading>
// <body>Do not forget me this weekend!</body>
// </note>
// XML;

// $xml=new SimpleXMLElement($note);
// echo $xml->asXML(); -->


