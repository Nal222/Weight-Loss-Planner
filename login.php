<?php

$username = $_GET['username1'];
$password = $_GET['password1'];

$conn = mysql_connect("localhost", "root", "root") or die ("connection failed");
mysql_select_db("slimmersdatabase", $conn) or die ("selecting database slimmersdatabase failed");
$sql = "select * from slimmers where username='".$username."' and password='".$password."'";

$rs = mysql_query($sql, $conn) or die("could not execute query");

//get number of rows that match username and password
$num = mysql_numrows($rs) or die("error executing numrows on the resultset");
//if there is a match the login is authenticated
if($num != 0){
	echo("matched");
} 
else{
	echo("notmatched");
}
?>