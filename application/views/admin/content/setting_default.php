<section class="content-header">
    <h1>Setting <?= str_replace('-', ' ', $this->uri->segment(3)) ?></h1>
    <?=create_breadcrumb()?>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <?=form_open()?>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6">
                        <?=form_label('Waktu Ujian', 'waktu_ujian') ?>
                        <?=form_input(array('name' => 'waktu_ujian', 'class' => 'form-control', 'value' => $update->waktu_ujian))?>
                        <div class="box-footer">
                            <small>Masukkan jumlah waktu ujian dalam bentuk menit.</small>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <?=form_label('Point', 'point_soal') ?>
                        <?=form_input(array('name' => 'point_soal', 'class' => 'form-control', 'value' => $update->point_soal))?>
                        <div class="box-footer">
                            <small>Masukkan jumlah point soal.</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <?= form_submit(array('value' => 'Simpan Data', 'class' => 'btn btn-primary')) ?>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</section>