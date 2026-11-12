<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3 - Conversor Binario / Decimal</title>
</head>
<body>
    <h2>Ejercicio 3: Calculadora Binario ↔ Decimal</h2>
    <form method="POST" action="">
        <label for="numero">Número:</label><br>
        <input type="text" id="numero" name="numero" required
               value="<?php echo isset($_POST['numero']) ? htmlspecialchars($_POST['numero']) : ''; ?>"><br><br>

        <select name="tipo" id="tipo">
            <option value="dec_bin" <?php echo (($_POST['tipo'] ?? '') === 'dec_bin') ? 'selected' : ''; ?>>Decimal &rarr; Binario</option>
            <option value="bin_dec" <?php echo (($_POST['tipo'] ?? '') === 'bin_dec') ? 'selected' : ''; ?>>Binario &rarr; Decimal</option>
        </select><br><br>

        <button type="submit">Convertir</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $numero = trim($_POST["numero"] ?? "");
        $tipo = $_POST["tipo"] ?? "dec_bin";

        echo "<hr>";
        if ($tipo === "dec_bin") {
            if (ctype_digit($numero)) {
                $binario = decbin((int)$numero);
                echo "<p>El número binario es: <strong>$binario</strong></p>";
            } else {
                echo "<p>Por favor, introduce un número entero decimal válido.</p>";
            }
        } elseif ($tipo === "bin_dec") {
            // Opción avanzada: comprobar que solo contiene 0 y 1
            if (preg_match('/^[01]+$/', $numero)) {
                $decimal = bindec($numero);
                echo "<p>El número decimal es: <strong>$decimal</strong></p>";
            } else {
                echo "<p>El número no es binario, no puedo hacer el cálculo.</p>";
            }
        }
    }
    ?>
</body>
</html>
