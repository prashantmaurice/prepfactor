<?php 
session_start();
	
	$test_id=$_SESSION['currtest_id'];//eg. test_5
	$user_id=$_SESSION['user_id'];
	$test_tableid =$_SESSION['test_tableid'];// eg. 35
	$currquestion =$_SESSION['currquestion'];
	$glide = $_POST['glide'];
	$mark = $_POST['marked'];
	
	//echo "<br>submit page touched ";
	//echo "loaded question = "; echo $_POST['loadquestion'];
	//echo "option selected = "; echo $_POST['answer'];
	if($mark==1)
		$option=$_POST['answer']+5;
	if($mark==0)
		$option=$_POST['answer'];
	
	//echo "hidden = "; echo $_POST['test'];
	//echo "glided by = "; echo $_POST['glide'];
	$temp2="a".$currquestion;
	//if($glide=='mark'){
		//require_once("scripts/connect_db_testattempts.php");
		//mysql_query("UPDATE $test_id SET $temp2=$temp2+4 WHERE id='$test_tableid' LIMIT 1")or die(mysql_error());
		//exit();
	//}
	//$question=$_POST['loadquestion'];
	require_once("scripts/connect_db_testattempts.php");
	//$singleSQL = mysql_query("SELECT * FROM $test_id WHERE id='$test_tableid' LIMIT 1")or die(mysql_error());
	mysql_query("UPDATE $test_id SET $temp2='$option' WHERE id='$test_tableid' LIMIT 1")or die(mysql_error());
	
	//------------------------------------------------------------------for getting next question--------------------------------------------------
	if($glide=='submit')
		exit();
	if($glide=='next')
		$nextquestion=$currquestion+1;
	if($glide=='prev')
		$nextquestion=$currquestion-1;
	$temp2="a".$nextquestion;
	$singleSQL = mysql_query("SELECT * FROM $test_id WHERE id='$test_tableid'  LIMIT 1");
	while($row = mysql_fetch_array($singleSQL)){
		//echo "mamamiyaaaa";
			$id = $row['id'];
			if($row[$temp2]>4){
				$currselection=$row[$temp2]-5; $mark=1;}
			else{
				$currselection=$row[$temp2]; $mark=0;}
			$currselection2=$row['a1'].$row['a2'].$row['a3'].$row['a4'].$row['a5']."<br>".$currselection;
			//echo $currselection;
			//echo 'end reached<br>';
	}
	
	//echo "questions page touched<br>";
	//echo "loaded question = ";echo $_POST['loadquestion'];
	//$question=$_POST['loadquestion'];
	require_once("scripts/connect_db_questions.php");
	$test_id2=$_SESSION['currtest'];//id of test irrespectiveof user eg. 5
	//echo "nextquestion = "; echo $nextquestion;
	//echo "testid = "; echo $test_tableid;
	$singleSQL = mysql_query("SELECT * FROM testquestions WHERE question_key='$nextquestion' AND test_id='$test_id2' LIMIT 1");
	//$numQuestions = mysql_num_rows($singleSQL);
	$test_id2=$_SESSION['currtest'];//id of test irrespectiveof user eg. 5
	while($row = mysql_fetch_array($singleSQL)){
		//echo "mamamiyaaaa";
			$id = $row['id'];
			$thisQuestion = $row['question'];
			$option1=$row['a1'];
			$option2=$row['a2'];
			$option3=$row['a3'];
			$option4=$row['a4'];
			//$type = $row['type'];
			//$question_id = $row['question_id'];
			$q = $thisQuestion.'|'.$option1.'|'.$option2.'|'.$option3.'|'.$option4.'|'.$nextquestion.'|'.$currselection2.'|'.$currselection.'|'.$mark;
			echo $q;
			//echo 'end reached<br>';
			
			// question | option1 | option2 | option3 | option4 | newquestionnumber |  preselectedoption
	}
	$_SESSION['currquestion']=$nextquestion;
?>
