<?php

session_start();

include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
if($conn!=null){
		
		$espCedula=$_POST['estCed'];
		$emergencias="";
		$stmt= mysqli_prepare($conn,"select Emergencia_contacto,Emergencia_numero from tbl_emergencia where Estudiante_Ced = ?");
		@mysqli_stmt_bind_param($stmt, 's' , $espCedula);
		
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$contacto,$telf);
		while(mysqli_stmt_fetch($stmt))
		{
		    $emergencias=$emergencias."*".$contacto."*".$telf;
		}
		@mysqli_stmt_close($stmt);
		
		
		echo  $emergencias;
		
	
}
else{
	echo "¡Error, no se logro comunicar con el servidor!";
}

@mysqli_close($conn); 
?>