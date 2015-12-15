<section class="content-header">
    <h1>Groups Examinations</h1>
    
</section>
<section class="content">
    <div class="row">
        
        <div class="col-xs-8">
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelompok Ujian</th>
                            <th>Status</th>
                            
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
                            
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</section>