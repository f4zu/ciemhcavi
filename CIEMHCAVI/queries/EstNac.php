<?php

session_start();

include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
if($conn!=null){
		
		$espCedula=$_POST['estCed'];
		$stmt= mysqli_prepare($conn,"select Estudiante_Nac from tbl_estudiante where Estudiante_Cedula = ?");
		@mysqli_stmt_bind_param($stmt, 's' , $espCedula);
		
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$nac);
		@mysqli_stmt_fetch($stmt);
		@mysqli_stmt_close($stmt);
		
		
		echo $nac;
		
	
	
}
else{
	echo "¡Error, no se logro comunicar con el servidor!";
}

@mysqli_close($conn); 
?>