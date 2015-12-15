<section class="content-header">
    <h1>Input Examinees</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <?php
            if ($this->session->userdata('error_foto')) {
                echo '<div class="alert alert-danger alert-dismissable">';
                echo '<i class="fa fa-ban"></i>';
                echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                echo '<b>Alert!</b> Tolong foto peserta jangan di kosongkan.';
                echo '</div>';
            } elseif ($this->session->userdata('error_email')) {
                echo '<div class="alert alert-danger alert-dismissable">';
                echo '<i class="fa fa-ban"></i>';
                echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                echo '<b>Alert!</b> Email anda masukkan sudah terdaftar sebelumnya.';
                echo '</div>';
            }
            ?>
            <?php echo validation_errors(); ?>
           
            <?=form_open_multipart()?>
            <?=form_hidden('ID_klp_ujian', $this->uri->segment(4))?>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6">
                        <?=form_label('Photo', 'foto')?>
                        <?=form_upload(array('name' => 'foto', 'class' => 'form-control', 'value' => $this->upload->file_name))?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6">
                        <?=form_label('Examinees Number', 'kd_anggota')?>
                        <?=form_input(array('name' => 'kd_anggota', 'class' => 'form-control', 'value' => $kd_peserta.$no_peserta, 'readonly' => ''))?>
                    </div>
                    <div class="col-xs-6">
                        <?=form_label('Name', 'nama')?>
                        <?=form_input(array('name' => 'nama', 'class' => 'form-control', 'value' => set_value('nama')))?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6">
                        <?=form_label('NIM', 'nim')?>
                        <?=form_input(array('name' => 'nim', 'class' => 'form-control', 'value' => set_value('nim')))?>
                    </div>
                    <div class="col-xs-6">
                        <?=form_label('Date Of Birth', 'tgl_lahir')?>
                        <?=form_input(array('name' => 'tgl_lahir', 'id' => 'tgl_lahir', 'class' => 'form-control', 'value' => set_value('tgl_lahir')))?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <?=form_label('Sex', 'jekel')?>
                <div class="radio">
                    <label>
                        <?=form_radio(array('name' => 'jekel', 'value' => 'l'))?> Man
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <?=form_radio(array('name' => 'jekel', 'value' => 'p'))?> Women
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6">
                        <?=form_label('Email', 'email')?>
                        <?=form_input(array('name' => 'email', 'class' => 'form-control', 'value' => set_value('email')))?>
                    </div>
                    <div class="col-xs-6">
                        <?=form_label('Phone', 'telp')?>
                        <?=form_input(array('name' => 'telp', 'class' => 'form-control', 'value' => set_value('telp')))?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <?=form_label('Address', 'alamat')?>
                <?=form_textarea(array('name' => 'alamat', 'class' => 'form-control', 'cols' => '5', 'rows' => '3', 'value' => set_value('alamat')))?>
            </div>
            <div class="box-footer">
                <?=form_submit(array('value' => 'Save', 'class' => 'btn btn-primary'))?>
                <?=anchor('admin/master/peserta', 'Cancel', array('class' => 'btn btn-danger'))?>
            </div>
            <?=form_close()?>
        </div>
    </div>
</section>