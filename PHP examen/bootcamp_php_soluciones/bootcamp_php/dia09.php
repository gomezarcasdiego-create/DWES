<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><title>Día 9</title>
<style>form{border:1px solid #aaa;padding:10px;margin-bottom:10px}</style></head><body>
<?php
echo "<h1>Día 9: Formularios con \$_GET y \$_POST</h1>";
/*
 * Todos los formularios envían a esta misma página (action="").
 * Cada formulario tiene un botón con name distinto (ej1, ej2...) para saber cuál se envió.
 * isset() comprueba que la variable/clave existe: evita el error al cargar la página por primera vez.
 */
?>

<h3>Ejercicio 1 (GET)</h3>
<form method="get" action="">
    Nombre: <input type="text" name="nombre1">
    <input type="submit" name="ej1" value="Enviar">
</form>
<?php
if (isset($_GET['ej1']) && isset($_GET['nombre1'])) {
    echo "Hola " . htmlspecialchars($_GET['nombre1']);
}
?>

<h3>Ejercicio 2 (POST)</h3>
<form method="post" action="">
    Nombre: <input type="text" name="nombre2">
    <input type="submit" name="ej2" value="Enviar">
</form>
<?php
if (isset($_POST['ej2']) && isset($_POST['nombre2'])) {
    echo "Hola " . htmlspecialchars($_POST['nombre2']);
}
?>

<h3>Ejercicio 3: suma</h3>
<form method="post" action="">
    N1: <input type="number" name="n1" step="any">
    N2: <input type="number" name="n2" step="any">
    <input type="submit" name="ej3" value="Sumar">
</form>
<?php
if (isset($_POST['ej3'])) {
    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];
    echo "Suma: " . ($n1 + $n2);   // PHP convierte los strings numéricos automáticamente
}
?>

<h3>Ejercicio 4: mayor/menor de edad</h3>
<form method="post" action="">
    Edad: <input type="number" name="edad4">
    <input type="submit" name="ej4" value="Comprobar">
</form>
<?php
if (isset($_POST['ej4'])) {
    $edad = (int) $_POST['edad4'];
    echo ($edad >= 18) ? "Mayor de edad" : "Menor de edad";
}
?>

<h3>Ejercicio 5: calificación</h3>
<form method="post" action="">
    Nota: <input type="number" name="nota5" step="any">
    <input type="submit" name="ej5" value="Calificar">
</form>
<?php
if (isset($_POST['ej5'])) {
    $nota = (float) $_POST['nota5'];
    if ($nota >= 9)      { echo "Sobresaliente"; }
    elseif ($nota >= 5)  { echo "Aprobado"; }
    else                 { echo "Suspenso"; }
}
?>

<h3>Ejercicio 6: login (admin / 1234)</h3>
<form method="post" action="">
    Usuario: <input type="text" name="usuario">
    Clave: <input type="password" name="clave">
    <input type="submit" name="ej6" value="Entrar">
</form>
<?php
if (isset($_POST['ej6'])) {
    // Los datos de formulario siempre llegan como string → comparamos con "1234" entre comillas
    if ($_POST['usuario'] === "admin" && $_POST['clave'] === "1234") {
        echo "Acceso concedido";
    } else {
        echo "Acceso denegado";
    }
}
?>

<h3>Ejercicio 7: calculadora</h3>
<form method="post" action="">
    <input type="number" name="c1" step="any">
    <select name="operacion">
        <option value="suma">+</option>
        <option value="resta">-</option>
        <option value="multiplicacion">×</option>
        <option value="division">÷</option>
    </select>
    <input type="number" name="c2" step="any">
    <input type="submit" name="ej7" value="Calcular">
</form>
<?php
if (isset($_POST['ej7'])) {
    $c1 = $_POST['c1'];
    $c2 = $_POST['c2'];
    switch ($_POST['operacion']) {
        case "suma":           echo "Resultado: " . ($c1 + $c2); break;
        case "resta":          echo "Resultado: " . ($c1 - $c2); break;
        case "multiplicacion": echo "Resultado: " . ($c1 * $c2); break;
        case "division":
            echo ($c2 == 0) ? "Error: división entre cero" : "Resultado: " . ($c1 / $c2);
            break;
    }
}
?>

<h3>Ejercicio 8: GET vs POST</h3>
<?php
/*
 * GET:  los datos viajan en la URL (…/dia09.php?nombre1=Ana&ej1=Enviar). Se ven, se pueden
 *       guardar en favoritos y tienen límite de tamaño. Úsalo para búsquedas/consultas.
 * POST: los datos viajan en el cuerpo de la petición; la URL NO cambia. Úsalo para
 *       contraseñas, formularios que modifican datos, mucho contenido.
 */
echo "Mira la URL tras enviar el ejercicio 1 (GET) y el 2 (POST).";
?>

<h3>Ejercicio 9: sin isset()</h3>
<?php
/*
 * Sin isset(), al cargar la página por primera vez se ejecutaría:
 *     echo "Hola " . $_POST['nombre2'];
 * y PHP 8 muestra:  Warning: Undefined array key "nombre2"
 * (PHP 7 mostraba: Notice: Undefined index: nombre2).
 * Es porque $_POST está vacío hasta que se envía el formulario.
 * Corrección (lo que hemos usado arriba):
 *     if (isset($_POST['nombre2'])) { echo "Hola " . $_POST['nombre2']; }
 */
echo "Ver el comentario del código.";
?>
</body></html>
