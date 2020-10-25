<?php

require_once 'conexion.php';

if(isset($_POST)){
	
	$email = trim($_POST['email']);
	$password = $_POST['password'];

    $sql = "SELECT * FROM personas WHERE correo = '$email'";
    // var_dump($sql);
    $login = mysqli_query($conn, $sql);
    // var_dump($login);
    // die();
    if($login && mysqli_num_rows($login) == 1){
		$usuario = mysqli_fetch_assoc($login);
        
		$verify = password_verify($password, $usuario['contrasena']);
        
        if($verify){
            
            $_SESSION['usuario'] = $usuario;
            $nuser= $usuario['usuario'];
            $tipo= $usuario['cargo'];
            //INSERCION DE LA TABLA ACCESOS
            // $sql = "INSERT INTO accesos VALUES(null, '$nuser', CURDATE(),CURRENT_TIME() , '$tipo');";
            // $guardar = mysqli_query($conn, $sql);
            
            if($tipo==1){    
                header('Location: adm.php');
            }
            elseif($tipo==2){
                header('Location: encargado.php');
            }elseif($tipo==3){ 
                header('Location: index_.php');
            }

            //*/*/
        }else{
            $_SESSION['error_login'] = "Login incorrecto!!";
            header('Location: registrarse.php');
		}
	}else{
        $_SESSION['error_login'] = "Login incorrecto!!";
        header('Location: registrarse.php');
	}
}

