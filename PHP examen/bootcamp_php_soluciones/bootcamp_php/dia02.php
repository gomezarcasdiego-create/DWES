<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><title>Día 2</title></head><body>
<?php
echo "<h1>Día 2: echo, concatenación y if</h1>";

// ---------- Ejercicio 1 ----------
echo "<h3>Ejercicio 1</h3>";
$nombre = "Ana";
$edad   = 21;
echo "Hola " . $nombre . ", tienes " . $edad . " años.<br>";   // concatenación con .

// ---------- Ejercicio 2 ----------
echo "<h3>Ejercicio 2</h3>";
echo "Hola $nombre, tienes $edad años.<br>";   // comillas dobles: interpola variables

// ---------- Ejercicio 3 ----------
echo "<h3>Ejercicio 3</h3>";
echo 'Hola $nombre, tienes $edad años.<br>';   // comillas simples: texto literal, NO interpola

// ---------- Ejercicio 4 ----------
echo "<h3>Ejercicio 4</h3>";
$nota = 7.5;
if ($nota >= 9) {
    echo "Sobresaliente<br>";
} elseif ($nota >= 7) {
    echo "Notable<br>";
} elseif ($nota >= 5) {
    echo "Aprobado<br>";
} else {
    echo "Suspenso<br>";
}

// ---------- Ejercicio 5 ----------
echo "<h3>Ejercicio 5</h3>";
$numero = -3;
if ($numero > 0) {
    echo "$numero es positivo<br>";
} elseif ($numero < 0) {
    echo "$numero es negativo<br>";
} else {
    echo "Es cero<br>";
}

// ---------- Ejercicio 6 ----------
echo "<h3>Ejercicio 6</h3>";
$anio = 2024;
// Bisiesto: divisible por 4 y no por 100, o divisible por 400
if (($anio % 4 == 0 && $anio % 100 != 0) || $anio % 400 == 0) {
    echo "$anio es bisiesto<br>";
} else {
    echo "$anio no es bisiesto<br>";
}

// ---------- Ejercicio 7 ----------
echo "<h3>Ejercicio 7</h3>";
$edad        = 19;
$tieneCarnet = true;
if ($edad >= 18 && $tieneCarnet) {
    echo "Puede conducir<br>";
} else {
    echo "No puede conducir<br>";
}

// ---------- Ejercicio 8 ----------
echo "<h3>Ejercicio 8</h3>";
$a = 12; $b = 45; $c = 30;
$mayor = $a;                 // suponemos que el primero es el mayor
if ($b > $mayor) { $mayor = $b; }
if ($c > $mayor) { $mayor = $c; }
echo "El mayor es $mayor<br>";
?>
</body></html>
