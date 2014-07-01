$(document).ready(function() {
	
	//Oculta Elementos
	$(".content h1").hide();
	$(".content h2").hide();
	$(".content h3").hide();
	
	//Animacion Inicio
	$(".content h1").delay(500).show(1000,function(){
		$(".content h2").show(1000,function(){
			$(".content h3").show(1000);
		});
	});
	
	$("#login").submit(function(event){
		event.preventDefault();
		var userID = $("#userID").val();
		var password = $("#password").val();
		$.post("queries/login.php",{userID:userID, password:password},function(result){
			if(result=="Confirmed"){
				window.location = "admins/index.php"
			}
			if(result=="FirstSign")
			{
				window.location= "firstSign.php"
			}
			if(result!="Confirmed" && result!="FirstSign"){

				alert(result);
			}
		});
	});
});


