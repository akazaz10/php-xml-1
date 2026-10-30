<?php

$xml = simplexml_load_file("practica.xml");


// Modificamos el XML borrando un producto con un id específico
$idProductoABorrar = 'p002'; // Cambia esto al id del producto que deseas
foreach ($xml->productos->children() as $producto) {
    if (isset($producto['id']) && $producto['id'] == $idProductoABorrar) {
        unset($producto[0]); // Borramos el producto
        break; // Salimos del bucle después de borrar el producto
    }
}


// Guardamos los cambios en el archivo XML
$xml->asXML("practica_modificada.xml");


// Para ver el XML:
header('Content-Type: application/xml; charset=UTF-8');
echo $xml->asXML();