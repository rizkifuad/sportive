<div id="sportcenter_wrap" class="row">
<h2>Reservasi - <?php echo $sportcenter[0]->nama_tempat." - ".str_replace(" ","-",$tanggal); ?> </h2><br>
<div class="row">
<div class="col-md-4">
<form class="form-inline">
<div class="form-group">
	<label for="datepicker">Tanggal</label> <input id="datepicker" type="text" name="tanggal" value="<?php echo $tanggal;?>" class="datepicker form-control" data-date-format="yyyy mm dd">
	<button class="btn">Submit</button>
</div>
<br><br>

</form>
</div>
<?php if($book) :  ?>
<table class="table table-bordered">
	<tr>
		<th>Lapangan</th>
		<th>List jam</th>
	</tr>
	<?php foreach ($book as $key => $data) : ?>

	<tr>
		<td><?php echo $data["nama_lapangan"] ?></td>
		<td>
			<?php foreach ($data["jadwal"] as $key => $sch) : ?>
				<button class="btn"><?php echo $sch; ?></button>
			<?php endforeach; ?>

		</td>
	</tr>
	<?php endforeach; ?>
</table>
*Klik pada jam yang diinginkan untuk melakukan booking
<?php else: echo "Data tidak ditemukan"; endif;?>
</div>

<script>
	$(document).ready(function(){
		var currentDate = new Date();
	
		$(".datepicker").datepicker()
		  .on('changeDate', function(ev){

		  });
	});
</script>