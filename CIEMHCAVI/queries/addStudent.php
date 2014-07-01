<?php
include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
$sqlresult;
$date;
$carpeta="../FotosEstudiantes/";
$file_name;
$formatpic;
if($conn!=null){
	if(isset($_POST['nombre']) && !empty($_POST['nombre']) &&
	isset($_POST['ape1']) && !empty($_POST['ape1']) &&
	isset($_POST['ced']) && !empty($_POST['ced']) &&
	isset($_POST['genero']) && !empty($_POST['genero']) &&
	isset($_POST['fecha']) && !empty($_POST['fecha']) &&
	isset($_POST['carrera']) && !empty($_POST['carrera']))
	{
		$nueva_fecha=formato_fecha($_POST['fecha'],'Y-m-d');
		opendir($carpeta);
		if(!empty($_FILES['photo']['name']))
		{
			$destino= $carpeta.$_FILES['photo']['name'];
			$tempFile = $_FILES["photo"]["tmp_name"];
			$formatpic= explode(".", $_FILES["photo"]["name"]);//get the format of the pic
			$_FILES["photo"]["name"]= $_POST['ced'].".".$formatpic[1];// this is to change the name of the pic to a file name which will be unique for the user
			$file_name = $_FILES["photo"]["name"];	
			move_uploaded_file($tempFile,$carpeta.$file_name);
		}
		else {
			$file_name="default-user-picture.png";
		}
		$stmt= mysqli_prepare($conn,"insert into tbl_estudiante(Estudiante_Cedula, Estudiante_Nombre, Estudiante_Ape1, Estudiante_Ap2, Estudiante_Nac, Estudiante_Email, Estudiante_FechaNac, Estudiante_AnioIngreso, Estudiante_TipoSangre, Estudiante_Foto, Estudiante_Genero, Estudiante_Carnet, Estudiante_LugarTrabajo) values (?,?,?,?,?,?,?,?,?,?,?,?,?)");
		@mysqli_stmt_bind_param($stmt,'sssssssisssss',$_POST['ced'],$_POST['nombre'],$_POST['ape1'],$_POST['ape2'],$_POST['nac'],$_POST['email'], $nueva_fecha,$_POST['anioIngreso'],$_POST['blood'],$file_name,$_POST['genero'],$_POST['carnet'],$_POST['LugTrabajo']);
		@mysqli_stmt_execute($stmt);
		$sqlresult=mysqli_stmt_affected_rows($stmt);
		for ($i=0; $i< count($_POST['alergy']) ; $i++) { //insert alergias
			$stmt=mysqli_prepare($conn,"insert into tbl_alergia (Estudiante_Ced, Alergia_Nombre) values (?,?)");
			@mysqli_stmt_bind_param($stmt, 'ss',$_POST['ced'],$_POST['alergy'][$i]);
			@mysqli_stmt_execute($stmt);
		}
		$lugar="lectivo";
		$stmt= mysqli_prepare($conn,"insert into tbl_direccion (Estudiante_Ced, Direccion_Tipo, Direccion_Provincia, Direccion_Canton, Direccion_Distrito, Direccion_otras) values (?,?,?,?,?,?)");//insertar direccion de tiempo lectivo
		@mysqli_stmt_bind_param($stmt, 'ssssss',$_POST['ced'],$lugar,$_POST['provinciaCiclo'],$_POST['cantonCiclo'],$_POST['distritoCiclo'],$_POST['otrasCiclo']);
		@mysqli_stmt_execute($stmt);
		$lugar="Nolectivo";
		$stmt=  mysqli_prepare($conn,"insert into tbl_direccion (Estudiante_Ced, Direccion_Tipo, Direccion_Provincia, Direccion_Canton, Direccion_Distrito, Direccion_otras) values (?,?,?,?,?,?)");//insertar direccion de tiempo NO lectivo
		@mysqli_stmt_bind_param($stmt, 'ssssss',$_POST['ced'],$lugar,$_POST['provinciaNoCiclo'],$_POST['cantonNoCiclo'],$_POST['distritoNoCiclo'],$_POST['otrasNoCiclo']);
		@mysqli_stmt_execute($stmt);
		$lugar="trabajo";
		$stmt=  mysqli_prepare($conn,"insert into tbl_direccion (Estudiante_Ced, Direccion_Tipo, Direccion_Provincia, Direccion_Canton, Direccion_Distrito, Direccion_otras) values (?,?,?,?,?,?)");//insertar direccion de Trabajo
		@mysqli_stmt_bind_param($stmt, 'ssssss',$_POST['ced'],$lugar,$_POST['provinciaWork'],$_POST['cantonWork'],$_POST['distritoWork'],$_POST['otrosWork']);
		@mysqli_stmt_execute($stmt);
		for ($j=0; $j< count($_POST['EmergencyContact']) ; $j++) { //insert contacto de emergencias
			$stmt=mysqli_prepare($conn,"insert into tbl_emergencia (Estudiante_Ced, Emergencia_numero, Emergencia_contacto) values (?,?,?)");
			@mysqli_stmt_bind_param($stmt, 'sss',$_POST['ced'],$_POST['TelfEmergency'][$j],$_POST['EmergencyContact'][$j]);
			@mysqli_stmt_execute($stmt);
		}
		for ($k=0; $k< count($_POST['sick']) ; $k++) { //insert de enfermedades
			$stmt=mysqli_prepare($conn,"insert into tbl_enfermedad (Estudiante_Ced, Enfermedad_Nombre) values (?,?)");
			@mysqli_stmt_bind_param($stmt, 'ss',$_POST['ced'],$_POST['sick'][$k]);
			@mysqli_stmt_execute($stmt);
		}
		for ($l=0; $l< count($_POST['lesion']) ; $l++) { //insert de lesiones
			$stmt=mysqli_prepare($conn,"insert into tbl_lesion (Estudiante_Ced, Lesion_Nombre) values (?,?)");
			@mysqli_stmt_bind_param($stmt, 'ss',$_POST['ced'],$_POST['lesion'][$l]);
			@mysqli_stmt_execute($stmt);
		}
		for ($m=0; $m< count($_POST['meds']) ; $m++) { //insert de medicamentos
			$stmt=mysqli_prepare($conn,"insert into tbl_medicamento (Estudiante_Ced, Medicamento_Nombre) values (?,?)");
			@mysqli_stmt_bind_param($stmt, 'ss',$_POST['ced'],$_POST['meds'][$m]);
			@mysqli_stmt_execute($stmt);
		}
		for ($n=0; $n< count($_POST['need']) ; $n++) { //insert de necesidades especiales
			$stmt=mysqli_prepare($conn,"insert into tbl_necespeciales (Estudiante_Ced, Necespeciales_Detalle) values (?,?)");
			@mysqli_stmt_bind_param($stmt, 'ss',$_POST['ced'],$_POST['need'][$n]);
			@mysqli_stmt_execute($stmt);
		}
		//insert de telefonos
		$telf="habitacion";
		$stmt=mysqli_prepare($conn,"insert into tbl_telefono (Estudiante_Ced, Telefono_Tipo, Telefono_numero) values (?,?,?)");
		@mysqli_stmt_bind_param($stmt, 'sss',$_POST['ced'],$telf,$_POST['telfRoom']);
		@mysqli_stmt_execute($stmt);
		$telf="celular";
		$stmt=mysqli_prepare($conn,"insert into tbl_telefono (Estudiante_Ced, Telefono_Tipo, Telefono_numero) values (?,?,?)");
		@mysqli_stmt_bind_param($stmt, 'sss',$_POST['ced'],$telf,$_POST['telfCel']);
		@mysqli_stmt_execute($stmt);
		$telf="trabajo";
		$stmt=mysqli_prepare($conn,"insert into tbl_telefono (Estudiante_Ced, Telefono_Tipo, Telefono_numero) values (?,?,?)");
		mysqli_stmt_bind_param($stmt, 'sss',$_POST['ced'],$telf,$_POST['telfWork']);
		mysqli_stmt_execute($stmt);
		
		$stmt= mysqli_prepare($conn,"insert into carrera_estudiante (Carrera_Nombre, Estudiante_Ced) values (?,?)");
		mysqli_stmt_bind_param($stmt, 'ss',$_POST['carrera'] ,$_POST['ced']);
		mysqli_stmt_execute($stmt);
		//close connection and results
		@mysqli_stmt_close($stmt);
		@mysqli_close($conn); 
		if($sqlresult!=0 && $sqlresult!=-1 && $sqlresult!=null)
		{
			header('Location: ../estudiantes/index.php');
		}
		else {
			header('Location: ../error.php');
		}
	}
	else {
		echo "¡Error, no se recibieron los datos correctamente!";
	}
}
else{
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
