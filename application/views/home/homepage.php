
		<div class="row">
			<div class="col-md-5">
				<div class="box-find">
					<div class="box-head">
						Cari olahraga yang kamu inginkan
					</div>
					<div class="box-body">
						<br>
						<form role="form" method="get" action="<?=base_url("home/cari_sportcenter")?>">
							<div class="form-group">
								<label>Pilih provinsi</label>
								<select class="form-control chosen_provinsi" name="provinsi">
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
								<select class="form-control chosen_kota" name="kota">
									<?php
										foreach ($kota as $key => $data) {
											echo "<option value=\"{$data["id_kota"]}\">{$data["nama_kota"]}</option>";
										}
									?>
								</select>

							</div>

							<div class="form-group">
								<label>Pilih jenis sportcenter</label>
								<select class="form-control" name="type">
									<option value="1">Futsal</option>
									<option value="2">Badminton</option>
								</select>

							</div>
							
							<div class="form-group">
								<label>Masukkan nama sportcenter (optional)</label>
								<input name="nama_sportcenter" type="text" class="form-control" placeholder="Masukkan nama sportcenter(optional)"> 

							</div>

							<div class="form-group">
								<label>&nbsp</label>
								<button class="btn btn-cari">Cari</button>

							</div>
						</form>
					</div><!-- box-body -->

				</div>
			</div>

			<div class="col-md-7">
				
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                        <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="http://placehold.it/900x616/d1d1d1/a0a0a0&amp;text=Selamat+Datang+di+Sportive" alt="First slide">
                        </div>
                        <div class="item">
                            <img src="http://placehold.it/900x616/d1d1d1/a0a0a0&amp;text=Cari+Sport+Center" alt="Second slide">
                        </div>
                        <div class="item">
                            <img src="http://placehold.it/900x616/d1d1d1/a0a0a0&amp;text=Reservasi+Online" alt="Third slide">
                        </div>
                        <div class="item">
                            <img src="http://placehold.it/900x616/d1d1d1/a0a0a0&amp;text=Mudah,+Cepat,+Efisien" alt="Fourth slide">
                        </div>
                    </div>
                
            </div>
			</div>
		</div>

		<br>