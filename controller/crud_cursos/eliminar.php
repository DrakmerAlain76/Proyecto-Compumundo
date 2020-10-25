<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../style/style.css">
    <title>Perfil</title>
</head>
<body>
<center>
    <br><br>
<?php
require_once("../../conexion.php");
$id=$_REQUEST['id'];
$nombre_curso_el="SELECT nombre_curso,expositor,fecha_curso from cursos where id_curso='$id'";
$sql1=mysqli_query($conn,$nombre_curso_el);
$re=mysqli_fetch_array($sql1);
//eliminar con el expositor
echo "Se borró correctamente el curso: <b>".$re['0']."</b> del expositor <b>".$re['1']."</b> del dia <b>".$re['2']."</b><br/>";

$sql="SELECT id_curso from cursos where id_curso='$id'";
$result=$conn->query($sql);//alternativa
if($reg=mysqli_fetch_array($result)){
    $sql=("DELETE FROM cursos where id_curso='$id'");
$result=$conn->query($sql);
// echo "Se borró correctamente";
?>
<!-- <script language="javascript">
alert("ELIMINACIÓN EXITOSA);
</script> -->
<?php
    echo "<br><br><a class=\"boton\" href=\"../../adm/administrar_coferencias.php\">Regresar</a><br>";
    
    }else{
        echo"<h1>No hay elementos<h1><br><br>";
        echo "<a class=\"boton\" href=\"../../adm/administrar_coferencias.php\">Regresar</a><br>";
    }$conn->close();
?>
</center>
</body>
</html>