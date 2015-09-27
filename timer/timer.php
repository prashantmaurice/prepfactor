<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Quiz Page</title>
<script type="text/javascript">
function countDown(secs,elem) {
	var element = document.getElementById(elem);
	element.innerHTML = "You have "+secs+" seconds remaining.";
	secs--;
	var timer = setTimeout('countDown('+secs+',"'+elem+'")',1000);
}
</script>
<script language="JavaScript" type="text/javascript">
  //window.onbeforeunload = confirmExit;
  function confirmExit()
  {
    	alert('sakjglkdfhs');
	return "You have attempted to leave this page.  If you have made any changes to the fields without clicking the Save button, your changes will be lost.  Are you sure you want to exit this page?";
  }
</script>
<script>
	//window.onunload=function(){alert('diverting');};
</script>
</head>

<body onUnload="confirmExit()">
<div id="status">
<div id="counter_status"></div>
</div>
<script type="text/javascript">countDown(200,"counter_status");</script>
</body>
</html>