<?php
include("functions.lib.php");

switch($_GET['content']) {
case 'featured':
    getFeatured();
    break;
default:
    echo getMenu();
    break;
}

?>