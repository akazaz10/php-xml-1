<?php 

    $name = "Sebastian";

    $note = <<<XML
    <note>
        <name>{$name}</name>
        <to>Tove</to>
        <from>Jani</from>
    </note>
    XML;

    $xml = new SimpleXMLElement($note);

    $result = $xml->xpath("/note/name");

    print_r($result);

    die;

    $message = <<<XML
        <message>
            {$result[0]}
        </message>
    XML;

    $result2 = new SimpleXMLElement($message);

    header('Content-Type: application/xml; charset=utf-8');
    echo $result2->asXML();

    

?>