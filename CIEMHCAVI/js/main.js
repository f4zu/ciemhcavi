$(document).ready(function() {


//-------------------------------------fotos-------------------------------------------------------------------------------
     var cedUsuarioFoto=$("#cedulaUsuario").val();
     var fotoUsuario=$("#UsuarioFoto").val();
     $("#img_user").attr("src", fotoUsuario);
	


	//Animacion Principal
	$(".content").hide();
	$(".content").show(1000);
	
	//Nombre de Usuario en todas las etiquetas de clase "userName"
	$(".userName").prepend($("#user_name").html());
	
	//Clases unselected
	$(".unselected").val("");
	
	
//--------------------------------------------------Seccion Info Usuario---------------------------------------------------	
	//Link Actualizar Informacion
	$("#userName").click(function(){
		window.location = "../user/index.php";
	});
	
	//Confirmacion de salir 
	$("#salir").click(function(){
		if(confirm("\n¿Esta seguro que desea salir?")){
			window.location = "../index.html";
		}
	});
//---------------------------------------------------------------------------------------------------------------------
	
	
//-------------------------------------------------Barra de navegacion-------------------------------------------------
	//Td's
	$("#admins").click(function() {window.location="../admins/index.php";});
	$("#docentes").click(function() {window.location="../docentes/index.php";});		
	$("#estudiantes").click(function() {window.location="../estudiantes/index.php";});	
	$("#carreras").click(function() {window.location="../carreras/index.php";});	
	$("#cursos").click(function() {window.location="../cursos/index.php";});
	
	//Links
	$("#admins a").click(function() {window.location="../admins/index.php";	});	
	$("#docentes a").click(function() {window.location="../docentes/index.php";});	
	$("#estudiantes a").click(function() {window.location="../estudiantes/index.php";});
	$("#carreras a").click(function() {window.location="../carreras/index.php";});
	$("#cursos a").click(function() {window.location="../cursos/index.php";});
//---------------------------------------------------------------------------------------------------------------------
	
	
	
//------------------------------------------Botones Agregar NUevo en Busquedas-----------------------------------------
	//Estudiantes, Docentes, Administrativos
	$("#addSearch").click(function(){
		localStorage.setItem('nombre',$("#nombre").val());
		localStorage.setItem('ape1',$("#ape1").val());
		localStorage.setItem('ape2',$("#ape2").val());
		localStorage.setItem('cedula',$("#cedula").val());
		localStorage.setItem('carrera',$("#carrera").val());
		localStorage.setItem('edad',$("#edad").val());
		
		window.location="agregar.php";
	});
	//Cursos
	$("#addSearchCurs").click(function(){
		localStorage.setItem('nombre',$("#nombre").val());
		localStorage.setItem('codigo',$("#codigo").val());
		localStorage.setItem('tipo',$("#tipo").val());
		localStorage.setItem('carrera',$("#carrera").val());
		localStorage.setItem('creditos',$("#creditos").val());
		
		window.location="agregar.php";
	});
	//Carreras
	$("#addSearchCarrer").click(function(){
		localStorage.setItem('nombre',$("#nombre").val());
		localStorage.setItem('codigo',$("#codigo").val());;
		
		window.location="agregar.php";
	});
//---------------------------------------------------------------------------------------------------------------------

	//Links tablas de resultados de busquedas
	$(".results td").click(function(){
		window.location="perfil.php";
	});

	//Submit
	$(".formConfirm").submit(function(){
		return confirm("\n¿Esta seguro que desea agregar esta información al sistema?");
	});
});

