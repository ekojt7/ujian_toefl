<div class="col-xs-4">
    <?=form_open()?>
    <div class="form-group">
        <?=form_label('Group Name', 'nm_kelompok')?>
        <?=form_input(array('name' => 'nm_kelompok', 'class' => 'form-control', 'value' => set_value('nm_kelompok'), 'autofocus' => ''))?>
    </div>
    <div class="form-group">
        <?=form_label('Group Status', 'status')?> <br>
         <?=form_radio(array('name' => 'status', 'value' => 'active', 'class' => 'form-control'))?> Active
         <?=form_radio(array('name' => 'status', 'value' => 'nonactive', 'class' => 'form-control'))?> Nonactive
    </div>
    <div class="box-footer">
        <?=form_submit(array('value' => 'Save', 'class' => 'btn btn-primary'))?>
    </div>
    <?=form_close()?>
</div>