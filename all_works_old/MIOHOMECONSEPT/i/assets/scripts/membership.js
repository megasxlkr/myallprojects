/*
	BIRIM MOBILYA
	Javascript Development MadebyCAT
	http://www.madebycat.com
	2013
*/

$(document).ready(function(){
	
	lang=$("body").attr("lang");
	var xmlLang =$("body").attr("xml:lang");
	if(lang == "" || lang == null)
	{
		lang = xmlLang;
	}
	
	var selectValid = "";
	if(lang == "tr")
	{
		selectValid = "Lütfen seçim yapınız."
	}
	else
	{
		selectValid = "Please make a selection."
	}
	
	jQuery.validator.addMethod( 
	  "select", 
	  function(value, element) {       
		if (element.value == "-1") 
		{ 
		  return false; 
		} 
		else return true; 
	  }, 
	  selectValid
	); 
	
	var urlText = window.location.href
	
	if(urlText.indexOf("returnURL") != -1)
	{
		$(".showResult").show();
	}
	
	$("#a_Ulke").change(function(){
		$("#architects_Membership .sehir").show();
	});
	
	$("#p_Ulke").change(function(){
		$("#pressFrm_Membership .sehir").show();
	});
	
	
	$(".splashBox").click(function(){
		var rel = $(this).attr("rel");
		$(".splashMembership").each(function(){
			if($(this).attr("title") == rel)
			 {
				 $(this).css("top", "150px");
				 $(this).css("left", ($(window).width() - $(this).width()) / 2 + $(window).scrollLeft() + "px");
				 $(this).attr("title", rel).fadeIn(500);
				 $(".overlay").fadeIn(500);
			 }
		});
		return false;
	});
	
	$(".architects").click(function(){
	   if($(this).is(":checked") == true)
	   {
		 $(".firma").show();
	   }else{
		 $(".firma").hide();
	   }
	});
	
	/*-========== Architects Form Function Start ==========-*/
	
	$("#architects_Login").validate({
		errorElement:"span",
		errorPlacement: function (error, element) { 
			element.parent().append(error);
		},
		submitHandler:function(){
			var aL_Eposta = $("#aL_Eposta").val();
			var aL_Password = $("#aL_Password").val();
						
			$.ajax({
				type: 'POST',
				url: "/plugins/press_room_auth",
				data: "action=login&tip=1&email="+ aL_Eposta +"&password="+ aL_Password +"",
				beforeSend: function(){
					if(lang == "en"){
						$("div#formResultLogin").html("<p class='alert-block'>Sending.</p>");
					}else{
						$("div#formResultLogin").html("<p class='alert-block'>Form gönderiliyor, lütfen bekleyiniz.</p>");
					}
					$("#architects_Login input[type=submit]").attr("disabled","disabled");
				},
				error:function(){
					$("#architects_Login input[type=submit]").removeAttr("disabled");
					if(lang == "en"){
						$("div#formResultLogin").html("<p class='alert-error'>An error occurred while sending the form. Please try again.</p>");
					}else{
						$("div#formResultLogin").html("<p class='alert-error'>Formu gönderirken bir hata oluştu. Lütfen tekrar deneyiniz.</p>");
					}
				},
				success: function(xmlResult){
				   var result = $(xmlResult).find("serviceresult").attr("code");
				   switch(result){
					   case "EMAIL_REQUIRED":
							$("#architects_Login input[type=submit]").removeAttr("disabled");
							if(lang == "en"){
								$("div#formResultLogin").html("<p>Please enter your e-mail.</p>");
							}else{
								$("div#formResultLogin").html("<p>Lütfen e-posta adresinizi giriniz.</p>");
							}
					   break;
					   case "PASSWORD_REQUIRED":
							$("#architects_Login input[type=submit]").removeAttr("disabled");
							if(lang == "en"){
								$("div#formResultLogin").html("<p>Please enter your password.</p>");
							}else{
								$("div#formResultLogin").html("<p>Lütfen şifrenizi giriniz.</p>");
							}
					   break;      
					   case "USR_NOT_FOUND":
							 $("#architects_Login input[type=submit]").removeAttr("disabled");
							 if(lang == "en"){
								$("div#formResultLogin").html("<p>The e-mail address is not registered in our database. Please make sure your e-mail address is correct.</p>");
							 }else{
								$("div#formResultLogin").html("<p>Girdiğiniz e-posta adresi veritabanımızda kayıtlı değil. Lütfen e-posta adresinizin doğruluğundan emin olun.</p>");
							}
					   break;
					   case "LOGIN_SUCCESSFULLY":
					      	if(lang == "en"){
								location.href = "/en/downloads/architects";
							}else{
								location.href = "/tr/yuklemeler/mimarlar";
							}
					   break;
				  }
				}
			});
		}
	});
	
	$("#architects_Membership").validate({
		rules:{
			a_Ulke:{
				select:true
			},
			a_Rsifre: {
			   equalTo: "#a_Sifre"
			},
			a_Telefon:{
				minlength:5,
				maxlength:11,
				required:true,
				number:true
			}
		},
		errorElement:"span",
		submitHandler:function(){
			var a_Name = $("#a_Name").val();
			var a_Surname = $("#a_Surname").val();
			var a_Eposta = $("#a_Eposta").val();
			var a_Telefon = $("#a_Telefon").val();
			var a_Ulke = $("#a_Ulke").val();
			var a_Sehir = $("#a_Sehir").val();
			var a_Sifre = $("#a_Sifre").val();
			var a_FirmaAdi = $("#a_FirmaAdi").val();
			
			if(lang == "tr")
			{
				mt_id = 914
			}else{
				mt_id = 954
			}
			
			$.ajax({
					type: 'POST',
					url: "/plugins/press_room_auth",
					data: "action=register&tip=1&default_lang_id="+ lang +"&mt_id="+ mt_id +"&firstname="+ a_Name +"&lastname="+ a_Surname +"&email="+ a_Eposta +"&gsm="+ a_Telefon +"&country="+ a_Ulke +"&city="+ a_Sehir+"&password="+ a_Sifre +"&architect="+ a_FirmaAdi +"",
					beforeSend: function(){
						if(lang == "en"){
							$("div#formResult").html("<p class='alert-block'>Sending.</p>");
						}else{
							$("div#formResult").html("<p class='alert-block'>Form gönderiliyor, lütfen bekleyiniz.</p>");
						}
						$("#architects_Membership input[type=submit]").attr("disabled","disabled");
					},
					error:function(){
						$("#architects_Membership input[type=submit]").removeAttr("disabled");
						if(lang == "en"){
							$("div#formResult").html("<p class='alert-error'>An error occurred while sending the form. Please try again.</p>");
						}else{
							$("div#formResult").html("<p class='alert-error'>Formu gönderirken bir hata oluştu. Lütfen tekrar deneyiniz.</p>");
						}
					},
					success: function(xmlResult){
					   var result = $(xmlResult).find("serviceresult").attr("code");
					   switch(result){
						   case "EMAIL_REQUIRED":
						   		$("#architects_Membership input[type=submit]").removeAttr("disabled");
								if(lang == "en"){
									$("div#formResult").html("<p>Please enter your e-mail.</p>");
								}else{
									$("div#formResult").html("<p>Lütfen e-posta adresinizi giriniz.</p>");
								}
						   break;
						   case "PASSWORD_REQUIRED":
						   		$("#architects_Membership input[type=submit]").removeAttr("disabled");
								if(lang == "en"){
									$("div#formResult").html("<p>Please enter password.</p>");
								}else{
									$("div#formResult").html("<p>Lütfen şifrenizi giriniz.</p>");
								}
						   break;      
						   case "ALREADY":
						   		$("#architects_Membership input[type=submit]").removeAttr("disabled");
								if(lang == "en"){
									$("div#formResult").html("<p>This e-mail address is already registered.</p>");
								}else{
									$("div#formResult").html("<p>Bu e-posta adresiyle daha önce kayıt yapılmış.</a></p>");
								}
						   break;
						   case "ERROR_OCCURRED":
						   		$("#architects_Membership input[type=submit]").removeAttr("disabled");
								if(lang == "en"){
									$("div#formResult").html("<p>An error occurred while sending the form. Please try again.</p>");
								}else{
									$("div#formResult").html("<p>Formu gönderirken bir hata oluştu. Lütfen tekrar deneyiniz.</p>");
								}
						   break;
						   case "FAILED":
						   		$("#architects_Membership input[type=submit]").removeAttr("disabled");
								if(lang == "en"){
									$("div#formResult").html("<p>An error occurred while sending the form. Please try again.</p>");
								}else{
									$("div#formResult").html("<p>Formu gönderirken bir hata oluştu. Lütfen tekrar deneyiniz.</p>");
								}
						   break;
						   case "SUCCESSFULLY":
						   	  $("#architects_Membership input[type=submit]").removeAttr("disabled");
							  $("form#architects_Membership").hide();
							  if(lang == "en"){
								$("div#formResult").html("<p>Information taken. Your membership is approved by us will be notified by e-mail now.</p>");
							  }else{
								$("div#formResult").html("<p>Teşekkürler. Bilgileriniz alınmıştır. Üyeliğiniz tarafımızca onaylandığı anda e-posta ile bilgilendirileceksiniz.</p>");
							  }
							  
						   break;
					  }
					}
			});
		}
	});
	
	$("#architects_Password").validate({
		errorElement:"span",
		errorPlacement: function (error, element) { 
			element.parent().append(error);
		},
		submitHandler:function(){
			var a_Peposta = $("#a_Peposta").val();
			
			if(lang == "tr")
			{
				mt_id = 916
			}else{
				mt_id = 953
			}
			
			$.ajax({
				type: 'POST',
				url: "/plugins/press_room_auth",
				data: "action=forgotpassword&mt_id="+ mt_id +"&email="+ a_Peposta +"",
				beforeSend: function(){
					if(lang == "en"){
						$("div#formResultPassword").html("<p class='alert-block'>Sending.</p>");
					}else{
						$("div#formResultPassword").html("<p class='alert-block'>Form gönderiliyor, lütfen bekleyiniz.</p>");
					}
					$("#architects_Password input[type=submit]").attr("disabled","disabled");
				},
				error:function(){
					$("#architects_Password input[type=submit]").removeAttr("disabled");
					if(lang == "en"){
						$("div#formResultPassword").html("<p class='alert-error'>An error occurred while sending the form. Please try again.</p>");
					}else{
						$("div#formResultPassword").html("<p class='alert-error'>Formu gönderirken bir hata oluştu. Lütfen tekrar deneyiniz.</p>");
					}
				},
				success: function(xmlResult){
				   var result = $(xmlResult).find("serviceresult").attr("code");
				   switch(result){
					   case "EMAIL_REQUIRED":
					   	$("#architects_Password input[type=submit]").removeAttr("disabled");
						if(lang == "en"){
							$("div#formResultPassword").html("<p>Please enter your e-mail.</p>");
						}else{
							$("div#formResultPassword").html("<p>Lütfen e-posta adresinizi giriniz.</p>");
						}
					   break;
					   case "USR_NOT_FOUND":
					   	 $("#architects_Password input[type=submit]").removeAttr("disabled");
						 if(lang == "en"){
							$("div#formResultPassword").html("<p>The e-mail address is not registered in our database. Please make sure your e-mail address is correct.'</p>");
						}else{
							$("div#formResultPassword").html("<p>Girdiğiniz e-posta adresi veritabanımızda kayıtlı değil. Lütfen e-posta adresinizin doğruluğundan emin olun.</p>");
						}
					   break;      
					   case "SEND_PASSWORD":
					   		$("#architects_Password input[type=submit]").removeAttr("disabled");
							$("form#architects_Password").hide();
						 	if(lang == "EN"){
						 		$("div#formResultPassword").html("<p>Your password was sent to your email address.</p>");
						 	}else{
						 		$("div#formResultPassword").html("<p>Şifreniz e-posta adresinize gönderilmiştir.</p>");
						 	}
					   break;
				  }
				}
			});
		}
	});
	
	/*-========== Architects Form Function End ==========-*/
	
	
	/*-========== Press Form Function Start ==========-*/
	
	$("#pressFrm_Login").validate({
		errorElement:"span",
		errorPlacement: function (error, element) { 
			element.parent().append(error);
		},
		submitHandler:function(){
			var pL_Name = $("#pL_Name").val();
			var pL_Password = $("#pL_Password").val();
			
			$.ajax({
				type: 'POST',
				url: "/plugins/press_room_auth",
				data: "action=login&tip=2&email="+ pL_Name +"&password="+ pL_Password +"",
				beforeSend: function(){
					if(lang == "en"){
						$("div#formResultPressLogin").html("<p class='alert-block'>Sending.</p>");
					}else{
						$("div#formResultPressLogin").html("<p class='alert-block'>Form gönderiliyor, lütfen bekleyiniz.</p>");
					}
					$("#pressFrm_Login input[type=submit]").attr("disabled","disabled");
				},
				error:function(){
					$("#pressFrm_Login input[type=submit]").removeAttr("disabled");
					if(lang == "en"){
						$("div#formResultPressLogin").html("<p class='alert-error'>An error occurred while sending the form. Please try again.</p>");
					}else{
						$("div#formResultPressLogin").html("<p class='alert-error'>Formu gönderirken bir hata oluştu. Lütfen tekrar deneyiniz.</p>");
					}
				},
				success: function(xmlResult){
				   var result = $(xmlResult).find("serviceresult").attr("code");
				   switch(result){
					   case "EMAIL_REQUIRED":
							$("#pressFrm_Login input[type=submit]").removeAttr("disabled");
							if(lang == "en"){
								$("div#formResultPressLogin").html("<p>Please enter your e-mail.</p>");
							}else{
								$("div#formResultPressLogin").html("<p>Lütfen e-posta adresinizi giriniz.</p>");
							}
					   break;
					   case "PASSWORD_REQUIRED":
							$("#pressFrm_Login input[type=submit]").removeAttr("disabled");
							if(lang == "en"){
								$("div#formResultPressLogin").html("<p>Please enter your password.</p>");
							}else{
								$("div#formResultPressLogin").html("<p>Lütfen şifrenizi giriniz.</p>");
							}
					   break;      
					   case "USR_NOT_FOUND":
							 $("#pressFrm_Login input[type=submit]").removeAttr("disabled");
							 if(lang == "en"){
								$("div#formResultPressLogin").html("<p>The e-mail address is not registered in our database. Please make sure your e-mail address is correct.</p>");
							 }else{
								$("div#formResultPressLogin").html("<p>Girdiğiniz e-posta adresi veritabanımızda kayıtlı değil. Lütfen e-posta adresinizin doğruluğundan emin olun.</p>");
							 }
					   break;
					   case "LOGIN_SUCCESSFULLY":
					   		if(lang == "en"){
								location.href = "/en/downloads/press";
							}else{
								location.href = "/tr/yuklemeler/basin";
							}
					   break;
				  }
				}
			});
		}
	});
	
	$("#pressFrm_Membership").validate({
		rules:{
			p_Ulke:{
				select:true
			},
			p_Rsifre: {
			   equalTo: "#p_Sifre"
			},
			p_Telefon:{
				minlength:5,
				maxlength:11,
				required:true,
				number:true
			}
		},
		errorElement:"span",
		submitHandler:function(){
			var p_Name = $("#p_Name").val();
			var p_Surname = $("#p_Surname").val();
			var p_Eposta = $("#p_Eposta").val();
			var p_Telefon = $("#p_Telefon").val();
			var p_Ulke = $("#p_Ulke").val();
			var p_Sehir = $("#p_Sehir").val();
			var p_Sifre = $("#p_Sifre").val();
			var p_Medya = $("#p_Medya").val();
			
			if(lang == "tr")
			{
				mt_id = 914
			}else{
				mt_id = 954
			}
			
			$.ajax({
					type: 'POST',
					url: "/plugins/press_room_auth",
					data: "action=register&tip=2&default_lang_id="+ lang +"&mt_id="+ mt_id +"&firstname="+ p_Name +"&lastname="+ p_Surname +"&email="+ p_Eposta +"&gsm="+ p_Telefon +"&country="+ p_Ulke +"&city="+ p_Sehir+"&password="+ p_Sifre +"&presscompany="+ p_Medya +"",
					beforeSend: function(){
						if(lang == "en"){
							$("div#formResultPress").html("<p class='alert-block'>Sending.</p>");
						}else{
							$("div#formResultPress").html("<p class='alert-block'>Form gönderiliyor, lütfen bekleyiniz.</p>");
						}
						$("#pressFrm_Membership input[type=submit]").attr("disabled","disabled");
					},
					error:function(){
						$("#pressFrm_Membership input[type=submit]").removeAttr("disabled");
						if(lang == "en"){
							$("div#formResultPress").html("<p class='alert-error'>An error occurred while sending the form. Please try again.</p>");
						}else{
							$("div#formResultPress").html("<p class='alert-error'>Formu gönderirken bir hata oluştu. Lütfen tekrar deneyiniz.</p>");
						}
					},
					success: function(xmlResult){
					   var result = $(xmlResult).find("serviceresult").attr("code");
					   switch(result){
						   case "EMAIL_REQUIRED":
						   		$("#pressFrm_Membership input[type=submit]").removeAttr("disabled");
								if(lang == "en"){
									$("div#formResultPress").html("<p>Please enter your e-mail.</p>");
								}else{
									$("div#formResultPress").html("<p>Lütfen e-posta adresinizi giriniz.</p>");
								}
						   break;
						   case "PASSWORD_REQUIRED":
						   		$("#pressFrm_Membership input[type=submit]").removeAttr("disabled");
								if(lang == "en"){
									$("div#formResultPress").html("<p>Please enter password.</p>");
								}else{
									$("div#formResultPress").html("<p>Lütfen şifrenizi giriniz.</p>");
								}
						   break;      
						   case "ALREADY":
						   		$("#pressFrm_Membership input[type=submit]").removeAttr("disabled");
								if(lang == "en"){
									$("div#formResultPress").html("<p>This e-mail address is already registered.</p>");
								}else{
									$("div#formResultPress").html("<p>Bu e-posta adresiyle daha önce kayıt yapılmış.</a></p>");
								}
						   break;
						   case "ERROR_OCCURRED":
						   		$("#pressFrm_Membership input[type=submit]").removeAttr("disabled");
								if(lang == "en"){
									$("div#formResultPress").html("<p>An error occurred while sending the form. Please try again.</p>");
								}else{
									$("div#formResultPress").html("<p>Formu gönderirken bir hata oluştu. Lütfen tekrar deneyiniz.</p>");
								}
						   break;
						   case "FAILED":
						   		$("#pressFrm_Membership input[type=submit]").removeAttr("disabled");
								if(lang == "en"){
									$("div#formResultPress").html("<p>An error occurred while sending the form. Please try again.</p>");
								}else{
									$("div#formResultPress").html("<p>Formu gönderirken bir hata oluştu. Lütfen tekrar deneyiniz.</p>");
								}
						   break;
						   case "SUCCESSFULLY":
						   	  $("#pressFrm_Membership input[type=submit]").removeAttr("disabled");
							  $("form#pressFrm_Membership").hide();
							  if(lang == "en"){
								$("div#formResultPress").html("<p>Information taken. Your membership is approved by us will be notified by e-mail now.</p>");
							  }else{
								$("div#formResultPress").html("<p>Teşekkürler. Bilgileriniz alınmıştır. Üyeliğiniz tarafımızca onaylandığı anda e-posta ile bilgilendirileceksiniz.</p>");
							  }
							  
						   break;
					  }
					}
			});
			
		}
	});
	
	$("#press_Password").validate({
		errorElement:"span",
		errorPlacement: function (error, element) { 
			element.parent().append(error);
		},
		submitHandler:function(){
			var p_Pname = $("#p_Pname").val();
			
			if(lang == "tr")
			{
				mt_id = 916
			}else{
				mt_id = 953
			}
			
			$.ajax({
				type: 'POST',
				url: "/plugins/press_room_auth",
				data: "action=forgotpassword&mt_id="+ mt_id +"&email="+ p_Pname +"",
				beforeSend: function(){
					if(lang == "en"){
						$("div#formResultPressPassword").html("<p class='alert-block'>Sending.</p>");
					}else{
						$("div#formResultPressPassword").html("<p class='alert-block'>Form gönderiliyor, lütfen bekleyiniz.</p>");
					}
					$("#press_Password input[type=submit]").attr("disabled","disabled");
				},
				error:function(){
					$("#press_Password input[type=submit]").removeAttr("disabled");
					if(lang == "en"){
						$("div#formResultPressPassword").html("<p class='alert-error'>An error occurred while sending the form. Please try again.</p>");
					}else{
						$("div#formResultPressPassword").html("<p class='alert-error'>Formu gönderirken bir hata oluştu. Lütfen tekrar deneyiniz.</p>");
					}
				},
				success: function(xmlResult){
				   var result = $(xmlResult).find("serviceresult").attr("code");
				   switch(result){
					   case "EMAIL_REQUIRED":
					   	$("#press_Password input[type=submit]").removeAttr("disabled");
						if(lang == "en"){
							$("div#formResultPressPassword").html("<p>Please enter your e-mail.</p>");
						}else{
							$("div#formResultPressPassword").html("<p>Lütfen e-posta adresinizi giriniz.</p>");
						}
					   break;
					   case "USR_NOT_FOUND":
					   	 $("#press_Password input[type=submit]").removeAttr("disabled");
						 if(lang == "en"){
							$("div#formResultPressPassword").html("<p>The e-mail address is not registered in our database. Please make sure your e-mail address is correct.'</p>");
						 }else{
							$("div#formResultPressPassword").html("<p>Girdiğiniz e-posta adresi veritabanımızda kayıtlı değil. Lütfen e-posta adresinizin doğruluğundan emin olun.</p>");
						 }
					   break;      
					   case "SEND_PASSWORD":
					   	$("#press_Password input[type=submit]").removeAttr("disabled");
						$("form#press_Password").hide();
						 if(lang == "EN"){
						 $("div#formResultPressPassword").html("<p>Your password was sent to your email address.</p>");
						 }else{
						 $("div#formResultPressPassword").html("<p>Şifreniz e-posta adresinize gönderilmiştir.</p>");
						 }
					   break;
				  }
				}
			});
		}
	});
	
	/*-========== Press Form Function End ==========-*/
	
	/*-========== Dealers Form Function Start ==========-*/
	
	$("#dealersFrm_Login").validate({
		errorElement:"span",
		errorPlacement: function (error, element) { 
			element.parent().append(error);
		},
		submitHandler:function(){
			var dL_Password = $("#dL_Password").val();
			var dL_Username = $("#dL_Username").val();

			$.ajax({
				type: 'POST',
				url: "/plugins/press_room_auth",
				data: "action=login&tip=3&email="+ dL_Username +"&password="+ dL_Password +"",
				beforeSend: function(){
					if(lang == "en"){
						$("div#formResultDealerLogin").html("<p class='alert-block'>Sending.</p>");
					}else{
						$("div#formResultDealerLogin").html("<p class='alert-block'>Form gönderiliyor, lütfen bekleyiniz.</p>");
					}
					$("#dealersFrm_Login input[type=submit]").attr("disabled","disabled");
				},
				error:function(){
					$("#dealersFrm_Login input[type=submit]").removeAttr("disabled");
					if(lang == "en"){
						$("div#formResultDealerLogin").html("<p class='alert-error'>An error occurred while sending the form. Please try again.</p>");
					}else{
						$("div#formResultDealerLogin").html("<p class='alert-error'>Formu gönderirken bir hata oluştu. Lütfen tekrar deneyiniz.</p>");
					}
				},
				success: function(xmlResult){
				   var result = $(xmlResult).find("serviceresult").attr("code");
				   switch(result){
					   case "EMAIL_REQUIRED":
							$("#dealersFrm_Login input[type=submit]").removeAttr("disabled");
							if(lang == "en"){
								$("div#formResultDealerLogin").html("<p>Please enter your e-mail.</p>");
							}else{
								$("div#formResultDealerLogin").html("<p>Lütfen e-posta adresinizi giriniz.</p>");
							}
					   break;
					   case "PASSWORD_REQUIRED":
							$("#dealersFrm_Login input[type=submit]").removeAttr("disabled");
							if(lang == "en"){
								$("div#formResultDealerLogin").html("<p>Please enter your password.</p>");
							}else{
								$("div#formResultDealerLogin").html("<p>Lütfen şifrenizi giriniz.</p>");
							}
					   break;      
					   case "USR_NOT_FOUND":
							 $("#dealersFrm_Login input[type=submit]").removeAttr("disabled");
							 if(lang == "en"){
								$("div#formResultDealerLogin").html("<p>The username is not registered in our database. Please make sure your username is correct.'</p>");
							 }else{
								$("div#formResultDealerLogin").html("<p>Girdiğiniz kullanıcı adı veritabanımızda kayıtlı değil. Lütfen kullanıcı adınızın doğruluğundan emin olun.</p>");
							 }
					   break;
					   case "LOGIN_SUCCESSFULLY":
					   		if(lang == "en"){
								location.href = "/en/downloads/dealers";
							}else{
								location.href = "/tr/yuklemeler/bayiler";
							}
					   break;
				  }
				}
			});
			
		}
	});
	
	/*-========== Dealers Form Function End ==========-*/
	
	/*-========== Logout Function Start ==========-*/
	
	$("a.logout").click(function(){
		
		$.ajax({
			type:"post",
			url: "/plugins/press_room_auth",
			data: "action=logout",
			success: function(xmlResult){
				var result = $(xmlResult).find("serviceresult").attr("code");
				   switch(result){
					   case "SUCCESSFULLY":
							if(lang == "en"){
								location.href = "/en/downloads";
							}else{
								location.href = "/tr/yuklemeler";
							}
					   break;
					   default:
							alert("An error occurred! Please try again later.");
					   break;
				  }
			}
			
		});

		return false;
	});
	
	/*-========== Logout Function End ==========-*/
	
});