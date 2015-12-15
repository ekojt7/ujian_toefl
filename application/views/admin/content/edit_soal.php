<section class="content-header">
    <h1>Questions Edit</h1>
   
</section>
<section class="content">
    <div class="row">
         <?php echo validation_errors(); ?>
        <div class="col-xs-12">
            <?=form_open_multipart()?>
            <?=form_hidden('ID_klp_ujian',$this->encryption->encode($update->ID_klp_ujian))?>

            <div class="form-group">
                <?=form_label('Category', 'kategori')?> <br>
                <?php
                    if ($update->kategori == '1') {
                    echo "<input type='radio' name='kategori' value='1' class='form-control' checked='checked' /> Section 1 ";
                    echo "<input type='radio' name='kategori' value='2' class='form-control'  /> Section 2";
                    echo "<input type='radio' name='kategori' value='3' class='form-control'  /> Section 3";
                }  
                else if ($update->kategori == '2'){
                    echo "<input type='radio' name='kategori' value='1' class='form-control' /> Section 1 ";
                    echo "<input type='radio' name='kategori' value='2' class='form-control' checked='checked' /> Section 2";
                    echo "<input type='radio' name='kategori' value='3' class='form-control'  /> Section 3";
                }
                else {
                    echo "<input type='radio' name='kategori' value='1' class='form-control' /> Section 1 ";
                    echo "<input type='radio' name='kategori' value='2' class='form-control' /> Section 2";
                    echo "<input type='radio' name='kategori' value='3' class='form-control' checked='checked' /> Section 3";
                }
                ?>
            </div>
            <div class="audio">
            <div class="form-group">
                <?=form_label('Input Audio', 'audio')?>
                <?=form_upload(array('name' => 'audio', 'class' => 'form-control', 'value' => $update->audio))?>
            </div>
            </div>
            <?=form_textarea(array('name' => 'pertanyaan','rows' => '20', 'class' => 'ckeditor','cols'=>'80', 'value' => $update->pertanyaan))?>
            <br/>
            <div class="form-group">
                <?=form_label('Option A', 'pil_a')?>
                <?=form_textarea(array('name' => 'pil_a', 'rows' => '2', 'class' => 'form-control', 'value' => $update->pil_a))?>
            </div>
            <div class="form-group">
                <?=form_label('Option B', 'pil_b')?>
                <?=form_textarea(array('name' => 'pil_b', 'rows' => '2', 'class' => 'form-control', 'value' => $update->pil_b))?>
            </div>
            <div class="form-group">
                <?=form_label('Option C', 'pil_c')?>
                <?=form_textarea(array('name' => 'pil_c', 'rows' => '2', 'class' => 'form-control', 'value' => $update->pil_c))?>
            </div>
            <div class="form-group">
                <?=form_label('Option D', 'pil_d')?>
                <?=form_textarea(array('name' => 'pil_d', 'rows' => '2', 'class' => 'form-control', 'value' => $update->pil_d))?>
            </div>
            <div class="form-group">
                <?=form_label('Answer Key', 'jawaban')?>
                <div class="radio">
                    <label>
                        <input name="jawaban" type="radio" value="a" <?php if ($update->jawaban == 'a') echo 'checked';?> /> <strong>A</strong>
                    </label>&nbsp;&nbsp;&nbsp;
                    <label>
                        <input name="jawaban" type="radio" value="b" <?php if ($update->jawaban == 'b') echo 'checked';?> /> <strong>B</strong>
                    </label>&nbsp;&nbsp;&nbsp;
                    <label>
                        <input name="jawaban" type="radio" value="c" <?php if ($update->jawaban == 'c') echo 'checked';?> /> <strong>C</strong>
                    </label>&nbsp;&nbsp;&nbsp;
                    <label>
                        <input name="jawaban" type="radio" value="d" <?php if ($update->jawaban == 'd') echo 'checked';?> /> <strong>D</strong>
                    </label>&nbsp;&nbsp;&nbsp;
                </div>
            </div>
            <div class="box-footer">
                <?=form_submit(array('value' => 'Save', 'class' => 'btn btn-primary'))?>
                <?=anchor('admin/master/soal', 'Cancel', array('class' => 'btn btn-danger'))?>
            </div>
            <?=form_close()?>
        </div>
    </div>
</section>