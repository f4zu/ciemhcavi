$(document).ready(function() {
    //Form Autofill
    var estCed=localStorage.getItem('cedula');
	
    $.post("../queries/EstCarrera.php",{estCed:estCed},function(result){
    $("#carrera").val(result);
    });
	
    $.post("../queries/perfilEstudiante.php",{estCed:estCed},function(result){
	var info=result.split("*");
	$("#EstCedOculta").val(info[0]);
    $("#ced").val(info[0]);
	$("#nombre").val(info[1]);
	$("#ape1").val(info[2]);
	$("#ape2").val(info[3]);
	$("#nacionalidad").val(info[4]);
	$("#email").val(info[5]);
	$("#fechaNac").val(info[6]);
	$("#tipoSangre").val(info[7]);
	if(info[9]=="masculino"){
	$("#masculino").prop("checked", "checked");
	}
	else{
	$("#femenino").prop("checked", "checked");
	}
	$("#carnet").val(info[10]);
	$("#lugarTrabajo").val(info[11]);
	$("#provinciaLectivo").val(info[12]);
	$("#cantonLectivo").val(info[13]);
	$("#distritoLectivo").val(info[14]);
	$("#otrasLectivo").val(info[15]);
	$("#provinciaNoLectivo").val(info[16]);
	$("#cantonNoLectivo").val(info[17]);
	$("#distritoNoLectivo").val(info[18]);
	$("#otrasNoLectivo").val(info[19]);
	$("#provinciaTrabajo").val(info[20]);
	$("#cantonTrabajo").val(info[21]);
	$("#distritoTrabajo").val(info[22]);
	$("#otrasTrabajo").val(info[23]);
	$("#telCelular").val(info[24]);
	$("#telHabitacion").val(info[25]);
	$("#telTrabajo").val(info[26]);
	$("#anioIngreso").val(info[27]);
	
	if(info[8]=="default-user-picture.png"){
	$("#img_est").attr("src", "../imgs/default-user-picture.png");
	}//fin del if
	else{
	$("#img_est").attr("src", "../FotosEstudiantes/"+info[8]+"");
	}//fin del else
	
    });
	
	
	$.post("../queries/EstEmergencias.php",{estCed:estCed},function(result){
	var emergencias=result.split("*");
	var contador=emergencias.length;
	var inicio=1;
	var inicioV=2;
	$("#estEmerNombre").val(emergencias[1]);
	$("#estEmerTelf").val(emergencias[2]);
	//$("#estEmerTelf").after("<input type='button' value='Eliminar' id='EliminarAlergia'/>");
	while(contador!=3){
	$("#emergencyTel"+inicio).after("<tr id='emergencyTel"+ ++inicio +"'><td align='right'>Emergencias Contactar a:</td><td><input id='estEmerNombre"+ inicio +"' type='text' size='34' required='required' /><input id='estEmerTelf"+ inicio +"' type='text' size='16' required='required' /></td></tr>");
	$("#estEmerNombre"+inicio).val(emergencias[++inicioV]);
	$("#estEmerTelf"+inicio).val(emergencias[++inicioV]);
	//$("#estEmerTelf"+inicio).after("<input type='button' value='Eliminar' id='EliminarEnf'/>");
	contador=contador-2;
	}//fin del while
    });
	
	
	$.post("../queries/EstEnfermedades.php",{estCed:estCed},function(result){
	var enfermedad=result.split("*");
	var contador=enfermedad.length;
	var inicio=1;
	$("#estEnfer").val(enfermedad[1]);
	//$("#estEnfer").after("<input type='button' value='Eliminar' id='EliminarEnf'/>");
	while(contador!=2){
	$("#enfermedad"+inicio).after("<tr id='enfermedad"+ ++inicio +"'><td align='right'>Enfermedad:</td><td><input id='estEnfer"+ inicio +"' type='text' size='54' required='required' name='sick[]'/></td></tr>");
	$("#estEnfer"+inicio).val(enfermedad[inicio]);
	//$("#estEnfer"+inicio).after("<input type='button' value='Eliminar' id='EliminarEnf'/>");
	contador=contador-1;
	}//fin del while
    });
	
	$.post("../queries/EstAlergias.php",{estCed:estCed},function(result){
	var alergias=result.split("*");
	var contador=alergias.length;
	var inicio=1;
	$("#estAlergia").val(alergias[1]);
	//$("#estAlergia").after("<input type='button' value='Eliminar' id='EliminarAlergia'/>");
	while(contador!=2){
	$("#alergia"+inicio).after("<tr id='alergia"+ ++inicio +"'><td align='right'>Alergia:</td><td><input id='estAlergia"+ inicio +"' type='text' size='54' required='required' name='alergy[]' /></td></tr>");
	$("#estAlergia"+inicio).val(alergias[inicio]);
	//$("#estAlergia"+inicio).after("<input type='button' value='Eliminar' id='EliminarEnf'/>");
	contador=contador-1;
	}//fin del while
    });
	
	$.post("../queries/EstLesiones.php",{estCed:estCed},function(result){
	var lesiones=result.split("*");
	var contador=lesiones.length;
	var inicio=1;
	$("#estLesion").val(lesiones[1]);
	//$("#estLesion").after("<input type='button' value='Eliminar' id='EliminarLesion'/>");
	while(contador!=2){
	$("#lesion"+inicio).after("<tr id='lesion"+ ++inicio +"'><td align='right'>Lesion:</td><td><input id='estLesion"+ inicio +"' type='text' size='54' required='required' name='lesion[]'/></td></tr>");
	$("#estLesion"+inicio).val(lesiones[inicio]);
	//$("#estLesion"+inicio).after("<input type='button' value='Eliminar' id='EliminarEnf'/>");
	contador=contador-1;
	}//fin del while
    });
	
	$.post("../queries/EstNecEspeciales.php",{estCed:estCed},function(result){
	var especiales=result.split("*");
	var contador=especiales.length;
	var inicio=1;
	$("#estNecEspecial").val(especiales[1]);
	//$("#estNecEspecial").after("<input type='button' value='Eliminar' id='EliminarNecEspecial'/>");
	while(contador!=2){
	$("#necesidad"+inicio).after("<tr id='necesidad"+ ++inicio +"'><td align='right'>Necesidad especial:</td><td><input id='estNecEspecial"+ inicio +"' type='text' size='54' required='required' name='need[]'/></td></tr>");
	$("#estNecEspecial"+inicio).val(especiales[inicio]);
	//$("#estNecEspecial"+inicio).after("<input type='button' value='Eliminar' id='EliminarEnf'/>");
	contador=contador-1;
	}//fin del while
    });
	
	$.post("../queries/EstMedicamentos.php",{estCed:estCed},function(result){
	var medicamentos=result.split("*");
	var contador=medicamentos.length;
	var inicio=1;
	$("#estMedicamento").val(medicamentos[1]);
	//$("#estMedicamento").after("<input type='button' value='Eliminar' id='EliminarMedicamento'/>");
	while(contador!=2){
	$("#medicamento"+inicio).after("<tr id='medicamento"+ ++inicio +"'><td align='right'>Medicamento que toma:</td><td><input id='estMedicamento"+ inicio +"' type='text' size='54' required='required' name='meds[]'/></td></tr>");
	$("#estMedicamento"+inicio).val(medicamentos[inicio]);
	//$("#estMedicamento"+inicio).after("<input type='button' value='Eliminar' id='EliminarEnf'/>");
	contador=contador-1;
	}//fin del while
	
	$("#Adicional input,select").prop('disabled', true);
    });
	
		
});