<?php
header("Content-type: application/xml");
echo "<?xml version=\"1.0\" ?>\n";

$db = mysql_connect("localhost","root","root") or die("Could not connect to mysql server.");
mysql_select_db("downloads",$db) or die("Could not switch to the required database.");


$str .=<<<str
<applications>

str;

$res = mysql_query("SELECT * FROM `apps`");

while($row = mysql_fetch_assoc($res)) {
$str.=<<<str
    <app id="{$row['app_id']}">
        <name>{$row['app_name']}</name>
	<desc>{$row['app_description']}</desc>
	<windows url="{$row['windows']}" />
	<debian url="{$row['debian']}" />
	<rpm url="{$row['rpm']}" />
    </app>
str;
}

$str .=<<<str
</applications>
str;

echo $str;
?>
