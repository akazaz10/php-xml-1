# PHP_XML1

Configurar el servidor:
php -S localhost:8000




Que se hace en cada archivo:

ex1.php: heredoc, creación de XML, atributos y asXML().
ex2.php: añadir elementos con addChild().
ex3.php: cargar y mostrar XML básico.
ex4.php: atributos, elementos repetidos y recorrido con attributes().
ex5.php: recorrer nodos con children().
ex6.php: guardar XML en un archivo.
ex7.php: consultas XPath y creación de un nuevo XML.
ex8.php: XPath con varios resultados e índices.
ex9.php: transformar un array PHP en XML y mover datos a atributos.
ex10.php: recibir datos mediante $_GET y escaparlos.
ex11.php: leer, modificar y sobrescribir un archivo XML.
ex12.php: lectura directa de un archivo XML con readfile().




Aspectos que debes practicar

Sintaxis heredoc.
Creación de objetos SimpleXMLElement.
Carga desde texto y desde archivos.
Añadir, modificar y eliminar elementos.
Añadir y consultar atributos.
Recorrer nodos XML.
Elementos repetidos.
Consultas XPath.
Conversión de arrays PHP a XML.
Escapado con htmlspecialchars().
Entrada de datos mediante $_GET.
Lectura, modificación y persistencia de archivos XML.
Cabeceras Content-Type.
Estructuras XML anidadas y datos con distintos tipos.




Enunciados para practicar (Comentar para marcar como hecho)

Al lado de cada enunciado estan los archivos de las soluciones para consultarlos

<!-- Crear un XML de una biblioteca con libros, autores, géneros y precios.  -->
<!-- Leer el XML -> ex_practica1.php -->
<!-- Mostrar el XML en el navegador -> ex_practica2.php -->
<!-- Añadir dinámicamente un nuevo libro usando addChild(). -> ex_practica3.php -->
<!-- Añadir atributos id, disponible y año a cada libro. -> ex_practica3.php -->
<!-- Mostrar todos los títulos usando children(). -> ex_practica4.php -->
<!-- Buscar con XPath todos los libros de un género concreto. -> ex_practica5.php -->
<!-- Buscar el libro cuyo precio sea superior a 20 euros.
Convertir un array de productos en un XML. -> ex_practica6.php -->
<!-- Recibir por $_GET el nombre de un libro y añadirlo al documento. -> ex_practica7.php -->
<!-- Modificar el precio de un producto encontrado mediante XPath. -> ex_practica8.php -->
<!-- Guardar el XML modificado en un archivo. -> ex_practica9.php
<!-- Eliminar un nodo seleccionado mediante XPath. -> ex_practica9.php -->
<!-- Leer posteriormente ese archivo y mostrar su contenido. -> ex_practica10.php -->