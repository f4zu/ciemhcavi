<?php

include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
$html="";
if($conn!=null){
	$stmt= mysqli_prepare($conn,"DELETE FROM tbl_comentarios WHERE Usuario_Ced=? AND Estudiante_Ced=? AND Comentario_Fecha=?");
	mysqli_stmt_bind_param($stmt,'sss', $_POST['cedDel'], $_POST['cedEstudiante'],$_POST['fecha']);
	mysqli_stmt_execute($stmt);
}
else{
	echo "¡Error, no se logro comunicar con el servidor!";
}
@mysqli_stmt_close($stmt);
@mysqli_close($conn);  
?>