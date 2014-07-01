$(document).ready(function() {
    //Form Autofill
    var docenteCed=localStorage.getItem('cedula');
    $.post("../queries/perfilDocente.php",{docenteCed:docenteCed},function(result){
	var info=result.split("*");
    $("#ced").val(info[0]);
	$("#nombre").val(info[1]);
	$("#ape1").val(info[2]);
	$("#ape2").val(info[3]);
	$("#nacionalidad").val(info[4]);
	$("#tel").val(info[5]);
	$("#provincia").val(info[6]);
	$("#canton").val(info[7]);
	$("#distrito").val(info[8]);
	$("#otras").val(info[9]);
	$("#email").val(info[10]);
	$("#fechaNac").val(info[11]);
	if(info[12]=="masculino"){
	$("#masculino").prop("checked", "checked");
	}
	else{
	$("#femenino").prop("checked", "checked");
	}
	//aca hacer la foto
	if(info[13]==""){
	$("#img_doc").attr("src", "../imgs/default-user-picture.png");
	}//fin del if
	else{
	$("#img_doc").attr("src", "../FotosDocentes/"+info[13]+"");
	}//fin del else
    });
	
		
});