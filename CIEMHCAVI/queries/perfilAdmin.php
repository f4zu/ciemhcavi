<?php

session_start();

include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
if($conn!=null){
		
		$espCedula=$_POST['adminCed'];	
	
		$stmt= mysqli_prepare($conn,"select Admin_Cedula,Admin_Nombre,Admin_Ape1,Admin_Ap2,Admin_Nac,Admin_Tel,Admin_Dir,Admin_Email,DATE_FORMAT(Admin_FechaNac,'%d/%m/%Y'),Admin_Genero,Admin_Foto,Admin_Puesto from tbl_administrativo where Admin_Cedula = ?");
		@mysqli_stmt_bind_param($stmt, 's' , $espCedula);
		
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$ced,$nombre,$ape1,$ape2,$nac,$tel,$dir,$email,$fechaNac,$genero,$foto,$puesto);
		@mysqli_stmt_fetch($stmt);
		@mysqli_stmt_close($stmt);
		
		$info=$ced."*".$nombre."*".$ape1."*".$ape2."*".$nac."*".$tel."*".$dir."*".$email."*".$fechaNac."*".$genero."*".$foto."*".$puesto;		
			
		echo $info;
		
	
	
}
else{
	echo "¡Error, no se logro comunicar con el servidor!";
}

@mysqli_close($conn); 
?>