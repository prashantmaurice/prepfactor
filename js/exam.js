	//ravikanth--------------------------------------------------------------------------------------------------------------------------------------
// JavaScript Document

$(document).ready(function(){
//------------------------------------side wipes---------------------------------------------------------------------------------------------------
	$("#profile_pic").click(function(){movePrev();});
	$("#wiperight").click(function(){moveNext();});
	//reloadpics(6);
	$('.wipe').hover( function(){
		  $(this).css('background-color', '#EEEEEE');
	   },
	   function(){
		  $(this).css('background-color', '#FFA200');
	 });
});

