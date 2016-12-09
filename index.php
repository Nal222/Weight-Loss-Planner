<!doctype html public "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>My weight-loss planner</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="generator" content="BestAddress HTML Editor Professional">

<link rel="stylesheet" type="text/css"
href="mystyle.css" media="all" />

<script type="text/javascript" src="json2007.js"></script>
<script type="text/javascript" src="rsh.js"></script>

<script type="text/javascript">

//var count=0;

var theyveEnteredTheirCurrentWeight;

var youveAlreadyEnteredWeightTodayDivIsShowing=false;

var submitButtonImg;
var submitButtonImg2;
var submitButtonImg5;
var loginButtonImage;
var logoutButtonImage;
var notNowImg;
var changeTargetButton;
var subPage2;
var registerSection;
var confirmTargetSection;
var inputWarningP;
var inputsubmitbutton;
var goodLuckMessageSection;

var registerSectionCreated=false;

var suggestionsAreShowing = false;

var lastWeightInKg;
window.dhtmlHistory.create();

var mouseIsHeldAfterPressingButton=false;
var mouseIsHeldAfterPressingLoginButton=false;
var buttonStillPressedForPrint=false;
var buttonStillPressedForYes=false;
var buttonStillPressedForNo=false;
var buttonStillPressedForSubmit=false;
var buttonStillPressedForSubmit3=false;
var yesButton2StillPressed=false;
var noButton2StillPressed=false;
var mouseIsHeldAfterPressingZoomInOutButton=false;
var mouseIsHeldAfterPressingUpdateSuggestionsButton=false;
var mouseIsHeldAfterPressingChangeTargetButton=false;
var mouseIsHeldAfterPressingNotNowButton=false;

dhtmlHistory.initialize();
dhtmlHistory.addListener(yourListener);

var currentPageNumber = 1;
var nextPageNumber="1";

function yourListener(newLocation, historyData) {
        //do something;
		//alert("currentPageNumber is " +currentPageNumber+ " and next location is page " + nextPageNumber);
		//clearInterval(id12);
		if(newLocation!=""){
			nextPageNumber=newLocation;
			fadeOutCurrentPageId = setInterval(fadeOutCurrentPage,20);
		}
}

/*window.onload = function() {
        
};*/


//dhtmlHistory.add("page1", objectContainingSomeRelevantData);

//dhtmlHistroy.add("page2", objectContainingPage2Data);

var isLoggedIn = false;


function Page(){
	this.opacity=0;
	this.container;
}


var pageArray = new Array();

var weightToLoseTimeToLoseWeightSubmitDivOpacity=0;
var number=0;
var congratulationsAndCurrentWeightDivOpacity=0;
var ktynsOpacity=100.0;
var registerSectionOpacity=0.0;
var registerSectionHasBeenAdded=false;
var confirmTargetSectionOpacity=0.0;
var opacityChangeSpeed=10.0;

var fadeOutKTYNSId;
var fadeInKTYNSId;
var fadeInRegisterSectionId;
var fadeOutRegisterSectionId;
var congratulationsAndCurrentWeightFadeInId;
var fadeInConfirmTargetSectionId;
var fadeOutConfirmTargetSectionId;
var id=0;
var id2=0;
var id3=0;
var id4=0;
var id5=0;
var id6=0;
var id7=0;
var id8=0;
var id9=0;
var id10=0;
var id11=0;
var id12=0;
var id13=0;

var currentDate;

var kgToLose = "";
var lbsToLose = "";
var months = "";
var weeks = "";
var days = "";

var preferredWeightUnits;
var preferredTimeUnits;

var kgCurrent;
var stCurrent;
var lbsCurrent;

var targetWeightInKg; 
var currentWeightInKg; 
var weightToLoseInKg;
var timeToLoseWeightInWeeks;

var username="";
var password="";
var flashParagraph;
var flashGraph;

var yesButton2HasBeenClicked=false;
var submitButton2HasBeenSuccessfullyClicked=false;
var noButton2HasBeenClicked=false;
var noChangeMyTargetButton;

var kgTextBox;
var lbsTextBox;
var monthsTextBox;
var weeksTextBox;
var daysTextBox;

var inputusernametextbox;
var inputpasswordtextbox;

var weightToLoseTimeToLoseWeightSubmitDiv;
var keepTrackYesNoSection;


//These are animated which is why they have to be global, in other words so that they are recognised by the animation functions




//DO THE REST WITH setAttribute!!!!!





var congratulationsAndCurrentWeightDiv;



try{
	var userNameTextBox=document.createElement('<INPUT id=username class="blacktextbox" style="WIDTH: 124px; HEIGHT: 22px" size=11 onmouseover="colourChange()" onmouseout="colourChange2()>');
}
catch(e){
	var userNameTextBox=document.createElement("INPUT"); 
	userNameTextBox.setAttribute("id","username");
	userNameTextBox.setAttribute("class","blacktextbox");
	userNameTextBox.setAttribute("style","WIDTH: 124px; HEIGHT: 22px");
	userNameTextBox.setAttribute("size","11");
	userNameTextBox.setAttribute("onmouseover","colourChange()");
	userNameTextBox.setAttribute("onmouseout","colourChange2()");
}

try{
	var passwordTextBox=document.createElement('<INPUT type=password id=password class="blacktextbox" onmouseover="colourChangePasswordTextBox()" onmouseout="colourChangePasswordTextBox2()" style="WIDTH: 125px; HEIGHT: 22px" size=10 >');
}
catch(e){
		var passwordTextBox=document.createElement('INPUT');
		passwordTextBox.setAttribute("type","password");
		passwordTextBox.setAttribute("id","password");
		passwordTextBox.setAttribute("class","blacktextbox");
		passwordTextBox.setAttribute("style","WIDTH: 125px; HEIGHT: 22px");
		passwordTextBox.setAttribute("size","10");
		passwordTextBox.setAttribute("onmouseover","colourChangePasswordTextBox()");
		passwordTextBox.setAttribute("onmouseout","colourChangePasswordTextBox2()");
}

var buttonStillPressedForPrint=false;
var buttonStillPressedForYes=false;
var buttonStillPressedForNo=false;
var buttonStillPressedForSubmit=false;
var buttonStillPressedForSubmit3=false;

if(navigator.appName=="Microsoft Internet Explorer"){
	var suggestionsHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");//ActiveX version
}
else if(window.XMLHttpRequest){
	suggestionsHttpRequestObject=new XMLHttpRequest();//Firefox, Safari, etc....
}

if(navigator.appName=="Microsoft Internet Explorer"){
	var sendUsernameAndPasswordHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
}
else if(window.XMLHttpRequest){
	var sendUsernameAndPasswordHttpRequestObject = new XMLHttpRequest();
}

if(navigator.appName=="Microsoft Internet Explorer"){
	var loginDetailsHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
}
else if(window.XMLHttpRequest){
	var loginDetailsHttpRequestObject = new XMLHttpRequest();
}

if(navigator.appName=="Microsoft Internet Explorer"){
	var storeWeightToLoseTimeToLoseWeightHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
}
else if(window.XMLHttpRequest){
	var storeWeightToLoseTimeToLoseWeightHttpRequestObject = new XMLHttpRequest();
}

if(navigator.appName=="Microsoft Internet Explorer"){
	var sendDateAndCurrentWeightHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
}
else if(window.XMLHttpRequest){
	var sendDateAndCurrentWeightHttpRequestObject = new XMLHttpRequest();
}

if(navigator.appName=="Microsoft Internet Explorer"){
	var sendDateAndCurrentWeightHttpRequestObject2 = new ActiveXObject("Microsoft.XMLHTTP");
}
else if(window.XMLHttpRequest){
	var sendDateAndCurrentWeightHttpRequestObject2 = new XMLHttpRequest();
}

if(navigator.appName=="Microsoft Internet Explorer"){
	var xmlHttpRequestGettingTargetWeightTargetTimeAndLastWeightFromDatabase = new ActiveXObject("Microsoft.XMLHTTP");
}
else if(window.XMLHttpRequest){
	var xmlHttpRequestGettingTargetWeightTargetTimeAndLastWeightFromDatabase = new XMLHttpRequest();
}

if(navigator.appName=="Microsoft Internet Explorer"){
	var xmlHttpRequestGettingNewSuggestions = new ActiveXObject("Microsoft.XMLHTTP");
}
else if(window.XMLHttpRequest){
	var xmlHttpRequestGettingNewSuggestions = new XMLHttpRequest();
}

if(navigator.appName=="Microsoft Internet Explorer"){
	var getLastWeightXMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
}
else if(window.XMLHttpRequest){
	var getLastWeightXMLHttpRequestObject = new XMLHttpRequest();
}


if(navigator.appName=="Microsoft Internet Explorer"){
	var replaceWeightXMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
}
else if(window.XMLHttpRequest){
	var replaceWeightXMLHttpRequestObject = new XMLHttpRequest();
}


var textFromPhp = "";
var suggestionString="";
var arrayOfExerciseStrings=new Array();

var textFromPhp2 = "";
var suggestionString2="";
var arrayOfExerciseStrings2=new Array();

var newPageBeingBuilt = 1;

var showTheOtherStuff;


function onBodyLoad(){

	
	dhtmlHistory.add(newPageBeingBuilt, 0);
	
	pageArray[newPageBeingBuilt] = new Page();
	pageArray[1].opacity=100;
	
	try{
		pageArray[newPageBeingBuilt].container=document.createElement('<div style="width:100%;background:white;margin-left:5%;margin-right:5%">');
	}
	catch(e){
		pageArray[newPageBeingBuilt].container=document.createElement("div");
		pageArray[newPageBeingBuilt].container.setAttribute("style", "width:100%;background:white;margin-left:5%;margin-right:5%");
	}
	
	document.body.appendChild(pageArray[newPageBeingBuilt].container);
		
		try{
			var titleImageParagraph= document.createElement('<P style="height:76px; position:absolute;top:30;left:20">');
			
		}
		catch(e){
			var titleImageParagraph= document.createElement('P');
			titleImageParagraph.setAttribute("style","height:76px; position:absolute;top:30;left:20");
		}
		document.body.appendChild(titleImageParagraph);
		
		try{
			var titleImage=document.createElement('<IMG  height="70" src="website.jpg" width="630" >');
		}
		catch(e){
			var titleImage=document.createElement('IMG');
			titleImage.setAttribute("height", "70");
			titleImage.setAttribute("src","website.jpg");
			titleImage.setAttribute("width","630");
		}	
		titleImageParagraph.appendChild(titleImage);
	
	try{
		loginOrLogoutDiv = document.createElement("<div id='loginorlogoutdiv' style='position:absolute;right:0;top:0'>");
		
	}
	catch(e){
		loginOrLogoutDiv = document.createElement("div");
		loginOrLogoutDiv.setAttribute("id","loginorlogoutdiv");
		loginOrLogoutDiv.setAttribute("style","position:absolute;right:0;top:0");
	}
	
	document.body.appendChild(loginOrLogoutDiv);
	
		loginDiv =  document.createElement("div");
		loginOrLogoutDiv.appendChild(loginDiv);
		
			var loginParagraph=document.createElement("P");
			loginParagraph.setAttribute("align", "right");
			loginDiv.appendChild(loginParagraph);
			
				var loginText=document.createTextNode("Go to my planner (existing members):");
				loginParagraph.appendChild(loginText);
					
			var userNameParagraph=document.createElement('P');
			userNameParagraph.setAttribute("align", "right");
			loginDiv.appendChild(userNameParagraph);

				var userNameText=document.createTextNode('username');
				userNameParagraph.appendChild(userNameText);

					try{
						var userNameTextBox=document.createElement('<INPUT id="username" class="blacktextbox" onkeypress="testForEnterKeyPressInLoginSection()" style="WIDTH: 124px; HEIGHT: 22px" size=11 onmouseover="colourChange()" onmouseout="colourChange2()>');
					}
					catch(e){ 
						var userNameTextBox=document.createElement('INPUT');
						userNameTextBox.setAttribute("id","username");
						userNameTextBox.onkeypress=testForEnterKeyPressInLoginSection;
						userNameTextBox.setAttribute("class","blacktextbox");
						userNameTextBox.setAttribute("style","WIDTH: 124px; HEIGHT: 22px");
						userNameTextBox.setAttribute("size","11");
						userNameTextBox.setAttribute("onmouseover","colourChange()");
						userNameTextBox.setAttribute("onmouseout","colourChange2()");
					}	
					
					userNameParagraph.appendChild(userNameTextBox);


			var passwordParagraph=document.createElement('P'); 
			passwordParagraph.setAttribute("align", "right");
			loginDiv.appendChild(passwordParagraph);


				var passwordText=document.createTextNode('password'); 
				passwordParagraph.appendChild(passwordText);

					try{
						var passwordTextBox=document.createElement('<INPUT type="password" onkeypress="testForEnterKeyPressInLoginSection()" id="password" class="blacktextbox" onmouseover="colourChangePasswordTextBox()" onmouseout="colourChangePasswordTextBox2()" style="WIDTH: 125px; HEIGHT: 22px" size=10>');
					}
					catch(e){
						var passwordTextBox=document.createElement('INPUT');
						passwordTextBox.setAttribute("type","password");
						passwordTextBox.onkeypress=testForEnterKeyPressInLoginSection;
						passwordTextBox.setAttribute("id","password");
						passwordTextBox.setAttribute("class","blacktextbox");
						passwordTextBox.setAttribute("style","WIDTH: 125px; HEIGHT: 22px");
						passwordTextBox.setAttribute("size","10");
						passwordTextBox.setAttribute("onmouseover","colourChangePasswordTextBox()");
						passwordTextBox.setAttribute("onmouseout","colourChangePasswordTextBox2()");
					}
					
					passwordParagraph.appendChild(passwordTextBox);
		
			try{
				loginButtonImage=document.createElement('<img id="login" src="loginbuttonup.png" align="right" onmouseover="onMouseOverLoginButton()" onmouseout="onMouseOutOfLoginButton()" onmousedown="onButtonPressLogin()" onclick="whenYouClickTheLoginButton()">');
			}
			catch(e){	
				loginButtonImage=document.createElement('input');
				loginButtonImage.setAttribute("type","image");
				loginButtonImage.setAttribute("id","login");
				loginButtonImage.setAttribute("src","loginbuttonup.png");
				loginButtonImage.setAttribute("align","right");
				loginButtonImage.setAttribute("onmouseover","onMouseOverLoginButton()");
				loginButtonImage.setAttribute("onmouseout","onMouseOutOfLoginButton()");
				loginButtonImage.setAttribute("onmousedown","onButtonPressLogin()");
				loginButtonImage.setAttribute("onclick","whenYouClickTheLoginButton()");
				
			}
			loginDiv.appendChild(loginButtonImage);
	
	
	try{
		var newUsersParagraph = document.createElement("<P style='position:absolute;top:154;left:200' id='newUser'>");
	}
	catch(e){
		var newUsersParagraph = document.createElement("P");
		newUsersParagraph.setAttribute("style","position:absolute;top:154;left:200");
		newUsersParagraph.setAttribute("id","newUser");
	}
	var newUsersText = document.createTextNode('Would you like to lose weight? This website will tell you how, once you enter some information. It will also keep track of your weight-loss progress graphically and give you updated suggestions over time for reaching your target successfully');
	
	newUsersParagraph.style.color="red";
	newUsersParagraph.appendChild(newUsersText);
	pageArray[newPageBeingBuilt].container.appendChild(newUsersParagraph);
	//weightToLoseTimeToLoseWeightSubmitDiv=document.createElement("<div style='position:absolute;top:0;left:0;width:100%;background:white'>");
	try{
		weightToLoseTimeToLoseWeightSubmitDiv=document.createElement("<div style='width:100%;height:310px;background:white'>");
	}
	catch(e){
		weightToLoseTimeToLoseWeightSubmitDiv=document.createElement("div");
		weightToLoseTimeToLoseWeightSubmitDiv.setAttribute("style","width:100%;height:330px;background:white");
	}
	weightToLoseTimeToLoseWeightSubmitDiv.style.position="absolute";
	weightToLoseTimeToLoseWeightSubmitDiv.style.top=250;
	weightToLoseTimeToLoseWeightSubmitDiv.style.left=100;
	pageArray[newPageBeingBuilt].container.appendChild(weightToLoseTimeToLoseWeightSubmitDiv);
			
			var weightToLoseParagraph=document.createElement('P');
			weightToLoseTimeToLoseWeightSubmitDiv.appendChild(weightToLoseParagraph);
			
			
			try{
				var weightToLoseTable=document.createElement('<TABLE style="WIDTH: 516px; HEIGHT: 70px" cellSpacing=1 cellPadding=1 width=516 border=0>');
			}
			catch(e){
			
				var weightToLoseTable=document.createElement('TABLE');
				weightToLoseTable.setAttribute("style","WIDTH: 516px; HEIGHT: 70px");
				weightToLoseTable.setAttribute("cellSpacing","1");
				weightToLoseTable.setAttribute("cellPadding","1");
				weightToLoseTable.setAttribute("width","516");
				weightToLoseTable.setAttribute("border","0");	
			}
			weightToLoseParagraph.appendChild(weightToLoseTable);
			
			
				var weightToLoseTableBody=document.createElement("tbody");
				weightToLoseTable.appendChild(weightToLoseTableBody);
			
					var weightToLosetr1=document.createElement('TR');
					weightToLoseTableBody.appendChild(weightToLosetr1);
			  
			  
						var enterWeightToLosetd=document.createElement('TD');
						weightToLosetr1.appendChild(enterWeightToLosetd);
				
				
							var enterWeightToLoseParagraph= document.createElement('P');
							enterWeightToLoseParagraph.setAttribute("align","right");
							enterWeightToLosetd.appendChild(enterWeightToLoseParagraph);
				 
				 
								var enterWeightToLoseText = document.createTextNode('Enter how much weight you want to lose');
								enterWeightToLoseParagraph.appendChild(enterWeightToLoseText);
				 
				 
						var kgTextBoxtd = document.createElement('TD');
						kgTextBoxtd.setAttribute("width","10");		
						weightToLosetr1.appendChild(kgTextBoxtd);
				
							try{
								kgTextBox=document.createElement('<INPUT class="blacktextbox" onkeypress="testForEnterKeyPressInSubmitSection()" onkeyup="onKeyUp()" size=4 id="kgtolose" style="WIDTH: 69px; HEIGHT: 22px">');
							}
							catch(e){
								kgTextBox=document.createElement('INPUT');
								kgTextBox.setAttribute("class","blacktextbox");
								kgTextBox.onkeypress=testForEnterKeyPressInSubmitSection;
								//kgTextBox.setAttribute("onkeyup","onKeyUp()");
								kgTextBox.onkeyup=onKeyUp;
								kgTextBox.setAttribute("size","4");
								kgTextBox.setAttribute("id","kgtolose");
								kgTextBox.setAttribute("style","WIDTH: 69px; HEIGHT: 22px");
							}
							kgTextBoxtd.appendChild(kgTextBox);
				
						var kgtd=document.createElement('TD');
						weightToLosetr1.appendChild(kgtd);
				
							var kgp=document.createElement('P');
							kgtd.appendChild(kgp);
				
								var kgText=document.createTextNode('kg');
								kgp.appendChild(kgText);
				
					var weightToLosetr2=document.createElement('TR');
					weightToLoseTableBody.appendChild(weightToLosetr2);
			  
						var ortd= document.createElement('TD');
						weightToLosetr2.appendChild(ortd);
			   
							var orp = document.createElement('P');
							orp.setAttribute("align","right");
							ortd.appendChild(orp);
				  
								var orText = document.createTextNode('or');
								orp.appendChild(orText);
				  
						var lbsTextBoxtd = document.createElement('TD');
						weightToLosetr2.appendChild(lbsTextBoxtd);
				
							try{
								lbsTextBox = document.createElement('<INPUT id=lbstolose class="blacktextbox" onkeypress="testForEnterKeyPressInSubmitSection()" onkeyup="onKeyUp2()" style="WIDTH: 68px; HEIGHT: 22px" size=6>');
							}
							catch(e){
								lbsTextBox = document.createElement('INPUT');
								lbsTextBox.setAttribute("id","lbstolose");
								lbsTextBox.setAttribute("class","blacktextbox");
								lbsTextBox.onkeypress=testForEnterKeyPressInSubmitSection;
								//lbsTextBox.setAttribute("onkeyup","onKeyUp2()");
								lbsTextBox.onkeyup=onKeyUp2;
								lbsTextBox.setAttribute("style","WIDTH: 68px; HEIGHT: 22px");
								lbsTextBox.setAttribute("size","6");
							}
							lbsTextBoxtd.appendChild(lbsTextBox);
				
				
				//DO THE  REST BELOW using setAttribute method
				
						var lbstd = document.createElement('TD');
						weightToLosetr2.appendChild(lbstd);
				
							var lbsp = document.createElement('P');
							lbstd.appendChild(lbsp);
				
								var lbsText = document.createTextNode('lbs');
								lbsp.appendChild(lbsText);
				
			var timep = document.createElement('P');
			weightToLoseTimeToLoseWeightSubmitDiv.appendChild(timep);

			
			var timeTable = document.createElement("TABLE");
			timeTable.setAttribute("cellSpacing","1");
			timeTable.setAttribute("cellPadding","1");
			timeTable.setAttribute("width","75%");
			timeTable.setAttribute("border","0");
			timep.appendChild(timeTable);
			
			
				var timeTableBody = document.createElement("tbody");
				timeTable.appendChild(timeTableBody);
			
			  
					var timeTabletr1 = document.createElement('TR');
					timeTableBody.appendChild(timeTabletr1);
			  
						var inHowMuchTimetd = document.createElement('TD');
						timeTabletr1.appendChild(inHowMuchTimetd);
				
							var inHowMuchTimep=document.createElement("P");
							inHowMuchTimep.setAttribute("align", "right");
							inHowMuchTimetd.appendChild(inHowMuchTimep);
				  
								var inHowMuchTimeStrong=document.createElement('STRONG');
								inHowMuchTimep.appendChild(inHowMuchTimeStrong);
									
									var inHowMuchTimeText=document.createTextNode('In how much time');
									inHowMuchTimeStrong.appendChild(inHowMuchTimeText);
				
						var monthsTextBoxtd=document.createElement("TD");
						monthsTextBoxtd.setAttribute("width", "10");
						timeTabletr1.appendChild(monthsTextBoxtd);
					
					
					
					
					
							try{
								monthsTextBox = document.createElement('<INPUT id=months onkeyup="onKeyUpInMonthsTextBox()" onkeypress="testForEnterKeyPressInSubmitSection()" class="blacktextbox" style="WIDTH: 58px; HEIGHT: 22px" size=5>');
							}
							catch(e){
								monthsTextBox = document.createElement('INPUT');
								//monthsTextBox.setAttribute("onkeyup", "onKeyUpInMonthsTextBox()");
								monthsTextBox.onkeypress=testForEnterKeyPressInSubmitSection;
								monthsTextBox.onkeyup=onKeyUpInMonthsTextBox;
								monthsTextBox.setAttribute("id","months");
								monthsTextBox.setAttribute("class","blacktextbox");
								monthsTextBox.setAttribute("style","WIDTH: 58px; HEIGHT: 22px");
								monthsTextBox.setAttribute("size","5");	
							}
					
							monthsTextBoxtd.appendChild(monthsTextBox);
				
						var monthstd = document.createElement('TD');
						timeTabletr1.appendChild(monthstd);
				
							var monthsText = document.createTextNode('months');
							monthstd.appendChild(monthsText);
				
					var timeTabletr2 = document.createElement('TR');
					timeTableBody.appendChild(timeTabletr2);
			  
						var orWeekstd= document.createElement('TD');
						timeTabletr2.appendChild(orWeekstd);
			  
							var orWeeksp = document.createElement('P');
							orWeeksp.setAttribute("align","right");
							orWeekstd.appendChild(orWeeksp);
				
								var orWeeksText = document.createTextNode('+');
								orWeeksp.appendChild(orWeeksText);
			  
			  
						var weeksTextBoxtd = document.createElement('TD');
						timeTabletr2.appendChild(weeksTextBoxtd);
				
							try{
								weeksTextBox=document.createElement('<INPUT id=weeks onkeyup="onKeyUpInWeeksTextBox()" onkeypress="testForEnterKeyPressInSubmitSection()" class="blacktextbox" style="WIDTH: 58px; HEIGHT: 22px" size=5>');
							}
							catch(e){
								weeksTextBox=document.createElement("INPUT");
								//weeksTextBox.setAttribute("onkeyup","onKeyUpInWeeksTextBox()");
								weeksTextBox.onkeypress=testForEnterKeyPressInSubmitSection;
								weeksTextBox.onkeyup=onKeyUpInWeeksTextBox;
								weeksTextBox.setAttribute("id","weeks");
								weeksTextBox.setAttribute("class","blacktextbox");
								weeksTextBox.setAttribute("style","WIDTH: 58px; HEIGHT: 22px");
								weeksTextBox.setAttribute("size","5");
					
							}
				
							weeksTextBoxtd.appendChild(weeksTextBox);
				
						var weekstd=document.createElement('TD');
						timeTabletr2.appendChild(weekstd);
				
							var weeksText=document.createTextNode('weeks');
							weekstd.appendChild(weeksText);
					var timeTabletr3=document.createElement('TR');
					timeTableBody.appendChild(timeTabletr3);
				
						var orDaystd=document.createElement('TD');
						timeTabletr3.appendChild(orDaystd);
							var orDaysp=document.createElement('P');
							orDaysp.setAttribute("align","right");
							orDaystd.appendChild(orDaysp);
								var orDaysText=document.createTextNode('+');
								orDaysp.appendChild(orDaysText);
						var daysTextBoxtd=document.createElement('TD');
						timeTabletr3.appendChild(daysTextBoxtd);
							try{
								daysTextBox=document.createElement('<INPUT id=days onkeyup="onKeyUpInDaysTextBox()" onkeypress="testForEnterKeyPressInSubmitSection()" class="blacktextbox" style="WIDTH: 58px; HEIGHT: 22px" size=5>');
							}
							catch(e){
								daysTextBox=document.createElement('INPUT');
								//daysTextBox.setAttribute("onkeyup","onKeyUpInDaysTextBox()");
								daysTextBox.onkeypress=testForEnterKeyPressInSubmitSection;
								daysTextBox.onkeyup=onKeyUpInDaysTextBox;
								daysTextBox.setAttribute("id","days");
								daysTextBox.setAttribute("class","blacktextbox");
								daysTextBox.setAttribute("style","WIDTH: 58px; HEIGHT: 22px");
								daysTextBox.setAttribute("size","5");
							}
							daysTextBoxtd.appendChild(daysTextBox);
						
						var daystd=document.createElement('TD');
						timeTabletr3.appendChild(daystd);
				 
							var daysText=document.createTextNode('days');
							daystd.appendChild(daysText);
			var spacep=document.createElement('P');
			weightToLoseTimeToLoseWeightSubmitDiv.appendChild(spacep);
				var space=document.createTextNode(' ');
				spacep.appendChild(space);
				
			var pressSubmitForSuggestionsp=document.createElement('P');
			weightToLoseTimeToLoseWeightSubmitDiv.appendChild(pressSubmitForSuggestionsp);
				
				try{
					var pressSubmitForSuggestionsTable=document.createElement('<TABLE style="WIDTH: 536px; HEIGHT: 61px" cellSpacing=1 cellPadding=1 width=536 border=0>');
				}
				catch(e){
					var pressSubmitForSuggestionsTable=document.createElement('TABLE');
					pressSubmitForSuggestionsTable.setAttribute("style","WIDTH: 536px; HEIGHT: 61px");
					pressSubmitForSuggestionsTable.setAttribute("cellSpacing","1");
					pressSubmitForSuggestionsTable.setAttribute("cellPadding","1");
					pressSubmitForSuggestionsTable.setAttribute("width","536");
					pressSubmitForSuggestionsTable.setAttribute("border","0");
				}
				pressSubmitForSuggestionsp.appendChild(pressSubmitForSuggestionsTable);
				
					var pressSubmitForSuggestionsTableBody=document.createElement("tbody");
					pressSubmitForSuggestionsTable.appendChild(pressSubmitForSuggestionsTableBody);
				
						var pressSubmitForSuggestionstr=document.createElement('TR');
						pressSubmitForSuggestionsTableBody.appendChild(pressSubmitForSuggestionstr);
							var pressSubmitForSuggestionstd=document.createElement('TD');
							pressSubmitForSuggestionstr.appendChild(pressSubmitForSuggestionstd);
								var pressSubmitForSuggestionsText=document.createTextNode('Press the submit button for suggestions!');
								pressSubmitForSuggestionstd.appendChild(pressSubmitForSuggestionsText);
							var submitButtontd=document.createElement('TD');
							pressSubmitForSuggestionstr.appendChild(submitButtontd);
								try{
									submitButtonImg=document.createElement('<input type="image" id="submitbutton"  src="button1.png" onmouseover="onMouseOverButton()" onmouseout="onMouseOutOfButton()" onmousedown="onButtonPress()" onclick="whenYouClickTheDisabledSubmitButton()">');
								}
								catch(e){
									submitButtonImg=document.createElement("input");
									submitButtonImg.setAttribute("type","image");
									submitButtonImg.setAttribute("id","submitbutton");
									submitButtonImg.setAttribute("src","button1.png");
									submitButtonImg.setAttribute("onmouseover","onMouseOverButton()");
									submitButtonImg.setAttribute("onmouseout","onMouseOutOfButton()");
									submitButtonImg.setAttribute("onmousedown","onButtonPress()");
									submitButtonImg.setAttribute("onclick","whenYouClickTheDisabledSubmitButton()");
								}
								submitButtontd.appendChild(submitButtonImg);
						
	document.getElementById("kgtolose").focus();
	
	username=readCookie('username');
	password=readCookie("password");
	if (username!=null && username!=""&&password!=null&&password!=""){
		whenYouClickTheLoginButton();
	}
}

