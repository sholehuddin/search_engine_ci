<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	Developed by Muhammad Sholehuddin Al-Ayyubi
	Copyright 2016
 */

class Templates extends CI_Model 
{
    function top_template($data,$template){
		//$data['tracking_code'] = $this->get_tracking_code();
		$this->load->view('templates/header/css1',$data); //html heder and first css
		$this->load->view('templates/header/css_'.$template); //spesific css
		$this->load->view('templates/navbar/headbar');
		//$this->load->view('templates/navbar/navigasi');
		$this->load->view('templates/navbar/breadcrumb',$data);
    }

    function bottom_template($template){
		$this->load->view('templates/footer/footer'); //footer notes
		//if($this->session->userdata('privilage') == 'sa') $this->load->view('templates/config/config');
		$this->load->view('templates/footer/js1'); //js footer and first css
		$this->load->view('templates/footer/js_'.$template); //spesific js
    }

    function get_tracking_code(){
    	$this->db->select('isi');
		$getData = $this->db->get('tracking_code');
		if ($getData->num_rows() > 0) {
			$data = $getData->result_array();
			return $data;
		} else {
			return null;
		}
    }

    function track_code(){
		$getData = $this->db->get('tracking_code');
		if ($getData->num_rows() > 0) {
			$data = $getData->result_array();
			return $data;
		} else {
			return null;
		}
    }
}