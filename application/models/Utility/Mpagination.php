<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpagination extends CI_Model 
{
	function config($url,$row,$page){
        $config['base_url'] = $url;
        $config['total_rows'] = $row->num_rows(); //Ambil Jumlah Data
        $config['per_page'] = $page;
        $config['first_link'] = '&laquo;&laquo;';
        $config['last_link'] = '&raquo;&raquo;';
        $config['next_link'] = '&raquo;';
        $config['prev_link'] = '&laquo;';
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li style="font-weight: bold; font-style:oblique;"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        return $config;
	}
}