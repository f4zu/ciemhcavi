$(document).ready(function() {
    //Form Autofill
   	var cedEstudianteFoto=localStorage.getItem('cedEst');
	  $.post("../queries/fotoEstComents.php",{cedEstudianteFoto:cedEstudianteFoto},function(result){
	   var info=result.split("*");
	 
	   if(info[4]=="default-user-picture.png"){
	   $("#fotoEst").attr("src", "../imgs/default-user-picture.png");
	   }//fin del if
	   else{
	   $("#fotoEst").attr("src", "../FotosEstudiantes/"+info[4]+"");
	   }//fin del else
	  
	   
    });

	
		
});