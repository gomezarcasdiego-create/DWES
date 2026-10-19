<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><title>Gestor de notas</title>
<style>
    table{border-collapse:collapse}
    td,th{border:1px solid #333;padding:5px 12px}
    .aprobado{background:#c8f7c5}
    .suspenso{background:#f7c5c5}
</style></head><body>
<?php
// ===== Gestor de notas =====

// Limpia datos de entrada (saneamiento)
function limpiar($dato) {
    return htmlspecialchars(stripslashes(trim($dato)));
}

// Media de tres notas
function media($nota1, $nota2, $nota3) {
    return ($nota1 + $nota2 + $nota3) / 3;
}

// Calificación según la nota
function calificacion($nota) {
    if ($nota >= 9)      { return "Sobresaliente"; }
    elseif ($nota >= 7)  { return "Notable"; }
    elseif ($nota >= 5)  { return "Aprobado"; }
    else                 { return "Suspenso"; }
}

// 1. Array con 5 alumnos
$alumnos = array(
    array("nombre" => "Ana",   "nota1" => 9.0, "nota2" => 8.5, "nota3" => 9.5),
    array("nombre" => "Luis",  "nota1" => 4.0, "nota2" => 3.5, "nota3" => 5.0),
    array("nombre" => "Marta", "nota1" => 6.0, "nota2" => 7.0, "nota3" => 6.5),
    array("nombre" => "Pablo", "nota1" => 5.0, "nota2" => 5.5, "nota3" => 4.5),
    array("nombre" => "Lucía", "nota1" => 7.5, "nota2" => 8.0, "nota3" => 7.0)
);

echo "<h1>Gestor de notas</h1>";

// 4. Tabla HTML (y cálculo de estadísticas del punto 6 en el mismo recorrido)
$mejorMedia   = 0;
$mejorAlumno  = "";
$numAprobados = 0;

echo "<table>";
echo "<tr><th>Nombre</th><th>Nota 1</th><th>Nota 2</th><th>Nota 3</th><th>Media</th><th>Calificación</th></tr>";
foreach ($alumnos as $alumno) {
    $mediaAlumno = media($alumno["nota1"], $alumno["nota2"], $alumno["nota3"]);
    $clase = ($mediaAlumno >= 5) ? "aprobado" : "suspenso";   // fila verde o roja

    if ($mediaAlumno >= 5) { $numAprobados++; }
    if ($mediaAlumno > $mejorMedia) {
        $mejorMedia  = $mediaAlumno;
        $mejorAlumno = $alumno["nombre"];
    }

    echo "<tr class='$clase'>";
    echo "<td>" . $alumno["nombre"] . "</td>";
    echo "<td>" . $alumno["nota1"] . "</td>";
    echo "<td>" . $alumno["nota2"] . "</td>";
    echo "<td>" . $alumno["nota3"] . "</td>";
    echo "<td>" . number_format($mediaAlumno, 2) . "</td>";
    echo "<td>" . calificacion($mediaAlumno) . "</td>";
    echo "</tr>";
}
echo "</table>";
?>

<!-- 5. Formulario POST para buscar alumno -->
<h2>Buscar alumno</h2>
<form method="post" action="">
    Nombre: <input type="text" name="busqueda">
    <input type="submit" name="buscar" value="Buscar">
</form>

<?php
if (isset($_POST['buscar'])) {
    $busqueda = isset($_POST['busqueda']) ? limpiar($_POST['busqueda']) : "";   // validación + saneamiento

    if ($busqueda === "") {
        echo "<p>Escribe un nombre para buscar.</p>";
    } else {
        $encontrado = false;
        foreach ($alumnos as $alumno) {
            if (strtolower($alumno["nombre"]) === strtolower($busqueda)) {   // sin distinguir mayúsculas
                $encontrado = true;
                $mediaAlumno = media($alumno["nota1"], $alumno["nota2"], $alumno["nota3"]);
                echo "<h3>Ficha de " . $alumno["nombre"] . "</h3>";
                echo "Nota 1: " . $alumno["nota1"] . "<br>";
                echo "Nota 2: " . $alumno["nota2"] . "<br>";
                echo "Nota 3: " . $alumno["nota3"] . "<br>";
                echo "Media: " . number_format($mediaAlumno, 2) . "<br>";
                echo "Calificación: " . calificacion($mediaAlumno) . "<br>";
                break;
            }
        }
        if (!$encontrado) {
            echo "<p>Alumno no encontrado</p>";
        }
    }
}

// 6. Resumen final
echo "<h2>Resumen</h2>";
echo "Mejor nota media: " . number_format($mejorMedia, 2) . " ($mejorAlumno)<br>";
echo "Número de aprobados: $numAprobados de " . count($alumnos) . "<br>";
?>
</body></html>
