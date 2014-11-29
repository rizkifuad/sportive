<form action="<?=base_url("home/save_register")?>" method="post">
    <input type="hidden" name="id_membership" value="<?=$membership?>">
    <div class="row">
        <div id="register_error" class="alert alert-danger hide" role="alert">
            <ul class="error">
                <li><strong>Oh snap!</strong> Change a few things up and try submitting again.</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Info lapangan</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="nama_sport">Nama Sport Center</label>
                        <input name="nama_sport" type="text" class="form-control" id="nama_sport" placeholder="Masukkan nama sport center"  ">
                    </div>
                    <div class="form-group">
                        <label for="alamat_sport">Alamat Sport Center</label>
                        <textarea name="alamat_sport" id="alamat_sport" class="form-control" rows="3" placeholder="Masukkan alamat lapangan"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Pilih jenis sportcenter</label>
                        <select class="form-control" name="type">
                            <option value="1">Futsal</option>
                            <option value="2">Badminton</option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="chosen_provinsi">Provinsi</label>
                        <select name="prov_sport" class="form-control" id="chosen_provinsi">
                            <?php foreach($provinsi as $prov) {
                            $sel = "";
                            if($id_provinsi==$prov["id_provinsi"])
                            $sel = "selected";
                            ?>
                            <option value="<?= $prov['id_provinsi'] ?>" <?php echo $sel ?>><?= $prov['nama_provinsi'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="chosen_kota">Kota</label>
                        <select name="kota_sport" class="form-control" id="chosen_kota">
                            <?php foreach($kota as $cit) { ?>
                            <option value="<?= $cit['id_kota'] ?>"><?= $cit['nama_kota'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="telp_sport">Telepon Sport Center</label>
                        <input name="telp_sport" type="text" class="form-control" id="telp_sport" placeholder="Masukkan telepon lapangan" >
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Info Pemilik</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="nama_pemilik">Nama pemilik</label>
                        <input name="nama_pemilik" type="text" class="form-control" id="nama_pemilik" placeholder="Masukkan nama pemilik" value="">
                    </div>
                    <div class="form-group">
                        <label for="email_pemilik">Email pemilik</label>
                        <input name="email_pemilik" type="email" class="form-control" id="email_pemilik" placeholder="Masukkan email" value="">
                    </div>
                    <div class="form-group">
                        <label for="telp_pemilik">Telepon pemilik</label>
                        <input name="telp_pemilik" type="text" class="form-control" id="telp_pemilik" placeholder="Masukkan telepon" value="">
                    </div>
                    <div class="form-group">
                        <label for="username_pemilik">Username</label>
                        <input name="username_pemilik" type="text" class="form-control" id="username_pemilik" placeholder="Masukkan username" value="">
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
                
            </div>
        </div>
        <div class="row">
            <div class="container">
                <button type="submit" name="submit" class="btn btn-primary btn-register" value="submit">Register</button>
            </div>
        </div>
    </div>
</form>