<?php
include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
if($conn!=null){
	if(isset($_POST['nombre']) && !empty($_POST['nombre']) &&
	isset($_POST['codigo']) && !empty($_POST['codigo']))
	{
		$stmt= mysqli_prepare($conn,"insert into tbl_carrera (Carrera_Nombre, Carrera_Codigo) values (?,?)");
		@mysqli_stmt_bind_param($stmt,'ss',$_POST['nombre'],$_POST['codigo']);
		@mysqli_stmt_execute($stmt);
		$sqlresult=mysqli_stmt_affected_rows($stmt);
		@mysqli_stmt_close($stmt);
		@mysqli_close($conn); 
		if($sqlresult!=0 && $sqlresult!=-1 && $sqlresult!=null)
		{
			echo "Confirmed";;
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