var mouseIsHeldAfterPressingLoginButton=false;


function whenYouClickTheLoginButton(){
	
	if(inputWarningP!=undefined&&contains(weightToLoseTimeToLoseWeightSubmitDiv,inputWarningP)){
		weightToLoseTimeToLoseWeightSubmitDiv.removeChild(inputWarningP);
	}
	
	if(username==undefined&&password==undefined){
	
		username = document.getElementById("username").value;
		password = document.getElementById("password").value;
	}

	loginDetailsHttpRequestObject.open("GET", "login.php?username1="+ username +"&password1="+ password);
	loginDetailsHttpRequestObject.send("9");
	loginDetailsHttpRequestObject.onreadystatechange = onReadyStateChangeForLogin;

}

function testForEnterKeyPressInSubmitSection(e){
	//alert("key pressed in submit section");
	
	
	if(!e&&event.keyCode==13){ //i.e. if ENTER is pressed
		event.keyCode=9;  //tricks the browser into thinking a different key has just been pressed, in this case TAB, so that the browser does not perform its own pre-set action of clicking a button it wants to on the page
		submitButtonImg.click();
	}
	else if(e&&e.which==13){
		//e.which=9;
		submitButtonImg.click();
	}
	
}

function testForEnterKeyPressInLoginSection(e){
	//alert("key pressed in login section");
	if(!e&&event.keyCode==13){ //i.e. if ENTER is pressed
		event.keyCode=9;    //tricks the browser into thinking a different key has just been pressed, in this case TAB, so that the browser does not perform its own pre-set action of clicking a button it wants to on the page
		loginButtonImage.click();
	}
	else if(e&&e.which==13){
		//e.which=9;
		loginButtonImage.click();
	}
	
}

function onReadyStateChangeForLogin(){

	if(loginDetailsHttpRequestObject.readyState == 4){ //when its readyState changes to 4, that means a response (error or transfer) has been received after the request!!
		
		if(loginDetailsHttpRequestObject.responseText=="matched"){
			//alert("you are logged in");
			//alert("Username is " +username + ", password is " +password)
			/*
			while(pageArray[5].container.firstChild){ //removes all children from pageArray[5].container
		
				pageArray[5].container.removeChild(pageArray[5].container.firstChild)
			}
			*/
			createCookie("username",username,365);
			createCookie("password",password,365);
			
			isLoggedIn=true;
			
			try{
				logoutButtonImage=document.createElement('<input type="image" id="logoutbutton"  src="Log out.gif" onmouseover="onMouseOverLogoutButton()" onmouseout="onMouseOutOfLogoutButton()" onmousedown="onButtonPressLogout()" onclick="whenYouClickTheLogoutButton()">');
			}
			catch(e){
				logoutButtonImage=document.createElement("input");
				logoutButtonImage.setAttribute("type","image");
				logoutButtonImage.setAttribute("id","logoutbutton");
				logoutButtonImage.setAttribute("src","Log out.gif");
				logoutButtonImage.setAttribute("onmouseover","onMouseOverLogoutButton()");
				logoutButtonImage.setAttribute("onmouseout","onMouseOutOfLogoutButton()");
				logoutButtonImage.setAttribute("onmousedown","onButtonPressLogout()");
				logoutButtonImage.setAttribute("onclick","whenYouClickTheLogoutButton()");
			}
			
			/*
			try{
				myPlannerButton=document.createElement('<input style="position:absolute;right:200" type="image" id="myplannerbutton"  src="My planner page.gif" onclick="whenYouClickTheMyPlannerPageButton()">');
			}
			catch(e){
				myPlannerButton=document.createElement("input");
				myPlannerButton.setAttribute("style","position:absolute;right:200");
				myPlannerButton.setAttribute("type","image");
				myPlannerButton.setAttribute("id","myplannerbutton");
				myPlannerButton.setAttribute("src","My planner page.gif");
				myPlannerButton.setAttribute("onclick","whenYouClickTheMyPlannerPageButton()");
			}
			*/
			
			loginOrLogoutDiv.removeChild(loginDiv);
			loginOrLogoutDiv.appendChild(logoutButtonImage);
			//loginOrLogoutDiv.appendChild(myPlannerButton);
			
			buildNewPageContainer();
		
			var welcomeParagraph=document.createElement('P');
			pageArray[newPageBeingBuilt].container.appendChild(welcomeParagraph);
				var welcomeBackMessage=document.createTextNode('Welcome back, ' + username + '! ');
				welcomeParagraph.appendChild(welcomeBackMessage);
				var weightQuestion=document.createTextNode('What is your weight now?  ');
				welcomeParagraph.appendChild(weightQuestion);
				
				try
				{
					var weightNowTextBoxKg=document.createElement("<INPUT id='kgNow' onkeypress='testForEnterKeyPressInCurrentWeightPage5()' onkeyup='onKeyUpWeightNowTextBoxKg()' style='WIDTH: 50px; HEIGHT: 22px' class='blacktextbox' >");
				}
				catch(e)
				{
					var weightNowTextBoxKg=document.createElement("INPUT");
					weightNowTextBoxKg.setAttribute("id", "kgNow");
					weightNowTextBoxKg.onkeypress=testForEnterKeyPressInCurrentWeightPage5;
					//weightNowTextBoxKg.setAttribute("onkeyup", "onKeyUpWeightNowTextBoxKg()");
					weightNowTextBoxKg.onkeyup=onKeyUpWeightNowTextBoxKg;
					weightNowTextBoxKg.setAttribute("style", "WIDTH: 50px; HEIGHT: 22px");
					weightNowTextBoxKg.setAttribute("class", "blacktextbox");
				
				}
				welcomeParagraph.appendChild(weightNowTextBoxKg);
				var kgNowText=document.createTextNode('kg  OR ');
				welcomeParagraph.appendChild(kgNowText);
				try
				{
					var weightNowTextBoxSt=document.createElement("<INPUT id='stNow' onkeypress='testForEnterKeyPressInCurrentWeightPage5()' onkeyup='onKeyUpWeightNowTextBoxSt()' style='WIDTH: 50px; HEIGHT: 22px' class='blacktextbox' >");
				}
				catch(e)
				{
					var weightNowTextBoxSt=document.createElement("INPUT");
					weightNowTextBoxSt.setAttribute("id", "stNow");
					weightNowTextBoxSt.onkeypress=testForEnterKeyPressInCurrentWeightPage5;
					//weightNowTextBoxSt.setAttribute("onkeyup", "onKeyUpWeightNowTextBoxSt()");
					weightNowTextBoxSt.onkeyup=onKeyUpWeightNowTextBoxSt;
					weightNowTextBoxSt.setAttribute("style", "WIDTH: 50px; HEIGHT: 22px");
					weightNowTextBoxSt.setAttribute("class", "blacktextbox");
				}
				welcomeParagraph.appendChild(weightNowTextBoxSt);
				var stNowText=document.createTextNode('St ');
				welcomeParagraph.appendChild(stNowText);
				try
				{
					var weightNowTextBoxLbs=document.createElement("<INPUT id='lbsNow' onkeypress='testForEnterKeyPressInCurrentWeightPage5()' onkeyup='onKeyUpWeightNowTextBoxLbs()' style='WIDTH: 50px; HEIGHT: 22px' class='blacktextbox' >");
				}
				catch(e)
				{
					var weightNowTextBoxLbs=document.createElement("INPUT");
					weightNowTextBoxLbs.setAttribute("id", "lbsNow");
					weightNowTextBoxLbs.onkeypress=testForEnterKeyPressInCurrentWeightPage5;
					//weightNowTextBoxLbs.setAttribute("onkeyup", "onKeyUpWeightNowTextBoxLbs()");
					weightNowTextBoxLbs.onkeyup=onKeyUpWeightNowTextBoxLbs;
					weightNowTextBoxLbs.setAttribute("style", "WIDTH: 50px; HEIGHT: 22px");
					weightNowTextBoxLbs.setAttribute("class", "blacktextbox");
				}
				welcomeParagraph.appendChild(weightNowTextBoxLbs);
				var lbsNowText=document.createTextNode('lbs    ');
				welcomeParagraph.appendChild(lbsNowText);
				var welcomeParagraph2=document.createElement('P');
				pageArray[newPageBeingBuilt].container.appendChild(welcomeParagraph2);
				try
				{
					submitButtonImg5=document.createElement('<input type="image" id="submitbutton"  src="button1.png" onmouseover="onMouseOverButton()" onmouseout="onMouseOutOfButton()" onmousedown="onButtonPress()" onclick="whenYouClickTheDisabledSubmitButton5()">');
				}
				catch(e)
				{
					submitButtonImg5=document.createElement("input");
					submitButtonImg5.setAttribute("type","image");
					submitButtonImg5.setAttribute("style","position:absolute;top:56;left:0");
					submitButtonImg5.setAttribute("id","submitbutton");
					submitButtonImg5.setAttribute("src","button1.png");
					submitButtonImg5.setAttribute("onmouseover","onMouseOverButton()");
					submitButtonImg5.setAttribute("onmouseout","onMouseOutOfButton()");
					submitButtonImg5.setAttribute("onmousedown","onButtonPress()");
					submitButtonImg5.setAttribute("onclick","whenYouClickTheDisabledSubmitButton5()");
				}
				welcomeParagraph2.appendChild(submitButtonImg5);
				
				try
				{
					notNowImg=document.createElement('<input style="position:absolute;top:43;left:230" type="image" id="notnow"  src="Not now, show my progress.gif" onmouseover="onmouseoverNotNowButton()" onmouseout="onMouseOutOfNotNowButton()" onmousedown="onButtonPressNotNowButton()" onclick="whenYouClickNotNow()">');
				}
				catch(e)
				{
					notNowImg=document.createElement("input");
					notNowImg.setAttribute("style","position:absolute;top:56;left:230");
					notNowImg.setAttribute("type","image");
					notNowImg.setAttribute("id","notnow");
					notNowImg.setAttribute("src","Not now, show my progress.gif");
					notNowImg.setAttribute("onmouseover","onmouseoverNotNowButton()");
					notNowImg.setAttribute("onmouseout","onMouseOutOfNotNowButton()");
					notNowImg.setAttribute("onmousedown","onButtonPressNotNowButton()");
					notNowImg.setAttribute("onclick","whenYouClickNotNow()");
				}
				
				pageArray[newPageBeingBuilt].container.appendChild(notNowImg);
				
			nextPageNumber=newPageBeingBuilt;
			fadeOutCurrentPageId = setInterval(fadeOutCurrentPage,20);
			
			
		
		}
		else if(loginDetailsHttpRequestObject.responseText=="notmatched"){
			alert("That username and password was not found! Please be careful of any spelling mistakes.");
		}
		else{
			//alert(loginDetailsHttpRequestObject.responseText);
			alert("That username and password was not found! Please be careful of any spelling mistakes.");
		}
	}

}

	


function onKeyUpWeightNowTextBoxKg(){
	kgCurrent=document.getElementById("kgNow").value;
	stCurrent=document.getElementById("stNow").value;
	lbsCurrent=document.getElementById("lbsNow").value;
	
while(kgCurrent.charAt(kgCurrent.length-1)!="0"&&//while the last character is not a number, delete it.(slice it)
		kgCurrent.charAt(kgCurrent.length-1)!="1"&&
		kgCurrent.charAt(kgCurrent.length-1)!="2"&&
		kgCurrent.charAt(kgCurrent.length-1)!="3"&&
		kgCurrent.charAt(kgCurrent.length-1)!="4"&&
		kgCurrent.charAt(kgCurrent.length-1)!="5"&&
		kgCurrent.charAt(kgCurrent.length-1)!="6"&&
		kgCurrent.charAt(kgCurrent.length-1)!="7"&&
		kgCurrent.charAt(kgCurrent.length-1)!="8"&&
		kgCurrent.charAt(kgCurrent.length-1)!="9"&&
		kgCurrent.charAt(kgCurrent.length-1)!="."&&
		kgCurrent!="")  { //charAt gets the character at that position in the string, "that" position is the string's length minus 1

		kgCurrent = kgCurrent.slice(0,kgCurrent.length-1);
		document.getElementById("kgNow").value = kgCurrent;
	}
	
	if(kgCurrent !="" && (lbsCurrent !="" || stCurrent !="")){
		document.getElementById("stNow").value = "";
		document.getElementById("lbsNow").value = "";
	}
	
	if(document.getElementById("kgNow").value!=""||document.getElementById("stNow").value!=""||document.getElementById("lbsNow").value!=""){
	
		//buttonEnabled=true;
		submitButtonImg5.onclick = whenYouClickTheSubmitButtonPage5;
		submitButtonImg5.style.filter="alpha(opacity=100)";
	}
	else{
		submitButtonImg5.onclick = whenYouClickTheDisabledSubmitButton5;
		submitButtonImg5.style.filter="alpha(opacity=50)";
	}
	
}

function onKeyUpWeightNowTextBoxSt(){

	kgCurrent=document.getElementById("kgNow").value;
	stCurrent=document.getElementById("stNow").value;
	lbsCurrent=document.getElementById("lbsNow").value;
	
while(stCurrent.charAt(stCurrent.length-1)!="0"&&//while the last character is not a number, delete it.(slice it)
		stCurrent.charAt(stCurrent.length-1)!="1"&&
		stCurrent.charAt(stCurrent.length-1)!="2"&&
		stCurrent.charAt(stCurrent.length-1)!="3"&&
		stCurrent.charAt(stCurrent.length-1)!="4"&&
		stCurrent.charAt(stCurrent.length-1)!="5"&&
		stCurrent.charAt(stCurrent.length-1)!="6"&&
		stCurrent.charAt(stCurrent.length-1)!="7"&&
		stCurrent.charAt(stCurrent.length-1)!="8"&&
		stCurrent.charAt(stCurrent.length-1)!="9"&&
		stCurrent.charAt(stCurrent.length-1)!="."&&
		stCurrent!="")  { //charAt gets the character at that position in the string, "that" position is the string's length minus 1

		stCurrent = stCurrent.slice(0,stCurrent.length-1);
		document.getElementById("stNow").value = stCurrent;
	}
	
	if(kgCurrent !="" && (lbsCurrent !="" || stCurrent !="")){
		document.getElementById("kgNow").value = "";
	}
	
	if(document.getElementById("kgNow").value!=""||document.getElementById("stNow").value!=""||document.getElementById("lbsNow").value!=""){
	
		//buttonEnabled=true;
		submitButtonImg5.onclick = whenYouClickTheSubmitButtonPage5;
		submitButtonImg5.style.filter="alpha(opacity=100)";
	}
	else{
		submitButtonImg5.onclick = whenYouClickTheDisabledSubmitButton5;
		submitButtonImg5.style.filter="alpha(opacity=50)";
	}
}

function onKeyUpWeightNowTextBoxLbs(){

	kgCurrent=document.getElementById("kgNow").value;
	stCurrent=document.getElementById("stNow").value;
	lbsCurrent=document.getElementById("lbsNow").value;
	
while(lbsCurrent.charAt(lbsCurrent.length-1)!="0"&&//while the last character is not a number, delete it.(slice it)
		lbsCurrent.charAt(lbsCurrent.length-1)!="1"&&
		lbsCurrent.charAt(lbsCurrent.length-1)!="2"&&
		lbsCurrent.charAt(lbsCurrent.length-1)!="3"&&
		lbsCurrent.charAt(lbsCurrent.length-1)!="4"&&
		lbsCurrent.charAt(lbsCurrent.length-1)!="5"&&
		lbsCurrent.charAt(lbsCurrent.length-1)!="6"&&
		lbsCurrent.charAt(lbsCurrent.length-1)!="7"&&
		lbsCurrent.charAt(lbsCurrent.length-1)!="8"&&
		lbsCurrent.charAt(lbsCurrent.length-1)!="9"&&
		lbsCurrent.charAt(lbsCurrent.length-1)!="."&&
		lbsCurrent!="")  { //charAt gets the character at that position in the string, "that" position is the string's length minus 1

		lbsCurrent = lbsCurrent.slice(0,lbsCurrent.length-1);
		document.getElementById("lbsNow").value = lbsCurrent;
	}
	
	if(kgCurrent !="" && (lbsCurrent !="" || stCurrent !="")){
		document.getElementById("kgNow").value = "";
	}
	
	if(document.getElementById("kgNow").value!=""||document.getElementById("stNow").value!=""||document.getElementById("lbsNow").value!=""){
	
		//buttonEnabled=true;
		submitButtonImg5.onclick = whenYouClickTheSubmitButtonPage5;
		submitButtonImg5.style.filter="alpha(opacity=100)";
	}
	else{
		submitButtonImg5.onclick = whenYouClickTheDisabledSubmitButton5;
		submitButtonImg5.style.filter="alpha(opacity=50)";
	}

}

