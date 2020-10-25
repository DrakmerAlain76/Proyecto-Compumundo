<?php
require_once("conexion.php");
$id=$_REQUEST['id'];
echo "id=".$id;
$sql="SELECT id_productos from productos where id_productos='$id'";
$result=$conn->query($sql);//alternativa
if($reg=mysqli_fetch_array($result)){
    $sql=("DELETE FROM productos where id_productos='$id'");
$result=$conn->query($sql);
echo "Se borró correctamente el producto";
?>
<!-- <script language="javascript">
alert("ELIMINACIÓN EXITOSA);
</script> -->
<?php
    echo "<a href=\"productos.php\">Regresar</a><br>";
    
    }else{
        echo"No hay elementos";
    }$conn->close();
?>