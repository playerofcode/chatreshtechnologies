<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function verifyCompany($code)
	{
		return $this->db->get_where('company_list',array('prefix_name'=>$code));
	}
	public function product_list($company_id)
	{
		return $this->db->get_where('product_mgmt',array('company_id'=>$company_id))->result();
	}
	public function mfaFinder($id)
	{
		return $this->db->get_where('mfa',array('id'=>$id));
	}
	public function faFinder($id)
	{
		return $this->db->get_where('fa',array('id'=>$id));
	}

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */