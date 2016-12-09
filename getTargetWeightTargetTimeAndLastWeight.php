<?php

$username=$_GET["username"];
$password=$_GET["password"];

mysql_connect("localhost", "root", "root") or exit("connection failed");

mysql_select_db("slimmersdatabase") or exit("selecting database slimmersdatabase failed");

$rs = mysql_query("select targetweightinkg, timeToLoseWeightInWeeks from slimmers WHERE username='".$username."' AND password='".$password."'") or exit("inserting data failed");

$row = mysql_fetch_assoc($rs) or exit("fetch assoc 1 gone bad");

$targetweightinkg= $row['targetweightinkg'];
$timetoloseweightinweeks = $row["timeToLoseWeightInWeeks"];

$rs2 = mysql_query("select weight, date from weightdatetable where username='".$username."' AND password ='".$password."'" ) or exit("baad");

$firstrow = mysql_fetch_assoc($rs2) or exit("fetch assoc gone bad");

$firstdate = $firstrow["date"];



if(mysql_num_rows($rs2)>1){
	for($i=0;$i<mysql_num_rows($rs2)-1;$i++){
		$lastrow = mysql_fetch_assoc($rs2);
	}
}
else if(mysql_num_rows($rs)==1){
	$lastrow = $firstrow;
}

$lastweight = $lastrow['weight'];

echo $targetweightinkg."/".$timetoloseweightinweeks."/".$firstdate."/".$lastweight;

?>