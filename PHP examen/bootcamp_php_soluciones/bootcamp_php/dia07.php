<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><title>Día 7</title></head><body>
<?php
echo "<h1>Día 7: Funciones</h1>";

// ---------- Ejercicio 1 y 2 ----------
echo "<h3>Ejercicios 1 y 2</h3>";
function saludar($nombre, $formal = false) {   // $formal tiene valor por defecto → opcional
    if ($formal) {
        return "Estimado/a $nombre";
    }
    return "¡Hola $nombre!";
}
echo saludar("Ana") . "<br>";
echo saludar("Ana", true) . "<br>";

// ---------- Ejercicio 3 ----------
echo "<h3>Ejercicio 3</h3>";
function suma($a, $b) {
    return $a + $b;
}
echo suma(2, 3) . "<br>";
echo suma(10, 25) . "<br>";
echo suma(-4, 9) . "<br>";

// ---------- Ejercicio 4 ----------
echo "<h3>Ejercicio 4</h3>";
function esPar($n) {
    return $n % 2 == 0;   // la comparación ya devuelve true/false
}
var_dump(esPar(8));  echo "<br>";
var_dump(esPar(7));  echo "<br>";

// ---------- Ejercicio 5 ----------
echo "<h3>Ejercicio 5</h3>";
function mayor($a, $b, $c) {
    $mayor = $a;
    if ($b > $mayor) { $mayor = $b; }
    if ($c > $mayor) { $mayor = $c; }
    return $mayor;
}
echo "Mayor de 4, 9, 2: " . mayor(4, 9, 2) . "<br>";

// ---------- Ejercicio 6 ----------
echo "<h3>Ejercicio 6</h3>";
function factorial($n) {
    $resultado = 1;
    for ($i = 2; $i <= $n; $i++) {
        $resultado *= $i;
    }
    return $resultado;
}
echo "5! = " . factorial(5) . "<br>";

// ---------- Ejercicio 7 ----------
echo "<h3>Ejercicio 7</h3>";
function calcularIVA($precio, $iva = 21) {
    return $precio + ($precio * $iva / 100);
}
echo "100 € con IVA 21%: " . calcularIVA(100) . " €<br>";
echo "100 € con IVA 10%: " . calcularIVA(100, 10) . " €<br>";

// ---------- Ejercicio 8 ----------
echo "<h3>Ejercicio 8</h3>";
function sumaArray($numeros) {
    $total = 0;
    foreach ($numeros as $numero) {
        $total += $numero;
    }
    return $total;
}
echo "Suma: " . sumaArray(array(3, 6, 9, 12)) . "<br>";

// ---------- Ejercicio 9 ----------
echo "<h3>Ejercicio 9</h3>";
function notaEnTexto($nota) {
    if ($nota >= 9)      { return "Sobresaliente"; }
    elseif ($nota >= 5)  { return "Aprobado"; }
    else                 { return "Suspenso"; }
}
$notas = array(9.5, 6, 3.5, 7);
foreach ($notas as $nota) {
    echo "$nota → " . notaEnTexto($nota) . "<br>";
}
?>
</body></html>
