<?php
require_once("../conexion.php");
$id=$_REQUEST['id'];
echo "id=".$id;
$sql="SELECT id_usuario from usuarios where id_usuario='$id'";
$result=$conn->query($sql);//alternativa
if($reg=mysqli_fetch_array($result)){
    $sql=("DELETE FROM usuarios where id_usuario='$id'");
$result=$conn->query($sql);
echo "Se borró correctamente";
?>
<!-- <script language="javascript">
alert("ELIMINACIÓN EXITOSA);
</script> -->
<?php
    echo "<a href=\"../adm/lista_usuarios.php\">Regresar</a><br>";
    
    }else{
        echo"No hay elementos";
    }$conn->close();
?>