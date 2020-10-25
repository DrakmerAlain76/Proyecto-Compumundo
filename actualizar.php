<?php
if(isset($_POST)){
	require_once 'conexion.php';
        $nombre_producto = isset($_POST['nombre_producto']) ? mysqli_real_escape_string($conn, $_POST['nombre_producto']) : false;
        $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($conn, $_POST['descripcion']) : false;
        $precio_producto = isset($_POST['precio_producto']) ? mysqli_real_escape_string($conn, trim($_POST['precio_producto'])) : false;
        
        

        $errores = array();
        if(!empty($nombre_producto) ){
            $nombre_producto_validado = true;
        }else{
            $nombre_producto_validado = false;
            $errores['nombre_producto'] = "El nombre_producto no es válido";
        }
        
        // Validar apellidos
        if(!empty($descripcion)){
            $descripcion_validado = true;
        }else{
            $descripcion_validado = false;
            $errores['descripcion'] = "Los descripcion no son válido";
        }
        // Validar el email
        if(!empty($precio_producto) ){
            $precio_producto_validado = true;
        }else{
            $precio_producto_validado = false;
            $errores['precio_producto'] = "El precio_producto no es válido";
        }
        
       
        $guardar_usuario = false;
        $id=$_REQUEST['id'];
        // var_dump($errores);
        //     die();
        
        if(count($errores) == 0){
            $guardar_usuario = true;
            //ACTUALIZAR
            $sql1="UPDATE productos SET nombre_producto='$nombre_producto',descripcion='$descripcion',precio_producto=$precio_producto WHERE id_productos=$id";
            $guardar = mysqli_query($conn, $sql1);
            ///-----------------------------------
            echo "se actualizo";
            echo "<a href=\"productos.php\">Regresar</a><br>";
        }else{
            echo "error no se actualizo";
            echo "<a href=\"productos.php\">Regresar</a><br>";
        }
    
}

?>  