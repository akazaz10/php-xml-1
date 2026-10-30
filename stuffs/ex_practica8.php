<?php

$xml = simplexml_load_file("practica.xml");


// Modificar el precio de un producto encontrado mediante XPath.
// $precio[0][0] el primer parametro es el primer elemento encontrado, el segundo es el valor del elemento precio. Hay que hacerlo asi porque el resultado de xpath es un array de SimpleXMLElement, y para modificar el valor del elemento precio hay que acceder al primer elemento del array y luego al valor del elemento precio. En el caso de que tuviesemos mas de un precio y quisieramos modificar el segundo precio, tendriamos que hacer $precio[1][0] = 2500000.99; y asi sucesivamente. Hay que tener en cuenta que si no se encuentra el producto, el array devuelto por xpath estara vacio y no se podra modificar el valor del elemento precio. Por eso es importante comprobar si el array devuelto por xpath esta vacio antes de intentar modificar el valor del elemento precio.
$precio = $xml->xpath("//producto[nombre='Zapatillas de running']/precio");
if (!empty($precio)) {
    $precio[0][0] = 2500000.99;
}


// Para ver el XML:
header('Content-Type: application/xml; charset=UTF-8');
echo $xml->asXML();