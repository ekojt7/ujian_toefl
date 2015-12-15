<section class="content-header">
    <h1>Dashboard <small>Control panel</small></h1>
    <?=create_breadcrumb()?>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Welcome</h3>
                </div>
                <div class="box-body">
                    <p>Click <b>Start</b> to begin the TOEFL Examination.</p>
                    <p>Click <b>Save Answer</b> if you have finished the examination.</p>
                </div>
                <div class="box-footer">
                    <?=form_open()?>
                    <?=form_submit(array('value' => 'Start', 'class' => 'btn btn-default', 'name' => 'mulai'))?>
                    <?=form_close()?>
                </div>
            </div>
        </div>
    </div>
</section>