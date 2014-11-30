<div class="box box-primary">
	
    <div class="box-header">
        <h3 class="box-title">Check Jadwal Lapangan</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
	    <form role="form" action="<?=base_url("admin/booking/checking")?>" method="post">
		    <div class="form-group">
		       		<label for="tanggal" >Cari Jadwal : </label>
		        	<input class="span2"id="tanggal" size="22" type="text" name="tanggal" >
		        	<button type="submit" id="search_jadwal" class="btn btn-primary btn-sm">Search</button>
		    </div>
	    </form>
    </div>
    <?php if($book) :  ?>
<table id="list_jadwal" class="table table-bordered">
	<thead>
		<tr>
			<th>Nama Lapangan</th>
			<th>Jam Booking</th>
		</tr>
	</thead>
	<?php foreach ($book as $key => $data) : ?>

	<tr>
		<td><?php echo $data["nama_lapangan"] ?></td>
		<td>
			<?php foreach ($data["jadwal"] as $key => $sch) : ?>
				<form role="form" action="<?=base_url("home/booking_user")?>" method="post">
					<input type="hidden" name="tanggal" value="<?=$tanggal?>"></input>
					<input type="hidden" name="nama_lapangan" value="<?=$data['nama_lapangan']?>"></input>
					<button class="btn" name="book" type="submit" value="<?=$sch; ?>"><?php echo $sch; ?></button>
				</form>
			<?php endforeach; ?>

		</td>
	</tr>
	<?php endforeach; ?>
</table>
<?php endif; ?>
</div><!-- /.box -->
<div id="overlay" style="display:hide;margin-top:-100px;">
		<img id="img-loading" src="<?=base_url()?>assets/img/ajax-loader.gif" alt="Loading" />
	</div>
