$(document).ready(function(){
	
	//Ocultar botones de eliminar y enviar cambios
	$("#submit").hide();
	$("#delete").hide();
	$(".add_rem").hide();
	
	//Desabilita inputs y selects
	$("#perfil input,select").prop('disabled', true);
	
	//Ocultar botones de eliminar y enviar cambios de estudiante
	$("#submitEst").hide();
	$("#deleteEst").hide();
	$(".add_remEst").hide();
	
	//Desabilita inputs y selects de estudiante
	$("#perfilEst input,select").prop('disabled', true);
	
	
	//Ocultar botones de eliminar y enviar cambios de adicional
	$("#submitAdicional").hide();
	$("#deleteAdicional").hide();
	$(".add_remAdicional").hide();
	
	//Desabilita inputs y selects de adicional
	$("#Adicional input,select").prop('disabled', true);

	
	$("#modificar").click(function() {
		$("#perfil input,select").prop('disabled', false);
		$("#ced").prop('readonly', true);
		$("#submit").show(1000);
		$("#delete").show(1000);
		$(".add_rem").show(1000);
		$("#modificar").hide(1000);
	});
	
	$("#modificarEst").click(function() {
		$("#perfilEst input,select").prop('disabled', false);
		$("#ced").prop('readonly', true);
		$("#submitEst").show(1000);
		$("#deleteEst").show(1000);
		$(".add_remEst").show(1000);
		$("#modificarEst").hide(1000);
	});
	
	$("#modificarAdicional").click(function() {
		$("#Adicional input,select").prop('disabled', false);
		$("#ced").prop('readonly', true);
		$("#submitAdicional").show(1000);
		$("#deleteAdicional").show(1000);
		$(".add_remAdicional").show(1000);
		$("#modificarAdicional").hide(1000);
	});
	
	$("#modificarCur").click(function() {
		$("#perfil input,select").prop('disabled', false);
		$("#codigo").prop('readonly', true);
		$("#carrera").prop('disabled', true);
		$("#nombre").prop('readonly', true);
		$("#submit").show(1000);
		$("#delete").show(1000);
		$("#modificarCur").hide(1000);
	});
	
	$("#modificarCarr").click(function() {
		$("#perfil input,select").prop('disabled', false);
		$("#nombre").prop('readonly', true);
		$("#submit").show(1000);
		$("#modificarCarr").hide(1000);
	});
	
	$("#perfil").submit(function(){
		$("#modificar").show(1000);
		$("#submit").hide();
		$("#delete").hide();
		$(".add_rem").hide();
	});	
	

	
	
//--------------------------------------------------Seccion para Estudiantes-------------------------------------------------

	//Index para botones Agregar campo y remover campos
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

	//Boton Ver Comentarios
	$("#comments").click(function(){
		localStorage.setItem('nomEst',$("#nombre").val()+" "+$("#ape1").val());
		localStorage.setItem('cedEst',$("#ced").val());
		window.location="comentarios.php";
	});

//---------------------------------------------------------------------------------------------------------------------------



//----------------------------------------------------Seccion para Cursos----------------------------------------------------

	var indxEst=1;
	var indxDoc=1;
	
	//Ocultar campos de Agregar Estudiantes y Profesores al curso
	$("#addEstudiantes").hide();
	$("#addDocentes").hide();
	
	//Boton Agregar Estudiantes
	$("#addEstudiante").click(function(){
		$("#addEstudiantes").toggle(1000);
	});
	
	$("#addEst").click(function(){
		$("#estudiante"+indxEst).after("<tr id='estudiante"+ ++indxEst +"'><td>Cédula del Estudiante "+ indxEst +":</td><td><input type='text' required='required'/></td></tr>");
	});
	
	$("#remEst").click(function(){
		if(indxEst>1){
			$("#estudiante"+indxEst).remove();
			indxEst--;
		}
	});
	
	//Boton Agregar Docentes
	$("#addDocente").click(function(){
		$("#addDocentes").toggle(1000);
	});
	
	$("#addDoc").click(function(){
		$("#docente"+indxDoc).after("<tr id='docente"+ ++indxDoc +"'><td>Cédula del Docente "+ indxDoc +":</td><td><input type='text' required='required'/></td></tr>");
	});
	
	$("#remDoc").click(function(){
		if(indxDoc>1){
			$("#docente"+indxDoc).remove();
			indxDoc--;
		}
	});
	
	//Links a Perfiles
	$("#tblEstudiantes td").click(function(){
		window.location="../estudiantes/perfil.php";
	});
	
	$("#tblDocentes td").click(function(){
		window.location="../docentes/perfil.php";
	});
	
//---------------------------------------------------------------------------------------------------------------------------
	
});
