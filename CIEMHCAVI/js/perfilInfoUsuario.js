$(document).ready(function() {
    //Form Autofill
    var usuarioCed=$("#usuarioCed").val();
	
	
	$.post("../queries/perfilInfoUsuario.php",{usuarioCed:usuarioCed},function(result){
	var infoUsuario=result.split("*");
	$("#nombre").val(infoUsuario[2]);
	$("#ape1").val(infoUsuario[3]);
	$("#ape2").val(infoUsuario[4]);
	$("#telf").val(infoUsuario[6]);
	$("#provincia").val(infoUsuario[7]);
	$("#canton").val(infoUsuario[8]);
	$("#distrito").val(infoUsuario[9]);
	$("#otras").val(infoUsuario[10]);
	if(infoUsuario[13]=="masculino"){
	$("#masculino").prop("checked", "checked");
	}
	else{
	$("#femenino").prop("checked", "checked");
	}
	
	$("#fechaNac").val(infoUsuario[12]);
	$("#usuarioCorreo").val(infoUsuario[11]);
	
	//foto 14
	if(infoUsuario[0]=="Admin"||infoUsuario[0]=="Director"||infoUsuario[0]=="Admin1"||infoUsuario[0]=="Admin2"||infoUsuario[0]=="SubDirector"){
	if(infoUsuario[14]=="default-user-picture.png"){
	$("#img_infoUser").attr("src", "../imgs/default-user-picture.png");
	}//fin del if
	else{
	$("#img_infoUser").attr("src", "../FotosAdministrativos/"+infoUsuario[14]+"");
	}//fin del else
	}//fin del if de admin
	
	else{
	if(infoUsuario[14]=="default-user-picture.png"){
	$("#img_infoUser").attr("src", "../imgs/default-user-picture.png");
	}//fin del if
	else{
	$("#img_infoUser").attr("src", "../FotosDocentes/"+infoUsuario[14]+"");
	}//fin del else
	}//fin del else de doc
	
    });
	
		
});
