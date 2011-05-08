<?php
if(!isset($_GET['q'])||trim($_GET['q'])=="") die;
echo "<pre>Search results for <b>{$_GET['q']}</b></pre>";
echo "There's no file matching your search... Try again at a later time :)";
?>