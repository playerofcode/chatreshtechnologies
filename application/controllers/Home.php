<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model','model');
	}
	public function index()
	{
		$this->load->view('home/header');
		$this->load->view('home/index');
		$this->load->view('home/footer');
	}
	public function contact()
	{
		$this->load->view('home/header');
		$this->load->view('home/contact');
		$this->load->view('home/footer');
	}
	public function blog()
	{
		$data['blog']=$this->model->finder('blog');
		$data['recent_blog']=$this->model->recentBlog();
		$this->load->view('home/header');
		$this->load->view('home/blog',$data);
		$this->load->view('home/footer');
	}
	public function blog_info($id)
	{
		$current_view=$this->model->blogCountFinder($id);
		$view=$current_view+1;
		$this->model->blogCountUpdater($id,$view);
		$data['blog']=$this->model->finder('blog',$id);
		$data['recent_blog']=$this->model->recentBlog();
		$this->load->view('home/header');
		$this->load->view('home/blog_info',$data);
		$this->load->view('home/footer');
	}
	public function about()
	{
		$this->load->view('home/header');
		$this->load->view('home/about');
		$this->load->view('home/footer');
	}
	public function team()
	{
		$data['team']=$this->model->teamFinder();
		$this->load->view('home/header');
		$this->load->view('home/team',$data);
		$this->load->view('home/footer');
	}
	public function services()
	{
		$this->load->view('home/header');
		$this->load->view('home/services');
		$this->load->view('home/footer');
	}
	public function portfolio()
	{
		$data['portfolio']=$this->model->portfolioFinder();
		$this->load->view('home/header');
		$this->load->view('home/portfolio',$data);
		$this->load->view('home/footer');
	}
	public function enquiry()
	{
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$subject=$this->input->post('subject');
		$message=$this->input->post('message');
		$data=array(
			'name'=>$name,
			'email'=>$email,
			'subject'=>$subject,
			'message'=>$message
		);
		if($this->model->Creator('contact',$data)):
  	 	$this->session->set_flashdata('msg', "Your message sent successfully. Thank You");
		return redirect(base_url().'contact-us');
		else:
		$this->session->set_flashdata('msg', "Something went wrong. Try again.");
		return redirect(base_url().'contact-us');
		endif;
	}
	public function privacy_policy()
	{
		$this->load->view('home/header');
		$this->load->view('home/privacy_policy');
		$this->load->view('home/footer');
	}
	//21 Apr,2022
	public function boxoutsolution()
	{
		$this->load->view('home/boxoutsolution');
	}
	public function eschool21()
	{
		$this->load->view('home/eschool21');
	}
	public function payment()
	{
		$data['company']=$this->model->companyList();
		$this->load->view('home/header');
		$this->load->view('home/payment',$data);
		$this->load->view('home/footer');
	}
	public function productFinder()
	{
		error_reporting(0);
		$company_id=$this->input->post('company_id');
		echo $res=$this->model->productFinder($company_id);
	}
	public function process_payment()
	{
		$company_id=$this->input->post('company_id');
		$product_id=$this->input->post('product_id');
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$mobno=$this->input->post('mobno');
		$data=array(
			'company_id'=>$company_id,
			'product_id'=>$product_id,
			'name'=>$name,
			'email'=>$email,
			'mobno'=>$mobno
		);
		if($data['sell_id']=$this->model->process_payment($data)):
  	 	$this->load->view('home/header');
		$this->load->view('home/promo_code',$data);
		$this->load->view('home/footer');
		else:
		$this->session->set_flashdata('msg', "Something went wrong. Try again.");
		return redirect(base_url().'home/payment');
		endif;
	}
	public function apply_code()
	{
		error_reporting(0);
		$sell_id=$this->input->post('sell_id');
		$code=$this->input->post('code');
  		$promo_code=strtolower($code);
  		$end=strlen($promo_code);
  		$mfa = substr($promo_code,0,3);
  		$fa = substr($promo_code,0,2);
  		if($mfa == 'mfa'):
  			$id=substr($promo_code,3,$end);
			$res=$this->model->mfaFinder($id);
				if($res>0):
					echo "MFA working fine";
				else:
			$this->session->set_flashdata('msg', "MFA not found. Try again.");
	  		$data['sell_id']=$sell_id;
	  	 	$this->load->view('home/header');
			$this->load->view('home/promo_code',$data);
			$this->load->view('home/footer');
				endif;
  		elseif($fa == 'fa'):
  			$id=substr($promo_code,2,$end);
  			$res=$this->model->faFinder($id);
				if($res>0):
						echo "FA working fine";
					else:
				$this->session->set_flashdata('msg', "MFA not found. Try again.");
		  		$data['sell_id']=$sell_id;
		  	 	$this->load->view('home/header');
				$this->load->view('home/promo_code',$data);
				$this->load->view('home/footer');
					endif;
  		else:
  		$this->session->set_flashdata('msg', "invalid promo code. Try again.");
  		$data['sell_id']=$sell_id;
  	 	$this->load->view('home/header');
		$this->load->view('home/promo_code',$data);
		$this->load->view('home/footer');
  		//
  		endif;
	}


}
