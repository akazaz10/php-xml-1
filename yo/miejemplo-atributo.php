<?php 
$yo = <<<XML
<hermano>
    <parrafo>Tal cual</parrafo>
    plan de portabilidad, no?
    <hablamos>fracasaooo</hablamos>
    <una>
        <yo>yo pues quien mas</yo>
    </una>
</hermano>
XML;

$xml = new SimpleXMLElement($yo);

// añadir un atributo en el root

$xml->addAttribute("jaja", "queee");

// añadir un atributo en yo 

$xml->una->yo->addAttribute("sino-vas-a-hacer-nada", "rompe-chibola");

// añadir un atributo en hablamos

$xml->hablamos->addAttribute("No-quiero-tu", "caramelo");

// header('Content-Type: application/xml; charset=utf-8');
header('Content-Type: text/html; charset=utf-8');

// echo $xml->asXML(); 

// En lugar de mostrar el xml, creo un archivo nuevo


$end_file = "holahola/plan-de-portabilidad.xml";

if($xml->asXML($end_file)) {
    echo "Exitoso detectado " . $end_file . " creado correctamente";
} else {
    echo "Rompe nomas fracasaaaaao";
}


?>