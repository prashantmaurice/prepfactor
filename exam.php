<?php 
session_start();
if (isset($_SESSION['question']))
	$_SESSION['question']=$_SESSION['question']+1;
else
	$_SESSION['question']=1;
if($_SESSION['question']>5)
	$_SESSION['question']=1;
	
if (isset($_POST['test_id']))
	$_SESSION['test_id']=$_POST['test_id'];
if (isset($_SESSION['username'])==0)
{	
	header("Location: index.php"); /* Redirect browser */
	/* Make sure that code below does not get executed when we redirect. */
	die( "you are not logged in" );
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PreperationZone</title>
<link href="css/exam.css"  rel = "stylesheet" type = "text/css"/>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
 <script type="text/javascript" src="js/exam.js"></script>
</head>
<body>
<div class="exam_tab_cont" id="exam_topbar_cont">
       	<div class="exam_toplogo"></div>
              <div class="exam_topbaricon_cont">
              	<a href='logout.php'><div class="exam_logout">Log out</div></a>
                     <div class="exam_topbaricon_each" id="exam_searchicon"></div>
                     <div id="login_details"><?php echo "you are logged in as ". $_SESSION['username']; ?><br />
			<?php echo "test number is ".$_SESSION['test_id'] ?>
                     <?php echo "question number is ".$_SESSION['question'] ?>
                     
                     </div>
              </div>
</div> 
<table id="exam_maintable" \ border="1"><tr>
<td id="exam_table_leftcont">
	<div id="exam_lefticon">
       	<div class="exam_lefticon_each" id="exam_lefticon_overview">overview</div>
              <div class="exam_lefticon_each" id="exam_lefticon_individual">Individual</div>
              <div class="exam_lefticon_each" id="exam_lefticon_save">save</div>
       </div>
</td>
<td id="exam_table_rightcont">
	Question : <br />
       <div  id="exam_question">What is the value of 2+2</div>
       <div  id="exam_options">options
       	<form action="exam.php">
                     <input type="radio" name="answer" value="1">Male<br>
                     <input type="radio" name="answer" value="2">Male<br>
                     <input type="radio" name="answer" value="3">Male<br>
                     <input type="radio" name="answer" value="4">Female
              
       </div>
</td>
</tr>
<tr><td></td>.<td>
	<div  id="exam_end" class="exam_bottom_buttons">CLEAR</div>
       <div  id="exam_mark" class="exam_bottom_buttons">MARK</div>
       <input  id="exam_next" class="exam_bottom_buttons" type="submit" >NEXT</div>
       <div  id="exam_previous" class="exam_bottom_buttons">PREVIOUS</div>
       </form>
</td></tr></table>
</body>
</html>