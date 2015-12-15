
<section class="content-header">
    <h1>Input Questions</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<section class="content">
     <?php echo validation_errors(); ?>
    <div class="row">
        <div class="col-xs-12">
            <?=form_open_multipart()?>
            <?=form_hidden('ID_klp_ujian', $this->uri->segment(4))?>
            <div class="form-group">
                <?=form_label('Category', 'kategori')?> <br>
                <?=form_radio(array('name' => 'kategori', 'value' => '1', 'class' => 'form-control','id' => 'listening'))?> Section 1
                <?=form_radio(array('name' => 'kategori', 'value' => '2', 'class' => 'form-control','id' => 'grammar'))?> Section 2
                <?=form_radio(array('name' => 'kategori', 'value' => '3', 'class' => 'form-control','id' => 'reading'))?> Section 3
            </div>
            <div class="audio">
            <div class="form-group">
                <?=form_label('Input Audio', 'audio')?>
                <?=form_upload(array('name' => 'audio', 'class' => 'form-control', 'value' => $this->upload->file_name))?>
            </div>
            </div>
            <?=form_textarea(array('name' => 'pertanyaan', 'rows' => '20', 'class' => 'ckeditor','cols'=>'80'))?>
            <br/>
            <div class="form-group">
                <?=form_label('Option A', 'pil_a')?>
                <?=form_textarea(array('name' => 'pil_a', 'rows' => '2', 'class' => 'form-control'))?>
            </div>
            <div class="form-group">
                <?=form_label('Option B', 'pil_b')?>
                <?=form_textarea(array('name' => 'pil_b', 'rows' => '2', 'class' => 'form-control'))?>
            </div>
            <div class="form-group">
                <?=form_label('Option C', 'pil_c')?>
                <?=form_textarea(array('name' => 'pil_c', 'rows' => '2', 'class' => 'form-control'))?>
            </div>
            <div class="form-group">
                <?=form_label('Option D', 'pil_d')?>
                <?=form_textarea(array('name' => 'pil_d', 'rows' => '2', 'class' => 'form-control'))?>
            </div>
           
            <div class="form-group">
                <?=form_label('Answer Key', 'jawaban')?>
                <div class="radio">
                    <?=form_label(form_radio('jawaban', 'a').' <strong>A</strong>')?>&nbsp;&nbsp;&nbsp;
                    <?=form_label(form_radio('jawaban', 'b').' <strong>B</strong>')?>&nbsp;&nbsp;&nbsp;
                    <?=form_label(form_radio('jawaban', 'c').' <strong>C</strong>')?>&nbsp;&nbsp;&nbsp;
                    <?=form_label(form_radio('jawaban', 'd').' <strong>D</strong>')?>
                    
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