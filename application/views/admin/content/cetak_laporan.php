<html>
<head>
    <title>Cetak PDF</title>
    <style>
          
          
          table, td, th {
      margin:0 auto;
      border:1px;
      }
          th {
      padding:2px;
      text-align:center;
      background-color: #0099CC; 
      }
          td {  
          padding:2px;  
      text-align:center;
      }
          </style>          
</head>
<body>
<h1 style="text-align: center;">Language Training Center (LTC)</h1>
<h2 style="text-align: center;">Universitas Semarang</h2>
<hr>
<h2 style="text-align: center;">TOEFL SCORE REPORT</h2>
<?php echo "Date : ".date('d-m-Y'); ?><br><br>
<p align="center">
<table border="1" width="100%" cellpadding="0" cellspacing="0">
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
</p>
</body>
</html>