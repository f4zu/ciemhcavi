$(document).ready(function() {
    //Form Autofill
    var cursoCodigo=localStorage.getItem('codigo');
    $.post("../queries/perfilCurso.php",{cursoCodigo:cursoCodigo},function(result){
	var info=result.split("*");
	$("#codigo").val(info[0]);
	$("#creditos").val(info[1]);
	$("#tipo").val(info[2]);
	$("#nombre").val(info[3]);
	$("#ciclo").val(info[4]);
	$("#carrera").val(info[5]);
	$("#carrera").prop('disabled', true);
    });
		
});
