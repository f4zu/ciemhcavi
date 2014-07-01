<?php

session_start();

include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
if($conn!=null){
		
		$espCedula=$_POST['estCed'];	
	
		$stmt= mysqli_prepare($conn,"select Estudiante_Cedula,Estudiante_Nombre,Estudiante_Ape1,Estudiante_Ap2,Estudiante_Nac,Estudiante_Email,DATE_FORMAT(Estudiante_FechaNac,'%d/%m/%Y'),Estudiante_AnioIngreso,Estudiante_TipoSangre,Estudiante_Foto,Estudiante_Genero,Estudiante_Carnet,Estudiante_LugarTrabajo from tbl_estudiante where Estudiante_Cedula = ?");
		@mysqli_stmt_bind_param($stmt, 's' , $espCedula);
		
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$ced,$nombre,$ape1,$ape2,$nac,$email,$fechaNac,$anioIngreso,$tipoSangre,$foto,$genero,$carnet,$lugarTrabajo);
		@mysqli_stmt_fetch($stmt);
		@mysqli_stmt_close($stmt);
		
		$info=$ced."*".$nombre."*".$ape1."*".$ape2."*".$nac."*".$email."*".$fechaNac."*".$tipoSangre."*".$foto."*".$genero."*".$carnet."*".$lugarTrabajo;	

		$stmt= mysqli_prepare($conn,"select Direccion_Provincia,Direccion_Canton,Direccion_Distrito,Direccion_otras from tbl_direccion where Direccion_Tipo='lectivo' and Estudiante_Ced = ?");
		@mysqli_stmt_bind_param($stmt, 's' , $espCedula);
		
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$provinciaLectivo,$cantonLectivo,$distritoLectivo,$otrasLectivo);
		@mysqli_stmt_fetch($stmt);
		@mysqli_stmt_close($stmt);
		
		$info=$info."*".$provinciaLectivo."*".$cantonLectivo."*".$distritoLectivo."*".$otrasLectivo;
		
		$stmt= mysqli_prepare($conn,"select Direccion_Provincia,Direccion_Canton,Direccion_Distrito,Direccion_otras from tbl_direccion where Direccion_Tipo='Nolectivo' and Estudiante_Ced = ?");
		@mysqli_stmt_bind_param($stmt, 's' , $espCedula);
		
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$provinciaNoLectivo,$cantonNoLectivo,$distritoNoLectivo,$otrasNoLectivo);
		@mysqli_stmt_fetch($stmt);
		@mysqli_stmt_close($stmt);
		
		$info=$info."*".$provinciaNoLectivo."*".$cantonNoLectivo."*".$distritoNoLectivo."*".$otrasNoLectivo;
		
		$stmt= mysqli_prepare($conn,"select Direccion_Provincia,Direccion_Canton,Direccion_Distrito,Direccion_otras from tbl_direccion where Direccion_Tipo='trabajo' and Estudiante_Ced = ?");
		@mysqli_stmt_bind_param($stmt, 's' , $espCedula);
		
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$provinciaTrabajo,$cantonTrabajo,$distritoTrabajo,$otrasTrabajo);
		@mysqli_stmt_fetch($stmt);
		@mysqli_stmt_close($stmt);
		
		$info=$info."*".$provinciaTrabajo."*".$cantonTrabajo."*".$distritoTrabajo."*".$otrasTrabajo;
		
		
		$stmt= mysqli_prepare($conn,"select Telefono_numero from tbl_telefono where Telefono_Tipo='celular' and Estudiante_Ced = ?");
		@mysqli_stmt_bind_param($stmt, 's' , $espCedula);
		
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$telefonoCelular);
		@mysqli_stmt_fetch($stmt);
		@mysqli_stmt_close($stmt);
		
		$info=$info."*".$telefonoCelular;
		
		$stmt= mysqli_prepare($conn,"select Telefono_numero from tbl_telefono where Telefono_Tipo='habitacion' and Estudiante_Ced = ?");
		@mysqli_stmt_bind_param($stmt, 's' , $espCedula);
		
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$telefonoHabitacion);
		@mysqli_stmt_fetch($stmt);
		@mysqli_stmt_close($stmt);
		
		$info=$info."*".$telefonoHabitacion;
		
		$stmt= mysqli_prepare($conn,"select Telefono_numero from tbl_telefono where Telefono_Tipo='trabajo' and Estudiante_Ced = ?");
		@mysqli_stmt_bind_param($stmt, 's' , $espCedula);
		
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$telefonoTrabajo);
		@mysqli_stmt_fetch($stmt);
		@mysqli_stmt_close($stmt);
		
		$info=$info."*".$telefonoTrabajo."*".$anioIngreso;
		
		
			
		echo $info;
		
	
	
}
else{
	echo "¡Error, no se logro comunicar con el servidor!";
}

@mysqli_close($conn); 
?>