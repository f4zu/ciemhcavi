<?php

include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
if($conn!=null){
	$stmt= mysqli_prepare($conn,"delete from tbl_curso where Curso_Codigo=?");
	mysqli_stmt_bind_param($stmt,'s', $_POST['idCurso']);
	mysqli_stmt_execute($stmt);
}
else{
	echo "¡Error, no se logro comunicar con el servidor!";
}
@mysqli_stmt_close($stmt);
@mysqli_close($conn);  
?>
		
	