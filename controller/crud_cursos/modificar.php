<?php
require_once("../../conexion.php");
$id=$_REQUEST['id'];
// echo "ID".$id;
$sql="SELECT * FROM cursos where id_curso='$id'";
$result=$conn->query($sql);
//alternativa
?>
<!DOCTYPE html>
<html>
    <head>
    <title>modificar</title>
    <link rel="stylesheet" type="text/css" href="../../style/style.css">
    <link rel="stylesheet" type="text/css" href="../../style/style1.css">
    <style>
        .datagrid{
            width: 25%;
        }
        .datagrid td tr{

        }
        input[type="text"],
        input[type="email"],
        button{
            /* display:block; */
            padding-top: 10px;
        }
        h1{
            color: #A65B1A;
        }
    </style>
</head>
<body>
    <?php
    while($row=mysqli_fetch_assoc($result)){
    ?>
    <form method="post" action="actualizar.php">
        <center>
        <br>
        <h1>MODIFICAR CURSO</h1>
        <div class="datagrid">
        <table border="1">
            <tr>
                <td>Id</td>
                <td><input type="text" name="id_curso" value='<?php echo $row['id_curso'];?>'></td>
                <!-- <td><label value='<?php //echo $row['id'];?>'><label for=""></label></td> -->
            </tr>
            <tr>
                <td>Nombre curso</td>
                <td><input type="text" name="nombre_curso"value='<?php echo $row['nombre_curso'];?>'></td>
            </tr>
            <tr>
                <td>Expositor</td>
                <td><input type="text" name="expositor" value='<?php echo $row['expositor'];?>'></td>
            </tr>
            <tr>
                <!-- configurar el tamaño de la caja -->
                <td>Comentario</td>
                <td><textarea  required name="comentario"><?php echo $row['comentario'];?></textarea></td>
                <!-- <td><input type="text" name="comentario" value='<?php //echo $row['comentario'];?>'></td>tareatex -->
            </tr>
            <tr>
                <td>Costo</td>
                <td><input type="text" name="costo" value='<?php echo $row['costo'];?>'></td>
            </tr>
            <tr>
                <td>Cupos</td>
                <td><input type="text" name="cupos" value='<?php echo $row['cupos'];?>'></td>
            </tr>
            <tr>
                <td>horario</td>
                <td><input type="text" name="horario" value='<?php echo $row['horario'];?>'></td>
            </tr>
            <tr>
                <td>fecha curso</td>
                <td><input type="date" name="fecha_curso" value='<?php echo $row['fecha_curso'];?>'></td>
            </tr>
            
        </table>
        </div>
        <input class="boton" type="submit" value="Modificar"><br>
        <br><a class="boton" href="../../adm/administrar_coferencias.php">volver</a>
        </center>
    </form>
<?php
}
?>
</body>
</html>
