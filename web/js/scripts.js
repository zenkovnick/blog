$(document).ready(function(){
    $("#menu ul li a").click(function(){
        $("#menu ul li a").removeClass("current");
        $(this).addClass("current");
    });
});