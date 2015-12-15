<section class="content-header">
    <h1>Setting <?=str_replace('-', ' ', $this->uri->segment(3))?></h1>
    <?=create_breadcrumb()?>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <?=form_open()?>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <span class="btn btn-success">Kode Peserta</span>
                            </div>
                            <?=form_input(array('name' => 'kd_peserta', 'class' => 'form-control', 'value' => $detail->kd_peserta))?>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <span class="btn btn-success">Nomor Peserta</span>
                            </div>
                            <?=form_input(array('name' => 'no_peserta', 'class' => 'form-control', 'value' => $detail->no_peserta))?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <?=form_submit(array('value' => 'Simpan Data', 'class' => 'btn btn-primary'))?>
            </div>
            <?=form_close()?>
        </div>
    </div>
</section>