<?php

header("Cache-Control: no-cache, must-revalidate");
header("Last-modified: ".gmdate("D, d M Y H:i:s", time())." GMT");
header("Expires: ".gmdate("D, d M Y H:i:s", time())." GMT"); 
header("Content-type: text/xml"); 

$kgcurrent = $_GET['kgCurrent'];
$stcurrent= $_GET['stCurrent'];
$lbscurrent= $_GET['lbsCurrent'];
$username= $_GET['username'];
$password= $_GET['password'];
$date= $_GET['date'];
$preferredweightunits= $_GET['preferredweightunits'];

if($kgcurrent!=null){
	$weight=$kgcurrent;
}
else{
	$lbstotal=0;
	if($stcurrent!=null) {
		$lbstotal=$stcurrent*14;
	
	}
	if(lbscurrent!=null){
		$lbstotal+=$lbscurrent;
	}


	$weight= $lbstotal*0.45359237;
}

$todaysdateinmydatabaseformat = date("Y-m-d");

mysql_connect("localhost", "root", "root") or exit("connection failed");

mysql_select_db("slimmersdatabase") or exit("selecting database slimmersdatabase failed");

mysql_query("delete from weightdatetable where date='".$todaysdateinmydatabaseformat."' and username='".$username."' and password='".$password."'") or exit("deleting todays weight failed");

mysql_query("insert into weightdatetable(username, password, weight, date) values ('".$username."','".$password."', '".$weight."', '".$date."')") or exit("inserting data failed");

mysql_query("update slimmers set preferredweightunits='".$preferredweightunits."' where username='".$username."' and password='".$password."'") or exit("updating preferred weight units failed");

echo "ok";

?>