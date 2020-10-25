<?php
require_once '../conexion.php';
require_once '../helper/control_par.php';
if(isset($_SESSION['usuario'])){
    $t=$_SESSION['usuario'];
    $usuario=$t['usuario'];
}
$conf=$_GET['conf'];//confirmacion
$id_us=$_GET['id_us'];//id usuario
$id_cu=$_GET['id_cu'];//curso para comprar

/*CONSULTA DE SI EXISTE RESERVACION*/
$d=false;
$sql1="SELECT * FROM reserva";
    $lista = mysqli_query($conn, $sql1);
        while($respuesta = mysqli_fetch_assoc($lista)){
            if($id_cu==$respuesta['id_curso']){
                // var_dump();
                $id_reserva=$respuesta['id_res'];
                $descuento=$respuesta['descuento'];
                $dia_pedido=$respuesta['fecha_res'];
                $nombre_curso=$respuesta['curso_res'];
                // var_dump($nombre_curso);
                $id_curso=$respuesta['id_curso'];
                $d=true;
            }
        }
        //*1
// var_dump($lista,$d);
$ban=false;//bandera de comprobacion de compra

/* AUMENTO DE RESERVA (curso comprado debe añadir tabla)*/

    $sql_cursos="SELECT * FROM cursos WHERE id_curso=$id_cu";
    $result=mysqli_query($conn,$sql_cursos);
    $row=$result->fetch_assoc();
    $numero_reserva=(int)$row['reservas'];

/* VERIFICACION DE CASH O SALDO */
$sql4="SELECT * FROM usuarios WHERE id_usuario=$id_us";
$guardar4 = mysqli_query($conn, $sql4);
$tiene_cash=false;
$mensaje="";
//Consulta si tiene cash el usuario 
while($respuesta2 = mysqli_fetch_assoc($guardar4)){
    $cash_usuario=$respuesta2['cash'];
    if ($respuesta2['cash']>=0) {
        $tiene_cash=true;
    }
}

    $sql5="SELECT * FROM cursos WHERE id_curso=$id_cu";
    $guardar5 = mysqli_query($conn, $sql5);
    while($respuesta3 = mysqli_fetch_assoc($guardar5)){
        $costo_curso=$respuesta3['costo'];
        $nom_cur=$respuesta3['nombre_curso'];
        $cos_cur=$respuesta3['costo'];
        
    }
    $r=false;
    $sql6="SELECT * FROM transaccion WHERE id_curso=$id_cu AND id_usuario=$id_us";
    $guardar6 = mysqli_query($conn, $sql6);
    // var_dump();
    while($respuesta6 = mysqli_fetch_assoc($guardar6)){
        $trans_c=$respuesta6['id_curso'];
        $trans_u=$respuesta6['id_usuario'];
        $r=true;
        
    }
        

    /*CONFIRMAR SI COMPRO O NO*/
    if($r){
        $mensaje="USTED YA COMPRO ESTE CURSO";
    }else
    {

    

/* CONFIRMAR LA COMPRA RESTANDO EL SALDO*/
    if($tiene_cash){
        //Si tiene cash puede comprar

        //Comparar si puede comprar el curso
        //costo del curso
//  $sql5="SELECT * FROM cursos WHERE id_curso=$id_cu";
//     $guardar5 = mysqli_query($conn, $sql5);
//     while($respuesta3 = mysqli_fetch_assoc($guardar5)){
//         $costo_curso=$respuesta3['costo'];
//         $nom_cur=$respuesta3['nombre_curso'];
//         $cos_cur=$respuesta3['costo'];
        
//     }
        
        
        if($cash_usuario>=$costo_curso){
            // var_dump($cash_usuario,$costo_curso);
            //////////////////////////
            //REVISAR QUE TENGA RESERVA
            $cash_total=$cash_usuario-$costo_curso;
            $sql4="UPDATE usuarios SET cash=$cash_total WHERE id_usuario=$id_us";
            $guardar3 = mysqli_query($conn, $sql4);
            if($d){
                                
                //transaccion

                $sql2="INSERT INTO transaccion VALUES(null, CURDATE(), CURRENT_TIME(),'$dia_pedido',$descuento,'$nombre_curso',$costo_curso,$id_curso,$id_us);";
                $sql3="UPDATE reserva SET comprado='si' WHERE id_res=$id_reserva";
                
                ////////
                /*nueva consulta*/
                $numero_reserva++;
                $reserva1="UPDATE `cursos` SET `reservas`=$numero_reserva WHERE id_curso=$id_cu";//del curso  
                $consulta2 = mysqli_query($conn, $reserva1);
                // var_dump($consulta2);
                // die();
                ////////

                $guardar1 = mysqli_query($conn, $sql2);
                $guardar2 = mysqli_query($conn, $sql3);
                $mensaje="Compra con exito";
                $ban=true;
            }
            //SI NO TIENE RESERVA 
            else{

                $sql2="INSERT INTO transaccion VALUES(null, CURDATE(), CURRENT_TIME(),'0000-00-00',0,'$nom_cur',$cos_cur,$id_cu,$id_us);";//transaccion
                
                ////////
                /*nueva consulta*/
                $numero_reserva++;
                $reserva1="UPDATE `cursos` SET `reservas`=$numero_reserva WHERE id_curso=$id_cu";//del curso  
                $consulta2 = mysqli_query($conn, $reserva1);
                
                ////////
                $guardar1 = mysqli_query($conn, $sql2);
                // die();

                $mensaje="Compra con exito";
                $ban=true;
            }
            //////////////////////////

        }else{
            $mensaje="no tiene suficiente saldo para este curso";
        }

    }else{
        $mensaje="no tiene saldo";
    }

if(!$ban){
    $mensaje="no tiene suficiente saldo para este curso";
}

}

// var_dump($conf);
// var_dump($id_us);
// var_dump($id_cu);

// die();

/* ESTO EN LA BASE DE DATOS*/
/* SALE UN MENSAJE DE CONFIRMACION*/




?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <title>TRANFERENCIA</title>
</head>
<body>
<?php require_once ('../view/menu_navegacion_us.php'); ?>
    <center>
        <!-- <h1>USTED COMPRO EL CURSO .. </h1> -->
        <!-- hacer los mensajes de confirmacion -->
        <?php
        echo "<br>"."<h1>".$mensaje."</h1>";
        
        ?>
        <br><br><a class="boton" href="../index_.php">volver</a>
    </center>
</body>
</html>




