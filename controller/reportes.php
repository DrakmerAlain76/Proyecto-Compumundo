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
 $sql="SELECT * from usuarios";
 /**////revisar
 $result=$conn->query($sql);
 if($result->num_rows>0){
     while ($row=mysqli_fetch_array($result)) {
     $data[]=array('id_usuario'=>$row[0],'nombres'=>$row[1],'apellidos'=>$row[2],'usuario'=>$row[3]);
}
}
 else{
     echo "Base de datos vacía";
}
$titles=array('id_usuario'=>'id_usuario','nombres'=>'nombres','apellidos'=>'apellidos','usuario'=>'usuario');
$pdf->ezTable($data);
ob_end_clean();
$pdf->ezStream();
$conn->close();
?>