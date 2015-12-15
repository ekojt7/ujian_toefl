<section class="content-header">
    <h1>Setting <?=str_replace('-', ' ', $this->uri->segment(3))?></h1>
    <?=create_breadcrumb()?>
</section>
<section class="content">
    <div class="row">
        <?php
        $uri3 = $this->uri->segment(3);
        if ($uri3 == 'kelompok-ujian') {
            $this->load->view('admin/content/add_kelompok_ujian');
        } else {
            $this->load->view('admin/content/edit_kelompok_ujian');
        }
        ?>
        <div class="col-xs-8">
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelompok Ujian</th>
                            <th>Peserta</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($query as $data) {
                            echo '<tr>';
                            echo '<td align="center" width="10">'.$no++.'</td>';
                            echo '<td>'.$data->nm_kelompok.'</td>';
                            echo '<td>Jumlah Peserta</td>';
                            echo '<td align="center">'
                            .anchor('admin/setting/edit-kelompok-ujian/'.$this->encryption->encode($data->ID_klp_ujian), '<i class="fa fa-edit"></i>', array('title' => 'Edit')).' '
                            .anchor('delete/klp_ujian/'.$this->encryption->encode($data->ID_klp_ujian), '<i class="fa fa-trash-o"></i>', array('title' => 'Delete')).
                            '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</section>