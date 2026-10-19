<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><title>Día 1</title></head><body>
<?php
echo "<h1>Día 1: Sintaxis, variables, tipos y operadores</h1>";

// ---------- Ejercicio 1 ----------
echo "<h3>Ejercicio 1</h3>";
echo "¡Hola, mundo!<br>"; // Comentario de una línea
/* Comentario
   de varias líneas */

// ---------- Ejercicio 2 ----------
echo "<h3>Ejercicio 2</h3>";
$nombre   = "Ana";    // string
$edad     = 21;       // integer
$altura   = 1.65;     // float (gettype devuelve "double")
$esAlumno = true;     // boolean
$sinValor = null;     // NULL
echo '$nombre: '   . gettype($nombre)   . "<br>";
echo '$edad: '     . gettype($edad)     . "<br>";
echo '$altura: '   . gettype($altura)   . "<br>";
echo '$esAlumno: ' . gettype($esAlumno) . "<br>";
echo '$sinValor: ' . gettype($sinValor) . "<br>";

// ---------- Ejercicio 3 ----------
echo "<h3>Ejercicio 3</h3>";
$x = 17;
$y = 5;
echo "Suma: "            . ($x + $y) . "<br>";
echo "Resta: "           . ($x - $y) . "<br>";
echo "Multiplicación: "  . ($x * $y) . "<br>";
echo "División: "        . ($x / $y) . "<br>";
echo "Resto (módulo): "  . ($x % $y) . "<br>";

// ---------- Ejercicio 4 ----------
echo "<h3>Ejercicio 4</h3>";
$radio     = 5;
$area      = M_PI * $radio ** 2;   // π · r²
$perimetro = 2 * M_PI * $radio;    // 2 · π · r
echo "Área: "      . round($area, 2)      . "<br>";
echo "Perímetro: " . round($perimetro, 2) . "<br>";

// ---------- Ejercicio 5 ----------
echo "<h3>Ejercicio 5</h3>";
$celsius    = 100;
$fahrenheit = $celsius * 9 / 5 + 32;   // F = C · 9/5 + 32
echo "$celsius °C = $fahrenheit °F<br>";

// ---------- Ejercicio 6 ----------
echo "<h3>Ejercicio 6</h3>";
$a = 10;
$b = 20;
echo "Antes: a=$a, b=$b<br>";
$a = $a + $b;   // a = 30
$b = $a - $b;   // b = 30 - 20 = 10 (el antiguo a)
$a = $a - $b;   // a = 30 - 10 = 20 (el antiguo b)
echo "Después: a=$a, b=$b<br>";

// ---------- Ejercicio 7 ----------
echo "<h3>Ejercicio 7</h3>";
$x = 10;
$x += 5; echo "x += 5 → $x<br>";   // 15
$x -= 3; echo "x -= 3 → $x<br>";   // 12
$x *= 2; echo "x *= 2 → $x<br>";   // 24
$x /= 4; echo "x /= 4 → $x<br>";   // 6

// ---------- Ejercicio 8 ----------
echo "<h3>Ejercicio 8</h3>";
// == compara solo el valor; === compara valor Y tipo
echo "5 == \"5\": ";  var_dump(5 == "5");   echo "<br>";  // true
echo "5 === \"5\": "; var_dump(5 === "5");  echo "<br>";  // false (int vs string)
echo "5 != \"5\": ";  var_dump(5 != "5");   echo "<br>";  // false
echo "5 !== \"5\": "; var_dump(5 !== "5");  echo "<br>";  // true

// ---------- Ejercicio 9 ----------
echo "<h3>Ejercicio 9</h3>";
// Las variables SÍ distinguen mayúsculas: son dos variables distintas
$nombre = "Ana";
$Nombre = "Luis";
echo "$nombre y $Nombre<br>";
// Las instrucciones NO distinguen mayúsculas: ECHO funciona igual que echo
ECHO "Esto funciona con ECHO en mayúsculas<br>";
?>
</body></html>
