<?php
require_once"../conexion.php";
require_once('reporte/class.ezpdf.php');
$pdf = new Cezpdf('Carta');
//seleccionamos tipo de hoja
$pdf->selectFont('reporte/fonts/Helvetica.afm'); //seleccionamos fuente a utilizar
$pdf->ezImage("emp.jpeg", 10, 150, 'none', 'left');
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"),12);
$pdf->ezText("<b>Hora:</b> ".date("h:i:s"),12);
$pdf->ezText("<b>----Tabla de Accesos-----</b>\n",18);
$sql="SELECT * from accesos";
$result=$conn->query($sql);
    if($result->num_rows>0){
        while ($row=mysqli_fetch_array($result)) {
            $data[]=array('id_a'=>$row[0],'nuser'=>$row[1],'fecha_a'=>$row[2],'hora_a'=>$row[3],'tipo'=>$row[4]);
        }
    }
    else{
        echo "Base de datos vacía";
    }
$titles=array('id_a'=>'id_a','nuser'=>'nuser','fecha_a'=>'fecha_a','hora_a'=>'hora_a','tipo'=>'tipo');
$pdf->ezTable($data);
ob_end_clean();
$pdf->ezStream();
$conn->close();
?>