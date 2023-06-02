var is = {
	ua: navigator.userAgent.toLowerCase(),
	tArray: [],
	fArray: [],
	browser: function (trueArray, falseArray) {
		is.tArray.length=0;
		is.fArray.length=0;
		for (var i=0; i<trueArray.length; i++) {
			is.ua.search(trueArray[i])!=-1 ? is.tArray.push(1) : is.tArray.push(0);
		}
		for (var j=0; j<falseArray.length; j++) {
			is.ua.search(falseArray[j])==-1 ? is.fArray.push(0) : is.fArray.push(1);
		}
		return ((is.tArray.inArray(0) ? 0 : 1) && (is.fArray.inArray(0) ? 1 : 0));
	},
	debug:function(){
		return is.ua;
	}
};

Array.prototype.inArray=function(value){
	var i;
	for(i=0;i<this.length;i++){
		if(this[i]===value) return true;
	}
	return false;
};

var toggleSelects = function(to){
	if(window.ie && !window.ie7){
		var slcArr = document.getElementsByTagName('select');
		if(slcArr.length>0){
			for(i=0;i<slcArr.length;i++){
				if(to=='hide') slcArr[i].style.visibility="hidden";
				if(to=='show') slcArr[i].style.visibility="";
			}
		}
	}
	return true;
};


var $cms = function(id){
	$cms = document.getElementById(id);
	return $cms;
};


var exchange = function(obj, bgobj, alwaysShow){
	var el = $(obj);
	if(bgobj==true){
		var plbg = $('plbg');
		plbg.style.display=='block' ? plbg.style.display='none' : plbg.style.display='block';
	}
	if(el.style.display=='block'){
		!alwaysShow==true ? el.style.display='none' : void(0);
		toggleSelects('show');
	}else{
		el.style.display='block';
		toggleSelects('hide');
	}
	balanceFlatField();
	return true;
}

var balanceFlatField = function(){
//	var wy = window.getScrollHeight();
//	var wsx = window.getScrollWidth();
//	var wsy = window.getHeight();
	var wcy = document.body.scrollHeight;
	var ptop = window.getScrollTop() + 30;
	$('plbg') ? $('plbg').style.height = wcy + "px" : void(0);
	$('pl') ? $('pl').style.height = wcy + "px" : void(0);
	$('plc') ? $('plc').style.top = ptop + "px" : void(0);
	return true;
}



function isValidEmail(inEmail){
//	var email_regexp = new RegExp('^[a-zA-Z\.\-_-]+@([a-zA-Z\.\-_-]+\.)+[a-zA-Z]{2,4}$');
	var email_regexp = new RegExp('([a-zA-Z0-9\-\._]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})');
	var emailPass = false;
	if ( inEmail.length > 0 && email_regexp.test(inEmail) && inEmail.indexOf('.')!=-1 ){emailPass = true;}
	return emailPass;
}

function isNumeric(inS){
	var num_regexp = new RegExp('([0-9])');
	if ( inS.length > 0 && num_regexp.test(inS) ){return true;}
	return false;
}

function fixElement(inMessage,inObject){
	alert(inMessage);
	$(inObject).focus();
}

function removeLGB() {
	if ($('loading_gif') != null) {
		$('loading_gif').remove();
	}
}

function insertLGB(itemObj) {
	removeLGB();
	var targetObj = $(itemObj);
	targetObj.innerHTML = targetObj.innerHTML + LOADING_GIF;
}
function injectLGB(itemObj) {
	removeLGB();
	var targetObj = $(itemObj);
	targetObj.innerHTML = LOADING_GIF + targetObj.innerHTML;
}

var LOADING_GIF = '<div id="loading_gif" align="center"><img src="/i/loading.gif" width="24" height="24" alt="..."></div>';


function openMenuSub(aid,zid){
/*
	var z = document.getElementById('zone_' + zid);
	var a = document.getElementById('article_' + aid);
	if (z.style.display == 'none'){
		z.style.display = 'block';
		a.className = 'active';
	}else{
		z.style.display = 'none';
		a.className = '';
	}
*/
	var a = document.getElementById('article_' + aid);
	if (a.className == 'active'){
		a.className = '';
	}else{
		a.className = 'active';
	}

	return true;
}

function openSTF(inID,zid,aid){
	if (zid == -1 || aid == -1){return true;}
	var getURL = '/' + CONST_STF + '/' + zid + ',' + aid + ',' + inID;
	new Ajax(getURL , {
				method: 'get',
				update : 'plc',
				evalScripts: true
			}
	).request();
	return true;
}

function closeSTF(){
	exchange('pl',true);
}

