<?php

session_start();

include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
if($conn!=null){
		
		$espCedula=$_POST['cedEstudianteFoto'];
		
		$stmt= mysqli_prepare($conn,"select Estudiante_Cedula,Estudiante_Nombre,Estudiante_Ape1,Estudiante_Ap2,Estudiante_Nac,Estudiante_Email,DATE_FORMAT(Estudiante_FechaNac,'%d/%m/%Y'),Estudiante_TipoSangre,Estudiante_Foto,Estudiante_Genero,Estudiante_Carnet,Estudiante_LugarTrabajo from tbl_estudiante where Estudiante_Cedula = ?");
		@mysqli_stmt_bind_param($stmt, 's' , $espCedula);
		
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$ced,$nombre,$ape1,$ape2,$nac,$email,$fechaNac,$tipoSangre,$foto,$genero,$carnet,$lugarTrabajo);
		@mysqli_stmt_fetch($stmt);
		@mysqli_stmt_close($stmt);
		
		
		$info=$ced."*".$nombre."*".$ape1."*".$ape2."*".$foto;
	
		
		echo $info;
		
	
	
}
else{
	echo "¡Error, no se logro comunicar con el servidor!";
}

@mysqli_close($conn); 
?>