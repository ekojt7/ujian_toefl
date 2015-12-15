<section class="content-header">
    <h1>Setting <?=str_replace('-', ' ', $this->uri->segment(3))?></h1>
    <?=create_breadcrumb()?>
</section>
<section class="content">
    <div class="row">
        <?php
        $uri3 = $this->uri->segment(3);
        if ($uri3 == 'user') {
            $this->load->view('admin/content/add_user');
        } else {
            $this->load->view('admin/content/edit_user');
        }
        ?>
        <div class="col-xs-8">
            <div class="box-body table-responsive">
                
            </div>
        </div>
    </div>
</section>