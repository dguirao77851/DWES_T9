<?php
/**
 * Realiza una petición GET a un servicio web y devuelve los datos decodificados.
  * @param string $url URL del servicio web.
 * @return array|null Array de datos si la petición es correcta, null si falla.
 */
function consumirApi(string $url): ?array {
    $resultado = file_get_contents($url);

    if ($resultado === false) {
        return null;
    }

    return json_decode($resultado, true);
}

$apiUrl = "https://catfact.ninja/fact";
$datos = consumirApi($apiUrl);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Cat Facts API – DWES_T9</title>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>

        <h1>Dato curioso sobre gatos</h1>

        <div class="tarjeta">
<?php if ($datos): ?>
                <p class="frase"><?php echo $datos['fact']; ?></p>
                <p class="longitud">Longitud del texto: <?php echo $datos['length']; ?></p>
            <?php else: ?>
                <p class="error">No se pudo obtener el dato desde la API.</p>
<?php endif; ?>
        </div>

        <a class="boton" href="index.php">Volver al inicio</a>

    </body>
</html>
