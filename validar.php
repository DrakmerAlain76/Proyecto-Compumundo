<?php
if(isset($_POST)){
	require_once 'conexion.php';
    // if(!isset($_SESSION)){
	// 	session_start();
    // }
        $nombres = isset($_POST['nombres']) ? mysqli_real_escape_string($conn, $_POST['nombres']) : false;
        $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($conn, $_POST['apellidos']) : false;
        $password = isset($_POST['contracena']) ? mysqli_real_escape_string($conn, $_POST['contracena']) : false;
        $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, trim($_POST['email'])) : false;
        $usuario = isset($_POST['usuario']) ? mysqli_real_escape_string($conn, $_POST['usuario']) : false;
        $fecha_per = isset($_POST['fecha_per']) ? mysqli_real_escape_string($conn, $_POST['fecha_per']) : false;
        // $foto_per = isset($_POST['foto_per']) ? mysqli_real_escape_string($conn, $_POST['foto_per']) : false;
        

        $errores = array();
        if(!empty($nombres) && !is_numeric($nombres) && !preg_match("/[0-9]/", $nombres)){
            $nombre_validado = true;
        }else{
            $nombre_validado = false;
            $errores['nombres'] = "Los nombres no es válido";
        }
        
        // Validar apellidos
        if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
            $apellidos_validado = true;
        }else{
            $apellidos_validado = false;
            $errores['apellidos'] = "Los apellidos no son válido";
        }
        // Validar el email
        if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_validado = true;
        }else{
            $email_validado = false;
            $errores['email'] = "El email no es válido";
        }
        // Validar la contraseña
        if(!empty($password)){
            $password_validado = true;
        }else{
            $password_validado = false;
            $errores['password'] = "La contraseña está vacía";
        }
        //Validar usuario
        if(!empty($usuario)){
            $usuario_validado = true;
        }else{
            $usuario_validado = false;
            $errores['usuario'] = "El campo usuario está vacía";
        }
        //Validar fecha de persona
        if(!empty($fecha_per)){
            $fecha_per_validado = true;
        }else{
            $fecha_per_validado = false;
            $errores['fecha_per'] = "El campo fecha_per está vacía";
        }
        // Validar foto_per
        // if(!empty($foto_per)){
        //     $foto_per_validado = true;
        // }else{
        //     $foto_per_validado = false;
        //     $errores['foto_per'] = "El campo foto_per está vacía";
        // }

        //Validar numero_cell
        // if(!empty($numero_cell)){
        //     $numero_cell_validado = true;
        // }else{
        //     $numero_cell_validado = false;
        //     $errores['numero_cell'] = "El campo numero_cell está vacía";
        // }
        $guardar_usuario = false;
        if(count($errores) == 0){
            $guardar_usuario = true;
            // Cifrar la contraseña
            $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
            // INSERTAR USUARIO EN LA TABLA USUARIOS DE LA BBDD
            //ACTUALIZAR
            $sql = "INSERT INTO personas VALUES(
                null, '$nombres', '$apellidos', '$password_segura',  '$email', '$usuario', 3, '$fecha_per', '');";
                
            $guardar = mysqli_query($conn, $sql);
            if($guardar){
                $_SESSION['completado'] = "El registro se ha completado con éxito";
            }else{
                $_SESSION['errores']['general'] = "Fallo al guardar el usuario!!";
            }
            
	    }else{
        $_SESSION['errores'] = $errores;
        ?>
        <h1><strong> NO SE REGISTRO </strong></h1>
        <a href="formulario.php">volver a registrarse</a><br>
        <a href="index_.php">inicio</a>
        <?php
        //header('Location: formulario.php');
    }
    if(!$errores){
?>
    <h1><strong>SE REGISTRO CORREACTAMENTE</strong></h1>
    
    <a href="inicio_session.php">iniciar seccion</a><br>
    <a href="index_.php">inicio</a>
<?php
    }
}
?>