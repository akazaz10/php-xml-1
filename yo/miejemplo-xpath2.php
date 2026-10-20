<?php
    $title = "La ciudad y los perros";
    $author = "Mario Vargas Llosa";
    $price = "22.50";
    $stock = "4";

    $note = <<<XML
    <libreria>
        <libro id="1" categoria="ficcion">
            <titulo>Cien años de soledad</titulo>
            <autor>Gabriel García Márquez</autor>
            <precio moneda="EUR">19.99</precio>
            <stock>12</stock>
        </libro>
        <libro id="2" categoria="ciencia">
            <titulo>Breve historia del tiempo</titulo>
            <autor>Stephen Hawking</autor>
            <precio moneda="EUR">15.50</precio>
            <stock>5</stock>
        </libro>
        <libro id="3" categoria="ficcion">
            <titulo>El amor en los tiempos del cólera</titulo>
            <autor>Gabriel García Márquez</autor>
            <precio moneda="EUR">22.00</precio>
            <stock>8</stock>
        </libro>
    </libreria>    
    XML;

    $xml = new SimpleXMLElement($note);

    // añadir un nuevo libro (libro->titulo,precio,autor,precio,stock)

    $xml->addChild("libro");

    $lastBook = $xml->xpath("/libreria/libro[last()]");

    $lastBook[0]->addAttribute("id", "4");

    $lastBook[0]->addChild("titulo", "{$title}");
    $lastBook[0]->addChild("autor", "{$author}");
    $lastBook[0]->addChild("precio", "{$price}");
    $lastBook[0]->addChild("stock", "{$stock}");


    // modificar atributo precio (moneda: JPY)

    $newPrice = $xml->xpath("/libreria/libro[last()]/precio");

    $newPrice[0]->addAttribute("moneda", "JPY");




    // header('Content-Type: application/xml; charset=utf-8');
    // echo $xml->asXML();

    $final_route = "./libreria.xml";

    header('Content-Type: text/html; charset=utf-8');

    if ($xml->asXML($final_route)) {
        echo "Exitoso detectado: Archivo " . $final_route . " creado correctamente.";
    } else {
        echo "Rompe nomassss fracasaaaaao";
    }

    






    
?>


