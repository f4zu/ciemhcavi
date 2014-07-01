$(document).ready(function(){
	var cedEstudiante= localStorage.getItem('cedEst');
	var cedUser = $("#cedUser").val();
	$.post("../queries/loadComments.php",{cedEstudiante:cedEstudiante, cedUser:cedUser},function(result){
		$("#newComment").before(result);
		$("#comment").val("");
		$(".delComment").click(function(event){
		var cedDel = $(this).attr("id");
		var fecha= $(this).find("u").attr("id");
		$.post("../queries/deleteComments.php",{cedEstudiante:cedEstudiante, cedDel:cedDel,fecha:fecha},function(result){
			window.location = "../estudiantes/comentarios.php";
		});
	});
	});
});
