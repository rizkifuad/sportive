$(document).ready(function(){
	var base_url = $("#base_url").val();
	$("#tanggal").datepicker({
		format: 'yyyy-mm-dd',

	});

	var table = $("#list_lapangan").dataTable();

	$("#search_jadwal").click(function(){
		$("#overlay").show();
		var tanggal = $("#tanggal").val();
		console.log(tanggal);
		$.ajax({
			url:base_url+"admin/booking/checking",
			type: "POST",
			dataType: "JSON",
			data: {"tanggal":tanggal}
		}).done(function(data){
			$("#overlay").hide();

			$.each( data.schedule, function( key, value ) {
				console.log(value.jam_buka);
			  	
			});
		});
	});
});