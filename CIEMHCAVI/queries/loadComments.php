<?php

include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
$html="";
if($conn!=null){
	$stmt= mysqli_prepare($conn,"select Usuario_Tipo from tbl_usuario where Usuario_Cedula=?");
	@mysqli_stmt_bind_param($stmt,'s',$_POST['cedUser']);
	@mysqli_stmt_execute($stmt);
	@mysqli_stmt_bind_result($stmt,$userType);
	mysqli_stmt_fetch($stmt);
	@mysqli_query($conn,"SET lc_time_names = 'es_ES'" );
	@mysqli_stmt_close($stmt);
	date_default_timezone_set('America/Costa_Rica');
	$hoy = date("Y-m-d H:i:s");  
	$hoyValid=new DateTime($hoy);

	if($userType=="Doc")
	{
		$stmt= mysqli_prepare($conn,"(select A.Admin_Nombre, A.Admin_Ape1, Date_Format(Co.Comentario_Fecha,'%d %M %Y %r'), 							Co.Comentario_Detalle, Co.Comentario_Fecha, Co.Usuario_Ced from tbl_comentarios Co, tbl_estudiante 							E, tbl_administrativo A where E.Estudiante_Cedula=? And E.Estudiante_Cedula=Co.Estudiante_Ced And 							A.Admin_Cedula=Co.Usuario_Ced) 
						UNION
 						(select D.Docente_Nombre,D.Docente_Ape1, Date_Format(Co.Comentario_Fecha,'%d %M %Y %r'), 							Co.Comentario_Detalle,Co.Comentario_Fecha, Co.Usuario_Ced from tbl_comentarios Co, tbl_estudiante E, 							tbl_docente D where E.Estudiante_Cedula=? And E.Estudiante_Cedula=Co.Estudiante_Ced And 						D.Docente_Cedula=Co.Usuario_Ced)order  by Comentario_Fecha DESC");
		@mysqli_stmt_bind_param($stmt,'ss',$_POST['cedEstudiante'],$_POST['cedEstudiante']);
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$nameUser,$ape1user,$fecha,$comentario,$fechaSQL,$userCed);
		while(mysqli_stmt_fetch($stmt))
		{	
			$html= $html."<tr><td><br /><p><strong>".$nameUser." ".$ape1user.": </strong> ".$comentario."</p><hr /><i class='date'> Fecha: ".$fecha."<i></td>"; 
			$validDate= new DateTime($fechaSQL);
			$interval= date_diff($validDate, $hoyValid);
			if($userCed==$_POST['cedUser'] && $interval->format('%a')<1)
			{
				$html=$html."<td class='delComment' id='".$userCed."'><u id='".$fechaSQL."'>Borrar Comentario</u></td>";
			}
			$html=$html."</tr>";
		}
		echo $html;
	}
	else if($userType=="Director" || $userType=="SubDirector"){
		$stmt= mysqli_prepare($conn,"(select A.Admin_Nombre, A.Admin_Ape1, Date_Format(Co.Comentario_Fecha,'%d %M %Y %r'), 							Co.Comentario_Detalle, Co.Comentario_Fecha, Co.Usuario_Ced from tbl_comentarios Co, tbl_estudiante 							E, tbl_administrativo A where E.Estudiante_Cedula=? And E.Estudiante_Cedula=Co.Estudiante_Ced And 							A.Admin_Cedula=Co.Usuario_Ced) 
						UNION
 						(select D.Docente_Nombre,D.Docente_Ape1, Date_Format(Co.Comentario_Fecha,'%d %M %Y %r'), 							Co.Comentario_Detalle,Co.Comentario_Fecha, Co.Usuario_Ced from tbl_comentarios Co, tbl_estudiante E, 							tbl_docente D where E.Estudiante_Cedula=? And E.Estudiante_Cedula=Co.Estudiante_Ced And 						D.Docente_Cedula=Co.Usuario_Ced)order  by Comentario_Fecha DESC");
		@mysqli_stmt_bind_param($stmt,'ss',$_POST['cedEstudiante'],$_POST['cedEstudiante']);
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$nameUser,$ape1user,$fecha,$comentario,$fechaSQL,$userCed);
		while(mysqli_stmt_fetch($stmt))
		{	
			$html= $html."<tr id=".$userCed."><td><br /><p><strong>".$nameUser." ".$ape1user.": </strong> ".$comentario."</p><hr /><i class='date'> Fecha: ".$fecha."<i></td>"; 
			$html=$html."<td class='delComment' id='".$userCed."'><u id='".$fechaSQL."'>Borrar Comentario</u></td>";
			$html=$html."</tr>";
		}
		echo $html;
	}
	else {
		$stmt= mysqli_prepare($conn," select A.Admin_Nombre, A.Admin_Ape1, Date_Format(Co.Comentario_Fecha,'%d %M %Y %r'), Co.Comentario_Detalle, Co.Comentario_Fecha, Co.Usuario_Ced from tbl_comentarios Co, tbl_estudiante E, tbl_administrativo A where E.Estudiante_Cedula=? And E.Estudiante_Cedula=Co.Estudiante_Ced And A.Admin_Cedula=Co.Usuario_Ced order by Co.Comentario_Fecha DESC");
		@mysqli_stmt_bind_param($stmt,'s',$_POST['cedEstudiante']);
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$nameUser,$ape1user,$fecha,$comentario,$fechaSQL,$userCed);
		while(mysqli_stmt_fetch($stmt))
		{	
			$html= $html."<tr><td><br /><p><strong>".$nameUser." ".$ape1user.": </strong> ".$comentario."</p><hr /><i class='date'> Fecha: ".$fecha."<i></td>";
			$validDate= new DateTime($fechaSQL);
			$interval= date_diff($validDate, $hoyValid);
			if($userCed==$_POST['cedUser'] && $interval->format('%a')<1)
			{
				$html=$html."<td class='delComment' id='".$userCed."'><u id='".$fechaSQL."'>Borrar Comentario</u></td>";
			}
			$html=$html."</tr>";
		}
		echo $html;
	}
}
else{
	echo "¡Error, no se logro comunicar con el servidor!";
}
@mysqli_stmt_close($stmt);
@mysqli_close($conn);  
?>
