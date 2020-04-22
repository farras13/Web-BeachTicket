<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; E-Malang 2020</div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url();  ?>assets/admin/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url();  ?>assets/admin/demo/chart-area-demo.js"></script>
<script src="<?= base_url();  ?>assets/admin/demo/chart-bar-demo.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url();  ?>assets/admin/demo/datatables-demo.js"></script>

<script>
    CKEDITOR.replace('editor');
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#id_vacation').change(function() {

            var id_vacation = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('admin/get_data') ?>",
                dataType: "JSON",
                data: {
                    id_vacation: id_vacation
                },
                cache: false,
                success: function(data) {
                    $.each(data, function(id_vacation, harga) {
                        $('#harga').val(data.harga);

                    });

                }
            });
            return false;
        });

    });
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript">
    var ctx = document.getElementById('bar').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php
                if (count($graph) > 0) {
                    foreach ($graph as $data) {
                        echo "'" . $data->a . "',";
                    }
                }
                ?>
            ],
            datasets: [{
                label: 'Jumlah pengunjung',
                backgroundColor: '#ADD8E6',
                borderColor: '##93C3D2',
                data: [
                    <?php
                    if (count($graph) > 0) {
                        foreach ($graph as $data) {
                            echo $data->c . ", ";
                        }
                    }
                    ?>
                ]
            }]
        },
    });
</script>
</body>

</html>