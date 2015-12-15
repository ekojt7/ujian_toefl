<section class="content-header">
    <h1>TOEFL Examination Report</h1>
   
</section>
<section class="content">
    
        
        <div class="col-xs-10">
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Exam. No.</th>
                            <th>Name</th>
                            <th>NIM</th>
                            <th>Section 1</th>
                            <th>Section 2</th>
                            <th>Section 3</th>
                            <th>Total Score</th>
                            <th>Result</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                       if( ! empty($ujian)){
                             $no = 1;
                            foreach($ujian as $data){
                            echo "<tr>";
                            echo "<td>".$no."</td>";
                            echo "<td>".$data->username."</td>";
                            echo "<td>".$data->nama."</td>";
                            echo "<td>".$data->nim."</td>";
                            echo "<td>".$data->section1."</td>";
                            echo "<td>".$data->section2."</td>";
                            echo "<td>".$data->section3."</td>";
                            echo "<td>".$data->total_skor."</td>";
                            echo "<td>".$data->keterangan."</td>";
                            echo "</tr>";
                            $no++;
                        }
}
                        ?>
                    </tbody>
                   
                </table>
                 <div class="box-footer">
                    <?=anchor('admin/transaksi/cetak', 'PRINT', array('class' => 'btn btn-primary'))?>
                </div>
            </div>
        </div>
       
    </div>
</section>