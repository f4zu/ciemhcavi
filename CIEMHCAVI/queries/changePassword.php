<?php

include 'Conexion.php';
$conexion = new Conexion();
$conn = $conexion->connection();
$error=FALSE;

if($conn!=null){
    if(isset($_POST['current']) && !empty($_POST['current']) &&
    isset($_POST['newone']) && !empty($_POST['newone']) &&
    isset($_POST['confirm']) && !empty($_POST['confirm']))
    {
        $stmt =mysqli_prepare($conn,"select Usuario_Clave from tbl_usuario where Usuario_Cedula=?");
        mysqli_stmt_bind_param($stmt, 's',$_POST['userId']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt,$userPass);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
        if($_POST['current'] != $userPass){
        	$error=TRUE;
            echo "Wrong";
        }
        if($_POST['newone']!=$_POST['confirm'])
        {
        	$error=TRUE;
            echo "No Match";
        }
        else {
        	if($error!=TRUE)
			{
            	$val=1;
            	$stmt= mysqli_prepare($conn,"update tbl_usuario set Usuario_Clave= ?, Usuario_State= ? where Usuario_Cedula= ?");
            	mysqli_stmt_bind_param($stmt, 'sis', $_POST['newone'], $val,$_POST['userId']);
            	mysqli_stmt_execute($stmt);
            	$sqlresult=mysqli_stmt_affected_rows($stmt);
            	mysqli_stmt_close($stmt);
            	if($sqlresult!=0 && $sqlresult!=-1 && $sqlresult!=null)
            	{
               	 	echo "Confirmed";
            	}
            	else {
                	echo "Wrong";
            	}
			}
        }
    }
    else {
        echo "Se dio un error por favor intente de nuevo";
    }
}
else {
    echo "No se conecto al servidor";
}
mysqli_close($conn);
?>
