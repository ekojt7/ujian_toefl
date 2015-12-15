<!DOCTYPE html>
<html>
      <head>
        <meta charset="UTF-8">
        <title>Tampil Skor</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <?=link_tag('assets/css/bootstrap.min.css')?>
        <?=link_tag('assets/css/font-awesome.min.css')?>
        <?=link_tag('assets/css/ionicons.min.css')?>
        <?=link_tag('assets/css/AdminLTE.css')?>
        
       
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                LTC TOEFL
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                       
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>Sign Out <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                
                                <!-- Menu Body -->
                                
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    
                                    <div class="pull-right">
                                        <?=anchor('login/index', 'Sign out', array('class' => 'btn btn-default btn-flat'))?>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                   
                   
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="index.html">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        
                      
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    
                        <h3 class="box-title"><?= $selesai; ?></h3>
            
                </section>

                <!-- Main content -->
               <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <h3>Section 1</h3>
                     <div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Section</th>
                            <th>Poin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $poinTotal1 = 0;
                        foreach ($poinSection1 as $data1) {
                            if($data1->kuncijawaban == $data1->jawabanpeserta) {
                                $poin1=1;
                            }
                            else {
                                $poin1=0;
                            }
                            $poinTotal1 += $poin1;
                            echo '<tr>';
                            echo '<td align="center" width="10">'.$no++.'</td>';
                            echo '<td>'.$data1->kategori.'</td>';
                            echo '<td>'.$poin1.'</td>';
                            echo '</tr>';

                        }

                        ?>
                    </tbody>
                    
                </table>
                </div>
                </div>
                <div class="col-xs-12">
                    Point Section 1 = <?php echo $poinTotal1; ?>
                </div>

                <div class="col-xs-12">
                     <div class="box-body table-responsive">
                        <h3>Section 2</h3>
