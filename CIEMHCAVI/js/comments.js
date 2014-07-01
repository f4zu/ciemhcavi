$(document).ready(function(){
	
	//Agregar Comentario
	$("#comments").submit(function(){
		$("#newComment").before("<tr><td><br /><p><strong>"+$("#user_name").html()+": </strong> "+$("#comment").val()+"</p><hr /><i class='date'>"+new Date()+"<i></td>\
		<td><u class='delComment'>Borrar Comentario</u></td></tr>");
		$("#comment").val("");
	});
	
	//Boton borrar comentario		
	$(document).on("click",".delComment",function(){
		$(this).parent().parent().remove();
	});


});