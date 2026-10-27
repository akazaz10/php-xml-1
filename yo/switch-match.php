<h1>Pequeña Práctica</h1>


<h2>Switch (No usar porfa)</h2>

<?php 

$favColor = "jaja";

switch ($favColor) {

    case "red":
        echo "Color rojo";
        break;

    case "yellow":
        echo "Color amarillo";
        break;

    default:
        echo "No se entiende gilazo";

};

?>


<h2>Match (ÚSAMEEE)</h2>

<?php 

$favColor = "jaja";


$text = match($favColor) {

        "red" => "COLOR ROJO ENTIENDELO",
        "yellow" => "COLOR AMARILLO, QUE TE QUEDE MUY CLARO",
        default => "JAJAJA FUERA OE FRACASAO",

};

echo $text;

?>




<h2>Condicionales</h2>



<h3>Ternario</h3>


<?php

$textoPrueba = "Diez";
$numeroPrueba = 10;



$resultado = ($textoPrueba == "Diez") ? "jajaMESSI" : "OEQUE";

echo $resultado;


?>


<h3>Null Coalescing Operator</h3>

<p>Sirve para comprobar si una variable es estríctamente nula o si no existe.</p>

<?php

$hola = null;
$algo = "";


echo $hola ?? "Es nulo";

echo "<br>";

echo $adios ?? "Ni siquiera existe esta vaina";

echo "<br>";

echo "¿Hay algo? --> ". ($algo ?? "No hay nada");

?>



<h3>Elvis</h3>


<p>Se usa "omitiendo" la parte central del condicional ternairo.</p>
<p>Si la variable es "false" (incluyendo "", 0 o null) devuelve el valor por defecto</p>

<?php 

$vacio = "";
$cero = 0;
$null = null;

echo $vacio ?: "Elvis lo hizo denuevo";
echo "<br>";
echo $cero ?: "Elvis lo hizo denuevo";
echo "<br>";
echo $null ?: "Elvis lo hizo denuevo";
echo "<br>";
echo $jaja ?: "Ni si quiera existe esta vaina jaja Elvis";


?>















<!-- Bloque extra -->

<!-- 
<?php if ($estado == 'activo'): ?>
    <p>El usuario está activo.</p>

<?php elseif ($estado == 'pausado'): ?> <!-- OBLIGATORIO JUNTO -->
    <p>El usuario está en pausa.</p>

<?php else: ?>
    <p>El usuario está inactivo.</p>

<?php endif; ?>


<?php
if ($estado == 'activo') {
    echo "Activo";
} elseif ($estado == 'pausado') { // Opción A: Todo junto (Recomendado)
    echo "Pausado";
} else if ($estado == 'baneado') { // Opción B: Separado (También funciona)
    echo "Baneado";
} else {
    echo "Inactivo";
}
?> -->