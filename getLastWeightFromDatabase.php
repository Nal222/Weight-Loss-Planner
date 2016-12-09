<?php

$username=$_GET["username"];
$password=$_GET["password"];

mysql_connect("localhost", "root", "root") or exit("connection failed");

mysql_select_db("slimmersdatabase") or exit("selecting database slimmersdatabase failed");

$weightsresultset = mysql_query("select weight from weightdatetable where username='".$username."' AND password ='".$password."'" ) or exit("baad");



for($i=0;$i<mysql_num_rows($weightsresultset);$i++){
		$lastrow = mysql_fetch_assoc($weightsresultset);
}

$lastweight = $lastrow["weight"];

echo $lastweight;

?>