function whenYouClickTheDisabledSubmitButton5(){

	alert("Please enter something");
}

function whenYouClickTheSubmitButtonPage5(){
	//var date1=new Date();
	//var myString=formatDateForMySQL(date1);

	theyveEnteredTheirCurrentWeight=true;
	
	kgCurrent=document.getElementById("kgNow").value;
	stCurrent=document.getElementById("stNow").value;
	lbsCurrent=document.getElementById("lbsNow").value;
	
	if(kgCurrent!=""){
		preferredWeightUnits = "kg";
	}
	else if(stCurrent!=""){
		preferredWeightUnits = "St";
	}
	else if(lbsCurrent!=""){
		preferredWeightUnits = "lbs";
	}
	
	
	var totalLbs = 0;
	
	if(kgCurrent!=""){
		currentWeightInKg = kgCurrent;
	}
	else if(lbsCurrent!=""||stCurrent!=""){ 
		if(lbsCurrent!=""){
			totalLbs += lbsCurrent;
		}
		
		if(stCurrent!=""){
			totalLbs += stCurrent * 14;
		}
		
		currentWeightInKg = totalLbs * 0.45359237;	
	}
	else{
		alert("No current weight was found");
	}
	
	currentDate=new Date();
	var date=formatDateForMySQL(currentDate);
	
	//alert(date);
	
	//document.body.appendChild(document.createTextNode(myDateString));
	sendDateAndCurrentWeightHttpRequestObject2.open("GET", "storeDateWeightProgram.php?kgCurrent=" + kgCurrent + "&stCurrent=" + stCurrent + "&lbsCurrent=" + lbsCurrent + "&username=" + username + "&password=" + password + "&date=" + date + "&preferredweightunits=" +preferredWeightUnits, true);
    sendDateAndCurrentWeightHttpRequestObject2.send("9");
	sendDateAndCurrentWeightHttpRequestObject2.onreadystatechange = onReadyStateChangeFunctionForStoreProgramDateExistingUser;
	
	
	showTheOtherStuff=true;
	
	
}

function getUsername(){
	//alert("the username the actionscript is requesting is " + username);
	return username;

}

function getPassword(){
	//alert("the password the actionscript is requesting is " + password);
	return password;
}


function onButtonPressLogin(){}

function createZoomInOrOutButton(){
	try{
		var zoomInOrOutButton = document.createElement("<INPUT style='position:absolute;top:116;left:457' type='image' src='Zoom InOut.png' id='zoominout'  onmouseover='mouseoverZoomInOut()' onmouseout='onMouseOutOfZoomInOutButton()' onmousedown='buttonPressZoomInOut()' onclick='zoomInOutActionScript()'>")
	}
	catch(e){
	var zoomInOrOutButton=document.createElement("input");
	zoomInOrOutButton.setAttribute("style", "position:absolute;top:136;left:460");
	zoomInOrOutButton.setAttribute("type", "image");
	zoomInOrOutButton.setAttribute("src", "Zoom InOut.png");
	zoomInOrOutButton.setAttribute("id", "zoominout");
	zoomInOrOutButton.setAttribute("onmouseover", "mouseoverZoomInOut()");
	zoomInOrOutButton.setAttribute("onmouseout", "onMouseOutOfZoomInOutButton()");
	zoomInOrOutButton.setAttribute("onmousedown", "buttonPressZoomInOut()");
	zoomInOrOutButton.setAttribute("onclick", "zoomInOutActionScript()");
	
	
	
	}
	pageArray[newPageBeingBuilt].container.appendChild(zoomInOrOutButton);

}

function zoomInOutActionScript(){
	if(document.embeds["WeightProgressGraph"]){
		//alert("doing the embeds thingy");
		document.embeds["WeightProgressGraph"].zoomInOut();
	}
	else{
		flashGraph.zoomInOut();
	}
	

}
function mouseoverZoomInOut(){

    if(mouseIsHeldAfterPressingZoomInOutButton==true){
        document.getElementById("zoominout").src="Zoom InOut_pr.png";
    }
    else{
        document.getElementById("zoominout").src="Zoom InOut_mo.png";
    }

}

function onMouseOutOfZoomInOutButton(){

    document.getElementById("zoominout").src="Zoom InOut.png";

}

function buttonPressZoomInOut(){
 
    document.getElementById("zoominout").src="Zoom InOut_pr.png";
     mouseIsHeldAfterPressingZoomInOutButton=true;
     
     
          
}
function onmouseoverNotNowButton(){
	if(mouseIsHeldAfterPressingNotNowButton==true){
		document.getElementById("notnow").src="Not now, show my progress_pr.gif"; 
	}
	else{
		document.getElementById("notnow").src="Not now, show my progress_mo.gif";
	}
	
}
function onMouseOutOfNotNowButton(){
	document.getElementById("notnow").src="Not now, show my progress.gif";
}
function onButtonPressNotNowButton(){
	
	document.getElementById("notnow").src="Not now, show my progress_pr.gif";
	mouseIsHeldAfterPressingNotNowButton=true;
}

function onKeyUpInDaysTextBox(e){
	
	var key = e ? e.which : window.event.keyCode;
	
	if(key!=13&&inputWarningP!=undefined&&contains(weightToLoseTimeToLoseWeightSubmitDiv,inputWarningP)){
		weightToLoseTimeToLoseWeightSubmitDiv.removeChild(inputWarningP);
	}
	
	var lbsString = document.getElementById("lbstolose").value;
	var kgString = document.getElementById("kgtolose").value;
	var daysString = document.getElementById("days").value;
	var weeksString = document.getElementById("weeks").value;
	var monthsString = document.getElementById("months").value;
	
	while(daysString.charAt(daysString.length-1)!="0"&&//while the last character is not a number, delete it.(slice it)
		daysString.charAt(daysString.length-1)!="1"&&
		daysString.charAt(daysString.length-1)!="2"&&
		daysString.charAt(daysString.length-1)!="3"&&
		daysString.charAt(daysString.length-1)!="4"&&
		daysString.charAt(daysString.length-1)!="5"&&
		daysString.charAt(daysString.length-1)!="6"&&
		daysString.charAt(daysString.length-1)!="7"&&
		daysString.charAt(daysString.length-1)!="8"&&
		daysString.charAt(daysString.length-1)!="9"&&
		daysString.charAt(daysString.length-1)!="."&&
		daysString!="")  { //charAt gets the character at that position in the string, "that" position is the string's length minus 1

		daysString = daysString.slice(0,daysString.length-1);
		document.getElementById("days").value = daysString;
	}
	
	if((kgString!=""||lbsString!="") && (daysString!=""||weeksString!=""||monthsString!="")){
	
		//buttonEnabled=true;
		submitButtonImg.onclick = whenYouClickTheSubmitButton;
		
		submitButtonImg.style.filter="alpha(opacity=100)";
		submitButtonImg.style.MozOpacity=100/100.0;
		submitButtonImg.style.opacity=100/100.0;
	}
	else{
		submitButtonImg.onclick = whenYouClickTheDisabledSubmitButton;
		submitButtonImg.style.filter="alpha(opacity=50)";
		submitButtonImg.style.MozOpacity=50/100.0;
		submitButtonImg.style.opacity=50/100.0;
	}

}

function onKeyUpInWeeksTextBox(e){

	var key = e ? e.which : window.event.keyCode;
	
	if(key!=13&&inputWarningP!=undefined&&contains(weightToLoseTimeToLoseWeightSubmitDiv,inputWarningP)){
		weightToLoseTimeToLoseWeightSubmitDiv.removeChild(inputWarningP);
	}

	var lbsString = document.getElementById("lbstolose").value;
	var kgString = document.getElementById("kgtolose").value;
	var daysString = document.getElementById("days").value;
	var weeksString = document.getElementById("weeks").value;
	var monthsString = document.getElementById("months").value;
	
	while(weeksString.charAt(weeksString.length-1)!="0"&&//while the last character is not a number, delete it.(slice it)
		weeksString.charAt(weeksString.length-1)!="1"&&
		weeksString.charAt(weeksString.length-1)!="2"&&
		weeksString.charAt(weeksString.length-1)!="3"&&
		weeksString.charAt(weeksString.length-1)!="4"&&
		weeksString.charAt(weeksString.length-1)!="5"&&
		weeksString.charAt(weeksString.length-1)!="6"&&
		weeksString.charAt(weeksString.length-1)!="7"&&
		weeksString.charAt(weeksString.length-1)!="8"&&
		weeksString.charAt(weeksString.length-1)!="9"&&
		weeksString.charAt(weeksString.length-1)!="."&&
		weeksString!="")  { //charAt gets the character at that position in the string, "that" position is the string's length minus 1

		weeksString = weeksString.slice(0,weeksString.length-1);
		document.getElementById("weeks").value = weeksString;
	}
	
	if((kgString!=""||lbsString!="") && (daysString!=""||weeksString!=""||monthsString!="")){
	
		//buttonEnabled=true;
		submitButtonImg.onclick = whenYouClickTheSubmitButton;
		submitButtonImg.style.filter="alpha(opacity=100)";
		submitButtonImg.style.MozOpacity=1.0;
		submitButtonImg.style.opacity=1.0;
	}
	else{
		submitButtonImg.onclick = whenYouClickTheDisabledSubmitButton;
		submitButtonImg.style.filter="alpha(opacity=50)";
		submitButtonImg.style.MozOpacity=0.5;
		submitButtonImg.style.opacity=0.5;
	}

}

function onKeyUpInMonthsTextBox(e){

	var key=e?e.which:window.event.keyCode;
	
	if(key!=13&&inputWarningP!=undefined&&contains(weightToLoseTimeToLoseWeightSubmitDiv,inputWarningP)){
		weightToLoseTimeToLoseWeightSubmitDiv.removeChild(inputWarningP);
	}
	
	//alert("event fired");
	
	var lbsString = document.getElementById("lbstolose").value;
	var kgString = document.getElementById("kgtolose").value;
	var daysString = document.getElementById("days").value;
	var weeksString = document.getElementById("weeks").value;
	var monthsString = document.getElementById("months").value;
	
	while(monthsString.charAt(monthsString.length-1)!="0"&&//while the last character is not a number, delete it.(slice it)
		monthsString.charAt(monthsString.length-1)!="1"&&
		monthsString.charAt(monthsString.length-1)!="2"&&
		monthsString.charAt(monthsString.length-1)!="3"&&
		monthsString.charAt(monthsString.length-1)!="4"&&
		monthsString.charAt(monthsString.length-1)!="5"&&
		monthsString.charAt(monthsString.length-1)!="6"&&
		monthsString.charAt(monthsString.length-1)!="7"&&
		monthsString.charAt(monthsString.length-1)!="8"&&
		monthsString.charAt(monthsString.length-1)!="9"&&
		monthsString.charAt(monthsString.length-1)!="."&&
		monthsString!="")  { //charAt gets the character at that position in the string, "that" position is the string's length minus 1

		monthsString = monthsString.slice(0,monthsString.length-1);
		document.getElementById("months").value = monthsString;
	}
	
	if((kgString!=""||lbsString!="") && (daysString!=""||weeksString!=""||monthsString!="")){
	
		//buttonEnabled=true;
		submitButtonImg.onclick = whenYouClickTheSubmitButton;
		submitButtonImg.style.filter="alpha(opacity=100)";
		submitButtonImg.style.MozOpacity=1.0;
		submitButtonImg.style.opacity=1.0;
		//alert("button enabled");
	}
	else{
		submitButtonImg.onclick = whenYouClickTheDisabledSubmitButton;
		submitButtonImg.style.filter="alpha(opacity=50)";
		submitButtonImg.style.MozOpacity=0.5;
		submitButtonImg.style.opacity=0.5;
		//alert("button disabled");
	}

}

function onKeyUp(e){

	var key = e ? e.which : window.event.keyCode;
	
	if(key!=13&&inputWarningP!=undefined&&contains(weightToLoseTimeToLoseWeightSubmitDiv,inputWarningP)){
		weightToLoseTimeToLoseWeightSubmitDiv.removeChild(inputWarningP);
	}
	
	
	var lbsString = document.getElementById("lbstolose").value;
	var kgString = document.getElementById("kgtolose").value;
	var daysString = document.getElementById("days").value;
	var weeksString = document.getElementById("weeks").value;
	var monthsString = document.getElementById("months").value;
	while(kgString.charAt(kgString.length-1)!="0"&&//while the last character is not a number, delete it.(slice it)
		kgString.charAt(kgString.length-1)!="1"&&
		kgString.charAt(kgString.length-1)!="2"&&
		kgString.charAt(kgString.length-1)!="3"&&
		kgString.charAt(kgString.length-1)!="4"&&
		kgString.charAt(kgString.length-1)!="5"&&
		kgString.charAt(kgString.length-1)!="6"&&
		kgString.charAt(kgString.length-1)!="7"&&
		kgString.charAt(kgString.length-1)!="8"&&
		kgString.charAt(kgString.length-1)!="9"&&
		kgString.charAt(kgString.length-1)!="."&&
		kgString!="")  { //charAt gets the character at that position in the string, "that" position is the string's length minus 1

		kgString = kgString.slice(0,kgString.length-1);
		document.getElementById("kgtolose").value = kgString;
	}
	
	if(kgString !="" && lbsString !=""){
		document.getElementById("lbstolose").value = "";
	}
	
	//alert("kgtolose says "+document.getElementById("kgtolose").value+", months says " +document.getElementById("months").value);
	
	if((document.getElementById("kgtolose").value !=""||document.getElementById("lbstolose").value!="") && (document.getElementById("days").value!=""||document.getElementById("weeks").value!=""||document.getElementById("months").value!="")){
	
		//buttonEnabled=true;
		//alert("submit button enabled!!");
		submitButtonImg.onclick = whenYouClickTheSubmitButton;
		submitButtonImg.style.filter="alpha(opacity=100)";
		submitButtonImg.style.MozOpacity=1.0;
		submitButtonImg.style.opacity=1.0;
	}
	else{
		submitButtonImg.onclick = whenYouClickTheDisabledSubmitButton;
		submitButtonImg.style.filter="alpha(opacity=50)";
		submitButtonImg.style.MozOpacity=0.5;
		submitButtonImg.style.opacity=0.5;
	}
	
	
			
	
}
function onKeyUp2(e){

	var key=e?e.which:window.event.keyCode;
	
	if(key!=13&&inputWarningP!=undefined&&contains(weightToLoseTimeToLoseWeightSubmitDiv,inputWarningP)){
		weightToLoseTimeToLoseWeightSubmitDiv.removeChild(inputWarningP);
	}
	
	var kgString = document.getElementById("kgtolose").value;
	var lbsString = document.getElementById("lbstolose").value;
	var daysString = document.getElementById("days").value;
	var weeksString = document.getElementById("weeks").value;
	var monthsString = document.getElementById("months").value;
	while(lbsString.charAt(lbsString.length-1)!="0"&&
		lbsString.charAt(lbsString.length-1)!="1"&&
		lbsString.charAt(lbsString.length-1)!="2"&&
		lbsString.charAt(lbsString.length-1)!="3"&&
		lbsString.charAt(lbsString.length-1)!="4"&&
		lbsString.charAt(lbsString.length-1)!="5"&&
		lbsString.charAt(lbsString.length-1)!="6"&&
		lbsString.charAt(lbsString.length-1)!="7"&&
		lbsString.charAt(lbsString.length-1)!="8"&&
		lbsString.charAt(lbsString.length-1)!="9"&&
		lbsString.charAt(lbsString.length-1)!="."&&
		lbsString!="")  { 
		
		lbsString = lbsString.slice(0,lbsString.length-1);
		document.getElementById("lbstolose").value = lbsString;
	}
	
	if(kgString !="" && lbsString !=""){
		document.getElementById("kgtolose").value = "";
	}
	
	if((document.getElementById("kgtolose").value !=""||document.getElementById("lbstolose").value!="") && (document.getElementById("days").value!=""||document.getElementById("weeks").value!=""||document.getElementById("months").value!="")){
	
		//buttonEnabled=true;
		submitButtonImg.onclick = whenYouClickTheSubmitButton;
		submitButtonImg.style.filter="alpha(opacity=100)";
		submitButtonImg.style.MozOpacity=1.0;
		submitButtonImg.style.opacity=1.0;
	}
	else{
		submitButtonImg.onclick = whenYouClickTheDisabledSubmitButton;
		submitButtonImg.style.filter="alpha(opacity=50)";
		submitButtonImg.style.MozOpacity=0.5;
		submitButtonImg.style.opacity=0.5;
	}
	
}


function whenYouClickTheDisabledSubmitButton(){

	alert("Please enter something");
}

function whenYouClickTheSubmitButtonPage7(){



}


function onKeyUpOnCurrentWeightKgTextBox(){

	var lbsString = document.getElementById("lbs").value;
	var kgString = document.getElementById("kg").value;
	//alert("kgString IS:");
	var stString = document.getElementById("st").value;
	while(kgString.charAt(kgString.length-1)!="0"&&//while the last character is not a number, delete it.(slice it)
		kgString.charAt(kgString.length-1)!="1"&&
		kgString.charAt(kgString.length-1)!="2"&&
		kgString.charAt(kgString.length-1)!="3"&&
		kgString.charAt(kgString.length-1)!="4"&&
		kgString.charAt(kgString.length-1)!="5"&&
		kgString.charAt(kgString.length-1)!="6"&&
		kgString.charAt(kgString.length-1)!="7"&&
		kgString.charAt(kgString.length-1)!="8"&&
		kgString.charAt(kgString.length-1)!="9"&&
		kgString.charAt(kgString.length-1)!="."&&
		kgString!="")  { //charAt gets the character at that position in the string, "that" position is the string's length minus 1

		kgString = kgString.slice(0,kgString.length-1);
		document.getElementById("kg").value = kgString;
		
	}
	
	if(kgString !="" && (lbsString !="" || stString !="")){
		document.getElementById("st").value = "";
		document.getElementById("lbs").value = "";
	}
	
	if(document.getElementById("kg").value!=""||document.getElementById("st").value!=""||document.getElementById("lbs").value!=""){
	
		//buttonEnabled=true;
		//alert("we're here in kg enabling");
		submitButtonImg2.onclick = whenYouClickTheSubmitButton3;
		submitButtonImg2.style.filter="alpha(opacity=100)";
		submitButtonImg.style.MozOpacity=1.0;
		submitButtonImg.style.opacity=1.0;
	}
	else{
		//alert("we're here, in kg disabling")
		submitButtonImg2.onclick = whenYouClickTheDisabledSubmitButton3;
		submitButtonImg2.style.filter="alpha(opacity=50)";
		submitButtonImg.style.MozOpacity=0.5;
		submitButtonImg.style.opacity=0.5;
	}
	
			
	
}
function whenYouClickTheDisabledSubmitButton3(){

	alert("Please enter something");

}


/*function getSomethingFromJavaScript(){

	return something;

}
*/

function displayStatusVersusTarget(status){
	
	try{
		var message = document.createElement("<P style='position:absolute;top:330;left:460'>");
	}
	catch(e){
		var message = document.createElement("P");
		message.setAttribute("style","position:absolute;top:330;left:520");
	}
	
	if(status=="behind"){
		message.appendChild(document.createTextNode("You're behind target. Don't give up!"));
	}
	else if(status=="on"){
		message.appendChild(document.createTextNode("You're on target. Well done!"));
	}
	else if(status=="ahead"){
		message.appendChild(document.createTextNode("You're ahead of target. Well done. Keep it up!"));
	}
	else{
		alert("Don't know status");
	}
	
	pageArray[newPageBeingBuilt].container.appendChild(message);
	
	
	
}



function getTargetWeightTargetTimeAndLastWeightFromDatabase(){

	xmlHttpRequestGettingTargetWeightTargetTimeAndLastWeightFromDatabase.open("GET","getTargetWeightTargetTimeAndLastWeight.php?username=" +username+ "&password=" +password, true);
	xmlHttpRequestGettingTargetWeightTargetTimeAndLastWeightFromDatabase.send("3");
	xmlHttpRequestGettingTargetWeightTargetTimeAndLastWeightFromDatabase.onreadystatechange = onReadyStateChangeForGetTargetWeightTargetTimeAndLastWeight;

	
}

function onReadyStateChangeForGetTargetWeightTargetTimeAndLastWeight(){
	if(xmlHttpRequestGettingTargetWeightTargetTimeAndLastWeightFromDatabase.readyState==4){//response received
		
		var receivedString=xmlHttpRequestGettingTargetWeightTargetTimeAndLastWeightFromDatabase.responseText;
		
		//alert(receivedString);
		
		var receivedStringArray=receivedString.split("/");
		var targetWeightInKg = receivedStringArray[0];
		
		//alert("Current weight in Kg is: " + currentWeightInKg);
		
		lastWeightInKg = receivedStringArray[3];
		
		//alert("receivedStringArray[3] is " +receivedStringArray[3]+ " and target weight in kg is " + targetWeightInKg);
		
		
		weightToLoseInKg = lastWeightInKg - targetWeightInKg;
		
		//alert("weight to lose in kg is: " + weightToLoseInKg);
		
		timeToLoseWeightInWeeks = receivedStringArray[1];
		
		var firstDateString = receivedStringArray[2];
		var firstDateInTheFormOfAnArray = firstDateString.split("-"); 
		var firstDate = new Date();
		firstDate.setFullYear(firstDateInTheFormOfAnArray[0]);
		firstDate.setMonth(firstDateInTheFormOfAnArray[1]-1);
		firstDate.setDate(firstDateInTheFormOfAnArray[2]);
		
		//alert(firstDate.toString());
		currentDate=new Date();
		var targetDate = new Date();
		
		targetDate.setTime(timeToLoseWeightInWeeks*7*24*60*60*1000 + firstDate.getTime());
		
		targetTimeInMillisecondsFromNow = targetDate.getTime() - currentDate.getTime();
		
		targetTimeInWeeksFromNow = targetTimeInMillisecondsFromNow/(7*24*60*60*1000);
		

	
	}


}


