
		<div class="row">
			<div class="col-md-5">
				<div class="box-find">
					<div class="box-head">
						Cari olahraga yang kamu inginkan
					</div>
					<div class="box-body">
						<br>
						<form role="form" method="get" action="<?=base_url("home/find_sportcenter")?>">
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
								<label>Masukkan nama sportcenter (optional)</label>
								<input name="sporcenter" type="text" class="form-control" placeholder="Masukkan nama sportcenter(optional)"> 

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
				
			</div>
		</div>

		<br>