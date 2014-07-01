<?php

session_start();

include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
if($conn!=null){
		
		$espCedula=$_POST['cedUsuarioFoto'];
		$stmt= mysqli_prepare($conn,"select Usuario_Tipo from tbl_usuario where Usuario_Cedula = ?");
		@mysqli_stmt_bind_param($stmt, 's' , $espCedula);
		
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$tipo);
		@mysqli_stmt_fetch($stmt);
		@mysqli_stmt_close($stmt);
		
		$info=$tipo;
		
		
		if($tipo=="Admin" OR $tipo=="Director" OR $tipo=="SubDirector" OR $tipo=="Admin1" OR $tipo=="Admin2"){
		$stmt= mysqli_prepare($conn,"select Admin_Foto from tbl_administrativo where Admin_Cedula = ?");
		@mysqli_stmt_bind_param($stmt, 's' , $espCedula);
		
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$foto);
		@mysqli_stmt_fetch($stmt);
		@mysqli_stmt_close($stmt);
		
		}
		
		else{
		$stmt= mysqli_prepare($conn,"select Docente_Foto from tbl_docente where Docente_Cedula = ?");
		@mysqli_stmt_bind_param($stmt, 's' , $espCedula);
		
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$foto);
		@mysqli_stmt_fetch($stmt);
		@mysqli_stmt_close($stmt);
		}
		
		$info=$info."*".$foto;
		
		echo $info;
		
	
	
}
else{
	echo "¡Error, no se logro comunicar con el servidor!";
}

@mysqli_close($conn); 
?>