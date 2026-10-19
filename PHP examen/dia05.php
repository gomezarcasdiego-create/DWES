<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><title>Día 5</title></head><body>
<?php
echo "<h1>Día 5: Arrays indexados</h1>";
/*
 * RESUMEN RÁPIDO
 * - Array indexado: los índices son números y empiezan en 0.
 * - $a[0] primer elemento; $a[count($a)-1] último elemento.
 * - $a[] = valor  añade al final.
 * - count($a) devuelve cuántos elementos hay.
 */

// ---------- Ejercicio 1 ----------
echo "<h3>Ejercicio 1</h3>";
$frutas = array("manzana", "pera", "plátano", "naranja", "uva");
echo "Primera: " . $frutas[0] . "<br>";
echo "Última: "  . $frutas[count($frutas) - 1] . "<br>";   // count = 5 → último índice = 4

// ---------- Ejercicio 2 ----------
echo "<h3>Ejercicio 2</h3>";
foreach ($frutas as $fruta) {   // $fruta toma el valor de cada elemento
    echo $fruta . "<br>";
}

// ---------- Ejercicio 3 ----------
echo "<h3>Ejercicio 3</h3>";
$total = count($frutas);        // guardamos count() para no llamarlo en cada vuelta
for ($i = 0; $i < $total; $i++) {   // < y no <=, porque el último índice es total-1
    echo "Posición $i: " . $frutas[$i] . "<br>";
}

// ---------- Ejercicio 4 ----------
echo "<h3>Ejercicio 4</h3>";
$frutas[] = "kiwi";             // se añade en la siguiente posición libre (índice 5)
echo "Número de elementos: " . count($frutas) . "<br>";
echo "<pre>";
print_r($frutas);               // muestra índices y valores
echo "</pre>";

// ---------- Ejercicio 5 ----------
echo "<h3>Ejercicio 5</h3>";
$numeros = array(12, 5, 8, 21, 3, 16);
$suma     = 0;
$cantidad = 0;                  // contamos a mano (sin count)
$mayor    = $numeros[0];        // partimos del primero como candidato
$menor    = $numeros[0];
foreach ($numeros as $numero) {
    $suma += $numero;
    $cantidad++;
    if ($numero > $mayor) { $mayor = $numero; }
    if ($numero < $menor) { $menor = $numero; }
}
$media = $suma / $cantidad;
echo "Suma: $suma<br>";
echo "Media: $media<br>";
echo "Mayor: $mayor<br>";
echo "Menor: $menor<br>";

// ---------- Ejercicio 6 ----------
echo "<h3>Ejercicio 6</h3>";
$pares = 0;
$impares = 0;
foreach ($numeros as $numero) {
    if ($numero % 2 == 0) { $pares++; } else { $impares++; }
}
echo "Pares: $pares, impares: $impares<br>";

// ---------- Ejercicio 7 ----------
echo "<h3>Ejercicio 7</h3>";
// Empezamos en el último índice y bajamos hasta 0
for ($i = count($numeros) - 1; $i >= 0; $i--) {
    echo $numeros[$i] . " ";
}
echo "<br>";

// ---------- Ejercicio 8 ----------
echo "<h3>Ejercicio 8</h3>";
$frutas2 = array("manzana", "pera", "plátano");
$encontrada = false;            // bandera: asumimos que no está
foreach ($frutas2 as $fruta) {
    if ($fruta === "pera") {
        $encontrada = true;
        break;                  // ya no hace falta seguir buscando
    }
}
if ($encontrada) {
    echo "Sí, \"pera\" está en el array<br>";
} else {
    echo "No, \"pera\" no está en el array<br>";
}

// ---------- Ejercicio 9 ----------
echo "<h3>Ejercicio 9</h3>";
$mayoresDe10 = array();         // array vacío
foreach ($numeros as $numero) {
    if ($numero > 10) {
        $mayoresDe10[] = $numero;   // añadimos solo los que cumplen
    }
}
echo "<pre>";
print_r($mayoresDe10);
echo "</pre>";

// ---------- EXTRA: funciones de arrays que suelen caer ----------
echo "<h3>Extra: funciones útiles</h3>";
$ejemplo = array(4, 9, 1, 7);
echo "array_sum: "   . array_sum($ejemplo) . "<br>";     // 21
echo "max / min: "   . max($ejemplo) . " / " . min($ejemplo) . "<br>";
echo "in_array(7): " . (in_array(7, $ejemplo) ? "sí" : "no") . "<br>";
array_push($ejemplo, 10);       // igual que $ejemplo[] = 10
array_pop($ejemplo);            // quita el último
sort($ejemplo);                 // ordena de menor a mayor (reindexa)
echo "Ordenado: " . implode(", ", $ejemplo) . "<br>";
echo "Inverso: "  . implode(", ", array_reverse($ejemplo)) . "<br>";
?>
</body></html>
