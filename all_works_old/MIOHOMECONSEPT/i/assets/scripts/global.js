/*
	BİRİM MOBILYA
	Javascript Development MadebyCAT
	http://www.madebycat.com
	2013
*/

	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
		BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
		iOS: function() {
			//return navigator.userAgent.match(/iPhone/i);
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
		Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
		Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
		any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};

		
	

function scrollToAnchor(aid){
    var aTag = $("h6[title='"+ aid +"']");
    $('html,body').animate({scrollTop: aTag.offset().top},'slow');
}

function triggerGallery()
{
	if(!isMobile.any()){
		
		setTimeout(function(){
			//Trigger Galeri
			$('.ilightbox').iLightBox({
				path:'horizontal',
				fullViewPort: 'fill',
				overlay: {
				  opacity: 1
			
				},
				swipe:true,
				styles: {
					nextOffsetX: -45,
					prevOffsetX: -45
				}
			});
		},2000)
		
	}else{
		
		setTimeout(function(){
			//Trigger Galeri
			$('.ilightbox').iLightBox({
				path:'horizontal',
				fullViewPort: 'fill',
				overlay: {
				  opacity: 1
			
				},
				controls: {
					fullscreen: true,
					arrows: true
				},
				swipe:true,
				styles: {
					nextOffsetX: -45,
					prevOffsetX: -45
				}
			});
		},2000)
		
		
	}	
	
	
}



