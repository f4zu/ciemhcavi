<?php

include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
if($conn!=null){
	if(isset($_POST['cedEstudiante']) && !empty($_POST['cedEstudiante']) &&
	isset($_POST['Usuario_Ced']) && !empty($_POST['Usuario_Ced']) &&
	isset($_POST['comentarioDetalle']) && !empty($_POST['comentarioDetalle']))
	{
		date_default_timezone_set('America/Costa_Rica');
		$hoy = date("Y-m-d H:i:s");  
		$stmt= mysqli_prepare($conn,"insert into tbl_comentarios (Estudiante_Ced, Usuario_Ced, Comentario_Fecha, Comentario_Detalle) VALUES (?,?,?,?)");
		mysqli_stmt_bind_param($stmt,'ssss',$_POST['cedEstudiante'], $_POST['Usuario_Ced'], $hoy,$_POST['comentarioDetalle']);
		mysqli_stmt_execute($stmt);
		$sqlresult=mysqli_stmt_affected_rows($stmt);
		@mysqli_stmt_close($stmt);
		if($sqlresult!=0 && $sqlresult!=-1 && $sqlresult!=null)
		{
			echo "Confirmed";
		}
		else {
			echo "Error al insertar datos a la base de datos";
		}
	}
	else {
		echo "¡Error, no se recibieron los datos correctamente!";
	}
}
else{
	echo "¡Error, no se logro comunicar con el servidor!";
}
@mysqli_close($conn);  
?>
