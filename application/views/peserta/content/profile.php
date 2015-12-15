<section class="content-header">
    <h1>Setting profile</h1>
    <?=create_breadcrumb()?>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-4">
            <?=form_open() ?>
            <div class="form-group">
                <?= form_label('Name', 'nama') ?>
                <?= form_input(array('name' => 'nama', 'class' => 'form-control', 'value' => $session->nama, 'readonly' => '')) ?>
            </div>
            <div class="form-group">
                <?= form_label('Email', 'email') ?>
                <?= form_input(array('name' => 'email', 'class' => 'form-control', 'value' => $session->email)) ?>
            </div>
            <div class="form-group">
                <?= form_label('Username', 'username') ?>
                <?= form_input(array('name' => 'username', 'class' => 'form-control', 'value' => $session->username, 'readonly' => '')) ?>
            </div>
            <div class="form-group">
                <?= form_label('Password', 'password') ?>
                <?= form_password(array('name' => 'password', 'class' => 'form-control', 'value' => $this->encryption->decode($session->password))) ?>
            </div>
            <div class="box-footer">
                <?= form_submit(array('value' => 'Save Data', 'class' => 'btn btn-primary')) ?>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</section>