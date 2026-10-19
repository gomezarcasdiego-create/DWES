<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><title>Día 10</title>
<style>form{border:1px solid #aaa;padding:10px;margin-bottom:10px}.error{color:#b00}</style></head><body>
<?php
echo "<h1>Día 10: Validación y sanitización</h1>";

// ---------- Ejercicio 7: función limpiar() (la usamos en todo el archivo) ----------
function limpiar($dato) {
    $dato = trim($dato);              // quita espacios al inicio y al final
    $dato = stripslashes($dato);      // quita barras invertidas (\)
    $dato = htmlspecialchars($dato);  // convierte <, >, &, " en entidades HTML (evita XSS)
    return $dato;
}
?>

<h3>Ejercicio 1: trim + htmlspecialchars</h3>
<form method="post" action="">
    Nombre: <input type="text" name="nombre1">
    <input type="submit" name="ej1" value="Enviar">
</form>
<?php
if (isset($_POST['ej1'])) {
    $nombre = htmlspecialchars(trim($_POST['nombre1']));
    echo "Nombre limpio: [$nombre]";   // prueba con "  Ana  " y con <b>Ana</b>
}
?>

<h3>Ejercicio 2: nombre no vacío y mínimo 3 caracteres</h3>
<form method="post" action="">
    Nombre: <input type="text" name="nombre2">
    <input type="submit" name="ej2" value="Validar">
</form>
<?php
if (isset($_POST['ej2'])) {
    $nombre = trim($_POST['nombre2']);
    if (empty($nombre)) {
        echo "<span class='error'>El nombre no puede estar vacío</span>";
    } elseif (strlen($nombre) < 3) {
        echo "<span class='error'>El nombre debe tener al menos 3 caracteres</span>";
    } else {
        echo "Nombre válido: " . htmlspecialchars($nombre);
    }
}
?>

<h3>Ejercicio 3: email</h3>
<form method="post" action="">
    Email: <input type="text" name="email3">
    <input type="submit" name="ej3" value="Validar">
</form>
<?php
if (isset($_POST['ej3'])) {
    $email = trim($_POST['email3']);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {   // devuelve el valor si es válido, false si no
        echo "Email válido";
    } else {
        echo "<span class='error'>Email no válido</span>";
    }
}
?>

<h3>Ejercicio 4: edad entera entre 0 y 120</h3>
<form method="post" action="">
    Edad: <input type="text" name="edad4">
    <input type="submit" name="ej4" value="Validar">
</form>
<?php
if (isset($_POST['ej4'])) {
    $opciones = array("options" => array("min_range" => 0, "max_range" => 120));
    $edad = filter_var($_POST['edad4'], FILTER_VALIDATE_INT, $opciones);
    if ($edad === false) {   // ===false porque 0 es válido pero se evalúa como "falso"
        echo "<span class='error'>Edad no válida (entero entre 0 y 120)</span>";
    } else {
        echo "Edad válida: $edad";
    }
}
?>

<h3>Ejercicio 5: htmlspecialchars vs strip_tags</h3>
<?php
$peligroso = "<script>alert(1)</script>";
echo "htmlspecialchars: " . htmlspecialchars($peligroso) . "<br>";   // se MUESTRA el texto del script (inofensivo)
echo "strip_tags: " . strip_tags($peligroso) . "<br>";              // quita las etiquetas: queda alert(1)
// Diferencia: htmlspecialchars conserva el texto escapado; strip_tags elimina las etiquetas.
?>

<h3>Ejercicio 6: URL y decimal</h3>
<form method="post" action="">
    URL: <input type="text" name="url6">
    Decimal: <input type="text" name="decimal6">
    <input type="submit" name="ej6" value="Validar">
</form>
<?php
if (isset($_POST['ej6'])) {
    echo filter_var($_POST['url6'], FILTER_VALIDATE_URL) ? "URL válida<br>" : "URL no válida<br>";
    $decimal = filter_var($_POST['decimal6'], FILTER_VALIDATE_FLOAT);
    echo ($decimal !== false) ? "Decimal válido: $decimal" : "Decimal no válido";
}
?>

<h3>Ejercicio 7: función limpiar()</h3>
<form method="post" action="">
    Nombre: <input type="text" name="nombre7"><br>
    Comentario: <input type="text" name="comentario7">
    <input type="submit" name="ej7" value="Enviar">
</form>
<?php
if (isset($_POST['ej7'])) {
    echo "Nombre: "     . limpiar($_POST['nombre7'])     . "<br>";
    echo "Comentario: " . limpiar($_POST['comentario7']);
}
?>

<h3>Ejercicio 8: contraseña</h3>
<form method="post" action="">
    Contraseña: <input type="password" name="pass8"><br>
    Repite: <input type="password" name="repite8">
    <input type="submit" name="ej8" value="Validar">
</form>
<?php
if (isset($_POST['ej8'])) {
    $pass   = $_POST['pass8'];     // en contraseñas NO se hace trim
    $repite = $_POST['repite8'];
    if (strlen($pass) < 8) {
        echo "<span class='error'>Mínimo 8 caracteres</span>";
    } elseif ($pass !== $repite) {
        echo "<span class='error'>Las contraseñas no coinciden</span>";
    } else {
        echo "Contraseña correcta";
    }
}
?>

<h3>Ejercicios 9 y 10: formulario completo con errores y valores conservados</h3>
<?php
$errores = array();
$nombre9 = $email9 = $edad9 = "";   // valores iniciales (ej. 10: se conservan al reenviar)

if (isset($_POST['ej9'])) {
    $nombre9 = trim($_POST['nombre9']);
    $email9  = trim($_POST['email9']);
    $edad9   = trim($_POST['edad9']);

    if (empty($nombre9) || strlen($nombre9) < 3) {
        $errores[] = "El nombre debe tener al menos 3 caracteres";
    }
    if (!filter_var($email9, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El email no es válido";
    }
    $opciones = array("options" => array("min_range" => 0, "max_range" => 120));
    if (filter_var($edad9, FILTER_VALIDATE_INT, $opciones) === false) {
        $errores[] = "La edad debe ser un entero entre 0 y 120";
    }

    if (count($errores) > 0) {
        echo "<ul class='error'>";
        foreach ($errores as $error) { echo "<li>$error</li>"; }
        echo "</ul>";
    } else {
        echo "<strong>Datos correctos:</strong><br>";
        echo "Nombre: " . limpiar($nombre9) . "<br>";
        echo "Email: "  . limpiar($email9)  . "<br>";
        echo "Edad: "   . limpiar($edad9)   . "<br>";
    }
}
?>
<form method="post" action="">
    <!-- value="..." conserva lo escrito (saneado con htmlspecialchars) -->
    Nombre: <input type="text" name="nombre9" value="<?php echo htmlspecialchars($nombre9); ?>"><br>
    Email: <input type="text" name="email9" value="<?php echo htmlspecialchars($email9); ?>"><br>
    Edad: <input type="text" name="edad9" value="<?php echo htmlspecialchars($edad9); ?>"><br>
    <input type="submit" name="ej9" value="Enviar">
</form>
</body></html>
