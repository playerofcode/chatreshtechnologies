<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fa_model extends CI_Model {

	public function login($email,$password)
	{
		return  $this->db->get_where('fa', array('email' => $email,'password'=>$password));
	}
	public function checkpassword($username,$password)
 	{
 		return $this->db->get_where('fa', array('email' => $username,'password'=>$password));
 	}
 	public function changepassword($username,$newpassword)
 	{
 		$this->db->where('email', $username);
		return $this->db->update('fa', array('password' => $newpassword));
 	}
	public function updateKYC($data,$email)
	{
		$this->db->where('email',$email);
		return $this->db->update('fa',$data);
	}
	public function faKYCStatus($email)
	{
		return $this->db->get_where('fa',array('email'=>$email))->row()->kyc_status;
	}
	public function registration($data)
	{
		return $this->db->insert('fa',$data);
	}
	public function faIDFinderByEmail($email)
	{
		return $this->db->get_where('fa',array('email'=>$email))->row()->id;
	}
	public function courseNameFinderByID($course_id)
	 {
	 	return $this->db->get_where('classes',array('id'=>$course_id))->row()->class_name;
	 }
	public function faCouseFinderByID($fa_id)
	{
		$res=$this->db->get_where('fa_course_referral_program',array('fa_id'=>$fa_id))->result();
		$output=array();
		foreach ($res as $key):
			$output[]=array(
				'id'=>$key->id,
				'course_name'=>$this->courseNameFinderByID($key->course_id),
				'assign_price'=>$key->assign_price,
				'code'=>$key->code,
				'sell_price'=>$key->sell_price,
				'created_at'=>$key->created_at,
			);
		endforeach;
		return $output;
	}
	public function setCoursePrice($data,$id)
	{
		$this->db->where('id',$id);
		return $this->db->update('fa_course_referral_program',$data);
	}
	public function raiseTicketFinder($email)
	{
		$this->db->order_by('id','desc');
		return $this->db->get_where('raise_ticket',array('email'=>$email,'type'=>'fa'))->result();
	}
	public function createTicket($data)
	{
		return $this->db->insert('raise_ticket',$data);
	}
	public function deleteRaiseTicket($id)
	{
		return $this->db->delete('raise_ticket',array('id'=>$id));
	}
	public function faIDFinder($email)
	{
		return $this->db->get_where('fa',array('email'=>$email))->row()->id;
	}
	//14 Arp, 2022
	public function faFinder($fa_id)
	{
		return $this->db->get_where('fa',array('fa_id'=>$fa_id))->result();
	}
	public function addFa($data)
	{
		return $this->db->insert('fa',$data);
	}
	public function deleteFa($id)
	{
		return $this->db->delete('fa',array('id'=>$id));
	}
	public function faAnnouncementFinder()
	{
		$this->db->order_by('id','desc');
		return $this->db->get_where('announcement',array('type'=>'fa'))->result();
	}
	public function leadFinder($fa_id)
	{
		$this->db->order_by('id','desc');
		return $this->db->get_where('lead_mgmt',array('fa_id'=>$fa_id))->result();
	}
	public function addLead($data)
	{
		return $this->db->insert('lead_mgmt',$data);
	}
	public function changeLeadStatus($status,$id)
	{
		$this->db->where('id',$id);
		return $this->db->update('lead_mgmt',array('status'=>$status));
	}

}

