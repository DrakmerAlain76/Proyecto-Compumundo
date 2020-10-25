<?php
if(isset($_POST)){
	require_once 'conexion.php';
    if(!isset($_SESSION)){
		session_start();
    }
        $nombre_producto = isset($_POST['nombre_producto']) ? mysqli_real_escape_string($conn, $_POST['nombre_producto']) : false;
        $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($conn, $_POST['descripcion']) : false;
        $precio_producto = isset($_POST['precio_producto']) ? mysqli_real_escape_string($conn, $_POST['precio_producto']) : false;
        
        

        $errores = array();
        if(!empty($nombre_producto) /*&& !is_numeric($nombre_producto) && !preg_match("/[0-9]/", $nombre_producto)*/){
            $nombre_producto_validado = true;
        }else{
            $nombre_producto_validado = false;
            $errores['nombre_producto'] = "Los nombre_producto no es válido";
        }
        
        // Validar apellidos
        if(!empty($descripcion) /*&& !is_numeric($descripcion) && !preg_match("/[0-9]/", $descripcion)*/){
            $descripcion_validado = true;
        }else{
            $descripcion_validado = false;
            $errores['descripcion'] = "Los descripcion no son válido";
        }
        if(!empty($precio_producto)){
            $precio_producto_validado = true;
        }else{
            $precio_producto_validado = false;
            $errores['precio_producto'] = "Los precio_producto no son válido";
        }
        /*----------------------------------------*/
        $guardar_usuario = false;
        if(count($errores) == 0){
            $guardar_usuario = true;
            // Cifrar la contraseña
            
            //ACTUALIZAR
            $sql = "INSERT INTO productos VALUES(
                null, '$nombre_producto', '$descripcion', 0,'','',0,0, $precio_producto,''  );";
                
            $guardar = mysqli_query($conn, $sql);
            if($guardar){
                $_SESSION['completado'] = "El registro el producto se ha completado con éxito";
            }else{
                $_SESSION['errores']['general'] = "Fallo al guardar el producto!!";
            }
            
	    }else{
        $_SESSION['errores'] = $errores;
        var_dump($errores);
        ?>
        <h1><strong> NO SE REGISTRO PRODUCTO</strong></h1>
        
        <a href="insertar_producto.php">volver a insertar producto</a><br>
        <a href="index_.php">inicio</a>
        <?php
        //header('Location: formulario.php');
    }
    if(!$errores){
?>
    <h1><strong>SE REGISTRO CORREACTAMENTE EL PRODUCTO</strong></h1>
    
    <a href="insertar_producto.php">insertar nuevo producto</a><br>
    <a href="adm.php">inicio</a>
<?php
    }
}
?>