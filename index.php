<?php 
session_start(); 
if (isset($_SESSION['username']))
{
	header( 'Location: membersarea.php' ) ;
}
else
	session_destroy(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PreperationZone</title>
<link href="css/intropage.css"  rel = "stylesheet" type = "text/css"/>
</head>
<body>
<div class="intro_tab_cont" id="intro_topbar_cont">
	<div id="intro_topbar" class="intro_tab" > 
       	<div class="intro_toplogo"></div>
              <div id="intro_login_cont">
                     <form action="login.php" method="post">
                            <input type="text"  placeholder="username" name="username"  class="login_form_input"/>
                            <input type="password"  placeholder="password" name="password" class="login_form_input"/>
                            <input type="submit" name="submit" value="login" class="form_signin"/><br />
                            <table id="topbar_login_bottomlinks"><tr>
                            <td><a href="">register free</a></td>
                            <td><a href="">forgot details?</a></td></tr></table>
                     </form>
              </div>
       </div>
</div> 
<div class="intro_tab_cont" id="intro_menu_cont">
	<div id="intro_menu" class="intro_tab"> 
       </div>
</div> 
<!--<table class="intro_main_table" bordercolor="#666666">
	<tr><td>sdjfhuwgh</td></tr>
       
	


</table>-->
<?php 

?>




</body>
</html>
