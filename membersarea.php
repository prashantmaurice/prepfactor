<?php 
session_start();
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
<!--<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/member.js"></script>-->
<script>
function entertest(){
	window.location = 'QEngine2/index.php';
}
</script>
</head>
<body>
<div class="exam_tab_cont" id="exam_topbar_cont">
       	<div class="exam_toplogo"></div>
              <div class="exam_topbaricon_cont">
              	<a href='logout.php'><div class="exam_logout">Log out</div></a>
                     <div class="exam_topbaricon_each" id="exam_searchicon"></div>
                     <div id="login_details"><?php echo "you are logged in as ". $_SESSION['username']; ?></div>
              </div>
  
</div> 
<div class="member_tab_cont" >Which exam do yiou want to write today ?<br />
	<form id="select1" action="exam.php"method="post"><input type="hidden" name="test_id" value="1" /></form>
      	<form id="select2" action="exam.php"method="post"><input type="hidden" name="test_id" value="2" /></form>
       <form id="select3" action="exam.php"method="post"><input type="hidden" name="test_id" value="3" /></form>
      	
	<button type="submit" name="Current" form="select2">sample test 2</button>
      	<button type="submit" name="Users" form="select3">sample test 3</button>
</div>
<button  onClick="entertest()">CAT exams</button>
</body>
</html>