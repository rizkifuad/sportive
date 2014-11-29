<div id="sportcenter_wrap" class="row">
<?php if($book) :  ?>
<table class="table table-bordered">
	<?php foreach ($book as $key => $data) : ?>

	<tr>
		<td><?php echo $data["nama_lapangan"] ?></td>
		<td>
			<?php foreach ($data["jadwal"] as $key => $sch) : ?>
				<button class="btn"><?php echo $sch; ?></button>
			<?php endforeach; ?>

		</td>
	</tr>
	<?php endforeach; ?>
</table>
<?php endif; ?>
</div>