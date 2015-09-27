<?php
session_start();
if(!isset($_SESSION['newtest'])){
	$_SESSION['newtest']=1;
	
}

if(isset($_SESSION['test_id'])){
	$_SESSION['currquestion']=$_POST['currquestion'];
}
else
{
	$_POST['currquestion']=1;
	$_SESSION['currquestion']=1;
}
//$next=$currquestion+1;TEST
//$prev=$currquestion-1;

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Quiz Page</title>
<script>
window.oncontextmenu = function(){
	return false;
}

</script>
</head>
<body onLoad="initializequestion()">
       <div id="status">
              <div id="question"></div>
       </div>
       <button onClick="loadnextquestion()">next</button>
       <button onClick="loadprevquestion()">previous</button>
</body>
</html>
<script>
function initializequestion(){
	//alert('skfj');
	var nq = new XMLHttpRequest();
		nq.onreadystatechange = function(){
		if (nq.readyState==4 && nq.status==200){
			var response = nq.responseText;
			document.getElementById('question').innerHTML = response;
		}
		}
	
	nq.open("POST", "questions.php" , true);
	nq.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  	nq.send("loadquestion=1&currquestion=1");
	//$_POST['loadquestion']=2;
	//$question=2;
}

function loadnextquestion(){
	//alert('skfj');
	var nq = new XMLHttpRequest();
		nq.onreadystatechange = function(){
		if (nq.readyState==4 && nq.status==200){
			var response = nq.responseText;
			document.getElementById('question').innerHTML = response;
			$_POST['currquestion']=$_POST['currquestion']+1;
		}
		}
	
	nq.open("POST", "questions.php" , true);
	nq.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  	nq.send("loadquestion="   "&currquestion=3");
}
</script>