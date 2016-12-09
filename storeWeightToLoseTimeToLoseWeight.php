<?php

$targetweightinkg= $_GET['targetweightinkg'];
$months= $_GET['months'];
$weeks= $_GET['weeks'];
$days= $_GET['days'];
$username= $_GET['username'];
$password= $_GET['password'];
$preferredtimeunits = $_GET['preferredtimeunits'];

if($months!=null){
$weeksFromMonths=($months*4.34812141);

//echo($weeksFromMonths);
}

if($weeks!=null){
$weeksFromWeeks=$weeks;

//echo($weeksFromWeeks);
}

if($days!=null){
$weeksFromDays=($days/7.0);

//echo $weeksFromDays;
}

$timeToLoseWeightInWeeks=$weeksFromMonths + $weeksFromWeeks + $weeksFromDays;

if($lbstolose!=null){
	$weightToLoseInKg=($lbsToLose*0.45359237);
}
if($kgtolose!=null){
	$weightToLoseInKg=$kgtolose;
}





mysql_connect("localhost", "root", "root") or exit("connection failed");

mysql_select_db("slimmersdatabase") or exit("selecting database slimmersdatabase failed");

$rs = mysql_query("select count(*) from weightdatetable where username='".$username."' and password='".$password."'") or exit("");

$row = mysql_fetch_assoc($rs);

$numberofweightdatesyouvegotsofar = $row["count(*)"];

$startpointfortarget = $numberofweightdatesyouvegotsofar - 1;

mysql_query("UPDATE slimmers SET startpointfortarget='".$startpointfortarget."', timeToLoseWeightInWeeks='".$timeToLoseWeightInWeeks."', targetweightinkg='".$targetweightinkg."', preferredtimeunits='".$preferredtimeunits."' WHERE username='".$username."' AND password='".$password."'") or exit("inserting data failed");

//echo $rs;
//echo $numberofweightdatesyouvegotsofar;

echo "ok";



?>