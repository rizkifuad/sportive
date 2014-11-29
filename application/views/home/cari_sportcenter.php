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
	.box-search{
		background: #ededed;
		padding:10px;
	}
</style>
<div id="sportcenter_wrap" class="row">
<h2>Data sportcenter</h2>
<div class="box-search col-md-3">
	<form role="form"  method="get" action="<?=base_url("home/cari_sportcenter")?>">
		<div class="form-group">
			<label>Pilih provinsi</label>
			<select class="form-control input-sm chosen_provinsi" name="provinsi">
				<?php
					foreach ($provinsi as $key => $prov) {
						$sel = "";
						if($prov["id_provinsi"] == 16)$sel = "selected";
						echo "<option value=\"{$prov["id_provinsi"]}\" {$sel}>{$prov["nama_provinsi"]}</option>";
					}
				?>
			</select>

		</div>

		<div class="form-group">
			<label>Pilih kota</label>
			<select class="form-control input-sm chosen_kota" name="kota">
				<?php
					foreach ($kota as $key => $data) {
						echo "<option value=\"{$data["id_kota"]}\">{$data["nama_kota"]}</option>";
					}
				?>
			</select>

		</div>

		<div class="form-group">
			<label>Pilih jenis sportcenter</label>
			<select class="form-control input-sm" name="type">
				<option value="1">Futsal</option>
				<option value="2">Badminton</option>
			</select>

		</div>
		
		<div class="form-group">
			<label>Masukkan nama sportcenter (optional)</label>
			<input name="nama_sportcenter" type="text" class="form-control input-sm" placeholder="Masukkan nama sportcenter(optional)"> 

		</div>

		<div class="form-group">
			<label>&nbsp</label>
			<button class="btn">Cari</button>

		</div>
	</form>
</div>
<div class="col-md-5">
<?php
	if(count($sportcenter) == 0 ){
		echo "Data tidak ditemukan";
	}
?>
<?php foreach ($sportcenter as $key => $sport) : ?>

<div id="item_sportcenter" class="row">
	<div class="col-md-2">
		<img src="<?php echo U::asset_url("img/home/img-lapangan.jpg"); ?>" class="img-sport" width="150">
	</div>
	<div class="col-md-7">
		<h4><a href="<?php echo base_url("home/sportcenter/".$sport->id_member) ?>"><?php echo $sport->nama_tempat ?></a></h4>
		<p>
			<strong>Alamat</strong>: <?php echo $sport->alamat_lapangan ?><br>
			<strong>Telepon</strong>: <?php echo $sport->telp_lapangan ?>, <?php echo $sport->nama_kota ?><br>
			<strong>&nbsp;</strong><span class="white">:</span> <?php echo $sport->nama_provinsi ?>
		</p>

	</div>

</div>
</div>
<?php endforeach; ?>
</div>