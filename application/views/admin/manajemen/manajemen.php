<div class="box">
    <div class="box-header">
        <h3 class="box-title">Daftar Reservasi Hari ini</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered display" id="table_data">
            <thead>
                <tr>
                    <?= $thead; ?>
                </tr>
            </thead>
            <?php foreach($laporan_harian as $data) { ?>
                <tr>
                    <td><?= substr($data['jadwal'], 11); ?></td>
                    <td><?= $data['durasi']; ?> Jam</td>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['nama_lapangan']; ?></td>
                    <td><?php if($data['status'] == 0) echo 'Hanya Booking'; elseif($data['status'] == 1) echo 'Hanya DP'; else echo 'Lunas'; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#table_data').DataTable();
    } );
</script>