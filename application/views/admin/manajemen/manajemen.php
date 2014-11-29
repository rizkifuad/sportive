<script>
    $(document).ready(function() {
        $('#table_data').dataTable();
        $('#sortir_date').on('change' , function(){
            if($(this).val() == 2)
                $('#select_tahun').hide();
            else if($(this).val() == 1)
                $('#select_tahun').show();
        });
    } );
</script>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?= $subtitle; ?></h3>
    </div>
    <?= form_open('admin/manajemen/review_laporan'); ?>
    <div class="box-body">
        <div>
            <div class="form-group">
                <label for="exampleInputEmail1">Sortir : </label>
                <select id="sortir_date" name="sortir_date">
                    <option value="1">Bulanan</option>
                    <option value="2">Tahunan</option>
                </select>
                <select id="select_tahun" name="select_tahun">
                    <?php foreach($tahun as $th) { ?>
                        <option value="<?= $th; ?>"><?= $th; ?></option>
                    <?php } ?>
                </select>
                <button type="submit" class="btn btn-primary">Sortir</button>
            </div>
        </div>
    <?= form_close(); ?>
        <?php if($tampil_graph) { ?>
        <div>
            <script type="text/javascript">
                $(function () {
                    $('#container').highcharts({
                        chart: {
                            type: 'line'
                        },
                        title: {
                            text: 'Grafik Reservasi Sport Center'
                        },
                        subtitle: {
                            text: '<?= $subtitle_graph; ?>'
                        },
                        xAxis: {
                            categories: <?= json_encode($sortir[0]); ?>
                        },
                        yAxis: {
                            title: {
                                text: 'Jam'
                            }
                        },
                        plotOptions: {
                            line: {
                                dataLabels: {
                                    enabled: true
                                },
                                enableMouseTracking: false
                            }
                        },
                        series: [
                        {
                            name: 'Reservasi',
                            data: <?= json_encode($sortir[1]); ?>
                        }]
                    });
                });
            </script>
            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>
        <?php } ?>
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
                    <td><?= $data['jml_uang']; ?>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>