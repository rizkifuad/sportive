<?= form_open('admin/settings/simpanHarga'); ?>
<div class="box-body">
    <div class="form-group">
        <label for="exampleInputEmail1">Harga lapangan per-jam</label>
        <input name="harga_perjam" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?= $default_data['harga_per_jam'] ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Uang muka minimal</label>
        <input name="uang_muka" type="number" class="form-control" id="exampleInputPassword1" placeholder="Password" value="<?= $default_data['uang_muka'] ?>">
    </div>
</div>
<div class="box-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
<?= form_close(); ?>