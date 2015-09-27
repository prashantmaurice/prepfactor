<?php 
session_start();

$username =  $_POST['username'];
$password =  $_POST['password'];

if($username&&$password)
{
	$connect = mysql_connect ("127.0.0.1", "root", "") or die("couldn't conect to server");
	
	mysql_select_db("login") or die ("no database available");
	$query = mysql_query("SELECT * FROM users WHERE username = '$username'");
	$numrows = mysql_num_rows($query);
	
	if($numrows!=0)
	{
		while($row = mysql_fetch_assoc($query))
		{
			$dbusername = $row['username'];
			$dbpassword = $row['password'];
		}
		if ($username==$dbusername&&$password==$dbpassword)
		{
			$_SESSION['username']=$dbusername;
			header("Location: membersarea.php");
			die( "Login successful");
		}
		else
		{
			header("Location: index.php"); /* Redirect browser */
			echo "Incorrect password";
			
		}
	}
	else
	{
		header("Location: index.php"); /* Redirect browser */
		die( "that username does not exist");
	}
	

}
else
	{
		header("Location: index.php"); /* Redirect browser */
		die("please enter a username and password");
	}
?>
