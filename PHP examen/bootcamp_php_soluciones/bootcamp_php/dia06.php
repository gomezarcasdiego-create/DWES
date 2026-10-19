<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><title>Día 6</title></head><body>
<?php
echo "<h1>Día 6: Arrays asociativos y foreach</h1>";
/*
 * RESUMEN RÁPIDO
 * - Array asociativo: en vez de índices numéricos usa claves (strings): "clave" => valor
 * - Acceso: $a["clave"]
 * - foreach ($a as $clave => $valor) recorre claves y valores a la vez.
 */

// ---------- Ejercicio 1 ----------
echo "<h3>Ejercicio 1</h3>";
$alumno = array(
    "nombre" => "Ana",
    "edad"   => 20,
    "ciudad" => "Santander"
);
echo "Nombre: " . $alumno["nombre"] . "<br>";
echo "Edad: "   . $alumno["edad"]   . "<br>";
echo "Ciudad: " . $alumno["ciudad"] . "<br>";

// ---------- Ejercicio 2 ----------
echo "<h3>Ejercicio 2</h3>";
foreach ($alumno as $clave => $valor) {
    echo "$clave: $valor<br>";
}

// ---------- Ejercicio 3 ----------
echo "<h3>Ejercicio 3</h3>";
$alumno["nota"] = 8.5;          // clave nueva → se añade
$alumno["edad"] = 21;           // clave existente → se sobrescribe
echo "<pre>";
print_r($alumno);
echo "</pre>";

// ---------- Ejercicio 4 ----------
echo "<h3>Ejercicio 4</h3>";
$precios = array("Leche" => 1.20, "Pan" => 0.80, "Huevos" => 2.50);
$precioTotal = 0;
$productoCaro = "";
$precioMaximo = 0;
foreach ($precios as $producto => $precio) {
    $precioTotal += $precio;
    if ($precio > $precioMaximo) {      // guardamos precio Y nombre del más caro
        $precioMaximo = $precio;
        $productoCaro = $producto;
    }
}
echo "Precio total: " . number_format($precioTotal, 2) . " €<br>";
echo "Producto más caro: $productoCaro (" . number_format($precioMaximo, 2) . " €)<br>";

// ---------- Ejercicio 5 ----------
echo "<h3>Ejercicio 5</h3>";
// Array de arrays: cada elemento es un array asociativo
$alumnos = array(
    array("nombre" => "Ana",   "nota" => 8.5),
    array("nombre" => "Luis",  "nota" => 4.0),
    array("nombre" => "Marta", "nota" => 6.5)
);
foreach ($alumnos as $a) {              // $a es un array asociativo
    echo $a["nombre"] . ": " . $a["nota"] . "<br>";
}

// ---------- Ejercicio 6 ----------
echo "<h3>Ejercicio 6</h3>";
$sumaNotas = 0;
foreach ($alumnos as $a) {
    $sumaNotas += $a["nota"];
}
$notaMedia = $sumaNotas / count($alumnos);
echo "Nota media: " . round($notaMedia, 2) . "<br>";
echo "Aprobados:<br>";
foreach ($alumnos as $a) {
    if ($a["nota"] >= 5) {
        echo "- " . $a["nombre"] . "<br>";
    }
}

// ---------- Ejercicio 7 ----------
echo "<h3>Ejercicio 7</h3>";
// Creamos un array nuevo con los precios descontados (no modificamos el original)
$preciosDescuento = array();
foreach ($precios as $producto => $precio) {
    $preciosDescuento[$producto] = $precio * 0.90;   // -10 %
}
foreach ($preciosDescuento as $producto => $precio) {
    echo "$producto: " . number_format($precio, 2) . " €<br>";
}
/* Alternativa modificando el propio array: foreach por referencia (&)
   foreach ($precios as $producto => &$precio) { $precio = $precio * 0.90; }
   unset($precio);   // IMPORTANTE: romper la referencia al terminar */

// ---------- Ejercicio 8 ----------
echo "<h3>Ejercicio 8</h3>";
echo "<pre>";
var_dump($alumnos);   // muestra tipos: array(3), string(3) "Ana", float(8.5)...
echo "</pre>";
?>
</body></html>
