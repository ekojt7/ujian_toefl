<?php
echo $this->load->view('admin/header');
echo $this->load->view('admin/top_bar');
echo $this->load->view('admin/menu');
echo '<aside class="right-side">'.$contents.'</aside>';
echo $this->load->view('admin/footer');