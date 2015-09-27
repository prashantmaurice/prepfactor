<?php 
	echo 'generating content....';
	session_start();
	$_SESSION['currquestion']=2;
	$_SESSION['currtest']=$_POST['test_id'];
	//$user_id=$_POST['user_id'];
	$user_id=$_SESSION['user_id'];
	$test_id=$_SESSION['currtest'];
	echo '<br>user_id = '; echo $user_id;
	echo '<br>test_id = '; echo $test_id;
	$temp="test_".$test_id;
	$_SESSION['currtest_id']=$temp;
	echo '<br>temp = '; echo $temp;
	require_once("scripts/connect_db_testattempts.php");
	$sql = mysql_query("INSERT INTO $temp (user_id, test_id) VALUES ('$user_id', '$test_id')")or die(mysql_error());
	//$singleSQL = mysql_query("SELECT * FROM $temp WHERE question_id='$question' LIMIT 1");
	$unique_id = mysql_insert_id();
	$_SESSION['test_tableid']=$unique_id ;
	echo '<br>database id = '; echo $unique_id;
	header( 'Location: quiz.php' ) ;
?>
