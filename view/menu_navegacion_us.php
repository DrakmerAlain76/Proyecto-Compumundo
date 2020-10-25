<?php 
// require_once ('../conexion.php');
?>

<nav id="navegacion">
            <ul class="ul_nav">
                <li class="li_nav"><a class="lista" href="../index_.php">inicio</a></li>
                <li class="li_nav"><a class="lista" href="">novedades</a></li>
                <li class="li_nav"><a class="lista" href="">acerca de nosotros</a></li>
                <?php if(isset($_SESSION['usuario'])){ 
                    $nombre=$_SESSION['usuario'];
                    
                    ?>
                    
                    <li class="li_nav"><a class="lista" href="../carrito/lista_con_usuario.php">mis cursos</a></li>
                    <li class="li_nav"><a class="lista" href="../perfil/perfil.php">mi perfil</a></li>
                    <!-- hacer el cambio de genero en esta parte -->
                    <li class="li_nav"><a class="lista1" href="cerrar_session.php">cerrar sesión</a></li>
                    <li class="li_nav lista1" >Bienvenid@<?php echo " ".$nombre['nombres']." ".$nombre['apellidos']?></li>
                <?php
                    }
                    else{
                        echo " algo esta ";
                ?>
                <?php }?>
            </ul>
        </nav>