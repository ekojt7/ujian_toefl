<section class="content-header">
    <?php
    $uri4 = $this->encryption->decode($this->uri->segment(4));
    echo '<h1>';
    echo 'Examinees';
     if ($uri4) {
        echo '<small>';
        echo anchor('admin/master/input-peserta/'.$this->encryption->encode($uri4), 'Add New', array('class' => 'btn btn-default btn-sm'));
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
                echo anchor('admin/master/peserta/'.$this->encryption->encode($data->ID_klp_ujian), $data->nm_kelompok, array('class' => 'btn '.$selected));
                echo '</div>';
            }
            ?>
        </div>
        <?php if ($this->uri->segment(4)) { ?>
        <div class="col-xs-10">
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Exam. No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Sex</th>
                            <th>Status</th>
                            <th>Registered</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($query as $data) {

                            if ($data->jekel == 'l') {
                                $jekel = 'Man';
                            } else {
                                $jekel = 'Women';
                            }
                            
                            $this->db->where('username', $data->kd_anggota);
                            $status = $this->db->get('tb_users')->row();
                            
                            if ($status->status_user == 1) {
                                $get_status = '<small class="label label-success">Aktif</small>';
                            } else {
                                $get_status = '<small class="label label-warning">Finish</small>';
                            }
                            
                            echo '<tr>';
                            echo '<td width="4" align="center">'.$no++.'</td>';
                            echo '<td>'.anchor('admin/view/anggota/'.$this->encryption->encode($data->ID_peserta), $data->kd_anggota).'</td>';
                            echo '<td>'.$data->nama.'</td>';
                            $hps=$data->ID_peserta;
                            echo '<td>'.$data->email.'</td>';
                            echo '<td>'.$data->telp.'</td>';
                            echo '<td>'.$jekel.'</td>';
                            echo '<td>'.$get_status.'</td>';
                            echo '<td>'.date('d M Y', strtotime($data->terdaftar)).'</td>';
                            echo '<td align="center">';
                            echo anchor('admin/master/edit-peserta/'.$this->encryption->encode($data->ID_peserta), '<i class="fa fa-edit"></i>', array('title' => 'Edit')).' '
                            .anchor('delete/peserta/'.$this->encryption->encode($data->ID_peserta), '<i class="fa fa-trash-o"></i>', array('title' => 'Delete')).'</td>';
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