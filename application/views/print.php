<html>
<head>
    <title>Cetak PDF</title>
</head>
<body>
<h1 style="text-align: center;">Data Siswa</h1>
<?php echo "Tanggal : ".date('d-m-Y'); ?><br><br>
<table border="1" width="100%">
<tr>
    <th>No</th>
    <th>NIS</th>
    <th>Nama</th>
    <th>Jenis Kelamin</th>
    <th>Telepon</th>
    <th>Alamat</th>
</tr>
<?php
if( ! empty($siswa)){
    $no = 1;
    foreach($siswa as $data){
        echo "<tr>";
        echo "<td>".$no."</td>";
        echo "<td>".$data->kd_anggota."</td>";
        echo "<td>".$data->section1."</td>";
        echo "<td>".$data->section2."</td>";
        echo "<td>".$data->section3."</td>";
        echo "<td>".$data->total_skor."</td>";
        echo "</tr>";
        $no++;
    }
}
?>
</table>
</body>
</html>