<div class="row">
	<div class="col-md-4"></div>
	<div id="content" class="col-md-4">
		<h3 >Cek booking</h3>
		<form id="frm-login" role="form"  action="<?php echo base_url("home/cek_booking")?>" method="get">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Masukkan kode booking" name="token" value="<?php echo $token; ?>">
			</div>

			<button type="submit" class="btn btn-default btn-primary">Cek Kode</button>
		</form>
		<br>
		<?php
			if(isset($data_book) ){
				// U::pre_test($data_book);
				if($data_book){
		?>
			<table class="table">
				<tr>
					<td colspan="2" class="hd" align="center">Info reservasi</td>
				</tr>
				<tr>
					<th>Kode booking</th>
					<td><?php echo $data_book->token ?></td>
				</tr>
				<tr>
					<th>Sportcenter</th>
					<td><?php echo $data_book->nama_tempat ?></td>
				</tr>
				<tr>
					<th>Lapangan</th>
					<td><?php echo $data_book->nama_lapangan ?></td>
				</tr>
				<tr>
					<th>Tanggal</th>
					<td><?php echo date('d/m/Y',strtotime($data_book->jadwal)); ?></td>
				</tr>
				<tr>
					<th>Jam</th>
					<td><?php echo date('H:i:s',strtotime($data_book->jadwal)); ?></td>
				</tr>
				<tr>
					<th>Durasi</th>
					<td><?php echo $data_book->durasi ?> jam</td>
				</tr>
				<tr>
					<td colspan="2" class="hd" align="center">Info pemesan</td>
				</tr>
				<tr>
					<th>Nama</th>
					<td><?php echo $data_book->nama ?></td>
				</tr>
				<tr>
					<th>Telepon</th>
					<td><?php echo substr($data_book->telp, 0,count($data_book->telp)-3 ) ?>***</td>
				</tr>
				
			</table>
		<?php		
				}
				else{
		?>
				<p align="center">Kode Booking <strong><?php echo $token ?></strong> tidak terdaftar dalam sistem</p>
		<?php
				}		
			}
		?>
			
	</div>
	<div class="col-md-4"></div>
</div>