function showCurrentSuggestionsAndChangeTargetButtons(){

		
		
		try{
			var updateSuggestionsButton=document.createElement('<input style="position:absolute;top:370;left:460" type="image" id="updatesuggestions"  src="Show me latest suggestions.png" onmouseover="onMouseOverUpdateSugggestionsButton()" onmouseout="onMouseOutOfUpdateSuggestionsButton()" onmousedown="onButtonPressUpdateSuggestions()" onclick="whenYouClickTheUpdateSuggestionsButton()">');
		}
		catch(e){
			var updateSuggestionsButton=document.createElement("input");
			updateSuggestionsButton.setAttribute("style","position:absolute;top:370;left:460");
			updateSuggestionsButton.setAttribute("type","image");
			updateSuggestionsButton.setAttribute("id","updatesuggestions");
			updateSuggestionsButton.setAttribute("src","Show me latest suggestions.png");
			updateSuggestionsButton.setAttribute("onmouseover","onMouseOverUpdateSugggestionsButton()");
			updateSuggestionsButton.setAttribute("onmouseout","onMouseOutOfUpdateSuggestionsButton()");
			updateSuggestionsButton.setAttribute("onmousedown","onButtonPressUpdateSuggestions()");
			updateSuggestionsButton.setAttribute("onclick","whenYouClickTheUpdateSuggestionsButton()");
			
		}
		pageArray[newPageBeingBuilt].container.appendChild(updateSuggestionsButton);
		
		try{
			var changeTargetButtonPage5=document.createElement('<input style="position:absolute;top:370;left:665" type="image" id="changeTargetPage5" src="Change target.gif" onmouseover="onMouseOverChangeTargetButton()" onmouseout="onMouseOutOfChangeTargetButton()" onmousedown="onButtonPressChangeTarget()" onclick="whenYouClickTheChangeTargetButtonPage5()">');
		}
		catch(e){
			var changeTargetButtonPage5=document.createElement("input");
			changeTargetButtonPage5.setAttribute("style","position:absolute;top:370;left:660");
			changeTargetButtonPage5.setAttribute("type","image");
			changeTargetButtonPage5.setAttribute("id","changeTargetPage5");
			changeTargetButtonPage5.setAttribute("src","Change target.gif");
			changeTargetButtonPage5.setAttribute("onmouseover","onMouseOverChangeTargetButton()");
			changeTargetButtonPage5.setAttribute("onmouseout","onMouseOutOfChangeTargetButton()");
			changeTargetButtonPage5.setAttribute("onmousedown","onButtonPressChangeTarget()");
			changeTargetButtonPage5.setAttribute("onclick","whenYouClickTheChangeTargetButtonPage5()");
		}
		pageArray[newPageBeingBuilt].container.appendChild(changeTargetButtonPage5);
		
		
}



function showAccordingToYourTargetYouShouldBe(){

	//alert("reached this first point");
	
		if(document.embeds["WeightProgressGraph"]){
			var weightYouShouldBeByNowFromActionScript = document.embeds["WeightProgressGraph"].returnWeightYouShouldBeByNowFromActionScript();
		}
		else{
			var weightYouShouldBeByNowFromActionScript = flashGraph.returnWeightYouShouldBeByNowFromActionScript();
		}
		
		if(document.embeds["WeightProgressGraph"]){
			var preferredWeightUnitsFromActionScript = document.embeds["WeightProgressGraph"].returnPreferredWeightUnitsFromActionScript();
		}
		else{
			var preferredWeightUnitsFromActionScript = flashGraph.returnPreferredWeightUnitsFromActionScript();
		}
		
		//alert("reached after that line ok nals?");
		
		
		//alert(x);
		
		weightYouShouldBeByNowFromActionScript*=10.0;
		weightYouShouldBeByNowFromActionScript=Math.round(weightYouShouldBeByNowFromActionScript);
		weightYouShouldBeByNowFromActionScript/=10.0;
		
		
		
		try{
			var message2 = document.createElement("<P style='position:absolute;top:310;left:460;width:100%'>");
		}
		catch(e){
			var message2 = document.createElement("P");
			message2.setAttribute("style", "position:absolute;top:310;left:460;width:100%");
		}
		//alert(preferredWeightUnitsFromActionScript);
		
		
		
		if(preferredWeightUnitsFromActionScript=="kg" || preferredWeightUnitsFromActionScript=="lbs"){
			//alert('we are here');
			message2.appendChild(document.createTextNode( "According to your target your weight should be " + weightYouShouldBeByNowFromActionScript + preferredWeightUnitsFromActionScript + " by now"));
			
		}
		else if(preferredWeightUnitsFromActionScript=="St"){
			message2.appendChild(document.createTextNode( "According to your target your weight should be " + parseInt(weightYouShouldBeByNowFromActionScript/14) + " stone " +weightYouShouldBeByNowFromActionScript%14+ "lbs by now"));
		}
		else{	
			alert("preferred weight units is not kg, lbs or st in actionscript");
		}
		
		pageArray[newPageBeingBuilt].container.appendChild(message2);
}


function showFirstDayMessage(){
		try{
			var message2 = document.createElement("<P style='position:absolute;top:280;left:460;width:500px;height:50px'>");
		}
		catch(e){
			var message2 = document.createElement("P");
			message2.setAttribute("style", "position:absolute;top:265;left:460;width:500px;height:50px");
		}
		message2.appendChild(document.createTextNode("This is your first day of trying to reach your new target weight. Coming back to this site regularly will help you track your progress and be able to view new suggestions for exercise and diet amounts needed to reach your target!"));

		pageArray[newPageBeingBuilt].container.appendChild(message2);
}

function actionScriptAlert(x){

	alert(x);

}

function whenYouClickTheUpdateSuggestionsButton(){
	
	//alert("weightToLoseInKg is " + weightToLoseInKg + " , targetTimeInWeeksFromNow is " + targetTimeInWeeksFromNow);

	xmlHttpRequestGettingNewSuggestions.open("GET","suggestionsCalculation.php?kgtolose=" +weightToLoseInKg+ "&weeks=" +targetTimeInWeeksFromNow, true);
	xmlHttpRequestGettingNewSuggestions.send("3");
	xmlHttpRequestGettingNewSuggestions.onreadystatechange=whenTheReadyStateOfXMLHttpRequestGettingNewSuggestionsChanges;


}


function whenTheReadyStateOfXMLHttpRequestGettingNewSuggestionsChanges(){

	if(xmlHttpRequestGettingNewSuggestions.readyState==4){
		
		
		
		textFromPhp2 = xmlHttpRequestGettingNewSuggestions.responseText;
		//alert(textFromPhp2);
		
		
	   var arrayOfStringsCreatedFromSplittingTextFromPhp=textFromPhp2.split(",");
	   var calorieToLoseFromExercisePerDay=arrayOfStringsCreatedFromSplittingTextFromPhp[0];
	   var caloriesToEatPerDay=arrayOfStringsCreatedFromSplittingTextFromPhp[1];
	   
	   var arrayOfExerciseTypes = new Array();
	   var arrayOfExerciseDurations = new Array();
	   
	   for(var i=2;i<arrayOfStringsCreatedFromSplittingTextFromPhp.length;i++){
				
			if(i%2==0){
				arrayOfExerciseTypes[(i-2)/2] = arrayOfStringsCreatedFromSplittingTextFromPhp[i];
			}
			else if(i%2==1){
				arrayOfExerciseDurations[(i-3)/2] = Math.round(arrayOfStringsCreatedFromSplittingTextFromPhp[i]);
			}
	   }
	   
	   //var exerciseType=arrayOfStringsCreatedFromSplittingTextFromPhp[2];
	   //var durationOfExercise=arrayOfStringsCreatedFromSplittingTextFromPhp[3];
	   
	   suggestionString2="For an equal balance of diet and exercise based weight-loss, try to eat around " + Math.round(caloriesToEatPerDay) + " calories in a day and do any of the following activities on each day each of which adds up to " + Math.round(calorieToLoseFromExercisePerDay) + " calories burnt:";
	   
	   
	   for(var i=0;i<arrayOfExerciseTypes.length-1;i++){
			
			arrayOfExerciseStrings2[i] = arrayOfExerciseTypes[i] + " - " + arrayOfExerciseDurations[i] + " minutes ";
		
		}
		
		
		
		
		try{
		var suggestionsList=document.createElement("<UL id='suggestionslist' type='disc'>");
	}
	catch(e){
		var suggestionsList=document.createElement('UL');
		suggestionsList.setAttribute("type","disc");
		suggestionsList.setAttribute("id","suggestionslist");
	}
	
	

	buildNewPageContainer();
	
	pageArray[newPageBeingBuilt].container.appendChild(suggestionsList);
		var suggestion1ListElement=document.createElement('LI');
		suggestionsList.appendChild(suggestion1ListElement);
			
			
			beginningBitOfSuggestionsP = document.createElement("P");
			suggestion1ListElement.appendChild(beginningBitOfSuggestionsP);
			
				var suggestion1=document.createTextNode(suggestionString2);
				beginningBitOfSuggestionsP.appendChild(suggestion1);
			
			var suggestion1ExerciseList = document.createElement('ul');
			suggestion1ExerciseList.setAttribute("type","disc");
			suggestion1ListElement.appendChild(suggestion1ExerciseList);
			
			var arrayOfSuggestion1ExerciseListElements = new Array();
			
			for (var i = 0; i<arrayOfExerciseStrings2.length; i++){
				arrayOfSuggestion1ExerciseListElements[i] = document.createElement('li');
				suggestion1ExerciseList.appendChild(arrayOfSuggestion1ExerciseListElements[i]);
			}
			
			var arrayOfExerciseStringsTextNodes = new Array();
			
			for(var i=0; i<arrayOfExerciseStrings2.length ; i++){
			
				arrayOfExerciseStringsTextNodes[i] = document.createTextNode(arrayOfExerciseStrings2[i]);
				arrayOfSuggestion1ExerciseListElements[i].appendChild(arrayOfExerciseStringsTextNodes[i]);
			}
			
			
			
			
		/*
		var suggestion2ListElement=document.createElement('LI');
		suggestionsList.appendChild(suggestion2ListElement);
			var suggestion2=document.createTextNode('jklkj');
			suggestion2ListElement.appendChild(suggestion2);*/
		
		/*var suggestion3ListElement=document.createElement('LI');
		suggestionsList.appendChild(suggestion3ListElement);
			var suggestion3=document.createTextNode('jklk');
			suggestion3ListElement.appendChild(suggestion3)

*/
	try{
		var printButtonDiv=document.createElement('<div id="pbd" style="height:70px; position:absolute; top:70; left:400">');
	}
	catch(e){
		var printButtonDiv=document.createElement('div');
		printButtonDiv.setAttribute("id","pbd");
		printButtonDiv.setAttribute("style","height:70px; position:absolute; top:70; left:400");
	}
	pageArray[newPageBeingBuilt].container.appendChild(printButtonDiv);
	
	var printButtonp=document.createElement('P');
	printButtonDiv.appendChild(printButtonp);
		try{
			var printButton=document.createElement('<input type="image" id="printbutton" src="Print my suggestions.gif" onmouseover="onMouseOverPrintButton()" onmouseout="onMouseOutOfPrintButton()" onmousedown="onPrintButtonPressed()" onclick="onPrintButtonClicked()" />');
		}
		catch(e){
			var printButton=document.createElement("input");
			printButton.setAttribute("type","image");
			printButton.setAttribute("id","printbutton2");
			printButton.setAttribute("src","Print my suggestions.gif");
			printButton.setAttribute("onmouseover","onMouseOverPrintButton()");
			printButton.setAttribute("onmouseout","onMouseOutOfPrintButton()");
			printButton.setAttribute("onmousedown","onPrintButtonPressed()");
			printButton.setAttribute("onclick","onPrintButtonClicked()");
		}
		printButtonp.appendChild(printButton);
		
		try{
			var backToMyPlannerButton=document.createElement('<input style="position:absolute;top:70;left:600" type="image" id="backtomyplanner" src="Back to my planner.gif" onclick="onBackToMyPlannerClicked()" />');
		}
		catch(e){
			var backToMyPlannerButton=document.createElement("input");
			backToMyPlannerButton.setAttribute("style","position:absolute;top:85;left:600");
			backToMyPlannerButton.setAttribute("type","image");
			backToMyPlannerButton.setAttribute("id","backtomyplanner");
			backToMyPlannerButton.setAttribute("src","Back to my planner.gif");
			backToMyPlannerButton.setAttribute("onclick","onBackToMyPlannerClicked()");
		}
		pageArray[newPageBeingBuilt].container.appendChild(backToMyPlannerButton);
		
		nextPageNumber=newPageBeingBuilt;
		fadeOutCurrentPageId = setInterval(fadeOutCurrentPage,20);
		
		
		//document.body.removeChild(pageArray[1].container);
		
		//document.body.appendChild(document.createTextNode("This is Page 2!!!!! Look!!!!"));	
	
	
	
	
	}

}

function onBackToMyPlannerClicked(){

	history.go(-1);

	//nextPageNumber=nextPageNumber-1;
	//fadeOutCurrentPageId = setInterval(fadeOutCurrentPage,20);
}

function whenYouClickTheChangeTargetButtonPage5(){
			
			buildNewPageContainer();
			
	        pageArray[newPageBeingBuilt].container.appendChild(weightToLoseTimeToLoseWeightSubmitDiv);
			weightToLoseTimeToLoseWeightSubmitDiv.style.position = "relative";
			weightToLoseTimeToLoseWeightSubmitDiv.style.top = 0;
			weightToLoseTimeToLoseWeightSubmitDiv.style.left = 0;
			nextPageNumber = newPageBeingBuilt;
			fadeOutCurrentPageId = setInterval(fadeOutCurrentPage,20);
			
			kgTextBox.value="";
			lbsTextBox.value="";
			monthsTextBox.value="";
			weeksTextBox.value="";
			daysTextBox.value="";
			
}

function onKeyUpOnCurrentWeightStTextBox(){
	
	var lbsString = document.getElementById("lbs").value;
	var kgString = document.getElementById("kg").value;
	var stString = document.getElementById("st").value;
	while(stString.charAt(stString.length-1)!="0"&&
		stString.charAt(stString.length-1)!="1"&&
		stString.charAt(stString.length-1)!="2"&&
		stString.charAt(stString.length-1)!="3"&&
		stString.charAt(stString.length-1)!="4"&&
		stString.charAt(stString.length-1)!="5"&&
		stString.charAt(stString.length-1)!="6"&&
		stString.charAt(stString.length-1)!="7"&&
		stString.charAt(stString.length-1)!="8"&&
		stString.charAt(stString.length-1)!="9"&&
		stString.charAt(stString.length-1)!="."&&
		stString!="")  { 
		
		stString = stString.slice(0,stString.length-1);
		document.getElementById("st").value = stString;
	}
	
	if(kgString !="" && (lbsString !="" || stString !="")){
		document.getElementById("kg").value = "";
	}
	if(document.getElementById("kg").value!=""||document.getElementById("st").value!=""||document.getElementById("lbs").value!=""){
	
		//buttonEnabled=true;
		//alert("we're here in st enabling");
		submitButtonImg2.onclick = whenYouClickTheSubmitButton3;
		submitButtonImg2.style.filter="alpha(opacity=100)";
	}
	else{
		//alert("we're here in st disabling");
		submitButtonImg2.onclick = whenYouClickTheDisabledSubmitButton3;
		submitButtonImg2.style.filter="alpha(opacity=50)";
	}
}

function onKeyUpOnCurrentWeightLbsTextBox(){
	
	var lbsString = document.getElementById("lbs").value;
	var kgString = document.getElementById("kg").value;
	var stString = document.getElementById("st").value;
	while(lbsString.charAt(lbsString.length-1)!="0"&&
		lbsString.charAt(lbsString.length-1)!="1"&&
		lbsString.charAt(lbsString.length-1)!="2"&&
		lbsString.charAt(lbsString.length-1)!="3"&&
		lbsString.charAt(lbsString.length-1)!="4"&&
		lbsString.charAt(lbsString.length-1)!="5"&&
		lbsString.charAt(lbsString.length-1)!="6"&&
		lbsString.charAt(lbsString.length-1)!="7"&&
		lbsString.charAt(lbsString.length-1)!="8"&&
		lbsString.charAt(lbsString.length-1)!="9"&&
		lbsString.charAt(lbsString.length-1)!="."&&
		lbsString!="")  { 
		
		lbsString = lbsString.slice(0,lbsString.length-1);
		document.getElementById("lbs").value = lbsString;
	}
	
	if(kgString !="" && (lbsString !="" || stString !="")){
		document.getElementById("kg").value = "";
	}
	if(document.getElementById("kg").value!=""||document.getElementById("st").value!=""||document.getElementById("lbs").value!=""){
	
		//buttonEnabled=true;
		//alert("we're here in lbs enabling");
		submitButtonImg2.onclick = whenYouClickTheSubmitButton3;
		submitButtonImg2.style.filter="alpha(opacity=100)";
	}
	else{
		//alert("we're here in lbs disabling");
		submitButtonImg2.onclick = whenYouClickTheDisabledSubmitButton3;
		submitButtonImg2.style.filter="alpha(opacity=50)";
	}
}






function onMouseOverLoginButton(){
if(mouseIsHeldAfterPressingLoginButton==true){
	document.getElementById("login").src="loginbuttonup.png"
	}
else{
	document.getElementById("login").src="loginbuttonup.png"
	}
}
function onMouseOutOfLoginButton(){

    document.getElementById("login").src="loginbuttonup.png";

}

function onButtonLoginPress(){
 
    document.getElementById("login").src="loginbuttonup.png";
     mouseIsHeldAfterPressingLoginButton=true;
     
     
          
}
var mouseIsHeldAfterPressingButton=false;


function onMouseOverButton(){

    if(mouseIsHeldAfterPressingButton==true){
        document.getElementById("submitbutton").src="button3.png";
    }
    else{
        document.getElementById("submitbutton").src="button2.png";
    }

}

function onMouseOutOfButton(){

    document.getElementById("submitbutton").src="button1.png";

}

function onButtonPress(){
 
    document.getElementById("submitbutton").src="button3.png";
     mouseIsHeldAfterPressingButton=true;
     
     
          
}
var mouseIsHeldAfterPressingUpdateSuggestionsButton=false;

function onMouseOverUpdateSugggestionsButton(){

    if(mouseIsHeldAfterPressingUpdateSuggestionsButton==true){
        document.getElementById("updatesuggestions").src="Show me latest suggestions_pr.png";
    }
    else{
        document.getElementById("updatesuggestions").src="Show me latest suggestions_mo.png";
    }

}

function onMouseOutOfUpdateSuggestionsButton(){

    document.getElementById("updatesuggestions").src="Show me latest suggestions.png";

}

function onButtonPressUpdateSuggestions(){
 
    document.getElementById("updatesuggestions").src="Show me latest suggestions_pr.png";
     mouseIsHeldAfterPressingUpdateSuggestionsButton=true;
     
     
          
}
var mouseIsHeldAfterPressingChangeTargetButton=false;

function onMouseOverChangeTargetButton(){

    if(mouseIsHeldAfterPressingChangeTargetButton==true){
        document.getElementById("changeTargetPage5").src="Change target_pr.gif";
    }
    else{
        document.getElementById("changeTargetPage5").src="Change target_mo.gif";
    }

}

function onMouseOverChangeTargetAgainButton(){

    if(mouseIsHeldAfterPressingChangeTargetButton==true){
        document.getElementById("changeTargetAgain").src="Change target again_pr.gif";
    }
    else{
        document.getElementById("changeTargetAgain").src="Change target again_mo.gif";
    }

}

function onMouseOutOfChangeTargetButton(){

    document.getElementById("changeTargetPage5").src="Change target.gif";

}

function onMouseOutOfChangeTargetAgainButton(){

    document.getElementById("changeTargetAgain").src="Change target again.gif";

}

function onButtonPressChangeTarget(){
 
    document.getElementById("changeTargetPage5").src="Change target_pr.gif";
     mouseIsHeldAfterPressingChangeTargetButton=true;
     
     
          
}

function onButtonPressChangeTargetAgain(){
 
    document.getElementById("changeTargetAgain").src="Change target again_pr.gif";
     mouseIsHeldAfterPressingChangeTargetButton=true;
     
     
          
}

function colourChange(){
	document.getElementById("username").style.backgroundColor="red";
}

function colourChange2(){
	document.getElementById("username").style.backgroundColor="black";
}

function colourChangePasswordTextBox(){
	document.getElementById("password").style.backgroundColor="red";
}

function colourChangePasswordTextBox2(){
	document.getElementById("password").style.backgroundColor="black";
}

function whenYouClickTheSubmitButton(){


    kgToLose = document.getElementById("kgtolose").value;
    lbsToLose = document.getElementById("lbstolose").value;
    months = document.getElementById("months").value;
    weeks = document.getElementById("weeks").value;
    days = document.getElementById("days").value;
	
	
	
	if(months!=""){
		preferredTimeUnits = "months";
	}
	else if(weeks!="" && months==""){
		preferredTimeUnits = "weeks";
	}
	else if(days!="" && weeks=="" && months==""){
		preferredTimeUnits = "days";
	}
	
	
	if(kgToLose!=""){
		var pounds = kgToLose * 2.20462262;
	}
	else if(lbsToLose!=""){
		var pounds = lbsToLose;
	}
	else{
	}
	
	var totalweeks = (months*4.34812141) + weeks * 1.0 + (days/7.0);
	
	if(pounds/totalweeks > 2){
		if(inputWarningP==undefined||contains(weightToLoseTimeToLoseWeightSubmitDiv,inputWarningP)==false){
			try{
				inputWarningP = document.createElement("<P style='position:absolute;bottom:15'>");
			}
			catch(e){
				inputWarningP = document.createElement("P");
				inputWarningP.setAttribute("style","position:absolute;bottom:15");
			}
			weightToLoseTimeToLoseWeightSubmitDiv.appendChild(inputWarningP);
				var inputWarning= document.createTextNode("Please enter a sensible amount. It is recommended that you lose no more than 2lbs/0.907kg a week. If the dieter loses more than two pounds/0.907 kilograms per week, they could be losing muscle OR water weight rather than fat.");
				inputWarningP.appendChild(inputWarning);
		}
	}	
	
	else{
		suggestionsHttpRequestObject.open("GET", "suggestionsCalculation.php?kgtolose=" + kgToLose + "&lbstolose=" + lbsToLose + "&months=" + months + "&weeks=" + weeks + "&days=" + days  , true);
		suggestionsHttpRequestObject.send("8");
		suggestionsHttpRequestObject.onreadystatechange = onReadyStateChangeFunction;
	}
	 /*if(kgToLose="" && lbsToLose=""){
	 alert("Please enter weight to lose");
	 }
	 else if(months="" && weeks="" && days=""){
	 alert("Please enter time to lose weight");
	}	*/
}
function getPreferredWeightUnits(){

	return preferredWeightUnits;

}

function getPreferredTimeUnits(){

	return preferredTimeUnits;

}

function get5(){
	
	return "5";

}


