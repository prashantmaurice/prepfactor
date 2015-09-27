

<!DOCTYPE html>
<html>
<head>
<script>
function ThanksForVisiting()
{
  alert("Thank you for visiting us!!");
}

/*
//**************************Window close **************
	function quitting_win()
		{
			centeredPopup('test2.php','myWindow','500','300','yes');
			//alert("quitwin called");
			//alert(allow_quit);
			//var tno=document.getElementById('tn').value;
			//var qno=document.getElementById('curr_q').value;
			//var area=document.getElementById('area').value;
			//timespent_db(tno,qno,area)
			if(allow_quit==1)
			{       
				str ="Do you want to really quit this test. If you press Cancel then you can take test again, if you press OK you will never get this test...!"
				val=window.confirm(str);
				if(val==true)
				{
					quit_test();
				}	
				else
					return false;
			}
		}
	//******************End of window close **************/
	window.onbeforeunload = function() {
    saveFormData();
    return null;
}

function saveFormData() {
    console.log('saved');
}
</script>
</head>
<body>ajfhkjhaf

</body>
</html>