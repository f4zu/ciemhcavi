$(document).ready(function() {
	
	$("#addCarrera").submit(function(event){
		event.preventDefault();
		var nombre=$("#nombre").val();
		var codigo=$("#codigo").val();
		$.post("../queries/addCarrera.php",{nombre:nombre, codigo:codigo},function(result){
			if(result=="Confirmed"){
				window.location = "../carreras/index.php"
			}else{
				alert(result);
			}
		});
	});
});