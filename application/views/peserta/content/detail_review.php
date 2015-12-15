<section class="content-header">
    <h1>Detail Review</h1>
    <?=create_breadcrumb()?>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <?=form_open()?>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                        <td colspan="2"><?=$detail->pertanyaan?></td>
                    </tr>
                    <tr>
                        <th colspan="2">Jawaban</th>
                    </tr>
                    <tr>
                        <td width="10"><input type="radio" name="jawaban" value="a" <?php if ($detail->jawaban == 'a') echo 'checked';?> /></td>
                        <td><?=$detail->pil_a?></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="jawaban" value="b" <?php if ($detail->jawaban == 'b') echo 'checked';?> /></td>
                        <td><?=$detail->pil_b?></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="jawaban" value="c" <?php if ($detail->jawaban == 'c') echo 'checked';?> /></td>
                        <td><?=$detail->pil_c?></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="jawaban" value="d" <?php if ($detail->jawaban == 'd') echo 'checked';?> /></td>
                        <td><?=$detail->pil_d?></td>
                    </tr>
                   
                </table>
                <div class="box-footer">
                    <?=form_submit(array('value' => 'Update Answer', 'class' => 'btn btn-primary'))?>
                    <?=anchor('peserta/review', 'Back', array('class' => 'btn btn-danger'))?>
                </div>
            </div>
            <?=form_close()?>
        </div>
    </div>
</section>