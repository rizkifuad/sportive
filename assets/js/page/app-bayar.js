$(document).ready(function(){
	$("#data_lapangan").dataTable();
	

	$(".pelunasan").click(function(){
		var nama_lapangan = $(this).parent().parent().find(".nama_lapangan").text();
		var nama_penyewa = $(this).parent().parent().find(".nama_penyewa").text();
		var id_booking = $(this).parent().parent().find(".id_booking").text();
		var kekurangan = $(this).parent().parent().find(".kekurangan").text();


		$("#nama_lapangan").val(nama_lapangan);
		$("#nama_penyewa").val(nama_penyewa);
		$("#id_booking").val(id_booking);
		$("#kekurangan").val(kekurangan);
		

		$(".modal-title").text("Pelunasan Lapangan:"+nama_lapangan);
        $(".modal_pelunasan #id_lapangan").val(nama_lapangan);
        $(".modal_pelunasan").modal('show');
	});
});
