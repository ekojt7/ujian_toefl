<section class="content-header">
    <h1>Examinees Edit</h1>
    
</section>
<section class="content">
    <div class="row">
         <?php echo validation_errors(); ?>
        <div class="col-xs-12">
            <?=form_open_multipart()?>
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
                        <?=form_input(array('name' => 'kd_anggota', 'class' => 'form-control', 'value' => $update->kd_anggota, 'readonly' => ''))?>
                    </div>
                    <div class="col-xs-6">
                        <?=form_label('Name', 'nama')?>
                        <?=form_input(array('name' => 'nama', 'class' => 'form-control', 'value' => $update->nama))?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                     <div class="col-xs-6">
                        <?=form_label('NIM', 'nim')?>
                        <?=form_input(array('name' => 'nim', 'class' => 'form-control', 'value' => $update->nim))?>
                    </div>
                    <div class="col-xs-6">
                        <?=form_label('Date Of Birth', 'tgl_lahir')?>
                        <?=form_input(array('name' => 'tgl_lahir', 'id' => 'tgl_lahir', 'class' => 'form-control', 'value' => $update->tgl_lahir))?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <?=form_label('Sex', 'jekel')?>
                <div class="radio">
                    <label>
                        <input type="radio" value="l" name="jekel" <?php if ($update->jekel == 'l') echo 'checked';?> /> Man
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" value="p" name="jekel" <?php if ($update->jekel == 'p') echo 'checked';?> /> Women
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6">
                        <?=form_label('Email', 'email')?>
                        <?=form_input(array('name' => 'email', 'class' => 'form-control', 'value' => $update->email, 'readonly' => ''))?>
                    </div>
                    <div class="col-xs-6">
                        <?=form_label('Phone', 'telp')?>
                        <?=form_input(array('name' => 'telp', 'class' => 'form-control', 'value' => $update->telp))?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <?=form_label('Address', 'alamat')?>
                <?=form_textarea(array('name' => 'alamat', 'class' => 'form-control', 'cols' => '5', 'rows' => '3', 'value' => $update->alamat))?>
            </div>
            <div class="form-group">
                <?=form_label('Status', 'status')?>
                <div class="radio">
                    <label>
                        <input type="radio" value="1" name="status" /> Aktif
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" value="0" name="status" /> Pending
                    </label>
                </div>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Group', 'ID_klp_ujian');
                $options = array();
                foreach ($klp_ujian as $data) {
                    $options['-'] = 'Choice the group';
                    $options[$this->encryption->encode($data->ID_klp_ujian)] = $data->nm_kelompok;
                }
                $selected = array($this->encryption->encode($update->ID_klp_ujian));
                $class = 'class="form-control" style="width:400px"';
                echo form_dropdown('ID_klp_ujian', $options, $selected, $class);
                ?>
            </div>
            <div class="box-footer">
                <?=form_submit(array('value' => 'Save Data', 'class' => 'btn btn-primary'))?>
                <?=anchor('admin/master/peserta', 'Cancel', array('class' => 'btn btn-danger'))?>
            </div>
            <?=form_close()?>
        </div>
    </div>
</section>