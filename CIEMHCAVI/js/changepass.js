$(document).ready(function() {
    $("#changePassword").submit(function(event){
        event.preventDefault();
        var current=$("#current").val();
        var newone=$("#nueva").val();
        var confirm=$("#confirm").val();
        var userId= $("#userId").val();
        $.post("queries/changePassword.php",{current:current, newone:newone, confirm:confirm, userId:userId}, function(result){
            if(result=="Confirmed")
            {
                window.location = "admins/index.php";
            }
            if(result=="Wrong")
            {
                alert("Su Clave actual es incorrecta, por favor digitela correctamente");
            }
            if(result=="No Match")
            {
                alert("Sus claves no coinciden");
            }
            if(result!="Confirmed" && result!="Wrong" && result!="No Match")
            {
                alert(result);
            }
        });
    });
});

