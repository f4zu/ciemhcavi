<?php
include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
$profile="Doc";
$sqlresult;
$sqlresult1;
$date;
$carpeta="../FotosDocentes/";
$file_name;
$formatpic;



if($conn!=null){// verifica campos requeridos en caso de error en conexion
	if(isset($_POST['nombre']) && !empty($_POST['nombre']) &&
	isset($_POST['ape1']) && !empty($_POST['ape1']) &&
	isset($_POST['ced']) && !empty($_POST['ced']) &&
	isset($_POST['pass']) && !empty($_POST['pass']) &&
	isset($_POST['genero']) && !empty($_POST['genero']))
	{
		// This insert into table tbl_usuario
		$val=0;
		$stmt= mysqli_prepare($conn,"insert into tbl_usuario (Usuario_Cedula, Usuario_Clave, Usuario_Tipo, Usuario_State) values (?,?,?,?)");
		@mysqli_stmt_bind_param($stmt, 'sssi', $_POST['ced'], $_POST['pass'], $profile, $val);
		@mysqli_stmt_execute($stmt);
		$sqlresult=mysqli_stmt_affected_rows($stmt);
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
		}
		else {
			$file_name="default-user-picture.png";
		}
		// This will insert into tbl_docente
		$direccion=$_POST['provincia']."*".$_POST['canton']."*".$_POST['distrito']."*".$_POST['otras'];
		$stmt= mysqli_prepare($conn,"insert into tbl_docente (Docente_Cedula, Docente_Nombre, Docente_Ape1, Docente_Ap2, Docente_Nac, Docente_Tel, Docente_Dir, Docente_Email, Docente_FechaNac, Docente_Genero, Docente_Foto) values (?,?,?,?,?,?,?,?,?,?,?)");
		@mysqli_stmt_bind_param($stmt, 'sssssssssss',$_POST['ced'],$_POST['nombre'],$_POST['ape1'],$_POST['ape2'],$_POST['nac'],$_POST['telf'],$direccion,$_POST['email'],$nueva_fecha,$_POST['genero'],$file_name);
		@mysqli_stmt_execute($stmt);
		$sqlresult1=mysqli_stmt_affected_rows($stmt);
		@mysqli_stmt_close($stmt);
		if($sqlresult!=0 && $sqlresult1!=0 && $sqlresult!=-1 && $sqlresult1!=-1 && $sqlresult!=null && $sqlresult1!=null)
		{
			header('Location: ../docentes/index.php');
		}
		else {
			header('Location: ../error.php');
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
