<?php
// 1. Capturamos el parámetro de la URL (si no existe, usamos un texto vacío o por defecto)
$nuevoValor = $_GET['nodo'] ?? 'Valor_Defecto';

// Limpiamos el valor por seguridad para no romper el XML
$valorSeguro = htmlspecialchars($nuevoValor, ENT_XML1, "UTF-8");

// 2. Cargamos un XML de ejemplo (también puedes usar simplexml_load_file('archivo.xml'))
$xmlTexto = <<<XML
<configuracion>
    <titulo>Mi Sistema</titulo>
    <estado>Inactivo</estado>
</configuracion>
XML;

$xml = simplexml_load_string($xmlTexto);

// ==========================================
// MANERA 1: Modificar un nodo que YA EXISTE
// ==========================================
// Simplemente accedemos al nodo como si fuera una propiedad de un objeto y le asignamos el valor.
// $xml->estado = $valorSeguro; 


// // ==========================================
// // MANERA 2: Agregar un nodo NUEVO con addChild
// // ==========================================
// // addChild no modifica, sino que crea una etiqueta completamente nueva al final.
$xml->addChild('nodo_dinamico', $valorSeguro);


// // 3. Mostramos el resultado
header('Content-Type: text/xml; charset=utf-8');
echo $xml->asXML();
?>