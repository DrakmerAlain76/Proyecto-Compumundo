<?php
require_once '../conexion.php';
// require_once 'helper/control_adm.php';
$sql="SELECT * FROM reserva";
$listado=$conn->query($sql);
// var_dump($listado);die;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/style1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* *{
            font-family: Arial;
        }
        body{
            background-color: #333333;
            color: #f5f5f5;
            
        }
        center{
            padding-top: 10%;
        } */
    </style>
    <title>LISTA DE RESERVAS</title>
</head>
<body>
    <center>
        <h1>LISTA DE RESERVAS</h1><br>
        <a class="boton"  href="../graficos/index0.php">Gráfico barra</a>
        <a class="boton"  href="../graficos/index1.php">Gráfico torta</a><br>
        <input class="boton" type="submit" name="Imprimir" value="Imprimir" onclick="location.href='../controller/reportes_reservaciones.php'">
        
        <a class="boton"  href="../panel_de_control.php">volver</a><br>
    <div class="datagrid">
    <table >
        
            <thead>
                <tr>
                    <th>ID RESERVAS</th>
                    <th>USUARIO</th>
                    <th>CURSO</th>
                    <th>FECHA DE RESERVA</th>
                    <th>HORA DE RESERVA</th>
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
                            <td><?php echo $row['id_res'];?></td>
                            <td><?php echo $row['usuario_res'];?></td>
                            <td><?php echo $row['curso_res'];?></td>
                            <td><?php echo $row['fecha_res'];?></td>
                            <td><?php echo $row['hora_res'];?></td>
                        </tr>
                <?php
                        $ban++;
                        }
                        else{?>
                            <tr class="alt">
                                <td><?php echo $row['id_res'];?></td>
                                <td><?php echo $row['usuario_res'];?></td>
                                <td><?php echo $row['curso_res'];?></td>
                                <td><?php echo $row['fecha_res'];?></td>
                                <td><?php echo $row['hora_res'];?></td>
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