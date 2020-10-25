<?php 
require_once '../conexion.php';
// require_once 'helper/control_adm.php';
    $sql="SELECT * FROM cursos";
    // $sql="SELECT id_usuario,nombres,apellidos,usuario,email,tipo,cedula,pais,numero_cell,genero,Fech_Nac FROM usuarios";
    $listado=$conn->query($sql);
    //alternativa
    $listado_c=mysqli_query($conn,$sql)
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/style1.css">
    <style>
        h1{
            color: #A65B1A;
        }
        /* body{
            background-color: #333333;
            color: #f5f5f5;
        }
        center{
            padding-top: 5%;
        } */
        
    </style>
    <title>Documento</title>
</head>
<body>
    
<center>
        <form method="post" action="../controller/crud_cursos/insertar.php"> 
            <br><h1 class="titulo_f">Nuevo Curso</h1>
            <br>
            <input type="text" placeholder="nombre del curso" required name="nombre_curso"><br>
            <input type="text" placeholder="expositor" required name="expositor"><br>
            <input type="int" placeholder="costo" required name="costo"><br>
            <input type="int" placeholder="cupos" required name="cupos"><br>
            <input type="int" placeholder="horario" required name="horario"><br>
            <textarea  required name="comentario">descripcion </textarea><br> 
            <input type="date" placeholder="fecha curso" required name="fecha_curso"><br>
            <input class="boton" type="submit" name="Registrar" value="Registrar">
            <input class="boton" type="reset" name="Limpiar" value="Limpiar">
        </form>
        <input class="boton" type="submit" name="Imprimir" value="Imprimir" onclick="location.href='../controller/reportes_cursos.php'">
        <!-- <input type="submit" name="Buscar" value="Buscar" onclick="location.href='buscar.php'"> --><!--implementar lo que es buscar-->
        <a class="boton" href="../panel_de_control.php">volver</a><br>
<div class="datagrid">
<table >
<thead>
                <tr>
                    <th>ID</th>
                    <th>CURSOS</th>
                    <th>EXPOSITOR</th>
                    <th>COSTO</th>
                    <th>CUPOS</th>
                    <th>FECHA</th>
                    <th>RESERVAS</th>
                    <th>HORARIO</th>
                    <th>ELIMINAR</th>
                    <th>MODIFICAR</th>
                </tr>
            </thead>
    <tbody>
        <?php
                if($listado->num_rows>0){
                    $ban=0;
                    while ($row=$listado_c->fetch_assoc()){
                        if ($ban%2==0) {
                        ?>
                            <tr>
                                <td><?php echo $row['id_curso'];?></td>
                                <td><?php echo $row['nombre_curso'];?></td>
                                <td><?php echo $row['expositor'];?></td>
                                <td><?php echo $row['costo'];?></td>
                                <td><?php echo $row['cupos'];?></td>
                                <td><?php echo $row['fecha_curso'];?></td>
                                <td><?php echo $row['reservas'];?></td>
                                <td><?php echo $row['horario'];?></td>
                                <td><a href="../controller/crud_cursos/modificar.php? id=<?php echo $row['id_curso'];?>"><img src="../img/ico/editar.ico" alt=""></a></td>
                                <td><a href="../controller/crud_cursos/eliminar.php? id=<?php echo $row['id_curso'];?>"><img src="../img/ico/eliminar.ico" alt=""></a></td>
                            </tr>
                        <?php        
                            $ban++;
                        }
                        else{   ?>
                            <tr class="alt">
                                <td><?php echo $row['id_curso'];?></td>
                                <td><?php echo $row['nombre_curso'];?></td>
                                <td><?php echo $row['expositor'];?></td>
                                <td><?php echo $row['costo'];?></td>
                                <td><?php echo $row['cupos'];?></td>
                                <td><?php echo $row['fecha_curso'];?></td>
                                <td><?php echo $row['reservas'];?></td>
                                <td><?php echo $row['horario'];?></td>
                                <td><a href="../controller/crud_cursos/modificar.php? id=<?php echo $row['id_curso'];?>"><img src="../img/ico/editar.ico" alt=""></a></td>
                                <td><a href="../controller/crud_cursos/eliminar.php? id=<?php echo $row['id_curso'];?>"><img src="../img/ico/eliminar.ico" alt=""></a></td>
                            </tr>
                            
                        <?php $ban++; }
                
                        
                    }
                }  
                else{
                    echo "No existen datos en la tabla";
                }
                $conn->close();
                ?>
            </tbody>
            
        </table>
</div>

            
        </body>
        </html>
        
        
        
