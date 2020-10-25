<?php
/*id usuario falta*/ 
require_once '../conexion.php';
require_once '../helper/control_par.php';

if(isset($_SESSION['usuario'])){
    $t=$_SESSION['usuario'];
    $id=$t['id_usuario'];
    $cash_us=$t['cash'];
}
// var_dump($cash_us);
// die();

// var_dump($_POST);
if(isset($_POST)){
    
        $codigo = isset($_POST['codigo']) ? mysqli_real_escape_string($conn, $_POST['codigo']) : false;
        
        $errores = array();

        if(!empty($codigo) && !is_numeric($codigo) && !preg_match("/[0-9]/", $codigo)){
            $codigo_validado = true;
        }else{
            $codigo_validado = false;
            $errores['codigo'] = "El código no es válido";
            // echo "<h1> NO se cargo correctamente</h1>";
        }

        $guardar_codigo = false;
        /* SE TIENE QUE HACER UNA COMPARACION DE DEL CASH DE LOS QUE ESTA EN LA PLATAFORMA Y DEL USUARIO*/

        $saldo_ver=false;
        $dispo_v=false;
        $saldo_db="SELECT * FROM saldo";
                $lista = mysqli_query($conn, $saldo_db);
                while($respuesta = mysqli_fetch_assoc($lista)){
                    /*REVISAR EL CONTROL PARA ESTA LA DIPONIBILIDAD*/
                    // var_dump($respuesta['cash']);
                    if($codigo==$respuesta['cash']){
                        // var_dump($respuesta['cash']);
                        // var_dump($codigo);
                        // die();
                        $saldo_ver=true;
                        $valor_codigo=$respuesta['valor'];
                        $id_saldo=$respuesta['id_saldo'];
                        // var_dump($id_saldo);
                        if($respuesta['disponible']=='si'){
                            $dispo_v=true;
                            // var_dump($dispo_v);die();
                        }
                    break;
                    }
                }
        $mensaje_de_dispo_v_falso="";
        $error_codigo_no="";
        $bandera=0;
        if(!$saldo_ver){
            $error_codigo_no="no existe codigo";
        }
        else{
            
            // $mensaje_de_dispo_v_falso="El codigo esta disponible";
            if($dispo_v==false){
                $mensaje_de_dispo_v_falso = "El codigo ya no esta disponible";
            }
            else{
                if(count($errores) == 0 && $saldo_ver==true && $dispo_v==true){
                    $guardar_codigo = true;
                    /*SI TIENE CASH SE DEBE SUMAR*/
                    // if(){

                    // }
                    $saldo_t=$cash_us+$valor_codigo;

                    // $sql="UPDATE usuarios SET cash='$valor_codigo' WHERE id_usuario=$id";
                    $sql="UPDATE usuarios SET cash='$saldo_t' WHERE id_usuario=$id";
                    $sql2="UPDATE saldo SET disponible='no' WHERE id_saldo=$id_saldo";

                    //actualizar la disponibilidad
                    // var_dump($sql);
                    // var_dump($sql2);
                    // die();    
                    $guardar = mysqli_query($conn, $sql);
                    $guardar2 = mysqli_query($conn, $sql2);
                    // var_dump($guardar2,$guardar);
                    // die();
                    if($guardar==true&&$guardar2==true){
                        // $_SESSION['completado'] = "El codigo inserto con éxito";
                        $bandera=1;
                    }else{
                        // $_SESSION['errores']['general'] = "Fallo al guardar codigo!!";
                        $bandera=2;
                    }
                }
            }
        }
        
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <title>Perfil</title>
</head>
<body>
    <?php require_once ('../view/menu_navegacion_us.php'); 

    if($bandera==1){
        echo  "El código insertó con éxito";
    }
    elseif($bandera==2){
        echo "Falló al guardar codigo!!";
    }else{
        echo $error_codigo_no;
    }
    if($errores){
        echo "<h1>".$errores['codigo']."</h1>";
    }
    
    echo $mensaje_de_dispo_v_falso;
    
    ?>
    <a href="../perfil/perfil">volver</a>


</body>
</html>