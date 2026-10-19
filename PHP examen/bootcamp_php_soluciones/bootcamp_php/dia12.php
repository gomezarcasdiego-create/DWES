<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><title>Simulacro</title>
<style>table{border-collapse:collapse}td,th{border:1px solid #333;padding:4px 10px}form{border:1px solid #aaa;padding:10px;margin-bottom:10px}</style></head><body>
<h1>Día 12: Simulacro de examen</h1>

<h2>Parte A: teoría</h2>
<ol>
    <li><code>var_dump("5" == 5)</code> → <code>bool(true)</code> (compara solo el valor).
        <code>var_dump("5" === 5)</code> → <code>bool(false)</code> (compara valor y tipo: string vs int).</li>
    <li>En nombres de variables, <strong>sí</strong> distingue mayúsculas (<code>$a</code> ≠ <code>$A</code>).
        En nombres de funciones, <strong>no</strong> (<code>saludar()</code> = <code>SALUDAR()</code>).</li>
    <li><code>while</code> comprueba la condición <em>antes</em>: puede no ejecutarse nunca.
        <code>do...while</code> la comprueba <em>al final</em>: se ejecuta al menos una vez.</li>
    <li>Con <code>isset($_POST['boton'])</code> (o <code>$_SERVER['REQUEST_METHOD'] === 'POST'</code>).</li>
    <li><code>$_GET</code>: datos en la URL (visibles, para consultas). <code>$_POST</code>: datos en el cuerpo
        de la petición (no se ven en la URL; para datos sensibles o que modifican algo).</li>
    <li>Indexado: índices numéricos desde 0 (<code>$a[0]</code>). Asociativo: claves de texto
        (<code>$a["nombre"]</code>).</li>
</ol>

<h2>Parte B: práctica</h2>
<?php
// ---------- B1: esPrimo y primos del 1 al 50 ----------
echo "<h3>B1: primos del 1 al 50</h3>";
function esPrimo($n) {
    if ($n < 2) { return false; }          // 0 y 1 no son primos
    for ($i = 2; $i * $i <= $n; $i++) {    // basta probar hasta la raíz cuadrada
        if ($n % $i == 0) { return false; }
    }
    return true;
}
for ($n = 1; $n <= 50; $n++) {
    if (esPrimo($n)) { echo $n . " "; }
}

// ---------- B2: productos con precio ----------
echo "<h3>B2: productos</h3>";
$productos = array("Portátil" => 650.0, "Ratón" => 15.5, "Teclado" => 32.9, "Monitor" => 180.0, "Auriculares" => 45.0);
$total = 0;
$baratoNombre = "";
$baratoPrecio = null;                      // null para coger el primer precio como referencia
echo "<table><tr><th>Producto</th><th>Precio</th></tr>";
foreach ($productos as $producto => $precio) {
    echo "<tr><td>$producto</td><td>" . number_format($precio, 2) . " €</td></tr>";
    $total += $precio;
    if ($baratoPrecio === null || $precio < $baratoPrecio) {
        $baratoPrecio = $precio;
        $baratoNombre = $producto;
    }
}
echo "<tr><th>Total</th><th>" . number_format($total, 2) . " €</th></tr></table>";
echo "Producto más barato: $baratoNombre (" . number_format($baratoPrecio, 2) . " €)";
?>

<h3>B3: franja de edad</h3>
<form method="post" action="">
    Nombre: <input type="text" name="nombre3">
    Edad: <input type="number" name="edad3">
    <input type="submit" name="b3" value="Enviar">
</form>
<?php
if (isset($_POST['b3'])) {
    $nombre = htmlspecialchars(trim($_POST['nombre3']));
    $edad = filter_var($_POST['edad3'], FILTER_VALIDATE_INT);
    if ($nombre === "" || $edad === false || $edad < 0) {
        echo "Datos no válidos";
    } else {
        if ($edad < 12)       { $franja = "niño"; }
        elseif ($edad <= 17)  { $franja = "adolescente"; }
        elseif ($edad <= 64)  { $franja = "adulto"; }
        else                  { $franja = "mayor"; }
        echo "$nombre, con $edad años eres: $franja";
    }
}

// ---------- B4: pirámide de números ----------
echo "<h3>B4: pirámide</h3>";
for ($fila = 1; $fila <= 5; $fila++) {
    for ($num = 1; $num <= $fila; $num++) {
        echo $num;
    }
    echo "<br>";
}
?>

<h3>B5: N primeros múltiplos de 3</h3>
<form method="post" action="">
    N: <input type="number" name="n5" min="1">
    <input type="submit" name="b5" value="Mostrar">
</form>
<?php
if (isset($_POST['b5'])) {
    $n = filter_var($_POST['n5'], FILTER_VALIDATE_INT);
    if ($n === false || $n < 1) {
        echo "Introduce un entero mayor que 0";
    } else {
        echo "<ul>";
        for ($i = 1; $i <= $n; $i++) {
            echo "<li>" . (3 * $i) . "</li>";   // 3, 6, 9...
        }
        echo "</ul>";
    }
}
?>
<!-- Errores típicos: ; y $ olvidados, = en vez de ==, no usar isset(), comillas simples sin interpolar, break en switch -->
</body></html>
