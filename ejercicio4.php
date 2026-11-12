<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 4 - Números Aleatorios</title>
</head>
<body>
    <h2>Ejercicio 4: Generador de Números Aleatorios</h2>
    <form method="POST" action="">
        <label for="minimo">Número mínimo:</label><br>
        <input type="number" id="minimo" name="minimo" required
               value="<?php echo isset($_POST['minimo']) ? htmlspecialchars($_POST['minimo']) : ''; ?>"><br><br>

        <label for="maximo">Número máximo:</label><br>
        <input type="number" id="maximo" name="maximo" required
               value="<?php echo isset($_POST['maximo']) ? htmlspecialchars($_POST['maximo']) : ''; ?>"><br><br>

        <button type="submit">Generar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $min = filter_var($_POST["minimo"] ?? null, FILTER_VALIDATE_INT);
        $max = filter_var($_POST["maximo"] ?? null, FILTER_VALIDATE_INT);

        echo "<hr>";
        if ($min === false || $max === false) {
            echo "<p>Introduce valores enteros válidos.</p>";
        } elseif ($min >= $max) {
            echo "<p>Error: El intervalo no es correcto. El número mínimo ($min) debe ser estrictamente menor que el número máximo ($max).</p>";
        } else {
            $aleatorio = random_int($min, $max);
            echo "<p>Número aleatorio generado: <strong>$aleatorio</strong></p>";
        }
    }
    ?>
</body>
</html>
