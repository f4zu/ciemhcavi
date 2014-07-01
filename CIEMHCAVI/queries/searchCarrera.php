<?php

include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
if($conn!=null){
	if(!empty($_POST['nombre']) || !empty($_POST['codigo']))
	{
		$espNombre="%".$_POST['nombre']."%";
		if($_POST['codigo']=="#°$")
		{
			$stmt= mysqli_prepare($conn,"select * from tbl_carrera where  Carrera_Nombre LIKE ? and Carrera_Codigo LIKE '%0%'");
			@mysqli_stmt_bind_param($stmt, 's' ,$espNombre);
		}
		else
		{
			$espCodigo="%".$_POST['codigo']."%";
			$stmt= mysqli_prepare($conn,"select * from tbl_carrera where  Carrera_Nombre LIKE ? and Carrera_Codigo LIKE ?");
			@mysqli_stmt_bind_param($stmt, 'ss' ,$espNombre, $espCodigo);
		}
		@mysqli_stmt_execute($stmt);
		@mysqli_stmt_bind_result($stmt,$nombre,$codigo);
		$html="";
		while(mysqli_stmt_fetch($stmt))
		{
			$html= $html."<tr><td>".$nombre."</td>"."<td>".$codigo."</td>"."</tr>";
		}
		@mysqli_stmt_close($stmt);
		@mysqli_close($conn); 
		echo $html;	
	}
	
}
else{
	echo "¡Error, no se logro comunicar con el servidor!";
}
@mysqli_close($conn); 
?>
