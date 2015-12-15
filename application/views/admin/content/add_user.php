<div class="col-xs-4">
    <?php
    if ($this->session->userdata('error_foto')) {
        echo '<div class="alert alert-danger alert-dismissable">';
        echo '<i class="fa fa-ban"></i>';
        echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        echo '<b>Alert!</b> Tolong foto peserta jangan di kosongkan.';
        echo '</div>';
    }
    ?>
    <?= form_open_multipart() ?>
    <div class="form-group">
        <?= form_label('Foto', 'foto') ?>
        <?= form_upload(array('name' => 'foto', 'class' => 'form-control')) ?>
    </div>
    <div class="form-group">
        <?= form_label('Nama Lengkap', 'nama') ?>
        <?= form_input(array('name' => 'nama', 'class' => 'form-control', 'value' => set_value('nama'))) ?>
    </div>
    <div class="form-group">
        <?= form_label('Email', 'email') ?>
        <?= form_input(array('name' => 'email', 'class' => 'form-control', 'value' => set_value('email'))) ?>
    </div>
    <div class="form-group">
        <?= form_label('Username', 'username') ?>
        <?= form_input(array('name' => 'username', 'class' => 'form-control', 'value' => set_value('username'))) ?>
    </div>
    <div class="form-group">
        <?= form_label('Password', 'password') ?>
        <?= form_password(array('name' => 'password', 'class' => 'form-control', 'value' => set_value('password'))) ?>
    </div>
    <div class="box-footer">
        <?= form_submit(array('value' => 'Simpan Data', 'class' => 'btn btn-primary')) ?>
    </div>
    <?= form_close() ?>
</div>