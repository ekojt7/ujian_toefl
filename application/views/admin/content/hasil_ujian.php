<?php

$s = '<h1 align="center" style="font-family:calibri">Hasil Ujian '.$detail_klp->nm_kelompok.'</h1>';
$s .= '<hr/>';
$s .= '<table border="1" width="100%">';
$s .= '<tr>';
$s .= '<th>No</th>';
$s .= '<th>Kode</th>';
$s .= '<th>Nama</th>';
$s .= '<th>Benar</th>';
$s .= '<th>Salah</th>';
$s .= '<th>Soal Selesai</th>';
$s .= '<th>Point</th>';
$s .= '</tr>';
$no = 1;
foreach ($query as $data) {
    $sql = "SELECT COUNT(*) AS benar FROM tb_soal WHERE ID_soal"
            . " IN (SELECT ID_soal FROM tb_jawaban WHERE"
            . " kd_anggota = '" . $data->kd_anggota . "'"
            . " AND jawaban = tb_soal.jawaban)";

    $jawaban = $this->db->query($sql)->row();

    $salah = $jumlah_soal->num_rows() - $jawaban->benar;

    $this->db->where('kd_anggota', $data->kd_anggota);
    $jawaban_peserta = $this->db->get('tb_jawaban');

    $this->db->where('kd_anggota', $data->kd_anggota);
    $anggota = $this->db->get('tb_peserta')->row();

    if (!empty($jawaban->benar)) {
        $point = $jawaban->benar * $point->point_soal;
    } else {
        $point = 0;
    }

    $this->db->where('username', $data->kd_anggota);
    $status_ujian = $this->db->get('tb_users')->row();

    if ($status_ujian->status_ujian == 'ujian') {
        $status = '<small class="label label-warning">Sedang Ujian</small>';
    } elseif ($status_ujian->status_ujian == 'selesai') {
        $status = '<small class="label label-success">Selesai Dikerjakan</small>';
    } else {
        $status = '<small class="label label-danger">Belum Ujian</small>';
    }

    $s .= '<tr>';
    $s .= '<td width="10" align="center">' . $no++ . '</td>';
    $s .= '<td width="10" align="center">' . $data->kd_anggota . '</td>';
    $s .= '<td width="10" align="center">' . $anggota->nama . '</td>';
    $s .= '<td width="10" align="center">' . $jawaban->benar . '</td>';
    $s .= '<td width="10" align="center">' . $salah . '</td>';
    $s .= '<td width="10" align="center">' . $jawaban_peserta->num_rows() . ' / ' . $jumlah_soal->num_rows() . ' soal</td>';
    $s .= '<td width="10" align="center">' . $point . '</td>';
    $s .= '</tr>';
}
$s .= '</table>';
$mpdf = new mPDF('c', 'A4', '', '', 10, 10, 10, 10, 16, 13);
$mpdf->SetDisplayMode('fullpage');
$mpdf->list_indent_first_level = 0;
$mpdf->WriteHTML($s, 2);
$mpdf->output($filename, 'I');
