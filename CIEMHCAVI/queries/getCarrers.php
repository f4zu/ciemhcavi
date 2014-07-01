<?php
include 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->connection();
if($conn!=null){
	$stmt= mysqli_prepare($conn,"select Carrera_Nombre from tbl_carrera");
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt,$nombre);
	$html="<select id='carrera' style='width: 383px' class='unselected' name='carrera' required='required'><option value=''>Seleccione una...</option>";
	while(mysqli_stmt_fetch($stmt))
	{
		$html= $html."<option value='".$nombre."'>".$nombre."</option>";
	}
	$html=$html."</select>";
	@mysqli_stmt_close($stmt);
	@mysqli_close($conn); 
	echo $html;	
}
else{
	echo "¡Error, no se logro comunicar con el servidor!";
}
@mysqli_close($conn); 
?>