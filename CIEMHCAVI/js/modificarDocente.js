$(document).ready(function(){//jquery para mandar x post todo esta bien aqui
	
	
	
	$("#addPerson").submit(function(event){
		event.preventDefault();
		var nombre= $("#nombre").val();
		var ape1= $("#ape1").val();
		var ape2= $("#ape2").val();
		var ced= $("#cedula").val();
		var pass= $("#password").val();
		var email= $("#email").val();
		var genero= $('input:radio[name=genero]:checked').val();
		var fecha=$("#fechaNac").val();
		var nac=$("#nacionalidad").val();
		var direccion=$("#provincia").val()+"*"+$("#canton").val()+"*"+$("#distrito").val()+"*"+$("#otras").val();
		var telf=$("#telf").val();
		var foto=$("#foto").attr();
		$.post("../queries/modificarDocente.php",{nombre:nombre, ape1:ape1, ape2:ape2, ced:ced, pass:pass, email:email, genero:genero, fecha:fecha, nac:nac, direccion:direccion, telf:telf},function(result){
			if(result=="Confirmed"){
				window.location= "../docentes/perfil.php";
			}
			else{
				alert(result);
			}
		});
	});
});
