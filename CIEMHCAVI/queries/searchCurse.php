<?php

include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
if($conn!=null){
	$tempTipo = $_POST['tipo'];
	$tempCarrera = $_POST['carrera'];
	if($tempTipo == 'Seleccione uno...'){ $tempTipo = '';}
	if($tempCarrera == 'Seleccione una...'){ $tempCarrera = '';}
	if(!empty($_POST['nombre']) || !empty($_POST['codigo']) || !empty($_POST['creditos']) || !empty($tempTipo) || !empty($tempCarrera))
	{
		$espNombre="%".$_POST['nombre']."%";
		$espCreditos="%".$_POST['creditos']."%";
		$espCarrera="%".$tempCarrera."%";
		$espTipo="%".$tempTipo."%";
		if($_POST['codigo']=="#°$")
		{
			$stmt= mysqli_prepare($conn,"select Curso_Codigo, Curso_Creditos, Curso_Tipo, Curso_Nombre, Carrera_Nombre from tbl_curso where  Curso_Nombre LIKE ? and Curso_Codigo LIKE '%0%' and Curso_Creditos LIKE ? and Carrera_Nombre LIKE ? and Curso_Tipo LIKE ?");
			@mysqli_stmt_bind_param($stmt, 'ssss' ,$espNombre, $espCreditos, $espCarrera, $espTipo);
		}
		else
		{
			$espCodigo="%".$_POST['codigo']."%";
			$stmt= mysqli_prepare($conn,"select Curso_Codigo, Curso_Creditos, Curso_Tipo, Curso_Nombre, Carrera_Nombre from tbl_curso where  Curso_Nombre LIKE ? and Curso_Codigo LIKE ? and Curso_Creditos LIKE ? and Carrera_Nombre LIKE ? and Curso_Tipo LIKE ?");
			@mysqli_stmt_bind_param($stmt, 'sssss' ,$espNombre, $espCodigo, $espCreditos, $espCarrera, $espTipo);
		}
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$codigo,$creditos,$tipo, $nombre, $carrera);
		$html="";
		while(mysqli_stmt_fetch($stmt))
		{
			$html= $html."<tr><td>".$nombre."</td>"."<td>".$codigo."</td>"."<td>".$tipo."</td>"."<td>".$creditos."</td>"."<td>".$carrera."</td>"."</tr>";// a cada tr le agrego el id q va x el id princip[al de la tabla para q se sepa quien activo el evento]
		}
		mysqli_stmt_close($stmt);
		mysqli_close($conn); 
		echo $html;	
	}
}
else{
	echo "¡Error, no se logro comunicar con el servidor!";
}
	/*
	if(isset($_POST['nombre']) && empty($_POST['nombre']) &&// si los campos estan vacios no realiza la busqueda
	isset($_POST['carrera']) && empty($_POST['carrera']) &&
	isset($_POST['tipo']) && empty($_POST['tipo']) &&
	isset($_POST['creditos']) && empty($_POST['creditos']))
	{
		echo"Campos vacios no se pudo realizar busqueda";
	}
	else {
		if(!empty($_POST['nombre']) && !empty($_POST['carrera'])&& !empty($_POST['tipo'])&& !empty($_POST['creditos']))
		{
			$stmt= mysqli_prepare($conn,"select * from tbl_curso where  Curso_Creditos=? && Curso_Tipo=? && Curso_Nombre=? && Carrera_Nombre=?");
			mysqli_stmt_bind_param($stmt, 'isss' ,$_POST['tipo'],$_POST['nombre'],$_POST['carrera']);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt,$codigo,$creditos,$tipo, $nombre, $carrera);
			$html="<table class='results' width='100%'><th>Nombre</th><th>Código</th><th>Tipo</th><th>Creditos</th><th>Carrera<th/>";
			while(mysqli_stmt_fetch($stmt))
			{
					$html= $html."<tr><td>".$nombre."</td>"."<td>".$codigo."</td>"."<td>".$tipo."</td>"."<td>".$creditos."</td>"."<td>".$carrera."</td>"."</tr>";
			}
			$html=$html."</table>";
			echo "string";
			
		}
	}
}
else{
	echo "¡Error, no se logro comunicar con el servidor!";
}
*/
?>