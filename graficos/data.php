
<?php
header('Content-Type: application/json');
include ('../conexion.php');
// $conn = mysqli_connect("localhost","root","","inf755_basedd_t");///modificar
//base de datos solo de las tablas a usar
$sqlQuery = "SELECT id_curso,nombre_curso,reservas FROM cursos ORDER BY id_curso";///modificar
//consulta a la base de datos
$result = mysqli_query($conn,$sqlQuery);
// listado de las tablas
//tres atributos (id_estudiante , nombre , numero o marcas)
$data = array();
foreach ($result as $row) {
	$data[] = $row;
	// var_dump($row);//muestra los valores para la verificacion
}

mysqli_close($conn);
//cierra base de datos
echo json_encode($data);
//envia datos JSON

?>



