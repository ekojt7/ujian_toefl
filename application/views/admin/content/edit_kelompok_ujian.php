<div class="col-xs-4">
    <?=form_open()?>
    <div class="form-group">
        <?=form_label('Group Name', 'nm_kelompok')?>
        <?=form_input(array('name' => 'nm_kelompok', 'class' => 'form-control', 'value' => $update->nm_kelompok, 'autofocus' => ''))?>
    </div>
    <div class="form-group">
        <?=form_label('Group Status', 'status')?> <br>
        <?php
       if ($update->status == 'active') {
            echo "<input type='radio' name='status' value='active' class='form-control' checked='checked'  /> Active  ";
            echo "<input type='radio' name='status' value='nonactive' class='form-control' /> Nonactive";

        }  
        else {
             echo "<input type='radio' name='status' value='active' class='form-control'   /> Active  ";
             echo "<input type='radio' name='status' value='nonactive' class='form-control' checked='checked' /> Nonactive";
        }
        
     ?>


     </div>
    
    <div class="box-footer">
        <?=form_submit(array('value' => 'Save', 'class' => 'btn btn-primary'))?>
    </div>
    <?=form_close()?>
</div>