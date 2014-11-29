$(document).ready(function(){
	var base_url = $("#base_url").val();
	var tablet = $("#list_jadwal").DataTable();
	$("#tanggal").datepicker({
		format: 'yyyy-mm-dd',

	});

	

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
			
			var split = data.schedule.jam_buka.split(":");
			var jam_buka = parseInt(split[0]);
			var split2 = data.schedule.jam_tutup.split(":");
			var jam_tutup = parseInt(split2[0]);
			
			for (var i = jam_buka; i <= jam_tutup; i++) {
				if(i.toString().length==1){
					i = "0"+i;
				}
				console.log("i:"+i);
				console.log("jam_tutup:"+jam_tutup);
				tablet.row.add( [
		            i+":00" ,
		            
		        ] ).draw();
			};
			
			// table.row.add([
	  //           jam +':00'
	  //       ]).draw();

		});
	});
});