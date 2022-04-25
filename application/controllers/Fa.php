<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class fa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('fa_model','model');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
	}
	public function index()
	{
		$this->load->view('fa/login');
	}
	public function login()
	{
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		if($this->model->login($email,$password)->num_rows()>0):
			$this->session->set_userdata('email', $email);
	  	 	return redirect(base_url().'fa/dashboard');
		else:
			$this->session->set_flashdata('msg', "Email/Password is incorrect. Try again");
				return redirect(base_url().'fa/index');
		endif;
	}
	public function check_login()
	{
		if(empty($this->session->userdata('email'))):
		$this->session->set_flashdata('msg', "Please login to continue");
		redirect(base_url().'fa/index');
		endif;
	}
	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->set_flashdata('msg', "Logged out successfully");
		return redirect(base_url().'fa/index');
	}
	public function dashboard()
	{
		$this->check_login();
		$data['kyc_status']=$this->model->faKYCStatus($this->session->userdata('email'));
		$data['fa_id']=$this->model->faIDFinder($this->session->userdata('email'));
		$data['announcement']=$this->model->faAnnouncementFinder();
		$this->load->view('fa/header');
		$this->load->view('fa/sidebar');
		$this->load->view('fa/index',$data);
		$this->load->view('fa/footer');
	}
	public function kyc()
	{
		$this->check_login();
		$this->load->view('fa/header');
		$this->load->view('fa/sidebar');
		$this->load->view('fa/kyc');
		$this->load->view('fa/footer');
	}
	public function updateKYC()
	{
		$email=$this->session->userdata('email');
		$config=[
		 	'upload_path'=>'./upload/',
		 	'allowed_types'=>'jpeg|jpg|png|pdf'
		 ];
		 $this->load->library('upload',$config);
		 if($this->upload->do_upload('aadhar')):
		 $image=$this->upload->data();
		 $aadhar="upload/".$image['raw_name'].$image['file_ext'];
		else:
			$aadhar='';
		endif;
		 if($this->upload->do_upload('pan')):
		 $image=$this->upload->data();
		 $pan="upload/".$image['raw_name'].$image['file_ext'];
		else:
			$pan='';
		endif;
		if($this->upload->do_upload('cheque_bank')):
		 $image=$this->upload->data();
		 $cheque_bank="upload/".$image['raw_name'].$image['file_ext'];
		else:
			$cheque_bank='';
		endif;
		$data=array(
			'aadhar'=>$aadhar,
			'pan'=>$pan,
			'cheque_bank'=>$cheque_bank,
			'kyc_status'=>'requested',
		);
		if($this->model->updateKYC($data,$email)):
			$this->session->set_flashdata('msg', "Your KYC Request sent successfully.");
	  	 	return redirect(base_url().'fa/kyc');
		else:
			$this->session->set_flashdata('msg', "Something went wrong. Try again");
			return redirect(base_url().'fa/kyc');
		endif;
	}
	public function change_password()
	{
		$this->check_login();
		$this->load->view('fa/header');
		$this->load->view('fa/sidebar');
		$this->load->view('fa/change_password');
		$this->load->view('fa/footer');	
	}
	public function check_password()
	{
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('newpassword', 'New Password', 'required|min_length[5]');
		$this->form_validation->set_rules('cpassword', 'Confirm password', 'required|matches[newpassword]');
		if($this->form_validation->run()):
		$username=$this->session->userdata('email');
		$password=$this->input->post('password');
		$newpassword=$this->input->post('newpassword');
		$cpassword=$this->input->post('cpassword');
		if($this->model->checkpassword($username,$password)->num_rows()):
				if($newpassword == $cpassword):
					if($this->model->changepassword($username,$newpassword)):
						$this->session->set_flashdata('msg', "Your Password successfully changed"); 
		   				redirect(base_url().'fa/change_password');
					else:
						$this->session->set_flashdata('msg', "Something went wrong"); 
		   				redirect(base_url().'fa/change_password');
					endif;
				else:
					$this->session->set_flashdata('msg', "New Password not matched!"); 
	   				redirect(base_url().'fa/change_password');
				endif;
		else:
			$this->session->set_flashdata('msg', "Old Password not matched."); 
	   				redirect(base_url().'fa/change_password');
		endif;
		else:
			$this->change_password();
		endif;
	}
	public function register()
	{
		$this->load->view('fa/register');	
	}
	public function registration()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('mobno', 'Mobile Number', 'required|min_length[10]|numeric');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[fa.email]');
		if($this->form_validation->run()):
			$form=$this->input->post();
			$data=array(
				'name'=>$form['name'],
				'mobno'=>$form['mobno'],
				'address'=>$form['address'],
				'password'=>$form['password'],
				'email'=>$form['email']
			);
			if($this->model->registration($data)):
				$this->session->set_flashdata('msg', "Your Account Created Successfully."); 
					redirect(base_url().'fa/register');
			else:
				$this->session->set_flashdata('msg', "Something went wrong"); 
					redirect(base_url().'fa/register');
			endif;
		else:
			$this->register();
		endif;	
	}
	public function mycourse()
	{
		$this->check_login();
		$fa_id=$this->model->faIDFinderByEmail($this->session->userdata('email'));
		$data['course']=$this->model->faCouseFinderByID($fa_id);
		$this->load->view('fa/header');
		$this->load->view('fa/sidebar');
		$this->load->view('fa/mycourse',$data);
		$this->load->view('fa/footer');
	}
	public function setCoursePrice()
	{
		$id=$this->input->post('id');
		$sell_price=$this->input->post('sell_price');
		$data=array(
			'sell_price'=>$sell_price
		);
		if($this->model->setCoursePrice($data,$id)):
			$this->session->set_flashdata('msg', "Price set Successfully."); 
				redirect(base_url().'fa/mycourse');
		else:
			$this->session->set_flashdata('msg', "Something went wrong"); 
				redirect(base_url().'fa/mycourse');
		endif;
	}
	public function raise_ticket()
	{
		$this->check_login();
		$data['raise_ticket']=$this->model->raiseTicketFinder($this->session->userdata('email'));
		$this->load->view('fa/header');
		$this->load->view('fa/sidebar');
		$this->load->view('fa/raise_ticket',$data);
		$this->load->view('fa/footer');
	}
	public function createTicket()
	{
		$this->check_login();
		$subject=$this->input->post('subject');
		$description=$this->input->post('description');
		$data=array(
			'subject'=>$subject,
			'description'=>$description,
			'type'=>'fa',
			'email'=>$this->session->userdata('email')
		);
		if($this->model->createTicket($data)):
			$this->session->set_flashdata('msg', "Ticket Raised Successfully."); 
				redirect(base_url().'fa/raise_ticket');
		else:
			$this->session->set_flashdata('msg', "Something went wrong"); 
				redirect(base_url().'fa/raise_ticket');
		endif;
	}
	public function deleteRaiseTicket($id)
	{
		if($this->model->deleteRaiseTicket($id)):
			$this->session->set_flashdata('msg', "Raise ticket deleted Successfully."); 
				redirect(base_url().'fa/raise_ticket');
		else:
			$this->session->set_flashdata('msg', "Something went wrong"); 
				redirect(base_url().'fa/raise_ticket');
		endif;
	}
	//14 Apr, 2022
	public function fa_list()
	{
		$this->check_login();
		$fa_id=$this->model->faIDFinder($this->session->userdata('email'));
		$data['fa_list']=$this->model->faFinder($fa_id);
		$this->load->view('fa/header');
		$this->load->view('fa/sidebar');
		$this->load->view('fa/fa_list',$data);
		$this->load->view('fa/footer');
	}
	public function addFa()
	{
		$this->check_login();
		$fa_id=$this->model->faIDFinder($this->session->userdata('email'));
		$name=$this->input->post('name');
		$mobno=$this->input->post('mobno');
		$email=$this->input->post('email');
		$address=$this->input->post('address');
		$password=$this->input->post('password');
		$data=array(
			'fa_id'=>$fa_id,
			'name'=>$name,
			'mobno'=>$mobno,
			'email'=>$email,
			'address'=>$address,
			'password'=>$password
		);
		if($this->model->addFa($data)):
			$this->session->set_flashdata('msg', "Franchise Agent added Successfully."); 
				redirect(base_url().'fa/fa_list');
		else:
			$this->session->set_flashdata('msg', "Something went wrong"); 
				redirect(base_url().'fa/fa_list');
		endif;
	}
	public function deleteFa($id)
	{
		if($this->model->deleteFa($id)):
			$this->session->set_flashdata('msg', "Franchise Agent deleted Successfully."); 
				redirect(base_url().'fa/fa_list');
		else:
			$this->session->set_flashdata('msg', "Something went wrong"); 
				redirect(base_url().'fa/fa_list');
		endif;
	}
	public function lead_list()
	{
		$this->check_login();
		$fa_id=$this->model->faIDFinderByEmail($this->session->userdata('email'));
		$data['lead_list']=$this->model->leadFinder($fa_id);
		$this->load->view('fa/header');
	 	$this->load->view('fa/sidebar');
		$this->load->view('fa/lead_list',$data);
		$this->load->view('fa/footer');
	}
	public function addLead()
	{
		$concern_name=$this->input->post('concern_name');
		$company_name=$this->input->post('company_name');
		$mobno=$this->input->post('mobno');
		$email=$this->input->post('email');
		$address=$this->input->post('address');
		$city=$this->input->post('city');
		$state=$this->input->post('state');
		$status	=$this->input->post('status');
		$type=$this->input->post('type');
		$fa_id=$this->model->faIDFinderByEmail($this->session->userdata('email'));
		$data=array(
			'concern_name'=>$concern_name,
			'company_name'=>$company_name,
			'mobno'=>$mobno,
			'email'=>$email,
			'address'=>$address,
			'city'=>$city,
			'state'=>$state,
			'status'=>$status,
			'type'=>$type,
			'fa_id'=>$fa_id
		);
		if($this->model->addLead($data)):
			 $this->session->set_flashdata('msg', "Lead added Successfully."); 
				 redirect(base_url().'fa/lead_list');
		else:
			$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
				 redirect(base_url().'fa/lead_list');
		endif;
	}
	public function changeLeadStatus()
	{
		$status=$this->input->post('status');
		$id=$this->input->post('id');
		if(!empty($status)):
			if($this->model->changeLeadStatus($status,$id)):
			 $this->session->set_flashdata('msg', "Lead status changed Successfully."); 
				 redirect(base_url().'fa/lead_list');
			else:
				$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
					 redirect(base_url().'fa/lead_list');
			endif;
		else:
			$this->session->set_flashdata('msg', "Please select status."); 
				 redirect(base_url().'fa/lead_list');
		endif;
	}

	

}

