<?php
include("functions.lib.php");
?>
<!doctype html>
<html>
<head>
  <title>Delta Downloads</title>
  <link rel="stylesheet" href="style.css">
  <script src="jquery.js"></script>
  <script src="script.js" defer></script>
</head>
<body>
  <div id="lightbox"></div>
  <div align="center">
    <div id="searchBox">
      <div aalign="center">
	<label for="q">Search : </label><input type="text" id="q">
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
      <div id="footer">&copy; 2011 Delta Force - <a href="/">Home</a> - <a href="/about.html">About Delta</a> - Your Apps - Help</div>
    </div>
  </div>
</body>
</html>
