<style type="text/css">
	strong{
		width: 70px;
		display: inline-block;
	}
	#item_sportcenter{
		margin-bottom: 20px;
	}
	#sportcenter_wrap{
		padding: 30px 20px;
		background: #fff;
		border-radius: 10px;
	}
	.white{
		background: #fff;
		color:#fff;

	}
</style>
<div id="sportcenter_wrap">
<?php foreach ($sportcenter as $key => $sport) : ?>


<div id="item_sportcenter" class="row">
	<div class="col-md-2">
		<img src="<?php echo U::asset_url("img/home/img-lapangan.jpg"); ?>" class="img-sport" width="150">
	</div>
	<div class="col-md-7">
		<h4><a href="<?php echo base_url("sportcenter/".$sport->id_member) ?>"><?php echo $sport->nama_tempat ?></a></h4>
		<p>
			<strong>Alamat</strong>: <?php echo $sport->alamat_lapangan ?><br>
			<strong>Telepon</strong>: <?php echo $sport->telp_lapangan ?>, <?php echo $sport->nama_kota ?><br>
			<strong>&nbsp;</strong><span class="white">:</span> <?php echo $sport->nama_provinsi ?>
		</p>

	</div>

</div>

<?php endforeach; ?>
</div>