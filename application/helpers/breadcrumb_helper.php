<?php if (!defined('BASEPATH')) exit('No direct access script allowed');

if (!function_exists('create_breadcrumb')) {

    function create_breadcrumb() {
        $ci =& get_instance();
        $i = 2;
        $uri = $ci->uri->segment($i);
        $link = '<ol class="breadcrumb">';
        $link .= '<li><a href="' . site_url('admin') . '"><i class="fa fa-dashboard"></i> Dashboard</a></li>';

        while ($uri != '') {
            $prep_link = '';
            for ($j = 1; $j <= $i; $j++) {
                $prep_link .= $ci->uri->segment($j) . '/';
            }

            if ($ci->uri->segment($i + 1) == '') {
                $link .= '<li class="active">'.ucfirst(str_replace('-', ' ', $ci->uri->segment($i))).'</li>';
            } else {
                $link .= '<li><a href="#">'.ucfirst(str_replace('-', ' ', $ci->uri->segment($i))).'</a></li>';
            }

            $i++;
            $uri = $ci->uri->segment($i);
        }
        $link .= '</ol>';
        return $link;
    }

}

/* End of file breadcrum_heler.php */
/* Location: ./application/helpers/breadcrumb_helper.php */