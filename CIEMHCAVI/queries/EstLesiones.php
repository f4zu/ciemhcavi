<?php

session_start();

include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
if($conn!=null){
		
		$espCedula=$_POST['estCed'];
		$lesiones="";
		$stmt= mysqli_prepare($conn,"select Lesion_Nombre from tbl_lesion where Estudiante_Ced = ?");
		@mysqli_stmt_bind_param($stmt, 's' , $espCedula);
		
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$lesion);
		while(mysqli_stmt_fetch($stmt))
		{
		    $lesiones=$lesiones."*".$lesion;
		}
		@mysqli_stmt_close($stmt);
		
		
		echo  $lesiones;
		
	
}
else{
	echo "¡Error, no se logro comunicar con el servidor!";
}

@mysqli_close($conn); 
?>