$(document).ready(function() {
	
	
	$("#comments").submit(function(event){
		event.preventDefault();
		var nombreEstudiante = $("#nomEst").html();
		var cedEstudiante= $("#cedEstudiante").val();
		var Usuario_Ced= $("#cedUser").val();
		var comentarioDetalle= $("#comment").val();
		$.post("../queries/addComentario.php",{cedEstudiante:cedEstudiante, Usuario_Ced:Usuario_Ced, comentarioDetalle:comentarioDetalle},function(result){
			if(result=="Confirmed"){
				window.location = "../estudiantes/comentarios.php";
			}else{
				alert(result);
			}
		});
	});
});
