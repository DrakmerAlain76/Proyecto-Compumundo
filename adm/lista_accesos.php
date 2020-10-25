<?php 
    require_once '../conexion.php';
    require_once '../helper/control_adm.php';
    $sql="SELECT * FROM accesos";
    $listado=$conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/style1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA DE ACCESOS</title>
    <style>
        /* *{
            font-family: Arial;
        }
        body{
            background-color: #333333;
            color: #f5f5f5;
            
        } */
    </style>
</head>
<body>
    <center>
        <br>
        <br>
        <h1>LISTA DE ACCESOS</h1>
        <a  class="boton" href="../panel_de_control.php">volver</a>
        <input class="boton" type="submit" name="Imprimir" value="Imprimir" onclick="location.href='../controller/reportes_accesos.php'"></br>
        <div class="datagrid">
        <table>
            <thead>
                <tr>
                    <th>USUARIO</th>
                    <th>FECHA DE ACCESO</th>
                    <th>HORA DE ACCESO</th>
                    <th>TIPO</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($listado->num_rows>0){
                    $ban=0;
                    while ($row=$listado->fetch_assoc()){
                        if ($ban%2==0) {
                ?>
                <tr>
                    <td><?php echo $row['nuser'];?></td>
                    <td><?php echo $row['fecha_a'];?></td>
                    <td><?php echo $row['hora_a'];?></td>
                    <td><?php echo $row['tipo'];?></td>
                </tr>
                <?php

                    $ban++;
                    }
                    else{?>
                        <tr class="alt">
                            <td><?php echo $row['nuser'];?></td>
                            <td><?php echo $row['fecha_a'];?></td>
                            <td><?php echo $row['hora_a'];?></td>
                            <td><?php echo $row['tipo'];?></td>
                        </tr>
                    <?php 
                    $ban++;}
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
    </center>
</body>
</html>