<?php 
require_once '../helper/control_par.php';
require_once '../conexion.php';
if(isset($_SESSION['usuario'])){
    $t=$_SESSION['usuario'];
    $usuario=$t['usuario'];
    $id_usuario=$t['id_usuario'];
    // var_dump($id_usuario);
    // var_dump($usuario);
    // die();
}
$sql="SELECT * FROM usuarios where id_usuario='$id_usuario'";
$result=$conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="stylesheet" type="text/css" href="../style/style1.css">
    <title>Perfil</title>
    <style>
        .datagrid{
            width: 35%;
        }
    </style>
</head>
<body>
    <?php require_once ('../view/menu_navegacion_us.php'); 
    
    while($row=mysqli_fetch_assoc($result)):?>
    <br>
    <br>
    <center>
        <div class="datagrid">
        <table border="1">
            <tr>
                <td>Id</td>
                <td><?php echo $row['id_usuario'];?></td>
            </tr>
            <tr>
                <td>Nombres</td>
                <td><?php echo $row['nombres'];?></td>
            </tr>
            <tr>
                <td>Apellidos</td>
                <td><?php echo $row['apellidos'];?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $row['email'];?></td>
            </tr>
            <tr>
                <td>Usaurio</td>
                <td><?php echo $row['usuario'];?></td>
            </tr>
            <tr>
                <td>Cedula</td>
                <td><?php echo $row['cedula'];?></td>
            </tr>
            <tr>
                <td>Pais</td>
                <td><?php echo $row['pais'];?></td>
            </tr>
            <tr>
                <td>Telefono</td>
                <td><?php echo $row['numero_cell'];?></td>
            </tr>
            <tr>
                <td>Saldo</td>
                <td><?php echo $row['cash'];?></td>
            </tr>
            
            
            
        </table>
        </div>
        
        
        <br>
        
        <a class="boton" href="modificar.php ? id=<?php echo $id_usuario?>">Actualizar datos</a><br><br>
        <a class="cargar" href="../saldo/cargar_cash">cargar saldo</a><br><br>
    <a class="boton" href="../index_.php">volver</a>
    </center>
    <?php
    endwhile;
    
    ?>

    <div>
        
    </div>
</body>
</html>