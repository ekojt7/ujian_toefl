<?php
$uri2 = $this->uri->segment(2);
$uri3 = $this->uri->segment(3);
$master = '';
$transaksi = '';
$setting = '';
if ($uri2 == 'master') {
    $master = 'active';
} elseif ($uri2 == 'transaksi') {
    $transaksi = 'active';
} elseif ($uri2 == 'setting') {
    $setting = 'active';
}
?>
<aside class="left-side sidebar-offcanvas">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?=site_url('upload/'.$session->foto)?>" class="img-circle" alt="<?=$session->nama?>" />
            </div>
            <div class="pull-left info">
                <p>Hello, <?=$session->nama?></p>
                <?=anchor('admin/setting/edit-user', '<i class="fa fa-circle text-success"></i> Profile')?>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li>
                <?=anchor('admin', '<i class="fa fa-dashboard"></i> <span>Dashboard</span>')?>
            </li>
            <li class="treeview <?=$master?>">
                <?=anchor('#', '<i class="fa fa-laptop"></i> <span>Data Master</span> <i class="fa fa-angle-left pull-right"></i>')?>
                <ul class="treeview-menu">
                    <li><?=anchor('admin/master/peserta', '<i class="fa fa-angle-double-right"></i> Examinees')?></li>
                    <li><?=anchor('admin/master/soal', '<i class="fa fa-angle-double-right"></i> Questions')?></li>
                </ul>
            </li>
            <li class="treeview <?=$setting?>">
                <?=anchor('#', '<i class="fa fa-wrench"></i> <span>Settings</span> <i class="fa fa-angle-left pull-right"></i>')?>
                <ul class="treeview-menu">
                    <li><?=anchor('admin/setting/kelompok-ujian', '<i class="fa fa-angle-double-right"></i> Groups')?></li>
                    <li><?=anchor('admin/setting/edit-user', '<i class="fa fa-angle-double-right"></i> Users')?></li>
                    
                </ul>
            </li>
            <li class="treeview <?=$transaksi?>">
                <?=anchor('#', '<i class="fa fa-edit"></i> <span>Report</span> <i class="fa fa-angle-left pull-right"></i>')?>
                <ul class="treeview-menu">
                    <li><?=anchor('admin/transaksi/ujian', '<i class="fa fa-angle-double-right"></i> Score Report')?></li>
                </ul>
            </li>
            
        </ul>
    </section>
</aside>