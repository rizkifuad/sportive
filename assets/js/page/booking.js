$(document).ready(function(){
	$('#tanggal').datepicker({
		format: 'yyyy-mm-dd',
	});
	$('#jam').timepicker({
		minuteStep: 30,
        showInputs: false,
	    showMeridian : false
  	});
});