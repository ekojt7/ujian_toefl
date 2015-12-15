<div class="col-xs-4">
    <?= form_open_multipart() ?>
    <div class="form-group">
        <?= form_label('Foto', 'foto') ?>
        <?= form_upload(array('name' => 'foto', 'class' => 'form-control')) ?>
    </div>
    <div class="form-group">
        <?= form_label('Nama Lengkap', 'nama') ?>
        <?= form_input(array('name' => 'nama', 'class' => 'form-control', 'value' => $session->nama)) ?>
    </div>
    <div class="form-group">
        <?= form_label('Email', 'email') ?>
        <?= form_input(array('name' => 'email', 'class' => 'form-control', 'value' => $session->email)) ?>
    </div>
    <div class="form-group">
        <?= form_label('Username', 'username') ?>
        <?= form_input(array('name' => 'username', 'class' => 'form-control', 'value' => $session->username)) ?>
    </div>
    <div class="form-group">
        <?= form_label('Password', 'password') ?>
        <?= form_password(array('name' => 'password', 'class' => 'form-control', 'value' => $this->encryption->decode($session->password))) ?>
    </div>
    <div class="box-footer">
        <?= form_submit(array('value' => 'Simpan Data', 'class' => 'btn btn-primary')) ?>
    </div>
    <?= form_close() ?>
</div>