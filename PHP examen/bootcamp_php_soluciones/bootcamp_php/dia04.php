<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><title>Día 4</title></head><body>
<?php
echo "<h1>Día 4: Bucles</h1>";

// ---------- Ejercicio 1 ----------
echo "<h3>Ejercicio 1</h3>";
for ($i = 1; $i <= 10; $i++) {
    echo $i . "<br>";
}

// ---------- Ejercicio 2 ----------
echo "<h3>Ejercicio 2</h3>";
for ($i = 1; $i <= 10; $i++) {
    echo "7 x $i = " . (7 * $i) . "<br>";
}

// ---------- Ejercicio 3 ----------
echo "<h3>Ejercicio 3</h3>";
$i = 1;
$suma = 0;
while ($i <= 100) {
    $suma += $i;   // acumulamos
    $i++;          // sin esto el bucle sería infinito
}
echo "Suma del 1 al 100: $suma<br>";   // 5050

// ---------- Ejercicio 4 ----------
echo "<h3>Ejercicio 4</h3>";
$i = 10;
do {
    echo "i = $i<br>";   // se ejecuta UNA vez aunque la condición sea falsa
    $i++;
} while ($i < 5);        // la condición se comprueba al final

// ---------- Ejercicio 5 ----------
echo "<h3>Ejercicio 5</h3>";
for ($i = 1; $i <= 50; $i++) {
    if ($i % 2 == 0) { echo $i . " "; }
}
echo "<br>";

// ---------- Ejercicio 6 ----------
echo "<h3>Ejercicio 6</h3>";
$n = 6;
$factorial = 1;
$i = $n;
while ($i > 1) {
    $factorial *= $i;   // 6 · 5 · 4 · 3 · 2
    $i--;
}
echo "6! = $factorial<br>";   // 720

// ---------- Ejercicio 7 ----------
echo "<h3>Ejercicio 7</h3>";
for ($i = 10; $i >= 1; $i--) {
    echo $i . "<br>";
}
echo "¡Despegue!<br>";

// ---------- Ejercicio 8 ----------
echo "<h3>Ejercicio 8</h3>";
for ($fila = 1; $fila <= 5; $fila++) {
    for ($col = 1; $col <= $fila; $col++) {   // tantas estrellas como número de fila
        echo "*";
    }
    echo "<br>";
}

// ---------- Ejercicio 9 ----------
echo "<h3>Ejercicio 9</h3>";
for ($tabla = 1; $tabla <= 5; $tabla++) {
    echo "<strong>Tabla del $tabla</strong><br>";
    for ($i = 1; $i <= 10; $i++) {
        echo "$tabla x $i = " . ($tabla * $i) . "<br>";
    }
    echo "<br>";
}
?>
</body></html>
