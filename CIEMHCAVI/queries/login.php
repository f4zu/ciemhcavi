<?php

session_start();

include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();

if($conn!=null){
	
	if(isset($_POST['userID']) && !empty($_POST['userID']) &&
	isset($_POST['password']) && !empty($_POST['password'])){
		
		$stmt =mysqli_prepare($conn,"select * from tbl_usuario where Usuario_Cedula=?");
		mysqli_stmt_bind_param($stmt, 's',$_POST['userID']);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt,$userID,$userPass,$userType,$userState);
		mysqli_stmt_fetch($stmt);
		mysqli_stmt_close($stmt);
		if($_POST['password'] == $userPass){
			$_SESSION['userID']=$userID;
			$_SESSION['userType']=$userType;
			if($userType=="Admin" OR $userType=="Director" OR $userType=="SubDirector" OR $userType=="Admin1" OR $userType=="Admin2"){
				$stmt =mysqli_prepare($conn,"select Admin_Nombre, Admin_Ape1, Admin_Foto from tbl_administrativo where Admin_Cedula=?");
				$dir="../FotosAdministrativos/";
			}else if($userType=="Doc"){
				$stmt =mysqli_prepare($conn,"select Docente_Nombre, Docente_Ape1, Docente_Foto from tbl_docente where Docente_Cedula=?");
				$dir="../FotosDocentes/";
			}
			@mysqli_stmt_bind_param($stmt,'s',$userID);
			@mysqli_stmt_execute($stmt);
			@mysqli_stmt_bind_result($stmt,$userName,$userApe1,$fotoName);
			@mysqli_stmt_fetch($stmt);
			@mysqli_stmt_close($stmt);
			$_SESSION['userFoto']=$dir.$fotoName;
			$_SESSION['userName']=$userName;
			$_SESSION['userApe1']=$userApe1;
			$_SESSION['AllowADD']=0;
			$_SESSION['AllowDEL']=0;
			if($userType=="Director" OR $userType=="SubDirector" OR $userType=="Admin1" OR $userType=="Admin2"){
				$_SESSION['AllowADD']=1;
				if($userType=="Director" OR $userType=="SubDirector"){
					$_SESSION['AllowDEL']=1;
				}
			}
			if($userState==0)//si es el primer ingreso al sistema
			{
				echo "FirstSign";
			}
			else {
				echo "Confirmed";
			}
		}else{
			echo "¡Error, usuario y/o contraseña incorrectos!";
		}
	
	}else{
		echo "¡Error, no se recibieron los datos correctamente!";
	}
		
}else{
	echo "¡Error, no se logro comunicar con el servidor!";
}

@mysqli_close($conn);

?>
