<?php

session_start();

include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
if($conn!=null){
		
		$espCedula=$_POST['estCed'];
		$enfermedades="";
		$stmt= mysqli_prepare($conn,"select Enfermedad_Nombre from tbl_enfermedad where Estudiante_Ced = ?");
		@mysqli_stmt_bind_param($stmt, 's' , $espCedula);
		
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$enfermedad);
		while(mysqli_stmt_fetch($stmt))
		{
		    $enfermedades=$enfermedades."*".$enfermedad;
		}
		@mysqli_stmt_close($stmt);
		
		
		echo  $enfermedades;
		
	
}
else{
	echo "¡Error, no se logro comunicar con el servidor!";
}

@mysqli_close($conn); 
?>