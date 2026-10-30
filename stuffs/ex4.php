<?php


// La variable $note contiene un texto que representa un documento XML. <<<XML permite guardar varias linias de texto en una variable.
$note=<<<XML
<note>
  <to>Tove</to>
  <from>Jani</from>
  <heading>Reminder</heading>
  <body date="2014-01-01" type="private">Do not forget me this weekend!</body>
  <body color="green" type="public">Do not forget me this weekend!</body>
</note>
XML;



$xml = simplexml_load_string($note);
$xml->addAttribute("type","private");
foreach($xml->body[1]->attributes() as $a => $b)
  {
  echo $a,'=',$b,"<br>";
  }
echo "<br>";

?>