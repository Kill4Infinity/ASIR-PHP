<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1 - Búsqueda en cadenas</title>
</head>
<body>
    <h2>Ejercicio 1: Buscar texto y contar apariciones</h2>
    <form method="POST" action="">
        <label for="texto_principal">Texto principal:</label><br>
        <input type="text" id="texto_principal" name="texto_principal" required 
               value="<?php echo isset($_POST['texto_principal']) ? htmlspecialchars($_POST['texto_principal']) : ''; ?>"><br><br>
        
        <label for="texto_buscar">Texto a buscar:</label><br>
        <input type="text" id="texto_buscar" name="texto_buscar" required
               value="<?php echo isset($_POST['texto_buscar']) ? htmlspecialchars($_POST['texto_buscar']) : ''; ?>"><br><br>
        
        <button type="submit">Contar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $principal = $_POST["texto_principal"] ?? "";
        $buscar = $_POST["texto_buscar"] ?? "";

        if ($buscar !== "") {
            $principalSeguro = htmlspecialchars($principal);
            $buscarSeguro = htmlspecialchars($buscar);

            // Comprobación básica con str_contains (o strpos !== false)
            if (str_contains($principal, $buscar)) {
                $veces = substr_count($principal, $buscar);
                echo "<hr>";
                echo "<p>El texto '<strong>$buscarSeguro</strong>' se encuentra en el texto '<strong>$principalSeguro</strong>'</p>";
                echo "<p><strong>Opción avanzada:</strong><br>";
                echo "Texto Principal: $principalSeguro<br>";
                echo "Texto a buscar: $buscarSeguro<br>";
                echo "La cadena '$buscarSeguro' aparece <strong>$veces</strong> " . ($veces === 1 ? "vez" : "veces") . " en el texto.</p>";
            } else {
                echo "<hr>";
                echo "<p>El texto '<strong>$buscarSeguro</strong>' NO se encuentra en el texto '<strong>$principalSeguro</strong>'.</p>";
            }
        }
    }
    ?>
</body>
</html>
