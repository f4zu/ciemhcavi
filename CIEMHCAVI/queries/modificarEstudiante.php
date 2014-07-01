<?php
include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
$profile="Admin";
$sqlresult;
$sqlresult1;
$date;
$carpeta="../FotosEstudiantes/";
$file_name;
$formatpic;



if($conn!=null){// verifica campos requeridos en caso de error en conexion
	if(isset($_POST['nombre']) && !empty($_POST['nombre']) &&
	isset($_POST['ape1']) && !empty($_POST['ape1']) &&
	isset($_POST['ced']) && !empty($_POST['ced']) &&
	isset($_POST['fecha']) && !empty($_POST['fecha']))
	{
		//function to give format to date
		$nueva_fecha=formato_fecha($_POST['fecha'],'Y-m-d');
		// handle of images
		opendir($carpeta);
		if(!empty($_FILES['photo']['name']))
		{
			$destino= $carpeta.$_FILES['photo']['name'];
			$tempFile = $_FILES["photo"]["tmp_name"];
			$formatpic= explode(".", $_FILES["photo"]["name"]);//get the format of the pic
			$_FILES["photo"]["name"]= $_POST['ced'].".".$formatpic[1];// this is to change the name of the pic to a file name which will be unique for the user
			$file_name = $_FILES["photo"]["name"];	
			move_uploaded_file($tempFile,$carpeta.$file_name);
			
		    $stmt= mysqli_prepare($conn,"UPDATE tbl_estudiante SET Estudiante_Nombre=?, Estudiante_Ape1=?, Estudiante_Ap2=?, Estudiante_Nac=?, Estudiante_Email=?, Estudiante_FechaNac=?,Estudiante_TipoSangre=?, Estudiante_Foto=?, Estudiante_Carnet=?, Estudiante_LugarTrabajo=?, Estudiante_AnioIngreso=? WHERE Estudiante_Cedula=?");
		    @mysqli_stmt_bind_param($stmt, 'ssssssssssis',$_POST['nombre'],$_POST['ape1'],$_POST['ape2'],$_POST['nac'],$_POST['email'],$nueva_fecha,$_POST['tipoSangre'],$file_name,$_POST['carnet'],$_POST['lugarTrabajo'],$_POST['anioIngreso'],$_POST['ced']);
		    @mysqli_stmt_execute($stmt);
		    $sqlresult1=mysqli_stmt_affected_rows($stmt);
		    @mysqli_stmt_close($stmt);
			
			$lugar="lectivo";
		    $stmt= mysqli_prepare($conn,"UPDATE tbl_direccion SET Direccion_Provincia=?, Direccion_Canton=?, Direccion_Distrito=?, Direccion_otras=? WHERE Estudiante_Ced=? AND Direccion_Tipo=?");//modificar direccion de tiempo lectivo
			@mysqli_stmt_bind_param($stmt, 'ssssss',$_POST['provinciaLectivo'],$_POST['cantonLectivo'],$_POST['distritoLectivo'],$_POST['otrasLectivo'],$_POST['ced'],$lugar);
			@mysqli_stmt_execute($stmt);
			$lugar="Nolectivo";
			$stmt= mysqli_prepare($conn,"UPDATE tbl_direccion SET Direccion_Provincia=?, Direccion_Canton=?, Direccion_Distrito=?, Direccion_otras=? WHERE Estudiante_Ced=? AND Direccion_Tipo=?");//modificar direccion de tiempo NO lectivo
			@mysqli_stmt_bind_param($stmt, 'ssssss',$_POST['provinciaNoLectivo'],$_POST['cantonNoLectivo'],$_POST['distritoNoLectivo'],$_POST['otrasNoLectivo'],$_POST['ced'],$lugar);
			@mysqli_stmt_execute($stmt);
			$lugar="trabajo";
			$stmt= mysqli_prepare($conn,"UPDATE tbl_direccion SET Direccion_Provincia=?, Direccion_Canton=?, Direccion_Distrito=?, Direccion_otras=? WHERE Estudiante_Ced=? AND Direccion_Tipo=?");//modificar direccion de Trabajo
			@mysqli_stmt_bind_param($stmt, 'ssssss',$_POST['provinciaTrabajo'],$_POST['cantonTrabajo'],$_POST['distritoTrabajo'],$_POST['otrasTrabajo'],$_POST['ced'],$lugar);
			@mysqli_stmt_execute($stmt);
			
			//modificar de telefonos
			$telf="habitacion";
			$stmt= mysqli_prepare($conn,"UPDATE tbl_telefono SET Telefono_numero=? WHERE Estudiante_Ced=? AND Telefono_Tipo=?");
			@mysqli_stmt_bind_param($stmt, 'sss',$_POST['telHabitacion'],$_POST['ced'],$telf);
			@mysqli_stmt_execute($stmt);
			$telf="celular";
			$stmt= mysqli_prepare($conn,"UPDATE tbl_telefono SET Telefono_numero=? WHERE Estudiante_Ced=? AND Telefono_Tipo=?");
			@mysqli_stmt_bind_param($stmt, 'sss',$_POST['telCelular'],$_POST['ced'],$telf);
			@mysqli_stmt_execute($stmt);
			$telf="trabajo";
			$stmt= mysqli_prepare($conn,"UPDATE tbl_telefono SET Telefono_numero=? WHERE Estudiante_Ced=? AND Telefono_Tipo=?");
			@mysqli_stmt_bind_param($stmt, 'sss',$_POST['telTrabajo'],$_POST['ced'],$telf);
			mysqli_stmt_execute($stmt);
		
			//close connection and results
			@mysqli_stmt_close($stmt);
			
		}
		else{
		// modificar estudiante
		$stmt= mysqli_prepare($conn,"UPDATE tbl_estudiante SET Estudiante_Nombre=?, Estudiante_Ape1=?, Estudiante_Ap2=?, Estudiante_Nac=?, Estudiante_Email=?, Estudiante_FechaNac=?,Estudiante_TipoSangre=?, Estudiante_Carnet=?, Estudiante_LugarTrabajo=?, Estudiante_AnioIngreso=? WHERE Estudiante_Cedula=?");
		@mysqli_stmt_bind_param($stmt, 'sssssssssis',$_POST['nombre'],$_POST['ape1'],$_POST['ape2'],$_POST['nac'],$_POST['email'],$nueva_fecha,$_POST['tipoSangre'],$_POST['carnet'],$_POST['lugarTrabajo'],$_POST['anioIngreso'],$_POST['ced']);
		@mysqli_stmt_execute($stmt);
		$sqlresult1=mysqli_stmt_affected_rows($stmt);
		@mysqli_stmt_close($stmt);
		
		$lugar="lectivo";
		$stmt= mysqli_prepare($conn,"UPDATE tbl_direccion SET Direccion_Provincia=?, Direccion_Canton=?, Direccion_Distrito=?, Direccion_otras=? WHERE Estudiante_Ced=? AND Direccion_Tipo=?");//modificar direccion de tiempo lectivo
		@mysqli_stmt_bind_param($stmt, 'ssssss',$_POST['provinciaLectivo'],$_POST['cantonLectivo'],$_POST['distritoLectivo'],$_POST['otrasLectivo'],$_POST['ced'],$lugar);
		@mysqli_stmt_execute($stmt);
		$lugar="Nolectivo";
		$stmt= mysqli_prepare($conn,"UPDATE tbl_direccion SET Direccion_Provincia=?, Direccion_Canton=?, Direccion_Distrito=?, Direccion_otras=? WHERE Estudiante_Ced=? AND Direccion_Tipo=?");//modificar direccion de tiempo NO lectivo
		@mysqli_stmt_bind_param($stmt, 'ssssss',$_POST['provinciaNoLectivo'],$_POST['cantonNoLectivo'],$_POST['distritoNoLectivo'],$_POST['otrasNoLectivo'],$_POST['ced'],$lugar);
		@mysqli_stmt_execute($stmt);
		$lugar="trabajo";
		$stmt= mysqli_prepare($conn,"UPDATE tbl_direccion SET Direccion_Provincia=?, Direccion_Canton=?, Direccion_Distrito=?, Direccion_otras=? WHERE Estudiante_Ced=? AND Direccion_Tipo=?");//modificar direccion de Trabajo
		@mysqli_stmt_bind_param($stmt, 'ssssss',$_POST['provinciaTrabajo'],$_POST['cantonTrabajo'],$_POST['distritoTrabajo'],$_POST['otrasTrabajo'],$_POST['ced'],$lugar);
		@mysqli_stmt_execute($stmt);
		
		//modificar de telefonos
		$telf="habitacion";
		$stmt= mysqli_prepare($conn,"UPDATE tbl_telefono SET Telefono_numero=? WHERE Estudiante_Ced=? AND Telefono_Tipo=?");
		@mysqli_stmt_bind_param($stmt, 'sss',$_POST['telHabitacion'],$_POST['ced'],$telf);
		@mysqli_stmt_execute($stmt);
		$telf="celular";
		$stmt= mysqli_prepare($conn,"UPDATE tbl_telefono SET Telefono_numero=? WHERE Estudiante_Ced=? AND Telefono_Tipo=?");
		@mysqli_stmt_bind_param($stmt, 'sss',$_POST['telCelular'],$_POST['ced'],$telf);
		@mysqli_stmt_execute($stmt);
		$telf="trabajo";
		$stmt= mysqli_prepare($conn,"UPDATE tbl_telefono SET Telefono_numero=? WHERE Estudiante_Ced=? AND Telefono_Tipo=?");
		@mysqli_stmt_bind_param($stmt, 'sss',$_POST['telTrabajo'],$_POST['ced'],$telf);
		mysqli_stmt_execute($stmt);
		
		//close connection and results
		@mysqli_stmt_close($stmt);
		
		
		}//fin de else de foto
		
		if( $sqlresult1!=0 )
		{
			header('Location: ../estudiantes/perfil.php');
		}
		else {
			echo"No se modifico ningun dato!";
			header('Location: ../estudiantes/perfil.php');
		}
	}
	else {
		echo "¡Error, no se recibieron los datos correctamente!";
	}
}else{
	echo "¡Error, no se logro comunicar con el servidor!";
}

// This function gives format to date
function formato_fecha($fecha,$formato = 'Y-m-d')
{
	$fecha= str_replace("/", "-", $fecha);
	if($fecha)
	{
		$class_date= new DateTime($fecha);
		return $class_date->format($formato);
	}
	else {
		return "";
	}
}
@mysqli_close($conn);
?>
