<?php

session_start();

include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
if($conn!=null){
		
		$espCedula=$_POST['estCed'];
		$alergias="";
		$stmt= mysqli_prepare($conn,"select Alergia_Nombre from tbl_alergia where Estudiante_Ced = ?");
		@mysqli_stmt_bind_param($stmt, 's' , $espCedula);
		
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$alergia);
		while(mysqli_stmt_fetch($stmt))
		{
		    $alergias=$alergias."*".$alergia;
		}
		@mysqli_stmt_close($stmt);
		
		
		echo  $alergias;
		
	
}
else{
	echo "¡Error, no se logro comunicar con el servidor!";
}

@mysqli_close($conn); 
?>