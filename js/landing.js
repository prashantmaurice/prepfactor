	//ravikanth--------------------------------------------------------------------------------------------------------------------------------------
// JavaScript Document

var cakedetails = new Array() ;


/*
cakedetails = {
	
     	 ncakes:3,
	  name:["Cherrypine","Orangeflush","Hotcake"],
	  description:["Awsome pine flavour cake with tempting cherries","Orange flavoured cake jgdkjfhkjhvkkllkdbnlk","best hot jkgvkh hkjkghj"],
	  discount:["Rs 500</br>" , "" , ""],
	  price:["Rs 250" , "Rs 400 " , "Rs 150"],
	  ingredients:["<ul><li>ouyhfdlkhsdfl</li><li>ouyhfdlkhsdfl</li><li>ouyhfdlkhsdfl</li></ul>","<ul><li>ouyhfdlkhsdfl</li><li>ouyhfdlkhsdfl</li><li>ouyhfdlkhsdfl</li></ul>","<ul><li>ouyhfdlkhsdfl</li><li>ouyhfdlkhsdfl</li><li>ouyhfdlkhsdfl</li></ul>"],
	  id:["4","7","15"],
	  image:["cakepics/a0.jpg","cakepics/a1.jpg","cakepics/a2.jpg"],	
	           } ;



*/


//ravikanth--------------------------------------------------------------------------------------------------------------------------------------
var curr_slide = 1
curr_query = 1
running=0
curr_text = 2
curr_ticker=1
slide3=0
picchange=0;
$(document).ready(function(){
	

	alert('sfdgsfg');
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
	 
	 
//------------------------------------footer---------------------------------------------------------------------------------------------------
$("#footer").hover(function(){
			$(this).clearQueue();
			$(this).animate({top:50 +"%" },"fast");
		},function(){
			$(this).clearQueue();
			$(this).animate({top:90+"%"},"fast");								 
	});
//------------------------------------maps---------------------------------------------------------------------------------------------------


//--------------------------index titles-----------------------------------------------------------------------------------------------------------------------------------
	$("#aboutid").click(function(){
		slideto(1);
	});
	$("#menuid").click(function(){
		loadgallery(1);
		slideto(2);
	});
	$("#contactsid").click(function(){
		slideto(3);
	});
	$(".index").hover(function() {
    			$(this).stop().animate({"color": "#FFAE00"}, "fast");
		},function() {
    			$(this).stop().animate({"color": "#FFFFFF"}, "fast");
		});
//------------------------------------slide3------------------------------------------------------------------------------------------------------------------------------------------------
$(".categorystylehigh").hover(function(){
			$(this).clearQueue();
			$(this).animate({opacity:1 },"fast");
		},function(){
			$(this).clearQueue();
			$(this).animate({opacity:0},"fast");								 
	});

$("#cat1").click(function(){
			loadgallery(1);
		});
$("#cat2").click(function(){
			
			loadgallery(2);
		});
$("#cat3").click(function(){
			
			loadgallery(3);
		});
$("#cat4").click(function(){
			
			loadgallery(4);
		});
//--------------------------links slide4 color change-----------------------------------------------------------------------------------------------------------------------------------
	$("#facebook").hover(function(){
			//alert("wfegsefgj");
			$("#facebookimg").clearQueue();
			$("#facebookimg").animate({opacity:0},300);
		},function(){
			$("#facebookimg").clearQueue();
			$("#facebookimg").animate({opacity:1},300);							 
	});
	$("#twitter").hover(function(){
			//alert("wfegsefgj");
			$("#twitterimg").clearQueue();
			$("#twitterimg").animate({opacity:0},300);
		},function(){
			$("#twitterimg").clearQueue();
			$("#twitterimg").animate({opacity:1},300);
	});


document.addEventListener('keydown', function(event) {
    if((event.keyCode == 39)&&(running==0)) {
        moveNext();
	//alert('lsdiugfbygb');
		
    }
    else if((event.keyCode  == 37)&&(running==0)) {	//left arrow
       movePrev();
	//alert('hdsgo8hvgdvgbo');
    }
        else if((event.keyCode  == 38)&&(running==0)) {		//uparrow
       movePrev();
	//alert('hdsgo8hvgdvgbo');
    }
        else if((event.keyCode  == 40)&&(running==0)) {		//downarrow
       moveNext();
	//alert('hdsgo8hvgdvgbo');
    }
});
});

function moveNext(){
	if(curr_slide == 4){
		clearInterval(timer);
		return 0;
	}
	running=1;
	curr_slide+=1;
	maphighlight();
	$(".mainbg").stop(true, true).animate({"left":"+=-10%"},"5000");
	$("#pointer").stop(true, true).animate({"left":"+=15%"},"5000");
	$(".slide").stop(true, true).animate({"left":"+=-100%"},"5000", function(){
		switch(curr_slide)
		{
		case 1:
			slide1on();
			
			break;
		case 2:

			slide1off();
			break;
		case 3:
			//galaxy1rotate(-300);
			//slide1on();
			break;
		case 4:

			//slide1on();
			break;
		case 5:
			slide5on();
			break;
		}
		running=0;
	});
		
	
	
	return 0;
}
function movePrev(){
	if(curr_slide == 1){
		return 0;
	}
	running=1;
	curr_slide-=1;
	maphighlight();
	$(".mainbg").stop(true, true).animate({"left":"+=10%"},"5000");
	$("#pointer").stop(true, true).animate({"left":"+=-15%"},"5000");
	$(".slide").stop(true, true).animate({"left":"+=100%"},"5000", function(){
		switch(curr_slide)
		{
		case 1:
			slide1on();

			//slide2offprev();	
			break;
		case 2:
			//slide1off();
			//slide2onnext();

			break;
		case 3:

			//slide1on();
			break;
		case 4:
			//slide1on();
			slide5off();

			break;
		case 5:
			//slide1on();

			break;
		}
		running=0;
	});
	
	
	return 0;
}

