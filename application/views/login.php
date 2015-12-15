<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>TOEFL LTC</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <?=link_tag('assets/css/bootstrap.min.css')?>
        <?=link_tag('assets/css/font-awesome.min.css')?>
        <?=link_tag('assets/css/AdminLTE.css')?>

        <!--[if lt IE 9]>
          <script src="<?=site_url('assets/js/html5shiv.js')?>"></script>
          <script src="<?=site_url('assets/js/respond.min.js')?>"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">Sign In</div>
            <?=form_open()?>
                <div class="body bg-gray">
                    <div class="form-group">
                        <?=form_input(array('name' => 'username', 'value' => set_value('username'), 'class' => 'form-control', 'placeholder' => 'Enter your username', 'autofocus' => ''))?>
                    </div>
                    <div class="form-group">
                        <?=form_password(array('name' => 'password', 'class' => 'form-control', 'placeholder' => 'Enter your password', 'value' => ''))?>
                    </div>
                </div>
                <div class="footer">                                                               
                    <?=form_submit(array('value' => 'Sign me in', 'class' => 'btn bg-olive btn-block'))?>
                </div>
            <?=form_close()?>
        </div>
        <script src="<?=site_url('assets/js/jquery.min.js')?>"></script>
        <script src="<?=site_url('assets/js/bootstrap.min.js')?>" type="text/javascript"></script>        
    </body>
</html>