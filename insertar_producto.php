
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style_for.css">
    <title>formulario</title>
</head>
<body>
    <center>
        <form method="POST" action="validar_producto.php">
        <h2>Formulario de Producto</h2>
        <input type="text" placeholder="nombre_producto" required name="nombre_producto"><br>
        <p>descripcion</p>
        <textarea  required  name="descripcion"> </textarea><br> 
        <input type="int" placeholder="precio_producto" required name="precio_producto"><br> 
        
        
        <!-- <input type="text" placeholder="foto_per" required name="foto_per"><br> -->
        <input class="bt" type="submit" name="Registrar_producto" value="Registrar producto">
        <a href="amd.php">volver</a>
        </form>
        
    </center>



</body>
</html>