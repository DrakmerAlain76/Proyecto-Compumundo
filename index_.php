<?php
require_once 'conexion.php';
$w=0;
if(isset($_SESSION['usuario'])){
        $t=$_SESSION['usuario'];
        $nombre=$t['nombres'];
        $apellido=$t['apellidos'];
        $usuario=$t['usuario'];
        $tipo=$t['cargo'];
    if($tipo==1){
        $w=1;
    }
    elseif($tipo==2){
            $w=2;
    }else{
        $w=0;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Documento</title>
</head>
<body>
    <header>
        <!-- <img src="img/" alt="logo"> -->
        <div id="inicio">
            <h1 id="logo_prin">COMPUMUNDO</h1>
            <!-- <input class="buscar_ini" type="text" placeholder="buscar" name="buscar">
            <input class="buscar_ini" type="submit" placeholder="buscar" name="buscar"> -->
        <div id="inicio_log">
            <img src="img/ico/fb.ico" alt="">
            <img src="img/ico/ins.ico" alt="">
            <img src="img/ico/yt.ico" alt="">
        </div>
        </div>
        <div class="limpiador"></div>
    </header>
        <nav>
        <ul class="menu_ul">
            <li class="menu_li"><a class="menus"href="">INICIO</a></li>
            <li class="menu_li"><a class="menus"href="">NOSOTROS</a></li>
            <li class="menu_li"><a class="menus"href="">VENTAS</a></li>
            <li class="menu_li"><a class="menus"href="">CARRITO</a></li>
            
            <?php if(isset($_SESSION['usuario'])){ ?>
                <?php if($tipo==3):  ?>
                    
                <li class="menu_li"><a class="menus" href="">mi perfil</a></li>
                    <?php endif; ?>
                    <!-- hacer el cambio de genero en esta parte -->
                    <li class="menu_li"><a class="menus" href="cerrar.php">cerrar seccion</a></li>
                <li class="menu_li mesus">Bienvenid@<?php echo " ".$nombre." ".$apellido?></li>
                <?php }else{?>
                    <li class="menu_li"><a class="menus"href="registrarse.php">REGISTRARSE</a></li>
            <li class="menu_li"><a class="menus"href="inicio_session.php">INICIO DE SESION</a></li>
                        <?php }?>
            <!--  -->
            <!-- <li></li> -->
        </ul>
        </nav>
    <section class="cuerpo">
        <div id="vid_pr">
            <video class="imagen_principal" src="video/presentacion" autoplay loop muted></video>

        </div>
    <section class="iconos_c">
        <a class="ico_a"href=""><img class="ico_c"src="img/ico/auri.jpg" alt="">auriculares</a>
        <a class="ico_a"href=""><img class="ico_c"src="img/ico/control.jpg" alt="">controles</a>
        <a class="ico_a"href=""><img class="ico_c"src="img/ico/gabinete.jpg" alt="">gabinete</a>
        <a class="ico_a"href=""><img class="ico_c"src="img/ico/mouse.jpg" alt="">mouse</a>
        <a class="ico_a"href=""><img class="ico_c"src="img/ico/pantallas.jpg" alt="">pantallas</a>
        <a class="ico_a"href=""><img class="ico_c"src="img/ico/tarjeta.jpg" alt="">tarjetas</a>
        <a class="ico_a"href=""><img class="ico_c"src="img/ico/tecla.jpg" alt="">teclados</a>

    </section>


    </section>
    <article>
        
        <h3>sobre nosotros</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto amet tempore beatae pariatur, necessitatibus modi sit eius rem cupiditate a. Odit ab magnam recusandae ipsa sapiente maxime totam ullam ex.</p>
    </article>
    <footer>
        <p>
            &copy Ingenieria de Software 2020
        </p>
    </footer>
</body>
</html>