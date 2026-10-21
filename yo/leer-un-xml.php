<?php
    header("Content-Type: application/xml; charset=utf-8");
    $contentExtraction = file_get_contents("./videojuegos.xml"); 

    // echo "<pre>" . htmlspecialchars($contentExtraction) . "</pre>"; --> Para verlo preformateado


    // Para instanciarlo y modificarlo
    $xml_file_get_contents = new SimpleXMLElement($contentExtraction);


    
    // echo $xml_file_get_contents->asXML();



    // htmlspecialchars(): Convierte carácteres con significado e special en HTML en sus correspondientes entidades HTML, evitando así que el navegador los interprete como código

    

    /* 
        file_get_contents: Lectura en bruto como texto
        Esta función lee el contenido completo de un archivo (XML, JSON, TXT,  HTML, etc.) y 
        te devuelve una cadena de texto (string)

        - Cuándo usarla: 
            -> Para mostrar el código fuente del XML: Si estás haciendo un tutorial, una herramienta de desarrollo o un panel de administración donde el usuario quiere ver el código crudo del archivo
            -> Cuando el archivo XML viene corrupto o mal formado: Si tiene un error tipográfico que rompe a simplexml_load_file, se puede usar 
                                                                    esto para leer, examinar y buscar el error antes de parsearlo.

    */



    // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



    $xml_simplexml_load_file = simplexml_load_file("videojuegos.xml");

    echo $xml_simplexml_load_file->asXML();

    /* 
        simplexml_load_file: Opción directa para XML
        Es la función específica de PHP para cargar y parrsear un archivo XML directamente en un
        objeto SiimpleXMLElement.

        - Cuándo usarla: Cuando quieres leer el archivo XML y empezar a recorrerlo, buscar datos o 
        manipular sus nodos de forma inmedianta sin passos intermedios.


    */

        




    // print_r($xml);



?>