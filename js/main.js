// JavaScript Document
var page=1
var leftcol=1
var currpage=0
var curr_icon_index=0
$(document).ready(function(){
//------------------------------------left main icons---------------------------------------------------------------------------------------------------
	
	
	$('.primary_menu_maincategories').hover( function(){
		  $(this).css('background-color', '#549BB7');
	   },
	   function(){
		  $(this).css('background-color', '#303943');
	 });



//-----------------------------------topbar---------------------------------------------------------------------------------------------------
	$('.topbar_options').hover( function(){
		  $(this).css('background-color', '#549BB7');
	   },
	   function(){
		  $(this).css('background-color', '#303943');
	 });
//-----------------------------------left profile bar hide-------------------------------------------
	$("#syncwits_logo").click(function(){
			$("#left_maincolumn").animate({width:70},300);
			$("#leftcol_contents").animate({left:-220},300);
		
			$("#leftcol_comp_container_table").animate({left:10},300);
	});
	$("#leftcol_decompress").click(function(){
			$("#left_maincolumn").animate({width:200},300);
			$("#leftcol_contents").animate({left:0},300);
			$("#leftcol_comp_container_table").animate({left:-60},300);
		
	});
//-----------------------------------left bar icons animate---------------------------------------------------------------------------------------------------
	$(".leftcol_comp_icons").hover(function(){
			curr_icon_index = $(this).index();
			if (currpage!=curr_icon_index){
				$(this).clearQueue();
				$(this).animate({'background-position-x': '60'  },"fast");
			}
		},function(){
			curr_icon_index = $(this).index();
			if (currpage!=curr_icon_index){
			$(this).clearQueue();	
			$(this).animate({'background-position-x': '0'  },"fast");}
	});
//-----------------------------------on-clicksearch---------------------------------------------------------------------------------------------------
	$("#click_home").click(function(){
		if(currpage!=0){
			$(this).css('background-color', '#999999');
			$("#homepage_home").show();
			$("#homepage_search").hide();
			$("#homepage_calender").hide();
			$("#homepage_forum").hide();
			$("#homepage_library").hide();
		}
		currpage=0;
		
	});
	$("#click_search").click(function(){
		if(currpage!=1){
			$(this).css('background-color', '#999999');
			
			$("#homepage_home").hide();
			$("#homepage_search").show();
			$("#homepage_calender").hide();
			$("#homepage_forum").hide();
			$("#homepage_library").hide();
		}
		currpage=1;
	});
	$("#click_forum").click(function(){
		if(currpage!=3){
			$(this).css('background-color', '#999999');
			$("#homepage_home").hide();
			$("#homepage_search").hide();
			$("#homepage_calender").hide();
			$("#homepage_forum").show();
			$("#homepage_library").hide();
		}
		currpage=3;
	});
	$("#click_calender").click(function(){
		if(currpage!=4){
			$(this).css('background-color', '#999999');
			$("#homepage_home").hide();
			$("#homepage_search").hide();
			$("#homepage_calender").show();
			$("#homepage_forum").hide();
			$("#homepage_library").hide();
			$('#calendar').fullCalendar( 'refetchEvents' );
		}
		currpage=4;
	});
	$("#click_library").click(function(){
		if(currpage!=4){
			$(this).css('background-color', '#999999');
			$("#homepage_home").hide();
			$("#homepage_search").hide();
			$("#homepage_calender").hide();
			$("#homepage_forum").hide();
			$("#homepage_library").show();
		}
		currpage=4;
	});
	
	
	$("#compicon_home").click(function(){
		if(currpage!=0){
			$("#kong").find("li").eq(currpage).animate({'background-position-x': '0'  },"fast");
			$(this).css({'background-position-x': '60'  });
			$("#homepage_home").show();
			$("#homepage_search").hide();
			$("#homepage_calender").hide();
			$("#homepage_forum").hide();
			$("#homepage_library").hide();
			
		}
		currpage=0;
		
	});
	$("#compicon_search").click(function(){
		if(currpage!=1){
			$("#kong").find("li").eq(currpage).animate({'background-position-x': '0'  },"fast");
			$(this).css({'background-position-x': '60'  });
			$("#homepage_home").hide();
			$("#homepage_search").show();
			$("#homepage_calender").hide();
			$("#homepage_forum").hide();
			$("#homepage_library").hide();
		}
		currpage=1
	});
	$("#compicon_arena").click(function(){
		if(currpage!=2){
			$("#kong").find("li").eq(currpage).animate({'background-position-x': '0'  },"fast");
			$(this).css({'background-position-x': '60'  });
			$("#homepage_home").hide();
			$("#homepage_search").hide();
			$("#homepage_calender").hide();
			$("#homepage_forum").hide();
			$("#homepage_library").show();
		}
		currpage=2
	});
	$("#compicon_forum").click(function(){
		if(currpage!=3){
			$("#kong").find("li").eq(currpage).animate({'background-position-x': '0'  },"fast");
			$(this).css({'background-position-x': '60'  });
			$("#homepage_home").hide();
			$("#homepage_search").hide();
			$("#homepage_calender").hide();
			$("#homepage_forum").show();
			$("#homepage_library").hide();
		}
		currpage=3;
	});
	$("#compicon_calender").click(function(){
		if(currpage!=4){
			$("#kong").find("li").eq(currpage).animate({'background-position-x': '0'  },"fast");
			$(this).css({'background-position-x': '60'  });
			$("#homepage_home").hide();
			$("#homepage_search").hide();
			$("#homepage_calender").show();
			$("#homepage_forum").hide();
			$("#homepage_library").hide();
		}
		currpage=4;
	});
});
//-----------------------------------masonry jquery---------------------------------------------------------------------------------------------------
function screensizeadjust(){
	var screen_height = screen.height;
	alert(screen_height);
	if (screen_height <= 568) {
				$("#left_maincolumn").animate({width:70},300);
				$("#leftcol_contents").animate({left:-220},300);
			
				$("#leftcol_comp_container_table").animate({left:10},300);
	} else {
	
	  $("#left_maincolumn").animate({width:200},300);
				$("#leftcol_contents").animate({left:0},300);
				$("#leftcol_comp_container_table").animate({left:-60},300);
	
	}
}
//$(document).ready(screensizeadjust);    // When the page first loads
//$(window).resize(screensizeadjust);  
$(window).resize(function() {
 
  	var screen_width = $(window).width()
	if (screen_width <= 1000) {
				$("#left_maincolumn").animate({width:70},300);
				$("#leftcol_contents").animate({left:-220},300);
			
				$("#leftcol_comp_container_table").animate({left:10},300);
	} else {
	
	  $("#left_maincolumn").animate({width:200},300);
				$("#leftcol_contents").animate({left:0},300);
				$("#leftcol_comp_container_table").animate({left:-60},300);
				$("#left_maincolumn").animate({width:200},300);
	}
});
//-----------------------------------left col auto adjust with scroll-------------------
$(window).scroll(function (event) {
    var y = $(this).scrollTop();

    if ((y >= 400)&&(leftcol==1)) {
        //alert("1");
	 			$("#left_maincolumn").animate({width:70},300);
				$("#leftcol_contents").animate({left:-220},300);
			
				$("#leftcol_comp_container_table").animate({left:10},300);
				leftcol=2;
    }
    else if ((y < 400)&&(leftcol==2))
    {
	    			$("#left_maincolumn").animate({width:200},300);
         			$("#leftcol_contents").animate({left:0},300);
				$("#leftcol_comp_container_table").animate({left:-60},300);  
				leftcol=1;
    }
});
