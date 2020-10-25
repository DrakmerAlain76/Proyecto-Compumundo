<?php
require_once 'conexion.php';
require_once 'helper/control_par.php';
// require_once 'helper/control_par.php';
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <!-- <link rel="stylesheet" type="text/css" href="style/main.css"> -->
    <link rel="stylesheet" type="text/css" href="style/fontawesome/css/all.min.css.css">
    <link rel="stylesheet" href="style/style.css">
    <title>Inicio</title>
</head>
<body>
   
    <div class="imagen_de_fondo">
        <ul class="log_ul">
            <!-- <li class="logs"><a href=""><i class="fab fa-facebook-square"></i></a></li> -->
            <li class="logs"><a href=""><img src="img/ico/fb.ico" alt=""></i></a></li>
            <li class="logs"><a href=""><img src="img/ico/ins.ico" alt=""></i></a></li>
            <li class="logs"><a href=""><img src="img/ico/yt.ico" alt=""></i></a></li>
        </ul>
        <section id="letra_imgp">
            <h1 class="let_p">RESERVA DE CONFERENCIAS VIRTUALES</h1>
            
        </section>
    </div>


    <div>
        <?php 
        require_once ('view/menu_navegacion.php');
        ?>
    </div>
    <!-- <br> -->
    <hr>


    <div id="contenido">
        <center>
        
            <?php
                $sql_cursos="SELECT id_curso,nombre_curso,expositor,comentario,costo,fecha_curso,horario FROM cursos";
                $lista = mysqli_query($conn, $sql_cursos);
                while($respuesta = mysqli_fetch_assoc($lista)){
                    echo "<section class=\"section_contenido\">";
                    echo "<center><h1 class=\"nombre_curso\">".$respuesta['nombre_curso']."</h1></center>";
                    echo "<labe1 class=\"expositor\">"."Expositor: ".$respuesta['expositor']."</labe1><br>";
                    echo "<labe1 class=\"comentario\">"."Comentario: ".$respuesta['comentario']."</labe1><br>";
                    echo "<label class=\"costo\">"."Costo: ".$respuesta['costo']."$"."</label><br>";
                    echo "<label class=\"horario\">"."horario: ".$respuesta['horario'].":00.</label><br>";
                    echo "<label class=\"fecha\">"."fecha de curso: ".$respuesta['fecha_curso']."</label><br><br>";
                    // LA RESERVA DEBE ESTAR AQUI, ESTO PARA CADA CURSO 
                    if($w==2){
                    ?>
                        <div class="pedido">
                            <a class="reservar" href="carrito/reserva_c.php? id=<?php echo $respuesta['id_curso']?>">reservar </a>
                            <a class="comprar" href="compra/comprar.php? id=<?php echo $respuesta['id_curso']?>">comprar </a>
                        </div>
                        <!-- <a style="margin:45%"  href="reservar.php">reservar</a> -->
                    <?php
                    }
                    echo "</section>";
                }
            ?>
        </center>
    <?php
        // if($w==2){
        //     echo "<a style=\"margin:45%\"  href=\"reservar.php\">reservar</a>";
        // }
    ?>
    </div>
    <div class="limpiador">
        </div>
    <!-- <article id="barra_lateral">
        <h4>mas...</h4>
        <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur numquam labore sint maxime ut eaque ab quam, cumque alias dolor autem suscipit tempora nobis explicabo porro officiis amet architecto quis!
        </p>
    
    </article> -->
    <!-- <footer id="pie_pagina">
        <hr>
        <label for="">pie de pagina</label>
    </footer> -->
</body>
</html>