function wheelScroll(e){
	var evt=window.event || e //equalize event object
    var delta=evt.detail? evt.detail*(-120) : evt.wheelDelta
    if ((delta>=120)&&(running==0)&&(curr_slide !=2)){
    	movePrev();
    	$(".slide").clearQueue();
    	return 0;
    }
    else if((running==0)&&(delta<=-120)&&(curr_slide !=2)){
    	moveNext();
       	$(".slide").clearQueue();
    	return 0;
    }
}

function maphighlight(){
	if(curr_slide==1){
		$(".mapsingle").clearQueue();
		$(".mapsingle").animate({opacity:0.3},10,function(){
			$("#map1").animate({opacity:1},10);
		});}
	if(curr_slide==2){
		$(".mapsingle").clearQueue();
		$(".mapsingle").animate({opacity:0.3},10,function(){
			$("#map2").animate({opacity:1},10);
		});}
	if(curr_slide==3){
		$(".mapsingle").clearQueue();
		$(".mapsingle").animate({opacity:0.3},10,function(){
			$("#map3").animate({opacity:1},10);
		});}
	if(curr_slide==4){
		$(".mapsingle").clearQueue();
		$(".mapsingle").animate({opacity:0.3},10,function(){
			$("#map4").animate({opacity:1},10);
		});}
	if(curr_slide==5){
		$(".mapsingle").clearQueue();
		$(".mapsingle").animate({opacity:0.3},10,function(){
			$("#map5").animate({opacity:1},10);
		});}
}
function slideto(i){
	if(i>curr_slide){
		//alert("dsdjg")
		while(i!=curr_slide){
			moveNext();
			//delay(0.1);
		}
		while(running==1){
			delay(1);
		}
		delay(50);
		maphighlight();
	}
	else if(i<curr_slide){
		//alert("dsdjg")
		while(i!=curr_slide){
			movePrev();
			//delay(0.1);
		}
		while(running==1){
			delay(1);
		}
		delay(50);
		maphighlight();
	}
	
}

function slide1on(){
	$("#wipeleft").animate({opacity:0},100);
}
function slide1off(){	
	$("#wipeleft").animate({opacity:1},100);
}
function slide5on(){
	$("#wiperight").animate({opacity:0},100);
}
function slide5off(){
	$("#wiperight").animate({opacity:1},100);
}




function reloadpics(){
	//$("#picholder").empty();
	$("#picholder").empty();
	var m=cakedetails.ncakes;
	//n=k+3;
	for (var i=1;i <= m; i++)
	{
		
		document.getElementById("picholder").innerHTML = document.getElementById("picholder").innerHTML + "<div id = ' a' class='picindividualbase'><div id= 'p"+i+"' class='picindividualdetails'><button  style='padding:0px; border-radius:0em; border:none;' onClick='ordercakefinal("+i+")' ><img  src='img/order.jpg'   /></button></div><div class='picindividual'><img  class='cakespics' src='"+cakedetails.image[i]+"'/></div> <div class='picindividualdetails2'><span class='pichead1'>"+cakedetails.name[i]+"</span><br/><span class='pichead2'>Ingredients:<br/>"+cakedetails.ingredients[i]+"</span><div class='line2'></div><span class='pichead3' >"+cakedetails.price[i]+"</span><div class='line2'></div></div></div>"
					    <!-- document.getElementById("picholder").innerHTML = document.getElementById("picholder").innerHTML + "<div id = ' b" +i+"' class='picindividualdetails'></div>"  -->
					      <!-- <input type='checkbox' style='position:absolute;z-index:5; left:200px;top:0px;' /> -->
	}
	reloadpicsjquery();
}
function reloadpicsjquery(){
		$(".picindividualdetails").hover(function(){
			//alert('hover');
			$(this).clearQueue();
			$(this).animate({opacity:0.92 },"fast");
		},function(){
			$(this).clearQueue();
			$(this).animate({opacity:0},"fast");								 
		});
		/*var m=cakedetails.ncakes-1;
		for (var i=0;i <= m; i++)
		{
			$("#p"+i).click(function(){ordercakefinal(i);});
		}*/
		
		$(".picindividualbase").hover(function() {
    			$(this).stop().animate({"border-color": ":#FFFF33"}, "fast");
		},function() {
    			$(this).stop().animate({"border-color": "#FFFFFF"}, "fast");
		});
}

var mousewheelevt=(/Firefox/i.test(navigator.userAgent))? "DOMMouseScroll" : "mousewheel" //FF doesn't recognize mousewheel as of FF3.x
 
if (document.attachEvent) //if IE (and Opera depending on user setting)
    document.attachEvent("on"+mousewheelevt, wheelScroll)
else if (document.addEventListener) //WC3 browsers
    document.addEventListener(mousewheelevt, wheelScroll, false)