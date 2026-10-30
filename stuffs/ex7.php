<?php

   $name="Pepito";

   $note=<<<XML
   <note>
       <name>{$name}</name>
       <to>Tove</to>
       <from>Jani</from>
       <heading>Reminder</heading>
       <body>Do not forget me this weekend!</body>
   </note>
   XML;

   $xml = new SimpleXMLElement($note);
   $result = $xml->xpath("/note/name");

//    print_r($result);

   // El die se utiliza para detener la ejecución del script después de imprimir el resultado de la consulta XPath. Esto es útil para depuración, ya que permite ver el resultado sin que se ejecute el resto del código. 
   
// die;

   $mesage=<<<XML
       <message>
           {$result[0]}
       </message>
   XML;

   $r = new SimpleXMLElement($mesage);

   header("Content-Type: application/xml; charset=UTF-8");
   echo $r->asXML();

?>