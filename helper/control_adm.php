<?php
// require_once '../conexion.php';
if(isset($_SESSION['usuario'])){
        $t=$_SESSION['usuario'];
        $usuario=$t['usuario'];
        $tipo=$t['tipo'];
    }
    if($tipo!=1)
    {
        header('Location: ../index_.php');
    }
?>