function sendSTF(inB,inLang){
	if (inLang == 'tr'){
		var m1 = "Form işlenirken hata oluştu. Lütfen daha sonra tekrar deneyiniz.";
		var m2 = "Lütfen alıcının ismini yazınız.";
		var m3 = "Alıcı E-Posta adresi geçersiz.";
		var m4 = "E-Posta adresiniz geçersiz.";
		var m5 = "Lütfen isminizi yazınız.";
		var m6 = "Lütfen bekleyin..";
	}else{
		var m1 = "An error occured processing your form. Please try again later..";
		var m2 = "Please enter recipient name.";
		var m3 = "Recipient e-mail address is not valid.";
		var m4 = "Your e-mail address is not valid.";
		var m5 = "Please enter your name.";
		var m6 = "Please wait..";
	}

	if ($('stf_form') == null){
		alert(m1);
		return true;
	}
	
	var form = $('stf_form');
	if (form.to_name.value == ''){
		alert(m2);
		form.to_name.focus();
		return true;
	}
	if (!isValidEmail(form.to_email.value)){
		alert(m3);
		form.to_email.focus();
		return true;
	}
	if (form.from_email != undefined){
		if (!isValidEmail(form.from_email.value)){
			alert(m4);
			form.from_email.focus();
			return true;
		}
	}
	if (form.from_name != undefined){
		if (form.from_name.value == ''){
			alert(m5);
			form.from_name.focus();
			return true;
		}
	}
	
	stf_button = inB;
	if (inB.tagName == 'INPUT'){inB.title = inB.value; inB.value = m6;}
	if (inB.tagName == 'BUTTON'){inB.title = inB.innerHTML; inB.innerHTML = m6;}
	inB.disabled = true;
	new Ajax('/' + CONST_STF_SEND + '/' , {
				method: 'post',
				postBody: $('stf_form'),
				onComplete : function(){
					var inB = stf_button;
					if (inB.tagName == 'INPUT'){inB.value = inB.title;}
					if (inB.tagName == 'BUTTON'){inB.innerHTML = inB.title;}
					inB.disabled = false;
					},
				evalScripts: true
			}
	).request();



	return true;
}

function resizeSTF(w,h){
	$('plc').style.width = w + 'px';
	$('plc').style.height = h + 'px';
	balanceFlatField();
}

if(!window.captureEvents) document.onmousemove=getMousePos
if (window.captureEvents) {
window.captureEvents(Event.MOUSEMOVE)
window.onmousemove=getMousePos
}

var xy;

function getMousePos(e) { //you need the 'e', although it does NOT need to be defined
	//NS
	if (document.layers||document.getElementById&&!document.all) {
		mousex = e.pageX;
		mousey = e.pageY;
		}
	//IE
	else if (document.all) {
		mousex = window.event.clientX;
		mousey = window.event.clientY;
	}
}


function showEditButtons(inID, inFlags, inSID, inGID, inZID, inAID, inRID){

if (!document.getElementById("editButtonz") && !ed_pop) {

	ed_pop = true;

	var but = document.getElementById('editButton' + inID);

	var obj = {left: mousex, top: mousey-8, width: 100, height: 'auto'};
	//var position = but.getCoordinates();

	var position = obj;


	var nh = document.createElement('div');
	nh.id = "editButtonz";
	nh.className = "editButtonz";
	nh.style.width = position.width + "px";
	nh.style.height = position.height;
	nh.style.top = (position.top) + "px";
	nh.style.left = position.left + "px";
	nh.onmouseover = function(){ed_pop = true;};
	nh.onmouseout = function(){ed_pop = false;};
	document.body.appendChild(nh);
	

	 
	var ed_int = window.setInterval('hideEditButtons(' + inID + ')',100);
	
	var eb = document.getElementById("editButtonz");

	if (inRID > 0){
		var a_link = '<a onmouseover="ed_pop=true;" href="/cms/articles.asp?a=-2&ar=' + inRID + '&amp;go=' + inID + '" target="editor" ><b>-</b>&nbsp;<b>R</b>evision ##data##</a>';
		var af_link = '';
	}else{
		var a_link = '<a onmouseover="ed_pop=true;" href="/cms/articles.asp?a=' + inAID + '&amp;go=' + inID + '" target="editor" ><b>-</b>&nbsp;<b>A</b>rticle ##data##</a>';
		var af_link = '<br><a onmouseover="ed_pop=true;" href="/cms/articlefiles.asp?a=' + inAID + '" target="editor" ><b>-</b>&nbsp;<b>A</b>rticle Files </a>';
	}
	var z_link = '<a onmouseover="ed_pop=true;" href="/cms/zones.asp?z=' + inZID + '&amp;go=' + inID + '" target="editor" ><b>-</b>&nbsp;<b>Z</b>one ##data##</a>';
	var g_link = '<a onmouseover="ed_pop=true;" href="/cms/zone_groups.asp?zg=' + inGID + '&amp;go=' + inID + '" target="editor" ><b>-</b>&nbsp;<b>Z</b>one Group ##data##</a>';
	var s_link = '<a onmouseover="ed_pop=true;" href="/cms/sites.asp?s=' + inSID + '&amp;go=' + inID + '" target="editor" ><b>-</b>&nbsp;<b>S</b>ite ##data##</a>';
	
	
	if (inFlags.indexOf('A') != -1 ){a_link = a_link.replace('##data##','*');}else{a_link = a_link.replace('##data##','');}
	if (inFlags.indexOf('Z') != -1 ){z_link = z_link.replace('##data##','*');}else{z_link = z_link.replace('##data##','');}
	if (inFlags.indexOf('G') != -1 ){g_link = g_link.replace('##data##','*');}else{g_link = g_link.replace('##data##','');}
	if (inFlags.indexOf('S') != -1 ){s_link = s_link.replace('##data##','*');}else{s_link = s_link.replace('##data##','');}
	
	eb.innerHTML = a_link + '<br>' + z_link + '<br>' + g_link + '<br>' + s_link + '<br>' + af_link;

	}

	

}

function hideEditButtons(inID){
	if (document.getElementById("editButtonz") && !ed_pop){
		document.body.removeChild(document.getElementById("editButtonz"));
		window.clearInterval(ed_int);
	}
}


var stf_button = '';
var ed_pop = false;
var ed_int = 0;
