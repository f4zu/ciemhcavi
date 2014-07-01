<?php
include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
$sqlresult;

if($conn!=null){
        $stmt=mysqli_prepare($conn,"delete from tbl_alergia WHERE Estudiante_Ced=? ");
		@mysqli_stmt_bind_param($stmt, 's',$_POST['cedOculta']);
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_close($stmt);
		
		$stmt=mysqli_prepare($conn,"delete from tbl_emergencia WHERE Estudiante_Ced=? ");
		@mysqli_stmt_bind_param($stmt, 's',$_POST['cedOculta']);
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_close($stmt);
		
		$stmt=mysqli_prepare($conn,"delete from tbl_enfermedad WHERE Estudiante_Ced=? ");
		@mysqli_stmt_bind_param($stmt, 's',$_POST['cedOculta']);
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_close($stmt);
		
		$stmt=mysqli_prepare($conn,"delete from tbl_lesion WHERE Estudiante_Ced=? ");
		@mysqli_stmt_bind_param($stmt, 's',$_POST['cedOculta']);
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_close($stmt);
		
		$stmt=mysqli_prepare($conn,"delete from tbl_medicamento WHERE Estudiante_Ced=? ");
		@mysqli_stmt_bind_param($stmt, 's',$_POST['cedOculta']);
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_close($stmt);
		
		$stmt=mysqli_prepare($conn,"delete from tbl_necespeciales WHERE Estudiante_Ced=? ");
		@mysqli_stmt_bind_param($stmt, 's',$_POST['cedOculta']);
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_close($stmt);
		
		
		for ($i=0; $i< count($_POST['alergy']) ; $i++) { //insert alergias
			$stmt=mysqli_prepare($conn,"insert into tbl_alergia (Estudiante_Ced, Alergia_Nombre) values (?,?)");
			@mysqli_stmt_bind_param($stmt, 'ss',$_POST['cedOculta'],$_POST['alergy'][$i]);
			@mysqli_stmt_execute($stmt);
		}
		for ($j=0; $j< count($_POST['EmergencyContact']) ; $j++) { //insert contacto de emergencias
			$stmt=mysqli_prepare($conn,"insert into tbl_emergencia (Estudiante_Ced, Emergencia_numero, Emergencia_contacto) values (?,?,?)");
			@mysqli_stmt_bind_param($stmt, 'sss',$_POST['cedOculta'],$_POST['TelfEmergency'][$j],$_POST['EmergencyContact'][$j]);
			@mysqli_stmt_execute($stmt);
		}
		for ($k=0; $k< count($_POST['sick']) ; $k++) { //insert de enfermedades
			$stmt=mysqli_prepare($conn,"insert into tbl_enfermedad (Estudiante_Ced, Enfermedad_Nombre) values (?,?)");
			@mysqli_stmt_bind_param($stmt, 'ss',$_POST['cedOculta'],$_POST['sick'][$k]);
			@mysqli_stmt_execute($stmt);
		}
		for ($l=0; $l< count($_POST['lesion']) ; $l++) { //insert de lesiones
			$stmt=mysqli_prepare($conn,"insert into tbl_lesion (Estudiante_Ced, Lesion_Nombre) values (?,?)");
			@mysqli_stmt_bind_param($stmt, 'ss',$_POST['cedOculta'],$_POST['lesion'][$l]);
			@mysqli_stmt_execute($stmt);
		}
		for ($m=0; $m< count($_POST['meds']) ; $m++) { //insert de medicamentos
			$stmt=mysqli_prepare($conn,"insert into tbl_medicamento (Estudiante_Ced, Medicamento_Nombre) values (?,?)");
			@mysqli_stmt_bind_param($stmt, 'ss',$_POST['cedOculta'],$_POST['meds'][$m]);
			@mysqli_stmt_execute($stmt);
		}
		for ($n=0; $n< count($_POST['need']) ; $n++) { //insert de necesidades especiales
			$stmt=mysqli_prepare($conn,"insert into tbl_necespeciales (Estudiante_Ced, Necespeciales_Detalle) values (?,?)");
			@mysqli_stmt_bind_param($stmt, 'ss',$_POST['cedOculta'],$_POST['need'][$n]);
			@mysqli_stmt_execute($stmt);
		}
		//close connection and results
		@mysqli_stmt_close($stmt);
		@mysqli_close($conn);
		header('Location: ../estudiantes/perfil.php');

}
else{
	echo "¡Error, no se logro comunicar con el servidor!";
}
@mysqli_close($conn);
?>
