$(document).ready(function(){
	
	$("#deleteEst").click(function(){
		if(confirm("\n¿Esta seguro que desea eliminar a "+$(".ID").val()+" del sistema?"))
		{
			var idUser= $("#ced").val();
			$.post("../queries/deleteEstudiante.php",{idUser:idUser},function(result){
			window.location="../estudiantes/index.php";
		});
		}
	});
});