<?php  

$kgcurrent = $_GET['kgCurrent'];
$stcurrent= $_GET['stCurrent'];
$lbscurrent= $_GET['lbsCurrent'];
$username= $_GET['username'];
$password= $_GET['password'];

if($kgcurrent!=null){
	$currentweightinkg=$kgcurrent;
}
else{
	$lbstotal=0;
	if($stcurrent!=null) {
		$lbstotal=$stcurrent*14;
	
	}
	if(lbscurrent!=null){
		$lbstotal+=$lbscurrent;
	}


	$currentweightinkg= $lbstotal*0.45359237;
}



mysql_connect("localhost", "root", "root") or exit("connection failed");

mysql_select_db("slimmersdatabase") or exit("selecting database slimmersdatabase failed");

mysql_query("UPDATE slimmers SET currentweightinkg='".$currentweightinkg."' WHERE username='".$username."' AND password='".$password."'") or exit("inserting data failed");


echo "okok";

?>