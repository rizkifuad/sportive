$(document).ready(function(){
	 $("#data_lapangan").dataTable();
	var $btn_edit 		= $(".btn-edit");
	var $title_lapangan = $("#title_lapangan");
	var $id_lapangan    = $("#id_lapangan");
	var $nama_lapangan  = $("#nama_lapangan");
	var $deskripsi_lapangan = $("#deskripsi_lapangan");
	var $_tambah_lapangan = $("#_tambah_lapangan");


	var url = $("#base_url").val();
	$btn_edit.on("click",function(e){
		var id  = $(this).attr("data-id");
		var req = $.ajax({
			url  : url + "admin/ajax/getLapanganByID",
			data : {
				id_lapangan : id
			},
			method : "get"
		});

		req.done(function(msg){
			var data = JSON.parse(msg);
			console.log(data);
			$_tambah_lapangan.removeClass("hide");
			$title_lapangan.html("Edit lapangan");
			$id_lapangan.val(data.id_lapangan);
			$nama_lapangan.val(data.nama_lapangan);
			$deskripsi_lapangan.val(data.deskripsi_lapangan);
		});

		e.preventDefault();
	});

	$("#wrap_lapangan").on("click","#_tambah_lapangan",function(){
		$id_lapangan.val("");
		$nama_lapangan.val("");
		$deskripsi_lapangan.val("");
		$_tambah_lapangan.addClass("hide");
		$title_lapangan.html("Tambah lapangan");
	});

});