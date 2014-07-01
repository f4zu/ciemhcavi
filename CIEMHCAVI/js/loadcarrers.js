$(document).ready(function() {
	$.post("../queries/getCarrers.php",function(result){
			$("#options").html(result);
		});
});