<?php
if(isset($_POST)){
	require_once '../conexion.php';
        $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conn, $_POST['nombre']) : false;
        $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($conn, $_POST['apellidos']) : false;
        $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, trim($_POST['email'])) : false;
        
        /*insercion de nuevos campos*/ 
        $usuario = isset($_POST['usuario']) ? mysqli_real_escape_string($conn, $_POST['usuario']) : false;
        $cedula = isset($_POST['cedula']) ? mysqli_real_escape_string($conn, $_POST['cedula']) : false;
        $pais = isset($_POST['pais']) ? mysqli_real_escape_string($conn, $_POST['pais']) : false;
        $numero_cell = isset($_POST['numero_cell']) ? mysqli_real_escape_string($conn, $_POST['numero_cell']) : false;

        $errores = array();
        if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
            $nombre_validado = true;
        }else{
            $nombre_validado = false;
            $errores['nombre'] = "El nombre no es válido";
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
        
        //Validar usuario
        if(!empty($usuario)){
            $usuario_validado = true;
        }else{
            $usuario_validado = false;
            $errores['usuario'] = "El campo usuario está vacía";
        }
        //Validar cedula
        if(!empty($cedula)){
            $cedula_validado = true;
        }else{
            $cedula_validado = false;
            $errores['cedula'] = "El campo cedula está vacía";
        }
        //Validar pais
        if(!empty($pais)){
            $pais_validado = true;
        }else{
            $pais_validado = false;
            $errores['pais'] = "El campo pais está vacía";
        }

        //Validar numero_cell
        if(!empty($numero_cell)){
            $numero_cell_validado = true;
        }else{
            $numero_cell_validado = false;
            $errores['numero_cell'] = "El campo numero_cell está vacía";
        }
        $guardar_usuario = false;
        $id=$_REQUEST['id'];
        // var_dump($errores);
        //     die();
        
        if(count($errores) == 0){
            $guardar_usuario = true;
            //ACTUALIZAR
            $sql1="UPDATE usuarios SET nombres='$nombre',apellidos='$apellidos',usuario='$usuario',email='$email',tipo=2,cedula='$cedula',pais='$pais',numero_cell='$numero_cell' WHERE id_usuario=$id";
            $guardar = mysqli_query($conn, $sql1);
            echo "se actualizo";
            echo "<a href=\"../adm/lista_usuarios.php\">Regresar</a><br>";
        }else{
            echo "error no se actualizo";
            echo "<a href=\"../adm/lista_usuarios.php\">Regresar</a><br>";
        }
    
}

?>  