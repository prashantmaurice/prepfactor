<?php
	session_start();
	$time=time();
	$_SESSION['time_started'] = $time;
	$oldtime = $_SESSION['time_started'];
	$newtime = time();
	$difference = $newtime - $oldtime;
?>
<html><head><title>timers test</title></head>
<script language="javascript">
	var popupWindow = null;
	function centeredPopup(url,winName,w,h,scroll){
	LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
	TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
	settings =	'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable';
	popupWindow = window.open(url,winName,settings)
	}
</script>
<body>
	<div id="div1">timer</div>
	<p><a href="test.php" onClick="centeredPopup(this.href,'myWindow','500','300','yes');return false">Centered Popup</a></p>
</body>
</html>