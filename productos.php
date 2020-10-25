<?php
require_once 'conexion.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    
<center>
    <h1>listada de productos</h1>
    <table border="1">
        <tr>
            <th>Nombre producto</th>
            <th>Descripcion</th>
            <th>Costo</th>
            <th>MODIFICAR</th>
            <th>ELIMINAR</th>
        </tr>
        <?php
        $sql="SELECT * FROM productos";
        
        $listado=$conn->query($sql);
        //alternativa
        // $listado_c=mysqli_query($conn,$sql);
        if($listado->num_rows>0){
            while ($row=$listado->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row['nombre_producto'];?></td>
            <td><?php echo $row['descripcion'];?></td>
            <td><?php echo $row['precio_producto'];?></td>
            <td><a href="modificar.php? id=<?php echo $row['id_productos'];?>">modificar</td>
            <td><a href="eliminar.php? id=<?php echo $row['id_productos'];?>">eliminar</td>
        </tr>
                    <?php } }?>
    </table>

    <a href="adm.php">volver</a>
</center>


</body>
</html>