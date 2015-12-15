</div>
<script src="<?=site_url('assets/js/jquery.min.js')?>"></script>
<script src="<?=site_url('assets/js/jquery-ui-1.10.3.min.js')?>" type="text/javascript"></script>
<script src="<?=site_url('assets/js/bootstrap.min.js')?>" type="text/javascript"></script>

<?php
$uri2 = $this->uri->segment(2);
if ($uri2 == 'review') {
    echo '<script src="'.site_url('assets/js/plugins/datatables/jquery.dataTables.js').'" type="text/javascript"></script>';
    echo '<script src="'.site_url('assets/js/plugins/datatables/dataTables.bootstrap.js').'" type="text/javascript"></script>';
    echo '<script type="text/javascript">$(function() {$("#example2").dataTable({"bPaginate": true,"bLengthChange": false,"bFilter": false,"bSort": true,"bInfo": true,"bAutoWidth": false});});</script>';
}
?>
<script src="<?=site_url('assets/js/AdminLTE/app.js')?>" type="text/javascript"></script>
</body>
</html>