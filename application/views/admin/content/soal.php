<section class="content-header">
    <?php
    $uri4 = $this->encryption->decode($this->uri->segment(4));
    echo '<h1>';
    echo 'Questions';
    if ($uri4) {
        echo '<small>';
        echo anchor('admin/master/input-soal/'.$this->encryption->encode($uri4), 'Add New', array('class' => 'btn btn-default btn-sm'));
        echo '</small>';
    }
    echo '</h1>';
    ?>
    
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-2">
            <?php
            foreach ($klp_ujian as $data) {
                if ($data->ID_klp_ujian == $uri4) {
                    $selected = 'btn-primary';
                } else {
                    $selected = 'btn-default';
                }
                
                echo '<div class="form-group">';
                echo anchor('admin/master/soal/'.$this->encryption->encode($data->ID_klp_ujian), $data->nm_kelompok, array('class' => 'btn '.$selected));
                echo '</div>';
            }
            ?>
        </div>
        <?php if ($uri4) { ?>
        <div class="col-xs-10">
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Questions</th>
                            <th>Section</th>
                            <th>Key</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($query as $data) {
                            echo '<tr>';
                            echo '<td width="3" align="center">'.$no++.'</td>';
                            echo '<td>'.anchor('admin/view/soal/'.$this->encryption->encode($data->ID_soal), strip_tags(word_limiter($data->pertanyaan, 20))).'</td>';
                            echo '<td align="center" width="10">'.$data->kategori.'</td>';
                            echo '<td align="center" width="10">'.$data->jawaban.'</td>';
                            echo '<td align="center" width="10">'
                            .anchor('admin/master/edit-soal/'.$this->encryption->encode($data->ID_soal), '<i class="fa fa-edit"></i>', array('title' => 'Edit')).' '
                            .anchor('delete/soal/'.$this->encryption->encode($data->ID_soal), '<i class="fa fa-trash-o"></i>', array('title' => 'Delete')).'</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                    
                </table>
            </div>
        </div>
        <?php } ?>
    </div>
</section>