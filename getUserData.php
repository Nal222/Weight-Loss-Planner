<?php

//echo "variablefromphp=hellooooonals&variable2=yoyoyo";

$username=$_GET['username'];
$password=$_GET['password'];

//echo "&phpusername=".$username."&phppassword=".$password;
header("Cache-Control: no-cache, must-revalidate");
header("Last-modified: ".gmdate("D, d M Y H:i:s", time())." GMT");
header("Expires: ".gmdate("D, d M Y H:i:s", time())." GMT"); 
header("Content-type: text/xml"); 


$conn = mysql_connect("localhost", "root", "root") or die ("connection failed");
mysql_select_db("slimmersdatabase", $conn) or die ("selecting database slimmersdatabase failed");
$sql = "select targetweightinkg, timeToLoseWeightInWeeks, preferredweightunits, preferredtimeunits, startpointfortarget from slimmers where username='" .$username. "' and password='".$password."'";
$sql2 = "select date, weight from weightdatetable where username='" .$username. "' and password='".$password."'";
$rs = mysql_query($sql, $conn) or die("could not execute query");
$rs2 = mysql_query($sql2, $conn) or die("could not execute query");
//all my weight points are in  $rs2 now.

$result_array = mysql_fetch_assoc($rs);

//$currentweightinkg = $result_array["currentweightinkg"];
$targetweight = $result_array["targetweightinkg"];
$timetoloseweightinweeks = $result_array["timeToLoseWeightInWeeks"];
$preferredweightunits = $result_array["preferredweightunits"];
$preferredtimeunits = $result_array["preferredtimeunits"];
$startpointfortarget = $result_array["startpointfortarget"];
$number_of_rows_weightdates=mysql_num_rows($rs2);

$string=$targetweight."/".$timetoloseweightinweeks."/";

for($i=0;$i<$number_of_rows_weightdates;$i++)

{
	$rowfromweightdatesarray[i] = mysql_fetch_assoc($rs2);
	$weights[i]=$rowfromweightdatesarray[i]["weight"];
	$dates[i]=$rowfromweightdatesarray[i]["date"];
	
	$string.=$weights[i]."Y".$dates[i]; 

	if($i<$number_of_rows_weightdates-1){
	
		$string.="X";
		
	}
	
}

$string= $preferredweightunits."/".$preferredtimeunits."/".$string."/".$startpointfortarget;

//echo "&currentweightinkg=".$currentweightinkg;
//echo "&weighttoloseinkg=".$weighttoloseinkg;
//echo "&timetoloseweightinweeks=".$timetoloseweightinweeks;

echo $string;


?>

