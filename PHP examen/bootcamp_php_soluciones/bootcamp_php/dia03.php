<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><title>Día 3</title></head><body>
<?php
echo "<h1>Día 3: switch y operadores lógicos</h1>";

// ---------- Ejercicio 1 ----------
echo "<h3>Ejercicio 1</h3>";
$dia = 3;
switch ($dia) {
    case 1: echo "Lunes";     break;   // sin break se ejecutarían los case siguientes
    case 2: echo "Martes";    break;
    case 3: echo "Miércoles"; break;
    case 4: echo "Jueves";    break;
    case 5: echo "Viernes";   break;
    case 6: echo "Sábado";    break;
    case 7: echo "Domingo";   break;
    default: echo "Día no válido";
}
echo "<br>";

// ---------- Ejercicio 2 ----------
echo "<h3>Ejercicio 2</h3>";
$mes = 2;
switch ($mes) {
    case 1: case 3: case 5: case 7: case 8: case 10: case 12:   // case agrupados
        echo "31 días"; break;
    case 4: case 6: case 9: case 11:
        echo "30 días"; break;
    case 2:
        echo "28 días"; break;
    default:
        echo "Mes no válido";
}
echo "<br>";

// ---------- Ejercicio 3 ----------
echo "<h3>Ejercicio 3</h3>";
$a = 10; $b = 0; $operacion = "division";
switch ($operacion) {
    case "suma":           echo "Resultado: " . ($a + $b); break;
    case "resta":          echo "Resultado: " . ($a - $b); break;
    case "multiplicacion": echo "Resultado: " . ($a * $b); break;
    case "division":
        if ($b == 0) {
            echo "Error: no se puede dividir entre cero";   // control de división entre cero
        } else {
            echo "Resultado: " . ($a / $b);
        }
        break;
    default: echo "Operación no válida";
}
echo "<br>";

// ---------- Ejercicio 4 ----------
echo "<h3>Ejercicio 4</h3>";
$letra = "E";
switch (strtolower($letra)) {   // strtolower para aceptar mayúsculas y minúsculas
    case "a": case "e": case "i": case "o": case "u":
        echo "$letra es vocal"; break;
    default:
        echo "$letra es consonante";
}
echo "<br>";

// ---------- Ejercicio 5 ----------
echo "<h3>Ejercicio 5</h3>";
$edad = 40;
if ($edad < 12) {
    echo "Niño";
} elseif ($edad >= 12 && $edad <= 17) {
    echo "Adolescente";
} elseif ($edad >= 18 && $edad <= 64) {
    echo "Adulto";
} else {
    echo "Mayor";
}
echo "<br>";

// ---------- Ejercicio 6 ----------
echo "<h3>Ejercicio 6</h3>";
$usuario = "admin";
$clave   = 1234;   // int, no string
if ($usuario === "admin" && $clave === "1234") {
    echo "Acceso concedido";
} else {
    echo "Acceso denegado";   // sale esto: 1234 (int) === "1234" (string) es false porque === compara tipo
}
echo "<br>";

// ---------- Ejercicio 7 ----------
echo "<h3>Ejercicio 7</h3>";
$x = "0"; $y = 0; $z = null;
echo '$x == $y: ';  var_dump($x == $y);   echo "<br>";   // true  (mismo valor tras convertir)
echo '$x === $y: '; var_dump($x === $y);  echo "<br>";   // false (string vs int)
echo '$y == $z: ';  var_dump($y == $z);   echo "<br>";   // true  (0 y null son "falsos")
echo '$y === $z: '; var_dump($y === $z);  echo "<br>";   // false (int vs null)

// ---------- Ejercicio 8 ----------
echo "<h3>Ejercicio 8</h3>";
$n = 15;
// Con &&
if ($n >= 10 && $n <= 20) { echo "Con &&: está entre 10 y 20<br>"; }
else                      { echo "Con &&: está fuera<br>"; }
// Con ||/! : "fuera" es n<10 o n>20, y "entre" es lo contrario (!)
if (!($n < 10 || $n > 20)) { echo "Con ||/!: está entre 10 y 20<br>"; }
else                       { echo "Con ||/!: está fuera<br>"; }
?>
</body></html>
