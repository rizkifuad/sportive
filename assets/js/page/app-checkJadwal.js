$(document).ready(function(){
	var base_url = $("#base_url").val();
	var tablet = $("#list_jadwal").DataTable();
	$("#tanggal").datepicker({
		format: 'yyyy-mm-dd',

	});

	

	// $("#search_jadwal").click(function(){
	// 	$("#overlay").show();
	// 	var tanggal = $("#tanggal").val();
	// 	console.log(tanggal);
	// 	$.ajax({
	// 		url:base_url+"admin/booking/checking",
	// 		type: "POST",
	// 		dataType: "JSON",
	// 		data: {"tanggal":tanggal}
	// 	}).done(function(data){
	// 		$("#overlay").hide();

	// 		console.log(data);
	// 		// var atribut;
	// 		$.each(data.time, function( index, value ) {
	// 			console.log(value);
	// 		});
			
			
	// 		// table.row.add([
	//   //           jam +':00'
	//   //       ]).draw();

	// 	});
	//});
});