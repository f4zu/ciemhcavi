<?php

session_start();

include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
$date;
$carpeta="../FotosAdministrativos/";
$carpeta2="../FotosDocentes/";
$file_name;
$formatpic;
if($conn!=null){
	if(isset($_POST['ced']) && !empty($_POST['ced']))
	{
		$espCedula=$_POST['ced'];
		$stmt= mysqli_prepare($conn,"select Usuario_Tipo from tbl_usuario where Usuario_Cedula = ?");
		@mysqli_stmt_bind_param($stmt, 's' , $espCedula);
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$tipo);
		@mysqli_stmt_fetch($stmt);
		@mysqli_stmt_close($stmt);
		
		if($tipo=="Admin" OR $tipo=="Director" OR $tipo=="SubDirector" OR $tipo=="Admin1" OR $tipo=="Admin2"){
			opendir($carpeta);
			if(!empty($_FILES['photo']['name']))
			{
				$destino= $carpeta.$_FILES['photo']['name'];
				$tempFile = $_FILES["photo"]["tmp_name"];
				$formatpic= explode(".", $_FILES["photo"]["name"]);//get the format of the pic
				$_FILES["photo"]["name"]= $_POST['ced'].".".$formatpic[1];// this is to change the name of the pic to a file name which will be unique for the user
				$file_name = $_FILES["photo"]["name"];	
				move_uploaded_file($tempFile,$carpeta.$file_name);
				
				$nueva_fecha=formato_fecha($_POST['fecha'],'Y-m-d');
				$direccion=$_POST['provincia']."*".$_POST['canton']."*".$_POST['distrito']."*".$_POST['otras'];
				$stmt= mysqli_prepare($conn,"UPDATE tbl_administrativo SET Admin_Nombre=?, Admin_Ape1=?, Admin_Ap2=?, Admin_Nac=?, Admin_Tel=?, Admin_Dir=?, Admin_Email=?, Admin_FechaNac=?, Admin_Genero=?, Admin_Foto=? WHERE Admin_Cedula=?");
				@mysqli_stmt_bind_param($stmt, 'sssssssssss',$_POST['nombre'],$_POST['ape1'],$_POST['ape2'],$_POST['nac'],$_POST['telf'],$direccion,$_POST['correo'],$nueva_fecha,$_POST['genero'],$file_name,$_POST['ced']);
				@mysqli_stmt_execute($stmt);
				$sqlresult1=mysqli_stmt_affected_rows($stmt);
				@mysqli_stmt_close($stmt);
				$_SESSION['userFoto']=$carpeta.$file_name;
				
				
			}//fin de if de foto
			else{
				$nueva_fecha=formato_fecha($_POST['fecha'],'Y-m-d');
				$direccion=$_POST['provincia']."*".$_POST['canton']."*".$_POST['distrito']."*".$_POST['otras'];
				$stmt= mysqli_prepare($conn,"UPDATE tbl_administrativo SET Admin_Nombre=?, Admin_Ape1=?, Admin_Ap2=?, Admin_Nac=?, Admin_Tel=?, Admin_Dir=?, Admin_Email=?, Admin_FechaNac=?, Admin_Genero=? WHERE Admin_Cedula=?");
				@mysqli_stmt_bind_param($stmt, 'ssssssssss',$_POST['nombre'],$_POST['ape1'],$_POST['ape2'],$_POST['nac'],$_POST['telf'],$direccion,$_POST['correo'],$nueva_fecha,$_POST['genero'],$_POST['ced']);
				@mysqli_stmt_execute($stmt);
				$sqlresult1=mysqli_stmt_affected_rows($stmt);
				@mysqli_stmt_close($stmt);
			}//fin de else de foto
			
			if( $sqlresult1!=0 )
			{
				$_SESSION['userName']=$_POST['nombre'];
				$_SESSION['userApe1']=$_POST['ape1'];
				header('Location: ../user/index.php');
			}
			else {
				echo"No se modifico ningun dato!";
				header('Location: ../user/index.php');
			}
			
		}else{
			opendir($carpeta2);
			if(!empty($_FILES['photo']['name']))
			{
				$destino= $carpeta.$_FILES['photo']['name'];
				$tempFile = $_FILES["photo"]["tmp_name"];
				$formatpic= explode(".", $_FILES["photo"]["name"]);//get the format of the pic
				$_FILES["photo"]["name"]= $_POST['ced'].".".$formatpic[1];// this is to change the name of the pic to a file name which will be unique for the user
				$file_name = $_FILES["photo"]["name"];	
				move_uploaded_file($tempFile,$carpeta2.$file_name);
				
				$nueva_fecha=formato_fecha($_POST['fecha'],'Y-m-d');
				$direccion=$_POST['provincia']."*".$_POST['canton']."*".$_POST['distrito']."*".$_POST['otras'];
				$stmt= mysqli_prepare($conn,"UPDATE tbl_docente SET Docente_Nombre=?, Docente_Ape1=?, Docente_Ap2=?, Docente_Nac=?, Docente_Tel=?, Docente_Dir=?, Docente_Email=?, Docente_FechaNac=?, Docente_Genero=?, Docente_Foto=? WHERE Docente_Cedula=?");
				@mysqli_stmt_bind_param($stmt, 'sssssssssss',$_POST['nombre'],$_POST['ape1'],$_POST['ape2'],$_POST['nac'],$_POST['telf'],$direccion,$_POST['correo'],$nueva_fecha,$_POST['genero'],$file_name,$_POST['ced']);
				@mysqli_stmt_execute($stmt);
				$sqlresult1=mysqli_stmt_affected_rows($stmt);
				@mysqli_stmt_close($stmt);
				$_SESSION['userFoto']=$carpeta2.$file_name;
				
			}//fin de if de foto
			else{
				$nueva_fecha=formato_fecha($_POST['fecha'],'Y-m-d');
				$direccion=$_POST['provincia']."*".$_POST['canton']."*".$_POST['distrito']."*".$_POST['otras'];
				$stmt= mysqli_prepare($conn,"UPDATE tbl_docente SET Docente_Nombre=?, Docente_Ape1=?, Docente_Ap2=?, Docente_Nac=?, Docente_Tel=?, Docente_Dir=?, Docente_Email=?, Docente_FechaNac=?, Docente_Genero=? WHERE Docente_Cedula=?");
				@mysqli_stmt_bind_param($stmt, 'ssssssssss',$_POST['nombre'],$_POST['ape1'],$_POST['ape2'],$_POST['nac'],$_POST['telf'],$direccion,$_POST['correo'],$nueva_fecha,$_POST['genero'],$_POST['ced']);
				@mysqli_stmt_execute($stmt);
				$sqlresult1=mysqli_stmt_affected_rows($stmt);
				@mysqli_stmt_close($stmt);
			}//fin del else de foto
			
			if( $sqlresult1!=0 )
			{
				$_SESSION['userName']=$_POST['nombre'];
				$_SESSION['userApe1']=$_POST['ape1'];
				header('Location: ../user/index.php');
			}
			else {
				echo"No se modifico ningun dato!";
				header('Location: ../user/index.php');
			}
		
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