function releaseButtonOnBody(){
    mouseIsHeldAfterPressingButton=false;
	mouseIsHeldAfterPressingLoginButton=false;
	buttonStillPressedForPrint=false;
    buttonStillPressedForYes=false;
    buttonStillPressedForNo=false;
    buttonStillPressedForSubmit=false;
	buttonStillPressedForSubmit3=false;
	yesButton2StillPressed=false;
	noButton2StillPressed=false;
	mouseIsHeldAfterPressingZoomInOutButton=false;
	mouseIsHeldAfterPressingUpdateSuggestionsButton=false;
	mouseIsHeldAfterPressingChangeTargetButton=false;
	mouseIsHeldAfterPressingNotNowButton=false;
}

function buildNewPageContainer(){
		newPageBeingBuilt++;
		pageArray[newPageBeingBuilt] = new Page();
		pageArray[newPageBeingBuilt].opacity=0;
		
		try{
			pageArray[newPageBeingBuilt].container=document.createElement('<div style="width:100%;position:absolute;top:170;background:white;opacity:0.0;filter:alpha(opacity=0)">');
		}
		catch(e){
			pageArray[newPageBeingBuilt].container=document.createElement("div");
			pageArray[newPageBeingBuilt].container.setAttribute("style","width:100%;position:absolute;top:170;background:white;-moz-opacity:0;opacity:0.0;filter:alpha(opacity=0)");
		}
}

	
function onReadyStateChangeFunction(){
    if(suggestionsHttpRequestObject.readyState==4){ //if response is received
       textFromPhp = suggestionsHttpRequestObject.responseText;
	   //alert(textFromPhp);
	   var arrayOfStringsCreatedFromSplittingTextFromPhp=textFromPhp.split(",");
	   var calorieToLoseFromExercisePerDay=arrayOfStringsCreatedFromSplittingTextFromPhp[0];
	   var caloriesToEatPerDay=arrayOfStringsCreatedFromSplittingTextFromPhp[1];
	   
	   var arrayOfExerciseTypes = new Array();
	   var arrayOfExerciseDurations = new Array();
	   
	   for(var i=2;i<arrayOfStringsCreatedFromSplittingTextFromPhp.length;i++){
				
			if(i%2==0){
				arrayOfExerciseTypes[(i-2)/2] = arrayOfStringsCreatedFromSplittingTextFromPhp[i];
			}
			else if(i%2==1){
				arrayOfExerciseDurations[(i-3)/2] = Math.round(arrayOfStringsCreatedFromSplittingTextFromPhp[i]);
			}
	   }
	   
	   //var exerciseType=arrayOfStringsCreatedFromSplittingTextFromPhp[2];
	   //var durationOfExercise=arrayOfStringsCreatedFromSplittingTextFromPhp[3];
	   
	   suggestionString="For an equal balance of diet and exercise based weight-loss, try to eat around " + Math.round(caloriesToEatPerDay) + " calories in a day and do any of the following activities on each day each of which adds up to " + Math.round(calorieToLoseFromExercisePerDay) + " calories burnt:";
	   
	   //alert("suggestionString is: " + suggestionString);
	   
	   for(var i=0;i<arrayOfExerciseTypes.length-1;i++){
			
			arrayOfExerciseStrings[i] = arrayOfExerciseTypes[i] + " - " + arrayOfExerciseDurations[i] + " minutes ";
		
		}
		
		//alert("first exercise is: " +arrayOfExerciseStrings[0]);
		/*
		while(pageArray[2].container.firstChild){
			pageArray[2].container.removeChild(pageArray[2].container.firstChild);
		}
		*/
		
		buildNewPageContainer();

	
	try{
		var suggestionsList=document.createElement("<UL id='suggestionslist' type='disc'>");
	}
	catch(e){
		var suggestionsList=document.createElement('UL');
		suggestionsList.setAttribute("type","disc");
		suggestionsList.setAttribute("id","suggestionslist");
	}
	
	
	pageArray[newPageBeingBuilt].container.appendChild(suggestionsList);
	
		var suggestion1ListElement=document.createElement('LI');
		suggestionsList.appendChild(suggestion1ListElement);
			
			//alert("suggestionString is: " + suggestionString);
			
			beginningBitOfSuggestionsP = document.createElement("P");
			suggestion1ListElement.appendChild(beginningBitOfSuggestionsP);
			
				var suggestion1=document.createTextNode(suggestionString);
				beginningBitOfSuggestionsP.appendChild(suggestion1);
			
			var suggestion1ExerciseList = document.createElement('ul');
			suggestion1ExerciseList.setAttribute("type","disc");
			suggestion1ListElement.appendChild(suggestion1ExerciseList);
			
			var arrayOfSuggestion1ExerciseListElements = new Array();
			
			for (var i = 0; i<arrayOfExerciseStrings.length; i++){
				arrayOfSuggestion1ExerciseListElements[i] = document.createElement('li');
				suggestion1ExerciseList.appendChild(arrayOfSuggestion1ExerciseListElements[i]);
			}
			
			var arrayOfExerciseStringsTextNodes = new Array();
			
			for(var i=0; i<arrayOfExerciseStrings.length ; i++){
			
				arrayOfExerciseStringsTextNodes[i] = document.createTextNode(arrayOfExerciseStrings[i]);
				arrayOfSuggestion1ExerciseListElements[i].appendChild(arrayOfExerciseStringsTextNodes[i]);
			}
			
			suggestionsAreShowing = true;

		
		
		/*
		var suggestion2ListElement=document.createElement('LI');
		suggestionsList.appendChild(suggestion2ListElement);
			var suggestion2=document.createTextNode('jklkj');
			suggestion2ListElement.appendChild(suggestion2);*/
		
		/*var suggestion3ListElement=document.createElement('LI');
		suggestionsList.appendChild(suggestion3ListElement);
			var suggestion3=document.createTextNode('jklk');
			suggestion3ListElement.appendChild(suggestion3)

*/


	try{
		var printButtonDiv=document.createElement('<div id="pbd" style="height:70px; position:absolute; top:70; left:400">');
	}
	catch(e){
		var printButtonDiv=document.createElement('div');
		printButtonDiv.setAttribute("id","pbd");
		printButtonDiv.setAttribute("style","height:70px;position:absolute; top:70; left:400");
	}
	pageArray[newPageBeingBuilt].container.appendChild(printButtonDiv);
	
	//alert("reached here");
	
	try{
		var printButtonp=document.createElement('<P style="height:70px">');
	}
	catch(e){
		var printButtonp=document.createElement('P');
		printButtonp.setAttribute("style","height:70px");
	}
	printButtonDiv.appendChild(printButtonp);
		try{
			var printButton=document.createElement('<input type="image" id="printbutton" src="Print my suggestions.gif" onmouseover="onMouseOverPrintButton()" onmouseout="onMouseOutOfPrintButton()" onmousedown="onPrintButtonPressed()" onclick="onPrintButtonClicked()" />');
		}
		catch(e){
			var printButton=document.createElement("input");
			printButton.setAttribute("type","image");
			printButton.setAttribute("id","printbutton");
			printButton.setAttribute("src","Print my suggestions.gif");
			printButton.setAttribute("onmouseover","onMouseOverPrintButton()");
			printButton.setAttribute("onmouseout","onMouseOutOfPrintButton()");
			printButton.setAttribute("onmousedown","onPrintButtonPressed()");
			printButton.setAttribute("onclick","onPrintButtonClicked()");
		}
		printButtonp.appendChild(printButton);
	
	try{
		subPage2 = document.createElement('<div id="subpage2" style="width:100%;height:600px;position:absolute; top:150; left:400">');
	}
	catch(e){
		subPage2 = document.createElement('div');
		subPage2.setAttribute("id","subpage2");
		subPage2.setAttribute("style","width:100%;height:600px;position:absolute; top:150; left:400");
	}
	pageArray[newPageBeingBuilt].container.appendChild(subPage2);
	
	if(isLoggedIn==false){
		try{
			keepTrackYesNoSection=document.createElement('<div id="ktyns">');
		}
		catch(e){
			keepTrackYesNoSection=document.createElement('div');
			keepTrackYesNoSection.setAttribute("id","ktyns");
		}
		subPage2.appendChild(keepTrackYesNoSection);
		
		try{
			var keepTrackp=document.createElement('<P style="position:absolute;top:0;left:0;width:400px;height:50px">');
		}
		catch(e){
			var keepTrackp=document.createElement('P');
			keepTrackp.setAttribute("style","position:absolute;top:0;left:0;width:400px;height:50px");
		}
		keepTrackYesNoSection.appendChild(keepTrackp);
		
		var keepTrackText=document.createTextNode('Do you want to keep track of your progress and be able to access updated suggestions?');
		keepTrackp.appendChild(keepTrackText);

	var yesNop=document.createElement('P');
	keepTrackYesNoSection.appendChild(yesNop);
		try{
			var yesButton=document.createElement('<input style="position:absolute;top:50" type="image" id="yesbutton" src="yesup.png" onmouseover="onMouseOverYesButton()" onmouseout="onMouseOutOfYesButton()" onmousedown="onYesButtonPressed()" onclick="onYesButtonClicked()" />');
		}
		catch(e){
			var yesButton=document.createElement("input");
			yesButton.setAttribute("style","position:absolute;top:60");
			yesButton.setAttribute("type","image");
			yesButton.setAttribute("id","yesbutton");
			yesButton.setAttribute("src","yesup.png");
			yesButton.setAttribute("onmouseover","onMouseOverYesButton()");
			yesButton.setAttribute("onmouseout","onMouseOutOfYesButton()");
			yesButton.setAttribute("onmousedown","onYesButtonPressed()");
			yesButton.setAttribute("onclick","onYesButtonClicked()");
		}
		yesNop.appendChild(yesButton);
		try{
			var noButton=document.createElement('<input style="position:absolute;top:50;left:76" type="image" id="nobutton" src="noup.png" onmouseover="onMouseOverNoButton()" onmouseout="onMouseOutOfNoButton()" onmousedown="onNoButtonPressed()" onclick="onNoButtonClicked()" />');
		}
		catch(e){
			var noButton=document.createElement("input");
			noButton.setAttribute("style","position:absolute;top:60;left:76");
			noButton.setAttribute("type","image");
			noButton.setAttribute("id","nobutton");
			noButton.setAttribute("src","noup.png");
			noButton.setAttribute("onmouseover","onMouseOverNoButton()");
			noButton.setAttribute("onmouseout","onMouseOutOfNoButton()");
			noButton.setAttribute("onmousedown","onNoButtonPressed()");
			noButton.setAttribute("onclick","onNoButtonClicked()");
		}
		yesNop.appendChild(noButton);
	}
	else{
		
		//alert("we are here");
		
		showTheOtherStuff=false;
		
		try{
			confirmTargetSection=document.createElement("<div id='confirmtargetsection'>");
		}
		catch(e){
			confirmTargetSection=document.createElement("div");
			confirmTargetSection.setAttribute("id","confirmtargetsection");
		}
		subPage2.appendChild(confirmTargetSection);
		
			try{
				//var confirmTargetButton=document.createElement('<input style="position:absolute;top:150;left:400" type="image" src="Confirm target.gif" onclick="whenYouClickTheConfirmTargetButton()">');
				var confirmTargetButton=document.createElement('<input id="yes2" style="position:absolute;top:0;left:0" type="image" src="Confirm target.gif" onclick="whenYouClickTheYesButton2()">');
			}
			catch(e){
		
				var confirmTargetButton=document.createElement('input');
				confirmTargetButton.setAttribute('id','yes2');
				confirmTargetButton.setAttribute('style','position:absolute;top:0;left:0');
				confirmTargetButton.setAttribute('type','image');
				confirmTargetButton.setAttribute('src','Confirm target.gif');
				//confirmTargetButton.setAttribute('onclick','whenYouClickTheConfirmTargetButton()');
				confirmTargetButton.setAttribute('onclick','whenYouClickTheYesButton2()');
		
			}
			
			confirmTargetSection.appendChild(confirmTargetButton);
			//confirmTargetSection.appendChild(confirmTargetButton);
		
			try{
				changeTargetButton=document.createElement('<input style="position:absolute;top:0;left:200" id="changeTargetAgain" type="image" src="Change target again.gif" onmouseover="onMouseOverChangeTargetAgainButton()" onmouseout="onMouseOutOfChangeTargetAgainButton()" onmousedown="onButtonPressChangeTargetAgain()" onclick="whenYouClickTheChangeTargetButton1()">');
			
			}
			catch(e){
			
				changeTargetButton=document.createElement('input');
				changeTargetButton.setAttribute('id','changeTargetAgain');
				changeTargetButton.setAttribute('style','position:absolute;top:0;left:200');
				changeTargetButton.setAttribute('type','image');
				changeTargetButton.setAttribute('src','Change target again.gif');
				changeTargetButton.setAttribute('onmouseover','onMouseOverChangeTargetAgainButton()');
				changeTargetButton.setAttribute('onmouseout','onMouseOutOfChangeTargetAgainButton()');
				changeTargetButton.setAttribute('onmousedown','onButtonPressChangeTargetAgain()');
				changeTargetButton.setAttribute('onclick','whenYouClickTheChangeTargetButton1()');
			}
			confirmTargetSection.appendChild(changeTargetButton);
	
	}
	
	
		
		nextPageNumber = newPageBeingBuilt;
		fadeOutCurrentPageId = setInterval(fadeOutCurrentPage,20);
		
		
		//document.body.removeChild(pageArray[1].container);
		
		//document.body.appendChild(document.createTextNode("This is Page 2!!!!! Look!!!!"));	
	
	
	}
	
}
function whenYouClickTheConfirmTargetButton(){




}
function whenYouClickTheChangeTargetButton1(){

			buildNewPageContainer();
			
	        pageArray[newPageBeingBuilt].container.appendChild(weightToLoseTimeToLoseWeightSubmitDiv);
			nextPageNumber = newPageBeingBuilt;
			fadeOutCurrentPageId = setInterval(fadeOutCurrentPage,20);
			suggestionsAreShowing = false;
			
			kgTextBox.value="";
			lbsTextBox.value="";
			monthsTextBox.value="";
			weeksTextBox.value="";
			daysTextBox.value="";

}


function onMouseOverPrintButton(){

    if(buttonStillPressedForPrint==true){ //make yellow
        document.getElementById("printbutton").src="Print my suggestions_pr.gif";
    }
    else{ //make red
          document.getElementById("printbutton").src="Print my suggestions_mo.gif";

    }

}

function onMouseOutOfPrintButton(){
    document.getElementById("printbutton").src="Print my suggestions.gif";
}

function onPrintButtonPressed(){
    document.getElementById("printbutton").src="Print my suggestions_pr.gif";
    buttonStillPressedForPrint=true;
}

function onPrintButtonClicked(){

	if(document.getElementById("pbd")!=undefined){
		document.getElementById("pbd").setAttribute("class", "notprint");
	}
	if(document.getElementById("backtomyplanner")!=undefined){
		document.getElementById("backtomyplanner").setAttribute("class", "notprint");
	}
	if(document.getElementById("glms")!=undefined){
		document.getElementById("glms").setAttribute("class","notprint");
	}
	if(document.getElementById("subpage2")!=undefined){
		document.getElementById("subpage2").setAttribute("class", "notprint");
	}
	if(document.getElementById("loginorlogoutdiv")!=undefined){
		document.getElementById("loginorlogoutdiv").setAttribute("class", "notprint");
	}
	
	
	
	
	window.print();
	if(document.getElementById("pbd")!=undefined){
		document.getElementById("pbd").setAttribute("class", "anything");
	}
	if(document.getElementById("backtomyplanner")!=undefined){
		document.getElementById("backtomyplanner").setAttribute("class", "anything");
	}
	if(document.getElementById("glms")!=undefined){
		document.getElementById("glms").setAttribute("class","anything");
	}
	if(document.getElementById("subpage2")!=undefined){
		document.getElementById("subpage2").setAttribute("class", "anything");
	}
	if(document.getElementById("loginorlogoutdiv")!=undefined){
		document.getElementById("loginorlogoutdiv").setAttribute("class", "anything");
	}
}


function onMouseOverYesButton(){

    if(buttonStillPressedForYes==true){ //make yellow
        document.getElementById("yesbutton").src="yesdown.png";
    }
    else{ //make red
          document.getElementById("yesbutton").src="yesover.png";

    }


}

function onMouseOutOfYesButton(){
    document.getElementById("yesbutton").src="yesup.png";

}

function onYesButtonPressed(){
    document.getElementById("yesbutton").src="yesdown.png";
    buttonStillPressedForYes=true;

}

function onYesButtonClicked(){
		
		if(goodLuckMessageSection!=undefined&&contains(pageArray[currentPageNumber].container,goodLuckMessageSection)){
			pageArray[currentPageNumber].container.removeChild(goodLuckMessageSection);
		}
	
		fadeOutKTYNSId = setInterval(fadeOutKTYNS,20);
		
		
		
	

}

function fadeOutKTYNS(){
	
	ktynsOpacity-=opacityChangeSpeed;
	
	keepTrackYesNoSection.style.filter='alpha(opacity='+ktynsOpacity+')';
	keepTrackYesNoSection.style.MozOpacity=ktynsOpacity/100.0;
	keepTrackYesNoSection.style.opacity=ktynsOpacity/100.0;
	

	if(ktynsOpacity<=0){
		
		clearInterval(fadeOutKTYNSId);
		
		subPage2.removeChild(keepTrackYesNoSection);
	
		if(registerSectionCreated == false){
			try{
				registerSection = document.createElement("<div style='width:100%;height:500px; position:absolute; top:0; left:0; background:white;filter:alpha(opacity=0);opacity:0.0;-moz-opacity:0.0'>");
			}
			catch(e){
				registerSection = document.createElement("div"); 
				registerSection.setAttribute("style", "width:100%; height:500px; position:absolute; top:0; left:0; background:white;filter:alpha(opacity=0);opacity:0;-moz-opacity:0");
			}

	
				try{
					var penterusername=document.createElement("<p style='position:absolute;top:0;left:0'>");
				}
				catch(e){
					var penterusername=document.createElement("p");
					penterusername.setAttribute("style","position:absolute;top:0;left:0");
				}
				registerSection.appendChild(penterusername);

					var enterusername=document.createTextNode("Enter a username to come back on this site with");
					penterusername.appendChild(enterusername);
				
				try{
					inputusernametextbox =document.createElement("<INPUT style='position:absolute;top:0;left:370' onkeypress='testForEnterKeyPressInRegisterSection()' id='i1' class='blacktextbox' >");
				}
				catch(e){
					inputusernametextbox =document.createElement("INPUT");
					inputusernametextbox.setAttribute("style", "position:absolute;top:15;left:370");
					//inputusernametextbox.setAttribute("onkeypress", "testForEnterKeyPressInRegisterSection()");
					inputusernametextbox.onkeypress=testForEnterKeyPressInRegisterSection;
					inputusernametextbox.setAttribute("id", "il");
					inputusernametextbox.setAttribute("class", "blacktextbox");
				}
				registerSection.appendChild(inputusernametextbox);
				
				try{
					var penterpassword=document.createElement("<P style='position:absolute;top:30;left:220'>");
				}
				catch(e){
					var penterpassword=document.createElement("P");
					penterpassword.setAttribute("style","position:absolute;top:30;left:220");
				}
				registerSection.appendChild(penterpassword);

					var enterpassword=document.createTextNode("Enter a password");
					penterpassword.appendChild(enterpassword);
				
				try{
					inputpasswordtextbox=document.createElement("<INPUT onkeypress='testForEnterKeyPressInRegisterSection()' style='position:absolute;top:30;left:370' id='i2' style='WIDTH: 152px; HEIGHT: 22px' type=password class='blacktextbox' >");
				}
				catch(e){
					inputpasswordtextbox=document.createElement("INPUT");
					//inputpasswordtextbox.setAttribute("onkeypress","testForEnterKeyPressInRegisterSection()");
					inputpasswordtextbox.onkeypress=testForEnterKeyPressInRegisterSection;
					inputpasswordtextbox.setAttribute("style","position:absolute;top:45;left:370;WIDTH: 152px; HEIGHT: 22px");
					inputpasswordtextbox.setAttribute("id","i2");
					inputpasswordtextbox.setAttribute("type","password");
					inputpasswordtextbox.setAttribute("class","blacktextbox");
				}
				registerSection.appendChild(inputpasswordtextbox);
				
				try{
					var backButton1=document.createElement('<input style="position:absolute;top:100;left:200" type="image" id="backbutton1" src="back.gif" onclick="whenYouClickTheBackButton1()"/>');
				}
				catch(e){
					var backButton1=document.createElement("input");
					backButton1.setAttribute("style","position:absolute;top:100;left:200");
					backButton1.setAttribute("type","image");
					backButton1.setAttribute("id","backbutton1");
					backButton1.setAttribute("src","back.gif");
					backButton1.setAttribute("onclick","whenYouClickTheBackButton1()");
					
				}
				registerSection.appendChild(backButton1);
				
				
				try{
					inputsubmitbutton=document.createElement('<input style="position:absolute;top:70;left:340" type="image" id="submitbutton2" src="submitup.png" onmouseover="onMouseOverSubmitButton()" onmouseout="onMouseOutOfSubmitButton()" onmousedown="onSubmitButtonPressed()" onclick="whenYouClickTheSubmitButton2()"/>');
				}
				catch(e){
					inputsubmitbutton=document.createElement("input");
					inputsubmitbutton.setAttribute("style","position:absolute;top:70;left:340");
					inputsubmitbutton.setAttribute("type","image");
					inputsubmitbutton.setAttribute("id","submitbutton2");
					inputsubmitbutton.setAttribute("src","submitup.png");
					inputsubmitbutton.setAttribute("onmouseover","onMouseOverSubmitButton()");
					inputsubmitbutton.setAttribute("onmouseout","onMouseOutOfSubmitButton()");
					inputsubmitbutton.setAttribute("onmousedown","onSubmitButtonPressed()");
					inputsubmitbutton.setAttribute("onclick","whenYouClickTheSubmitButton2()");
					
				}
				registerSection.appendChild(inputsubmitbutton);
				
				
		
			registerSectionCreated=true;
		}

		subPage2.appendChild(registerSection);
			
 
    
		fadeInRegisterSectionId = setInterval(fadeInRegisterSection,20);
	
	}

}

function testForEnterKeyPressInRegisterSection(e){
	
	
	if(!e&&event.keyCode==13){ //i.e. if ENTER is pressed
		event.keyCode=9;    //tricks the browser into thinking a different key has just been pressed, in this case TAB, so that the browser does not perform its own pre-set action of clicking a button it wants to on the page
		inputsubmitbutton.click();
	}
	else if(e&&e.which==13){
		//e.which=9;
		inputsubmitbutton.click();
	}

}

function testForEnterKeyPressInCurrentWeightPage5(e){

	if(!e&&event.keyCode==13){ //i.e. if ENTER is pressed
		event.keyCode=9;    //tricks the browser into thinking a different key has just been pressed, in this case TAB, so that the browser does not perform its own pre-set action of clicking a button it wants to on the page
		submitButtonImg5.click();
	}
	else if(e&&e.which==13){
		//e.which=9;
		submitButtonImg5.click();
	}
	
}

