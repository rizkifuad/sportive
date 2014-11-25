<?= form_open('admin/settings/simpanInfoSportCenter'); ?>
<div class="col-md-6">
	<div class="box box-primary">
		<div class="box-header">
            <h3 class="box-title">Info lapangan</h3>
        </div>
    	<div class="box-body">
    	    <div class="form-group">
    	        <label for="nama_sport">Nama Sport Center</label>
    	        <input name="nama_sport" type="text" class="form-control" id="nama_sport" placeholder="Masukkan nama sport center" value="<?= $all_data['nama_tempat'] ?>">
    	    </div>
    	    <div class="form-group">
    	        <label for="alamat_sport">Alamat Sport Center</label>
    	        <textarea name="alamat_sport" id="alamat_sport" class="form-control" rows="3" placeholder="Masukkan alamat lapangan"><?= $all_data['alamat_lapangan'] ?></textarea>
    	    </div>
    	    <div class="form-group">
    	        <label for="prov_sport">Provinsi</label>
    	        <select name="prov_sport" class="form-control" id="prov_sport">
                    <?php foreach($data_prov as $prov) { ?>
                        <?php if($prov['id_provinsi'] == $all_data['provinsi']) { ?>
                            <option value="<?= $prov['id_provinsi'] ?>" selected><?= $prov['nama_provinsi'] ?></option>
                        <?php } else { ?>
                            <option value="<?= $prov['id_provinsi'] ?>"><?= $prov['nama_provinsi'] ?></option>
                    <?php }} ?>
                </select>
    	    </div>
    	    <div class="form-group">
    	        <label for="kota_sport">Kota</label>
    	        <select name="kota_sport" class="form-control" id="kota_sport">
                    <?php foreach($data_kota as $kota) { ?>
                        <?php if($kota['id_kota'] == $all_data['kota']) { ?>
                            <option value="<?= $kota['id_kota'] ?>" selected><?= $kota['nama_kota'] ?></option>
                        <?php } else { ?>
                            <option value="<?= $kota['id_kota'] ?>"><?= $kota['nama_kota'] ?></option>
                    <?php }} ?>
                </select>
    	    </div>
    	    <div class="form-group">
    	        <label for="telp_sport">Telepon Sport Center</label>
    	        <input name="telp_sport" type="text" class="form-control" id="telp_sport" placeholder="Masukkan nama lapangan" value="<?= $all_data['telp_lapangan'] ?>">
    	    </div>
    	</div>
   	 	<div class="box-footer">
    	    <button type="submit" class="btn btn-primary">Update</button>
    	</div>
	</div>
</div>
<?= form_close(); ?>
<?= form_open('admin/settings/simpanInfoPemilik'); ?>
<div class="col-md-6">
	<div class="box box-primary">
		<div class="box-header">
            <h3 class="box-title">Info Pemilik</h3>
        </div>
    	<div class="box-body">
    	    <div class="form-group">
    	        <label for="nama_pemilik">Nama pemilik</label>
    	        <input name="nama_pemilik" type="text" class="form-control" id="nama_pemilik" placeholder="Masukkan nama pemilik" value="<?= $all_data['nama_pemilik'] ?>">
    	    </div>
    	    <div class="form-group">
    	        <label for="email_pemilik">Email pemilik</label>
    	        <input name="email_pemilik" type="email" class="form-control" id="email_pemilik" placeholder="Masukkan email" value="<?= $all_data['email'] ?>">
    	    </div>
    	    <div class="form-group">
    	        <label for="telp_pemilik">Telepon pemilik</label>
    	        <input name="telp_pemilik" type="text" class="form-control" id="telp_pemilik" placeholder="Masukkan telepon" value="<?= $all_data['telp_pemilik'] ?>">
    	    </div>
    	    <div class="form-group">
    	        <label for="username_pemilik">Username</label>
    	        <input name="username_pemilik" type="text" class="form-control" id="username_pemilik" placeholder="Masukkan username" value="<?= $all_data['username'] ?>">
    	    </div>
    	    <div class="form-group">
    	        <label for="pass_pemilik">Password</label>
    	        <input name="pass_pemilik" type="password" class="form-control" id="pass_pemilk" placeholder="Masukkan password">
    	    </div>
    	    <div class="form-group">
    	        <label for="konf_pass">Konfirmasi Password</label>
    	        <input name="konf_pass" type="password" class="form-control" id="konf_pass" placeholder="Konfirmasi Password">
    	    </div>
    	</div>
   	 	<div class="box-footer">
    	    <button type="submit" class="btn btn-primary">Simpan</button>
    	</div>
	</div>
</div>
<?= form_close(); ?>