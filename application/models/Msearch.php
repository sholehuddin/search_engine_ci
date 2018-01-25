<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	Developed by Muhammad Sholehuddin Al-Ayyubi
	Copyright 2016
 */

class Msearch extends CI_Model 
{
	function user(){
		$key = $this->input->get('search');
		$this->db->select('tbl_users.id,tbl_users.username,tbl_users.nama,tbl_privilage.jabatan AS privilage,tbl_users.eselon,t_unit.nama_unit AS uke,tbl_users.ldap,tbl_users.status');
		$this->db->join('tbl_privilage','tbl_users.privilage = tbl_privilage.kode');
		$this->db->join('t_unit','t_unit.kode_surat = tbl_users.uke','left');
		if($key){
			$this->db->like('tbl_users.username',$key);
			$this->db->or_like(array('tbl_users.nama' => $key,'t_unit.nama_unit' => $key,'tbl_privilage.jabatan' => $key));
		}
		$this->db->order_by('tbl_privilage.id,tbl_users.eselon,tbl_users.nama');
		$getData = $this->db->get('tbl_users');
		if ($getData->num_rows() > 0) {
			$data = $getData->result_array();
			return $data;
		} else {
			return null;
		}
    }
}