$(document).ready(function() {

    ///loading the contents of the home page
    $("#panels").html("Loading... ").load("ajax.php");

    $("#q").focus();
    $("#q").keyup(function(e) {
        if(e.keyCode==27) {$(this).val(""); }
	$("#autosuggestion").load("getsuggestions.php?q="+encodeURI($(this).val()));
        if($(this).val()=="") {
		$("body").css({"overflow":"scroll"});
		$("#searchBox").animate(
			{"top":"20px"}
		,200);
		$("#lightbox").fadeOut(500);
		//$("#lightbox").css({"height":"0"});
	}
	else {
		$("body").css({"overflow":"hidden"});
		if($("#searchBox").css("top")=="20px") {
		$("#searchBox").animate(
			{"top":"100px"}
		,400);
		}
		$("#lightbox").fadeIn(500);
	}
    });
});
