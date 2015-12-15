<section class="content-header">
    <h1>Dashboard <small>Control panel</small></h1>
    <?=create_breadcrumb()?>
</section>
<section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?=$peserta->num_rows()?></h3>
                    <p>Examinees</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <?=anchor('admin/master/peserta', 'More info <i class="fa fa-arrow-circle-right"></i>', array('class' => 'small-box-footer'))?>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?=$soal->num_rows()?></h3>
                    <p>Questions</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <?=anchor('admin/master/soal', 'More info <i class="fa fa-arrow-circle-right"></i>', array('class' => 'small-box-footer'))?>
            </div>
        </div>
    </div>
</section>