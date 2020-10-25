<?php
require_once("conexion.php");
$id=$_REQUEST['id'];
echo "ID".$id;
$sql="SELECT * FROM productos where id_productos='$id'";
$result=$conn->query($sql);
?>
<!DOCTYPE html>
<html><head>
    <title>

</title>
</head>
<body>
    <?php
    while($row=mysqli_fetch_assoc($result)){
    ?>
    <form method="post" action="actualizar.php">
        <table border="1">
            <tr>
                <td>Id</td>
                <td><input type="text" name="id" value='<?php echo $row['id_productos'];?>'></td>
                
            </tr>
            <tr>
                <td>nombre_producto</td>
                <td><input type="text" name="nombre_producto" value='<?php echo $row['nombre_producto'];?>'></td>
            </tr>
            <tr>
                <td>descripcion</td>
                <td><input type="text" name="descripcion"value='<?php echo $row['descripcion'];?>'></td>
            </tr>
            <tr>
                <td>Precio</td>
                <td><input type="text" name="precio_producto" value='<?php echo $row['precio_producto'];?>'></td>
            </tr>
            
            
            
        </table>
        <input type="submit" value="Modificar">
    </form>
<?php
}
?>
</body>
</html>
