<?php

$conn=new mysqli("localhost","root","","INF756_compu_a")or die("Conexión Fallida ".$conn->connect_error);

if(!isset($_SESSION)){
	session_start();
}
?>
