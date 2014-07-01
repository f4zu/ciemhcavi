<?php

session_start();

include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
if($conn!=null){
		
		$espCedula=$_POST['estCed'];
		$stmt= mysqli_prepare($conn,"select Direccion_Provincia,Direccion_Canton,Direccion_Distrito,Direccion_otras from tbl_direccion where Direccion_Tipo='trabajo' and Estudiante_Ced = ?");
		@mysqli_stmt_bind_param($stmt, 's' , $espCedula);
		
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$provincia,$canton,$distrito,$otras);
		@mysqli_stmt_fetch($stmt);
		@mysqli_stmt_close($stmt);
		
		$direccion=$provincia."*".$canton."*".$distrito."*".$otras;
		
		
		
		echo $direccion;
		
	
	
}
else{
	echo "¡Error, no se logro comunicar con el servidor!";
}

@mysqli_close($conn); 
?>