$(document).ready(function() {
	
	
	//Form Autofill
	$("#nombre").val(localStorage.getItem('nombre'));
	$("#ape1").val(localStorage.getItem('ape1'));
	$("#ape2").val(localStorage.getItem('ape2'));
	$("#cedula").val(localStorage.getItem('cedula'));
	$("#carrera").val(localStorage.getItem('carrera'));
	$("#edad").val(localStorage.getItem('edad'));
	localStorage.clear();

	
	//Valida Contraseñas
	$("#addPerson").submit(function(){
		$("#password").next().remove();
		$("#repassword").next().remove();
		if ($("#password").val()==$("#repassword").val()) {
			return true;
		}
		$("#password").after('<font color="red"><strong>Contraseñas no coinciden</strong></font>');
		$("#repassword").after('<font color="red"><strong>*</strong></font>');
		return false;
	});
	
	var indxTel=1;
	var indxLes=1;
	var indxAler=1;
	var indxEnfer=1;
	var indxNece=1;
	var indxEmergencyTel=1;
	var indxMedic=1;
	
	//Botones Contacto Emergencia
	$("#addEmergencyTel").click(function(){
		$("#emergencyTel"+indxEmergencyTel).after("<tr id='emergencyTel"+ ++indxEmergencyTel +"'><td align='right'>Contacto "+indxEmergencyTel+":</td><td><input type='text' size='34' required='required' placeholder='Nombre' name='EmergencyContact[]'><input type='tel' size='16' required='required' placeholder='Telefono' class='phone'name='TelfEmergency[]'></td></tr>");
		$(".phone").mask("9999-99-99");
	});
	
	$("#remEmergencyTel").click(function(){
		if(indxEmergencyTel>1){
			$("#emergencyTel"+indxEmergencyTel).remove();
			indxEmergencyTel--;
		}
	});
	
	//Botones Enfermedades
	$("#addEnfermedad").click(function(){
		$("#enfermedad"+indxEnfer).after("<tr id='enfermedad"+ ++indxEnfer +"'><td align='right'>Enfermedad "+ indxEnfer +":</td><td><input type='text' size='54' required='required' name='sick[]'/></td></tr>");
	});
	
	$("#remEnfermedad").click(function(){
		if(indxEnfer>1){
			$("#enfermedad"+indxEnfer).remove();
			indxEnfer--;
		}
	});
	
	//Botones Alergias
	$("#addAlergia").click(function(){
		$("#alergia"+indxAler).after("<tr id='alergia"+ ++indxAler +"'><td align='right'>Alergia "+ indxAler +":</td><td><input type='text' size='54' required='required' name='alergy[]'/></td></tr>");
	});
	
	$("#remAlergia").click(function(){
		if(indxAler>1){
			$("#alergia"+indxAler).remove();
			indxAler--;
		}
	});
	
	//Botones Lesion
	$("#addLesion").click(function(){
		$("#lesion"+indxLes).after("<tr id='lesion"+ ++indxLes +"'><td align='right'>Lesion "+ indxLes +":</td><td><input type='text' size='54' required='required' name='lesion[]'/></td></tr>");
	});
	
	$("#remLesion").click(function(){
		if(indxLes>1){
			$("#lesion"+indxLes).remove();
			indxLes--;
		}
	});
	
	//Botones Necesidad
	$("#addNecesidad").click(function(){
		$("#necesidad"+indxNece).after("<tr id='necesidad"+ ++indxNece +"'><td align='right'>Necesidad especial "+ indxNece +":</td><td><input type='text' size='54' required='required' name='need[]'/></td></tr>");
	});
	
	$("#remNecesidad").click(function(){
		if(indxNece>1){
			$("#necesidad"+indxNece).remove();
			indxNece--;
		}
	});
	
	//Botones Medicamentos
	$("#addMedicamento").click(function(){
		$("#medicamento"+indxMedic).after("<tr id='medicamento"+ ++indxMedic +"'><td align='right'>Medicamento "+ indxMedic +":</td><td><input type='text' size='54' required='required' name='meds[]'/></td></tr>");
	});
	
	$("#remMedicamento").click(function(){
		if(indxMedic>1){
			$("#medicamento"+indxMedic).remove();
			indxMedic--;
		}
	});
});
