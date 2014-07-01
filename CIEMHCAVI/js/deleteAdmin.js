$(document).ready(function(){
	
	$("#delete").click(function(){
		if(confirm("\n¿Esta seguro que desea eliminar a "+$(".ID").val()+" del sistema?"))
		{
			var idUser= $("#ced").val();
			$.post("../queries/deleteAdmin.php",{idUser:idUser},function(result){
				window.location="../admins/index.php";
			});
		}
	});
});