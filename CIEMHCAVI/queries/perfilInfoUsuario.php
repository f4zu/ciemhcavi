<?php

session_start();

include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
if($conn!=null){
		
		$espCedula=$_POST['usuarioCed'];
		$stmt= mysqli_prepare($conn,"select Usuario_Tipo from tbl_usuario where Usuario_Cedula = ?");
		@mysqli_stmt_bind_param($stmt, 's' , $espCedula);
		
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$tipo);
		@mysqli_stmt_fetch($stmt);
		@mysqli_stmt_close($stmt);
		
		$info=$tipo;
		
		if($tipo=="Admin" OR $tipo=="Director" OR $tipo=="SubDirector" OR $tipo=="Admin1" OR $tipo=="Admin2"){
		$stmt= mysqli_prepare($conn,"select Admin_Cedula,Admin_Nombre,Admin_Ape1,Admin_Ap2,Admin_Nac,Admin_Tel,Admin_Dir,Admin_Email,DATE_FORMAT(Admin_FechaNac,'%d/%m/%Y'),Admin_Genero,Admin_Foto from tbl_administrativo where Admin_Cedula = ?");
		@mysqli_stmt_bind_param($stmt, 's' , $espCedula);
		
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$ced,$nombre,$ape1,$ape2,$nac,$tel,$dir,$email,$fechaNac,$genero,$foto);
		@mysqli_stmt_fetch($stmt);
		@mysqli_stmt_close($stmt);
		
		$info=$info."*".$ced."*".$nombre."*".$ape1."*".$ape2."*".$nac."*".$tel."*".$dir."*".$email."*".$fechaNac."*".$genero."*".$foto;
		}
		
		else{
		$stmt= mysqli_prepare($conn,"select Docente_Cedula,Docente_Nombre,Docente_Ape1,Docente_Ap2,Docente_Nac,Docente_Tel,Docente_Dir,Docente_Email,DATE_FORMAT(Docente_FechaNac,'%d/%m/%Y'),Docente_Genero,Docente_Foto from tbl_docente where Docente_Cedula = ?");
		@mysqli_stmt_bind_param($stmt, 's' , $espCedula);
		
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$ced,$nombre,$ape1,$ape2,$nac,$tel,$dir,$email,$fechaNac,$genero,$foto);
		@mysqli_stmt_fetch($stmt);
		@mysqli_stmt_close($stmt);
		
		$info=$info."*".$ced."*".$nombre."*".$ape1."*".$ape2."*".$nac."*".$tel."*".$dir."*".$email."*".$fechaNac."*".$genero."*".$foto;
		}
		
		
		
		echo $info;
		
	
	
}
else{
	echo "¡Error, no se logro comunicar con el servidor!";
}

@mysqli_close($conn); 
?>