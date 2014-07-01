<?php

include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
if($conn!=null){
	if(isset($_POST['nombre']) && !empty($_POST['nombre']) &&
	isset($_POST['codigo']) && !empty($_POST['codigo']) &&
	isset($_POST['carrera']) && !empty($_POST['carrera']) &&
	isset($_POST['tipo']) && !empty($_POST['tipo']) &&
	isset($_POST['creditos']) && !empty($_POST['creditos'])&&
	isset($_POST['ciclo']) && !empty($_POST['ciclo']))
	{
		$stmt= mysqli_prepare($conn,"UPDATE tbl_curso SET Curso_Creditos=?, Curso_Tipo=?,Curso_Nombre=?,Curso_Ciclo=?  WHERE Curso_Codigo=?");
		@mysqli_stmt_bind_param($stmt,'issss', $_POST['creditos'], $_POST['tipo'], $_POST['nombre'], $_POST['ciclo'], $_POST['codigo']);
		@mysqli_stmt_execute($stmt);
		$sqlresult=mysqli_stmt_affected_rows($stmt);
		@mysqli_stmt_close($stmt);
		@mysqli_close($conn); 
		if($sqlresult!=0 && $sqlresult!=-1 && $sqlresult!=null)
		{
			echo "Confirmed";;
		}
		else{
		    echo "Confirmed";
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