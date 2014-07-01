<?php

session_start();

include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
if($conn!=null){
		
		$codigo=$_POST['cursoCodigo'];	
	
		$stmt= mysqli_prepare($conn,"select * from tbl_curso where Curso_Codigo = ?");
		@mysqli_stmt_bind_param($stmt, 's' , $codigo);
		
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$codigo,$creditos,$tipo,$nombre,$ciclo,$carreraNombre);
		@mysqli_stmt_fetch($stmt);
		@mysqli_stmt_close($stmt);
		
		$info=$codigo."*".$creditos."*".$tipo."*".$nombre."*".$ciclo."*".$carreraNombre;		
			
		echo $info;
		
	
	
}
else{
	echo "¡Error, no se logro comunicar con el servidor!";
}

@mysqli_close($conn); 
?>
