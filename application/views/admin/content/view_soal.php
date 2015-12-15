 <section class="content-header">
    <h1>Detail Questions</h1>
    
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped">
                    <?php
                    if ($detail->kategori== '1') {
                        $kategori = "Section 1";
                    }
                    else if ($detail->kategori== '2') {
                        $kategori = "Section 2";
                    }
                    else {
                        $kategori = "Section 3";
                    }
                    ?>
                    <tr>
                        <th colspan="2">Category : <?=$kategori?></th>
                    </tr>
                    <tr>
                        <td colspan="2"><?=$detail->pertanyaan?></td>
                    </tr>
                    <?php
                    if(!empty($detail->audio)){
                    echo "<tr>
                            <th colspan='2'>
                                <audio controls>
                                     <source src='http://localhost/toefl_ltc/upload/$detail->audio' type='audio/mpeg'>
                                </audio>
                            </th>
                        </tr>";
                            }
                    ?>
                                
                    <tr>
                        <th colspan="2">Answer</th>
                    </tr>
                    <tr>
                        <td width="50"><strong>A</strong> <?php if ($detail->jawaban == 'a') echo '<i class="fa fa-check"></i>';?></td>
                        <td><?=$detail->pil_a?></td>
                    </tr>
                    <tr>
                        <td><strong>B</strong> <?php if ($detail->jawaban == 'b') echo '<i class="fa fa-check"></i>';?></td>
                        <td><?=$detail->pil_b?></td>
                    </tr>
                    <tr>
                        <td><strong>C</strong> <?php if ($detail->jawaban == 'c') echo '<i class="fa fa-check"></i>';?></td>
                        <td><?=$detail->pil_c?></td>
                    </tr>
                    <tr>
                        <td><strong>D</strong> <?php if ($detail->jawaban == 'd') echo '<i class="fa fa-check"></i>';?></td>
                        <td><?=$detail->pil_d?></td>
                    </tr>
                </table>
                <div class="box-footer">
                    <?=anchor('admin/master/soal', 'Back', array('class' => 'btn btn-danger'))?>
                </div>
            </div>
        </div>
    </div>
</section>