$(document).ready(function(){
	
	$("#delete").click(function(){
		if(confirm("\n¿Esta seguro que desea eliminar a "+$(".ID").val()+" del sistema?"))
		{
			var idUser= $("#ced").val();
			$.post("../queries/deleteDocente.php",{idUser:idUser},function(result){
			window.location="../docentes/index.php";
		});
		}
	});
});