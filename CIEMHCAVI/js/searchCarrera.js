$(document).ready(function() {
	var i=1;	
	$("#nombre").keyup(function(event){
		event.preventDefault();
		var nombre= $("#nombre").val();
		var codigo;
		if($("#codigo").val()=="0"){
			codigo="#°$"
		}else{
			codigo= $("#codigo").val();
		}
		
		$.post("../queries/searchCarrera.php",{nombre:nombre, codigo:codigo},function(result){
			if(i==2)
			{
				$("#searchTable").remove();
				i=1;
				$("#tableResults").html("<table id='searchTable' class='results' width='100%'><tr><th>Nombre</th><th>Código</th></tr></table>");
			}
			$("#searchTable").append(result);
			i++;
			$("#searchTable tr").click(function(event){
			event.preventDefault();
			//Obtiene el valor de cada columna en la fila clickeada
			if($(this).find("td").eq(0).html()!=null){
			var nombre = $(this).find("td").eq(0).html();
			var codigo = $(this).find("td").eq(1).html();
			
			//Asigna el valor a localstorage para cargarlo en el perfil.php
			localStorage.setItem('nombre',nombre);
			localStorage.setItem('codigo',codigo);
			
			window.location="perfil.php";
			}
			});
		});
	});
	
	$("#codigo").keyup(function(event){
		event.preventDefault();
		var nombre= $("#nombre").val();
		var codigo;
		if($("#codigo").val()=="0"){
			codigo="#°$"
		}else{
			codigo= $("#codigo").val();
		}
		$.post("../queries/searchCarrera.php",{nombre:nombre, codigo:codigo},function(result){
			if(i==2)
			{
				$("#searchTable").remove();
				i=1;
				$("#tableResults").html("<table id='searchTable' class='results' width='100%'><tr><th>Nombre</th><th>Código</th></tr></table>");
			}
			$("#searchTable").append(result);
			i++;
			$("#searchTable tr").click(function(event){
			event.preventDefault();
			//Obtiene el valor de cada columna en la fila clickeada
			if($(this).find("td").eq(0).html()!=null){
			var nombre = $(this).find("td").eq(0).html();
			var codigo = $(this).find("td").eq(1).html();
			
			//Asigna el valor a localstorage para cargarlo en el perfil.php
			localStorage.setItem('nombre',nombre);
			localStorage.setItem('codigo',codigo);
			
			window.location="perfil.php";
			}
			});
		});
	});
	
});
