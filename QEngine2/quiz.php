<?php 
	echo 'quiz page';
	session_start();
	$test_id=$_SESSION['currtest'];
	$user_id=$_SESSION['user_id'];
	$currquestion =$_SESSION['currquestion'];
	$test_tableid=$_SESSION['test_tableid'];
	echo '<br>user_id = '; echo $user_id;
	echo '<br>test_id = '; echo $test_id;
	echo '<br>currquestion= '; echo $currquestion;
	echo '<br>test user id= '; echo $test_tableid;
?>
<br>--------------------------------------------------------------------------------------------------------------------
<html>
<head>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script>
var curr_option=0;
var mark=0;
var review=0;
var reviewkeys="";
$(document).ready(function(){
	//alert('document ready');
});
</script>
<script>

if($currquestion==2){alert('question2')}
//alert('hakunamatata');
function displayResult(browser)
{
	curr_option=browser;
	document.getElementById("result").value=curr_option;
}
function displayReview()
{
	if(review==0)
		{$('#reviewtab').show();review=1;generatereview()}
	else
		{$('#reviewtab').hide();review=0;}
}
function generatereview()
{
	document.getElementById("reviewtab").innerHTML =reviewkeys ;
}
function supersubmit()
{
	submitanswer('submit');
	//window.location = 'submit.php';
}
</script>
</head>
<body onLoad="initializequestion()">
		<div id="reviewtab" style="display:none; background-color:#CCCCCC;">Reviewtab<br></div>
              <div id="question"><br></div>
              <form>
                     <input type="radio" name="browser" onclick="displayResult(this.value)" value="1" id="option1"><label id="option1label" for="option1">Internet Explorer</label><br>
                     <input type="radio" name="browser" onclick="displayResult(this.value)" value="2" id="option2"><label id="option2label" for="option2">Internet Explorer</label><br>
                     <input type="radio" name="browser" onclick="displayResult(this.value)" value="3" id="option3"><label id="option3label" for="option3">Internet Explorer</label><br>
                     <input type="radio" name="browser" onclick="displayResult(this.value)" value="4" id="option4"><label id="option4label" for="option4">Internet Explorer</label><br>
                     The answer you selected is: <input type="text" id="result">
              </form>
              <button id="b_prev" onClick="submitanswer('prev')">Prev</button>
              <button id="b_mark"onClick="mark=markquestion(mark)">mark</button>
              <button id="b_review" onClick="displayReview()">Review</button>
              <button id="b_next"onClick="submitanswer('next')">Next</button>
              <button id="b_next"onClick="supersubmit()">Submit</button>
              <div>-----------------------------------------------------------------------------------------------------------</div>
              <div id="feedback">feedback</div>
              <div id="marked">unmarked</div>
</body>
</html>
<script>
function initializequestion(){
	var nq = new XMLHttpRequest();
		nq.onreadystatechange = function(){
		if (nq.readyState==4 && nq.status==200){
			//var response = nq.responseText;
			//document.getElementById('question').innerHTML = response;
			var response = nq.responseText.split("|");
			document.getElementById('question').innerHTML = response[0];
			document.getElementById('option1label').innerHTML = response[1];
			document.getElementById('option2label').innerHTML = response[2];
			document.getElementById('option3label').innerHTML = response[3];
			document.getElementById('option4label').innerHTML = response[4];
			document.getElementById('feedback').innerHTML = response[6] ;
			reviewkeys = response[6] ;
			
			var currselection=response[7];
			}
			}
	
	nq.open("POST", "initialize.php" , true);
	nq.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	nq.send();
}
function markquestion(mark){
	document.getElementById('b_mark').innerHTML = mark;
	if(mark==0){
		document.getElementById('b_mark').innerHTML = 'unmark';
		mark2=1;
		}
	else {
		document.getElementById('b_mark').innerHTML = 'mark';
		mark2=0;
		}
	return mark2;
}
function submitanswer(glide){
	var nq = new XMLHttpRequest();
		nq.onreadystatechange = function(){
		if (nq.readyState==4 && nq.status==200){
			if (glide=='submit')
				{window.location = 'submit.php' ;return;}//final super submit page called
			//var response = nq.responseText;
			//document.getElementById('question').innerHTML = response;
			var response = nq.responseText.split("|");
			document.getElementById('question').innerHTML = response[0];
			document.getElementById('option1label').innerHTML = response[1];
			document.getElementById('option2label').innerHTML = response[2];
			document.getElementById('option3label').innerHTML = response[3];
			document.getElementById('option4label').innerHTML = response[4];
			document.getElementById('feedback').innerHTML = response[6] ;
			document.getElementById('marked').innerHTML ="is this question marked = "+ response[8] ;
			mark =response[8];
			reviewkeys = response[6] ;
			var currselection=response[7];
			curr_option=currselection;
			//document.getElementById('marked').innerHTML = curr_option ;
			$('#option1').prop('checked', false);
			$('#option2').prop('checked', false);
			$('#option3').prop('checked', false);
			$('#option4').prop('checked', false);
			if(currselection=='1')
				{$('#option1').prop('checked', 'checked');displayResult('1');}
			if(currselection=='2')
				{$('#option2').prop('checked', 'checked');displayResult('2');}
			if(currselection=='3')
				{$('#option3').prop('checked', 'checked');displayResult('3');}
			if(currselection=='4')
				{$('#option4').prop('checked', 'checked');displayResult('4');}
			if(response[5]=='5'){
				$('#b_next').hide();
				//alert('button hidden');
			}
			else
				$('#b_next').show();
			if(mark==1)
				markquestion(0);
			else if(mark==0)
				markquestion(1);
			if(response[5]=='1'){
				$('#b_prev').hide();
			}
			else
				$('#b_prev').show();
		}
	}
	
	nq.open("POST", "submitanswers.php" , true);
	nq.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  	var temp="glide=";
	temp+=glide;
	temp+="&answer=";
	temp+=curr_option;
	temp+="&marked=";
	temp+=mark;
	nq.send(temp);
}
</script>
