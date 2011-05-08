<!doctype html>
<html>
<head>
<title>Delta Downloads</title>
<style>
body {overflow:hidden; font-family:'sans serif'; font-size:small; }
#lightbox {position:fixed; width:100%; height:100%; top:0; left:0; background-color:rgba(77,97,127,.9); display:none; }
#searchBox {width:900px; position:relative; top:20px; padding:30px; background-color:rgba(246,246,246,.6);140,140,250,.6); border-radius:13px; border:1px solid #5566BB; z-index:1000; box-shadow:inset -1px -1px 2px #AAAAAA;}
#autosuggestion {margin-top:30px;}
#wrapper {position:relative; top:50px; width:970px; padding:0px;  }
.widget , .panel {font-size:small; text-align:left; margin:3px; }
.widget-head {color:red; padding:3px 6px 4px; color:#FFFFFF; background:-moz-linear-gradient(center top , #7DA7F0, #6993DC) repeat scroll 0 0 transparent; border-top-left-radius:5px; border-top-right-radius:5px; font-weight:bold; margin-bottom:0; text-shadow:0 1px #5566BB; }
.widget-contents {box-shadow:0 2px 2px #AAAAAA; border-bottom:1px solid #DDDDDD; border-bottom-right-radius:5px; border-bottom-left-radius:5px; border-left:1px solid #DDDDDD; border-right:1px solid #DDDDDD; margin:0 0 10px; padding:5px 10px; }


.category {display:block; cursor:pointer; padding:2px; color:#000000; text-decoration:none; }

.panel {box-shadow:0 2px 2px #AAAAAA; margin-left:210px; padding:10px; border-bottom:1px solid #DDDDDD; border-radius:5px 5px 5px 5px; border:1px solid #DDDDDD; margin-bottom:10px; }
.panel-title {color:#4272DB; font-weight:bold; font-size:large; }
.panel-contents {margin:0 0 10px; padding:5px 10px; }

#left-col {float:left; width:200px; }

input[type='text'] {color:#666; padding:8px; font-size:x-large; border-radius:23px; border:0; box-shadow:1px 1px 4px #AAAAAA; padding-left:50px; background:#F5F5F5 url('images/search.png') no-repeat 0 1px; background-size:43px 43px; }
input[type='button'] {border:0; box-shadow:1px 1px 4px #888888; margin:5px; border-radius:5px; padding:3px 6px 5px; color:#FFFFFF; font-weight:bold; background:-moz-linear-gradient(center top , #7DA7F0, #6993DC) repeat scroll 0 0 transparent; cursor:pointer; }
</style>
<script src="jquery.js"></script>
<script>
$(document).ready(function() {

    ///loading the contents of the home page
    $("#panels").html("Loading... ").load("ajax.php");

    $("#q").focus();

    $("#q").keypress(function(e) {
        if(e.keyCode=="27") $(this).val("");
    }).keyup(function() {
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
</script>
</head>
<body>
<div id="lightbox"></div>
<div align="center">
<div id="searchBox">
<div aalign="center">
<label for="q">Search : </label><input type="text" id="q">
<div id="autosuggestion"></div>
</div>
</div>
<div id="wrapper">
<div id="left-col">

<div class="widget">
<a><div class="widget-head">Apps</div></a>
<div class="widget-contents">
<a class="category">Education</a>
<a class="category">Entertainment</a>
<a class="category">Games</a>
<a class="category">Productivity</a>
<a class="category">Social and communication</a>
<a class="category">Utilities</a>
</div>
</div>

<div class="widget">
<a><div class="widget-head">Collections</div></a>
<div class="widget-contents">
<a href="#/books/" class="category">Books</a>
<a href="#/music/" class="category">Music</a>
<a href="#/games/" class="category">Games</a>
<a href="#/comics/" class="category">Comics</a>
</div>
</div>

</div>

<div id="panels">
</div>

</div>
</div>
</body>
</html>
