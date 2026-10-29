<?php 

$xml = simplexml_load_file("./ejemplo-get.xml");


header("Content-Type: application/xml; charset=utf-8");


// echo $xml->asXML();


$index = htmlspecialchars($_GET['id'] ?? '');

// -- TESTING ---------------------------------------------------------------------------------

// $tag = $xml->xpath("/libros/libro[@id='1']");

// $tag = $xml->xpath("/libros/libro[@id='{$index}']");





// echo "<resultado>" . 
//      ($tag[0]->titulo?->asXml() ?? "Aún nada mi bro<br>") .  /* ? antes del -> es el operaor nullsafe */
//      ($tag[0]->autor?->asXml() ?? "Aún nada mi pequeño bro<br>") . 
//      ($tag[0]->precio?->asXml() ?? "QUE AÚN NADAAA FRACASAOO<br>") . 
//      "</resultado>";

// $identificador = htmlspecialchars($_GET['id']);

// echo $identificador;
// echo var_dump((integer)$identificador);

// -------------------------------------------------------------------------------------------



$title = htmlspecialchars($_GET['titulo'] ?? '');
$author = htmlspecialchars($_GET['autor'] ?? '');
$price = htmlspecialchars($_GET['precio'] ?? '');






function xmlModify($xmlObject, $id, $newTitle, $newAuthor, $newPrice) {

    $tag = $xmlObject->xpath("/libros/libro[@id='{$id}']");

    $lenght = count($xmlObject);


    if (empty($id)) {

        return;
    }

    if (!empty($tag)) {


        $book = $tag[0]; // antes $tag[$i]


        // $titleModify = $book->xpath("titulo"); // antes "/titulo"
        // $authorModify = $book->xpath("autor");
        // $priceModify = $book->xpath("precio");


        if (!empty($newTitle)) {

            // $book[0][0] = $title;
            $book->titulo = $newTitle;

        }

        if (!empty($newAuthor)) {

            // $book[0][1] = $author;
            $book->autor = $newAuthor;

        }

        if (!empty($newPrice)) {

            // $book[0][2] = $price;
            $book->precio = $newPrice;

        }

    } else {

      
        // $xmlBook = <<<XML
        // <libro id="{$id}">
        //     <titulo>{$newTitle}</titulo>
        //     <autor>{$newAuthor}</autor>
        //     <precio>{$newPrice}</precio>
        // </libro>        
        // XML;

        $xmlBook = $xmlObject->addChild("libro");

        $xmlBook->addAttribute("id", ($id));
        $xmlBook->addChild("titulo", ($newTitle ?: "Añadir título"));
        $xmlBook->addChild("autor", ($newAuthor ?: "Añadir autor"));
        $xmlBook->addChild("precio", ($newPrice ?: "Añadir precio"));


    }

    
    
    // else {
    //     echo "<mensaje>Nada</mensaje>";
    // }


};




xmlModify($xml, $index, $title, $author, $price);

echo $xml->asXml();



// -- TESTING ---------------------------------------------------------------------------------

// $indice = 0;

// foreach ($xml as $nodo) {
//     echo $nodo->asXML();
//     echo "<br>";
//     echo $indice;
//     echo "<br>";


//     foreach ($nodo as $key => $value) {
//         echo "clave: {$key}, valor: {$value}";
//         echo "<br>";
        
//     }

//     $indice += 1;
// }





    // // ---------------------------------------------------------------

// // Funciona

// $editContent = htmlspecialchars($_GET['autor']);



// $space[0][0] = $editContent ? $editContent : $space[0][0];


// echo $space[0]->asXML();




    // // ---------------------------------------------------------------




// $newXml = <<<XML
//     $space[0]
// XML;


// $hola = htmlspecialchars($_GET['variable']);
// $adios = htmlspecialchars($_GET['variable2']);

// echo $hola;
// echo $adios;

// -------------------------------------------------------------------------------------------


?>