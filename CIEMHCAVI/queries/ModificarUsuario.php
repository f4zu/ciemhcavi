<?php
include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
if($conn!=null){
	if(isset($_POST['ced']) && !empty($_POST['ced']) &&
	isset($_POST['clave']) && !empty($_POST['clave']))
	{
		$stmt= mysqli_prepare($conn,"UPDATE tbl_usuario SET Usuario_Clave=?  WHERE Usuario_Cedula=?");
		@mysqli_stmt_bind_param($stmt,'ss',$_POST['clave'],$_POST['ced']);
		@mysqli_stmt_execute($stmt);
		$sqlresult=mysqli_stmt_affected_rows($stmt);
		@mysqli_stmt_close($stmt);
		@mysqli_close($conn); 
		if($sqlresult!=0 && $sqlresult!=-1 && $sqlresult!=null)
		{
			echo "Confirmed";
		}
	}
	else {
		echo "¡Error, no se recibieron los datos correctamente!";
	}
}
else{
	echo "¡Error, no se logro comunicar con el servidor!";
}
@mysqli_close($conn);
?>