<section class="content-header">
    <h1>Answer Review</h1>
    <?=create_breadcrumb()?>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <h3>Time Left : <span id="timer">00 : 00 : 00</span></h3>
            <div class="box-body table-responsive">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Questions</th>
                            <th>Answer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($query_soal as $data) {
                            echo '<tr>';
                            echo '<td width="10" align="center">'.$no++.'</td>';
                            echo '<td>'.anchor('peserta/review/detail/'.$this->encryption->encode($data->ID_jawaban), $data->pertanyaan).'</td>';
                            echo '<td width="20" align="center">'.strtoupper($data->jawaban).'</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
                <div class="box-footer">
                    <?=form_open()?>
                    <?=form_hidden('kd_anggota', $this->encryption->encode($session->username))?>
                    <?=form_submit(array('class' => 'btn btn-primary', 'value' => 'Save All Answers'))?>
                    <?=form_close()?>
                </div>
            </div>
        </div>
    </div>
</section>