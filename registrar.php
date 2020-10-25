<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no,initial-scale=1, maximum-scale=1, minimum-scale=1">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <title>Validar Usuario</title>
    <style>
        center{
            margin-top: 15%;
        }
    </style>
</head>
<body>
    <center>
        <form method="POST" action="login.php">
            <h2>INICIAR SESION</h2><br>
            <input type="text" placeholder="&#128187;email" required name="email"><br><br>
            <input type="password" placeholder="&#128272;Contraseña" required name="password"><br>
            <input class="boton" type="submit"name="Validar" value="Validar"><br>
        </form><br>
        <a class="boton" href="formulario.php">Registrarse</a>
        <a class="boton" href="index_.php">inicio</a>
    </center>
</body>
</html>