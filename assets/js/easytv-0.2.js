function toTime(value,flag){

	if(flag==1 && value <= 0)
		return "";

	var text = "";
	if(value < 10)
		text += "0"+value;
	else
		text += value;

	if(flag != 3)
		text += ":";

	return text;
}
var data_schedule = [];
window.onload = function(){

var url_assets 	= document.getElementsByTagName("script");
url_asset 		= url_assets[0].src;

var base_url 	= url_asset.split("assets")[0];

function inject_script(src){
	var script   = document.createElement("script");
	script.type  = "text/javascript";
	script.src   = src;    // use this for linked script
	document.getElementsByTagName("head")[0].appendChild(script);
}

function inject_css(src){
	var link 	= document.createElement("link");
	link.rel 	= "stylesheet";
	link.type 	= "text/css";
	link.href	= src;
	document.getElementsByTagName("head")[0].appendChild(link);
}

inject_script(base_url + "assets/js/swfobject.js");
inject_script(base_url + "assets/js/jquery.js");
inject_script(base_url + "assets/js/plugins/moment.min.js");

inject_css(base_url + "assets/css/datepicker/datepicker35.css");
inject_css(base_url + "assets/css/bootstrap.min.css");
inject_css(base_url + "assets/css/font-awesome.min.css");





var wrap_html 	 = '<div id="tv-player"></div>';
wrap_html 		+= '<h3>Schedule - <span class="date_title"></span></h3>';
wrap_html 		+= '<ul id="list_schedule"></ul>';
wrap_html		+= '<button class="btn btn-default prev_schedule"><span class="fa fa-caret-left"></span></button>';
wrap_html		+= '<button class="btn btn-default" id="calendar_picker" data-date-format="yyyy-mm-dd" data-date=""><span class="glyphicon glyphicon-calendar"></span></button>';
wrap_html		+= '<button class="btn btn-default next_schedule"><span class="fa fa-caret-right"></span></button>';


// Poll for jQuery to come into existance
var checkReady = function(callback) {
    if (window.jQuery) {
    	inject_script(base_url + "assets/js/plugins/datepicker/bootstrap-datepicker.js");
    	if(jQuery().datepicker)
        	callback(jQuery);
        else
        	window.setTimeout(function() { checkReady(callback); }, 100);	
    }
    else {
        window.setTimeout(function() { checkReady(callback); }, 100);
    }
};

// Start polling...
checkReady(function($) {
	var $content 	= $("#easy-tv-content");
	var url 		= document.URL;
	var misc 		= location.href.replace(/(.+\w\/)(.+)/,"/$2");
	var channel_id	= $content.attr("data-channel-key");
	var load_set = $.ajax({
				data : {url : url, code : channel_id},
				url: base_url + "client/load_settings",
				type : 'POST'
			});
	load_set.done(function(msg) {
		if(msg == 404){
			console.log("ALERT !! Site not allowed");
		}else if(msg==1){
			$content.append('<div id="key_wrap"><input type="text" id="key_input"><input type="button" id="key_submit" value="Submit"></div>');
		}else{
			desktop(channel_id);
		}
	});


	$(document).on('click','#key_submit',function(){
		$.ajax({
			url: base_url + "client/auth_key",
			type : 'POST',
			data : {publish_key : $('#key_input').val()}
		}).done(function(msg) {
			// alert(msg);
			if(msg=="1"){
	    		desktop(channel_id);
			}
	    	else
	    		alert('Incorrect key');

		});


	});
});

var desktop = function(channel_id){
	var div = document.getElementById('easy-tv-content');
	div.innerHTML 	= wrap_html;
	var url 		= $("#base_url").val();
	var $content 	= $("#easy-tv-content");
	$calendar_picker= $("#calendar_picker");
	$date_title		= $(".date_title");

	var timeline 	= moment();
	$('#key_wrap').remove();


	function load_schedule(timeline){
		var dateformatted = timeline.format("YYYY-M-D");
		$date_title.html(timeline.format("D MMMM YYYY"));
		$calendar_picker.datepicker("setValue", dateformatted);
		console.log("asd");
		$.ajax({
				url  : base_url + "ajax_schedule/getSchedule",
				data : {code : channel_id, date : timeline.format("YYYY-M-D")},
				type : 'POST'
			}).done(function(msg) {
				console.log(msg);
				data_schedule = JSON.parse(msg);
				$("#list_schedule").html("");
				$.each(data_schedule,function(key,data){
					var start_b = new Date(data.start);
					var jam_start = toTime(start_b.getHours());
					var menit_start = toTime(start_b.getMinutes(),3);


					var end_b = new Date(data.end);
					var jam_end = toTime(end_b.getHours());
					var menit_end = toTime(end_b.getMinutes(),3);

					$("#list_schedule").append('<li ><strong><span class="pull-right" style="padding-right:20px;">'+jam_start+""+menit_start+' - '+jam_end+""+menit_end+'</span></strong>'+data.title+'</li>');
				});

				if(data_schedule.length == 0){
					$("#list_schedule").append('<li >No schedule</li>');
				}

		});
	}
	load_schedule(timeline);

	$content.on("click",".prev_schedule",function(){
		timeline.subtract(1,"days");
		load_schedule(timeline);
	});

	$content.on("click",".next_schedule",function(){
		timeline.add(1,"days");
		load_schedule(timeline);
	});


	$calendar_picker.datepicker().
		on('changeDate', function(ev){            
			
			$('#calendar_picker').datepicker('hide');
			newval = new Date(ev.date);
			timeline = moment(ev.date);
			
			load_schedule(timeline);
		});

	var params = { allowScriptAccess: "always" };
		var atts = { id: "myytplayer" };
		swfobject.embedSWF("http://www.youtube.com/apiplayer?enablejsapi=1&version=3",
											 "tv-player", "630", "361", "8", null, null, params, atts);

}




}
function onYouTubePlayerReady(playerId) {
	console.log("asdsda");
	ytplayer = document.getElementById("myytplayer");

	var now = new Date();
	var id = "bf7NbRFyg3Y";
	var difftime = 0;

	for(i=0;i<data_schedule.length;i++){
		var start_b = new Date(data_schedule[i].start);
		var end_b = new Date(data_schedule[i].end);

		if(start_b.toDateString >= now.toDateString()  && start_b < now && end_b > now){
			id = data_schedule[i].video_id;
			
			difftime = now-start_b;
			console.log(difftime);
		}
		// console.log(start_b.toDateString >= now.toDateString());
		// console.log(new Date(data_schedule[i].start).toDateString());
		// console.log(now.toDateString());
		// console.log(id);
	}

	if (ytplayer) {
		ytplayer.loadVideoById(id, difftime/1000, "large");
		
		ytplayer.playVideo();
		ytplayer.mute();
	}
}