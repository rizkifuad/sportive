<div id="header">
	<div class="container">
		<a href="<?=base_url()?>" class="logo"><?=$title?> - Sportive.</a>
	</div>

</div>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<div class="box-find">
					<div class="box-head">
						Cari olahraga yang kamu inginkan
					</div>
					<div class="box-body">
						<br>
						<form role="form" method="post" action="<?=base_url("home/find_sportcenter")?>">
							<div class="form-group">
								<label>Pilih olahraga</label>
								<select class="form-control">
									<option>Futsal</option>
								</select>

							</div>

							<div class="form-group">
								<label>Pilih kota</label>
								<select class="form-control">
									<option>Futsal</option>
								</select>

							</div>
							
							<div class="form-group">
								<label>Masukkan nama sportcenter</label>
								<input type="text" class="form-control ">

							</div>

							<div class="form-group">
								<label>&nbsp</label>
								<button class="btn btn-cari">Cari</button>

							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				
			</div>
		</div>

	</div>
</div>
<div id="footer">
	<div class="container"></div>
</div>