<?php

function getMenu() {

$home_page_contents=<<<str

<div class="panel">
<a><div class="panel-title">Featured</div></a>
<div id="featured" class="panel-contents">
hi
</div>
</div>

<div class="panel">
<a><div class="panel-title">Most Downloaded</div></a>
<div class="panel-contents">
hi
</div>
</div>

<div class="panel">
<a><div class="panel-title">Highest Rated</div></a>
<div class="panel-contents">
hi
</div>
</div>

<div class="panel">
<a><div class="panel-title">Recently Added</div></a>
<div class="panel-contents">
hi
</div>
</div>

str;
return $home_page_contents;

}

function getFeatured() {
    include("xml.php");    
}


?>