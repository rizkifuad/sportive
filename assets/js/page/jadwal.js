$(document).ready(function(){
    $('.jam').timepicker({
		    minuteStep: 30,
        showInputs: false,
        showMeridian : false,
        // defaultTime : false
  	});


    $('.checkboxHari').on('ifChecked', function(event){
      $(this).parent().parent().parent().find("input[type=text]").prop('disabled', false);
    });

     $('.checkboxHari').on('ifUnchecked', function(event){
        $(this).parent().parent().parent().find("input[type=text]").prop('disabled', true);
    });
});