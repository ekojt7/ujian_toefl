<section class="content-header">
    <h1>Examinees Detail</h1>
    
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                        <td>Examinees Number</td>
                        <td><?=$detail->kd_anggota?></td>
                        <td rowspan="9" align="center"><?=img(array('src' => 'upload/'.$detail->foto, 'width' => '250', 'height' => '220'))?></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><?=$detail->nama?></td>
                    </tr>
                    <tr>
                        <td>NIM</td>
                        <td><?=$detail->nim?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?=$detail->email?></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td><?=$detail->telp?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><?=$detail->alamat?></td>
                    </tr>
                    <tr>
                        <?php
                        if ($detail->jekel == 'l') {
                            $jekel = 'Man';
                        } else {
                            $jekel = 'Women';
                        }
                        ?>
                        <td>Sex</td>
                        <td><?=$jekel?></td>
                    </tr>
                    <tr>
                        <td>Date Of Birth</td>
                        <td><?=date('d F Y', strtotime($detail->tgl_lahir))?></td>
                    </tr>
                    <tr>
                        <td>Registered</td>
                        <td><?=date('d F Y', strtotime($detail->terdaftar))?></td>
                    </tr>
                </table>
                <div class="box-footer">
                    <a href="javascript:history.back(-1);" class="btn btn-danger">Back</a>
                    <?php
                    echo "<a href='http://localhost/toefl_ltc/admin/cetak_kartu_ujian/$detail->ID_peserta' class='btn btn-primary'>Print Exam. Card</a>";
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</section>