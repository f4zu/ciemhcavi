<?php

include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
if($conn!=null){
	$stmt= mysqli_prepare($conn,"delete from tbl_comentarios where Usuario_Ced=?");
	@mysqli_stmt_bind_param($stmt,'s', $_POST['idUser']);
	@mysqli_stmt_execute($stmt);
	@mysqli_stmt_close($stmt);
	$stmt= mysqli_prepare($conn,"delete from tbl_administrativo where Admin_Cedula=?");
	@mysqli_stmt_bind_param($stmt,'s', $_POST['idUser']);
	@mysqli_stmt_execute($stmt);
	@mysqli_stmt_close($stmt);
	$stmt= mysqli_prepare($conn,"delete from tbl_usuario where Usuario_Cedula=?");
	@mysqli_stmt_bind_param($stmt,'s', $_POST['idUser']);
	@mysqli_stmt_execute($stmt);
}
else{
	echo "¡Error, no se logro comunicar con el servidor!";
}
@mysqli_stmt_close($stmt);
@mysqli_close($conn);  
?>
		