<html>
<head>
    <title>Cetak PDF</title>
    <style>
          table{
      margin-top: 10px;
    margin-bottom: 50px;
    margin-right: 50px;
    margin-left:250px;
     
      }

          </style>   
</head>
<body>
<h1 style="text-align: center;">Language Training Center (LTC)</h1>
<h2 style="text-align: center;">Universitas Semarang</h2>
<hr>
<h2 style="text-align: center;">TOEFL Examination Card</h2>

<
<p>
<table border="0" cellpadding="0" cellspacing="0">
 
                        <tr>
                            <td style="width: 100px;">Exam. No.</td>
                            <td style="width: 40px;>:</td>
                            <td style="padding-left: 10px;"><?php echo $detail->kd_anggota; ?></td>   
                        </tr>
                         <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td style="padding-left: 10px;"><?=$detail->nama?></td>
                    </tr>
                    <tr>
                        <td>NIM</td>
                        <td>:</td>
                        <td style="padding-left: 10px;"><?=$detail->nim?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td style="padding-left: 10px;"><?=$detail->email?></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td style="padding-left: 10px;"><?=$detail->telp?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>:</td>
                        <td style="padding-left: 10px;"><?=$detail->alamat?></td>
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
                        <td>:</td>
                        <td style="padding-left: 10px;"><?=$jekel?></td>
                    </tr>
                    <tr>
                        <td>Date Of Birth</td>
                        <td>:</td>
                        <td style="padding-left: 10px;"><?=date('d F Y', strtotime($detail->tgl_lahir))?></td>
                    </tr>
                    <tr>
                        <td>Registered</td>
                        <td>:</td>
                        <td style="padding-left: 10px;"><?=date('d F Y', strtotime($detail->terdaftar))?></td>
                    </tr>
                        
</table>
</p>
<hr>
</body>
</html>
                    
                    

                
</body>
</html>               
          