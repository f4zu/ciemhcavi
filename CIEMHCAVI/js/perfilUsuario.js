$(document).ready(function() {
    //Form Autofill
   
    $("#userInfo").submit(function(event){
		event.preventDefault();
		var ced=$("#usuarioCed").val();
		var clave=$("#password").val();
		var reclave=$("#repassword").val();
		
		if(clave==reclave){
		    $.post("../queries/modificarUsuario.php",{ced:ced,clave:clave},function(result){
			   if(result=="Confirmed"){
				window.location = "../user/index.php";
			    }else{
				alert(result);
			    }
		    });
		}
	});
	
	
		
});