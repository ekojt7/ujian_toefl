<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?=$title?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?=site_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=site_url('assets/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=site_url('assets/css/ionicons.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=site_url('assets/css/AdminLTE.css')?>" rel="stylesheet" type="text/css" />
        <script src="<?=site_url('assets/editor/ckeditor.js')?>" type="text/javascript"></script>

        <?php
        $uri3 = $this->uri->segment(3);
        if ($uri3 == 'peserta' || $uri3 == 'soal' || $uri3 == 'user' || $uri3 == 'edit-user' || $uri3 == 'ujian' || $uri3 == 'kelompok-ujian') {
            echo '<link href="'.site_url('assets/css/datatables/dataTables.bootstrap.css').'" rel="stylesheet" type="text/css" />';
        } elseif ($uri3 == 'input-peserta' || $uri3 == 'edit-peserta') {
            echo '<link href="'.site_url('assets/css/datepicker/datepicker3.css').'" rel="stylesheet" type="text/css" />';
        }
        ?>
		<link href="<?=site_url('assets/css/redactor/redactor.css')?>" rel="stylesheet" type="text/css" />
        
        <!--[if lt IE 9]>
          <script src="<?=site_url('assets/js/html5shiv.js')?>"></script>
          <script src="<?=site_url('assets/js/respond.min.js')?>"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">