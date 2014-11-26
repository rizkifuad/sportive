$(document).ready(function(){
	var $chosen_provinsi = $(".chosen_provinsi");
	var $chosen_kota     = $(".chosen_kota");

	$chosen_provinsi.chosen();
	$chosen_kota.chosen();

	var url = $("#base_url").val();

	$chosen_provinsi.on('change', function(evt, params) {
		var id_provinsi = params.selected;
		var kota = $.ajax({
			url    : url + "api/getKotaByProvinsi",
			method : "GET",
			data   : {id_provinsi : id_provinsi}
		});

		kota.done(function(msg){
			$chosen_kota.html("");
			var data = JSON.parse(msg);
			if(data.error == 0){
				var data_kota = data.kota;
				var html      = "";
				for (var i = 0 ; i < data_kota.length; i++) {
					html += "<option value=\""+data_kota[i].id_kota+"\">"+data_kota[i].nama_kota+"</option>"
				};
				$chosen_kota.html(html);
				$chosen_kota.trigger('chosen:updated');
			}
		});
	});
});