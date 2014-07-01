$(document).ready(function() {
	
	$("#modificarCarrera").submit(function(event){
		event.preventDefault();
		var nombre=$("#nombre").val();
		var codigo=$("#codigo").val();
		$.post("../queries/ModificarCarrera.php",{nombre:nombre, codigo:codigo},function(result){
			
                        if(result=="Confirmed"){
				window.location = "../carreras/perfil.php";
			}else{
				alert(result);
			}
		});
	});
});
