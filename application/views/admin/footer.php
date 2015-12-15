</div>

<!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Konfirmasi</h4>
                  </div>
                  <div class="modal-body">
                        <input type="hidden" name="idhapus" id="idhapus">
                            <p>Apakah anda yakin ingin menghapus data ini?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="konfirmasi">Hapus</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

<script src="<?=site_url('assets/js/jquery.min.js')?>"></script>
<script src="<?=site_url('assets/js/jquery-ui-1.10.3.min.js')?>" type="text/javascript"></script>
<script src="<?=site_url('assets/js/bootstrap.min.js')?>" type="text/javascript"></script>

<script src="<?=site_url('assets/tinymce/tinymce.min.js')?>" type="text/javascript"></script>

<script type="text/javascript">
    tinyMCE.init({
        mode : "specific_textareas",
        editor_selector : "mceEditor"
});
</script>

<script>
    $(function(){
        $(".hapus").click(function(){
            var kode=$(this).attr("kode");
            
            $("#idhapus").val(kode);
            $("#myModal").modal("show");
        });
        
        $("#konfirmasi").click(function(){
            var kode=$("#idhapus").val();
            
            $.ajax({
                url:"<?php echo site_url('admin/hapus');?>",
                type:"GET",
                data:"kode="+kode,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('admin/master/peserta');?>";
                }
            });
        });
    });
    
</script>

<?php
$uri3 = $this->uri->segment(3);
if ($uri3 == 'peserta' || $uri3 == 'soal' || $uri3 == 'user' || $uri3 == 'edit-user' || $uri3 == 'ujian' || $uri3 == 'kelompok-ujian') {
    echo '<script src="'.site_url('assets/js/plugins/datatables/jquery.dataTables.js').'" type="text/javascript"></script>';
    echo '<script src="'.site_url('assets/js/plugins/datatables/dataTables.bootstrap.js').'" type="text/javascript"></script>';
    echo '<script type="text/javascript">'
            . '$(function() {'
            . '$("#example1").dataTable();'
            . '});'
            . '</script>';
} elseif ($uri3 == 'input-peserta' || $uri3 == 'edit-peserta') {
    echo '<script src="'.site_url('assets/js/plugins/datepicker/bootstrap-datepicker.js').'" type="text/javascript"></script>';
    echo '<script type="text/javascript">'
            . '$(function() {'
            . '$("#tgl_lahir").datepicker({'
            . 'format:"yyyy-m-d"});'
            . '});'
            . '</script>';
} elseif ($uri3 == 'input-soal' || $uri3 == 'edit-soal') {
    /* echo '<script src="'.site_url('assets/js/plugins/ckeditor/ckeditor.js').'" type="text/javascript"></script>'; */
	echo '<script src="'.site_url('assets/js/plugins/redactor/redactor.min.js').'" type="text/javascript"></script>';
    echo '<script type="text/javascript">'
        . '$(document).ready(function() {'
        . '$("#editor").redactor();'
        . '});'
        . '</script>';
}
?>
<script src="<?=site_url('assets/js/AdminLTE/app.js')?>" type="text/javascript"></script>



</body>
</html>