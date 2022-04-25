<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
require (APPPATH.'/libraries/REST_Controller.php');


class Auth extends REST_Controller {

	public  function  __construct(){
		parent::__construct();
		$this->load->model('Auth_model','model');
		$config=[
		 	'upload_path'=>'./upload/',
		 	'allowed_types'=>'jpg|png|jpeg'
		 ];
		 $this->load->library('upload',$config);
	}
	public function index_get()
	{
		$this->response([
			'status'=>'successs',
			'message'=>'API Working properly'
			],REST_Controller::HTTP_OK);
	}
  	//19  Apr, 2022
  	public function product_list_get()
  	{
  		$code=$this->input->get('code');
  		if(!empty($code)):
  			$data=$this->model->verifyCompany($code);
  			if($data->num_rows()>0):
  				$company_id=$data->row()->id;
  				$data=$this->model->product_list($company_id);
  				$this->response([
				'status'=>'success',
				'message'=>'Record retrieve successfully',
				'data'=>$data,
				],REST_Controller::HTTP_OK);
  			else:
  				$this->response([
				'status'=>'failure',
				'message'=>'Company not found'
				],REST_Controller::HTTP_OK);
  			endif;
  			
  		else:
  			$this->response([
			'status'=>'success',
			'message'=>'Company Code required'
			],REST_Controller::HTTP_OK);
  		endif;
  		//$data=$this->model->product_list($code);
  	}
  	public function agent_verify_get()
  	{
  		$code=$this->input->get('code');
  		$promo_code=strtolower($code);
  		$end=strlen($promo_code);
  		$mfa = substr($promo_code,0,3);
  		$fa = substr($promo_code,0,2);
  		if($mfa == 'mfa'):
  			$id=substr($promo_code,3,$end);
			$data=$this->model->mfaFinder($id);
			if($data->num_rows()>0):
				$this->response([
			'status'=>'success',
			'message'=>$data->result()
			],REST_Controller::HTTP_OK);
			else:
				$this->response([
			'status'=>'failure',
			'message'=>'MFA not found'
			],REST_Controller::HTTP_OK);
			endif;
  		elseif($fa == 'fa'):
  			$id=substr($promo_code,2,$end);
  			$data=$this->model->faFinder($id);
	  		if($data->num_rows()>0):
	  			$this->response([
				'status'=>'success',
				'message'=>$data->result()
				],REST_Controller::HTTP_OK);
	  		else:
	  			$this->response([
				'status'=>'failure',
				'message'=>'FA not found'
				],REST_Controller::HTTP_OK);
	  		endif;
  		else:
  		$this->response([
			'status'=>'failed',
			'message'=>'invalid promo code'
			],REST_Controller::HTTP_OK);
  		endif;
  		
  	// 	$this->response([
			// 'status'=>'success',
			// 'type'=>$type,
			// 'last'=>$id,
			// 'code'=>$code
			// ],REST_Controller::HTTP_OK);
  	}
  	
	
}
