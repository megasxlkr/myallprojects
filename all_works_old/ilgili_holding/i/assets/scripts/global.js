// JavaScript Document
/* madebycat */


/* ------------------------------------ WINDOW.LOAD ------------------------------- */
$(window).load(function(){

}); // END___ window.load





/* ------------------------------------ FUNCTION ------------------------------- */
$(function(){

	/* home slider */
	var $example = $('#homeSlider'),
		$frame = $('.frame', $example);

	// Calling mightySlider via jQuery proxy
	$frame.mightySlider({
		speed: 2700,
		autoScale: 1,
		easing: 'easeInOutQuad',
		viewport: 'fill',
		
		// Navigation options
		navigation: {
			horizontal: 0,
			slideSize: '100%',
			keyboardNavBy: null,
			activateOn: null
		},

		// Dragging options
		dragging: {
			swingSpeed:    0.1,
			mouseDragging: 0,    // Enable navigation by dragging the slideElement with mouse cursor.
			touchDragging: 0,    // Enable navigation by dragging the slideElement with touch events.
			releaseSwing:  0
		},

		// Pages options
		pages: {
			activateOn: 'click'
		},

		// Commands options
		// commands: {
			// pages: 1,
			// buttons: 1
		// },
		
		//startRandom:  1,
		
		scrollBar: {
		  clickBar: 0
		},
		
		cycling: {
			cycleBy:       'slides', // Enable automatic cycling by 'slides' or 'pages'.
			pauseTime:     5000, // Delay between cycles in milliseconds.
			loop:          1,    // Repeat cycling when last slide/page is activated.
			pauseOnHover:  0,    // Pause cycling when mouse hovers over the FRAME.
			startPaused:   0     // Whether to start in paused sate.
	}
	});
	
	
	// project detail vertical slider
	$('.flexslider').flexslider({
		animation: "slide",
		//easing: "swing",
		direction: "vertical",
		prevText: "",
		nextText: ""
	});
	
	// homepage content slider
	$('.homeContentSlider').each(function(){
		$('.homeContentSlider').flexslider({
			animation: "fade",
			//easing: "swing",
			direction: "horizontal",
			prevText: "",
			nextText: "",
			controlNav: false,
			directionNav: true,
			slideshow: false
		});
	});
	// homepage content slider
	$('.homeContentSliderHaber').each(function(){
		$('.homeContentSliderHaber').flexslider({
			animation: "fade",
			//easing: "swing",
			direction: "horizontal",
			prevText: "",
			nextText: "",
			controlNav: false,
			directionNav: true,
			slideshow: false
		});	
	});
	
	
	//$('.flex-direction-nav').wrapAll('<div class="flexButtoContainer" />');
	//$('.flex-direction-nav').wrapAll('<div class="container" />');
	//$('.flex-direction-nav').wrapAll('<div class="twelve columns" />');
	//$('.flexLogo').appendTo('.flexButtoContainer .container .twelve.columns');
	$('.flexLogo').wrapAll('<div class="flexLogoContainer" />');
	$('.flexLogo').wrapAll('<div class="container" />');
	$('.flexLogo').wrapAll('<div class="twelve columns" />');
	
	
	/* projeler before after slider */
	$('.beforeAfterSlider').beforeAfter({
		showFullLinks : false,
		introPosition : .35,
		dividerColor: '#fff'
	});
	$('.beforeAfter .ui-draggable.ui-draggable-handle').css({left:333});
	
	// check if has img for before after
	var hasImg = $('.beforeAfterSlider div:eq(3)').length;
	if(hasImg===0){ $('.beforeAfter').hide(); }

	
	// home content height
	wW = $(window).width();
	/* if(wW>=768 && wW<959){
		$('#homeSlider, .frame, .slide_element, .slide').height(wHeight(290));
	} else {
		$('#homeSlider, .frame, .slide_element, .slide').height(wHeight(0));
	} */
	
	
	// gateaways height fix
	if(wW>=768 && wW<959){
		$('.gateaways .box').height( gateHeight(0) );
	} else {
		$('.gateaways .box').height( gateHeight(0) );
	}
		
	
	// search input show-hide
	formInputValue('.searchKeyword');
	
	//search validate
	$(".searchForm .searchSubmit, #innerSearch .searchSubmit").click(function(){
		keyword = $(this).parent().find(".searchKeyword");
		if( (keyword.val().length < 3) || (keyword.val()==keyword.attr('alt'))){
			alert($('.msgSearchForm').text());
			keyword.focus();
			return false;
		 }
		 else{
			sendform(".searchForm");
			return false;
		}
	});
	
	//search validate with hiting ENTER
	$('.searchForm .searchKeyword, #innerSearch .searchKeyword').keypress(function(event) {
		keyword = $(this);
		var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13') {
			if(keyword.val().length < 3){
					alert($('.msgSearchForm').text());
					return false;
			 }
			 else{
					sendform(".searchForm");
					return false;
			}  
		}
	});
	
	
	// search anim
	$('.searchOpen').click(function(){
		if(!$(this).hasClass('active')){
			$('.searchContainer').animate({ marginTop:-30, marginBottom:6 }, 300, function() {});
			$(this).addClass('active');
			$('.lang ul li a').addClass('noBorder');
		} else {
			$('.searchContainer').animate({ marginTop:-99, marginBottom:30 }, 300, function() {});
			$(this).removeClass('active');
			$('.lang ul li a').removeClass('noBorder');
		}
	});
	
	
	// mobile menu open
	$('.mobileMenuOpen').click(function(){
		if($(this).hasClass('active')){
			$(this).removeClass('active');
			$('.mainMenu').slideUp('fast', function(){ $('.searchContainer').slideUp('fast'); });
		} else {
			$(this).addClass('active');
			$('.searchContainer').slideDown('fast', function(){ $('.mainMenu').slideDown('fast'); });
		}
	});
	
	
	// submenu open
	$('.subMenu ul li').each(function(){
		if( $(this).hasClass('active') ){
			$('.subMenu .mobDropdown').html($(this).find('a span').text());
		}
	});
	$('.subMenu .mobDropdown').click(function(){
		$('.subMenu ul').slideUp();
		if($(this).hasClass('active')==false){
			$(this).addClass('active');
			$(this).parent().find('ul').slideDown();
			$('.subMenu .mobDropdown').html($(this).text());
		} else {
			$(this).parent().find('ul').slideUp('slow', function(){
				$(this).parent().find('.mobDropdown').removeClass('active');
				$(this).parent().find('ul li span').removeClass('active');
				$(this).parent().find('.projelerMenuInner').hide();
			});
		}
	});
	
	
	// custom selectbox
	$('.timeSelect').customSelect();
	
	
	// bulten icon height fix
	$('.bultenler .bulten .icon').height( $('.bultenler .bulten .text').height() );
	
	
	// news animation
	$('.newsContainer .news').each(function(){
		if($(this).hasClass('active')){
			$(this).find('.dateAndClose').show();
			$(this).find('.info').show();
		}
	});
	
	$('.newsContainer .news').click(function(){
		if( !$(this).hasClass('active') ){
			// close active news
			$('.newsContainer .news .info').slideUp('fast', function(){
				$('.newsContainer .news .dateAndClose').slideUp('fast');
				$('.newsContainer .news').removeClass('active');
			});
			// open clicked one
			$(this).find('.info').slideDown('fast', function(){
				$(this).parent().find('.dateAndClose').slideDown('fast');
				$(this).parent().addClass('active');
			});
		}
	});
	
	$('.newsContainer .news .dateAndClose small').click(function(){
		$(this).parent().parent().find('.info').slideUp('fast', function(){
			$(this).parent().parent().find('.dateAndClose').slideUp('fast');
			$(this).parent().removeClass('active');
		});
	});
	
	
	// accordion
	$(".accordion .item span").click(function(){
		if($(this).hasClass("current")){
			$(".accordion .item span").removeClass('current');
			$(this).next('.accordion .item .pane').slideUp('slow');
		}
		else{
			$(".accordion .item span").removeClass('current');
			$(".accordion .item .pane").slideUp('slow');
			
			$(this).next('.accordion .item .pane').slideDown('slow');
			$(this).addClass('current');
		}
	});	
	
	
	// sitemap wrapping
	/* var i, num = 1, $ul = $('.sitemap > ul'), $li = $('.sitemap > ul > li');
	for (i=0;i<$li.length;i+=num) {
		$li.slice(i,i+num).wrapAll('<div class="four columns" />');
	}
	$ul.find('> div').unwrap(); */
	
	
	
	// box height fix
	$('.boxes .box').not('.boxAnim .box').matchHeight();
	
	
	// yonetim box animation
	//boxAnimHeight();
	$('.boxAnim .box').click(function(){
		if(!$(this).hasClass('active')){
			$('.boxAnim .box').removeClass('active');
			$('.boxAnim .box .cv').hide();
			
			$(this).addClass('active');
			$(this).find('.cv').css('display','inline-block');;
		} else {
			$('.boxAnim .box .cv').hide();
			$('.boxAnim .box').removeClass('active');
		}
		return false;
	});
	
	
	/* empty box set */
	$('.boxes').each(function(){
		$(this).find('.box').each(function(){
			spanText = $(this).find('.info span').text();
			if(spanText==='BOS'){ console.log('girdi'); $(this).hide(); }
		});
	});
	
	
	
	if(wW>=960){
		boxwrap(4);
		boxclass(5);
	} else if(wW>=768 && wW<=959){
		boxwrap(3);
		boxclass(4);
	}
	
	
	// photo gallery init
	if( $('body').find('.boxZoom').length>0 ) {
		lightBox('.boxZoom a');
	}
	
	
	// subpage top bg height
	$('.subTopBG').height( $('.subTopBG img').height()-100 );
	
	
	// projeler thumb logo height fix
	//setTimeout(function(){ prLogoHeight(); }, 100);
	
	
	// projeler EN text fix
	lang = $('html').attr('lang')
	if(lang==="en"){
		$('.projelerMenuInner').each(function(){
			$('li',this).each(function(){
				$('small',this).text('NEW PROJECT');
			});
		});
	}
	
	
	// projeler clone for mobile
	isMobileThumb = false;
	if(wW<768){
		$('.projelerMenu .projelerMenuInner').each(function(){
			rel = $(this);
			$('.subMenuProje ul li span').each(function(){
				rel2 = $(this);
				if(rel.attr('rel')===rel2.attr('rel')){
					rel.clone().appendTo(rel2.parent());
					isMobileThumb = true;
				}
			});
		});
	} else {
		isMobileThumb = false;
	}
	
	// projeler menu animation
	$('.subMenuProje ul li span').click(function(){
		if(!$(this).hasClass('active')){
			rel = $(this);
			$('.subMenuProje ul li span').removeClass('active');
			$(this).addClass('active');
			$('.projelerMenu .projelerMenuInner').each(function(){
				rel2 = $(this);
				if(rel.attr('rel')===rel2.attr('rel')){
					if(isMobileThumb===false){
						$('.projelerMenu .projelerMenuInner').hide();
						$(this).slideDown('fast');
						//prLogoHeight();
					} else {
						$('.subMenuProje ul li .projelerMenuInner').slideUp('fast');
						rel.parent().find('.projelerMenuInner').slideDown('fast');
						rel.parent().find('.projelerMenuInner ul').css('display','inline-block');
					}
				}
			});
		} else {
			$('.subMenuProje ul li span').removeClass('active');
			$('.projelerMenuInner').slideUp('fast');
		}
	});
	
	
	// proje url fix
	pUrl = $('.projectUrl a').text();
	if(pUrl===" "){ $('.projectUrl').text('&nbsp;').css({textIndent:-9999}); }
	
	
	// image mask fix
	//$(".stretchMe").anystretch();
	
	
	/*Projeler Opacity*/
	if ($("body").attr("class") == "projelerPage") {
		var hash = window.location.hash;
		var hashArray = hash.split("#");
		onlyHash = hashArray[1];
		if (onlyHash != null) {
		   $(".subpage .container .four").each(function() {
			   if ($(".projelerListe h2", this).attr("rel") !== onlyHash) {
					   $(this).each(function() {
						 $(this).css("opacity", "0.5");
					   })
			   }
		   })
	}}
	/*Projeler Opacity*/
	
	
	
	/* ------------------------------------ WINDOW.RESIZE ------------------------------- */
	$(window).resize(function(){
				
		// projeler clone for mobile
		wW = $(window).width();
		if(wW<768){
			$('.projelerMenu .projelerMenuInner').slideUp('fast');
			$('.subMenuProje ul li span').removeClass('active');
			$('.subMenuProje .mobDropdown').removeClass('active');
			$('.subMenuProje ul').hide();
			
			$('.projelerMenu .projelerMenuInner').each(function(){
				rel = $(this);
				$('.subMenuProje ul li span').each(function(){
					rel2 = $(this);
					if(rel.attr('rel')===rel2.attr('rel')){
						rel2.parent().find('.projelerMenuInner').remove();
						rel.clone().appendTo(rel2.parent());
						$('.subMenuProje ul li .projelerMenuInner').hide();
						isMobileThumb = true;
					}
				});
			});
		} else {
			$('.subMenuProje ul li .projelerMenuInner').hide();
			$('.subMenuProje ul li span').removeClass('active');
			$('.subMenuProje ul li .projelerMenuInner').remove();
			$('.subMenuProje ul').show();
			isMobileThumb = false;
		}
		
		
		// home content height
		/* wW = $(window).width();
		if(wW>=768 && wW<959){
			$('#homeSlider, .frame, .slide_element, .slide').height(wHeight(290));
		} else {
			$('#homeSlider, .frame, .slide_element, .slide').height(wHeight(0));
		} */
		
		
		// gateaways height fix
		if(wW>=768 && wW<959){
			$('.gateaways .box').height( gateHeight(0) );
		} else {
			$('.gateaways .box').height( gateHeight(0) );
		}
		
		
		// subpage top bg height
		$('.subTopBG').height( $('.subTopBG img').height()-100 );
		
		
		// bulten icon height fix
		$('.bultenler .bulten .icon').height( $('.bultenler .bulten .text').height() );
		
		
		// yonetim box animation
		//boxAnimHeight();
		
		
		
		if(wW>=960){
			boxwrap(4);
			boxclass(5);
		} else if(wW>=768 && wW<=959){
			boxwrap(3);
			boxclass(4);
		}
		
		
	}); // END___ window.resize

}); // END___ function



