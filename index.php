<!doctype html>
<html>
<head>
<title>Delta Downloads</title>
<style>
body {overflow:hidden; }
#lightbox {position:fixed; width:100%; height:100%; top:0; left:0; background-color:rgba(77,97,127,.7); display:none; }
#searchBox {width:900px; position:absolute; top:20px; left:200px; padding:30px; background-color:rgba(127,160,230,.8); border:5px solid rgba(1,1,1,.1); z-index:1000;}
#autosuggestion {margin-top:30px; }
#t {position:absolute; top:180px; }
input[type='text'] {color:#666; padding:8px; font-size:x-large; border-radius:12px; border:0; }
</style>
<script src="jquery.js"></script>
<script>
$(document).ready(function() {
    $("#q").focus();
    for(i=0;i<300;i++)
    $("#t")[0].innerHTML+="this is some random text. ";
    
    $("#q").keyup(function() {
	$("#autosuggestion").load("getsuggestions.php?q="+encodeURI($(this).val()));
    	if($(this).val()=="") {
		$("body").css({"overflow":"scroll"});
		$("#searchBox")/*.css({"position":"relative"})*/.animate(
			{"top":"20px"}//,
		,200);
		$("#lightbox").fadeOut(500);
		//$("#lightbox").css({"height":"0"});
	}
	else {
		$("body").css({"overflow":"hidden"});
		if($("#searchBox").css("top")=="20px") {
		$("#searchBox").animate(
			{"top":"100px"}//,
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
<div id="searchBox">
<div align="center">
<label for="q">Search : </label><input type="text" id="q"><input type="button" value="Go!">
<div id="autosuggestion"></div>
</div>
</div>
<p id="t"></p>
</body>
</html>