$(document).ready(function(){


	$("a.caption-close").click(function(){
		Options=$("#newsCont").index(this);
		$("#newsCont").hide();
	});

		$("#news-caption").each(function(){
			$(this).carouFredSel({
				 items: 1,
				//direction           : "up",
				interval: false,
				responsive: false, 
				auto: true,
				prev	: {	
					button	: "#foo5_prev",
					key		: "left"
				},
				next	: { 
					button	: "#foo5_next",
					key		: "right"
				},
				scroll : {
					items           : 1,
					//easing          : "elastic",
					duration        : 1000,                         
					pauseOnHover    : true
				}                   
			});
		});	
	
		// Using default configuration
    //$('#news-caption').carouFredSel();

    // Using custom configuration
   /* $('#news-caption').carouFredSel({
        items               : 1,
        //direction           : "up",
		interval: false,
		responsive: false, 
		auto: true,
		prev	: {	
			button	: "#foo5_prev",
			key		: "left"
		},
		next	: { 
			button	: "#foo5_next",
			key		: "right"
		},
        scroll : {
            items           : 1,
			//easing          : "elastic",
            duration        : 1000,                         
            pauseOnHover    : true
        }                   
    });*/
	
	$('#video_1').iLightBox({
		smartRecognition: true
	});
	

	
	
	if(!isMobile.any()){

		$('#photoGallery li a.ilightbox').iLightBox({
			skin:"dark",
			path:'horizontal',
			fullViewPort: 'fill',
			overlay: {
			  opacity: 1
			},
			arrows: true,
			swipe:true,
			styles: {
				nextOffsetX: -45,
				prevOffsetX: -45
			}
		});
		
	}else{
		
		$('#photoGallery li a.ilightbox').iLightBox({
			skin:"dark",
			path:'horizontal',
			fullViewPort: 'fill',
			overlay: {
			  opacity: 1
		
			},
			controls: {
				 fullscreen: true,
				arrows: true
			},
			swipe:true
		});
	}
	
	lang = $("body").attr("lang");
	var xmlLang = $("body").attr("xml:lang");
	if(lang == "" || lang == null)
	{
		lang = xmlLang;
	}
	
	var thisHref = $("#triggerGallery").attr("href");
	$(".placesWrap #photoGallery li a").each(function(){
		if($(this).attr("href") == thisHref)
		{
			$(this).parents("li").remove();
		}
	});
	if($(".placesWrap #photoGallery li").length <= 0)
	{
		$("#triggerGallery").hide();
	}

	//product image center
	var top = $(".colLeft").height();
	top = top - $(".colLeft").find("img").height();
	top = (top / 3.5) + 30;
	$(".productDetail .colLeft img").css({"marginTop":top,"marginBottom":top});
	
	//home start
	
	$('#bannerBoxes').css("right",-$(window).width());
	$("#bannerBoxes .bgOverlay").height($(window).height()-120);
	$(".boxItem div").not(".pagination").height($(window).height()-140);
	boxesCol = ($(window).width() - 40) * 0.25;
	centerCol = ($(window).width() - 40);
	centerCol = centerCol * 0.50;
	
	$(".boxItem .leftCol .infoBoxes").css({"width":boxesCol - 90,marginLeft:-(boxesCol - 90) / 2});
	$(".boxItem .leftCol").width(boxesCol);
	$(".boxItem .centerCol, .boxItem .centerCol img").width(centerCol);
	$(".boxItem .rightCol, .boxItem .rightCol img").width(boxesCol);
	
	if($("html").hasClass("mobile"))
	{
		$("body").css("overflow","auto");
		$("#bannerBoxes").hide();
	}else{
		$(".caption a").live("click",function(){
			//slide stop
			$('#maximage').cycle("pause");
			$("#bannerBoxes .bgOverlay").height($(window).height()-120);
			$(".boxItem div").not(".pagination").height($(window).height()-140);
			var relAttr = $(this).attr("rel");
			setTimeout(function(){
				$("."+relAttr).carouFredSel({
					items:1,
					circular: false,
					infinite: true,
					auto :{
						play:true,
						delay:7000
					},
					pagination	: ".pagination"
				});
			},500);
			
			var relAttr = $(this).attr("rel");
			$("#bannerBoxes .boxItem").each(function(){
				if($(this).attr("original-title") == relAttr)
				{
					$(this).show();
				}
			});
			$('#bannerBoxes').stop().animate({'right': 0},{queue:false, duration:1500, easing:"easeInOutCubic"});
			setTimeout(function(){
				$("#bannerBoxes .bgOverlay").fadeIn("slow");
			},1550);
			return false;
		});
	}
	
	$("#boxClose").live("click",function(){
		//slide resume
		$('#maximage').cycle("resume");
		$('#bannerBoxes').animate({'right': -$(window).width()},{queue:false, duration:1500, easing:"easeInOutCubic"});
		$("#bannerBoxes .bgOverlay").fadeOut("slow");
		setTimeout(function(){
			$("#bannerBoxes .boxItem").hide();
		},2000);
		return false;
	});
	
	//home end
	
	//Slider Remove Ok
	if($("#foo1 a").length <= 3)
	{
		$(".image_carousel .slideControls").remove();
	}
	
	//Kullanılan Ürünler
	if($("#foo2 div").length == 0)
	{
		$(".product_carousel").remove();
	}
	
	/*-== Project Detail Start ==-*/

	setTimeout(function(){
		$("#foo2").each(function(){
			$(this).carouFredSel({
				circular: false,
				infinite: false,
				auto 	: false,
				prev	: {	
					button	: "#foo2_prev",
					key		: "left"
				},
				next	: { 
					button	: "#foo2_next",
					key		: "right"
				}
			});
		});
	},1000);
	
	/*-== Project Detail End ==-*/
	
	/*-== Tab Control Function Start ==-*/
	
	if($("#photoGallery li").length <= 0)
	{
		$(".tabsButtons li[title=tab01]").remove();
		$("#technicalDraw").parent("div.tabSection").remove();
	}
	
	if($("#technicalDraw li").length <= 0)
	{
		$(".tabsButtons li[title=tab02]").remove();
		$("#technicalDraw").parent("div.tabSection").remove();
	}
	
	if($(".technicalInfo").html() == "")
	{
		$(".tabsButtons li[title=tab03]").remove();
		$(".technicalInfo").parent("div.tabSection").remove();
	}
	
	if($(".materialsList li").length <= 0)
	{
		$(".tabsButtons li[title=tab04]").remove();
		$(".materialsList").parent("div.tabSection").remove();
	}
	
	$(".tabsButtons li:last-child").addClass("lie");
	
	/*-== Tab Control Function End ==-*/
	
	/*-==  NewsList Start ==-*/

		$('.referencesList').equalize();
		
	/*-==  NewsList Start ==-*/
	
	
	//Designer Hover
	$(".designerList li a").hover(function(){
	   $(this).find("span").fadeIn("slow");
	},function(){
	   $(this).find("span").fadeOut("slow");
	})

	/*-=== Splash Start ===-*/
	
	$(".splashBtn").click(function(){
		 var relVal = $(this).attr("rel");
		 $(".overlay").show();
		 
		 $(".splash").each(function(){
			if($(this).attr("title") == relVal)
			 {
				 $(this).attr("title", relVal).fadeIn(500);
			 }
		});
		 return false;
	});
	
	$(".closeBtn").live("click",function(){
		$(this).parent(".splash, .splashMembership").fadeOut(400);
		$(".overlay").fadeOut(600);
		return false;
	});
	
	$(".overlay").live("click",function(){
		$(".splash, .splashMembership").fadeOut(400);
		$(this).fadeOut(600);
		return false;
	});
	
	/*-=== Splash End ===-*/
	
	/*-=== Search Toggle Start ===-*/
	
	$("#header .srcWrap a").click(function(){
		$(this).parent().find("form").slideToggle();
		$(this).addClass("active");
		var srcForm = true;
		$("input[name='searchKeyword']").focus();
	});
	
	/*-=== Search Toggle End ===-*/
	
	// Home Trigger maximage
	$('#maximage').each(function(){
		$(this).maximage({
			cycleOptions:{
				speed:    1200,
				timeout:  6000,
				random: 0,
				easing:  'easeOutQuad',
				fx: 'scrollVert',
				randomizeEffects: false,
				prev: '#arrow_prev',
				next: '#arrow_next'
			},
			cssTransitions:true,
			onFirstImageLoaded: function(){
				setTimeout(function(){
					$('.cycle-loader').hide();
					$('#maximage').fadeIn('slow');
					$('.factoryAddress').fadeIn('slow');
				},1000);
			}
		});
	});
	
	// 404 Trigger maximage
	$('#maximagev2').each(function(){
		$(this).maximage();
	});
		
	/*-== Product List Start ==-*/
	
	calculate = ($(window).width() - 23) / 4;
	$(".productList").width($(window).width());
	$(".productList li, .productList li img").width(calculate);
	
	imageSlide = ($(window).width() - 40) / 3;
	$(".image_carousel div a, .image_carousel div img").not(".slideControls a").width(imageSlide);
	
	(function($){

	   $.fn.wrapChildren = function(options) {
	
		var options = $.extend({
								  childElem : undefined,
								  sets : 1,
								  wrapper : 'div'
								}, options || {});
		if (options.childElem === undefined) return this;
	
	 return this.each(function() {
	  var elems = $(this).children(options.childElem);
	  var arr = [];
	
	  elems.each(function(i,value) {
		arr.push(value);
		if (((i + 1) % options.sets === 0) || (i === elems.length -1))
	   {
		 var set = $(arr);
		 arr = [];
		 set.wrapAll($("<" + options.wrapper + ">"));
	   }
	  });
		});
	
	  }
	
	})(jQuery);
	

	$('#foo1').wrapChildren({ childElem : 'a' , sets: 3});
	
	if(!isMobile.any()){

	setTimeout(function(){
		$("#foo1").each(function(){
			$(this).carouFredSel({
				circular:false,
				infinite:false,
				auto:false,
				items:1,
				direction:"up",
				mousewheel: true,
				prev: {
					button:"#foo1_prev",
					onAfter:function(){
						var pos = $("#foo1").triggerHandler("currentPosition") + 1;
						var itemCount = $("#foo1 div").length;
						$(".slideNumbers").html(pos + "/" + itemCount);
					}
				},
				next: {
					button:"#foo1_next",
					onAfter:function(){
						var pos = $("#foo1").triggerHandler("currentPosition") + 1;
						var itemCount = $("#foo1 div").length;
						$(".slideNumbers").html(pos + "/" + itemCount);
					}
				},
				scrool:{
					fx: "crossfade",
					pauseOnHover: true,
					easing: 'elastic',
					onAfter:function(data){
						data.items.hide();
					}
				}
			});
			var pos = $("#foo1").triggerHandler("currentPosition") + 1;
			var itemCount = $("#foo1 div").length;
			$(".slideNumbers").html(pos + "/" + itemCount);
		});
	},500);
		
	}else{
	
	$('.slideControls').hide();
	
	
	}

	
	
	
	/*-== Product List End ==-*/
	
	/*-== Project List Start ==-*/

	projectList = ($(window).width() - 20) / 2;
	$(".projectList li img").width(projectList);
	
	/*-== Project List End ==-*/
	
	/*-== Designer List Start ==-*/

	designerList = ($(window).width() - 20) / 4;
	$(".designerList li img, .designerList li div").width(designerList);
	
	/*-== Designer List End ==-*/
	
	/*-== Product Detail Start ==-*/

	productDetail = ($(window).width() - 435);
	$(".productDetail .colLeft, .productDetail .colLeft img").width(productDetail);
	
	/*-== Product Detail End ==-*/
	
	/*-== Project Detail Start ==-*/

	projectDetail = ($(window).width() - 435);
	$(".projectDetail .colLeft, .projectDetail .colLeft img.projectImg").width(projectDetail);
	
	/*-== Project Detail End ==-*/
	
	$(window).bind("resize",function() {
		
		//product image center
		var top = $(".colLeft").height();
		top = top - $(".colLeft").find("img").height();
		top = (top / 3.5) + 30;
		$(".productDetail .colLeft img").css({"marginTop":top,"marginBottom":top});
	
		//home start
		
		$("#bannerBoxes .bgOverlay").height($(window).height()-120);
		$(".boxItem div").not(".pagination").height($(window).height()-140);
		boxesCol = ($(window).width() - 40) * 0.25;
		centerCol = ($(window).width() - 40);
		centerCol = centerCol * 0.50;
		
		$(".boxItem .leftCol .infoBoxes").css({"width":boxesCol - 90,marginLeft:-(boxesCol - 90) / 2})
		$(".boxItem .leftCol").width(boxesCol);
		$(".boxItem .centerCol, .boxItem .centerCol img").width(centerCol);
		$(".boxItem .rightCol, .boxItem .rightCol img").width(boxesCol);
		
		$(".boxItem").each(function(){
			$(this).find(".slide").carouFredSel({
				items:1,
				circular: false,
				infinite: true,
				auto :{
					play:true,
					delay:7000
				},
				pagination: ".pagination"
			});
		});
		
		$(".boxItem").each(function(){
		  if($(this).is(":visible") == true)
		  {
			$(this).find(".slide").carouFredSel({
				items:1,
				circular: false,
				infinite: true,
				auto :{
					play:true,
					delay:7000
				},
				pagination: ".pagination"
			});
		  }
		});
			
		//home end
		
		/*-==  AboutUs Start ==-*/
	
		$("#carousel").each(function(){
			$(this).carouFredSel({
				direction: 'up',
				auto: false,
				scroll: {
					duration: 1000
				},
				pagination: {
					container: '#pager',
					anchorBuilder: function() {
						return '<a href="#">'+ $(this).find("img.itemImg").attr("alt") +'</a>';
					}
				}
			});
		});

		/*-==  AboutUs Start End ==-*/
		
		/*-==  Mekanlar Kullanılan Ürünler Start ==-*/
		
		$("#foo2").each(function(){
			$(this).carouFredSel({
				circular: false,
				infinite: false,
				auto 	: false,
				prev	: {	
					button	: "#foo2_prev",
					key		: "left"
				},
				next	: { 
					button	: "#foo2_next",
					key		: "right"
				}
			});
		});
		
		/*-==  Mekanlar Kullanılan Ürünler End ==-*/
		
		calculate = ($(window).width() - 23) / 4;
		$(".productList").width($(window).width());
		$(".productList li, .productList li img").width(calculate);
		
		imageSlide = ($(window).width() - 40) / 3;
		$(".image_carousel div a, .image_carousel div img").not(".slideControls a").width(imageSlide);
		
		projectList = ($(window).width() - 20) / 2;
		$(".projectList li img").width(projectList);
		
		designerList = ($(window).width() - 20) / 4;
		$(".designerList li img, .designerList li div").width(designerList);
		
		if($("body").hasClass("ilightbox-noscroll"))
		{
			productDetail = ($(window).width() - 455);
			$(".productDetail .colLeft, .productDetail .colLeft img").width(productDetail);
			
			projectDetail = ($(window).width() - 455);
			$(".projectDetail .colLeft, .projectDetail .colLeft img.projectImg").width(projectDetail);
		}
		else
		{
			productDetail = ($(window).width() - 435);
			$(".productDetail .colLeft, .productDetail .colLeft img").width(productDetail);
			
			projectDetail = ($(window).width() - 435);
			$(".projectDetail .colLeft, .projectDetail .colLeft img.projectImg").width(projectDetail);
		}
		
		/*setTimeout(function(){
			$("#foo1").each(function(){
				$(this).carouFredSel({
					circular:false,
					infinite:false,
					auto:false,
					items:1,
					direction:"up",
					mousewheel: true,
					prev: {
						button:"#foo1_prev",
						onAfter:function(){
							var pos = $("#foo1").triggerHandler("currentPosition") + 1;
							var itemCount = $("#foo1 div").length;
							$(".slideNumbers").html(pos + "/" + itemCount);
						}
					},
					next: {
						button:"#foo1_next",
						onAfter:function(){
							var pos = $("#foo1").triggerHandler("currentPosition") + 1;
							var itemCount = $("#foo1 div").length;
							$(".slideNumbers").html(pos + "/" + itemCount);
						}
					},
					scrool:{
						fx: "crossfade",
						pauseOnHover: true,
						easing: 'elastic',
						onAfter:function(data){
							data.items.hide();
						}
					}
				});
				var pos = $("#foo1").triggerHandler("currentPosition") + 1;
				var itemCount = $("#foo1 div").length;
				$(".slideNumbers").html(pos + "/" + itemCount);
			});
		},500);*/
		
		$(".splash").each(function(){
			$(this).css("top", ($(window).height() - $(this).height()) / 2 + $(window).scrollTop() + "px");
			$(this).css("left", ($(window).width() - $(this).width()) / 2 + $(window).scrollLeft() + "px");		
		});
	
	});
	
	$(window).load(function(){
		
		//home start
		$(".boxItem").each(function(){
			$(this).find(".slide").carouFredSel({
				items:1,
				circular: false,
				infinite: true,
				auto :{
					play:true,
					delay:7000
				},
				pagination: ".pagination"
			});
		});
		
		$("#bannerBoxes .bgOverlay").height($(window).height()-120);
		$(".boxItem div").not(".pagination").height($(window).height()-140);
		boxesCol = ($(window).width() - 40) * 0.25;
		centerCol = ($(window).width() - 40);
		centerCol = centerCol * 0.50;
		
		$(".boxItem .leftCol").width(boxesCol);
		$(".boxItem .leftCol .infoBoxes").css({"width":boxesCol - 90,marginLeft:-(boxesCol - 90) / 2})
		$(".boxItem .centerCol, .boxItem .centerCol img").width(centerCol);
		$(".boxItem .rightCol, .boxItem .rightCol img").width(boxesCol);
		//home end
		
		/*-==  AboutUs Start ==-*/
	
		$("#carousel").each(function(){
			$(this).carouFredSel({
				direction: 'up',
				auto: false,
				scroll: {
					duration: 1000
				},
				pagination: {
					container: '#pager',
					anchorBuilder: function() {
						return '<a href="#">'+ $(this).find("img.itemImg").attr("alt") +'</a>';
					}
				}
			});
		});
		
		$("#pager a:eq(1)").addClass("centerMargin");
		
		/*-==  AboutUs Start End ==-*/
		
		//nth-child
	
		$(".awardsList li:nth-child(2n)").addClass("last");		
		
		calculate = ($(window).width() - 23) / 4;
		$(".productList").width($(window).width());
		$(".productList li, .productList li img").width(calculate);
		
		imageSlide = ($(window).width() - 40) / 3;
		$(".image_carousel div a, .image_carousel div img").not(".slideControls a").width(imageSlide);
		
		projectList = ($(window).width() - 20) / 2;
		$(".projectList li img").width(projectList);
		
		designerList = ($(window).width() - 20) / 4;
		$(".designerList li img, .designerList li div").width(designerList);
		
		productDetail = ($(window).width() - 435);
		$(".productDetail .colLeft, .productDetail .colLeft img").width(productDetail);
		
		projectDetail = ($(window).width() - 435);
		$(".projectDetail .colLeft, .projectDetail .colLeft img.projectImg").width(projectDetail);
		
		$('.projectList li a, .productList li a').each(function() {
			$(this).BlackAndWhite({
				hoverEffect : true, // default true
				// set the path to BnWWorker.js for a superfast implementation
				webworkerPath : false,
				// for the images with a fluid width and height 
				responsive:true
			});		
		});
	});
	
	if($.browser.msie && $.browser.version <= 10){}
	else{
		$(".image_carousel div a").not(".slideControls a").hover(function(){
			$(".image_carousel div a").not($(this)).addClass("css3-gaussian-blur");
		},function(){
			$(".image_carousel div a").not($(this)).removeClass("css3-gaussian-blur");
		});
	}
	
	//Galeri
	
	
	
	
	
	$('#technicalDraw li a.ilightbox').iLightBox({
		path:'horizontal',
		fullViewPort: 'fill',
		overlay: {
		  opacity: 1
	
		},
		swipe:true,
		styles: {
			nextOffsetX: -45,
			prevOffsetX: -45
		}
	});
	
	$('.searchList li a.ilightbox').iLightBox({
		path:'horizontal',
		fullViewPort: 'fill',
		overlay: {
		  opacity: 1
	
		},
		swipe:true,
		styles: {
			nextOffsetX: -45,
			prevOffsetX: -45
		}
	});
	
	/*$("#triggerGallery").live("click",function(){
		$("a.ilightbox").trigger("click");
		return false;
	});*/
	
	/*-==  Accordion Function Start ==-*/
	
	$(".acc li a").not(".acc .detailContent a, .acc li.general a").click(function(){
		if($(this).parents("li:eq(0)").hasClass("active")){
			$(".acc li.active").children(".detailContent").slideToggle(500);
			$(".acc li.active").removeClass("active");
		}
		else{
			$(".acc li.active").children(".detailContent").slideToggle(500);
			$(".acc li.active").removeClass("active");
			$(this).parents("li:eq(0)").addClass("active");
			$(this).parents("li:eq(0)").children(".detailContent").slideToggle(500);
		}
		return false;
	});
	
	/*-==  Accordion Function End ==-*/
	
	/*-==  Tabs Function Start ==-*/
	
	$(".tabsButtons li a").click(function(){
		var index = $(this).parent().index(".tabsButtons li");
		$(".tabsButtons li.active").removeClass("active");
		$(this).parent().addClass("active");
		$("#tabsContainer .tabSection").hide();
		$("#tabsContainer").fadeIn();
		$("#tabsContainer .tabSection").eq(index).fadeIn();
		var aOff = $("#tabsContainer");
		$('html,body').animate({scrollTop: aOff.offset().top - 100},'slow');
		return false;
	});
	
	/*-==  Tabs Function End ==-*/
	
	/*-==  E-Bülten Kayıt Start ==-*/
	
	$("#eNewsletter").submit(function(){
        var filter = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
		if(!filter.test($("#email").val())){
				if(lang == "tr")
				{
					fixElement('Lütfen mail adresinizi giriniz.',$("#email"));
				}else{
					fixElement('Please enter your email address.',$("#email"));
				}
				return false;
		}
		else{
				sendform("#eform");
				return false;
		} 
	});
	
	/*-==  E-Bülten Kayıt End ==-*/
	
	/*-==  Contact Form Start ==-*/
	
	$('#cntFrm').validate({
		errorElement: "span",
		submitHandler:function(){
			var name = $("#name").val();
			var surname = $("#surname").val();
			var signEmail = $("#e-posta").val();
			var telCode = $("#telCode").val();
			var telNo = $("#telNo").val();
			$(".formNOK").hide();
			var code_verify = false;
			
			$.ajax({
				type:"POST",
				url: window.location.href,
				data:"W=OKAY",
				success: function(code)
				{
					if(code == $("#captcha").val()){
						code_verify = true;
					}
					if (code_verify == false ){
						if(lang == "tr")
						{
							alert("Girdiğiniz güvenlik kodu yanlış. Lütfen güvenlik kodunu tekrar giriniz.");
						}
						else if(lang == "en")
						{
							alert("The security code you entered is incorrect. Please re-enter the security code.");
						}
						var timestamp = new Date().getTime();
						$("#sec_code_img_2").attr("src", "/plugins/capthcav2/?"+timestamp);
						$("#captcha").val("");
						$("#captcha").next().show();
						return false;
					}
					else
					{
						$.ajax({
							type: 'POST',
							url: window.location.href,
							data: $("#cntFrm").serialize(),
							beforeSend: function(){
								$("#cntFrm").hide();
								$(".loader").show();
								$(".sending").show();
							},
							success: function(msg){
								if (msg == "OK"){
									$(".sending, .loader, #cntFrm").hide();
									$(".formOK").show();
								}else{
									$(".sending, .loader, #cntFrm").hide();
									$(".formNOK").show();
								}
								return false;
							}
						});
					}
				}
			});
			
			return false;
		}
	});
	
	/*-==  Contact Form End ==-*/
	
	/*-== Malzemeler Start ==-*/
	
	$(".materialsList li a[rel=41], .materialsList li a[rel=475]").click(function(){
		$(".materialsList li").removeClass("active");
		$(this).parent("li").addClass("active");
		$(".colorGroupsWrap").slideDown("slow");
		$(".fabricGroupsWrap").slideUp("slow");
		return false;
	});
	
	$(".materialsList li a").not(".materialsList li a[rel=41], .materialsList li a[rel=475]").click(function(){
		$(".materialsList li").removeClass("active");
		$(this).parent("li").addClass("active");
		$(".colorGroupsWrap").hide();
		$(".ajax_overlay").remove();
		$(".fabricGroups").hide();
		var article_id = $(this).attr("rel");
		$.ajax({
			type:"POST",
			url:"/p/birim_malzemeler.asp?action=malzemeler&article_id="+ article_id +"",
			beforeSend:function(){
				$(".fabricGroupsWrap").append("<div class='ajax_overlay'><div class='ajax_loader'></div></div>");
				$(".fabricGroupsWrap").slideDown();
			},
			success:function(response){
				$(".ajax_overlay").hide();
				if($(response).find("li").length <= 0)
				{
					if(lang == "tr"){
						$(".fabricGroups").html("<p>Yapım aşamasında...</p>");
						$(".fabricGroups").fadeIn(2000);
					}else{
						$(".fabricGroups").html("<p>Under Construction...</p>");
						$(".fabricGroups").fadeIn(2000);
					}
				}else{
					$(".fabricGroups").html(response);
					$(".fabricGroups").fadeIn(2000);
				}
				//scrollToAnchor('id6');
			}
		});
		return false;
	});
	
	//Renk Grupları
	$(".colorGroupsWrap li a").click(function(){
		$(".colorGroupsWrap li").removeClass("active");
		$(this).parent("li").addClass("active");
		$(".ajax_overlay").remove();
		$(".fabricGroups").hide();
		var article_id = $(this).attr("rel");
		$.ajax({
			type:"POST",
			url:"/p/birim_malzemeler.asp?action=malzemeler&article_id="+ article_id +"",
			beforeSend:function(){
				$(".fabricGroupsWrap").append("<div class='ajax_overlay'><div class='ajax_loader'></div></div>");
				$(".fabricGroupsWrap").slideDown();
			},
			success:function(response){
				$(".ajax_overlay").hide();
				$(".fabricGroups").html(response);
				$(".fabricGroups").fadeIn(2000);
				scrollToAnchor('id6');
			}
		});
		return false;
	});
	
	//Kumaşlar
	$(".fabricGroups li a").live("click",function(){
		/*$(".fabricGroups li").removeClass("active");
		$(this).parent("li").addClass("active");
		var file_id = $(this).attr("rel");
		$.ajax({
			type:"POST",
			url:"/p/birim_malzemeler.asp?action=malzemedetay&file_id="+ file_id +"lang_id="+ lang +"",
			success:function(response){
				$(".overlay").fadeIn();
				$("body").append(response);
				var cur = $(".splash");
				$(".splash").css("top", ($(window).height() - cur.height()) / 2 + $(window).scrollTop() + "px");
				$(".splash").css("left", ($(window).width() - cur.width()) / 2 + $(window).scrollLeft() + "px");
				setTimeout(function(){
					$(".splash").fadeIn();
				},500);
			}
		});*/
		return false;
	});
	
	/*-== Malzemeler End ==-*/

/*-====================== ANASAYFA ÖDÜL BANNER ======================-*/	
    $("a[rel='article_354']").click(function(){
       window.location.href = 'http://birim.com/tr/urunler/masalar/zet';
    });	
	
	$("a[rel='article_856']").click(function(){
       window.location.href = 'http://birim.com/en/products/tables/zet';
    });	
/*-====================== ANASAYFA ÖDÜL BANNER ======================-*/	


	
});


// Refresh Captcha
function reloadCaptcha()
{
	var timestamp = new Date().getTime();
	$("#sec_code_img_2").attr("src", "/plugins/capthcav2/?"+timestamp);
}

function sendform(form){
		var email = $("#email").val();
		$.ajax({
			type: "GET",
			url: "/p/newsletter.asp",
			data: "EMAIL="+email,
			success: function(msg){
				switch(msg)
				{
					case "SUCCESSFULLY":
						$("#eNewsletter").hide();
						$("#frmthnx").show();	
					break;
                    case "ALREADY":
                    	$("#eNewsletter").hide();
						$("#frmalready").show();
                    break;
                    default:
                    	$("#eNewsletter").hide();
						$("#frmerr").show();
				}
			},
			error:function()
			{
				$("#eNewsletter").hide();
			    $("#frmerr").show();
			}
		});
		return false;
}