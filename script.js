$(document).ready(function() {
    var hashUpdateTimer;
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
		    app.style.cssText = "'display' : 'none'";
		    link.setAttribute('href','#!app/'+$(this).attr('id'));
		    link.innerHTML = "<div class=\"appLinka\"><img src=\"./images/defaultIcon.jpg\">" + $(this).find("name").text() + "</div>";
		    app.innerHTML +=  "<div class=\"appDescription\"><div class=\"appDescHead\" style=\"background:url('./images/defaultIcon.jpg') no-repeat #cce; background-position:5px 5px; background-size:50px 50px; \"><div class=\"t\">" + $(this).find("name").text() + "</div><div class=\"ico\">w d f</div></div>" + $(this).find("desc").text() + "</div>";
		    app.appendChild(link);
		    $("#panels").children().find("#featured")[0].appendChild(app);
		});
		//$("#panels").children().find("#featured").html(str);
	    }
	});
    });
    
    $("#q").focus();
    $("#q").keyup(function(e) {
	console.log("keycode - " + e.keyCode);
	var code = e.keyCode;
	if(code == 13)
	{
	    clearTimeout(hashUpdateTimer);
	    hashUpdateTimer = setTimeout("updateHash();",0);
	    return;
	}
	if(code == 0 || code == 16 || code == 17 || code == 18)
	    return;
        if(code==27) {$(this).val(""); }
	
	clearTimeout(hashUpdateTimer);
	hashUpdateTimer = setTimeout("updateHash();",500);
    });
    clearTimeout(hashUpdateTimer);
    hashUpdateTimer = setTimeout("updateHash();",0);
});

function updateHash()
{
    if( $("#q").val() == "" )
    {
	window.location = "./#!";
	//$(".panel").fadeIn(1000);
	/*$("#searchBox").animate(
	    {"top":"20px"}
	    ,200);
	$("#lightbox").fadeOut(800);*/
    }
    else
    {
	window.location = "./#!search/"+encodeURI($("#q").val().trim());
	$(".panel").fadeOut(500)
	    .queue(function() {
		var panel = document.createElement("div");
		var app = document.createElement("div");
		var link = document.createElement("a");
		panel.setAttribute('class','panel');
		app.setAttribute('class','appLink');
		app.style.cssText = "'display' : 'none'";
		link.setAttribute('href','#!app/123');
		link.innerHTML = "<div class=\"appLinka\"><img src=\"./images/defaultIcon.jpg\">" + $("#q").val() + "</div>";
		app.innerHTML +=  "<div class=\"appDescription\"><div class=\"appDescHead\" style=\"background:url('./images/defaultIcon.jpg') no-repeat #cce; background-position:5px 5px; background-size:50px 50px; \"><div class=\"t\">" + $(this).find("name").text() + "</div><div class=\"ico\">w d f</div></div>" + $(this).find("desc").text() + "</div>";
		app.appendChild(link);
		panel.appendChild(app);
		$(this).parent().html("")[0].appendChild(panel);
		$(".panel").css({"display":"none"});
		$(".panel").fadeIn(300);
		$(this).dequeue();
	    });
	/*$("#autosuggestion").load("./getsuggestions.php?q="+encodeURI($("#q").val()), function() {
	    $("#autosuggestion").clearQueue().slideDown(300);
	});*/
	/*if($("#searchBox").css("top")=="20px") {
	    $("#searchBox").animate(
		{"top":"100px"}
		,400);
	}*/
	//$("#lightbox").fadeIn(500);
    }
}

var clearer = document.createElement("br");

window.onhashchange = function() {
    if(("a" + window.location.hash).indexOf("#!app") == 1)
    {
	$("#q").val("");
    }
    console.log("hash has changed..." + window.location.hash);
};