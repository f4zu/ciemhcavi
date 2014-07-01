$(document).ready(function() {
	
	
	$("#modificarCurso").submit(function(event){
		event.preventDefault();
		var nombre = $("#nombre").val();
		var codigo= $("#codigo").val();
		var carrera= $("#carrera").val();
		var tipo= $("#tipo").val();
		var creditos= $("#creditos").val();
		var ciclo= $("#ciclo").val();
		$.post("../queries/modificarCurso.php",{nombre:nombre, codigo:codigo, carrera:carrera, tipo:tipo, creditos:creditos, ciclo:ciclo},function(result){
			if(result=="Confirmed"){
				window.location = "../cursos/perfil.php"
			}else{
				alert(result);
			}
		});
	});
});