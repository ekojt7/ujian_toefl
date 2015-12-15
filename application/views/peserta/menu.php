<aside class="left-side sidebar-offcanvas">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?=site_url('upload/'.$session->foto)?>" class="img-circle" alt="<?=$session->nama?>" />
            </div>
            <div class="pull-left info">
                <p>Hello, <?=$session->nama?></p>
                <?=anchor('peserta/profile', '<i class="fa fa-circle text-success"></i> Profile')?>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="active">
                <?=anchor('peserta', '<i class="fa fa-dashboard"></i> <span>Dashboard</span>')?>
            </li>
        </ul>
    </section>
</aside>