$(document).ready(function() {	
	var i=1;	
	$("#nombre").keyup(function(event){
		event.preventDefault();
		var nombre= $("#nombre").val();
		var ape1 = $("#ape1").val();
		var ape2 = $("#ape2").val();
		var carnet = $("#carnet").val();
		var carrera = $("#carrera option:selected").val();
		var cedula;
		if($("#cedula").val()=="0"){
			cedula="#°$"
		}else{
			cedula= $("#cedula").val();
		}
		
		$.post("../queries/searchEstu.php",{nombre:nombre, ape1:ape1, ape2:ape2, cedula:cedula, carnet:carnet, carrera:carrera},function(result){
			if(i==2)
			{
				$("#searchTable").remove();
				i=1;
				$("#tableResults").html("<table id='searchTable' class='results' width='100%'><tr><th>Nombre</th><th>Primer Apellido</th><th>Segundo Apellido</th><th>Cédula</th><th>Correo</th><th>Carnet</th></tr></table>");
			}
			$("#searchTable").append(result);
			i++;
			$("#searchTable tr").click(function(event){
			event.preventDefault();
			//Obtiene el valor de cada columna en la fila clickeada
			if($(this).find("td").eq(0).html()!=null){
			var nombre = $(this).find("td").eq(0).html();
			var ape1 = $(this).find("td").eq(1).html();
			var ape2 = $(this).find("td").eq(2).html();
			var cedula = $(this).find("td").eq(3).html();			
			var correo = $(this).find("td").eq(4).html();			
			var carnet = $(this).find("td").eq(5).html();
			
			//Asigna el valor a localstorage para cargarlo en el perfil.php
			localStorage.setItem('nombre',nombre);
			localStorage.setItem('ape1',ape1);
			localStorage.setItem('ape2',ape2);
			localStorage.setItem('cedula',cedula);
			localStorage.setItem('correo',correo);
			localStorage.setItem('carnet',carnet);
			
			window.location="perfil.php";
			}
			});
		});
	});
	
	$("#ape1").keyup(function(event){
		event.preventDefault();
		var nombre= $("#nombre").val();
		var ape1 = $("#ape1").val();
		var ape2 = $("#ape2").val();
		var carnet = $("#carnet").val();
		var carrera = $("#carrera option:selected").val();
		var cedula;
		if($("#cedula").val()=="0"){
			cedula="#°$"
		}else{
			cedula= $("#cedula").val();
		}
		
		$.post("../queries/searchEstu.php",{nombre:nombre, ape1:ape1, ape2:ape2, cedula:cedula, carnet:carnet, carrera:carrera},function(result){
			if(i==2)
			{
				$("#searchTable").remove();
				i=1;
				$("#tableResults").html("<table id='searchTable' class='results' width='100%'><tr><th>Nombre</th><th>Primer Apellido</th><th>Segundo Apellido</th><th>Cédula</th><th>Correo</th><th>Carnet</th></tr></table>");
			}
			$("#searchTable").append(result);
			i++;
			$("#searchTable tr").click(function(event){
			event.preventDefault();
			//Obtiene el valor de cada columna en la fila clickeada
			if($(this).find("td").eq(0).html()!=null){
			var nombre = $(this).find("td").eq(0).html();
			var ape1 = $(this).find("td").eq(1).html();
			var ape2 = $(this).find("td").eq(2).html();
			var cedula = $(this).find("td").eq(3).html();			
			var correo = $(this).find("td").eq(4).html();			
			var carnet = $(this).find("td").eq(5).html();
			
			//Asigna el valor a localstorage para cargarlo en el perfil.php
			localStorage.setItem('nombre',nombre);
			localStorage.setItem('ape1',ape1);
			localStorage.setItem('ape2',ape2);
			localStorage.setItem('cedula',cedula);
			localStorage.setItem('correo',correo);
			localStorage.setItem('carnet',carnet);
			
			window.location="perfil.php";
			}
			});
		});
	});
	
	
	$("#ape2").keyup(function(event){
		event.preventDefault();
		var nombre= $("#nombre").val();
		var ape1 = $("#ape1").val();
		var ape2 = $("#ape2").val();
		var carnet = $("#carnet").val();
		var carrera = $("#carrera option:selected").val();
		var cedula;
		if($("#cedula").val()=="0"){
			cedula="#°$"
		}else{
			cedula= $("#cedula").val();
		}
		
		$.post("../queries/searchEstu.php",{nombre:nombre, ape1:ape1, ape2:ape2, cedula:cedula, carnet:carnet, carrera:carrera},function(result){
			if(i==2)
			{
				$("#searchTable").remove();
				i=1;
				$("#tableResults").html("<table id='searchTable' class='results' width='100%'><tr><th>Nombre</th><th>Primer Apellido</th><th>Segundo Apellido</th><th>Cédula</th><th>Correo</th><th>Carnet</th></tr></table>");
			}
			$("#searchTable").append(result);
			i++;
			$("#searchTable tr").click(function(event){
			event.preventDefault();
			//Obtiene el valor de cada columna en la fila clickeada
			if($(this).find("td").eq(0).html()!=null){
			var nombre = $(this).find("td").eq(0).html();
			var ape1 = $(this).find("td").eq(1).html();
			var ape2 = $(this).find("td").eq(2).html();
			var cedula = $(this).find("td").eq(3).html();			
			var correo = $(this).find("td").eq(4).html();			
			var carnet = $(this).find("td").eq(5).html();
			
			//Asigna el valor a localstorage para cargarlo en el perfil.php
			localStorage.setItem('nombre',nombre);
			localStorage.setItem('ape1',ape1);
			localStorage.setItem('ape2',ape2);
			localStorage.setItem('cedula',cedula);
			localStorage.setItem('correo',correo);
			localStorage.setItem('carnet',carnet);
			
			window.location="perfil.php";
			}
			});
		});
	});
	
	$("#cedula").keyup(function(event){
		event.preventDefault();
		var nombre= $("#nombre").val();
		var ape1 = $("#ape1").val();
		var ape2 = $("#ape2").val();
		var carnet = $("#carnet").val();
		var carrera = $("#carrera option:selected").val();
		var cedula;
		if($("#cedula").val()=="0"){
			cedula="#°$"
		}else{
			cedula= $("#cedula").val();
		}
		
		$.post("../queries/searchEstu.php",{nombre:nombre, ape1:ape1, ape2:ape2, cedula:cedula, carnet:carnet, carrera:carrera},function(result){
			if(i==2)
			{
				$("#searchTable").remove();
				i=1;
				$("#tableResults").html("<table id='searchTable' class='results' width='100%'><tr><th>Nombre</th><th>Primer Apellido</th><th>Segundo Apellido</th><th>Cédula</th><th>Correo</th><th>Carnet</th></tr></table>");
			}
			$("#searchTable").append(result);
			i++;
			$("#searchTable tr").click(function(event){
			event.preventDefault();
			//Obtiene el valor de cada columna en la fila clickeada
			if($(this).find("td").eq(0).html()!=null){
			var nombre = $(this).find("td").eq(0).html();
			var ape1 = $(this).find("td").eq(1).html();
			var ape2 = $(this).find("td").eq(2).html();
			var cedula = $(this).find("td").eq(3).html();			
			var correo = $(this).find("td").eq(4).html();			
			var carnet = $(this).find("td").eq(5).html();
			
			//Asigna el valor a localstorage para cargarlo en el perfil.php
			localStorage.setItem('nombre',nombre);
			localStorage.setItem('ape1',ape1);
			localStorage.setItem('ape2',ape2);
			localStorage.setItem('cedula',cedula);
			localStorage.setItem('correo',correo);
			localStorage.setItem('carnet',carnet);
			
			window.location="perfil.php";
			}
			});
		});
	});
	
	$("#carnet").keyup(function(event){
		event.preventDefault();
		var nombre= $("#nombre").val();
		var ape1 = $("#ape1").val();
		var ape2 = $("#ape2").val();
		var carnet = $("#carnet").val();
		var carrera = $("#carrera option:selected").val();
		var cedula;
		if($("#cedula").val()=="0"){
			cedula="#°$"
		}else{
			cedula= $("#cedula").val();
		}
		
		$.post("../queries/searchEstu.php",{nombre:nombre, ape1:ape1, ape2:ape2, cedula:cedula, carnet:carnet, carrera:carrera},function(result){
			if(i==2)
			{
				$("#searchTable").remove();
				i=1;
				$("#tableResults").html("<table id='searchTable' class='results' width='100%'><tr><th>Nombre</th><th>Primer Apellido</th><th>Segundo Apellido</th><th>Cédula</th><th>Correo</th><th>Carnet</th></tr></table>");
			}
			$("#searchTable").append(result);
			i++;
			$("#searchTable tr").click(function(event){
			event.preventDefault();
			//Obtiene el valor de cada columna en la fila clickeada
			if($(this).find("td").eq(0).html()!=null){
			var nombre = $(this).find("td").eq(0).html();
			var ape1 = $(this).find("td").eq(1).html();
			var ape2 = $(this).find("td").eq(2).html();
			var cedula = $(this).find("td").eq(3).html();			
			var correo = $(this).find("td").eq(4).html();			
			var carnet = $(this).find("td").eq(5).html();
			
			//Asigna el valor a localstorage para cargarlo en el perfil.php
			localStorage.setItem('nombre',nombre);
			localStorage.setItem('ape1',ape1);
			localStorage.setItem('ape2',ape2);
			localStorage.setItem('cedula',cedula);
			localStorage.setItem('correo',correo);
			localStorage.setItem('carnet',carnet);
			
			window.location="perfil.php";
			}
			});
		});
	});
	
	$("#options").change(function(event){
		event.preventDefault();
		var nombre= $("#nombre").val();
		var ape1 = $("#ape1").val();
		var ape2 = $("#ape2").val();
		var carnet = $("#carnet").val();
		var carrera = $("#carrera option:selected").val();
		var cedula;
		if($("#cedula").val()=="0"){
			cedula="#°$"
		}else{
			cedula= $("#cedula").val();
		}
		
		$.post("../queries/searchEstu.php",{nombre:nombre, ape1:ape1, ape2:ape2, cedula:cedula, carnet:carnet, carrera:carrera},function(result){
			if(i==2)
			{
				$("#searchTable").remove();
				i=1;
				$("#tableResults").html("<table id='searchTable' class='results' width='100%'><tr><th>Nombre</th><th>Primer Apellido</th><th>Segundo Apellido</th><th>Cédula</th><th>Correo</th><th>Carnet</th></tr></table>");
			}
			$("#searchTable").append(result);
			i++;
			$("#searchTable tr").click(function(event){
			event.preventDefault();
			//Obtiene el valor de cada columna en la fila clickeada
			if($(this).find("td").eq(0).html()!=null){
			var nombre = $(this).find("td").eq(0).html();
			var ape1 = $(this).find("td").eq(1).html();
			var ape2 = $(this).find("td").eq(2).html();
			var cedula = $(this).find("td").eq(3).html();			
			var correo = $(this).find("td").eq(4).html();			
			var carnet = $(this).find("td").eq(5).html();
			
			//Asigna el valor a localstorage para cargarlo en el perfil.php
			localStorage.setItem('nombre',nombre);
			localStorage.setItem('ape1',ape1);
			localStorage.setItem('ape2',ape2);
			localStorage.setItem('cedula',cedula);
			localStorage.setItem('correo',correo);
			localStorage.setItem('carnet',carnet);
			
			window.location="perfil.php";
			}
			});
		});
	});
});