function testForEnterKeyPressInCongratulationsCurrentWeight(e){

	if(!e&&event.keyCode==13){ //i.e. if ENTER is pressed
		event.keyCode=9;    //tricks the browser into thinking a different key has just been pressed, in this case TAB, so that the browser does not perform its own pre-set action of clicking a button it wants to on the page
		submitButtonImg2.click();
	}
	else if(e&&e.which==13){
		//e.which=9;
		submitButtonImg2.click();
	}
	
}

function whenYouClickTheBackButton1(){

	fadeOutRegisterSectionToGoBackId = setInterval(fadeOutRegisterSectionToGoBack,20);

}

function fadeOutRegisterSectionToGoBack(){
	
	registerSectionOpacity-=opacityChangeSpeed;
	
	registerSection.style.filter='alpha(opacity='+registerSectionOpacity+')';
	registerSection.style.MozOpacity=registerSectionOpacity/100.0;
	registerSection.style.opacity=registerSectionOpacity/100.0;
	
	if(registerSectionOpacity<=0){
		
		clearInterval(fadeOutRegisterSectionToGoBackId);
		
		subPage2.removeChild(registerSection);
		subPage2.appendChild(keepTrackYesNoSection);
		fadeInKTYNSId = setInterval(fadeInKTYNS,20);
	}
}

function fadeInKTYNS(){
	
	ktynsOpacity+=opacityChangeSpeed;
	
	keepTrackYesNoSection.style.filter='alpha(opacity='+ktynsOpacity+')';
	keepTrackYesNoSection.style.MozOpacity=ktynsOpacity/100.0;
	keepTrackYesNoSection.style.opacity=ktynsOpacity/100.0;
	

	if(ktynsOpacity>=100.0){
		clearInterval(fadeInKTYNSId);
	}
	
}


function onMouseOverNoButton(){

    if(buttonStillPressedForNo==true){ //make yellow
        document.getElementById("nobutton").src="nodown.png";
    }
    else{ //make red
          document.getElementById("nobutton").src="noover.png";

    }


}

function onMouseOutOfNoButton(){
    document.getElementById("nobutton").src="noup.png";

}

function onNoButtonPressed(){
    document.getElementById("nobutton").src="nodown.png";
    buttonStillPressedForNo=true;

}
function onNoButtonClicked(){
	try{
		goodLuckMessageSection=document.createElement("<div id='glms' style='width:80%; position:absolute; top:300; left:390'>");
	}
	catch(e){
		goodLuckMessageSection=document.createElement("div");
		goodLuckMessageSection.setAttribute("id","glms");
		goodLuckMessageSection.setAttribute("style","width:80%; position:absolute; top:300; left:390");
	}
	var pGoodLuckParagraph=document.createElement("p");
	var goodLuckMessage=document.createTextNode("Good Luck! Feel free to print your suggestions.");
	try{
		var goBackAndTryAnotherTarget = document.createElement("<input type='image' src='Go back and try another target.gif' onclick='whenYouClickGoBackAndTryAnotherTarget()' >");
	}
	catch(e){
		var goBackAndTryAnotherTarget = document.createElement("input");
		goBackAndTryAnotherTarget.setAttribute("type","image");
		goBackAndTryAnotherTarget.setAttribute("src","Go back and try another target.gif");
		goBackAndTryAnotherTarget.setAttribute("onclick","whenYouClickGoBackAndTryAnotherTarget()");
	}
	
	pageArray[newPageBeingBuilt].container.appendChild(goodLuckMessageSection);
	pGoodLuckParagraph.appendChild(goodLuckMessage);
	goodLuckMessageSection.appendChild(pGoodLuckParagraph);
	goodLuckMessageSection.appendChild(goBackAndTryAnotherTarget);
}

function whenYouClickGoBackAndTryAnotherTarget(){

	window.location.reload();
}

function onMouseOverSubmitButton(){

    if(buttonStillPressedForSubmit==true){ //make yellow
        document.getElementById("submitbutton2").src="submitdown.png";
    }
    else{ //make red
          document.getElementById("submitbutton2").src="submitover.png";

    }


}

function onMouseOutOfSubmitButton(){
    document.getElementById("submitbutton2").src="submitup.png";

}

function onSubmitButtonPressed(){
    document.getElementById("submitbutton2").src="submitdown.png";
    buttonStillPressedForSubmit=true;

}


function fadeInRegisterSection(){
    registerSectionOpacity+=opacityChangeSpeed;
	registerSection.style.filter='alpha(opacity='+registerSectionOpacity+')';
	registerSection.style.MozOpacity=registerSectionOpacity/100.0;
	registerSection.style.opacity=registerSectionOpacity/100.0;
	
	if(registerSectionOpacity>=100){
		clearInterval(fadeInRegisterSectionId)
	}
}

function whenYouClickTheSubmitButton2(){
	if(submitButton2HasBeenSuccessfullyClicked==false){
		
		if(inputusernametextbox.value==""||inputpasswordtextbox.value==""){
			alert("A username and a password are both required please...");
		}
		else{
			username=inputusernametextbox.value;
			password=inputpasswordtextbox.value;
			sendUsernameAndPasswordHttpRequestObject.open("GET", "storeUsernameAndPasswordProgram.php?username=" + username + "&password=" + password , true);
			sendUsernameAndPasswordHttpRequestObject.send("9");
			sendUsernameAndPasswordHttpRequestObject.onreadystatechange = onReadyStateChangeFunctionForStoreProgram;
		}
		
	}
}



function onReadyStateChangeFunctionForStoreProgram(){
	if(sendUsernameAndPasswordHttpRequestObject.readyState==4){ //if response is received
		textFromStoreProgram = sendUsernameAndPasswordHttpRequestObject.responseText;
		
		if(textFromStoreProgram=="ok"){
			submitButton2HasBeenSuccessfullyClicked=true;
			isLoggedIn = true;
			
			fadeOutRegisterSectionId = setInterval(fadeOutRegisterSection,20);
			
			createCookie("username",username,365);
			createCookie("password",password,365);
		}
		else if(textFromStoreProgram=="notok"){
								
			alert("Please try a different username and password");
								
		}
		else{
			alert(textFromStoreProgram);	
		}
	}
}

function fadeOutRegisterSection(){
	
	registerSectionOpacity-=opacityChangeSpeed;
	
	registerSection.style.filter='alpha(opacity='+registerSectionOpacity+')';
	registerSection.style.MozOpacity=registerSectionOpacity/100.0;
	registerSection.style.opacity=registerSectionOpacity/100.0;
	
	if(registerSectionOpacity<=0){
		
		clearInterval(fadeOutRegisterSectionId)
		
		//count++;
		
		//alert("count is " + count);
		try{
			congratulationsAndCurrentWeightDiv=document.createElement("<div style='width:100%;height:400px;background:white;position:absolute;left:0;top:0;filter:alpha(opacity=0);opacity:0;-moz-opacity:0'>");
		}
		catch(e){
			congratulationsAndCurrentWeightDiv=document.createElement("div"); 
			congratulationsAndCurrentWeightDiv.setAttribute("style", "width:100%;height:400px;background:white;position:absolute;left:0;top:0;filter:alpha(opacity=0);opacity:0;-moz-opacity:0");
		}
		subPage2.appendChild(congratulationsAndCurrentWeightDiv);
				
				try{
					var congratulationsDiv=document.createElement("<div>");
				}
				catch(e){
					var congratulationsDiv=document.createElement("div");
				}
				congratulationsAndCurrentWeightDiv.appendChild(congratulationsDiv);
				
					var congratulationsParagraph=document.createElement("p");
					congratulationsDiv.appendChild(congratulationsParagraph);
				
						var congratulationsText=document.createTextNode("Congratulations "+username+", you're now a member!");
						congratulationsParagraph.appendChild(congratulationsText);
				
				try{
					var enterCurrentWeightDiv=document.createElement("<div style='clear:left'>");
				}
				catch(e){
					var enterCurrentWeightDiv=document.createElement("div");
					enterCurrentWeightDiv.setAttribute("style", "clear:left");
				}
				congratulationsAndCurrentWeightDiv.appendChild(enterCurrentWeightDiv);
					
					try{
						var enterCurrentWeightParagraph=document.createElement("<p style='margin-top:10'>");
					}
					catch(e){
						var enterCurrentWeightParagraph=document.createElement("p");
						enterCurrentWeightParagraph.setAttribute=("style", "margin-top:10");	
					}
					congratulationsAndCurrentWeightDiv.appendChild(enterCurrentWeightParagraph);
								
								var enterCurrentWeightText=document.createTextNode("Enter your current weight:");
								enterCurrentWeightParagraph.appendChild(enterCurrentWeightText);
				
								var blankTextNode=document.createTextNode("  ");
								enterCurrentWeightParagraph.appendChild(blankTextNode);
				
								try{
									var kgTextBox=document.createElement("<INPUT id='kg' onkeypress='testForEnterKeyPressInCongratulationsCurrentWeight()' onkeyup='onKeyUpOnCurrentWeightKgTextBox()' style='WIDTH: 50px; HEIGHT: 22px' class='blacktextbox' >");
								}
								catch(e){
									var kgTextBox=document.createElement("INPUT");
									kgTextBox.setAttribute("id","kg");
									kgTextBox.onkeypress=testForEnterKeyPressInCongratulationsCurrentWeight;
									//kgTextBox.setAttribute("onkeyup","onKeyUpOnCurrentWeightKgTextBox()");
									kgTextBox.onkeyup=onKeyUpOnCurrentWeightKgTextBox;
									kgTextBox.setAttribute("style","WIDTH: 50px; HEIGHT: 22px");
									kgTextBox.setAttribute("class","blacktextbox");
								}
								enterCurrentWeightParagraph.appendChild(kgTextBox);
					
								var kgTextNode=document.createTextNode("kg  OR");
								enterCurrentWeightParagraph.appendChild(kgTextNode);
								
								try{
									var stTextBox=document.createElement("<INPUT id='st' onkeypress='testForEnterKeyPressInCongratulationsCurrentWeight()' onkeyup='onKeyUpOnCurrentWeightStTextBox()' style='WIDTH: 50px; HEIGHT: 22px' class='blacktextbox' >");
								}
								catch(e){
									var stTextBox=document.createElement("INPUT");
									stTextBox.setAttribute("id","st");
									stTextBox.onkeypress=testForEnterKeyPressInCongratulationsCurrentWeight;
									//stTextBox.setAttribute("onkeyup","onKeyUpOnCurrentWeightStTextBox()");
									stTextBox.onkeyup=onKeyUpOnCurrentWeightStTextBox;
									stTextBox.setAttribute("style","WIDTH: 50px; HEIGHT: 22px");
									stTextBox.setAttribute("class","blacktextbox");
								}
								enterCurrentWeightParagraph.appendChild(stTextBox);
								
								var stTextNode=document.createTextNode("St  ");
								enterCurrentWeightParagraph.appendChild(stTextNode);
								
								try{
									var lbsTextBox=document.createElement("<INPUT id='lbs' onkeypress='testForEnterKeyPressInCongratulationsCurrentWeight()' onkeyup='onKeyUpOnCurrentWeightLbsTextBox()' style='WIDTH: 50px; HEIGHT: 22px' class='blacktextbox' >");
								}
								catch(e){
									var lbsTextBox=document.createElement("INPUT");
									lbsTextBox.setAttribute("id","lbs");
									lbsTextBox.onkeypress=testForEnterKeyPressInCongratulationsCurrentWeight;
									//lbsTextBox.setAttribute("onkeyup","onKeyUpOnCurrentWeightLbsTextBox()");
									lbsTextBox.onkeyup=onKeyUpOnCurrentWeightLbsTextBox;
									lbsTextBox.setAttribute("style","WIDTH: 50px; HEIGHT: 22px");
									lbsTextBox.setAttribute("class","blacktextbox");
									
								}
								enterCurrentWeightParagraph.appendChild(lbsTextBox);
								
								var lbsTextNode=document.createTextNode("lbs");
								enterCurrentWeightParagraph.appendChild(lbsTextNode);
								
							try{
								submitButtonImg2=document.createElement('<input type="image" style="position:absolute;top:90;left:60" id="submitbutton3"  src="button1.png" onmouseover="onMouseOverButton3()" onmouseout="onMouseOutOfButton3()" onmousedown="onButtonPress3()" onclick="whenYouClickTheDisabledSubmitButton3()">');
							}
							catch(e){
								submitButtonImg2=document.createElement("input");
								submitButtonImg2.setAttribute("type","image");
								submitButtonImg2.setAttribute("style","position:absolute;top:105;left:60");
								submitButtonImg2.setAttribute("id","submitbutton3");
								submitButtonImg2.setAttribute("src","button1.png");
								submitButtonImg2.setAttribute("onmouseover","onMouseOverButton3()");
								submitButtonImg2.setAttribute("onmouseout","onMouseOutOfButton3()");
								submitButtonImg2.setAttribute("onmousedown","onButtonPress3()");
								submitButtonImg2.setAttribute("onclick","whenYouClickTheSubmitButton3()");
							}
							congratulationsAndCurrentWeightDiv.appendChild(submitButtonImg2);
								
								
								
								
								
					
					
			
			congratulationsAndCurrentWeightFadeInId = setInterval(congratulationsAndCurrentWeightFadeIn, 20);
	}
}

function congratulationsAndCurrentWeightFadeIn(){


		congratulationsAndCurrentWeightDivOpacity+=opacityChangeSpeed;
		congratulationsAndCurrentWeightDiv.style.filter='alpha(opacity='+congratulationsAndCurrentWeightDivOpacity+')';
		congratulationsAndCurrentWeightDiv.style.MozOpacity=congratulationsAndCurrentWeightDivOpacity/100.0;
		congratulationsAndCurrentWeightDiv.style.opacity=congratulationsAndCurrentWeightDivOpacity/100.0;
		
		if(congratulationsAndCurrentWeightDivOpacity>=100.0){
			clearInterval(congratulationsAndCurrentWeightFadeInId);
		}
		
}
function onMouseOverButton3(){

    if(buttonStillPressedForSubmit3==true){ 
        document.getElementById("submitbutton3").src="button3.png";
    }
    else{ 
          document.getElementById("submitbutton3").src="button2.png";

    }


}
function onMouseOutOfButton3(){
    document.getElementById("submitbutton3").src="button1.png";
	return false;
}

function onButtonPress3(){
    document.getElementById("submitbutton3").src="button3.png";
    buttonStillPressedForSubmit3=true;

}

function whenYouClickTheSubmitButton3(){

	kgCurrent=document.getElementById("kg").value;
	stCurrent=document.getElementById("st").value;
	lbsCurrent=document.getElementById("lbs").value;
	
	if(kgCurrent!=""){
		preferredWeightUnits = "kg";
	}
	else if(stCurrent!=""){
		preferredWeightUnits = "St";
	}
	else if(lbsCurrent!=""){
		preferredWeightUnits = "lbs";
	}

	
	currentDate=new Date();
	var date=formatDateForMySQL(currentDate);
	//document.body.appendChild(document.createTextNode(myDateString));
	sendDateAndCurrentWeightHttpRequestObject.open("GET", "storeDateWeightProgram.php?kgCurrent=" + kgCurrent + "&stCurrent=" + stCurrent + "&lbsCurrent=" + lbsCurrent + "&username=" + username + "&password=" + password + "&date=" + date + "&preferredweightunits=" +preferredWeightUnits+ "&first=true", true);
    sendDateAndCurrentWeightHttpRequestObject.send("9");
	sendDateAndCurrentWeightHttpRequestObject.onreadystatechange = onReadyStateChangeFunctionForStoreProgramDateNewUser;
}

function formatDateForMySQL(date1) {
  return date1.getFullYear() + '-' +
    (date1.getMonth() < 9 ? '0' : '') + (date1.getMonth()+1) + '-' +
    (date1.getDate() < 10 ? '0' : '') + date1.getDate();
}




/*function onReadyStateChangeFunctionForStoreProgram2(){
	if(sendCurrentWeightHttpRequestObject.readyState==4){ //if response is received
		var textFromStoreProgram2 = sendCurrentWeightHttpRequestObject.responseText;
		
		//alert(textFromStoreProgram2);
		if(textFromStoreProgram2=="okok"){
		
			id3 = setInterval(page2FadeOut,20);
		}
		else{
		
			alert(textFromStoreProgram2);
		
		}
	
	}
}
*/



function whenYouClickNotNow(){

	theyveEnteredTheirCurrentWeight=false;
	
	showTheOtherStuff=true;
	
	if(flashGraph!=undefined&&contains(pageArray[nextPageNumber].container,flashGraph)&&flashParagraph!=undefined&&contains(pageArray[nextPageNumber].container,flashParagraph)){
			//alert("yes, flashGraph and flashDiv is contained in the next page");
			flashParagraph.removeChild(flashGraph);
		
			flashGraph=null;
			
			pageArray[nextPageNumber].container.removeChild(flashParagraph);
			
			flashParagraph=null;
	}
	else if(flashGraph!=undefined&&contains(pageArray[nextPageNumber].container,flashGraph)){
		
			pageArray[nextPageNumber].container.removeChild(flashGraph);
			
			flashGraph=null;
	}
	
	if(document.getElementById("zoominout")!=undefined&&contains(pageArray[nextPageNumber].container,document.getElementById("zoominout"))){
		pageArray[nextPageNumber].container.removeChild(document.getElementById("zoominout"));
	}
	
	try{
		flashParagraph=document.createElement("<P dummyattr='something'>");
	}
	catch(e){
		flashParagraph=document.createElement("P");
		flashParagraph.setAttribute("style","position:absolute;top:125;height:380px");
	}
	pageArray[newPageBeingBuilt].container.appendChild(flashParagraph);

		try{
			flashGraph=document.createElement('<object id="flashgraph" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="450" height="350">');
			//alert("flash graph created");
		}
		catch(e){
			flashGraph=document.createElement('object');
			flashGraph.setAttribute("classid","clsid:D27CDB6E-AE6D-11cf-96B8-444553540000");
			flashGraph.setAttribute("width","450");
			flashGraph.setAttribute("height","350");
			flashGraph.setAttribute("id","flashgraph");
		}
		flashParagraph.appendChild(flashGraph);
			
			if(navigator.appName=="Microsoft Internet Explorer"){
				//alert(password);
				
				var flashParam=document.createElement('<param name="movie" value="WeightProgressGraph.swf" />');		
				flashGraph.appendChild(flashParam);
				var flashParam2=document.createElement('<param name="allowScriptAccess" value="always" >');
				flashGraph.appendChild(flashParam2);
			}
			else{
				try{  //still try the tag method this once even though it's not Internet Explorer, in case there are other browser that only accept the tag method for certain attributes
					var flashEmbed=document.createElement('<embed src="WeightProgressGraph.swf" quality="high" width="450" height="350" name="WeightProgressGraph" allowScriptAccess="always" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer">');
				}
				catch(e){
					var flashEmbed=document.createElement('embed');
					flashEmbed.setAttribute("src","WeightProgressGraph.swf");
					flashEmbed.setAttribute("quality","high");
					flashEmbed.setAttribute("width","450");
					flashEmbed.setAttribute("height","350");
					flashEmbed.setAttribute("name","WeightProgressGraph");
					flashEmbed.setAttribute("type","application/x-shockwave-flash");
					flashEmbed.setAttribute("pluginspage","http://www.macromedia.com/go/getflashplayer");
					flashEmbed.setAttribute("allowScriptAccess","always");
				}
				
				flashGraph.appendChild(flashEmbed);
			}
		
	notNowImg.onclick = null;
}


function returnTheyveEnteredTheirCurrentWeight(){

	return theyveEnteredTheirCurrentWeight;
}


function onReadyStateChangeFunctionForStoreProgramDateExistingUser(){
	
		
		if(sendDateAndCurrentWeightHttpRequestObject2.readyState==4){ //i.e. response is received
			var textFromStoreProgramDate = sendDateAndCurrentWeightHttpRequestObject2.responseText;
				
				if(flashGraph!=undefined&&contains(pageArray[nextPageNumber].container,flashGraph)&&flashParagraph!=undefined&&contains(pageArray[nextPageNumber].container,flashParagraph)){
					//alert("yes, flashGraph and flashDiv is contained in the next page");
					flashParagraph.removeChild(flashGraph);
				
					flashGraph=null;
					
					pageArray[nextPageNumber].container.removeChild(flashParagraph);
			
					flashParagraph=null;
					
				}
				else if(flashGraph!=undefined&&contains(pageArray[nextPageNumber].container,flashGraph)){
					
					pageArray[nextPageNumber].container.removeChild(flashGraph);
					
					flashGraph=null;
				}
				
				if(document.getElementById("zoominout")!=undefined&&contains(pageArray[nextPageNumber].container,document.getElementById("zoominout"))){
					pageArray[nextPageNumber].container.removeChild(document.getElementById("zoominout"));
				}
				
				if(textFromStoreProgramDate=="ok"){
					try{
						flashParagraph=document.createElement("<P dummyatr='something'>");
					}
					catch(e){
						flashParagraph=document.createElement("P");
						flashParagraph.setAttribute("style","position:absolute;top:200");
					}
					pageArray[newPageBeingBuilt].container.appendChild(flashParagraph);
					
						try{
							flashGraph=document.createElement('<object id="flashgraph" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="450" height="350">');
							//alert("flash graph created");
						}
						catch(e){
							flashGraph=document.createElement('object');
							flashGraph.setAttribute("classid","clsid:D27CDB6E-AE6D-11cf-96B8-444553540000");
							flashGraph.setAttribute("width","450");
							flashGraph.setAttribute("height","350");
							flashGraph.setAttribute("id","flashgraph");
						}
						flashParagraph.appendChild(flashGraph);
							
							if(navigator.appName=="Microsoft Internet Explorer"){
								//alert(password);
								
								var flashParam=document.createElement('<param name="movie" value="WeightProgressGraph.swf" />');		
								flashGraph.appendChild(flashParam);
								var flashParam2=document.createElement('<param name="allowScriptAccess" value="always" >');
								flashGraph.appendChild(flashParam2);
							}
							else{
								try{  //still try the tag method this once even though it's not Internet Explorer, in case there are other browser that only accept the tag method for certain attributes
									var flashEmbed=document.createElement('<embed src="WeightProgressGraph.swf" quality="high" width="450" height="400" name="WeightProgressGraph" allowScriptAccess="always" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer">');
								}
								catch(e){
									var flashEmbed=document.createElement('embed');
									flashEmbed.setAttribute("src","WeightProgressGraph.swf");
									flashEmbed.setAttribute("quality","high");
									flashEmbed.setAttribute("width","450");
									flashEmbed.setAttribute("height","350");
									flashEmbed.setAttribute("name","WeightProgressGraph");
									flashEmbed.setAttribute("type","application/x-shockwave-flash");
									flashEmbed.setAttribute("pluginspage","http://www.macromedia.com/go/getflashplayer");
									flashEmbed.setAttribute("allowScriptAccess","always");
								}
								
								flashGraph.appendChild(flashEmbed);
							}
						
						submitButtonImg5.onclick = null;
				}
				else if(textFromStoreProgramDate=="todayalreadydone"){
					
					if(youveAlreadyEnteredWeightTodayDivIsShowing==false){
						
						try{
							youveAlreadyEnteredWeightTodayDiv=document.createElement("<div dummyattr='thingy'>");
						}
						catch(e){
							youveAlreadyEnteredWeightTodayDiv=document.createElement("div");
							youveAlreadyEnteredWeightTodayDiv.setAttribute("style","position:relative;top:180;left:0;filter:alpha(opacity=100);opacity:1.0;-moz-opacity:1.0");
						}
						pageArray[newPageBeingBuilt].container.appendChild(youveAlreadyEnteredWeightTodayDiv);
							
							youveAlreadyEnteredWeightTodayP=document.createElement("p");
							youveAlreadyEnteredWeightTodayDiv.appendChild(youveAlreadyEnteredWeightTodayP);
							
								youveAlreadyEnteredWeightTodayTextNode = document.createTextNode("You've already entered your weight today, would you like to replace it or leave it as it is?");
								youveAlreadyEnteredWeightTodayP.appendChild(youveAlreadyEnteredWeightTodayTextNode);
							
							try{
								replaceItButton = document.createElement("<input type='image' src='Replace it.gif' onclick='replaceWeightButtonClicked()' >");
								
							}
							catch(e){
								replaceItButton = document.createElement("input");
								replaceItButton.setAttribute("type","image");
								replaceItButton.setAttribute("src","Replace it.gif");
								replaceItButton.setAttribute("onclick","replaceWeightButtonClicked()");
							}
							youveAlreadyEnteredWeightTodayDiv.appendChild(replaceItButton);
							
							try{
								leaveItButton = document.createElement("<input type='image' src='Leave it.gif' onclick='leaveWeightButtonClicked()' >");
								
							}
							catch(e){
								leaveItButton = document.createElement("input");
								leaveItButton.setAttribute("type","image");
								leaveItButton.setAttribute("src","Leave it.gif");
								leaveItButton.setAttribute("onclick","leaveWeightButtonClicked()");
							}
							
							youveAlreadyEnteredWeightTodayDiv.appendChild(leaveItButton);
							
							youveAlreadyEnteredWeightTodayDivIsShowing=true;
						}
				}
			
				
		}

}

