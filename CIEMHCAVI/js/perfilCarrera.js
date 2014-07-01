$(document).ready(function() {
    //Form Autofill
    var nombreCarrera=localStorage.getItem('nombre');
    $.post("../queries/perfilCarrera.php",{nombreCarrera:nombreCarrera},function(result){
	var info=result.split("*");
	$("#nombre").val(info[0]);
	$("#codigo").val(info[1]);
	
    });
		
});
