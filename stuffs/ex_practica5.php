<?php

$xml = simplexml_load_file("practica.xml");

// Añadir un nuevo libro
$libro = $xml->productos->addChild('producto');
$libro->addChild('titulo', 'Harry Potter y la piedra filosofal');
$libro->addChild('autor', 'J.K. Rowling');
$libro->addChild('año', '2023');


// Añadir atributos id, disponible y año al libro
$libro->addAttribute('id', 'p005');
$libro->addAttribute('categoria', 'libro');
$libro->addAttribute('genero', 'fantasia');
$libro->addAttribute('disponible', 'true');
$libro->addAttribute('año', '2023');

// /////////////////////////////////////////////////////////

// Añadir un nuevo libro
$libro = $xml->productos->addChild('producto');
$libro->addChild('titulo', 'One Piece');
$libro->addChild('autor', 'Eiichiro Oda');
$libro->addChild('año', '1996');

// Añadir atributos id, disponible y año al libro
$libro->addAttribute('id', 'p006');
$libro->addAttribute('categoria', 'manga');
$libro->addAttribute('genero', 'acción');
$libro->addAttribute('disponible', 'false');
$libro->addAttribute('año', '1996');


// Busca los libros del genero accion y los muestra en el navegador
foreach ($xml->productos->children() as $libro) {
    if (isset($libro['genero']) && $libro['genero'] == 'acción') {
        echo ("Libro: " . $libro->titulo . "<br>");
    }
}



// Para ver el XML:
// header('Content-Type: application/xml; charset=UTF-8');
// echo $xml->asXML();