<div class="box box-primary">
	
    <div class="box-header">
        <h3 class="box-title">Check Jadwal Lapangan</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
	    <div class="form-group">
	       		<label for="tanggal" >Cari Jadwal : </label>
	        	<input class="span2"id="tanggal" size="22" type="text" >
	        	<button type="button" id="search_jadwal" class="btn btn-primary btn-sm">Search</button>
	    </div>
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
    		
        </tbody>
    </table>
</div><!-- /.box -->
<div id="overlay" style="display:hide;margin-top:-100px;">
		<img id="img-loading" src="<?=base_url()?>assets/img/ajax-loader.gif" alt="Loading" />
	</div>
