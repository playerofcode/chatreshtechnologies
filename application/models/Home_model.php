<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function Creator($tbl_name,$data)
	{
		return $this->db->insert($tbl_name,$data);
	}
	public function finder($tbl_name,$id='')
	{
		if($id):
			return $this->db->get_where($tbl_name,array('id'=>$id))->result();
		else:
			$this->db->order_by('id','desc');
			return $this->db->get($tbl_name)->result();
		endif;
	}
	public function recentBlog()
	{
		$this->db->order_by('id','desc');
		$this->db->limit(3);
		return $this->db->get('blog')->result();
	}
	//18 Apr, 2022
	public function portfolioFinder()
	{
		return $this->db->get('portfolio')->result();
	}
	public function teamFinder()
	{
		return $this->db->get('team')->result();
	}
	public function blogCountFinder($id)
	{
		return $this->db->get_where('blog',array('id'=>$id))->row()->view;
	}
	public function blogCountUpdater($id,$view)
	{
		$this->db->where('id',$id);
		return $this->db->update('blog',array('view'=>$view));
	}
	//21 Apr, 2022
	public function companyList()
	{
		return $this->db->get('company_list')->result();
	}
	public function productFinder($company_id)
	{
		$res=$this->db->get_where('product_mgmt',array('company_id'=>$company_id))->result();
		$output='<option>Select  Program/Product</option>';
		foreach($res as $key):
			$output.='<option>'.$key->product_name.'</option>';
		endforeach;
		return $output;
	}
	public function process_payment($data)
	{
		$this->db->insert('sell_mgmt', $data);
		return $this->db->insert_id();
	}
	public function mfaFinder($id)
	{
		return $this->db->get_where('mfa',array('id'=>$id))->num_rows();
	}
	public function faFinder($id)
	{
		return $this->db->get_where('fa',array('id'=>$id))->num_rows();
	}
}

/* End of file Home_model.php */
/* Location: ./application/models/Home_model.php */