$(document).ready(function() {

    ///loading the contents of the home page
    $("#panels").html("Loading... ").load("ajax.php",function() {
	var str = "";
	$.ajax({
	    type:"GET",
	    url:"ajax.php?content=featured",
	    datatype:"xml",
	    success: function(xml) {
		$("#panels").children().find("#featured").html('');
		$(xml).find("app").each(function() {
		    //str += $(this).attr('id') + "<br>";
		    var app = document.createElement("div");
		    var link = document.createElement("a");
		    app.setAttribute('class','appLink');
		    link.setAttribute('href','#!app/'+$(this).attr('id'));
		    link.innerHTML = "<div class=\"appLinka\"><img src=\"./images/defaultIcon.jpg\">" + $(this).find("name").text() + "</div>";
		    app.innerHTML +=  "<div class=\"appDescription\"><div class=\"appDescHead\" style=\"background:url('./images/defaultIcon.jpg') no-repeat #cce; background-position:5px 5px; background-size:50px 50px; \"><div class=\"t\">" + $(this).find("name").text() + "</div><div class=\"ico\">w d f</div></div>" + $(this).find("desc").text() + "</div>";
		    app.appendChild(link);
		    $("#panels").children().find("#featured")[0].appendChild(app);
		    //$("#panels").children().find("#featured")[0].appendChild(app);
		});
		//$("#panels").children().find("#featured").html(str);
	    }
	});
    });
    
    $("#q").focus();
    $("#q").keyup(function(e) {
        if(e.keyCode==27) {$(this).val(""); }
	$("#autosuggestion").load("getsuggestions.php?q="+encodeURI($(this).val()));
        if($(this).val()=="") {
	    window.location = "./#!";
	    $("body").css({"overflow":"scroll"});
	    $("#searchBox").animate(
		{"top":"20px"}
		,200);
	    $("#lightbox").fadeOut(500);
	    //$("#lightbox").css({"height":"0"});
	}
	else {
	    window.location = "./#!search/"+encodeURI($(this).val());
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
