 /**
  * This part will handle the ajax requests 
  */

function doSomething(data1, data2) {
	// little logging from an earlier project, probably overkill for this project
	var event_id = generateRandomHash(10);
	var timestamp = new Date().toJSON();
	
	if (!session_id_set){
		if (!checkCookie("cs-session_id")) {
			session_id = generateRandomHash(20);
			setCookie("cs-session_id", session_id);
		}
		else {
			session_id = getCookie("cs-session_id");
		}
		$.getJSON("http://ip-api.com/json/?fields=53055", function (geodata) {
			session_geodata = String(geodata);
		});
		session_id_set = true;
	}
	
	if (!ures_set) {
		user_res = '{"W" : "' + screen.width + '","H" : "' + screen.height + '"}';
		ures_set = true;
	}
	
	user_settings = "N/A";
	/*
	// Key table data: user_id,event_id and:
	post_data = 'timestamp=' + timestamp;
	post_data += '&page=' + page_url;
	// User data:
	post_data += '&user_id=' + user_id;
	post_data += '&user_date=' + user_date;
	post_data += '&user_agent=' + user_agent;
	post_data += '&user_res=' + user_res;
	post_data += '&user_ip=' + user_ip;
	post_data += '&user_settings=' + user_settings;
	// Event data:	
	post_data += '&session_id=' + session_id;
	post_data += '&event_id=' + event_id;
	post_data += '&event_action=' + event_action;
	post_data += '&event_type=' + event_type;
	post_data += '&event_param=' + event_param;*/
	
	$.ajax({
      url: 'http://joasszony.org/wp-content/plugins/customstats/cs-send-event-data.php/',
      type: "POST",
	  // Send data here:
      data: { timestamp : timestamp, 
		page : page_url,
		user_id : user_id,
		user_date : user_date,
		user_agent : user_agent,
		user_res : user_res,
		user_ip : user_ip,
		user_settings : user_settings,
		session_id : session_id,
		session_geodata : session_geodata,
		event_id : event_id,
		event_action : event_action,
		event_type : event_type,
		event_param : event_param }
	})
	.done(function(output) 
	{
	  console.log('success, server says ' + output.message);
	}) 
	.fail(function()
	{
	  console.log('something went wrong, logging failed');
	});	
}

function getUserId001() {
	var user_id_local = 0;
	if (checkCookie("cs-user_id"))
	{
		user_id_local = getCookie("cs-user_id");
	}
	else
	{
		user_id_local = generateRandomHash(64);
		setCookie("cs-user_id", user_id_local, 1000);
		setCookie("cs-uid_date", new Date().toJSON(), 1000);
	}
	return user_id_local;	
}

function getUserAgent001() {	
	var ua_text = '{';
	ua_text += '"browserCodeName" : "' + navigator.appCodeName + '",';
	ua_text += '"browserName" : "' + navigator.appName + '",';
	ua_text += '"browserVersion" : "' + navigator.appVersion + '",';
	ua_text += '"cookiesEnabled" : "' + navigator.cookieEnabled + '",';
	ua_text += '"browserLanguage" : "' + navigator.language + '",';
	ua_text += '"browserOnline" : "' + navigator.onLine + '",';
	ua_text += '"platform" : "' + navigator.platform + '",';
    ua_text += '"userAgentHd" : "' + navigator.userAgent + '"}';
	
	// Not sure we need this or the text:
	var ua_json = JSON.parse(ua_text);
		
	return ua_text;
}

// DATA HANDLING:

var hashCharSet = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";

function generateRandomHash(hashLength) {
  var output = '';

  for (var i = 0; i < hashLength; i++) {
    output += hashCharSet.charAt(Math.random() * hashCharSet.length);
  }
  return output;
}

// COOKIES :D
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}
function checkCookie(cname) {
    var target=getCookie(cname);
    if (target=="") return false;
    else return true;
}