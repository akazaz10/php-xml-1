<?php

$xml = simplexml_load_file("./movies.xml") or die("Error al cargar");

header("Content-Type: application/xml; charset='utf-8'");


// echo var_dump($xml);

// $xml['fecha'] = "jaja";

// echo $xml['fecha'];


// echo $xml->asXml();


$index = htmlspecialchars($_GET['id'] ?? '');

// $node = $xml->xpath("/pelicul");

function xmlModify($xmlObject, $movieId){

    $tag = $xmlObject->xpath("/catalogo/pelicula[@id='{$movieId}']");

    $newTitle = htmlspecialchars($_GET['titulo'] ?? '');
    $newYear = htmlspecialchars($_GET['anio'] ?? '');
    $newGender = htmlspecialchars($_GET['genero'] ?? '');
    $newDuration = htmlspecialchars($_GET['duracion'] ?? '');

    if (empty($movieId)) {

        return;
    }

    if (!empty($tag)) {

        $movie = $tag[0];

        if (!empty($newTitle)) {

            $movie->titulo = $newTitle;
        }

        if (!empty($newYear)) {

            $movie->anio = $newYear;
        }

        if (!empty($newGender)) {

            $movie->genero = $newGender;
        }

        if (!empty($newDuration)) {

            $movie->duracion = $newDuration;
        }

    } else {

        $xmlNewMovie = $xmlObject->addChild("pelicula");

        $xmlNewMovie->addAttribute("id", $movieId);
        $xmlNewMovie->addAttribute("destacada", "true");

        $xmlNewMovie->addChild("titulo", ($newTitle ?: "Ingresar título"));
        $xmlNewMovie->addChild("anio", ($newYear ?: "Ingresar el año"));
        $xmlNewMovie->addChild("genero", ($newGender ?: "Ingresar género"));
        $xmlNewMovie->addChild("duracion", ($newDuration ?: "Ingresar duración en minutos"));

        $xmlNewMovie->duracion->addAttribute("unidad", "minutos");

    }

};



xmlModify($xml, $index);

echo $xml->asXml();

// echo $index;


// foreach ($xml as $node) {
//     echo $node->asXml();
// }

?>