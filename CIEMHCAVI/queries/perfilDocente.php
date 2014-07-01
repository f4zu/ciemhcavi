<?php

session_start();

include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
if($conn!=null){
		
		$espCedula=$_POST['docenteCed'];	
	
		$stmt= mysqli_prepare($conn,"select Docente_Cedula,Docente_Nombre,Docente_Ape1,Docente_Ap2,Docente_Nac,Docente_Tel,Docente_Dir,Docente_Email,DATE_FORMAT(Docente_FechaNac,'%d/%m/%Y'),Docente_Genero,Docente_Foto from tbl_docente where Docente_Cedula = ?");
		@mysqli_stmt_bind_param($stmt, 's' , $espCedula);
		
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$ced,$nombre,$ape1,$ape2,$nac,$tel,$dir,$email,$fechaNac,$genero,$foto);
		@mysqli_stmt_fetch($stmt);
		@mysqli_stmt_close($stmt);
		
		$info=$ced."*".$nombre."*".$ape1."*".$ape2."*".$nac."*".$tel."*".$dir."*".$email."*".$fechaNac."*".$genero."*".$foto;		
			
		echo $info;
		
	
	
}
else{
	echo "¡Error, no se logro comunicar con el servidor!";
}

@mysqli_close($conn); 
?>