/* ------------------------------------ DOCUMENT.READY ------------------------------- */
$(document).ready(function() {
	
	// sosyal image mask
	/* var imageHeight, wrapperHeight, overlap, container = $('.image-wrap'); 
 
    function centerImage() {
        imageHeight = container.find('img').height();
        wrapperHeight = container.height();
        overlap = (wrapperHeight - imageHeight) / 2;
        container.find('img').css('margin-top', overlap);
    }
     
    $(window).on("load resize", centerImage);
     
    var el = document.getElementById('wrapper');
    if (el.addEventListener) { 
        el.addEventListener("webkitTransitionEnd", centerImage, false); // Webkit event
        el.addEventListener("transitionend", centerImage, false); // FF event
        el.addEventListener("oTransitionEnd", centerImage, false); // Opera event
    } */
	
	// splash
$(".splash .close").click(function(){
		$(".overlay,.splash").fadeOut();
		return false;
	});

});


/* ------------------------------------ ALL FUNCTIONS ------------------------------- */



function boxAnimHeight(){
	$('.boxAnim').each(function(){
		$(this).find('.box').each(function(){
			$(this).find('p').css({ top: $(this).height() });
		});
	});
}


function prLogoHeight(){
	$('.prLogo').each(function(){
		logo = $(this);
		logoWidth = ( logo.width() ) / 2;
		logoHeight = ( logo.height() ) / 2;
		logo.css({marginLeft:-logoWidth, marginTop:-logoHeight});
	});
}


