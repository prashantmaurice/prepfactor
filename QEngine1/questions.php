<?php 
session_start();

require_once("scripts/connect_db.php");
$arrCount = "";
if(isset($_POST['loadquestion'])){
	$question = preg_replace('/[^0-9]/', "", $_POST['loadquestion']);
	$output = "";
	$q = "";
	$sql = mysql_query("SELECT id FROM questions");
	$numQuestions = mysql_num_rows($sql);
	if($numQuestions==0)
		echo 'no questions from database';
	$singleSQL = mysql_query("SELECT * FROM questions WHERE question_id='$question' LIMIT 1");
	$numQuestions2 = mysql_num_rows($singleSQL);
	if($numQuestions2==0)
		echo 'no question of that id';
	
		while($row = mysql_fetch_array($singleSQL)){
			$id = $row['id'];
			$thisQuestion = $row['question'];
			$type = $row['type'];
			$question_id = $row['question_id'];
			$q = '<h2>'.$thisQuestion.'</h2>';
			echo $q;
		}
}
echo '<br>requested question=';
echo $question;
//$_POST['question']
?>