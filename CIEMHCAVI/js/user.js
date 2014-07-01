$(document).ready(function(){
	
	//Valida Contraseñas
	$("#userInfo").submit(function(){
		$("#password").next().remove();
		$("#repassword").next().remove();
		if ($("#password").val()==$("#repassword").val()) {
			return true;
		}
		$("#password").after('<font color="red"><strong>Contraseñas no coinciden</strong></font>');
		$("#repassword").after('<font color="red"><strong>*</strong></font>');
		return false;
	});
	
	
});