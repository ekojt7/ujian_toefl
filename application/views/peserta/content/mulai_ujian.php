<?php
    if ($cekstatus->status == 'nonactive') {
     echo "<section class='content'>";
     echo "<div class='row'>";
     echo "<div class='col-xs-12'>";
        echo "<h2>Groups Examinations Non Active</h2>";
     echo "</div>";
     echo "</div>";
     echo "</section>";
 }
 else {
?>
 
<section class="content-header">
   <h1>TOEFL Examination</h1>
</section>
<section class="content">
    <div class="row">
    
             <div class="col-xs-12">
           
            <h3>Time Left : <span id="timer">00 : 00 : 00</span></h3>
             
            <div id="allLayout2" style="font-size:20px"></div>
            <h3>Total Questions : <?=$jumlah_soal->num_rows()?></h3>
            <h4>You Have Answered : <?=$jawaban_peserta->num_rows().' / '.$jumlah_soal->num_rows()?> questions</h4>
            <?php
            if ($jumlah_soal->num_rows() == $jawaban_peserta->num_rows()) {
                redirect('peserta/review');
            } else {
                echo form_open();
                echo form_hidden('ID_klp_ujian', $this->encryption->encode($ID_klp_ujian));?>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    
                                    <th colspan="3">Section : <?= $soal->kategori; ?></th>
                                    
                                </tr>
                                <tr>
                                    <?php
                                    $find = array('&lt;', '&gt;');
                                    $replace = array('<', '>');
                                    ?>
                                    <td colspan="3"><?=str_replace($find, $replace, $soal->pertanyaan)?></td>
                                </tr>
                                <?php
                                if(!empty($soal->audio)){
                                    echo "
                                        <audio controls autoplay hidden='hidden'>
                                        <source src='../upload/$soal->audio?>' type='audio/mpeg'>
                                       
                                        </audio>
                                        ";
                                 }
                                ?>
                            
                                
                                <tr>
                                    <td width="10"><?=form_radio('jawaban', 'a')?></td>
                                    <td width="10">A</td>
                                    <td><?=$soal->pil_a?></td>
                                </tr>
                                <tr>
                                    <td><?=form_radio('jawaban', 'b')?></td>
                                    <td>B</td>
                                    <td><?=$soal->pil_b?></td>
                                </tr>
                                <tr>
                                    <td><?=form_radio('jawaban', 'c')?></td>
                                    <td>C</td>
                                    <td><?=$soal->pil_c?></td>
                                </tr>
                                <tr>
                                    <td><?=form_radio('jawaban', 'd')?></td>
                                    <td>D</td>
                                    <td><?=$soal->pil_d?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="box-footer">
                            <?=form_hidden('ID_soal', $this->encryption->encode($soal->ID_soal))?>
                            <?=form_hidden('kd_anggota', $this->encryption->encode($session->username))?>
                            <?=form_submit(array('value' => 'Submit', 'class' => 'btn btn-primary'))?>
                        </div>
                    </div><?php
                echo form_close();
            }
            ?>
        </div>
       
    </div>
</section>
<?php } ?>