<?php 

$kgtolose = $_GET['kgtolose'];
$lbstolose= $_GET['lbstolose'];
$months= $_GET['months'];
$weeks= $_GET['weeks'];
$days= $_GET['days'];

$customerGender="none";//to do radio buttons in javascript and use GET

if($kgtolose!=null){
	$weightToLoseInPounds=($kgtolose * 2.20462262);

	//echo $weightToLoseInPounds; 
}
if($lbstolose!=null){
	$weightToLoseInPounds=$lbstolose;

	//echo $weightToLoseInPounds;
}
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

//echo $timeToLoseWeightInWeeks;

$poundsToLosePerWeek=$weightToLoseInPounds/$timeToLoseWeightInWeeks;


//3500 calories to burn 1 pound per week
$caloriesToLosePerDay=(3500*$poundsToLosePerWeek)/7.0;

//$caloriesPerWeek=3500*$poundsToLosePerWeek;

//half to lose from exercise, half to lose from diet
$calorieToLoseFromDietPerDay=$caloriesToLosePerDay/2;
$calorieToLoseFromExercisePerDay=$caloriesToLosePerDay/2;

$maintenanceForMen=2700;
$maintenanceForWomen=2000;
$maintenanceAverageForMenAndWomen = 2350;


if($customerGender=="male"){
$caloriesToEatPerDay=$maintenanceForMen-$calorieToLoseFromDietPerDay; 
}
else if($customerGender=="female"){
$caloriesToEatPerDay=$maintenanceForWomen-$calorieToLoseFromDietPerDay; 
}
else if ($customerGender=="none"){
$caloriesToEatPerDay=$maintenanceAverageForMenAndWomen-$calorieToLoseFromDietPerDay; 
}

$delim=",";

echo($calorieToLoseFromExercisePerDay).$delim;
echo($caloriesToEatPerDay).$delim;

// e.g. "100,550"

// data from http://www.fatfreekitchen.com/weightloss/calories-burn.html
$durationToDoInMinutes['aerobics']=($calorieToLoseFromExercisePerDay/178.0)*30;
$durationToDoInMinutes['basketball']=($calorieToLoseFromExercisePerDay/258.0)*30;
$durationToDoInMinutes['badminton']=($calorieToLoseFromExercisePerDay/125.0)*30;
$durationToDoInMinutes['bowling']=($calorieToLoseFromExercisePerDay/108.0)*30;
//$durationToDoInMinutes['brisk walking']=($calorieToLoseFromExercisePerDay/150.0)*30;
$durationToDoInMinutes['cycling']=($calorieToLoseFromExercisePerDay/150.0)*30;
$durationToDoInMinutes['dancing']=($calorieToLoseFromExercisePerDay/130.0)*30;
$durationToDoInMinutes['fishing']=($calorieToLoseFromExercisePerDay/114.0)*30;
$durationToDoInMinutes['gardening']=($calorieToLoseFromExercisePerDay/175.0)*30;
$durationToDoInMinutes['golf']=($calorieToLoseFromExercisePerDay/108.0)*30;
$durationToDoInMinutes['hockey']=($calorieToLoseFromExercisePerDay/249.0)*30;
$durationToDoInMinutes['horse riding']=($calorieToLoseFromExercisePerDay/255.0)*30;
$durationToDoInMinutes['house work']=($calorieToLoseFromExercisePerDay/100.0)*30;
$durationToDoInMinutes['ice skating']=($calorieToLoseFromExercisePerDay/315.0)*30;
$durationToDoInMinutes['jogging']=($calorieToLoseFromExercisePerDay/325.0)*30;
$durationToDoInMinutes['judo']=($calorieToLoseFromExercisePerDay/363.0)*30;
$durationToDoInMinutes['lawn mowing (power)']=($calorieToLoseFromExercisePerDay/125.0)*30;
$durationToDoInMinutes['lawn mowing (push)']=($calorieToLoseFromExercisePerDay/175.0)*30;
$durationToDoInMinutes['mountain climbing']=($calorieToLoseFromExercisePerDay/270.0)*30;
$durationToDoInMinutes['rowing']=($calorieToLoseFromExercisePerDay/378.0)*30;
$durationToDoInMinutes['roller skating']=($calorieToLoseFromExercisePerDay/315.0)*30;
$durationToDoInMinutes['skiing']=($calorieToLoseFromExercisePerDay/252.0)*30;
$durationToDoInMinutes['squash']=($calorieToLoseFromExercisePerDay/325.0)*30;
$durationToDoInMinutes['stairs- downstairs']=($calorieToLoseFromExercisePerDay/210.0)*30;
$durationToDoInMinutes['stairs- upstairs']=($calorieToLoseFromExercisePerDay/400.0)*30;
$durationToDoInMinutes['swimming']=($calorieToLoseFromExercisePerDay/250.0)*30;
$durationToDoInMinutes['tennis']=($calorieToLoseFromExercisePerDay/261.0)*30;
$durationToDoInMinutes['volley ball']=($calorieToLoseFromExercisePerDay/93.0)*30;
$durationToDoInMinutes['strolling - 1-2 mph']=($calorieToLoseFromExercisePerDay/68.0)*30;
$durationToDoInMinutes['leisurely walking - 3 mph']=($calorieToLoseFromExercisePerDay/150.0)*30;
$durationToDoInMinutes['brisk walking - 3.5 mph']=($calorieToLoseFromExercisePerDay/180.0)*30;
$durationToDoInMinutes['fast walking - 4.5 mph']=($calorieToLoseFromExercisePerDay/220.0)*30;



foreach($durationToDoInMinutes as $key => $value){
	echo $key.$delim.$value.$delim;  //e.g. "aerobics,55,basketball,30,...."
}


/*if($lbstolose!=null){
	$weightToLoseInKg=($lbsToLose*0.45359237);
}
if($kgtolose!=null){
	$weightToLoseInKg=$kgtolose;
}

mysql_connect("localhost", "root", "root") or exit("connection failed");

mysql_select_db("slimmersdatabase") or exit("selecting database slimmersdatabase failed");

mysql_query("insert into slimmers (weightToLoseInKg, timeToLoseWeightInWeeks) values ('".$weightToLoseInKg."','".$timeToLoseWeightInWeeks."')") or exit("inserting data failed");

echo "OK";//means success*/
?>

