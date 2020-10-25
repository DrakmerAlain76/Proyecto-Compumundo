<?php
require_once"../conexion.php";
require_once('reporte/class.ezpdf.php');
$pdf = new Cezpdf('Carta');
 //seleccionamos tipo de hoja
 $pdf->selectFont('reporte/fonts/Helvetica.afm'); //seleccionamos fuente a utilizar
 $pdf->ezImage("emp.jpeg", 10, 150, 'none', 'left');
 $pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"),12);
 $pdf->ezText("<b>Hora:</b> ".date("h:i:s"),12);
 $pdf->ezText("<b>----Tabla Cursos-----</b>\n",18);
 $sql="SELECT * from cursos";
 /**////revisar
 $result=$conn->query($sql);
 if($result->num_rows>0){
     while ($row=mysqli_fetch_array($result)) {
     $data[]=array(
        'id_curso'      =>$row[0],
        'nombre_curso'  =>$row[1],
        'expositor'     =>$row[2],
        // 'comentario'    =>$row[3],
        'costo'         =>$row[4],
        'cupos'         =>$row[5],
        'fecha_curso'   =>$row[6],
        'reservas'      =>$row[7],
        'horario'      =>$row[8]
    );
}
}
 else{
     echo "Base de datos vacía";
}
$titles=array(
    'id_curso'=>'id_curso',
    'nombre_curso'=>'nombre_curso',
    'expositor'=>'expositor',
    // 'comentario'=>'comentario',
    'costo'=>'costo',
    'cupos'=>'cupos',
    'fecha_curso'=>'fecha_curso',
    'reservas'=>'reservas',
    'horario'=>'horario',
);
$pdf->ezTable($data);
ob_end_clean();
$pdf->ezStream();
$conn->close();
?>