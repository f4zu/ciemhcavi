<?php

session_start();

include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
if($conn!=null){
		
		$nombre=$_POST['nombreCarrera'];	
	
		$stmt= mysqli_prepare($conn,"select * from tbl_carrera where Carrera_Nombre = ?");
		@mysqli_stmt_bind_param($stmt, 's' , $nombre);
		
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$nombreC,$codigo);
		@mysqli_stmt_fetch($stmt);
		@mysqli_stmt_close($stmt);
		
		$info=$nombreC."*".$codigo;		
			
		echo $info;
		
	
	
}
else{
	echo "¡Error, no se logro comunicar con el servidor!";
}

@mysqli_close($conn); 
?>
