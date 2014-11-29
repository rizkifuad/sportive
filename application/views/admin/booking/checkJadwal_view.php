<div class="box box-primary">
	
    <div class="box-header">
        <h3 class="box-title">Check Jadwal Lapangan</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
	    <form role="form" action="<?=base_url("admin/booking/checking")?>" method="post">
		    <div class="form-group">
		       		<label for="tanggal" >Cari Jadwal : </label>
		        	<input class="span2"id="tanggal" size="22" type="text" name="tanggal" >
		        	<button type="submit" id="search_jadwal" class="btn btn-primary btn-sm">Search</button>
		    </div>
	    </form>
    </div>
    <table id="list_jadwal" class="table table-bordered table-striped">
         <thead>
            <tr>
            	<th>Jam</th>
                <?php
	                if($nama_lapangan) :
	                    foreach ($nama_lapangan as $key => $value) :
	            ?>
	                    <th class="id_booking"><?=$value?></th>
	            <?php endforeach;
	            		endif;
	            ?>
            </tr>
        </thead>
        <tbody>
    		<?php
    			if($current):
    				foreach ($current as $key => $value):
    		?>
    		<tr>
	    		<td><?=$value?></td>
	    		<?php
	    			foreach ($book as $key => $value) :
	    		?>
    			<td><?=$book?></td>
    		</tr>
    		<?php
    			endforeach;
    			endforeach;
    			endif;
    		?>
        </tbody>
    </table>
</div><!-- /.box -->
<div id="overlay" style="display:hide;margin-top:-100px;">
		<img id="img-loading" src="<?=base_url()?>assets/img/ajax-loader.gif" alt="Loading" />
	</div>
