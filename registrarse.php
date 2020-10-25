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
        <form method="POST" action="validar.php">
        <h2>Formulario de Registro</h2>
        <input type="text" placeholder="nombres" required name="nombres"><br>
        <input type="text" placeholder="apellidos" required name="apellidos"><br>
        <input type="password" placeholder="Contraseña" required name="contracena"><br>
        <input type="email" placeholder="email" required name="email"><br>
        <input type="text" placeholder="Usuario" required name="usuario"><br> 
        
        <input type="date" required name="fecha_per"><br>
        <!-- <input type="text" placeholder="foto_per" required name="foto_per"><br> -->
        <input class="bt" type="submit" name="Registrar" value="Registrar">
        <a href="index_.php">volver</a>
        </form>
        
    </center>



</body>
</html>