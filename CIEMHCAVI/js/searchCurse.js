$(document).ready(function() {

	// desde aqui empiezan eventos de crear la tabla
	var i=1;
	$("#nombre").keyup(function(event){
		event.preventDefault();
		var nombre = $("#nombre").val();
		var tipo = $("#tipo option:selected").text();
		var creditos = $("#creditos").val();		
		var carrera = $("#carrera option:selected").val();
		var codigo;
		if($("#codigo").val()=="0"){
			codigo="#°$"
		}else{
			codigo= $("#codigo").val();
		}
		
		$.post("../queries/searchCurse.php",{nombre:nombre, codigo:codigo, creditos:creditos, carrera:carrera, tipo:tipo},function(result){
			if(i==2)
			{
				$("#searchTable").remove();// se cambia x remove se quita el dive tableResults y se agregar la linea de creacion de la tabla
				i=1;
				// al hacer un remove hay q crear la tabla no se puede hacer con empty ya q solo vacea la tabla y no inserta de nuevo
				$("#tableResults").html("<table id='searchTable' class='results' width='100%'><tr><th>Nombre</th><th>Código</th><th>Tipo</th><th>Creditos</th><th>Carrera</th></tr></table>");
			}
			$("#searchTable").append(result);
			i++;
			$("#searchTable tr").click(function(event){// el evento hay q agregarlo dentro del contexto creo q se creo la tabla este evento tiene q estar en todots 
			event.preventDefault();
			//Obtiene el valor de cada columna en la fila clickeada
			if($(this).find("td").eq(0).html()!=null){
			var nombre = $(this).find("td").eq(0).html();
			var codigo = $(this).find("td").eq(1).html();
			var tipo = $(this).find("td").eq(2).html();
			var creditos = $(this).find("td").eq(3).html();			
			var carrera = $(this).find("td").eq(4).html();
			
			//Asigna el valor a localstorage para cargarlo en el perfil.php
			localStorage.setItem('nombre',nombre);
			localStorage.setItem('codigo',codigo);
			localStorage.setItem('tipo',tipo);
			localStorage.setItem('creditos',creditos);
			localStorage.setItem('carrera',carrera);
			
			window.location="perfil.php";
			}
			});
		});
	});
	
	$("#codigo").keyup(function(event){
		event.preventDefault();
		var nombre = $("#nombre").val();
		var tipo = $("#tipo option:selected").text();
		var creditos = $("#creditos").val();		
		var carrera = $("#carrera option:selected").val();
		var codigo;
		if($("#codigo").val()=="0"){
			codigo="#°$"
		}else{
			codigo= $("#codigo").val();
		}
		
		$.post("../queries/searchCurse.php",{nombre:nombre, codigo:codigo, creditos:creditos, carrera:carrera, tipo:tipo},function(result){
			if(i==2)
			{
				$("#searchTable").remove();
				i=1;
				$("#tableResults").html("<table id='searchTable' class='results' width='100%'><tr><th>Nombre</th><th>Código</th><th>Tipo</th><th>Creditos</th><th>Carrera</th></tr></table>");
			}
			$("#searchTable").append(result);
			i++;
			$("#searchTable tr").click(function(event){
			event.preventDefault();
			//Obtiene el valor de cada columna en la fila clickeada
			if($(this).find("td").eq(0).html()!=null){
			var nombre = $(this).find("td").eq(0).html();
			var codigo = $(this).find("td").eq(1).html();
			var tipo = $(this).find("td").eq(2).html();
			var creditos = $(this).find("td").eq(3).html();			
			var carrera = $(this).find("td").eq(4).html();
			
			//Asigna el valor a localstorage para cargarlo en el perfil.php
			localStorage.setItem('nombre',nombre);
			localStorage.setItem('codigo',codigo);
			localStorage.setItem('tipo',tipo);
			localStorage.setItem('creditos',creditos);
			localStorage.setItem('carrera',carrera);
			
			window.location="perfil.php";
			}
			});
		});
	});
	
	
	$("#creditos").keyup(function(event){
		event.preventDefault();
		var nombre = $("#nombre").val();
		var tipo = $("#tipo option:selected").text();
		var creditos = $("#creditos").val();		
		var carrera = $("#carrera option:selected").val();
		var codigo;
		if($("#codigo").val()=="0"){
			codigo="#°$"
		}else{
			codigo= $("#codigo").val();
		}
		
		$.post("../queries/searchCurse.php",{nombre:nombre, codigo:codigo, creditos:creditos, carrera:carrera, tipo:tipo},function(result){
			if(i==2)
			{
				$("#searchTable").remove();
				i=1;
				$("#tableResults").html("<table id='searchTable' class='results' width='100%'><tr><th>Nombre</th><th>Código</th><th>Tipo</th><th>Creditos</th><th>Carrera</th></tr></table>");
			}
			$("#searchTable").append(result);
			i++;
			$("#searchTable tr").click(function(event){
			event.preventDefault();
			//Obtiene el valor de cada columna en la fila clickeada
			if($(this).find("td").eq(0).html()!=null){
			var nombre = $(this).find("td").eq(0).html();
			var codigo = $(this).find("td").eq(1).html();
			var tipo = $(this).find("td").eq(2).html();
			var creditos = $(this).find("td").eq(3).html();			
			var carrera = $(this).find("td").eq(4).html();
			
			//Asigna el valor a localstorage para cargarlo en el perfil.php
			localStorage.setItem('nombre',nombre);
			localStorage.setItem('codigo',codigo);
			localStorage.setItem('tipo',tipo);
			localStorage.setItem('creditos',creditos);
			localStorage.setItem('carrera',carrera);
			
			window.location="perfil.php";
			}
			});
		});
	});
	
	$("#creditos").change(function(event){
		event.preventDefault();
		var nombre = $("#nombre").val();
		var tipo = $("#tipo option:selected").text();
		var creditos = $("#creditos").val();		
		var carrera = $("#carrera option:selected").val();
		var codigo;
		if($("#codigo").val()=="0"){
			codigo="#°$"
		}else{
			codigo= $("#codigo").val();
		}
		
		$.post("../queries/searchCurse.php",{nombre:nombre, codigo:codigo, creditos:creditos, carrera:carrera, tipo:tipo},function(result){
			if(i==2)
			{
				$("#searchTable").remove();
				i=1;
				$("#tableResults").html("<table id='searchTable' class='results' width='100%'><tr><th>Nombre</th><th>Código</th><th>Tipo</th><th>Creditos</th><th>Carrera</th></tr></table>");
			}
			$("#searchTable").append(result);
			i++;
			$("#searchTable tr").click(function(event){
			event.preventDefault();
			//Obtiene el valor de cada columna en la fila clickeada
			if($(this).find("td").eq(0).html()!=null){
			var nombre = $(this).find("td").eq(0).html();
			var codigo = $(this).find("td").eq(1).html();
			var tipo = $(this).find("td").eq(2).html();
			var creditos = $(this).find("td").eq(3).html();			
			var carrera = $(this).find("td").eq(4).html();
			
			//Asigna el valor a localstorage para cargarlo en el perfil.php
			localStorage.setItem('nombre',nombre);
			localStorage.setItem('codigo',codigo);
			localStorage.setItem('tipo',tipo);
			localStorage.setItem('creditos',creditos);
			localStorage.setItem('carrera',carrera);
			
			window.location="perfil.php";
			}
			});
		});
	});
	
	$("#tipo").change(function(event){
		event.preventDefault();
		var nombre = $("#nombre").val();
		var tipo = $("#tipo option:selected").text();
		var creditos = $("#creditos").val();		
		var carrera = $("#carrera option:selected").val();
		var codigo;
		if($("#codigo").val()=="0"){
			codigo="#°$"
		}else{
			codigo= $("#codigo").val();
		}
		
		$.post("../queries/searchCurse.php",{nombre:nombre, codigo:codigo, creditos:creditos, carrera:carrera, tipo:tipo},function(result){
			if(i==2)
			{
				$("#searchTable").remove();
				i=1;
				$("#tableResults").html("<table id='searchTable' class='results' width='100%'><tr><th>Nombre</th><th>Código</th><th>Tipo</th><th>Creditos</th><th>Carrera</th></tr></table>");
			}
			$("#searchTable").append(result);
			i++;
			$("#searchTable tr").click(function(event){
			event.preventDefault();
			//Obtiene el valor de cada columna en la fila clickeada
			if($(this).find("td").eq(0).html()!=null){
			var nombre = $(this).find("td").eq(0).html();
			var codigo = $(this).find("td").eq(1).html();
			var tipo = $(this).find("td").eq(2).html();
			var creditos = $(this).find("td").eq(3).html();			
			var carrera = $(this).find("td").eq(4).html();
			
			//Asigna el valor a localstorage para cargarlo en el perfil.php
			localStorage.setItem('nombre',nombre);
			localStorage.setItem('codigo',codigo);
			localStorage.setItem('tipo',tipo);
			localStorage.setItem('creditos',creditos);
			localStorage.setItem('carrera',carrera);
			
			window.location="perfil.php";
			}
			});
		});
	});
	
	$("#options").change(function(event){
		event.preventDefault();
		var nombre = $("#nombre").val();
		var tipo = $("#tipo option:selected").text();
		var creditos = $("#creditos").val();		
		var carrera = $("#carrera option:selected").val();
		var codigo;
		if($("#codigo").val()=="0"){
			codigo="#°$"
		}else{
			codigo= $("#codigo").val();
		}
		
		$.post("../queries/searchCurse.php",{nombre:nombre, codigo:codigo, creditos:creditos, carrera:carrera, tipo:tipo},function(result){
			if(i==2)
			{
				$("#searchTable").remove();
				i=1;
				$("#tableResults").html("<table id='searchTable' class='results' width='100%'><tr><th>Nombre</th><th>Código</th><th>Tipo</th><th>Creditos</th><th>Carrera</th></tr></table>");
			}
			$("#searchTable").append(result);
			i++;
			$("#searchTable tr").click(function(event){
			event.preventDefault();
			//Obtiene el valor de cada columna en la fila clickeada
			if($(this).find("td").eq(0).html()!=null){
			var nombre = $(this).find("td").eq(0).html();
			var codigo = $(this).find("td").eq(1).html();
			var tipo = $(this).find("td").eq(2).html();
			var creditos = $(this).find("td").eq(3).html();			
			var carrera = $(this).find("td").eq(4).html();
			
			//Asigna el valor a localstorage para cargarlo en el perfil.php
			localStorage.setItem('nombre',nombre);
			localStorage.setItem('codigo',codigo);
			localStorage.setItem('tipo',tipo);
			localStorage.setItem('creditos',creditos);
			localStorage.setItem('carrera',carrera);
			
			window.location="perfil.php";
			}
			});
		});
	});
	
});
