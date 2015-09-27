<?php 
session_start();
	$test_tableid =$_SESSION['test_tableid'];// eg. 35
	$currquestion =$_SESSION['currquestion'];
	$mark = $_POST['marked'];
	$temp2="a".$currquestion;
	require_once("scripts/connect_db_testattempts.php");
	if($mark=='1')
		mysql_query("UPDATE $test_id SET $temp2=$temp2-5 WHERE id='$test_tableid' LIMIT 1")or die(mysql_error());
	else if($mark=='0')
		mysql_query("UPDATE $test_id SET $temp2=$temp2+5 WHERE id='$test_tableid' LIMIT 1")or die(mysql_error());
	echo "marked";
?>
