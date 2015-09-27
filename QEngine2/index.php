<?php 
	session_start();
	$_SESSION['user_id']=124;
	$user_id=$_SESSION['user_id'];
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Quiz try3 index</title>
<script>
function startQuiz(url){
	window.location = url;
	
}
</script>
</head>
<body>
<h3>Click below when you are ready to start the quiz</h3>
<form action='newusertest.php' method="post">
	<!--<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']?>"/>-->
       <input  type="submit" value="5" name="test_id"/>
       <!--<button onClick="startQuiz('newusertest.php')" type="submit" value="test_1" name="test_id">Click Here To Begin test2</button>-->
</form>
</body>
</html>