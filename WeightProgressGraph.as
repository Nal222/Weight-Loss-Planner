
package{

	import flash.display.Sprite;
	import flash.display.Graphics;
	import flash.text.TextFormat;
	import flash.text.TextField;
	import flash.display.Shape;
	import flash.display.GradientType;
	import flash.net.URLRequest;
	import flash.net.URLLoader;
	import flash.net.URLLoaderDataFormat;
	import flash.net.URLRequestMethod;
	import flash.net.URLVariables;
	import flash.events.Event;
	import flash.external.ExternalInterface;
	import flash.geom.Matrix;
	import flash.system.Security;
	import GraphPoint;
	import flash.utils.*;
	import flash.printing.PrintJob;
	
	public class WeightProgressGraph extends Sprite{
		
		public var maximumNumberOfDashesOnXAxis=25;
		
		public var maximumNumberOfDashesIWantOnYAxis=10;
		public var minumumNumberOfDashesIWantOnYAxis=7;
		
		public var zoomingIn=false;
		
		public var axisOriginX:Number = 50;
		public var axisOriginY:Number = 300;
		public var axisLineThickness:Number = 1;
		public var graphLineThickness:Number=1.4;
		public var nowArrowThickness:Number = 2;
		public var axisLineColour:uint = 0x000000;
		public var topOfYAxisX:Number = 50;
		public var topOfYAxisY:Number = 60;
		public var middleOfYAxisX:Number;
		public var middleOfYAxisY:Number;
		public var endOfXAxisX:Number = 400;
		public var endOfXAxisY:Number = 300;
		public var lengthOfYAxis:Number;
	
		public var dotRadiusInPixels:Number = 2.5;
		public var circleLineThickness:Number = 1;
		public var circleLineColour:uint = 0x0000FF; //make same variable name as FILL
		public var circleFillColour:uint = 0x0000FF;
		public var targetColour:uint = 0xFF0000;
		public var nowColour:uint = 0xE17411;
		public var white:uint=0xFFFFFF;
		
		public var yAxisSprite:Sprite;
		public var xAxisSprite:Sprite;
		public var firstWeightDotSprite:Sprite;
		public var targetWeightLineSprite:Sprite;
		public var firstMarkingYAxis:Sprite;
		public var targetWeightDotSprite:Sprite;
		
		public var targetWeightDotXPosition;
		public var targetWeightDotYPosition;
		
		public var scalingIntervalNumber = 1; //default
		
		public var xAxisLength:Number=350.0;
		public var targetTimeXPosition:Number;
		public var targetWeight;
		public var pixelsPerWeightUnit:Number;
		public var currentWeight;
		public var nextNumberBelowCurrentWeight;
		public var numberOfPixelsDownFromCurrentWeightDot:Number;
		public var dashLength:Number=7;
		public var nowArrowLength:Number=26;
		public var nowArrowSpriteXPositionPixels;
		
		public var targetTimeNumber;
		public var pixelsPerPreferredTimeUnit;
		public var distanceBetweenXAxisDashesInPixels;
		
		public var pixelsPerWeightUnitZoomedIn;
		public var pixelsPerPreferredTimeUnitZoomedIn;
		public var pixelsPerWeightUnitZoomedOut;
		public var pixelsPerPreferredTimeUnitZoomedOut;
		
		public var zoomFactor = 0.15;
		public var frameInterval = 5;
		public var discrepancyLowerLimit = 0.015;
		
		public var preferredWeightUnits:String="";
		public var preferredTimeUnits:String="";
		public var xAxisLabelString;
		public var userName;
		public var passWord;
		
		public var myvariablefromphp;
		public var myvariable2;
		
		public var myURLLoader;
		
		public var myStringFromGetUserDataPhpScript:String;
		
		public var arrayOfGraphPoints;
		public var numberOfGraphPoints;
		public var weightYouShouldBe:Number;
		
		public var startPointForTarget;
		
		public var zoomInId;
		public var zoomOutId;
		public var refreshCallbacksId;
		public var addCallbacksAfterADelayId;
		
		public var nowTime;
		
		public function WeightProgressGraph(){

			//userName= this.root.loaderInfo.parameters.username;
			//passWord= this.root.loaderInfo.parameters.password;
			
			lengthOfYAxis = Math.sqrt(Math.pow((axisOriginY-topOfYAxisY),2)+Math.pow((axisOriginX-topOfYAxisX),2));
			
			//ExternalInterface.call("actionScriptAlert", "lengthOfYAxis is " + lengthOfYAxis);
			
			userName=ExternalInterface.call("getUsername");
			passWord=ExternalInterface.call("getPassword");
			
			//ExternalInterface.call("actionScriptAlert","username from javascript returned is "+userName+", password returned is "+passWord);
			
			
			//var five:String=ExternalInterface.call("get5()");
			//ExternalInterface.call("actionScriptAlert('returned value from javascript is " +five+ "')");
			
			//preferredWeightUnits=ExternalInterface.call("getPreferredWeightUnits()");
			//preferredTimeUnits=ExternalInterface.call("getPreferredTimeUnits()");
			
			//ExternalInterface.call("actionScriptAlert('pref. weight scale is " +preferredWeightUnits+ " and preferred time units are " + preferredTimeUnits+ "')");
			
			
			
		
			
			//ExternalInterface.addCallback("zoomInOut", testCallbackFunction);
			
			addCallbacks();
			
			var rotation90DegreesMatrix = new Matrix();
			rotation90DegreesMatrix.createGradientBox(500,500,Math.PI/2.0);
			
			this.graphics.lineStyle(0.0, this.white);
			this.graphics.beginGradientFill(GradientType.LINEAR, new Array(0x00FFFF, 0xFFFF00), new Array(1.0,1.0), new Array(0,255), rotation90DegreesMatrix);
				this.graphics.drawRect(0,-10,500,500);
			this.graphics.endFill();
			
			
			
			/*
			var textField = new TextField();
			textField.width = 1000;
			textField.text = "Hello this is a test" + userName + " " + passWord;
			this.addChild(textField);
			*/
			
			var myURLRequest = new URLRequest("getUserData.php");
			myURLRequest.data = new URLVariables();
			myURLRequest.method = URLRequestMethod.GET;
			//POST method does not work
			myURLRequest.data.username=userName;
			myURLRequest.data.password=passWord;
			myURLLoader = new URLLoader();
			myURLLoader.dataFormat = URLLoaderDataFormat.TEXT;
			
			var errorString;
			
			try{
				myURLLoader.addEventListener(Event.COMPLETE, phpScriptCalled);
			}
			catch(e:Error){
				errorString = e.toString();
			}
			
			
			myURLLoader.load(myURLRequest);
			
			
			//when you  want to send data put it into the URLRequest object. When you receive data it goes into the URLLoader object.
			//Thats the way they've made it.
			
			middleOfYAxisX= (axisOriginX+topOfYAxisX)/2.0;
			middleOfYAxisY= (axisOriginY+topOfYAxisY)/2.0;
			
			targetTimeXPosition=50+xAxisLength;
			
		}
		
		public function addCallbacks(){
				
			ExternalInterface.addCallback("zoomInOut", zoomInOutFunction);
			ExternalInterface.addCallback("returnWeightYouShouldBeByNowFromActionScript", returnWeightYouShouldBeByNow);
			ExternalInterface.addCallback("returnPreferredWeightUnitsFromActionScript", returnPreferredWeightUnits);
			ExternalInterface.addCallback("printForMe",printForMe);
			
		}
		
		public function testCallbackFunction(){
			ExternalInterface.call("actionScriptAlert","This is actionscript. Saying that the zoom in/out button has been pressed. Well done!");
		}
		
		public function returnPreferredWeightUnits(){
			
			return preferredWeightUnits;
		
		}
		
		public function printForMe(){
			//print();
			
			var myPrintJob = new PrintJob();
			myPrintJob.addPage(this);
			myPrintJob.start();
		}
		
		public function zoomInOutFunction(){
		
			//ExternalInterface.call("actionScriptAlert('num children is " +this.numChildren+ "')");
			
			
			
			var numberOfChildren = this.numChildren;
			
			for(var i=0;i<numberOfChildren;i++){
				removeChildAt(0);
			}
			
			
			//ExternalInterface.call("actionScriptAlert('num children after removal attempt is " +this.numChildren+ "')");
			
			
			if (zoomingIn==true){
				//drawZoomedOutGraph();
				clearInterval(zoomInId);
				zoomOutId = setInterval(zoomOut,frameInterval);
				zoomingIn=false;
			}
			else{
				//drawZoomedInGraph();
				clearInterval(zoomOutId);
				zoomInId = setInterval(zoomIn,frameInterval);
				zoomingIn=true;
			}
			
		}
		
		public function zoomIn(){
		
			var finished=false;
			
			if(Math.abs(pixelsPerWeightUnit-pixelsPerWeightUnitZoomedIn)>discrepancyLowerLimit){
				pixelsPerWeightUnit+=(pixelsPerWeightUnitZoomedIn-pixelsPerWeightUnit)*zoomFactor;
			}
			else{
				clearInterval(zoomInId);
				finished=true;
			}
			if(Math.abs(pixelsPerPreferredTimeUnit-pixelsPerPreferredTimeUnitZoomedIn)>discrepancyLowerLimit){
				pixelsPerPreferredTimeUnit+=(pixelsPerPreferredTimeUnitZoomedIn-pixelsPerPreferredTimeUnit)*zoomFactor;
			}
			else{
				clearInterval(zoomInId);
				finished=true;
			}
			
			var numberOfChildren = this.numChildren;
			
			for(var i=0;i<numberOfChildren;i++){
				removeChildAt(0);
			}
			
			if(finished==true){
				drawZoomedInGraph();
			}
			else{
				drawGraph();
			}
		
		}
		
		public function zoomOut(){
		
			var finished=false;
			
			if(Math.abs(pixelsPerWeightUnit-pixelsPerWeightUnitZoomedOut)>discrepancyLowerLimit){
				pixelsPerWeightUnit+=(pixelsPerWeightUnitZoomedOut-pixelsPerWeightUnit)*zoomFactor;
			}
			else{
				clearInterval(zoomOutId);
				finished=true;
			}
			if(Math.abs(pixelsPerPreferredTimeUnit-pixelsPerPreferredTimeUnitZoomedOut)>discrepancyLowerLimit){
				pixelsPerPreferredTimeUnit+=(pixelsPerPreferredTimeUnitZoomedOut-pixelsPerPreferredTimeUnit)*zoomFactor;
			}
			else{
				clearInterval(zoomOutId);
				finished=true;
			}
			
			var numberOfChildren = this.numChildren;
			
			for(var i=0;i<numberOfChildren;i++){             //remove all the children of this sprite
				removeChildAt(0);
			}
			
			if(finished==true){
				drawZoomedOutGraph();
			}
			else{
				drawGraph();
			}
		}
		
		public function showTestData(){
			
			//for testing
			/*
			var testTextField:TextField = new TextField();
			testTextField.width=500;
			//testTextField.text=userName+" "+passWord + " " + myvariablefromphp + " " + myvariable2 + receivedUsername + receivedPassword + currentWeight;
			testTextField.text=myStringFromtestscript + " " + userName+" "+passWord ;
			//+" " + myvariablefromphp + " " + myvariable2;
			testTextField.x= 0;
			testTextField.y= 0;
			this.addChild(testTextField);
			//
			*/
		}
		
		private function phpScriptCalled(event:Event){//loading finished
			
			
			
			myStringFromGetUserDataPhpScript = myURLLoader.data;
			
			//ExternalInterface.call("actionScriptAlert",myStringFromtestscript);
			
			//ExternalInterface.call("actionScriptAlert", "Everything up to here is fine");
			
			var arrayOfStrings = myStringFromGetUserDataPhpScript.split("/");
			var arrayOfWeightDates = arrayOfStrings[4].split("X");
			
			startPointForTarget = arrayOfStrings[5];
			startPointForTarget = parseInt(startPointForTarget);
			
			//ExternalInterface.call("actionScriptAlert", " " + startPointForTarget);
			
			numberOfGraphPoints = arrayOfWeightDates.length;
			
			/*
			var firstWeightDate = arrayOfWeightDates[0].split(".");
			var firstWeight = firstWeightDate[0];
			var firstDate= firstWeightDate[1];
			var secondWeightDate=arrayOfWeightDates[1].split(".");
			var secondWeight= secondWeightDate[0];
			var secondDate= secondWeightDate[1];
			var thirdWeightDate=arrayOfWeightDates[2].split("."); 
			var thirdWeight= thirdWeightDate[0];
			var thirdDate= thirdWeightDate[1];
			*/
			
			preferredWeightUnits = arrayOfStrings[0];
			preferredTimeUnits = arrayOfStrings[1];
			
			if(preferredWeightUnits==""){
				preferredWeightUnits = "kg";
			}
			
			if(preferredTimeUnits==""){
				preferredTimeUnits = "weeks";
			}
			
			//ExternalInterface.call("actionScriptAlert", preferredWeightUnits +" "+ preferredTimeUnits);
			
			arrayOfGraphPoints = new Array();
			
			for(var i=0;i<numberOfGraphPoints;i++){
				
				this.arrayOfGraphPoints[i] = new GraphPoint();
				this.arrayOfGraphPoints[i].weightDate = arrayOfWeightDates[i].split("Y");
				if(preferredWeightUnits=="kg"){
					this.arrayOfGraphPoints[i].weight = this.arrayOfGraphPoints[i].weightDate[0];
				}
				else if(preferredWeightUnits=="lbs"){
					arrayOfGraphPoints[i].weight = arrayOfGraphPoints[i].weightDate[0]*2.20462262;
				}
				else if(preferredWeightUnits=="St"){ // need to handle stones correctly!!
					arrayOfGraphPoints[i].weight = arrayOfGraphPoints[i].weightDate[0]*2.20462262;
				}
				arrayOfGraphPoints[i].dateString= arrayOfGraphPoints[i].weightDate[1];
				arrayOfGraphPoints[i].arrayOfSplitDate= arrayOfGraphPoints[i].dateString.split("-");
				
				arrayOfGraphPoints[i].date = new Date();
			
				arrayOfGraphPoints[i].date.fullYear = arrayOfGraphPoints[i].arrayOfSplitDate[0];
				arrayOfGraphPoints[i].date.month = arrayOfGraphPoints[i].arrayOfSplitDate[1] - 1;
				arrayOfGraphPoints[i].date.date = arrayOfGraphPoints[i].arrayOfSplitDate[2];
				
				if(preferredTimeUnits=="days"){
					arrayOfGraphPoints[i].time=(arrayOfGraphPoints[i].date.getTime() - arrayOfGraphPoints[0].date.getTime())/(1000.0*60.0*60.0*24.0);
				}
				else if(preferredTimeUnits=="weeks"){
					arrayOfGraphPoints[i].time=(arrayOfGraphPoints[i].date.getTime() - arrayOfGraphPoints[0].date.getTime())/(1000.0*60.0*60.0*24.0*7.0);
				}
				else if(preferredTimeUnits=="months"){
					arrayOfGraphPoints[i].time=(arrayOfGraphPoints[i].date.getTime() - arrayOfGraphPoints[0].date.getTime())/(1000.0*60.0*60.0*24.0*7.0*4.34812141);
				}
				
			}
			
			
			var currentDate = new Date();
			var firstDate = arrayOfGraphPoints[0].date;
			
			var nowTimeInMilliseconds = currentDate.getTime() - firstDate.getTime();
			
			if(preferredTimeUnits=="days"){
				nowTime = nowTimeInMilliseconds/(1000.0 * 60.0 * 60.0 * 24.0);
			}
			else if(preferredTimeUnits=="weeks"){
				nowTime = nowTimeInMilliseconds/(1000.0 * 60.0 * 60.0 * 24.0 * 7.0);
			}
			else if(preferredTimeUnits=="months"){
				nowTime = nowTimeInMilliseconds/(1000.0 * 60.0 * 60.0 * 24.0 * 7.0 * 4.34812141);
			}
			
			//ExternalInterface.call("actionScriptAlert", "nowTime is "+nowTime);
			
			//ExternalInterface.call("actionScriptAlert", "current date is:" + currentDate.date +" " + currentDate.month +" "+ currentDate.fullYear +" "+ currentDate.hours +" "+ currentDate.minutes +" "+ currentDate.seconds);
			//ExternalInterface.call("actionScriptAlert", "first date is:" + firstDate.date +" " + firstDate.month +" "+ firstDate.fullYear +" "+ firstDate.hours +" "+ firstDate.minutes +" "+ firstDate.seconds);
			
			/*
			timeArray[0]=0;
			
			if(preferredTimeUnits=="days"){
				timeArray[1]=(dateArray[1].time - dateArray[0].time)/(1000*60*60*24);
			}
			else if(preferredTimeUnits=="weeks"){
				timeArray[1]=(dateArray[1].time - dateArray[0].time)/(1000*60*60*24*7);
			}
			else if(preferredTimeUnits=="months"){
				timeArray[1]=(dateArray[1].time - dateArray[0].time)/(1000*60*60*24*7*4.34812141);
			}
			
			if(preferredTimeUnits=="days"){
				timeArray[2]=(dateArray[2].time - dateArray[0].time)/(1000*60*60*24);
			}
			else if(preferredTimeUnits=="weeks"){
				timeArray[2]=(dateArray[2].time - dateArray[0].time)/(1000*60*60*24*7);
			}
			else if(preferredTimeUnits=="months"){
				timeArray[2]=(dateArray[2].time - dateArray[0].time)/(1000*60*60*24*7*4.34812141);
			}
			*/
			
			/*
			dateArray[0] = new Date();
			
			dateArray[0].fullYear = arrayOfSplitDates[0][0];
			dateArray[0].month = arrayOfSplitDates[0][1];
			dateArray[0].date = arrayOfSplitDates[0][2];
			
			dateArray[1] = new Date();
			
			dateArray[1].fullYear = arrayOfSplitDates[1][0];
			dateArray[1].month = arrayOfSplitDates[1][1];
			dateArray[1].date = arrayOfSplitDates[1][2];
			
			dateArray[2] = new Date();
			
			dateArray[2].fullYear = arrayOfSplitDates[2][0];
			dateArray[2].month = arrayOfSplitDates[2][1];
			dateArray[2].date = arrayOfSplitDates[2][2];
			*/
			
			//currentWeight = arrayOfWeights[0];
			
			
			
			
			if(preferredWeightUnits=="kg"){
				targetWeight = arrayOfStrings[2];
			}
			else if(preferredWeightUnits=="lbs"){
				targetWeight = arrayOfStrings[2]*2.20462262;
			}
			else if(preferredWeightUnits=="St"){
				targetWeight = arrayOfStrings[2]*2.20462262;
			}
			
			
			
			var timeToLoseWeightInWeeks = arrayOfStrings[3];
			
			if(preferredTimeUnits=="days"){
				targetTimeNumber=timeToLoseWeightInWeeks*7.0;
			}
			else if(preferredTimeUnits=="weeks"){
				targetTimeNumber=timeToLoseWeightInWeeks;
			}
			else if(preferredTimeUnits=="months"){
				targetTimeNumber=timeToLoseWeightInWeeks/4.34812141;
			}
			else{
				targetTimeNumber=timeToLoseWeightInWeeks;
			}
			
			//target
			
			//ExternalInterface.call("actionScriptAlert", "nowTime is " +nowTime+ " and targetTimeNumber is " +targetTimeNumber);
			
			targetTimeNumber = Number(targetTimeNumber);
			
			targetTimeNumber+=arrayOfGraphPoints[startPointForTarget].time;
			
			var targetTimeNumberTimesTenAndRoundedOff = Math.round(targetTimeNumber*10.0);
			
			targetTimeNumber = targetTimeNumberTimesTenAndRoundedOff/10.0
			
			//ExternalInterface.call("actionScriptAlert", "after your line nals, nowTime is now " +nowTime+ " and targetTimeNumber is now " +targetTimeNumber);
			
			//var m = weightToLose/targetTimeNumber;
		
			/*
			myvariablefromphp = myURLLoader.data.variablefromphp;
			myvariable2 = myURLLoader.data.variable2;
			receivedUsername = myURLLoader.data.phpusername;
			receivedPassword = myURLLoader.data.phppassword;
			weightToLose = myURLLoader.data.weighttoloseinkg;
			currentWeight= myURLLoader.data.currentweightinkg;
			targetTimeNumber=myURLLoader.data.timetoloseweightinweeks;
			*/
			
			//ExternalInterface.call("actionScriptAlert", "nowTime is " +nowTime);
		
			var weightYouShouldHaveLost= ((nowTime - arrayOfGraphPoints[startPointForTarget].time)/(targetTimeNumber - arrayOfGraphPoints[startPointForTarget].time))*(arrayOfGraphPoints[startPointForTarget].weight - targetWeight);
			
			weightYouShouldBe=arrayOfGraphPoints[startPointForTarget].weight-weightYouShouldHaveLost;
			
			//ExternalInterface.call("actionScriptAlert", "weightYouShouldBe is " +weightYouShouldBe);
			
			showTestData();
			
			if(zoomingIn==false){
				drawZoomedOutGraph();
			}
			else{
				drawZoomedInGraph();
			}
			
			//var something = ExternalInterface.call("getSomethingFromJavaScript");
			
			
			
			
			var showTheOtherStuff = ExternalInterface.call("returnShowTheOtherStuff");
			//ExternalInterface.call("actionScriptAlert", "showTheOtherStuff is " +showTheOtherStuff);
			
			
			if(showTheOtherStuff==true){
				//ExternalInterface.call("actionScriptAlert", "Everything up to here is fine");
				if(numberOfGraphPoints>1){
					ExternalInterface.call("createZoomInOrOutButton");
				}
				var theyveEnteredTheirCurrentWeight = ExternalInterface.call("returnTheyveEnteredTheirCurrentWeight");
				
				//ExternalInterface.call("actionScriptAlert","target start date is " +arrayOfGraphPoints[startPointForTarget].dateString+ "and last weight date is " +arrayOfGraphPoints[numberOfGraphPoints-1].dateString);
				
				if(arrayOfGraphPoints[startPointForTarget].dateString!=arrayOfGraphPoints[numberOfGraphPoints-1].dateString){//if the day on which they entered their target is not the same as the day they entered their last weight 
					//ExternalInterface.call("actionScriptAlert", "We are here!");	
					
					ExternalInterface.call("showAccordingToYourTargetYouShouldBe");
					
					
					
					if(theyveEnteredTheirCurrentWeight){
						
						if(arrayOfGraphPoints[numberOfGraphPoints-1].weight>weightYouShouldBe){
							ExternalInterface.call("displayStatusVersusTarget","behind");
						}
						else if(arrayOfGraphPoints[numberOfGraphPoints-1].weight==weightYouShouldBe){
							ExternalInterface.call("displayStatusVersusTarget","on");
						}
						else if(arrayOfGraphPoints[numberOfGraphPoints-1].weight<weightYouShouldBe){
							ExternalInterface.call("displayStatusVersusTarget","ahead");
						}
						
						//ExternalInterface.call("actionScriptAlert", "We are here!!");
					}
				}
				else{
					
					ExternalInterface.call("showFirstDayMessage");
				}
				
				ExternalInterface.call("getTargetWeightTargetTimeAndLastWeightFromDatabase");
				ExternalInterface.call("showCurrentSuggestionsAndChangeTargetButtons");
			}
			
			pixelsPerWeightUnitZoomedOut=100.0/(arrayOfGraphPoints[0].weight - targetWeight);
			pixelsPerWeightUnitZoomedOut=Math.abs(pixelsPerWeightUnitZoomedOut);
			pixelsPerPreferredTimeUnitZoomedOut = xAxisLength/targetTimeNumber;
			
			var weightList = new Array();
			
			for(var i=0;i<numberOfGraphPoints;i++){
				weightList[i]= (Number)(arrayOfGraphPoints[i].weight);
			}
			
			weightList[numberOfGraphPoints]= weightYouShouldBe;
			
			var lowestWeightInList = 9999.0;
			
			for(var i=0;i<weightList.length;i++){
				if(weightList[i]<lowestWeightInList){
					lowestWeightInList = weightList[i];
				}
			}
			
			//ExternalInterface.call("actionScriptAlert('lowest weight in list is: " +lowestWeightInList+ "')");
			//ExternalInterface.call("actionScriptAlert('Length of weight list is " +weightList.length+ "')");
			
			pixelsPerWeightUnitZoomedIn=100.0/(arrayOfGraphPoints[0].weight - lowestWeightInList);
			pixelsPerWeightUnitZoomedIn=Math.abs(pixelsPerWeightUnitZoomedIn);
			pixelsPerPreferredTimeUnitZoomedIn = xAxisLength/nowTime;
		}

		
		public function returnWeightYouShouldBeByNow(){
			//ExternalInterface.call("actionScriptAlert","ActionScript function called!");
			return weightYouShouldBe;
		}
		
		public function drawGraph(){
			
			
			
			while(lengthOfYAxis/(pixelsPerWeightUnit*scalingIntervalNumber)<=minumumNumberOfDashesIWantOnYAxis&&scalingIntervalNumber>1){ 
				scalingIntervalNumber--;
			}
			while(lengthOfYAxis/(pixelsPerWeightUnit*scalingIntervalNumber)>=maximumNumberOfDashesIWantOnYAxis){
				scalingIntervalNumber++;
			}
			
			
			
			distanceBetweenXAxisDashesInPixels=pixelsPerPreferredTimeUnit;
			xAxisLabelString = preferredTimeUnits;
			
			//ExternalInterface.call("actionScriptAlert","xAxisLabelString is "+xAxisLabelString);
			
			var timeValueThatTheEndOfXAxisRepresents = xAxisLength/distanceBetweenXAxisDashesInPixels
			
			if(xAxisLabelString=="months"&&timeValueThatTheEndOfXAxisRepresents<1.0){
				distanceBetweenXAxisDashesInPixels=pixelsPerPreferredTimeUnit/4.34812141;
				xAxisLabelString="weeks";
			}
			
			if(xAxisLabelString=="weeks"&&timeValueThatTheEndOfXAxisRepresents<1.0){
				//ExternalInterface.call("actionScriptAlert('reached this point')");
				distanceBetweenXAxisDashesInPixels=pixelsPerPreferredTimeUnit/7.0;
				xAxisLabelString="days";
			}
			
			var numberOfDashesOnXAxis = xAxisLength / distanceBetweenXAxisDashesInPixels;
			
			
			if(xAxisLabelString=="days"&&numberOfDashesOnXAxis>maximumNumberOfDashesOnXAxis){
				distanceBetweenXAxisDashesInPixels=pixelsPerPreferredTimeUnit*7.0;
				xAxisLabelString="weeks";
			}
			
			if(xAxisLabelString=="weeks"&&numberOfDashesOnXAxis>maximumNumberOfDashesOnXAxis){
				distanceBetweenXAxisDashesInPixels=pixelsPerPreferredTimeUnit*4.34812141;
				xAxisLabelString="months";
			}
			
			this.yAxisSprite=new Sprite();
			this.yAxisSprite.graphics.lineStyle(axisLineThickness, axisLineColour);
			this.yAxisSprite.graphics.moveTo(axisOriginX, axisOriginY);   
			this.yAxisSprite.graphics.lineTo(topOfYAxisX,topOfYAxisY);
			this.addChild(yAxisSprite);
			
			this.xAxisSprite=new Sprite();
			this.xAxisSprite.graphics.lineStyle(axisLineThickness, axisLineColour);
			this.xAxisSprite.graphics.moveTo(axisOriginX, axisOriginY);   
			this.xAxisSprite.graphics.lineTo(endOfXAxisX,endOfXAxisY);
			this.addChild(xAxisSprite);
			
			this.nextNumberBelowCurrentWeight=((int)(arrayOfGraphPoints[0].weight/scalingIntervalNumber))*scalingIntervalNumber; //yes
			this.numberOfPixelsDownFromCurrentWeightDot=(arrayOfGraphPoints[0].weight-nextNumberBelowCurrentWeight)*pixelsPerWeightUnit;	
			
			
			
			var numberOfDashes = 6;
			
			var listOfSpritesBelow = new Array();
			var listOfTextFieldsBelow = new Array();
			
			for(var i=0;true;i++){
				//break out o f the loop when  you  go  past origin
				
				if((middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot + (scalingIntervalNumber*i*pixelsPerWeightUnit))>axisOriginY){
					break;
				}
				
				listOfSpritesBelow[i]=new Sprite();
				listOfSpritesBelow[i].graphics.lineStyle(axisLineThickness, axisLineColour);
				listOfSpritesBelow[i].graphics.moveTo(middleOfYAxisX, middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot + (scalingIntervalNumber*i*pixelsPerWeightUnit));
				listOfSpritesBelow[i].graphics.lineTo(middleOfYAxisX-dashLength, middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot + (scalingIntervalNumber*i*pixelsPerWeightUnit));
				this.addChild(listOfSpritesBelow[i]);
			
				listOfTextFieldsBelow[i] = new TextField();
				listOfTextFieldsBelow[i].width=500;
				listOfTextFieldsBelow[i].text=(String)(nextNumberBelowCurrentWeight-(scalingIntervalNumber*i));
				if(preferredWeightUnits=="St"){
					listOfTextFieldsBelow[i].text=int(listOfTextFieldsBelow[i].text/14)+"st "+Math.round((listOfTextFieldsBelow[i].text%14)*10)/10.0 +"lbs";
				}
				listOfTextFieldsBelow[i].x= ((middleOfYAxisX-dashLength)-16);
				listOfTextFieldsBelow[i].y= ((middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot + (scalingIntervalNumber*i*pixelsPerWeightUnit))-8);
				this.addChild(listOfTextFieldsBelow[i]);
				
				
				
			}
			
			
			var listOfSpritesAbove=new Array(); 
			var listOfTextFieldsAbove=new Array();
			
			
			//ExternalInterface.call("actionScriptAlert","middleOfYAxisY is " +middleOfYAxisY+", numberOfPixelsDownFromCurrentWeightDot is " + numberOfPixelsDownFromCurrentWeightDot + ", scalingIntervalNumber is " + scalingIntervalNumber + ", pixelsPerWeightUnit is " + pixelsPerWeightUnit + ", topOfYAxisY is " + topOfYAxisY);
			
			for(var i=1;true;i++){
				
				//break from the loop when you reach above top of Y axis
				
				if((middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot - (scalingIntervalNumber*i*pixelsPerWeightUnit))<topOfYAxisY){
					
					break;
				}
			
				listOfSpritesAbove[i]=new Sprite();
				listOfSpritesAbove[i].graphics.lineStyle(axisLineThickness, axisLineColour);
				listOfSpritesAbove[i].graphics.moveTo(middleOfYAxisX, middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot - (scalingIntervalNumber*i*pixelsPerWeightUnit));
				listOfSpritesAbove[i].graphics.lineTo(middleOfYAxisX-dashLength, middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot - (scalingIntervalNumber*i*pixelsPerWeightUnit));
				this.addChild(listOfSpritesAbove[i]);
			
				listOfTextFieldsAbove[i]= new TextField();
				listOfTextFieldsAbove[i].width=500;
				listOfTextFieldsAbove[i].text=(String)(nextNumberBelowCurrentWeight+(scalingIntervalNumber*i));
				if(preferredWeightUnits=="St"){
					listOfTextFieldsAbove[i].text=int(listOfTextFieldsAbove[i].text/14)+"st "+Math.round((listOfTextFieldsAbove[i].text%14)*10)/10.0 +"lbs";
				}
				listOfTextFieldsAbove[i].x= ((middleOfYAxisX-dashLength)-16);
				listOfTextFieldsAbove[i].y= ((middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot - (scalingIntervalNumber*i*pixelsPerWeightUnit))-8);
				this.addChild(listOfTextFieldsAbove[i]);
				
			
			
			}
			
			
			
			var weightYouShouldHaveLostAtEndOfXAxis= (((xAxisLength/pixelsPerPreferredTimeUnit) - arrayOfGraphPoints[startPointForTarget].time)/(targetTimeNumber - arrayOfGraphPoints[startPointForTarget].time))*(arrayOfGraphPoints[startPointForTarget].weight - targetWeight);
			var weightYouShouldBeAtEndOfXAxis=arrayOfGraphPoints[startPointForTarget].weight-weightYouShouldHaveLostAtEndOfXAxis;
			
			var numberOfPixelsWeightYouShouldBeAtEndOfXAxisIsBelowFirstWeight= (arrayOfGraphPoints[0].weight-weightYouShouldBeAtEndOfXAxis)*pixelsPerWeightUnit;
			
			
			
			
			nowArrowSpriteXPositionPixels= 50.0 + (nowTime*(pixelsPerPreferredTimeUnit));
			
			var nowArrowSprite = new Sprite();
			nowArrowSprite.graphics.lineStyle(nowArrowThickness, nowColour);
			nowArrowSprite.graphics.moveTo(nowArrowSpriteXPositionPixels, axisOriginY);
			nowArrowSprite.graphics.lineTo(nowArrowSpriteXPositionPixels, axisOriginY+nowArrowLength);
			nowArrowSprite.graphics.moveTo(nowArrowSpriteXPositionPixels, axisOriginY);
			nowArrowSprite.graphics.lineTo(nowArrowSpriteXPositionPixels-5, axisOriginY+5);
			nowArrowSprite.graphics.moveTo(nowArrowSpriteXPositionPixels, axisOriginY);
			nowArrowSprite.graphics.lineTo(nowArrowSpriteXPositionPixels+5, axisOriginY+5);
			this.addChild(nowArrowSprite);
			
			
			var nowLabel:TextField = new TextField();
			nowLabel.width=500;
			nowLabel.text="Now";
			nowLabel.textColor=nowColour;
			nowLabel.x= nowArrowSpriteXPositionPixels-11;
			nowLabel.y= axisOriginY+nowArrowLength-2;
			var textFormatForNowLabel:TextFormat=new TextFormat();
			textFormatForNowLabel.size=16;
			textFormatForNowLabel.bold=true;
			nowLabel.setTextFormat(textFormatForNowLabel);
			this.addChild(nowLabel);
			
			
			var dashesXAxis = new Array();
			var textFieldsXAxis = new Array();

			
			for(var i=0; axisOriginX+distanceBetweenXAxisDashesInPixels*i<targetTimeXPosition; i++){
			
				
				dashesXAxis[i] = new Sprite();
				dashesXAxis[i].graphics.lineStyle(axisLineThickness, axisLineColour);
				dashesXAxis[i].graphics.moveTo(axisOriginX+distanceBetweenXAxisDashesInPixels*i, axisOriginY);
				dashesXAxis[i].graphics.lineTo(axisOriginX+distanceBetweenXAxisDashesInPixels*i, axisOriginY+dashLength);
				this.addChild(dashesXAxis[i]);
			
				textFieldsXAxis[i] = new TextField();
				textFieldsXAxis[i].width=500;
				textFieldsXAxis[i].text=i;
				textFieldsXAxis[i].x= axisOriginX+distanceBetweenXAxisDashesInPixels*i-4;
				textFieldsXAxis[i].y= axisOriginY+3;
				this.addChild(textFieldsXAxis[i]);
		
			
			}
			
			var xAxisLabel:TextField = new TextField();
			xAxisLabel.width=500;
			xAxisLabel.text=xAxisLabelString;
			xAxisLabel.x= 200;
			xAxisLabel.y= axisOriginY+30;
			this.addChild(xAxisLabel);
			
			var yAxisLabel:TextField = new TextField();
			yAxisLabel.width=500;
			if(preferredWeightUnits=="St"){  //This is until stones are handled correctly!!!!!
				yAxisLabel.text="";
			}
			else{
				yAxisLabel.text=preferredWeightUnits;
			}
			yAxisLabel.x= topOfYAxisX-37;
			yAxisLabel.y= topOfYAxisY-15;
			this.addChild(yAxisLabel);
			
			var currentWeightLabel:TextField = new TextField();
			currentWeightLabel.width=500;
			if(preferredWeightUnits=="St"){
				currentWeightLabel.text=int(arrayOfGraphPoints[0].weight/14) + "st " + Math.round((arrayOfGraphPoints[0].weight%14)*10)/10.0 + "lbs";
			}
			else{
				currentWeightLabel.text=Math.round(arrayOfGraphPoints[0].weight*10)/10.0 + preferredWeightUnits;
			}
			currentWeightLabel.x= middleOfYAxisX-48;
			currentWeightLabel.y= middleOfYAxisY-15;
			currentWeightLabel.textColor=circleFillColour;
			var textFormat:TextFormat=new TextFormat();
			textFormat.size=16;
			currentWeightLabel.setTextFormat(textFormat);
			this.addChild(currentWeightLabel);
			
			for(var i=0;i<numberOfGraphPoints;i++){
			
				arrayOfGraphPoints[i].yPositionPixels= 180.0 - ((arrayOfGraphPoints[i].weight-arrayOfGraphPoints[0].weight)*(pixelsPerWeightUnit));
				arrayOfGraphPoints[i].xPositionPixels= 50.0 + (arrayOfGraphPoints[i].time*(pixelsPerPreferredTimeUnit));
			
				
				
				this.arrayOfGraphPoints[i].sprite=new Sprite();
				this.arrayOfGraphPoints[i].sprite.graphics.lineStyle(circleLineThickness, circleLineColour);
				this.arrayOfGraphPoints[i].sprite.graphics.beginFill(circleFillColour);
					this.arrayOfGraphPoints[i].sprite.graphics.drawCircle(arrayOfGraphPoints[i].xPositionPixels, arrayOfGraphPoints[i].yPositionPixels, dotRadiusInPixels);
				this.arrayOfGraphPoints[i].sprite.graphics.endFill();
				this.addChild(arrayOfGraphPoints[i].sprite);
				
				var lineSprite = new Sprite();
				lineSprite.graphics.lineStyle(graphLineThickness, circleLineColour);
				lineSprite.graphics.moveTo(arrayOfGraphPoints[i].xPositionPixels, arrayOfGraphPoints[i].yPositionPixels)
				
				if(i>=1){
					lineSprite.graphics.lineTo(arrayOfGraphPoints[i-1].xPositionPixels, arrayOfGraphPoints[i-1].yPositionPixels)
				}
				this.addChild(lineSprite);
			
			}
			
			//dashed line code
			var dashedLineSprite = new Sprite();
			dashedLineSprite.graphics.lineStyle(circleLineThickness, targetColour);
			this.dashLine(dashedLineSprite.graphics, targetTimeXPosition, middleOfYAxisY+numberOfPixelsWeightYouShouldBeAtEndOfXAxisIsBelowFirstWeight, arrayOfGraphPoints[startPointForTarget].xPositionPixels, arrayOfGraphPoints[startPointForTarget].yPositionPixels, 7, 3);
			this.addChild(dashedLineSprite);
			
			
			
		}
		
		
		public function drawZoomedInGraph(){
			
		
			pixelsPerPreferredTimeUnit = xAxisLength/nowTime;
			distanceBetweenXAxisDashesInPixels=pixelsPerPreferredTimeUnit;
			xAxisLabelString = preferredTimeUnits;
			
			var timeValueThatTheEndOfXAxisRepresents = xAxisLength/distanceBetweenXAxisDashesInPixels
			
			if(xAxisLabelString=="months"&&timeValueThatTheEndOfXAxisRepresents<1.0){
				distanceBetweenXAxisDashesInPixels=pixelsPerPreferredTimeUnit/4.34812141;
				xAxisLabelString="weeks";
			}
			
			if(xAxisLabelString=="weeks"&&timeValueThatTheEndOfXAxisRepresents<1.0){
				//ExternalInterface.call("actionScriptAlert('reached this point')");
				distanceBetweenXAxisDashesInPixels=pixelsPerPreferredTimeUnit/7.0;
				xAxisLabelString="days";
			}
			
			
			var numberOfDashesOnXAxis = xAxisLength / distanceBetweenXAxisDashesInPixels;
			
			if(xAxisLabelString=="days"&&numberOfDashesOnXAxis>maximumNumberOfDashesOnXAxis){
				distanceBetweenXAxisDashesInPixels=pixelsPerPreferredTimeUnit*7.0;
				xAxisLabelString="weeks";
			}
			
			if(xAxisLabelString=="weeks"&&numberOfDashesOnXAxis>maximumNumberOfDashesOnXAxis){
				distanceBetweenXAxisDashesInPixels=pixelsPerPreferredTimeUnit*4.34812141;
				xAxisLabelString="months";
			}
			
			
			
			this.yAxisSprite=new Sprite();
			this.yAxisSprite.graphics.lineStyle(axisLineThickness, axisLineColour);
			this.yAxisSprite.graphics.moveTo(axisOriginX, axisOriginY);   
			this.yAxisSprite.graphics.lineTo(topOfYAxisX,topOfYAxisY);
			this.addChild(yAxisSprite);
			
			this.xAxisSprite=new Sprite();
			this.xAxisSprite.graphics.lineStyle(axisLineThickness, axisLineColour);
			this.xAxisSprite.graphics.moveTo(axisOriginX, axisOriginY);   
			this.xAxisSprite.graphics.lineTo(endOfXAxisX,endOfXAxisY);
			this.addChild(xAxisSprite);
			
			var weightList = new Array();
			
			for(var i=0;i<numberOfGraphPoints;i++){
				weightList[i]= (Number)(arrayOfGraphPoints[i].weight);
			}
			
			weightList[numberOfGraphPoints]= weightYouShouldBe;
			
			var lowestWeightInList = 9999.0;
			
			for(var i=0;i<weightList.length;i++){
				if(weightList[i]<lowestWeightInList){
					lowestWeightInList = weightList[i];
				}
			}
			
			//ExternalInterface.call("actionScriptAlert('lowest weight in list is: " +lowestWeightInList+ "')");
			//ExternalInterface.call("actionScriptAlert('Length of weight list is " +weightList.length+ "')");
			
			pixelsPerWeightUnit=100.0/(arrayOfGraphPoints[0].weight - lowestWeightInList);
			pixelsPerWeightUnit=Math.abs(pixelsPerWeightUnit);
			
			while(lengthOfYAxis/(pixelsPerWeightUnit*scalingIntervalNumber)<=minumumNumberOfDashesIWantOnYAxis&&scalingIntervalNumber>1){
				scalingIntervalNumber--;
			}
			while(lengthOfYAxis/(pixelsPerWeightUnit*scalingIntervalNumber)>=maximumNumberOfDashesIWantOnYAxis){
				scalingIntervalNumber++;
			}
			
			this.nextNumberBelowCurrentWeight=((int)(arrayOfGraphPoints[0].weight/scalingIntervalNumber))*scalingIntervalNumber; //yes
			this.numberOfPixelsDownFromCurrentWeightDot=(arrayOfGraphPoints[0].weight-nextNumberBelowCurrentWeight)*pixelsPerWeightUnit;
			
			
			
			var numberOfDashes = 6;
			
			var listOfSpritesBelow = new Array();
			var listOfTextFieldsBelow = new Array();
			
			for(var i=0;true;i++){
				//break out o f the loop when  you  go  past origin
				
				if((middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot + (scalingIntervalNumber*i*pixelsPerWeightUnit))>axisOriginY){
					break;
				}
				
				listOfSpritesBelow[i]=new Sprite();
				listOfSpritesBelow[i].graphics.lineStyle(axisLineThickness, axisLineColour);
				listOfSpritesBelow[i].graphics.moveTo(middleOfYAxisX, middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot + (scalingIntervalNumber*i*pixelsPerWeightUnit));
				listOfSpritesBelow[i].graphics.lineTo(middleOfYAxisX-dashLength, middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot + (scalingIntervalNumber*i*pixelsPerWeightUnit));
				this.addChild(listOfSpritesBelow[i]);
			
				listOfTextFieldsBelow[i] = new TextField();
				listOfTextFieldsBelow[i].width=500;
				listOfTextFieldsBelow[i].text=(String)(nextNumberBelowCurrentWeight-(scalingIntervalNumber*i));
				if(preferredWeightUnits=="St"){
					listOfTextFieldsBelow[i].text=int(listOfTextFieldsBelow[i].text/14)+"st "+Math.round((listOfTextFieldsBelow[i].text%14)*10)/10.0 +"lbs";
				}
				listOfTextFieldsBelow[i].x= ((middleOfYAxisX-dashLength)-16);
				listOfTextFieldsBelow[i].y= ((middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot + (scalingIntervalNumber*i*pixelsPerWeightUnit))-8);
				this.addChild(listOfTextFieldsBelow[i]);
				
				
				
			}
			
			var listOfSpritesAbove=new Array(); 
			var listOfTextFieldsAbove=new Array();
			
			
			for(var i=1;true;i++){
				
				//break from the loop when you reach above top of Y axis
				
				if((middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot - (scalingIntervalNumber*i*pixelsPerWeightUnit))<topOfYAxisY){
					break;
				}
			
				listOfSpritesAbove[i]=new Sprite();
				listOfSpritesAbove[i].graphics.lineStyle(axisLineThickness, axisLineColour);
				listOfSpritesAbove[i].graphics.moveTo(middleOfYAxisX, middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot - (scalingIntervalNumber*i*pixelsPerWeightUnit));
				listOfSpritesAbove[i].graphics.lineTo(middleOfYAxisX-dashLength, middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot - (scalingIntervalNumber*i*pixelsPerWeightUnit));
				this.addChild(listOfSpritesAbove[i]);
			
				listOfTextFieldsAbove[i]= new TextField();
				listOfTextFieldsAbove[i].width=500;
				listOfTextFieldsAbove[i].text=(String)(nextNumberBelowCurrentWeight+(scalingIntervalNumber*i));
				if(preferredWeightUnits=="St"){
					listOfTextFieldsAbove[i].text=int(listOfTextFieldsAbove[i].text/14)+"st "+Math.round((listOfTextFieldsAbove[i].text%14)*10)/10.0 +"lbs";
				}
				listOfTextFieldsAbove[i].x= ((middleOfYAxisX-dashLength)-16);
				listOfTextFieldsAbove[i].y= ((middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot - (scalingIntervalNumber*i*pixelsPerWeightUnit))-8);
				this.addChild(listOfTextFieldsAbove[i]);
			
			
			}
			
			
			var numberOfPixelsWeightYouShouldBeIsBelowFirstWeight= (arrayOfGraphPoints[0].weight-weightYouShouldBe)*pixelsPerWeightUnit;
		
			
			nowArrowSpriteXPositionPixels= 400;
			
			var nowArrowSprite = new Sprite();
			nowArrowSprite.graphics.lineStyle(nowArrowThickness, nowColour);
			nowArrowSprite.graphics.moveTo(nowArrowSpriteXPositionPixels, axisOriginY);
			nowArrowSprite.graphics.lineTo(nowArrowSpriteXPositionPixels, axisOriginY+nowArrowLength);
			nowArrowSprite.graphics.moveTo(nowArrowSpriteXPositionPixels, axisOriginY);
			nowArrowSprite.graphics.lineTo(nowArrowSpriteXPositionPixels-5, axisOriginY+5);
			nowArrowSprite.graphics.moveTo(nowArrowSpriteXPositionPixels, axisOriginY);
			nowArrowSprite.graphics.lineTo(nowArrowSpriteXPositionPixels+5, axisOriginY+5);
			this.addChild(nowArrowSprite);
			
			
			var nowLabel:TextField = new TextField();
			nowLabel.width=500;
			nowLabel.text="Now";
			nowLabel.textColor=nowColour;
			nowLabel.x= nowArrowSpriteXPositionPixels-11;
			nowLabel.y= axisOriginY+nowArrowLength-2;
			var textFormatForNowLabel:TextFormat=new TextFormat();
			textFormatForNowLabel.size=16;
			textFormatForNowLabel.bold=true;
			nowLabel.setTextFormat(textFormatForNowLabel);
			this.addChild(nowLabel);
		
			var dashesXAxis = new Array();
			var textFieldsXAxis = new Array();

			
			for(var i=0; axisOriginX+distanceBetweenXAxisDashesInPixels*i<targetTimeXPosition; i++){
			
				
				dashesXAxis[i] = new Sprite();
				dashesXAxis[i].graphics.lineStyle(axisLineThickness, axisLineColour);
				dashesXAxis[i].graphics.moveTo(axisOriginX+distanceBetweenXAxisDashesInPixels*i, axisOriginY);
				dashesXAxis[i].graphics.lineTo(axisOriginX+distanceBetweenXAxisDashesInPixels*i, axisOriginY+dashLength);
				this.addChild(dashesXAxis[i]);
			
				textFieldsXAxis[i] = new TextField();
				textFieldsXAxis[i].width=500;
				textFieldsXAxis[i].text=i;
				textFieldsXAxis[i].x= axisOriginX+distanceBetweenXAxisDashesInPixels*i-4;
				textFieldsXAxis[i].y= axisOriginY+3;
				this.addChild(textFieldsXAxis[i]);
		
			
			}
			
			var xAxisLabel:TextField = new TextField();
			xAxisLabel.width=500;
			xAxisLabel.text=xAxisLabelString;
			xAxisLabel.x= 200;
			xAxisLabel.y= axisOriginY+30;
			this.addChild(xAxisLabel);
			
			var yAxisLabel:TextField = new TextField();
			yAxisLabel.width=500;
			if(preferredWeightUnits=="St"){  //This is until stones are handled correctly!!!!!
				yAxisLabel.text="";
			}
			else{
				yAxisLabel.text=preferredWeightUnits;
			}
			yAxisLabel.x= topOfYAxisX-37;
			yAxisLabel.y= topOfYAxisY-15;
			this.addChild(yAxisLabel);
			
			var currentWeightLabel:TextField = new TextField();
			currentWeightLabel.width=500;
			if(preferredWeightUnits=="St"){
				currentWeightLabel.text=int(arrayOfGraphPoints[0].weight/14) + "st " + Math.round((arrayOfGraphPoints[0].weight%14)*10)/10.0 + "lbs";
			}
			else{
				currentWeightLabel.text=Math.round(arrayOfGraphPoints[0].weight*10)/10.0 + preferredWeightUnits;
			}
			currentWeightLabel.x= middleOfYAxisX-48;
			currentWeightLabel.y= middleOfYAxisY-15;
			currentWeightLabel.textColor=circleFillColour;
			var textFormat:TextFormat=new TextFormat();
			textFormat.size=16;
			currentWeightLabel.setTextFormat(textFormat);
			this.addChild(currentWeightLabel);
			
			for(var i=0;i<numberOfGraphPoints;i++){
			
				arrayOfGraphPoints[i].yPositionPixels= 180.0 - ((arrayOfGraphPoints[i].weight-arrayOfGraphPoints[0].weight)*(pixelsPerWeightUnit));
				arrayOfGraphPoints[i].xPositionPixels= 50.0 + (arrayOfGraphPoints[i].time*(pixelsPerPreferredTimeUnit));
			
				this.arrayOfGraphPoints[i].sprite=new Sprite();
				this.arrayOfGraphPoints[i].sprite.graphics.lineStyle(circleLineThickness, circleLineColour);
				this.arrayOfGraphPoints[i].sprite.graphics.beginFill(circleFillColour);
					this.arrayOfGraphPoints[i].sprite.graphics.drawCircle(arrayOfGraphPoints[i].xPositionPixels, arrayOfGraphPoints[i].yPositionPixels, dotRadiusInPixels);
				this.arrayOfGraphPoints[i].sprite.graphics.endFill();
				this.addChild(arrayOfGraphPoints[i].sprite);
				
				var lineSprite = new Sprite();
				lineSprite.graphics.lineStyle(graphLineThickness, circleLineColour);
				lineSprite.graphics.moveTo(arrayOfGraphPoints[i].xPositionPixels, arrayOfGraphPoints[i].yPositionPixels)
				
				if(i>=1){
					lineSprite.graphics.lineTo(arrayOfGraphPoints[i-1].xPositionPixels, arrayOfGraphPoints[i-1].yPositionPixels)
				}
				this.addChild(lineSprite);
			
			
			}
			
			//dashed line code
			var dashedLineSprite = new Sprite();
			dashedLineSprite.graphics.lineStyle(circleLineThickness, targetColour);
			this.dashLine(dashedLineSprite.graphics, targetTimeXPosition, middleOfYAxisY+numberOfPixelsWeightYouShouldBeIsBelowFirstWeight, arrayOfGraphPoints[startPointForTarget].xPositionPixels, arrayOfGraphPoints[startPointForTarget].yPositionPixels, 7, 3);
			this.addChild(dashedLineSprite);
			
			
		}
		
		public function drawZoomedOutGraph(){
			
			//ExternalInterface.call("actionScriptAlert","reached here ok");
			
			pixelsPerWeightUnit=100.0/(arrayOfGraphPoints[0].weight - targetWeight);
			pixelsPerWeightUnit=Math.abs(pixelsPerWeightUnit);
			pixelsPerPreferredTimeUnit = xAxisLength/targetTimeNumber;
			
			while(lengthOfYAxis/(pixelsPerWeightUnit*scalingIntervalNumber)<=minumumNumberOfDashesIWantOnYAxis&&scalingIntervalNumber>1){
				scalingIntervalNumber--;
			}
			while(lengthOfYAxis/(pixelsPerWeightUnit*scalingIntervalNumber)>=maximumNumberOfDashesIWantOnYAxis){
				scalingIntervalNumber++;
			}
			
			//ExternalInterface.call("actionScriptAlert","reached point 2 ok");
			
			distanceBetweenXAxisDashesInPixels=pixelsPerPreferredTimeUnit;
			
			//ExternalInterface.call("actionScriptAlert","distanceBetweenXAxisDashesInPixels is " +distanceBetweenXAxisDashesInPixels);
			
			xAxisLabelString = preferredTimeUnits;
			
			//ExternalInterface.call("actionScriptAlert","preferredTimeUnits, and xAxisLabelString is "+xAxisLabelString);
			var lastXAxisDashLabelValue = targetTimeNumber;
			
			if(xAxisLabelString=="months"&&xAxisLength/distanceBetweenXAxisDashesInPixels<1.0){
				distanceBetweenXAxisDashesInPixels=pixelsPerPreferredTimeUnit/4.34812141;
				lastXAxisDashLabelValue = targetTimeNumber*4.34812141;
				xAxisLabelString="weeks";
			}
			
			
			
			if(xAxisLabelString=="weeks"&&xAxisLength/distanceBetweenXAxisDashesInPixels<1.0){
				//ExternalInterface.call("actionScriptAlert","reached this point");
				distanceBetweenXAxisDashesInPixels=pixelsPerPreferredTimeUnit/7.0;
				lastXAxisDashLabelValue = targetTimeNumber*7.0;
				xAxisLabelString="days";
			}
			
			var numberOfDashesOnXAxis = xAxisLength / distanceBetweenXAxisDashesInPixels;
			
			if(xAxisLabelString=="days"&&numberOfDashesOnXAxis>maximumNumberOfDashesOnXAxis){
				distanceBetweenXAxisDashesInPixels=pixelsPerPreferredTimeUnit*7.0;
				lastXAxisDashLabelValue = targetTimeNumber/7.0;
				xAxisLabelString="weeks";
			}
			
			//ExternalInterface.call("actionScriptAlert","the numberOfDashesOnXAxis is " +numberOfDashesOnXAxis);
			
			if(xAxisLabelString=="weeks"&&numberOfDashesOnXAxis>maximumNumberOfDashesOnXAxis){
				distanceBetweenXAxisDashesInPixels=pixelsPerPreferredTimeUnit*4.34812141;
				lastXAxisDashLabelValue = targetTimeNumber/4.34812141;
				xAxisLabelString="months";
			}
			
			//ExternalInterface.call("actionScriptAlert","xAxisLabelString is now "+xAxisLabelString);
			
			lastXAxisDashLabelValue*=10.0;
			lastXAxisDashLabelValue=Math.round(lastXAxisDashLabelValue);
			lastXAxisDashLabelValue/=10.0;
			
			//ExternalInterface.call("actionScriptAlert", "pixelsPerWeightUnit is "+pixelsPerWeightUnit+", pixelsPerPreferredTimeUnit is "+pixelsPerPreferredTimeUnit);
			
			
			//do stuff
			
			/*
			var myTextField:TextField = new TextField();
			myTextField.width=500;
			myTextField.text="nextNumberBelowCurrentWeight";
			myTextField.x=60;
			myTextField.y=200;
			this.addChild(myTextField);
			*/
			
			//this.graphics.lineStyle(1, 0x000000);			
			//this.graphics.beginFill(0xFF00FF);
			//this.graphics.drawEllipse(100,200,123,238);
			
			this.yAxisSprite=new Sprite();
			this.yAxisSprite.graphics.lineStyle(axisLineThickness, axisLineColour);
			this.yAxisSprite.graphics.moveTo(axisOriginX, axisOriginY);   
			this.yAxisSprite.graphics.lineTo(topOfYAxisX,topOfYAxisY);
			this.addChild(yAxisSprite);
			
			this.xAxisSprite=new Sprite();
			this.xAxisSprite.graphics.lineStyle(axisLineThickness, axisLineColour);
			this.xAxisSprite.graphics.moveTo(axisOriginX, axisOriginY);   
			this.xAxisSprite.graphics.lineTo(endOfXAxisX,endOfXAxisY);
			this.addChild(xAxisSprite);
			
			/*
			this.targetWeightLineSprite=new Sprite();
			this.targetWeightLineSprite.graphics.lineStyle(axisLineThickness, 0xFF0000);
			this.targetWeightLineSprite.graphics.moveTo(middleOfYAxisX, middleOfYAxisY+100);
			this.targetWeightLineSprite.graphics.lineTo(targetTimeXPosition, middleOfYAxisY + 100);
			this.addChild(targetWeightLineSprite);
			*/
			
			
			
			this.nextNumberBelowCurrentWeight=((int)(arrayOfGraphPoints[0].weight/scalingIntervalNumber))*scalingIntervalNumber;
			this.numberOfPixelsDownFromCurrentWeightDot=(arrayOfGraphPoints[0].weight-nextNumberBelowCurrentWeight)*pixelsPerWeightUnit;
			
			//ExternalInterface.call("actionScriptAlert", "nextNumberBelowCurrentWeight is " + nextNumberBelowCurrentWeight + ", numberOfPixelsDownFromCurrentWeightDot is " +numberOfPixelsDownFromCurrentWeightDot+ ", scaling interval number is " + scalingIntervalNumber);
			
			/*
			this.firstMarkingYAxis=new Sprite();
			this.firstMarkingYAxis.graphics.lineStyle(axisLineThickness, axisLineColour);
			this.firstMarkingYAxis.graphics.moveTo(middleOfYAxisX, middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot);
			this.firstMarkingYAxis.graphics.lineTo(dashStart, middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot);
			this.addChild(firstMarkingYAxis);
			
			var myTextField:TextField = new TextField();
			myTextField.width=500;
			myTextField.text=nextNumberBelowCurrentWeight;
			myTextField.x= (dashStart-16);
			myTextField.y= ((middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot)-8);
			this.addChild(myTextField);
			
			var secondMarkingYAxis=new Sprite();
			secondMarkingYAxis.graphics.lineStyle(axisLineThickness, axisLineColour);
			secondMarkingYAxis.graphics.moveTo(middleOfYAxisX, middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot + (scalingIntervalNumber*pixelsPerWeightUnit));
			secondMarkingYAxis.graphics.lineTo(dashStart, middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot + (scalingIntervalNumber*pixelsPerWeightUnit));
			this.addChild(secondMarkingYAxis);
			
			var myTextField2:TextField = new TextField();
			myTextField2.width=500;
			myTextField2.text=(String)(nextNumberBelowCurrentWeight-scalingIntervalNumber);
			myTextField2.x= (dashStart-16);
			myTextField2.y= ((middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot + (scalingIntervalNumber*pixelsPerWeightUnit))-8);
			this.addChild(myTextField2);
			
			
			var thirdMarkingYAxis=new Sprite();
			thirdMarkingYAxis.graphics.lineStyle(axisLineThickness, axisLineColour);
			thirdMarkingYAxis.graphics.moveTo(middleOfYAxisX, middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot + (scalingIntervalNumber*2*pixelsPerWeightUnit));
			thirdMarkingYAxis.graphics.lineTo(dashStart, middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot + (scalingIntervalNumber*2*pixelsPerWeightUnit));
			this.addChild(thirdMarkingYAxis);
			
			var myTextField3:TextField = new TextField();
			myTextField3.width=500;
			myTextField3.text=(String)(nextNumberBelowCurrentWeight-(scalingIntervalNumber*2));
			myTextField3.x= (dashStart-16);
			myTextField3.y= ((middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot + (scalingIntervalNumber*2*pixelsPerWeightUnit))-8);
			this.addChild(myTextField3);
			
			*/
			
			/*
			var firstOneAboveCurrentWeightMarking=new Sprite();
			firstOneAboveCurrentWeightMarking.graphics.lineStyle(axisLineThickness, axisLineColour);
			firstOneAboveCurrentWeightMarking.graphics.moveTo(middleOfYAxisX, middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot - (scalingIntervalNumber*pixelsPerWeightUnit));
			firstOneAboveCurrentWeightMarking.graphics.lineTo(dashStart, middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot - (scalingIntervalNumber*pixelsPerWeightUnit));
			this.addChild(firstOneAboveCurrentWeightMarking);
			
			var myTextField4:TextField = new TextField();
			myTextField4.width=500;
			myTextField4.text=(String)(nextNumberBelowCurrentWeight+scalingIntervalNumber);
			myTextField4.x= (dashStart-16);
			myTextField4.y= ((middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot - (scalingIntervalNumber*pixelsPerWeightUnit))-8);
			this.addChild(myTextField4);
			
			var secondOneAboveCurrentWeightMarking=new Sprite();
			secondOneAboveCurrentWeightMarking.graphics.lineStyle(axisLineThickness, axisLineColour);
			secondOneAboveCurrentWeightMarking.graphics.moveTo(middleOfYAxisX, middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot - (scalingIntervalNumber*2*pixelsPerWeightUnit));
			secondOneAboveCurrentWeightMarking.graphics.lineTo(dashStart, middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot - (scalingIntervalNumber*2*pixelsPerWeightUnit));
			this.addChild(secondOneAboveCurrentWeightMarking);
			
			var myTextField5:TextField = new TextField();
			myTextField5.width=500;
			myTextField5.text=(String)(nextNumberBelowCurrentWeight+(scalingIntervalNumber*2));
			myTextField5.x= (dashStart-16);
			myTextField5.y= ((middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot - (scalingIntervalNumber*2*pixelsPerWeightUnit))-8);
			this.addChild(myTextField5);
			*/
			
			//THE FOR LOOPS FOR THESE ARE:.....
			
			var numberOfDashes = 6;
			
			var listOfSpritesBelow = new Array();
			var listOfTextFieldsBelow = new Array();
			
			for(var i=0;true;i++){
				//break out o f the loop when  you  go  past origin
				
				if((middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot + (scalingIntervalNumber*i*pixelsPerWeightUnit))>axisOriginY){
					break;
				}
				
				listOfSpritesBelow[i]=new Sprite();
				listOfSpritesBelow[i].graphics.lineStyle(axisLineThickness, axisLineColour);
				listOfSpritesBelow[i].graphics.moveTo(middleOfYAxisX, middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot + (scalingIntervalNumber*i*pixelsPerWeightUnit));
				listOfSpritesBelow[i].graphics.lineTo(middleOfYAxisX-dashLength, middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot + (scalingIntervalNumber*i*pixelsPerWeightUnit));
				this.addChild(listOfSpritesBelow[i]);
			
				listOfTextFieldsBelow[i] = new TextField();
				listOfTextFieldsBelow[i].width=500;
				listOfTextFieldsBelow[i].text=(String)(nextNumberBelowCurrentWeight-(scalingIntervalNumber*i));
				if(preferredWeightUnits=="St"){
					listOfTextFieldsBelow[i].text=int(listOfTextFieldsBelow[i].text/14)+"st "+Math.round((listOfTextFieldsBelow[i].text%14)*10)/10.0 +"lbs";
				}
				listOfTextFieldsBelow[i].x= ((middleOfYAxisX-dashLength)-16);
				listOfTextFieldsBelow[i].y= ((middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot + (scalingIntervalNumber*i*pixelsPerWeightUnit))-8);
				this.addChild(listOfTextFieldsBelow[i]);
				
				
				
			}
			
			var listOfSpritesAbove=new Array(); 
			var listOfTextFieldsAbove=new Array();
			
			
			for(var i=1;true;i++){
				
				//break from the loop when you reach above top of Y axis
				
				if((middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot - (scalingIntervalNumber*i*pixelsPerWeightUnit))<topOfYAxisY){
					break;
				}
			
				listOfSpritesAbove[i]=new Sprite();
				listOfSpritesAbove[i].graphics.lineStyle(axisLineThickness, axisLineColour);
				listOfSpritesAbove[i].graphics.moveTo(middleOfYAxisX, middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot - (scalingIntervalNumber*i*pixelsPerWeightUnit));
				listOfSpritesAbove[i].graphics.lineTo(middleOfYAxisX-dashLength, middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot - (scalingIntervalNumber*i*pixelsPerWeightUnit));
				this.addChild(listOfSpritesAbove[i]);
			
				listOfTextFieldsAbove[i]= new TextField();
				listOfTextFieldsAbove[i].width=500;
				listOfTextFieldsAbove[i].text=(String)(nextNumberBelowCurrentWeight+(scalingIntervalNumber*i));
				if(preferredWeightUnits=="St"){
					listOfTextFieldsAbove[i].text=int(listOfTextFieldsAbove[i].text/14)+"st "+Math.round((listOfTextFieldsAbove[i].text%14)*10)/10.0 +"lbs";
				}
				listOfTextFieldsAbove[i].x= ((middleOfYAxisX-dashLength)-16);
				listOfTextFieldsAbove[i].y= ((middleOfYAxisY+numberOfPixelsDownFromCurrentWeightDot - (scalingIntervalNumber*i*pixelsPerWeightUnit))-8);
				this.addChild(listOfTextFieldsAbove[i]);
			
			
			}
			
			
			
			
			
			var xAxisTargetMark = new Sprite();
			xAxisTargetMark.graphics.lineStyle(axisLineThickness, axisLineColour);
			xAxisTargetMark.graphics.moveTo(targetTimeXPosition, axisOriginY);
			xAxisTargetMark.graphics.lineTo(targetTimeXPosition, axisOriginY+dashLength);
			this.addChild(xAxisTargetMark);
			
			
			targetWeightDotYPosition = 180.0 - ((targetWeight-arrayOfGraphPoints[0].weight)*(pixelsPerWeightUnit));
			targetWeightDotXPosition = targetTimeXPosition;
			
			
			this.targetWeightDotSprite=new Sprite();
			this.targetWeightDotSprite.graphics.lineStyle(circleLineThickness, targetColour);
			this.targetWeightDotSprite.graphics.beginFill(targetColour);
				this.targetWeightDotSprite.graphics.drawCircle(targetWeightDotXPosition, targetWeightDotYPosition, dotRadiusInPixels);
			this.targetWeightDotSprite.graphics.endFill();
			this.addChild(targetWeightDotSprite);
			
			
			var targetTimeLabel:TextField = new TextField();
			targetTimeLabel.width=500;
			//targetTimeLabel.textColor=targetColour;
			//targetTimeLabel.text=lastXAxisDashLabelValue+ " " + xAxisLabelString;
			if(startPointForTarget==0){
				targetTimeLabel.text=lastXAxisDashLabelValue+ " " + xAxisLabelString;
			}
			else{
				targetTimeLabel.text=xAxisLabelString;
			}
			//targetTimeLabel.text=xAxisLabelString;
			targetTimeLabel.x= targetTimeXPosition-4;
			targetTimeLabel.y= axisOriginY+3;
			this.addChild(targetTimeLabel);
			
			//var lastTime = arrayOfGraphPoints[numberOfGraphPoints-1].time;
			
			
			//nowArrowSpriteXPositionPixels= 50.0 + (arrayOfGraphPoints[numberOfGraphPoints-1].time*(pixelsPerPreferredTimeUnit));
			nowArrowSpriteXPositionPixels= 50.0 + (nowTime*(pixelsPerPreferredTimeUnit));
			
			var nowArrowSprite = new Sprite();
			nowArrowSprite.graphics.lineStyle(nowArrowThickness, nowColour);
			nowArrowSprite.graphics.moveTo(nowArrowSpriteXPositionPixels, axisOriginY);
			nowArrowSprite.graphics.lineTo(nowArrowSpriteXPositionPixels, axisOriginY+nowArrowLength);
			nowArrowSprite.graphics.moveTo(nowArrowSpriteXPositionPixels, axisOriginY);
			nowArrowSprite.graphics.lineTo(nowArrowSpriteXPositionPixels-5, axisOriginY+5);
			nowArrowSprite.graphics.moveTo(nowArrowSpriteXPositionPixels, axisOriginY);
			nowArrowSprite.graphics.lineTo(nowArrowSpriteXPositionPixels+5, axisOriginY+5);
			this.addChild(nowArrowSprite);
			
			
			var nowLabel:TextField = new TextField();
			nowLabel.width=500;
			nowLabel.text="Now";
			nowLabel.textColor=nowColour;
			nowLabel.x= nowArrowSpriteXPositionPixels-11;
			nowLabel.y= axisOriginY+nowArrowLength-2;
			var textFormatForNowLabel:TextFormat=new TextFormat();
			textFormatForNowLabel.size=16;
			textFormatForNowLabel.bold=true;
			nowLabel.setTextFormat(textFormatForNowLabel);
			this.addChild(nowLabel);
			
			
			
			
			
			
			/*
			var firstDashSprite = new Sprite();
			firstDashSprite.graphics.lineStyle(axisLineThickness, axisLineColour);
			firstDashSprite.graphics.moveTo(axisOriginX+pixelsPerPreferredTimeUnit, axisOriginY);
			firstDashSprite.graphics.lineTo(axisOriginX+pixelsPerPreferredTimeUnit, axisOriginY+dashLength);
			this.addChild(firstDashSprite);
			
			var firstLabel:TextField = new TextField();
			firstLabel.width=500;
			firstLabel.text="1";
			firstLabel.x= axisOriginX+pixelsPerPreferredTimeUnit-4;
			firstLabel.y= axisOriginY+3;
			this.addChild(firstLabel);
			
			var secondDashSprite = new Sprite();
			secondDashSprite.graphics.lineStyle(axisLineThickness, axisLineColour);
			secondDashSprite.graphics.moveTo(axisOriginX+pixelsPerPreferredTimeUnit*2, axisOriginY);
			secondDashSprite.graphics.lineTo(axisOriginX+pixelsPerPreferredTimeUnit*2, axisOriginY+dashLength);
			this.addChild(secondDashSprite);
			
			var secondLabel:TextField = new TextField();
			secondLabel.width=500;
			secondLabel.text="2";
			secondLabel.x= axisOriginX+pixelsPerPreferredTimeUnit*2-4;
			secondLabel.y= axisOriginY+3;
			this.addChild(secondLabel);
			*/
			
			var dashesXAxis = new Array();
			var textFieldsXAxis = new Array();
			
			for(var i=0; axisOriginX+distanceBetweenXAxisDashesInPixels*i<targetTimeXPosition; i++){
			
				
				dashesXAxis[i] = new Sprite();
				dashesXAxis[i].graphics.lineStyle(axisLineThickness, axisLineColour);
				dashesXAxis[i].graphics.moveTo(axisOriginX+distanceBetweenXAxisDashesInPixels*i, axisOriginY);
				dashesXAxis[i].graphics.lineTo(axisOriginX+distanceBetweenXAxisDashesInPixels*i, axisOriginY+dashLength);
				this.addChild(dashesXAxis[i]);
			
				textFieldsXAxis[i] = new TextField();
				textFieldsXAxis[i].width=500;
				textFieldsXAxis[i].text=i;
				textFieldsXAxis[i].x= axisOriginX+distanceBetweenXAxisDashesInPixels*i-4;
				textFieldsXAxis[i].y= axisOriginY+3;
				this.addChild(textFieldsXAxis[i]);
		
			
			}
			
			var yAxisLabel:TextField = new TextField();
			yAxisLabel.width=500;
			if(preferredWeightUnits=="St"){  //This is until stones are handled correctly!!!!!
				yAxisLabel.text="";
			}
			else{
				yAxisLabel.text=preferredWeightUnits;
			}
			yAxisLabel.x= topOfYAxisX-37;
			yAxisLabel.y= topOfYAxisY-15;
			this.addChild(yAxisLabel);
			
			var currentWeightLabel:TextField = new TextField();
			currentWeightLabel.width=500;
			if(preferredWeightUnits=="St"){
				currentWeightLabel.text=int(arrayOfGraphPoints[0].weight/14) + "st " + Math.round((arrayOfGraphPoints[0].weight%14)*10)/10.0 + "lbs";
			}
			else{
				currentWeightLabel.text=Math.round(arrayOfGraphPoints[0].weight*10)/10.0 + preferredWeightUnits;
			}
			currentWeightLabel.x= middleOfYAxisX-48;
			currentWeightLabel.y= middleOfYAxisY-15;
			currentWeightLabel.textColor=circleFillColour;
			var textFormat:TextFormat=new TextFormat();
			textFormat.size=16;
			currentWeightLabel.setTextFormat(textFormat);
			this.addChild(currentWeightLabel);
			
			
			var targetWeightLabel:TextField = new TextField();
			targetWeightLabel.width=500;
			if(preferredWeightUnits=="St"){
				targetWeightLabel.text=int(targetWeight/14) + "st " + Math.round((targetWeight%14)*10.0)/10.0 + "lbs";
			}
			else{
				targetWeightLabel.text=Math.round(targetWeight*10.0)/10.0 + preferredWeightUnits;
			}
			targetWeightLabel.x= targetWeightDotXPosition+3;
			targetWeightLabel.y= targetWeightDotYPosition-20;
			targetWeightLabel.textColor=targetColour;
			var textFormat2:TextFormat=new TextFormat();
			textFormat2.size=16;
			targetWeightLabel.setTextFormat(textFormat2);
			this.addChild(targetWeightLabel);
			
			
			/*
			this.firstWeightDotSprite=new Sprite();
			this.firstWeightDotSprite.graphics.lineStyle(circleLineThickness, circleLineColour);
			this.firstWeightDotSprite.graphics.beginFill(circleFillColour);
				this.firstWeightDotSprite.graphics.drawCircle(middleOfYAxisX, middleOfYAxisY, dotRadiusInPixels);
			this.firstWeightDotSprite.graphics.endFill();
			this.addChild(firstWeightDotSprite);
			
			
			
			arrayOfGraphPoints[0].yPositionPixels = 180;
			arrayOfGraphPoints[0].xPositionPixels=50;
			
			this.arrayOfGraphPoints[0].sprite=new Sprite();
			this.arrayOfGraphPoints[0].sprite.graphics.lineStyle(circleLineThickness, circleLineColour);
			this.arrayOfGraphPoints[0].sprite.graphics.beginFill(circleFillColour);
				this.arrayOfGraphPoints[0].sprite.graphics.drawCircle(arrayOfGraphPoints[0].xPositionPixels, arrayOfGraphPoints[0].yPositionPixels, dotRadiusInPixels);
			this.arrayOfGraphPoints[0].sprite.graphics.endFill();
			this.addChild(arrayOfGraphPoints[0].sprite);
			
			
			
			arrayOfGraphPoints[1].yPositionPixels= 180 + ((arrayOfGraphPoints[1].weight-arrayOfGraphPoints[0].weight)*(pixelsPerWeightUnit));
			arrayOfGraphPoints[1].xPositionPixels= 50 + (arrayOfGraphPoints[1].time*(pixelsPerPreferredTimeUnit));
			
			this.arrayOfGraphPoints[1].sprite=new Sprite();
			this.arrayOfGraphPoints[1].sprite.graphics.lineStyle(circleLineThickness, circleLineColour);
			this.arrayOfGraphPoints[1].sprite.graphics.beginFill(circleFillColour);
				this.arrayOfGraphPoints[1].sprite.graphics.drawCircle(arrayOfGraphPoints[1].xPositionPixels, arrayOfGraphPoints[1].yPositionPixels, dotRadiusInPixels);
			this.arrayOfGraphPoints[1].sprite.graphics.endFill();
			this.addChild(arrayOfGraphPoints[1].sprite);
			
			
			arrayOfGraphPoints[2].yPositionPixels= 180 + ((arrayOfGraphPoints[2].weight-arrayOfGraphPoints[0].weight)*(pixelsPerWeightUnit));
			arrayOfGraphPoints[2].xPositionPixels= 50 + (arrayOfGraphPoints[2].time*(pixelsPerPreferredTimeUnit));
			
			this.arrayOfGraphPoints[2].sprite=new Sprite();
			this.arrayOfGraphPoints[2].sprite.graphics.lineStyle(circleLineThickness, circleLineColour);
			this.arrayOfGraphPoints[2].sprite.graphics.beginFill(circleFillColour);
				this.arrayOfGraphPoints[2].sprite.graphics.drawCircle(arrayOfGraphPoints[2].xPositionPixels, arrayOfGraphPoints[2].yPositionPixels, dotRadiusInPixels);
			this.arrayOfGraphPoints[2].sprite.graphics.endFill();
			this.addChild(arrayOfGraphPoints[2].sprite);
			*/
			
			for(var i=0;i<numberOfGraphPoints;i++){
			
				arrayOfGraphPoints[i].yPositionPixels= 180.0 - ((arrayOfGraphPoints[i].weight-arrayOfGraphPoints[0].weight)*(pixelsPerWeightUnit));
				arrayOfGraphPoints[i].xPositionPixels= 50.0 + (arrayOfGraphPoints[i].time*(pixelsPerPreferredTimeUnit));
			
				this.arrayOfGraphPoints[i].sprite=new Sprite();
				this.arrayOfGraphPoints[i].sprite.graphics.lineStyle(circleLineThickness, circleLineColour);
				this.arrayOfGraphPoints[i].sprite.graphics.beginFill(circleFillColour);
					this.arrayOfGraphPoints[i].sprite.graphics.drawCircle(arrayOfGraphPoints[i].xPositionPixels, arrayOfGraphPoints[i].yPositionPixels, dotRadiusInPixels);
				this.arrayOfGraphPoints[i].sprite.graphics.endFill();
				this.addChild(arrayOfGraphPoints[i].sprite);
				
				var lineSprite = new Sprite();
				lineSprite.graphics.lineStyle(graphLineThickness, circleLineColour);
				lineSprite.graphics.moveTo(arrayOfGraphPoints[i].xPositionPixels, arrayOfGraphPoints[i].yPositionPixels)
				
				if(i>=1){
					lineSprite.graphics.lineTo(arrayOfGraphPoints[i-1].xPositionPixels, arrayOfGraphPoints[i-1].yPositionPixels)
				}
				this.addChild(lineSprite);
			
			
			}
			
			//dashed line code
			var dashedLineSprite = new Sprite();
			dashedLineSprite.graphics.lineStyle(circleLineThickness, targetColour);
			this.dashLine(dashedLineSprite.graphics, targetWeightDotXPosition, targetWeightDotYPosition, arrayOfGraphPoints[startPointForTarget].xPositionPixels, arrayOfGraphPoints[startPointForTarget].yPositionPixels, 7, 3);
			this.addChild(dashedLineSprite);
			
			/*
			var textField = new TextField();
			textField.width = 1000;
			textField.y = 60;
			textField.text = "Last weight IS...: " + arrayOfGraphPoints[numberOfGraphPoints-1].weight;
			this.addChild(textField);
			//get current weight in kg from php
			*/
			
			/*
			this.graphics.lineStyle(1, 0x0000FF);
			this.graphics.moveTo(50,200);
			this.graphics.lineTo(50,50);
			this.graphics.moveTo(300,200);
			this.graphics.lineTo(50,200);
			this.graphics.lineStyle(1, 0x00FF00);
			this.graphics.moveTo(50,130);
			this.graphics.lineTo(60,132);
			this.graphics.moveTo(60,132);
			this.graphics.lineTo(70,136); */
			
			
				/*var myShape:Shape = new Shape();
				myShape.graphics.lineStyle(1, 0x000000);			
				myShape.graphics.beginFill(0xFFFF00);
				myShape.graphics.drawEllipse(102,144,123,238);
				this.addChild(myShape);*/
				
				
		}
		
		
		
		//code for dashed line taken from  http://yaa-blog.blogspot.com/2007/06/actionscript-3-dashed-line.html
		public function dashLine(g:Graphics,x1:Number,y1:Number,x2:Number,y2:Number,onLength:Number,offLength:Number):void {
		
			g.moveTo(x1,y1);
			if (offLength==0) {
				g.lineTo(x2,y2);
				return;
			}

			var dx:Number = x2-x1,
				dy:Number = y2-y1,
				lineLen:Number = Math.sqrt(dx*dx + dy*dy),
				angle:Number = Math.atan2(dy, dx),
				cosAngle:Number = Math.cos(angle),
				sinAngle:Number = Math.sin(angle),
				ondx:Number  = cosAngle*onLength,
				ondy:Number  = sinAngle*onLength,
				offdx:Number = cosAngle*offLength,
				offdy:Number = sinAngle*offLength,

				x:Number = x1,
				y:Number = y1;


			var fullDashCountNumber:int = Math.floor(lineLen/(onLength+offLength));

			for (var i:int=0; i<fullDashCountNumber; i++){
				g.lineTo(x+=ondx,y+=ondy);
				g.moveTo(x+=offdx,y+=offdy);
			}

			var remainder:Number = lineLen - ((onLength+offLength)*fullDashCountNumber);

			if (remainder>=onLength) {
				g.lineTo(x+=ondx,y+=ondy);
			} 
			else{
				g.lineTo(x2,y2);
			}
		}
		
	}
	
	

}
