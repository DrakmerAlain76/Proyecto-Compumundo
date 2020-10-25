<?php
require_once '../helper/control_par.php';
require_once '../conexion.php';
if(isset($_SESSION['usuario'])){
    $t=$_SESSION['usuario'];
    $usuario=$t['usuario'];
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <!-- <link rel="stylesheet" href=""> -->
    <title>RECARGA DE CASH</title>
</head>
<body>
    <!-- logo -->
    <!-- ESTE MENU ES PROVICIONAL -->
    <?php require_once ('../view/menu_navegacion_us.php'); ?>
    <div class="recarga">
        <center>

            <form action="validar_codigo.php" method="POST"><br><br>
                <label for="codigo">Inserte Código</label><br><br>
                <input type="text" id="codigo" name="codigo" placeholder="Codigo" require><br>
                <input class="boton" type="submit" name="enviar" value="enviar">
                
            </form>
            <br><a class="boton" href="../perfil/perfil.php">volver</a>
        </center>        
    </div>

    
</body>
</html>

