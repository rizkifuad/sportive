$(document).ready(function(){

	$('#tanggal').datepicker({
		format: 'yyyy-dd-mm',
	});
	$('#jam').timepicker({
		minuteStep: 30,
        showInputs: false,
	    showMeridian : false
  	});

});