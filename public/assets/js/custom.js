let Obj = {};
if(window.location.port)
{
    sourceDir = "";
}else{
    // sourceDir = "/chl/public";
    sourceDir = "";
}
(function ($){
    $(document).ajaxStop(function(){
        $("#ajax_loader").hide();
        $("#ajax_loader2").hide();
    });
    $(document).ajaxStart(function (){
        $("#ajax_loader").show();
        $("#ajax_loader2").show();
    });
    $(document).ready(function(){

    })
}(jQuery))
