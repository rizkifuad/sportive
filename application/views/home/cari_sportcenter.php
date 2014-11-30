<style type="text/css">
	strong{
		width: 70px;
		display: inline-block;
	}
	#item_sportcenter{
		margin-bottom: 20px;
		margin-left: 20px;
	}
	
	.white{
		background: #fff;
		color:#fff;

	}
	.box-search{
		background: #ededed;
		padding:20px;
	}
	.detail_lapangan{
		margin-left: 20px;
	}
</style>
<div id="sportcenter_wrap" class="row">
<h2>Data Sport Center</h2>
<hr>
<div class="box-search col-md-3">
	<form role="form"  method="get" action="<?=base_url("home/cari_sportcenter")?>">
		<div class="form-group">
			<label>Pilih provinsi</label>
			<select class="form-control input-sm chosen_provinsi" name="provinsi">
				<?php
					foreach ($provinsi as $key => $prov) {
						$sel = "";
						if($prov["id_provinsi"] == $sel_provinsi)$sel = "selected";
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
						$sel = "";
						if($data["id_kota"] == $sel_kota) $sel = "selected";
						echo "<option value=\"{$data["id_kota"]}\" {$sel}>{$data["nama_kota"]}</option>";
					}
				?>
			</select>

		</div>

		<div class="form-group">
			<label>Pilih jenis sportcenter</label>
			<select class="form-control input-sm" name="type">
				<?php
					$type = array("Futsal","Badminton");
					foreach ($type as $key => $sport) {
						$i = $key +1;
						echo "<option value=\"{$i}\">{$sport}</option>";
					}
				?>
				
			</select>

		</div>
		
		<div class="form-group">
			<label>Masukkan nama sportcenter (optional)</label>
			<input name="nama_sportcenter" type="text" class="form-control input-sm" placeholder="Masukkan nama sportcenter(optional)" value="<?php echo $sel_nama_sportcenter ?>"> 

		</div>

		<div class="form-group">
			
			<button class="btn btn-primary">Cari</button>

		</div>
	</form>
</div>
<div class="col-md-9">
<?php
	if(count($sportcenter) == 0 ){
		echo "Data tidak ditemukan";
	}
?>
<?php foreach ($sportcenter as $key => $sport) : ?>

<div id="item_sportcenter" class="row" >
	<h4><a href="<?php echo base_url("home/sportcenter/".$sport->id_member) ?>"><?php echo $sport->nama_tempat ?></a></h4>
	<div class="row">
		<div class="col-md-2">
			<img src="<?php echo U::asset_url("img/home/img-lapangan.jpg"); ?>" class="img-sport" width="150">
		</div>
		<div class="col-md-8 detail_lapangan">
			<p>
				<strong>Harga</strong>: <?php echo $sport->harga_per_jam ?><br>
				<strong>Alamat</strong>: <?php echo $sport->alamat_lapangan ?>,<br>
				<strong>&nbsp;</strong><span class="white">:</span> <?php echo $sport->nama_kota ?><br>
				<strong>&nbsp;</strong><span class="white">:</span> <?php echo $sport->nama_provinsi ?><br>
				<strong>Telepon</strong>: <?php echo $sport->telp_lapangan ?>
			</p>

		</div>
	

</div>

</div>
<?php endforeach; ?>
</div>