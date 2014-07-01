$(document).ready(function() {
	
	
	$("#addCurse").submit(function(event){
		event.preventDefault();
		var nombre = $("#nombre").val();
		var codigo= $("#codigo").val();
		var carrera= $("#carrera").val();
		var tipo= $("#tipo").val();
		var creditos= $("#creditos").val();
		var ciclo= $("#ciclo").val();
		$.post("../queries/addCurso.php",{nombre:nombre, codigo:codigo, carrera:carrera, tipo:tipo, creditos:creditos, ciclo:ciclo},function(result){
			if(result=="Confirmed"){
				window.location = "../cursos/index.php"
			}else{
				alert(result);
			}
		});
	});
});