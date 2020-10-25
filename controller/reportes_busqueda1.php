<?php
require_once"../conexion.php";
require_once('reporte/class.ezpdf.php');
$pdf = new Cezpdf('Carta');
 //seleccionamos tipo de hoja
 $pdf->selectFont('reporte/fonts/Helvetica.afm'); //seleccionamos fuente a utilizar
$pdf->ezImage("emp.jpeg", 10, 150, 'none', 'left');
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"),12);
$pdf->ezText("<b>Hora:</b> ".date("h:i:s"),12);
$pdf->ezText("<b>----Tabla de Datos Usuarios-----</b>\n",18);

/**/
////////////////////////
$bandera=false;
if(isset($_GET["imprimir"])&&isset($_GET["bus2"])&&isset($_GET["col2"]))
{
    $busca=$_GET["bus2"];//Texto a buscar
    $columna=$_GET["col2"]; //Opcion a Buscar
    $bandera=true;
    $sql1="SELECT * FROM usuarios WHERE $columna LIKE '%$busca%'";
    // var_dump($sql1);die();
    $result1 = mysqli_query($conn, $sql1);
    if($result1->num_rows>0){
        while ($row=mysqli_fetch_array($result1)) {
        $data[]=array('id_usuario'=>$row[0],'nombres'=>$row[1],'apellidos'=>$row[2],'usuario'=>$row[3]);
    }
    }
}
else{
    // echo "NO EXISTE BUSQUEDA";


////////////////////////

    $sql="SELECT * from usuarios";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        while ($row=mysqli_fetch_array($result)) {
        $data[]=array('id_usuario'=>$row[0],'nombres'=>$row[1],'apellidos'=>$row[2],'usuario'=>$row[3]);
    }
    }
    else{
        echo "Base de datos vacía";
    }
}
/**/

$titles=array('id_usuario'=>'id_usuario','nombres'=>'nombres','apellidos'=>'apellidos','usuario'=>'usuario');

$pdf->ezTable($data);
ob_end_clean();
$pdf->ezStream();
$conn->close();
?>