function replaceWeightButtonClicked(){
	
	currentDate=new Date();
	var date=formatDateForMySQL(currentDate);
	
	replaceWeightXMLHttpRequestObject.open("GET", "replaceTodaysWeight.php?kgCurrent=" + kgCurrent + "&stCurrent=" + stCurrent + "&lbsCurrent=" + lbsCurrent + "&username=" + username + "&password=" + password + "&date=" + date + "&preferredweightunits=" +preferredWeightUnits)
	replaceWeightXMLHttpRequestObject.send("4")
	replaceWeightXMLHttpRequestObject.onreadystatechange = onreadyStateChangeForReplaceWeightXMLHttpRequestObject;

}
		
function leaveWeightButtonClicked(){
	
		removeYouveAlreadyEnteredWeightTodayDivAndShowFlashGraph();
}

function onreadyStateChangeForReplaceWeightXMLHttpRequestObject(){
	
	if(replaceWeightXMLHttpRequestObject.readyState==4){
	
		if(replaceWeightXMLHttpRequestObject.responseText == "ok"){
			removeYouveAlreadyEnteredWeightTodayDivAndShowFlashGraph();
		}
		else{
			alert("response from php:" + replaceWeightXMLHttpRequestObject.responseText);
		}
	}

}

function removeYouveAlreadyEnteredWeightTodayDivAndShowFlashGraph(){

	pageArray[newPageBeingBuilt].container.removeChild(youveAlreadyEnteredWeightTodayDiv);
	youveAlreadyEnteredWeightTodayDivIsShowing=false;
	
	try{
		flashParagraph=document.createElement("<P dummyattr='something'>");
	}
	catch(e){
		flashParagraph=document.createElement("P");
		flashParagraph.setAttribute("style","position:absolute;top:125");
	}
	pageArray[newPageBeingBuilt].container.appendChild(flashParagraph);
	
		try{
			flashGraph=document.createElement('<object id="flashgraph" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="450" height="350">');
			//alert("flash graph created");
		}
		catch(e){
			flashGraph=document.createElement('object');
			flashGraph.setAttribute("classid","clsid:D27CDB6E-AE6D-11cf-96B8-444553540000");
			flashGraph.setAttribute("width","450");
			flashGraph.setAttribute("height","350");
			flashGraph.setAttribute("id","flashgraph");
		}
		flashParagraph.appendChild(flashGraph);
		
		if(navigator.appName=="Microsoft Internet Explorer"){
			//alert(password);
			
			var flashParam=document.createElement('<param name="movie" value="WeightProgressGraph.swf" />');		
			flashGraph.appendChild(flashParam);
			var flashParam2=document.createElement('<param name="allowScriptAccess" value="always" >');
			flashGraph.appendChild(flashParam2);
		}
		else{
			try{  //still try the tag method this once even though it's not Internet Explorer, in case there are other browser that only accept the tag method for certain attributes
				var flashEmbed=document.createElement('<embed src="WeightProgressGraph.swf" quality="high" width="550" height="400" name="WeightProgressGraph" allowScriptAccess="always" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer">');
			}
			catch(e){
				var flashEmbed=document.createElement('embed');
				flashEmbed.setAttribute("src","WeightProgressGraph.swf");
				flashEmbed.setAttribute("quality","high");
				flashEmbed.setAttribute("width","450");
				flashEmbed.setAttribute("height","350");
				flashEmbed.setAttribute("name","WeightProgressGraph");
				flashEmbed.setAttribute("type","application/x-shockwave-flash");
				flashEmbed.setAttribute("pluginspage","http://www.macromedia.com/go/getflashplayer");
				flashEmbed.setAttribute("allowScriptAccess","always");
			}
			
			flashGraph.appendChild(flashEmbed);
		}
		
		submitButtonImg5.onclick = null;
	
}

function onReadyStateChangeFunctionForStoreProgramDateNewUser(){
	
	if(sendDateAndCurrentWeightHttpRequestObject.readyState==4){
	
		var textFromStoreProgramDate = sendDateAndCurrentWeightHttpRequestObject.responseText;
		
		if(textFromStoreProgramDate=="ok"){
			//alert("well done!");
			
			/*
			while(pageArray[3].container.firstChild){
				pageArray[3].container.removeChild(pageArray[3].container.firstChild);
			}
			*/
			
			fadeOutCongratulationsAndCurrentWeightDivId = setInterval(fadeOutCongratulationsAndCurrentWeightDiv,20);
			suggestionsAreShowing = true;
		}
		else{
			alert(textFromStoreProgramDate);
		}
			
	}
}

function fadeOutCongratulationsAndCurrentWeightDiv(){

	congratulationsAndCurrentWeightDivOpacity-=opacityChangeSpeed;
	
	congratulationsAndCurrentWeightDiv.style.filter='alpha(opacity='+congratulationsAndCurrentWeightDivOpacity+')';
	congratulationsAndCurrentWeightDiv.style.MozOpacity=congratulationsAndCurrentWeightDivOpacity/100.0;
	congratulationsAndCurrentWeightDiv.style.opacity=congratulationsAndCurrentWeightDivOpacity/100.0;

	if(congratulationsAndCurrentWeightDivOpacity<=0){
		clearInterval(fadeOutCongratulationsAndCurrentWeightDivId);
		
		//count++;
		//alert("count is" + count );
		try{
			confirmTargetSection = document.createElement("<div id='confirmtargetsection' style='position:absolute;top:0;left:0;width:100%;height:500px;background:white;filter:alpha(opacity=0);opacity:0.0;-moz-opacity:0.0' >");
		}
		catch(e){
			confirmTargetSection = document.createElement("div");
			confirmTargetSection.setAttribute("id","confirmtargetsection");
			confirmTargetSection.setAttribute("style","position:absolute;top:0;left:0;width:100%;height:500px;background:white;filter:alpha(opacity=0);opacity:0.0;-moz-opacity:0.0");
		}
		subPage2.appendChild(confirmTargetSection);
		
			try{
				var soYouWantParagraph = document.createElement("<p style='position:absolute;top:0;left:0'>");
			}
			catch(e){
				var soYouWantParagraph = document.createElement("p");
				soYouWantParagraph.setAttribute("style","position:absolute;top:0;left:0");
			}
			confirmTargetSection.appendChild(soYouWantParagraph);
				
				//var soYouWantText = document.createTextNode("So, you want to lose");
				//soYouWantParagraph.appendChild(soYouWantText);
				mystring = "So, you want to lose ";
				if(kgToLose!=""){
					mystring += kgToLose + "kg in ";
				}
				
				if(lbsToLose!=""&& lbsToLose==1){
					mystring += lbsToLose + " pound in ";
				}
				else if(lbsToLose!=""&& lbsToLose!=1){
					mystring += lbsToLose + " pounds in ";
				}
				
				if(months!=""&& months==1){
					mystring += months + " month";
				}
				else if(months!=""&& months!=1){
					mystring += months + " months";
				}
				
				if(weeks!=""&& weeks==1){
					mystring += weeks + " week";
				}
				else if(weeks!=""&& weeks!=1){
					mystring += weeks + " weeks";
				}
				
				if(days!=""&& days==1){
					mystring += days + " day";
				}
				else if(days!=""&& days!=1){
					mystring += days + " days";
				}
				mystring+= ", is this true?"
				
				var soYouWantText = document.createTextNode(mystring);
				soYouWantParagraph.appendChild(soYouWantText);
				
				showTheOtherStuff=false;
				
				try{
					var yesbutton2=document.createElement('<input id="yes2" src="Yes.png" type="image" style="position:absolute;top:50;left:40" onmouseover="onMouseOverYesButton2()" onmouseout="onMouseOutOfYesButton2()" onmousedown="onYesButton2Pressed()" onclick="whenYouClickTheYesButton2()"/>');
				}
				catch(e){
					var yesbutton2=document.createElement('input');
					yesbutton2.setAttribute("style","position:absolute; top:65; left:40");
					yesbutton2.setAttribute("type","image");
					yesbutton2.setAttribute("id","yes2");
					yesbutton2.setAttribute("src","Yes.png");
					yesbutton2.setAttribute("onmouseover","onMouseOverYesButton2()");
					yesbutton2.setAttribute("onmouseout","onMouseOutOfYesButton2()");
					yesbutton2.setAttribute("onmousedown","onYesButton2Pressed()");
					yesbutton2.setAttribute("onclick","whenYouClickTheYesButton2()");
				}
				confirmTargetSection.appendChild(yesbutton2);
				
				try{
					noChangeMyTargetButton=document.createElement('<input style="position:absolute; top:60; left:170" type="image" id="no2" src="no.png" onmouseover="onMouseOverNoButton2()" onmouseout="onMouseOutOfNoButton2()" onmousedown="onNoButton2Pressed()" onclick="whenYouClickTheNoButton2()"/>');
				}
				catch(e){
					noChangeMyTargetButton=document.createElement('input');
					noChangeMyTargetButton.setAttribute("style","position:absolute; top:65; left:170");
					noChangeMyTargetButton.setAttribute("type","image");
					noChangeMyTargetButton.setAttribute("id","no2");
					noChangeMyTargetButton.setAttribute("src","no.png");
					noChangeMyTargetButton.setAttribute("onmouseover","onMouseOverNoButton2()");
					noChangeMyTargetButton.setAttribute("onmouseout","onMouseOutOfNoButton2()");
					noChangeMyTargetButton.setAttribute("onmousedown","onNoButton2Pressed()");
					noChangeMyTargetButton.setAttribute("onclick","whenYouClickTheNoButton2()");
				}
				confirmTargetSection.appendChild(noChangeMyTargetButton);
				
				fadeInConfirmTargetSectionId = setInterval(fadeInConfirmTargetSection,20)
	}
}

function fadeInConfirmTargetSection(){
	
	confirmTargetSectionOpacity+=opacityChangeSpeed;
	
	confirmTargetSection.style.filter='alpha(opacity='+confirmTargetSectionOpacity+')';
	confirmTargetSection.style.MozOpacity=confirmTargetSectionOpacity/100.0;
	confirmTargetSection.style.opacity=confirmTargetSectionOpacity/100.0;

	if(confirmTargetSectionOpacity>=100.0){
		clearInterval(fadeInConfirmTargetSectionId);
	}
}


function onMouseOverYesButton2(){
	if(yesButton2StillPressed==true){
		document.getElementById("yes2").src="Yes_pr.png";
	}
	else{
		document.getElementById("yes2").src="Yes_mo.png";
	}
}
function onMouseOutOfYesButton2(){
	document.getElementById("yes2").src="Yes.png";
}
function onYesButton2Pressed(){
	document.getElementById("yes2").src="Yes_pr.png";
	yesButton2StillPressed=true;
}

function returnShowTheOtherStuff(){

	return showTheOtherStuff;

}


function whenYouClickTheYesButton2(){
	
	//alert("yes the whenyouclicktheyesbutton2 function has been called");
	
		getLastWeightFromDatabaseAndStoreUserData();
		//document.getElementById("yes2").src="Yes_pr.png";
		document.getElementById("yes2").onclick = null;
		//noChangeMyTargetButton.onclick = null;
}


function getLastWeightFromDatabaseAndStoreUserData(){
	//alert("Here, the username is " +username+ " and password is " +password);
	getLastWeightXMLHttpRequestObject.open("GET","getLastWeightFromDatabase.php?username=" +username+ "&password=" +password);
	getLastWeightXMLHttpRequestObject.send("5");
	getLastWeightXMLHttpRequestObject.onreadystatechange = onReadyStateChangeForGetLastWeightFromDatabaseThenStoreUserData;

}

function onReadyStateChangeForGetLastWeightFromDatabaseThenStoreUserData(){
	
	if(getLastWeightXMLHttpRequestObject.readyState==4){
		
		
		lastWeightInKg = getLastWeightXMLHttpRequestObject.responseText;
		
		//alert("the global username is " +username+ " and the global password is " + password);
		/*var totalLbs = 0;
		
		if(kgCurrent!=""){
			currentWeightInKg = kgCurrent;
		}
		else if(lbsCurrent!=""||stCurrent!=""){ 
			if(lbsCurrent!=""){
				totalLbs += lbsCurrent;
			}
			
			if(stCurrent!=""){
				totalLbs += stCurrent * 14;
			}
			
			currentWeightInKg = totalLbs * 0.45359237;	
		}
		else{
			alert("No current weight was found");
		}
		*/
		if(kgToLose!=""){
			weightToLoseInKg = kgToLose;
		}
		else if(lbsToLose!=""){ 

			weightToLoseInKg = lbsToLose * 0.45359237;	
		}
		else{
			//alert("No weight to lose was found");
		}
		
		//weightToLoseInKg=3;
		
		targetWeightInKg = lastWeightInKg - weightToLoseInKg;
		
		//alert("last weight in kg is xxxx" + lastWeightInKg + "xxx");
		//alert("weighttoloseinkg! " + weightToLoseInKg);
		//alert("targetWeightInKg is" + targetWeightInKg + ", preferredTimeUnits is " + preferredTimeUnits);
		storeWeightToLoseTimeToLoseWeightHttpRequestObject.open("GET", "storeWeightToLoseTimeToLoseWeight.php?targetweightinkg=" +targetWeightInKg+ "&months=" + months + "&weeks=" + weeks + "&days=" + days + "&username=" + username + "&password=" + password + "&preferredtimeunits=" + preferredTimeUnits, true);
		storeWeightToLoseTimeToLoseWeightHttpRequestObject.send("8");
		storeWeightToLoseTimeToLoseWeightHttpRequestObject.onreadystatechange = onReadyStateChangeFunctionWeightToLoseTime;
		
		
			
	}
}


function onReadyStateChangeFunctionWeightToLoseTime(){
	if(storeWeightToLoseTimeToLoseWeightHttpRequestObject.readyState==4){ //if response is received
	
		textFromStoreProgramWeightToLoseTime = storeWeightToLoseTimeToLoseWeightHttpRequestObject.responseText;
	
		if(textFromStoreProgramWeightToLoseTime=="ok"){
			
			fadeOutConfirmTargetSectionId = setInterval(fadeOutConfirmTargetSection,20);
				
		}
		else{
		
			alert(textFromStoreProgramWeightToLoseTime);
		
		}
		
		
	
	}
}

function contains(a, b)  //http://www.reloco.com.ar/mozilla/compat.html
{
	// we climb through b parents
	// till we find a
 	while(b && (a!=b) && (b!=null))
		b = b.parentNode;
	return a == b;
}


function fadeOutConfirmTargetSection(){
	
	confirmTargetSectionOpacity-=opacityChangeSpeed;
	
	confirmTargetSection.style.filter='alpha(opacity='+confirmTargetSectionOpacity+')';
	confirmTargetSection.style.MozOpacity=confirmTargetSectionOpacity/100.0;
	confirmTargetSection.style.opacity=confirmTargetSectionOpacity/100.0;

	if(confirmTargetSectionOpacity<=0){
		clearInterval(fadeOutConfirmTargetSectionId);
		
		subPage2.removeChild(confirmTargetSection);
		
		if(contains(loginOrLogoutDiv, loginDiv)){
			isLoggedIn=true;
				
				try{
					logoutButtonImage=document.createElement('<input type="image" id="logoutbutton"  src="Log out.gif" onmouseover="onMouseOverLogoutButton()" onmouseout="onMouseOutOfLogoutButton()" onmousedown="onButtonPressLogout()" onclick="whenYouClickTheLogoutButton()">');
				}
				catch(e){
					logoutButtonImage=document.createElement("input");
					logoutButtonImage.setAttribute("type","image");
					logoutButtonImage.setAttribute("id","logoutbutton");
					logoutButtonImage.setAttribute("src","Log out.gif");
					logoutButtonImage.setAttribute("onmouseover","onMouseOverLogoutButton()");
					logoutButtonImage.setAttribute("onmouseout","onMouseOutOfLogoutButton()");
					logoutButtonImage.setAttribute("onmousedown","onButtonPressLogout()");
					logoutButtonImage.setAttribute("onclick","whenYouClickTheLogoutButton()");
				}
				
				/*
				try{
					myPlannerButton=document.createElement('<input style="position:absolute;right:200" type="image" id="myplannerbutton"  src="My planner page.gif" onclick="whenYouClickTheMyPlannerPageButton()">');
				}
				catch(e){
					myPlannerButton=document.createElement("input");
					myPlannerButton.setAttribute("style","position:absolute;right:200");
					myPlannerButton.setAttribute("type","image");
					myPlannerButton.setAttribute("id","myplannerbutton");
					myPlannerButton.setAttribute("src","My planner page.gif");
					myPlannerButton.setAttribute("onclick","whenYouClickTheMyPlannerPageButton()");
				}
				*/
				
				loginOrLogoutDiv.removeChild(loginDiv);
				loginOrLogoutDiv.appendChild(logoutButtonImage);
				//loginOrLogoutDiv.appendChild(myPlannerButton);
		}
		
		if(suggestionsAreShowing){
			//alert("yes");
			try{
				var flashDiv = document.createElement("<div style='width:100%;height:50px;position:absolute;top:0;left:0'>");
			}
			catch(e){
				var flashDiv = document.createElement("div");
				flashDiv.setAttribute("style","width:100%;height:50px;position:absolute;top:0;left:0");
			}
		}
		else{
			//alert("yes this time");
			try{
				var flashDiv = document.createElement("<div>");
			}
			catch(e){
				var flashDiv = document.createElement("div");
			}
		}
			
			subPage2.appendChild(flashDiv);
			
				try{
					var comeBackMessageParagraph = document.createElement("<P id='comebackmessageparagraph' style='filter:alpha(opacity=100);background:white;position:absolute;top:0;left:0;width:500px;height:10px'>");
				}
				catch(e){
					var comeBackMessageParagraph = document.createElement("P");
					comeBackMessageParagraph.setAttribute("id","comebackmessageparagraph");
					comeBackMessageParagraph.setAttribute("style","filter:alpha(opacity=100);background:white;position:absolute;top:0;left:0;width:500px;height:10px");
				}
			
				
				flashDiv.appendChild(comeBackMessageParagraph);
			
					//var comeBackMessage=document.createTextNode("Please come back after some time to keep track of your progress and view your latest suggestions. Good luck!");
					var comeBackMessage=document.createTextNode("Here is your target graph. You should come back regularly to track your progress and view your latest diet and exercise suggestions for reaching your target. Good luck!!");
					comeBackMessageParagraph.appendChild(comeBackMessage);
			
				//var printTargetGraphButton = document.createElement("<input id='printtargetgraphbutton' type='image' style='position:absolute;top:40;left:0;filter:alpha(opacity=100);opacity:1.0;-moz-opacity:1.0' src='Print my target graph.gif' onclick='whenYouClickThePrintTargetGraphButton()'>");
				//flashDiv.appendChild(printTargetGraphButton);
				
				
				try{
					var homeButton = document.createElement("<input id='homebutton' type='image' style='position:absolute;top:65;left:0;filter:alpha(opacity=100);opacity:1.0;-moz-opacity:1.0' src='Home.gif' onclick='whenYouClickTheHomeButton()'>");
				}
				catch(e){
					var homeButton = document.createElement("input");
					homeButton.setAttribute("id","homebutton");
					homeButton.setAttribute("type","image");
					homeButton.setAttribute("style","position:absolute;top:80;left:0;filter:alpha(opacity=100);opacity:1.0;-moz-opacity:1.0");
					homeButton.setAttribute("src","Home.gif");
					homeButton.setAttribute("onclick","whenYouClickTheHomeButton()");
				}
				flashDiv.appendChild(homeButton);
				
				
				try{
					flashParagraph = document.createElement("<p style='position:absolute;top:120'>");
				}
				catch(e){
					flashParagraph = document.createElement("p");
					flashParagraph.setAttribute("style","position:absolute;top:135");
				}
				flashDiv.appendChild(flashParagraph);
			
					try{
						flashGraph=document.createElement('<object id="flashgraph" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="530" height="400">');
					}
					catch(e){
						flashGraph=document.createElement('object');
						flashGraph.setAttribute("classid","clsid:D27CDB6E-AE6D-11cf-96B8-444553540000");
						flashGraph.setAttribute("width","530");
						flashGraph.setAttribute("height","400");
						flashGraph.setAttribute("id","flashgraph");
					}
				
					flashParagraph.appendChild(flashGraph);
				
				
				
				if(navigator.appName=="Microsoft Internet Explorer"){
		
					var flashParam=document.createElement('<param name="movie" value="WeightProgressGraph.swf" />');		
					flashGraph.appendChild(flashParam);
					var flashParam2=document.createElement('<param name="allowScriptAccess" value="always" >');
					flashGraph.appendChild(flashParam2);
				}
				else{
					try{  //still try the tag method this once even though it's not Internet Explorer, in case there are other browser that only accept the tag method for certain attributes
						var flashEmbed=document.createElement('<embed src="WeightProgressGraph.swf" quality="high" width="530" height="400" name="WeightProgressGraph" allowScriptAccess="always" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer">');
					}
					catch(e){
						var flashEmbed=document.createElement('embed');
						flashEmbed.setAttribute("src","WeightProgressGraph.swf");
						flashEmbed.setAttribute("quality","high");
						flashEmbed.setAttribute("width","530");
						flashEmbed.setAttribute("height","400");
						flashEmbed.setAttribute("name","WeightProgressGraph");
						flashEmbed.setAttribute("type","application/x-shockwave-flash");
						flashEmbed.setAttribute("pluginspage","http://www.macromedia.com/go/getflashplayer");
						flashEmbed.setAttribute("allowScriptAccess","always");
					}
			
					flashGraph.appendChild(flashEmbed);
				}
				
				
				
				/*
				try{
									logoutButtonImage=document.createElement('<input type="image" id="logoutbutton"  src="Log out.gif" onmouseover="onMouseOverLogoutButton()" onmouseout="onMouseOutOfLogoutButton()" onmousedown="onButtonPressLogout()" onclick="whenYouClickTheLogoutButton()">');
								}
								catch(e){
									logoutButtonImage=document.createElement("input");
									logoutButtonImage.setAttribute("type","image");
									logoutButtonImage.setAttribute("id","logoutbutton");
									logoutButtonImage.setAttribute("src","Log out.gif");
									logoutButtonImage.setAttribute("onmouseover","onMouseOverLogoutButton()");
									logoutButtonImage.setAttribute("onmouseout","onMouseOutOfLogoutButton()");
									logoutButtonImage.setAttribute("onmousedown","onButtonPressLogout()");
									logoutButtonImage.setAttribute("onclick","whenYouClickTheLogoutButton()");
								}
				
				pageArray[newPageBeingBuilt].container.appendChild(logoutButtonImage);
				*/
	}
}