<table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Section</th>
                            <th>Poin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $poinTotal2 = 0;
                        foreach ($poinSection2 as $data2) {
                            if($data2->kuncijawaban == $data2->jawabanpeserta) {
                                $poin2=1;
                            }
                            else {
                                $poin2=0;
                            }
                            $poinTotal2 += $poin2;
                            echo '<tr>';
                            echo '<td align="center" width="10">'.$no++.'</td>';
                            echo '<td>'.$data2->kategori.'</td>';
                            echo '<td>'.$poin2.'</td>';
                            echo '</tr>';

                        }

                        ?>
                    </tbody>
                    
                </table>
                </div>
                </div>
                <div class="col-xs-12">
                    Point Section 2 = <?php echo $poinTotal2; ?>
                </div>

                <div class="col-xs-12">
                    <h3>Section 3</h3>
                     <div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Section</th>
                            <th>Poin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $poinTotal3 = 0;
                        foreach ($poinSection3 as $data3) {
                            if($data3->kuncijawaban == $data3->jawabanpeserta) {
                                $poin3=1;
                            }
                            else {
                                $poin3=0;
                            }
                            $poinTotal3 += $poin3;
                            echo '<tr>';
                            echo '<td align="center" width="10">'.$no++.'</td>';
                            echo '<td>'.$data3->kategori.'</td>';
                            echo '<td>'.$poin3.'</td>';
                            echo '</tr>';

                        }

                        ?>
                    </tbody>
                    
                </table>
                </div>
                </div>
                <div class="col-xs-12">
                    Point Section 3 = <?php echo $poinTotal3; ?>
                </div>

                <?php
                if($poinTotal1==50) {
                    $skor1=68;
                }
                elseif($poinTotal1==49) {
                    $skor1=67;
                }
                elseif($poinTotal1==48) {
                    $skor1=66;
                }
                elseif($poinTotal1==47) {
                    $skor1=65;
                }
                elseif($poinTotal1==46) {
                    $skor1=63;
                }
                elseif($poinTotal1==45) {
                    $skor1=62;
                }
                elseif($poinTotal1==44) {
                    $skor1=61;
                }
                elseif($poinTotal1==43) {
                    $skor1=60;
                }
                elseif($poinTotal1==42) {
                    $skor1=59;
                }
                elseif($poinTotal1==41) {
                    $skor1=58;
                }
                elseif($poinTotal1==40) {
                    $skor1=57;
                }
                elseif($poinTotal1==39) {
                    $skor1=57;
                }
                elseif($poinTotal1==38) {
                    $skor1=56;
                }
                elseif($poinTotal1==37) {
                    $skor1=55;
                }
                elseif($poinTotal1==36) {
                    $skor1=54;
                }
                elseif($poinTotal1==35) {
                    $skor1=54;
                }
                elseif($poinTotal1==34) {
                    $skor1=53;
                }
                elseif($poinTotal1==33) {
                    $skor1=52;
                }
                elseif($poinTotal1==32) {
                    $skor1=52;
                }
                elseif($poinTotal1==31) {
                    $skor1=51;
                }
                elseif($poinTotal1==30) {
                    $skor1=51;
                }
                elseif($poinTotal1==29) {
                    $skor1=50;
                }
                elseif($poinTotal1==28) {
                    $skor1=49;
                }
                elseif($poinTotal1==27) {
                    $skor1=49;
                }
                elseif($poinTotal1==26) {
                    $skor1=48;
                }
                elseif($poinTotal1==25) {
                    $skor1=48;
                }
                elseif($poinTotal1==24) {
                    $skor1=47;
                }
                elseif($poinTotal1==23) {
                    $skor1=47;
                }
                elseif($poinTotal1==22) {
                    $skor1=46;
                }
                elseif($poinTotal1==21) {
                    $skor1=45;
                }
                elseif($poinTotal1==20) {
                    $skor1=45;
                }
                elseif($poinTotal1==19) {
                    $skor1=44;
                }
                elseif($poinTotal1==18) {
                    $skor1=43;
                }
                elseif($poinTotal1==17) {
                    $skor1=42;
                }
                elseif($poinTotal1==16) {
                    $skor1=41;
                }
                elseif($poinTotal1==15) {
                    $skor1=41;
                }
                elseif($poinTotal1==14) {
                    $skor1=39;
                }
                elseif($poinTotal1==13) {
                    $skor1=38;
                }
                elseif($poinTotal1==12) {
                    $skor1=37;
                }
                elseif($poinTotal1==11) {
                    $skor1=35;
                }
                elseif($poinTotal1==10) {
                    $skor1=33;
                }
                elseif($poinTotal1==9) {
                    $skor1=32;
                }
                elseif($poinTotal1==8) {
                    $skor1=32;
                }
                elseif($poinTotal1==7) {
                    $skor1=31;
                }
                elseif($poinTotal1==6) {
                    $skor1=30;
                }
                elseif($poinTotal1==5) {
                    $skor1=29;
                }
                elseif($poinTotal1==4) {
                    $skor1=28;
                }
                elseif($poinTotal1==3) {
                    $skor1=27;
                }
                elseif($poinTotal1==2) {
                    $skor1=26;
                }
                elseif($poinTotal1==1) {
                    $skor1=25;
                }
                elseif($poinTotal1==0) {
                    $skor1=24;
                }

                ?>
                
                <br>
                <br>
                <div class="col-xs-12">
                    <h3>Score Section 1 = <?php echo $skor1; ?></h3>
                </div>

                <?php
                if($poinTotal2==40) {
                    $skor2=68;
                }
                elseif($poinTotal2==39) {
                    $skor2=67;
                }
                elseif($poinTotal2==38) {
                    $skor2=65;
                }
                elseif($poinTotal2==37) {
                    $skor2=63;
                }
                elseif($poinTotal2==36) {
                    $skor2=61;
                }
                elseif($poinTotal2==35) {
                    $skor2=60;
                }
                elseif($poinTotal2==34) {
                    $skor2=58;
                }
                elseif($poinTotal2==33) {
                    $skor2=57;
                }
                elseif($poinTotal2==32) {
                    $skor2=56;
                }
                elseif($poinTotal2==31) {
                    $skor2=55;
                }
                elseif($poinTotal2==30) {
                    $skor2=54;
                }
                elseif($poinTotal2==29) {
                    $skor2=53;
                }
                elseif($poinTotal2==28) {
                    $skor2=52;
                }
                elseif($poinTotal2==27) {
                    $skor2=51;
                }
                elseif($poinTotal2==26) {
                    $skor2=50;
                }
                elseif($poinTotal2==25) {
                    $skor2=49;
                }
                elseif($poinTotal2==24) {
                    $skor2=48;
                }
                elseif($poinTotal2==23) {
                    $skor2=47;
                }
                elseif($poinTotal2==22) {
                    $skor2=46;
                }
                elseif($poinTotal2==21) {
                    $skor2=45;
                }
                elseif($poinTotal2==20) {
                    $skor2=44;
                }
                elseif($poinTotal2==19) {
                    $skor2=43;
                }
                elseif($poinTotal2==18) {
                    $skor2=42;
                }
                elseif($poinTotal2==17) {
                    $skor2=41;
                }
                elseif($poinTotal2==16) {
                    $skor2=40;
                }
                elseif($poinTotal2==15) {
                    $skor2=40;
                }
                elseif($poinTotal2==14) {
                    $skor2=38;
                }
                elseif($poinTotal2==13) {
                    $skor2=37;
                }
                elseif($poinTotal2==12) {
                    $skor2=36;
                }
                elseif($poinTotal2==11) {
                    $skor2=35;
                }
                elseif($poinTotal2==10) {
                    $skor2=33;
                }
                elseif($poinTotal2==9) {
                    $skor2=31;
                }
                elseif($poinTotal2==8) {
                    $skor2=29;
                }
                elseif($poinTotal2==7) {
                    $skor2=27;
                }
                elseif($poinTotal2==6) {
                    $skor2=26;
                }
                elseif($poinTotal2==5) {
                    $skor2=25;
                }
                elseif($poinTotal2==4) {
                    $skor2=23;
                }
                elseif($poinTotal2==3) {
                    $skor2=22;
                }
                elseif($poinTotal2==2) {
                    $skor2=21;
                }
                elseif($poinTotal2==1) {
                    $skor2=20;
                }
                elseif($poinTotal2==0) {
                    $skor2=20;
                }

                ?>

                <div class="col-xs-12">
                    <h3>Score Section 2 = <?php echo $skor2; ?></h3>
                </div>

                <?php
                if($poinTotal3==50) {
                    $skor3=67;
                }
                elseif($poinTotal3==49) {
                    $skor3=66;
                }
                elseif($poinTotal3==48) {
                    $skor3=65;
                }
                elseif($poinTotal3==47) {
                    $skor3=63;
                }
                elseif($poinTotal3==46) {
                    $skor3=61;
                }
                elseif($poinTotal3==45) {
                    $skor3=60;
                }
                elseif($poinTotal3==44) {
                    $skor3=59;
                }
                elseif($poinTotal3==43) {
                    $skor3=58;
                }
                elseif($poinTotal3==42) {
                    $skor3=57;
                }
                elseif($poinTotal3==41) {
                    $skor3=56;
                }
                elseif($poinTotal3==40) {
                    $skor3=55;
                }
                elseif($poinTotal3==39) {
                    $skor3=54;
                }
                elseif($poinTotal3==38) {
                    $skor3=54;
                }
                elseif($poinTotal3==37) {
                    $skor3=53;
                }
                elseif($poinTotal3==36) {
                    $skor3=52;
                }
                elseif($poinTotal3==35) {
                    $skor3=52;
                }
                elseif($poinTotal3==34) {
                    $skor3=51;
                }
                elseif($poinTotal3==33) {
                    $skor3=50;
                }
                elseif($poinTotal3==32) {
                    $skor3=49;
                }
                elseif($poinTotal3==31) {
                    $skor3=48;
                }
                elseif($poinTotal3==30) {
                    $skor3=48;
                }
                elseif($poinTotal3==29) {
                    $skor3=47;
                }
                elseif($poinTotal3==28) {
                    $skor3=46;
                }
                elseif($poinTotal3==27) {
                    $skor3=46;
                }
                elseif($poinTotal3==26) {
                    $skor3=44;
                }
                elseif($poinTotal3==25) {
                    $skor3=44;
                }
                elseif($poinTotal3==24) {
                    $skor3=43;
                }
                elseif($poinTotal3==23) {
                    $skor3=43;
                }
                elseif($poinTotal3==22) {
                    $skor3=42;
                }
                elseif($poinTotal3==21) {
                    $skor3=41;
                }
                elseif($poinTotal3==20) {
                    $skor3=40;
                }
                elseif($poinTotal3==19) {
                    $skor3=39;
                }
                elseif($poinTotal3==18) {
                    $skor3=38;
                }
                elseif($poinTotal3==17) {
                    $skor3=37;
                }
                elseif($poinTotal3==16) {
                    $skor3=36;
                }
                elseif($poinTotal3==15) {
                    $skor3=35;
                }
                elseif($poinTotal3==14) {
                    $skor3=34;
                }
                elseif($poinTotal3==13) {
                    $skor3=32;
                }
                elseif($poinTotal3==12) {
                    $skor3=31;
                }
                elseif($poinTotal3==11) {
                    $skor3=30;
                }
                elseif($poinTotal3==10) {
                    $skor3=29;
                }
                elseif($poinTotal3==9) {
                    $skor3=28;
                }
                elseif($poinTotal3==8) {
                    $skor3=28;
                }
                elseif($poinTotal3==7) {
                    $skor3=27;
                }
                elseif($poinTotal3==6) {
                    $skor3=26;
                }
                elseif($poinTotal3==5) {
                    $skor3=25;
                }
                elseif($poinTotal3==4) {
                    $skor3=24;
                }
                elseif($poinTotal3==3) {
                    $skor3=23;
                }
                elseif($poinTotal3==2) {
                    $skor3=23;
                }
                elseif($poinTotal3==1) {
                    $skor3=22;
                }
                elseif($poinTotal3==0) {
                    $skor3=21;
                }


                ?>

                <div class="col-xs-12">
                    <h3>Score Section 3 = <?php echo $skor3; ?></h3>
                </div>
                
                <?php
                $totalskor = ($skor1 + $skor2 + $skor3) / 3 * 10;
                if ($totalskor >= 400) {
                    $ket = "Pass";
                    $ket2 = "<h2>Congratulations you passed this exam</h2>";
                }
                else {
                    $ket = "Failed";
                    $ket2 = "Sorry, you failed this exam";
                }
                ?>

                <div class="col-xs-12">
                    <h1>Total Score = <?php echo ceil($totalskor); ?></h1>
                    <?php echo $ket2; ?>
                </div>
                <?php
                    $input = mysql_query("insert into tb_skor values ('','$users','$data3->ID_klp_ujian','$skor1','$skor2','$skor3','$totalskor','$ket')");
                ?>
                 </div>
                </section>

            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


<script src="<?=site_url('assets/js/jquery.min.js')?>"></script>
<script src="<?=site_url('assets/js/jquery-ui-1.10.3.min.js')?>" type="text/javascript"></script>
<script src="<?=site_url('assets/js/bootstrap.min.js')?>" type="text/javascript"></script>

<?php
$uri2 = $this->uri->segment(2);
if ($uri2 == 'review') {
    echo '<script src="'.site_url('assets/js/plugins/datatables/jquery.dataTables.js').'" type="text/javascript"></script>';
    echo '<script src="'.site_url('assets/js/plugins/datatables/dataTables.bootstrap.js').'" type="text/javascript"></script>';
    echo '<script type="text/javascript">$(function() {$("#example2").dataTable({"bPaginate": true,"bLengthChange": false,"bFilter": false,"bSort": true,"bInfo": true,"bAutoWidth": false});});</script>';
}
?>
<script src="<?=site_url('assets/js/AdminLTE/app.js')?>" type="text/javascript"></script>
</body>
</html>

    </body>
</html>