<?php

include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
if($conn!=null){
	$stmt= mysqli_prepare($conn,"delete from tbl_comentarios where Estudiante_Ced=?");
	@mysqli_stmt_bind_param($stmt,'s', $_POST['idUser']);
	@mysqli_stmt_execute($stmt);
	@mysqli_stmt_close($stmt);
	$stmt= mysqli_prepare($conn,"delete from tbl_alergia where Estudiante_Ced=?");
	@mysqli_stmt_bind_param($stmt,'s', $_POST['idUser']);
	@mysqli_stmt_execute($stmt);
	@mysqli_stmt_close($stmt);
	$stmt= mysqli_prepare($conn,"delete from tbl_direccion where Estudiante_Ced=?");
	@mysqli_stmt_bind_param($stmt,'s', $_POST['idUser']);
	@mysqli_stmt_execute($stmt);
	@mysqli_stmt_close($stmt);
	$stmt= mysqli_prepare($conn,"delete from tbl_emergencia where Estudiante_Ced=?");
	@mysqli_stmt_bind_param($stmt,'s', $_POST['idUser']);
	@mysqli_stmt_execute($stmt);
	@mysqli_stmt_close($stmt);
	$stmt= mysqli_prepare($conn,"delete from tbl_enfermedad where Estudiante_Ced=?");
	@mysqli_stmt_bind_param($stmt,'s', $_POST['idUser']);
	@mysqli_stmt_execute($stmt);
	@mysqli_stmt_close($stmt);
	$stmt= mysqli_prepare($conn,"delete from tbl_lesion where Estudiante_Ced=?");
	@mysqli_stmt_bind_param($stmt,'s', $_POST['idUser']);
	@mysqli_stmt_execute($stmt);
	@mysqli_stmt_close($stmt);
	$stmt= mysqli_prepare($conn,"delete from tbl_medicamento where Estudiante_Ced=?");
	@mysqli_stmt_bind_param($stmt,'s', $_POST['idUser']);
	@mysqli_stmt_execute($stmt);
	@mysqli_stmt_close($stmt);
	$stmt= mysqli_prepare($conn,"delete from tbl_necespeciales where Estudiante_Ced=?");
	@mysqli_stmt_bind_param($stmt,'s', $_POST['idUser']);
	@mysqli_stmt_execute($stmt);
	@mysqli_stmt_close($stmt);
	$stmt= mysqli_prepare($conn,"delete from tbl_telefono where Estudiante_Ced=?");
	@mysqli_stmt_bind_param($stmt,'s', $_POST['idUser']);
	@mysqli_stmt_execute($stmt);
	@mysqli_stmt_close($stmt);
	$stmt= mysqli_prepare($conn,"delete from carrera_estudiante where Estudiante_Ced=?");
	@mysqli_stmt_bind_param($stmt,'s', $_POST['idUser']);
	@mysqli_stmt_execute($stmt);
	@mysqli_stmt_close($stmt);
	$stmt= mysqli_prepare($conn,"delete from tbl_estudiante where Estudiante_Cedula=?");
	@mysqli_stmt_bind_param($stmt,'s', $_POST['idUser']);
	@mysqli_stmt_execute($stmt);
}
else{
	echo "¡Error, no se logro comunicar con el servidor!";
}
@mysqli_stmt_close($stmt);
@mysqli_close($conn);  
?>
	