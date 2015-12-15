<header class="header">
    <?=anchor('admin', 'TOEFL LTC', array('class' => 'logo'))?>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span><?=$session->nama?> <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">
                            <?php
                            $src = array(
                                'src' => 'upload/'.$session->foto,
                                'class' => 'img-circle',
                                'alt' => $session->nama
                            );
                            echo img($src);
                            ?>
                            <p><?=$session->username.' - '.ucfirst($session->level)?></p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-right">
                                <?=anchor('peserta/profile', 'Profile', array('class' => 'btn btn-default btn-flat'))?>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">