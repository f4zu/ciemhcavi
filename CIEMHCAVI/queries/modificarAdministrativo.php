<?php
include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
$profile="Admin";
$sqlresult;
$sqlresult1;
$date;
$carpeta="../FotosAdministrativos/";
$file_name;
$formatpic;



if($conn!=null){// verifica campos requeridos en caso de error en conexion
	if(isset($_POST['nombre']) && !empty($_POST['nombre']) &&
	isset($_POST['ape1']) && !empty($_POST['ape1']) &&
	isset($_POST['ced']) && !empty($_POST['ced']) &&
	isset($_POST['genero']) && !empty($_POST['genero']))
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
			$direccion=$_POST['provincia']."*".$_POST['canton']."*".$_POST['distrito']."*".$_POST['otras'];
			$stmt= mysqli_prepare($conn,"UPDATE tbl_administrativo SET Admin_Nombre=?, Admin_Ape1=?, Admin_Ap2=?, Admin_Nac=?, Admin_Tel=?, Admin_Dir=?, Admin_Email=?, Admin_FechaNac=?, Admin_Genero=?, Admin_Puesto=?, Admin_Foto=? WHERE Admin_Cedula=?");
			@mysqli_stmt_bind_param($stmt, 'ssssssssssss',$_POST['nombre'],$_POST['ape1'],$_POST['ape2'],$_POST['nac'],$_POST['telf'],$direccion,$_POST['email'],$nueva_fecha,$_POST['genero'],$_POST['puesto'],$_POST['ced'],$file_name);
			@mysqli_stmt_execute($stmt);
			$sqlresult1=mysqli_stmt_affected_rows($stmt);
			@mysqli_stmt_close($stmt);
			@mysqli_close($conn); 
		}
		else {
			$direccion=$_POST['provincia']."*".$_POST['canton']."*".$_POST['distrito']."*".$_POST['otras'];
			$stmt= mysqli_prepare($conn,"UPDATE tbl_administrativo SET Admin_Nombre=?, Admin_Ape1=?, Admin_Ap2=?, Admin_Nac=?, Admin_Tel=?, Admin_Dir=?, Admin_Email=?, Admin_FechaNac=?, Admin_Genero=?, Admin_Puesto=? WHERE Admin_Cedula=?");
			@mysqli_stmt_bind_param($stmt, 'sssssssssss',$_POST['nombre'],$_POST['ape1'],$_POST['ape2'],$_POST['nac'],$_POST['telf'],$direccion,$_POST['email'],$nueva_fecha,$_POST['genero'],$_POST['puesto'],$_POST['ced']);
			@mysqli_stmt_execute($stmt);
			$sqlresult1=mysqli_stmt_affected_rows($stmt);
			@mysqli_stmt_close($stmt);
			@mysqli_close($conn); 
		}
		if( $sqlresult1!=0 )
		{
			header('Location: ../admins/perfil.php');
		}
		else {
			echo"No se modifico ningun dato!";
			header('Location: ../admins/perfil.php');
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