function getFlashGraph(){ 
	var flashGraphId = "flashgraph";
	if(document.embeds[flashGraphId])
	return document.embeds[flashGraphId];
	if(window.document[flashGraphId])
	return window.document[flashGraphId];
	if(window[flashGraphId])
	return window[flashGraphId];
	if(document[flashGraphId])
	return document[flashGraphId];
	return null;
}


function whenYouClickThePrintTargetGraphButton(){
	//flashGraph.printForMe();
	
	if(document.getElementById("suggestionslist")!=undefined){
		document.getElementById("suggestionslist").setAttribute("class","notprint");
	}
	if(document.getElementById("pbd")!=undefined){
		document.getElementById("pbd").setAttribute("class","notprint");
	}
	if(document.getElementById("glms")!=undefined){
		document.getElementById("glms").setAttribute("class","notprint");
	}
	if(document.getElementById("comebackmessageparagraph")!=undefined){
		document.getElementById("comebackmessageparagraph").setAttribute("class","notprint");
	}
	if(document.getElementById("printtargetgraphbutton")!=undefined){
		document.getElementById("printtargetgraphbutton").setAttribute("class","notprint");
	}
	if(document.getElementById("homebutton")!=undefined){
		document.getElementById("homebutton").setAttribute("class","notprint");
	}
	window.print();
}

function whenYouClickTheHomeButton(){
	/*
	nextPageNumber=1;
	
	kgTextBox.value="";
	lbsTextBox.value="";
	monthsTextBox.value="";
	weeksTextBox.value="";
	daysTextBox.value="";
	fadeOutCurrentPageId = setInterval(fadeOutCurrentPage,20);
	*/
	
	window.location.reload();
}

function onMouseOverLogoutButton(){
	//if(logoutButtonStillPressed==true){
	
	//}

}
function onMouseOutOfLogoutButton(){

}
function onButtonPressLogout(){

}
function whenYouClickTheLogoutButton(){
 
	window.location.reload();
	eraseCookie("username");
	eraseCookie("password");

}

function createCookie(name,value,days) {    // sumodh, http://bytes.com/topic/javascript/answers/633047-set-get-delete-cookies
    if (days) { 
        var date = new Date(); 
        date.setTime(date.getTime()+(days*24*60*60*1000)); 
        var expires = "; expires="+date.toGMTString(); 
    } 
    else var expires = ""; 
    document.cookie = name+"="+value+expires+"; path=/"; 
} 
  
function readCookie(name) { // sumodh, http://bytes.com/topic/javascript/answers/633047-set-get-delete-cookies
    var nameEQ = name + "="; 
    var ca = document.cookie.split(';'); 
    for(var i=0;i < ca.length;i++) { 
        var c = ca[i]; 
        while (c.charAt(0)==' ') c = c.substring(1,c.length); 
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length); 
    } 
    return null; 
} 


function eraseCookie(name) { // sumodh, http://bytes.com/topic/javascript/answers/633047-set-get-delete-cookies
    createCookie(name,"",-1); 
} 


function onMouseOverNoButton2(){
	if(noButton2StillPressed==true){
		document.getElementById("no2").src="no_pr.png";
	}
	else{
		document.getElementById("no2").src="no_mo.png";
	}
}

function onMouseOutOfNoButton2(){
	document.getElementById("no2").src="no.png";
}

function onNoButton2Pressed(){
	document.getElementById("no2").src="no_pr.png";
	noButton2StillPressed=true;
}

function whenYouClickTheNoButton2(){
		
		buildNewPageContainer();
			
	        pageArray[newPageBeingBuilt].container.appendChild(weightToLoseTimeToLoseWeightSubmitDiv);
			weightToLoseTimeToLoseWeightSubmitDiv.style.position = "relative";
			weightToLoseTimeToLoseWeightSubmitDiv.style.top = 0;
			weightToLoseTimeToLoseWeightSubmitDiv.style.left = 0;
			nextPageNumber = newPageBeingBuilt;
			fadeOutCurrentPageId = setInterval(fadeOutCurrentPage,20);
			
			kgTextBox.value="";
			lbsTextBox.value="";
			monthsTextBox.value="";
			weeksTextBox.value="";
			daysTextBox.value="";
			
	
}


function fadeInReenterTargetDiv(){

	weightToLoseTimeToLoseWeightSubmitDivOpacity+=opacityChangeSpeed;
	weightToLoseTimeToLoseWeightSubmitDiv.style.filter = "alpha(opacity=" +weightToLoseTimeToLoseWeightSubmitDivOpacity+ ")";
	weightToLoseTimeToLoseWeightSubmitDiv.style.MozOpacity=weightToLoseTimeToLoseWeightSubmitDivOpacity/100.0;
	weightToLoseTimeToLoseWeightSubmitDiv.style.opacity=weightToLoseTimeToLoseWeightSubmitDivOpacity/100.0;
	
	
	if(weightToLoseTimeToLoseWeightSubmitDivOpacity>=100){
		clearInterval(id5);
	}

}


function whenYouClickTheSubmitButtonPage3(){

	//alert("we are in this place");

	kgToLose = document.getElementById("kgtolose").value;
    lbsToLose = document.getElementById("lbstolose").value;
    months = document.getElementById("months").value;
    weeks = document.getElementById("weeks").value;
    days = document.getElementById("days").value;
	
	if(months!=""){
		preferredTimeUnits = "months";
	}
	else if(weeks!="" && months==""){
		preferredTimeUnits = "weeks";
	}
	else if(days!="" && weeks=="" && months==""){
		preferredTimeUnits = "days";
	}
	
	
  
	suggestionsHttpRequestObject.open("GET", "suggestionsCalculation.php?kgtolose=" + kgToLose + "&lbstolose=" + lbsToLose + "&months=" + months + "&weeks=" + weeks + "&days=" + days  , true);
     suggestionsHttpRequestObject.send("8");
     suggestionsHttpRequestObject.onreadystatechange = onReadyStateChangeFunction2; 
	 
	 var username=inputusernametextbox.value;
	var password=inputpasswordtextbox.value;
	
	var totalLbs = 0;
	
	if(kgCurrent!=""){
		currentWeightInKg = kgCurrent;
	}
	else if(lbsCurrent!=""||stCurrent!=""){ 
		if(lbsCurrent!=""){
			totalLbs += lbsCurrent;
		}
		
		if(stCurrent!=""){
			totalLbs += stCurrent * 14;
		}
		
		currentWeightInKg = totalLbs * 0.45359237;	
	}
	else{
		alert("No current weight was found");
	}
	
	if(kgToLose!=""){
		weightToLoseInKg = kgToLose;
	}
	else if(lbsToLose!=""){ 

		weightToLoseInKg = lbsToLose * 0.45359237;	
	}
	else{
		alert("No weight to lose was found");
	}
	
	targetWeightInKg = currentWeightInKg - weightToLoseInKg;
	
	storeWeightToLoseTimeToLoseWeightHttpRequestObject.open("GET", "storeWeightToLoseTimeToLoseWeight.php?targetweightinkg=" +targetWeightInKg+ "&months=" + months + "&weeks=" + weeks + "&days=" + days + "&username=" + username + "&password=" + password + "&preferredtimeunits=" + preferredTimeUnits, true);
     storeWeightToLoseTimeToLoseWeightHttpRequestObject.send("8");
    storeWeightToLoseTimeToLoseWeightHttpRequestObject.onreadystatechange = onReadyStateChangeFunctionWeightToLoseTime2;
	
	try{
		var comeBackMessageParagraph = document.createElement("<P id='comebackmessageparagraph'>");
	}
	catch(e){
		var comeBackMessageParagraph = document.createElement("P");
		comeBackMessageParagraph.setAttribute("id","comebackmessageparagraph")
	}
	pageArray[newPageBeingBuilt].container.appendChild(comeBackMessageParagraph);
	
		var comeBackMessage=document.createTextNode("Please come back after some time to keep track of your progress");
		comeBackMessageParagraph.appendChild(comeBackMessage);
	
}

function onReadyStateChangeFunction2(){
	if(suggestionsHttpRequestObject.readyState==4){ //a response is received from the php
		
		//build a page 4 here		
		//pageArray[4].container.appendChild(); // etc etc
		textFromPhp = suggestionsHttpRequestObject.responseText;
	   //alert(textFromPhp);
	   var arrayOfStringsCreatedFromSplittingTextFromPhp=textFromPhp.split(",");
	   var calorieToLoseFromExercisePerDay=arrayOfStringsCreatedFromSplittingTextFromPhp[0];
	   var caloriesToEatPerDay=arrayOfStringsCreatedFromSplittingTextFromPhp[1];
	   
	   var arrayOfExerciseTypes = new Array();
	   var arrayOfExerciseDurations = new Array();
	   
	   for(var i=2;i<arrayOfStringsCreatedFromSplittingTextFromPhp.length;i++){
				
			if(i%2==0){
				arrayOfExerciseTypes[(i-2)/2] = arrayOfStringsCreatedFromSplittingTextFromPhp[i];
			}
			else if(i%2==1){
				arrayOfExerciseDurations[(i-3)/2] = Math.round(arrayOfStringsCreatedFromSplittingTextFromPhp[i]);
			}
	   }
	   
	   //var exerciseType=arrayOfStringsCreatedFromSplittingTextFromPhp[2];
	   //var durationOfExercise=arrayOfStringsCreatedFromSplittingTextFromPhp[3];
	   
	   suggestionString="For an equal balance of diet and exercise based weight-loss, try to eat around " + Math.round(caloriesToEatPerDay) + " calories in a day and do any of the following activities on each day each of which adds up to " + Math.round(calorieToLoseFromExercisePerDay) + " calories burnt:";
	   
	   //alert("suggestionString is: " + suggestionString);
	   
	   for(var i=0;i<arrayOfExerciseTypes.length-1;i++){
			
			arrayOfExerciseStrings[i] = arrayOfExerciseTypes[i] + " - " + arrayOfExerciseDurations[i] + " minutes ";
		
		}
		
		//alert("first exercise is: " +arrayOfExerciseStrings[0]);
		/*
		while(pageArray[4].container.firstChild){
		pageArray[4].container.removeChild(pageArray[4].container.firstChild);
		}
		*/
	
	buildNewPageContainer();

	try{
		var suggestionsList=document.createElement("<UL id='suggestionslist' type='disc'>");
	}
	catch(e){
		var suggestionsList=document.createElement('UL');
		suggestionsList.setAttribute("type","disc");
		suggestionsList.setAttribute("id","suggestionslist");
	}
	pageArray[newPageBeingBuilt].container.appendChild(suggestionsList);
		var suggestion1ListElement=document.createElement('LI');
		suggestionsList.appendChild(suggestion1ListElement);
			
			//alert("suggestionString is: " + suggestionString);
			
			beginningBitOfSuggestionsP = document.createElement("P");
			suggestion1ListElement.appendChild(beginningBitOfSuggestionsP);
			
				var suggestion1=document.createTextNode(suggestionString);
				beginningBitOfSuggestionsP.appendChild(suggestion1);
			
			var suggestion1ExerciseList = document.createElement('ul');
			suggestion1ExerciseList.setAttribute("type","disc");
			suggestion1ListElement.appendChild(suggestion1ExerciseList);
			
			var arrayOfSuggestion1ExerciseListElements = new Array();
			
			for (var i = 0; i<arrayOfExerciseStrings.length; i++){
				arrayOfSuggestion1ExerciseListElements[i] = document.createElement('li');
				suggestion1ExerciseList.appendChild(arrayOfSuggestion1ExerciseListElements[i]);
			}
			
			var arrayOfExerciseStringsTextNodes = new Array();
			
			for(var i=0; i<arrayOfExerciseStrings.length ; i++){
			
				arrayOfExerciseStringsTextNodes[i] = document.createTextNode(arrayOfExerciseStrings[i]);
				arrayOfSuggestion1ExerciseListElements[i].appendChild(arrayOfExerciseStringsTextNodes[i]);
			}
			
			
			
			
		/*
		var suggestion2ListElement=document.createElement('LI');
		suggestionsList.appendChild(suggestion2ListElement);
			var suggestion2=document.createTextNode('jklkj');
			suggestion2ListElement.appendChild(suggestion2);*/
		
		/*var suggestion3ListElement=document.createElement('LI');
		suggestionsList.appendChild(suggestion3ListElement);
			var suggestion3=document.createTextNode('jklk');
			suggestion3ListElement.appendChild(suggestion3)

*/
	try{
		var printButtonDiv=document.createElement('<div id="pbd" style="height:70px; position:absolute; top:70; left:400">');
	}
	catch(e){
		var printButtonDiv=document.createElement('div');
		printButtonDiv.setAttribute("id","pbd");
		printButtonDiv.setAttribute("style","height:70px; position:absolute; top:70; left:400");
	}
	pageArray[newPageBeingBuilt].container.appendChild(printButtonDiv);
	
	var printButtonp=document.createElement('P');
	printButtonDiv.appendChild(printButtonp);
		try{
			var printButton=document.createElement('<input type="image" id="printbutton" src="Print my suggestions.gif" onmouseover="onMouseOverPrintButton()" onmouseout="onMouseOutOfPrintButton()" onmousedown="onPrintButtonPressed()" onclick="onPrintButtonClicked()" />');
		}
		catch(e){
			var printButton=document.createElement("input");
			printButton.setAttribute("type","image");
			printButton.setAttribute("id","printbutton");
			printButton.setAttribute("src","Print my suggestions.gif");
			printButton.setAttribute("onmouseover","onMouseOverPrintButton()");
			printButton.setAttribute("onmouseout","onMouseOutOfPrintButton()");
			printButton.setAttribute("onmousedown","onPrintButtonPressed()");
			printButton.setAttribute("onclick","onPrintButtonClicked()");
		}
		printButtonp.appendChild(printButton);
		
		//alert("we are here");
		nextPageNumber=newPageBeingBuilt;
		fadeOutCurrentPageId = setInterval(fadeOutCurrentPage,20);
		
		
			
	}
}

function onReadyStateChangeFunctionWeightToLoseTime2(){

	if(storeWeightToLoseTimeToLoseWeightHttpRequestObject.readyState==4){
		textFromStoreProgramWeightToLoseTime = storeWeightToLoseTimeToLoseWeightHttpRequestObject.responseText;
		if(textFromStoreProgramWeightToLoseTime=="ok"){	
		var responsereceivedfromphp=document.createTextNode("response has been received");
		pageArray[newPageBeingBuilt].container.appendChild(responsereceivedfromphp);
		
		}
	

	}
}

function fadeInNextPage(){
	
	pageArray[nextPageNumber].opacity+=opacityChangeSpeed;
	if(pageArray[nextPageNumber].opacity>=100){
		pageArray[nextPageNumber].opacity=100;
		clearInterval(fadeInNextPageId); //this clears the animation
	}
	pageArray[nextPageNumber].container.style.filter='alpha(opacity='+pageArray[nextPageNumber].opacity+')';
	pageArray[nextPageNumber].container.style.MozOpacity=pageArray[nextPageNumber].opacity/100.0;
	pageArray[nextPageNumber].container.style.opacity=pageArray[nextPageNumber].opacity/100.0;
}

function fadeOutCurrentPage(){

    //I want the opacity to decrease by 2 here until it reaches zero. clearInterval  when it reaches zero
	
	if(pageArray[currentPageNumber].opacity<=0){
		
		clearInterval(fadeOutCurrentPageId);
		
		//alert("Current page number is "+currentPageNumber+", nextPageNumber is "+nextPageNumber+" !");
		
		document.body.removeChild(pageArray[currentPageNumber].container);
		document.body.appendChild(pageArray[nextPageNumber].container);
		
		if(flashGraph!=undefined&&contains(pageArray[nextPageNumber].container,flashGraph)&&flashParagraph!=undefined&&contains(pageArray[nextPageNumber].container,flashParagraph)){
			//alert("yes, flashGraph and flashDiv is contained in the next page");
			flashParagraph.removeChild(flashGraph);
		
			flashGraph=null;
			
			try{
				flashGraph=document.createElement('<object id="flashgraph" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="450" height="350">');
				//alert("flash graph created");
			}
			catch(e){
				flashGraph=document.createElement('object');
				flashGraph.setAttribute("classid","clsid:D27CDB6E-AE6D-11cf-96B8-444553540000");
				flashGraph.setAttribute("width","450");
				flashGraph.setAttribute("height","350");
				flashGraph.setAttribute("id","flashgraph");
			}
			flashParagraph.appendChild(flashGraph);
				
				if(navigator.appName=="Microsoft Internet Explorer"){
					//alert(password);
					
					var flashParam=document.createElement('<param name="movie" value="WeightProgressGraph.swf" />');		
					flashGraph.appendChild(flashParam);
					var flashParam2=document.createElement('<param name="allowScriptAccess" value="always" >');
					flashGraph.appendChild(flashParam2);
				}
				else{
					try{  //still try the tag method this once even though it's not Internet Explorer, in case there are other browser that only accept the tag method for certain attributes
						var flashEmbed=document.createElement('<embed src="WeightProgressGraph.swf" quality="high" width="450" height="350" name="WeightProgressGraph" allowScriptAccess="always" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer">');
					}
					catch(e){
						var flashEmbed=document.createElement('embed');
						flashEmbed.setAttribute("src","WeightProgressGraph.swf");
						flashEmbed.setAttribute("quality","high");
						flashEmbed.setAttribute("width","450");
						flashEmbed.setAttribute("height","350");
						flashEmbed.setAttribute("name","WeightProgressGraph");
						flashEmbed.setAttribute("type","application/x-shockwave-flash");
						flashEmbed.setAttribute("pluginspage","http://www.macromedia.com/go/getflashplayer");
						flashEmbed.setAttribute("allowScriptAccess","always");
					}
					
					flashGraph.appendChild(flashEmbed);
				}
		}
		else if(flashGraph!=undefined&&contains(pageArray[nextPageNumber].container,flashGraph)){
		
			pageArray[nextPageNumber].container.removeChild(flashGraph);
			
			flashGraph=null;
			
			try{
				flashGraph=document.createElement('<object id="flashgraph" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="450" height="350">');
				//alert("flash graph created");
			}
			catch(e){
				flashGraph=document.createElement('object');
				flashGraph.setAttribute("classid","clsid:D27CDB6E-AE6D-11cf-96B8-444553540000");
				flashGraph.setAttribute("width","450");
				flashGraph.setAttribute("height","350");
				flashGraph.setAttribute("id","flashgraph");
			}
			pageArray[nextPageNumber].container.appendChild(flashGraph);
				
				if(navigator.appName=="Microsoft Internet Explorer"){
					//alert(password);
					
					var flashParam=document.createElement('<param name="movie" value="WeightProgressGraph.swf" />');		
					flashGraph.appendChild(flashParam);
					var flashParam2=document.createElement('<param name="allowScriptAccess" value="always" >');
					flashGraph.appendChild(flashParam2);
				}
				else{
					try{  //still try the tag method this once even though it's not Internet Explorer, in case there are other browser that only accept the tag method for certain attributes
						var flashEmbed=document.createElement('<embed src="WeightProgressGraph.swf" quality="high" width="450" height="350" name="WeightProgressGraph" allowScriptAccess="always" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer">');
					}
					catch(e){
						var flashEmbed=document.createElement('embed');
						flashEmbed.setAttribute("src","WeightProgressGraph.swf");
						flashEmbed.setAttribute("quality","high");
						flashEmbed.setAttribute("width","450");
						flashEmbed.setAttribute("height","350");
						flashEmbed.setAttribute("name","WeightProgressGraph");
						flashEmbed.setAttribute("type","application/x-shockwave-flash");
						flashEmbed.setAttribute("pluginspage","http://www.macromedia.com/go/getflashplayer");
						flashEmbed.setAttribute("allowScriptAccess","always");
					}
					
					flashGraph.appendChild(flashEmbed);
				}
		
		}
		
		
		fadeInNextPageId = setInterval(fadeInNextPage,20);
		currentPageNumber = nextPageNumber;
		//alert("we are in the animation and the opacity is" + pageArray[currentPageNumber].opacity);
		
		dhtmlHistory.add(nextPageNumber.toString(), 0);
	}
	 
	//pageArray[currentPageNumber].opacity-=opacityChangeSpeed;
	pageArray[currentPageNumber].opacity-=opacityChangeSpeed;
	pageArray[currentPageNumber].container.style.filter='alpha(opacity='+pageArray[currentPageNumber].opacity+')';
	pageArray[currentPageNumber].container.style.MozOpacity=pageArray[currentPageNumber].opacity/100.0;
	pageArray[currentPageNumber].container.style.opacity=pageArray[currentPageNumber].opacity/100.0;

}
			


</script>

</head>

<body onLoad="onBodyLoad()" onmouseup="releaseButtonOnBody()">

</body>

</html>
