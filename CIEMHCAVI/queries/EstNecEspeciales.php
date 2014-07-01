<?php

session_start();

include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
if($conn!=null){
		
		$espCedula=$_POST['estCed'];
		$nec="";
		$stmt= mysqli_prepare($conn,"select Necespeciales_Detalle from tbl_necespeciales where Estudiante_Ced = ?");
		@mysqli_stmt_bind_param($stmt, 's' , $espCedula);
		
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$nece);
		while(mysqli_stmt_fetch($stmt))
		{
		    $nec=$nec."*".$nece;
		}
		@mysqli_stmt_close($stmt);
		
		
		echo  $nec;
		
	
}
else{
	echo "¡Error, no se logro comunicar con el servidor!";
}

@mysqli_close($conn); 
?>