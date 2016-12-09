<?php 

$username = $_GET['username'];
$password= $_GET['password'];


mysql_connect("localhost", "root", "root") or exit("connection failed");

mysql_select_db("slimmersdatabase") or exit("selecting database slimmersdatabase failed");

$sql2 = "select * from slimmers where username='".$username."' and password='".$password."'";

$rs2 = mysql_query($sql2) or die("could not execute query");

$num2 = mysql_numrows($rs2); //or die("error executing numrows on the resultset");

if($num2 == 0){

	mysql_query("insert into slimmers (username, password) values ('".$username."','".$password."')") or exit("inserting data failed");
	echo "ok";//means success
}

else{
	echo "notok";
}
//("nalini","lotus")

//now store $username and $password strings in database, first check if already exists.

//if successfully stored, output(echo) "ok" as the responseText, then your JavaScript can diplay "Congratulations, you're now a member... " etc. IF the responseText=="ok"


?>