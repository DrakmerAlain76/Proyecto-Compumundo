<?php
require_once '../helper/control_par.php';
require_once '../conexion.php';
if(isset($_SESSION['usuario'])){
    $t=$_SESSION['usuario'];
    $usuario=$t['usuario'];
    $idusu=$t['id_usuario'];
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <!-- <link rel="stylesheet" href=""> -->
    <title>COMPRA</title>
</head>
<body>
    <!-- logo -->
    <!-- ESTE MENU ES PROVICIONAL -->
    <?php require_once ('../view/menu_navegacion_us.php'); ?>
    <div class="reservas_menu">
        <?php
            if(isset($_GET));
                $id_curso=$_GET['id'];
                $sql_cursos="SELECT id_curso,nombre_curso,expositor,comentario,costo,fecha_curso,horario FROM cursos WHERE id_curso=$id_curso";
            $lista = mysqli_query($conn, $sql_cursos);
            
            while($respuesta = mysqli_fetch_assoc($lista)){
                echo "<center><section class=\"section_contenido\">";
                echo "<center><h1 class=\"nombre_curso\">".$respuesta['nombre_curso']."</h1></center>";
                echo "<labe1 class=\"expositor\">"."Expositor: ".$respuesta['expositor']."</labe1><br>";
                echo "<labe1 class=\"comentario\">"."Comentario: ".$respuesta['comentario']."</labe1><br>";
                echo "<label class=\"costo\">"."Costo: ".$respuesta['costo']."$"."</label><br>";
                echo "<label class=\"horario\">"."horario: ".$respuesta['horario'].":00</label><br>";
                echo "<label class=\"fecha\">"."fecha de curso: ".$respuesta['fecha_curso']."</label><br><br>";
                /** LISTA DE LA COMPRA DE CASH*/
                    $consulta_de_reserva="SELECT * FROM reserva";
                        $a=0;
                        if($consulta0=mysqli_query($conn,$consulta_de_reserva)){
                                while($persona=mysqli_fetch_assoc($consulta0)){
                                    if($usuario==$persona['usuario_res']&&$respuesta['horario']==$persona['horarios']){//revisar
                                    $a=1;
                                    // $curso_reservado=$persona['id_res'];
                                    //var_dump($a);
                                    // die();
                                break;
                                }
                            }
                        }

                        $sql6="SELECT * FROM transaccion WHERE id_curso=$id_curso AND id_usuario=$idusu";
                        $guardar6 = mysqli_query($conn, $sql6);
                        // var_dump();
                        while($respuesta6 = mysqli_fetch_assoc($guardar6)){
                            $trans_c=$respuesta6['id_curso'];
                            $trans_u=$respuesta6['id_usuario'];
                            // $r=true;
                            $a=2;
                            // var_dump($a);
                            // die();
                        }


                        /*EN ESTA PARTE SE TIENE QUE HACER EL CONTROL DE LA COMPRA Y SI TIENE DINERO (CASH)*/
                        if($a==1){
                            echo "<b>Usted ya tiene reservada una plaza</b></br></br>";
                            // var_dump($respuesta['id_curso']);
                            ?>
                            <!-- TIENE QUE SER EL ID DE RESERVA  -->
                            <a class="reservar" href="../carrito/cancelar_reserva.php? id_p=<?php echo $persona['id_res']?>&id_c=<?php echo $respuesta['id_curso']?>">CANCELAR RESERVA</a><br><br>
                            <b style="color: red;">si pulsa CANCELAR RESERVA <br> se cancelara su reserva</b><br><br>
                            <a class="comprar" href="confirmar_compra.php? id_c=<?php echo $respuesta['id_curso']?>">COMPRAR</a>
                            <br><br>
                            <?php

                        }elseif($a==2)
                        {
                            echo "<h1>GRACIAS ya compro este curso</h1>";
                        }else{
                            ?>
                                <br>
                                <a class="comprar" href="confirmar_compra.php? id_c=<?php echo $respuesta['id_curso']?>">COMPRAR</a><br>
                            <?php
                        }

        }
            ?>
            <br><a class="boton" href="../index_.php">volver</a>
            </section></center>
    </div>

    
</body>
</html>