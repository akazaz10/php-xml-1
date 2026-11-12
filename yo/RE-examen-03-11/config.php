<?php
date_default_timezone_set('Europe/Madrid');

function xmlFormater($xmlData, $route) {

    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($xmlData->asXML());
    $dom->save($route);

}


?>