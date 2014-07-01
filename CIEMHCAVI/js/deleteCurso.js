$(document).ready(function(){
	
	$("#delete").click(function(){
		if(confirm("\n¿Esta seguro que desea eliminar a "+$(".ID").val()+" del sistema?"))
		{
			var idCurso= $("#codigo").val();
			$.post("../queries/deleteCurso.php",{idCurso:idCurso},function(result){
				window.location="../cursos/index.php";
			});
		}
	});
});