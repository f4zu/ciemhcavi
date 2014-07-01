<?php

session_start();

include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
if($conn!=null){
		
		$espCedula=$_POST['adminCed'];
		$stmt= mysqli_prepare($conn,"select DATE_FORMAT(Admin_FechaNac,'%d/%m/%Y') from tbl_administrativo where Admin_Cedula = ?");
		@mysqli_stmt_bind_param($stmt, 's' , $espCedula);
		
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$fecha);
		@mysqli_stmt_fetch($stmt);
		@mysqli_stmt_close($stmt);
		
		
		echo $fecha;
		
	
	
}
else{
	echo "¡Error, no se logro comunicar con el servidor!";
}

@mysqli_close($conn); 
?>