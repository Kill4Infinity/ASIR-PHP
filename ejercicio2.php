<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2 - Validación de Fechas</title>
</head>
<body>
    <h2>Ejercicio 2: Validar fecha y sumar 3 meses</h2>
    <form method="POST" action="">
        <label for="dia">Día:</label><br>
        <input type="number" id="dia" name="dia" required
               value="<?php echo isset($_POST['dia']) ? htmlspecialchars($_POST['dia']) : ''; ?>"><br><br>

        <label for="mes">Mes:</label><br>
        <input type="number" id="mes" name="mes" required
               value="<?php echo isset($_POST['mes']) ? htmlspecialchars($_POST['mes']) : ''; ?>"><br><br>

        <label for="anio">Año:</label><br>
        <input type="number" id="anio" name="anio" required
               value="<?php echo isset($_POST['anio']) ? htmlspecialchars($_POST['anio']) : ''; ?>"><br><br>

        <button type="submit">Verificar Fecha</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $dia = (int) ($_POST["dia"] ?? 0);
        $mes = (int) ($_POST["mes"] ?? 0);
        $anio = (int) ($_POST["anio"] ?? 0);

        echo "<hr>";
        if (checkdate($mes, $dia, $anio)) {
            $fecha = DateTime::createFromFormat('j-n-Y', "$dia-$mes-$anio");
            $diaSemana = $fecha->format('D'); // Ej: Mon, Tue, Wed...

            $fechaMas3Meses = clone $fecha;
            $fechaMas3Meses->modify('+3 months');
            $fechaFormateada = $fechaMas3Meses->format('d-m-Y');

            echo "<p>La fecha es válida.</p>";
            echo "<p><strong>$diaSemana</strong></p>";
            echo "<p><strong>$fechaFormateada</strong></p>";
        } else {
            echo "<p>La fecha introducida ($dia-$mes-$anio) <strong>no es válida</strong>.</p>";
        }
    }
    ?>
</body>
</html>
