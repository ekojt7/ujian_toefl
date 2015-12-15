<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?=$title?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <?=link_tag('assets/css/bootstrap.min.css')?>
        <?=link_tag('assets/css/font-awesome.min.css')?>
        <?=link_tag('assets/css/ionicons.min.css')?>
        <?=link_tag('assets/css/AdminLTE.css')?>
        
        <?php
        $uri2 = $this->uri->segment(2);
        if ($uri2 == 'review' || $uri2 == 'ujian') {
            echo link_tag('assets/css/datatables/dataTables.bootstrap.css');
            echo '<script type="text/javascript" src="'.site_url('assets/js/countdown/jquery-1.5.1.min.js').'"></script>';
            echo '<script type="text/javascript" src="'.site_url('assets/js/countdown/jquery.countdown.min.js').'"></script>';
            
            @session_start();
            if (isset($_SESSION['mulai_ujian'])) {
                $telah_berlalu = time() - $_SESSION['mulai_ujian'];
            } else {
                $_SESSION['mulai_ujian'] = time();
                $telah_berlalu = 0;
            } ?>
        
            <script type="text/javascript">
                var $jnoc = jQuery.noConflict();
                function waktuHabis(){
                    location.href="<?=site_url('peserta/finish')?>";
                }

                function hampirHabis(periods) {
                    if($jnoc.countdown.periodsToSeconds(periods) == 60) {   
                        $jnoc(this).css({color:"red"});
                    }
                }   

                $jnoc(function() {
                    var sisa_waktu = 7200 - <?=$telah_berlalu?>;
                    var longWayOff = sisa_waktu;
                    $jnoc("#timer").countdown({
                        until: longWayOff,
                        compact:true,
                        onExpiry:waktuHabis,
                        onTick: hampirHabis
                    });	
                })
            </script><?php
        }
        ?>
        <!--[if lt IE 9]>
          <script src="<?=site_url('assets/js/html5shiv.js')?>"></script>
          <script src="<?=site_url('assets/js/respond.min.js')?>"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">