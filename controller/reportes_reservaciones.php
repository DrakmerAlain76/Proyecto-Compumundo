<?php
require_once"../conexion.php";
require_once('reporte/class.ezpdf.php');
$pdf = new Cezpdf('Carta');
 //seleccionamos tipo de hoja
 $pdf->selectFont('reporte/fonts/Helvetica.afm'); //seleccionamos fuente a utilizar
 $pdf->ezImage("emp.jpeg", 10, 150, 'none', 'left');
 $pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"),12);
 $pdf->ezText("<b>Hora:</b> ".date("h:i:s"),12);
 $pdf->ezText("<b>----TABLA DE RESERVACIONES-----</b>\n",18);
 $sql="SELECT * from reserva";
 /**////revisar
 $result=$conn->query($sql);
 if($result->num_rows>0){
     while ($row=mysqli_fetch_array($result)) {
     $data[]=array(
        'id_res'      =>$row[0],
        'usuario_res'     =>$row[1],
        'curso_res' =>$row[2],
        'fecha_res'       =>$row[3],
        'hora_res'        =>$row[4]
        // 'codigo'         =>$row[5],
        
    );
}
}
 else{
     echo "Base de datos vacía";
}
$titles=array(
    'id_res'=>'id_res',
    'usuario_res'=>'usuario_res',
    'curso_res'=>'curso_res',
    'fecha_res'=>'fecha_res',
    'hora_res'=>'hora_res'
);
$pdf->ezTable($data);
ob_end_clean();
$pdf->ezStream();
$conn->close();
?>