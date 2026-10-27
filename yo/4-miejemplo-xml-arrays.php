<?php

$libros = [
    [
        "id" => 1,
        "titulo" => "El principito",
        "autor" => "Antoine de Saint-Exupéry",
        "disponible" => true
    ],
    [
        "id" => 2,
        "titulo" => "1984",
        "autor" => "George Orwell",
        "disponible" => false
    ],
    [
        "id" => 3,
        "titulo" => "Don Quijote",
        "autor" => "Miguel de Cervantes",
        "disponible" => true
    ],
    [
        "id" => 4,
        "titulo" => "Cien años de soledad",
        "autor" => "Gabriel García Márquez",
        "disponible" => false
    ],
    [
        "id" => 5,
        "titulo" => "La metamorfosis",
        "autor" => "Franz Kafka",
        "disponible" => true
    ]
];

$xml = new SimpleXMLElement("<books/>");


// header("Content-Type: text/html; charset=utf-8");


// foreach ($libros as $book) {
//     echo $book . " " . var_dump($book) . "<br>";

//     foreach ($book as $key => $value) {
//         echo "Clave: {$key} - Valor: {$value} <br>";
//     }

// }


foreach ($libros as $book) {

    $item = $xml->addChild("book");

    foreach ($book as $key => $value) {

        $secureText = is_bool($value) ? ($value ? "true" : "false") : (string)$value;

        $item->addChild($key, htmlspecialchars($secureText, ENT_XML1, "UTF-8"));

    }

}

header("Content-Type: application/xml; charset=utf-8");

echo $xml->asXML();

?>