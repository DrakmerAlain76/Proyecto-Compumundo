<?php
	require_once ('conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style/style.css">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- <style>
        *{
            font-family: Arial;
        }
        body{
            background-color: #333333;
            color: #f5f5f5;
        }
        center{
            padding-top: 5%;
        }
    </style> -->
</head>
<body>
	


<center>
	<h1>BUSCAR</h1>
	<form method="POST" action="buscar.php">
		<input type="text" name="buscar" placeholder="Buscar" required>
		<select name="col">
			<option value="nombres">Nombre</option>
			<option value="apellidos">Apellido</option>
			<option value="usuario">Usuario</option>
			<option value="tipo">Tipo</option>
		</select>
		<input class="boton" type="Submit" name="btn" value="Buscar">
	</form><br>
	<?php
		if(isset($_POST["btn"]))
		{
			$busca=$_POST["buscar"];//Texto a buscar
			$columna=$_POST["col"]; //Opcion a Buscar
			$sql="select * from usuarios WHERE $columna LIKE '%$busca%'";
		}
		else
		{
			$sql="select * from usuarios";
		}

		$resul=mysqli_query($conn,$sql);

		if($resul->num_rows>0)
		{
	?>
	<table border="1">
		<thead>
			<th>ID</th>
			<th>NOMBRE</th>
			<th>APELLIDO</th>
			<th>USUARIO</th>
			<th>TIPO</th>
			<th>CEDULA</th>
			<th>PAIS</th>
			<th>TELEFONO</th>
			<!-- <th>GENERO</th> -->
			<!-- <th>FECHA DE NACIEMIENTO</th> -->

		</thead>
		<tbody>
	<?php
		
		while($row=$resul->fetch_array())
		{
		?>
			<tr>
				<td><?php echo $row[0]; ?></td>
				<td><?php echo $row[1]; ?></td>
				<td><?php echo $row[2]; ?></td>
				<td><?php echo $row[3]; ?></td>
				<td><?php echo $row[6]; ?></td>
				<td><?php echo $row[7]; ?></td>
				<td><?php echo $row[8]; ?></td>
				<td><?php echo $row[9]; ?></td>
				<!-- <td><?php //echo $row[10]; ?></td> -->
				<!-- <td><?php //echo $row[11]; ?></td> -->
			</tr>
		<?php
		}
	}
	else
	{
		echo "<br>No Existe en base de datos...";
	}
	?>
		</tbody>
	</table>

	<form method="GET" action="controller/reportes_busqueda1.php">
		<?php
			if(isset($_POST["btn"]))
			{
		?>
		<input type="text" name="bus2" value="<?= $busca ?>" hidden>
		<input type="text" name="col2" value="<?= $columna ?>" hidden>
		<?php
			}
		?>
		<br>
		<input  class="boton" type="submit" name="imprimir" value="imprimir">
		<!-- <input type="submit" name="imprimir" value="imprimir" onclick="location.href='reportes_busqueda.php'"> -->
	</form>
	<br>
	<a class="boton" href="buscar.php">Recargar</a>
	<!-- <br><br> -->
	<a class="boton" href="adm/lista_usuarios.php">volver</a>
</center>
</body>
</html>

