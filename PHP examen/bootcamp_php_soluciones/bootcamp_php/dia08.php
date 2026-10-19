<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><title>Día 8</title>
<style>table{border-collapse:collapse}td,th{border:1px solid #333;padding:4px 10px}</style></head><body>
<?php
echo "<h1>Día 8: Cadenas de texto y PHP + HTML</h1>";

// ---------- Ejercicio 1 ----------
echo "<h3>Ejercicio 1</h3>";
$frase = "Me gusta programar en PHP";
echo "Longitud: " . strlen($frase) . "<br>";

// ---------- Ejercicio 2 ----------
echo "<h3>Ejercicio 2</h3>";
echo strtoupper($frase) . "<br>";   // MAYÚSCULAS
echo strtolower($frase) . "<br>";   // minúsculas
echo ucfirst($frase)    . "<br>";   // primera letra de la frase en mayúscula
echo ucwords($frase)    . "<br>";   // primera letra de cada palabra

// ---------- Ejercicio 3 ----------
echo "<h3>Ejercicio 3</h3>";
echo "Posición de PHP: " . strpos($frase, "PHP") . "<br>";   // empieza a contar en 0
echo "¿Contiene Java? " . (str_contains($frase, "Java") ? "Sí" : "No") . "<br>";   // PHP 8+

// ---------- Ejercicio 4 ----------
echo "<h3>Ejercicio 4</h3>";
echo str_replace("PHP", "JavaScript", $frase) . "<br>";

// ---------- Ejercicio 5 ----------
echo "<h3>Ejercicio 5</h3>";
echo "5 primeras: " . substr($frase, 0, 5) . "<br>";   // desde 0, 5 caracteres
echo "Última letra: " . substr($frase, -1) . "<br>";   // -1 cuenta desde el final

// ---------- Ejercicio 6 ----------
echo "<h3>Ejercicio 6</h3>";
$cadena = "Hola";
echo strrev($cadena) . "<br>";
$palabra = "reconocer";
if ($palabra === strrev($palabra)) {   // palíndromo = igual que su inversa
    echo "\"$palabra\" es un palíndromo<br>";
} else {
    echo "\"$palabra\" no es un palíndromo<br>";
}

// ---------- Ejercicio 7 ----------
echo "<h3>Ejercicio 7</h3>";
$texto = "programacion en php";   // sin tildes: $cadena[$i] lee BYTES, y una tilde ocupa 2 en UTF-8
$vocales = 0;
for ($i = 0; $i < strlen($texto); $i++) {
    $letra = strtolower($texto[$i]);
    if ($letra == "a" || $letra == "e" || $letra == "i" || $letra == "o" || $letra == "u") {
        $vocales++;
    }
}
echo "Vocales en \"$texto\": $vocales<br>";

// ---------- Ejercicio 8 ----------
echo "<h3>Ejercicio 8</h3>";
$lista = explode(",", "manzana,pera,plátano");   // string → array
foreach ($lista as $elemento) {
    echo $elemento . "<br>";
}
echo implode(" - ", $lista) . "<br>";             // array → string

// ---------- Ejercicio 9 ----------
echo "<h3>Ejercicio 9</h3>";
$compra = array("Leche", "Pan", "Huevos");
$compra[] = "Arroz";        // añadir productos no toca el HTML
$compra[] = "Tomates";
echo "<ul>";
foreach ($compra as $producto) {
    echo "<li>$producto</li>";
}
echo "</ul>";

// ---------- Ejercicio 10 ----------
echo "<h3>Ejercicio 10</h3>";
$alumnos = array("Ana" => 8.5, "Luis" => 4.0, "Marta" => 6.5, "Pablo" => 9.2);
echo "<table><tr><th>Nombre</th><th>Nota</th></tr>";
foreach ($alumnos as $nombre => $nota) {
    echo "<tr><td>$nombre</td><td>$nota</td></tr>";
}
echo "</table>";

// ---------- Ejercicio 11 ----------
echo "<h3>Ejercicio 11</h3>";
echo "<table>";
for ($i = 1; $i <= 10; $i++) {
    $color = ($i % 2 == 0) ? "#d0e8ff" : "#ffe8d0";   // par: azul, impar: naranja
    echo "<tr style='background:$color'><td>8 x $i</td><td>" . (8 * $i) . "</td></tr>";
}
echo "</table>";

// ---------- Ejercicio 12 ----------
echo "<h3>Ejercicio 12</h3>";
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio",
               "Agosto","Septiembre","Octubre","Noviembre","Diciembre");
echo "<select name='mes'>";
foreach ($meses as $i => $mes) {
    echo "<option value='" . ($i + 1) . "'>$mes</option>";   // value = número de mes
}
echo "</select>";
?>
</body></html>
