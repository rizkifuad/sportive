<style>
	.jam_book{
		float: left;
		padding: 10px;
	}
</style>
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
				<form role="form" action="<?=base_url("home/booking_user")?>" method="post">

					<input type="hidden" name="tanggal" value="<?=str_replace(" ","-",$tanggal);?>"></input>
					<input type="hidden" name="id_member" value="<?=$id_member?>"></input>
					<input type="hidden" name="nama_lapangan" value="<?=$data['nama_lapangan']?>"></input>
					<div class="form-group jam_book">
					<button class="btn" name="book" type="submit" value="<?=$sch; ?>"><?php echo $sch; ?></button>
					</div>
				</form>
			<?php endforeach; ?>

		</td>
	</tr>
	<?php endforeach; ?>
</table>
*Klik pada jam yang diinginkan untuk melakukan booking
</div>
</div>
<?php else: echo "<div class='row'><p align='center'>Data tidak ditemukan</div>"; endif;?>

<script>
	$(document).ready(function(){
		var currentDate = new Date();
	
		$(".datepicker").datepicker()
		  .on('changeDate', function(ev){

		  });
	});
</script>