function wHeight(num){
	windowHeight = $(window).height();
	windowHeight = windowHeight - 100;
	windowHeight = windowHeight - num;
	return windowHeight;
}

// gateaway height
function gateHeight(num){
	windowwidth = $(window).width();
	windowwidth = (windowwidth / 5) + 5;
	windowwidth = windowwidth + num;
	return windowwidth;
}


// input hide and show value
function formInputValue(element) {
	$(element).click(function() {
		if (this.value == this.defaultValue) {this.value = '';}
	}).focusin(function() {
		if (this.value == this.defaultValue) {this.value = '';}
	});
	$(element).blur(function() {
		if (this.value == '') {
			this.value = this.defaultValue;
		}
	});
}


// lightbox
function lightBox(a){
	$(a).iLightBox({
		skin:"dark",
		path:"horizontal",
		fullViewPort:"fill",
		infinite:!0,
		linkId:"gallery",
		overlay: { opacity:1,blur:!1 },
		controls: { thumbnail:!1 },
		styles: { nextOffsetX:-45,prevOffsetX:-45 },
		callback: {
			onHide: function() {
				$('html').removeClass('galleryOpened');
			},
			onOpen: function() {
				$('html').addClass('galleryOpened');
			}
		},
	    controls: {
			fullscreen: true,
			arrows: true,
			thumbnail: false
		},
		infinite: false
	});
}



function boxwrap(n){
	var i, num = n, $ul = $('.boxAnim'), $li = $('.boxAnim .box');
	for (i=0;i<$li.length;i+=num) {
		$li.slice(i,i+num).wrapAll('<div class="boxes boxImgFix boxGray boxAnim clearfix" />');
	}
	$ul.find('> div').unwrap();
}

function boxclass(x){
	$('.boxAnim').each(function(){
		box = 1;
		$(this).find('.box').each(function(){
			$(this).removeClass('box1').removeClass('box2').removeClass('box3').removeClass('box4');
			if(box==x) box=1;
			$(this).addClass("box"+box);
			box++;
		});
	});
}