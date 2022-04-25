<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model','model');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$config=[
		 	'upload_path'=>'./upload/',
		 	'allowed_types'=>'gif|jpg|png|jpeg|pdf'
		 ];
		 $this->load->library('upload',$config);
	}
	public function index()
	{
		$this->load->view('admin/login');
	}
	public function login()
	{
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		if($this->model->login($email,$password)->num_rows()>0):
			$this->session->set_userdata('email', $email);
	  	 	return redirect(base_url().'admin/dashboard');
		else:
			$this->session->set_flashdata('msg', "Email/Password is incorrect. Try again");
				return redirect(base_url().'admin/index');
		endif;
	}
	public function check_login()
	{
		if(empty($this->session->userdata('email')))
		{
		$this->session->set_flashdata('msg', "Please login to continue");
		redirect(base_url().'admin/index');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->set_flashdata('msg', "Logged out successfully");
		return redirect(base_url().'admin/index');
	}
	public function dashboard()
	{
		$this->check_login();
		$data['contactCount']=$this->model->contactCounter();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/index',$data);
		$this->load->view('admin/footer');
	}
	public function contact()
	{
		$this->check_login();
		$data['contact']=$this->model->contactFinder();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/contact',$data);
		$this->load->view('admin/footer');
	}
	public function addContact()
	{
		$name=$this->input->post('name');
		$mobno=$this->input->post('mobno');
		$data=array(
			'name'=>$name,
			'mobno'=>$mobno
		);
		if($this->model->addContact($data))
		{
			$this->session->set_flashdata('msg','Contact added successfully');
			return redirect(base_url().'admin/contact');
		}
		else
		{
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/contact');	
		}
	}
	public function deleteContact()
	{
		$id=$this->uri->segment(3);
		if($this->model->deleteContact($id))
			{
			$this->session->set_flashdata('msg','Contact deleted successfully');
			return redirect(base_url().'admin/contact');
		}
		else
		{
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/contact');	
		}
	}
	public function editContact($id)
	{
		$id=$this->uri->segment(3);
		$data['contact']=$this->model->contactFinder($id);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_contact',$data);
		$this->load->view('admin/footer');
	}
	public function updateContact()
	{
		$id=$this->input->post('id');
		$name=$this->input->post('name');
		$mobno=$this->input->post('mobno');
		$data=array(
			'name'=>$name,
			'mobno'=>$mobno
		);
		if($this->model->updateContact($id,$data))
		{
			$this->session->set_flashdata('msg','Contact updated successfully');
			return redirect(base_url().'admin/contact');
		}
		else
		{
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/contact');	
		}
	}
	
	
	public function change_password()
	{
		$this->check_login();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/change_password');
		$this->load->view('admin/footer');	
	}
	public function check_password()
	{
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('newpassword', 'New Password', 'required|min_length[5]');
		$this->form_validation->set_rules('cpassword', 'Confirm password', 'required|matches[newpassword]');
		if($this->form_validation->run())
		{
			$username=$this->session->userdata('email');
		$password=$this->input->post('password');
		$newpassword=$this->input->post('newpassword');
		$cpassword=$this->input->post('cpassword');
		if($this->model->checkpassword($username,$password)->num_rows())
		{
				if($newpassword == $cpassword)
				{
					if($this->model->changepassword($username,$newpassword))
					{
						$this->session->set_flashdata('msg', "Your Password successfully changed"); 
		   				redirect(base_url().'admin/change_password');
					}
					else
					{
						$this->session->set_flashdata('msg', "Something went wrong"); 
		   				redirect(base_url().'admin/change_password');
					}
				}
				else
				{
					$this->session->set_flashdata('msg', "New Password not matched!"); 
	   				redirect(base_url().'admin/change_password');
				}	
		}
		else
		{
			$this->session->set_flashdata('msg', "Old Password not matched."); 
	   				redirect(base_url().'admin/change_password');
		}
		}
		else
		{
			$this->change_password();
		}
	}
	//05 Nov, 2021
	public function importCSV()
	{
		$filename=$_FILES['file']['tmp_name'];
		$file=fopen($filename, 'r');
		while(($data = fgetcsv($file, 10000, ',')) !==FALSE){
			$data=array(
				'name'=>$data[0],
				'mobno'=>$data[1]
			);
			$this->model->addContact($data);
		}
		return redirect(base_url().'admin/contact');
	}
	public function whatsapp()
	{
		$this->check_login();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/whatsapp');
		$this->load->view('admin/footer');
	}
	public function sendMessage()
	{
	//sleep(6);
	 $config=$this->model->apiFinder(1);
	$instance=$config[0]->instance;
	$token=$config[0]->token;
	$location='./upload/';
	$message=$_POST['message'];
	$filename=$_FILES['image']['name'];
	$file_tmp=$_FILES['image']['tmp_name'];
	move_uploaded_file($file_tmp,$location.$filename);
	$apiURL = 'https://api.chat-api.com/'.$instance;
  	foreach($contact as $contact):
  	$data = json_encode(array(
    'phone'=>$contact->mobno,
    'body'=>base_url().'upload/'.$filename,//FULL PATH and file name
    'filename'=>$filename,
    'caption'=>$message
	));
	$url = $apiURL.'sendFile?token='.$token;
	$options = stream_context_create(['http' => [
    'method'  => 'POST',
    'header'  => 'Content-type: application/json',
    'content' => $data
	]
	]);
	$response = file_get_contents($url,false,$options);
      print_r($response);
  	endforeach;
      die;
	$this->session->set_flashdata('msg', "Messsage sent successfully."); 
	redirect(base_url().'admin/whatsapp');
	//new code
	$contact=$this->model->contactFinder();
	$location='./upload/';
	$message=$_POST['message'];
	$filename=$_FILES['image']['name'];
	$file_tmp=$_FILES['image']['tmp_name'];
	move_uploaded_file($file_tmp,$location.$filename);
	//Whatsapp API
	$apiURL = 'https://api.chat-api.com/'.$instance;
$token = $token;
  foreach($contact as $contact):
  	$data = json_encode(array(
//'chatId'=>$contact->mobno.'@c.us',
      'phone'=>$contact->mobno,
    'body'=>'http://mrsanitize.in/whatsapp/upload/'.$filename,//FULL PATH and file name
    'filename'=>$filename,
    'caption'=>$message
));

$url = $apiURL.'sendFile?token='.$token;
$options = stream_context_create(['http' => [
    'method'  => 'POST',
    'header'  => 'Content-type: application/json',
    'content' => $data
]
]);
$response = file_get_contents($url,false,$options);
print_r($response);
  endforeach;
  //19 Nov 2021
  
}
	//12 Nov, 2021
	public function api()
	{
	 $data['chat_api']=$this->model->apiFinder(1);
	  $this->load->view('admin/header');
	  $this->load->view('admin/sidebar'); 
	  $this->load->view('admin/api',$data); 
	  $this->load->view('admin/footer');
	}
	public function editapi($id)
	{
	$data['chat_api']=$this->model->apiFinder($id);
	  $this->load->view('admin/header');
	  $this->load->view('admin/sidebar'); 
	  $this->load->view('admin/editapi',$data); 
	  $this->load->view('admin/footer');
	}
	public function updateAPI($id)
	{
		$instance=$this->input->post('instance');
		$token=$this->input->post('token');
		$data=array(
			'instance'=>$instance,
			'token'=>$token
		);
		if($this->model->updateAPI($data,$id)):
			$this->session->set_flashdata('msg','API updated successfully');
			return redirect(base_url().'admin/api');
		else:
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/api');	
		endif;
	}
	public function textmsg()
	{
		$this->check_login();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/textmsg');
		$this->load->view('admin/footer');
	}
	public function sendTextMessage()
	{
      $config=$this->model->apiFinder(1);
	$instanceId=$config[0]->instance;
	$token=$config[0]->token;
     $contact=$this->model->contactFinder();
	$message=$_POST['message'];
      foreach($contact as $contact):
      $url = 'https://api.chat-api.com/'.$instanceId.'/message?token='.$token;
     $data = [
    'phone' => $contact->mobno, // Receivers phone
    'body' => $message, // Message
];
$json = json_encode($data); 
$options = stream_context_create(['http' => [
        'method'  => 'POST',
        'header'  => 'Content-type: application/json',
        'content' => $json
    ]
]);
// Send a request
$result = file_get_contents($url, false, $options);
     // print_r($result);
      endforeach;
      $this->session->set_flashdata('msg', "Messsage sent successfully."); 
		redirect(base_url().'admin/textmsg');
	}
	//06 April, 2022
	public function partnerFinder()
	{
		$this->check_login();
		$data['partner']=$this->model->partnerFinder();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/partner_list',$data);
		$this->load->view('admin/footer');
	}
	public function mfaKYCRequest()
	{
		$this->check_login();
		$data['kyc_request']=$this->model->mfaKYCRequest();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/mfa_kyc_request',$data);
		$this->load->view('admin/footer');
	}
	public function faKYCRequest()
	{
		$this->check_login();
		$data['kyc_request']=$this->model->faKYCRequest();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/fa_kyc_request',$data);
		$this->load->view('admin/footer');
	}
	public function changeKYCStatus($id)
	{
		$status=$this->input->post('status');
		$data=array(
			'kyc_status'=>$status
		);
		if($this->model->changeKYCStatus($data,$id)):
			$this->session->set_flashdata('msg','Status changed successfully');
			return redirect(base_url().'admin/mfaKYCRequest');
		else:
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/mfaKYCRequest');	
		endif;
	}
	public function changeKYCStatusFA($id)
	{
		$status=$this->input->post('status');
		$data=array(
			'kyc_status'=>$status
		);
		if($this->model->changeKYCStatusFA($data,$id)):
			$this->session->set_flashdata('msg','Status changed successfully');
			return redirect(base_url().'admin/faKYCRequest');
		else:
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/faKYCRequest');	
		endif;
	}
	public function addReferralPartner()
	{
		$name=$this->input->post('name');
		$mobno=$this->input->post('mobno');
		$email=$this->input->post('email');
		$address=$this->input->post('address');
		$password=$this->input->post('password');
		$data=array(
			'name'=>$name,
			'mobno'=>$mobno,
			'email'=>$email,
			'address'=>$address,
			'password'=>$password			
		);
		if($this->model->addReferralPartner($data)):
			$this->session->set_flashdata('msg','Referral Partner added successfully.');
			return redirect(base_url().'admin/partnerFinder');
		else:
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/partnerFinder');	
		endif;
	}
	//07 April, 2022
	public function deletePartner($id)
	{
		if($this->model->deletePartner($id)):
			$this->session->set_flashdata('msg','Referral Partner deleted successfully.');
			return redirect(base_url().'admin/partnerFinder');
		else:
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/partnerFinder');	
		endif;
	}
	public function classFinder()
	{
		$data['classes']=$this->model->classFinder();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/classes',$data);
		$this->load->view('admin/footer');
	}
	public function deleteClass($id)
	{
		if($this->model->deleteClass($id)):
			$this->session->set_flashdata('msg','Class deleted successfully.');
			return redirect(base_url().'admin/classFinder');
		else:
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/classFinder');	
		endif;
	}
	public function addClass()
	{
		$class_name=$this->input->post('class_name');
		$price=$this->input->post('price');
		//$partner_price=$this->input->post('partner_price');
		$data=array(
			'class_name'=>$class_name,
			'price'=>$price
			// 'partner_price'=>$partner_price
		);
		if($this->model->addClass($data)):
			$this->session->set_flashdata('msg','Class added successfully.');
			return redirect(base_url().'admin/classFinder');
		else:
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/classFinder');	
		endif;
	}
	public function assign_course()
	{
		$data['classes']=$this->model->classFinder();
		$data['partner']=$this->model->partnerFinder();
		$data['assign_course']=$this->model->assignCourseFinder();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/assign_course',$data);
		$this->load->view('admin/footer');
	}
	public function assignCourse()
	{
		$course_id=$this->input->post('course_id');
		$partner_id=$this->input->post('partner_id');
		$assign_price=$this->input->post('assign_price');
		$data=array(
			'course_id'=>$course_id,
			'partner_id'=>$partner_id,
			'assign_price'=>$assign_price,
			'code'=>'CTRP'.$partner_id.$course_id
		);
		if($this->model->isAlreadyAssign($course_id,$partner_id) > 0):
			$this->session->set_flashdata('msg','Already Assigned.');
			return redirect(base_url().'admin/assign_course');
		else:
		if($this->model->assignCourse($data)):
			$this->session->set_flashdata('msg','Assigned  successfully.');
			return redirect(base_url().'admin/assign_course');
		else:
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/assign_course');	
		endif;
		endif;
	}
	public function deleteAssignCourse($id)
	{
		if($this->model->deleteAssignCourse($id)):
			$this->session->set_flashdata('msg','Deleted successfully.');
			return redirect(base_url().'admin/assign_course');
		else:
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/assign_course');	
		endif;
	}
	//08 Apr, 2022
	public function enquiry()
	{
		$this->check_login();
		$data['enquiry']=$this->model->enquiryFinder();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/enquiry',$data);
		$this->load->view('admin/footer');
	}
	public function deleteEnquiry($id)
	{
		if($this->model->deleteEnquiry($id)):
			$this->session->set_flashdata('msg','Enquiry deleted successfully.');
			return redirect(base_url().'admin/enquiry');
		else:
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/enquiry');	
		endif;
	}
	public function studentFinder()
	{
		$this->check_login();
		$data['student']=$this->model->studentFinder();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/student',$data);
		$this->load->view('admin/footer');
	}
	public function deleteStudent($id)
	{
		if($this->model->deleteStudent($id)):
			$this->session->set_flashdata('msg','Student deleted successfully.');
			return redirect(base_url().'admin/studentFinder');
		else:
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/studentFinder');	
		endif;
	}
	public function createStudent()
	{
		$this->check_login();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/create_student');
		$this->load->view('admin/footer');
	}
	public function addStudent()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[student.email]|valid_email');
		if($this->form_validation->run()):
			$name=$this->input->post('name');
			$email=$this->input->post('email');
			$password=$this->input->post('password');
			$data=array(
				'name'=>$name,
				'email'=>$email,
				'password'=>$password,
			);
			if($this->model->addStudent($data)):
				$this->session->set_flashdata('msg','Student added successfully.');
				return redirect(base_url().'admin/createStudent');
			else:
				$this->session->set_flashdata('msg','Something went wrong');
				return redirect(base_url().'admin/createStudent');	
			endif;
		else:
			$this->createStudent();
		endif;
	}
	public function RaiseTicket()
	{
		$this->check_login();
		$data['raise_ticket']=$this->model->RaiseTicket();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/raise_ticket',$data);
		$this->load->view('admin/footer');
	}
	public function replyRaiseTicket($id)
	{
		$this->check_login();
		$data['raise_ticket']=$this->model->getRaiseTicketByID($id);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/reply_raise_ticket',$data);
		$this->load->view('admin/footer');
	}
	public function handleRaiseTicketReply()
	{
		$id=$this->input->post('id');
		$type=$this->input->post('type');
		$reply=$this->input->post('reply');
		$data=array(
			'reply'=>$reply
		);
		if($this->model->handleRaiseTicketReply($data,$id)):
			$this->session->set_flashdata('msg','Raise Ticket Replied Successfully.');
			return redirect(base_url().'admin/RaiseTicket');
		else:
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/RaiseTicket');	
		endif;
	}
	public function blog()
	{
		$this->check_login();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/blog');
		$this->load->view('admin/footer');
	}
	public function addBlog()
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('description', 'Description', 'required');
		 if ($this->form_validation->run() && $this->upload->do_upload('image')):
		 	$title=$this->input->post('title');
			$description=$this->input->post('description');
			$image=$this->upload->data();
			$image_path="upload/".$image['raw_name'].$image['file_ext'];
			$data=array(
					 'title'=>$title,
					 'description'=>$description,
					 'image'=>$image_path
					 );
			if($this->model->addBlog($data)):
				 $this->session->set_flashdata('msg', "Blog Posted Successfully."); 
   				 redirect(base_url().'admin/blog');
			else:
				$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
   				 redirect(base_url().'admin/blog');
			endif;
		 else:
		 	$data['upload_error']=$this->upload->display_errors('<p class="text-danger">', '</p>');
		 	$this->load->view('admin/header');
		 	$this->load->view('admin/sidebar');
			$this->load->view('admin/blog',$data);
			$this->load->view('admin/footer');
		 endif;
	}
	public function blog_list()
	{
		$this->check_login();
		$data['blog']=$this->model->blogFinder();
		$this->load->view('admin/header');
	 	$this->load->view('admin/sidebar');
		$this->load->view('admin/blog_list',$data);
		$this->load->view('admin/footer');
	}
	public function deleteBlog($id)
	{
		$this->check_login();
		$data=$this->model->blogFinder($id);
		$image=$data[0]->image;
		if(file_exists($image)):
			unlink($image);
		endif;
		if($this->model->deleteBlog($id)):
			 $this->session->set_flashdata('msg', "Blog deleted Successfully."); 
				 redirect(base_url().'admin/blog_list');
		else:
			$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
				 redirect(base_url().'admin/blog_list');
		endif;
	}
	//09 Apr, 2022
	public function editBlog($id)
	{
		$this->check_login();
		$data['blog']=$this->model->blogFinder($id);
		$this->load->view('admin/header');
	 	$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_blog',$data);
		$this->load->view('admin/footer');
	}
	public function updateBlog($id)
	{
		$old_data=$this->model->blogFinder($id);
		$old_image=$old_data[0]->image;
		 if($this->upload->do_upload('image')):
		 	if(file_exists($old_image)):
			unlink($old_image);
			endif;
		 $image=$this->upload->data();
		 $image_path="upload/".$image['raw_name'].$image['file_ext'];
		 else:
		 $image_path=$old_image;
		 endif;
	 	$title=$this->input->post('title');
		$description=$this->input->post('description');
		$data=array(
				 'title'=>$title,
				 'description'=>$description,
				 'image'=>$image_path
				 );
		if($this->model->updateBlog($data,$id)):
			 $this->session->set_flashdata('msg', "Blog updated Successfully."); 
				 redirect(base_url().'admin/blog_list');
		else:
			$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
				 redirect(base_url().'admin/blog_list');
		endif;
	}
	public function editStudent($id)
	{
		$this->check_login();
		$data['student']=$this->model->studentFinder($id);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_student',$data);
		$this->load->view('admin/footer');
	}
	public function studentUpdater($id)
	{
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$mobno=$this->input->post('mobno');
		$address=$this->input->post('address');
		$city=$this->input->post('city');
		$state=$this->input->post('state');
		$pincode=$this->input->post('pincode');
		$dob=$this->input->post('dob');
		$password=$this->input->post('password');
		$data=array(
			'name'=>$name,
			'email'=>$email,
			'mobno'=>$mobno,
			'address'=>$address,
			'city'=>$city,
			'state'=>$state,
			'pincode'=>$pincode,
			'dob'=>$dob,
			'password'=>$password
		);
		if($this->model->studentUpdater($data,$id)):
			 $this->session->set_flashdata('msg', "Student updated Successfully."); 
				 redirect(base_url().'admin/studentFinder');
		else:
			$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
				 redirect(base_url().'admin/studentFinder');
		endif;
	}
	public function testimonial()
	{
		$this->check_login();
		$this->load->view('admin/header');
	 	$this->load->view('admin/sidebar');
		$this->load->view('admin/testimonial');
		$this->load->view('admin/footer');
	}
	public function addTestimonial()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('designation', 'Designation', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('description', 'Description', 'required');
		 if ($this->form_validation->run() && $this->upload->do_upload('image')):
		 	$name=$this->input->post('name');
		 	$designation=$this->input->post('designation');
			$description=$this->input->post('description');
			$image=$this->upload->data();
			$image_path="upload/".$image['raw_name'].$image['file_ext'];
			$data=array(
					 'name'=>$name,
					 'designation'=>$designation,
					 'description'=>$description,
					 'image'=>$image_path
					 );
			if($this->model->addTestimonial($data)):
				 $this->session->set_flashdata('msg', "Testimonial added Successfully."); 
   				 redirect(base_url().'admin/testimonial');
			else:
				$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
   				 redirect(base_url().'admin/testimonial');
			endif;
		 else:
		 	$data['upload_error']=$this->upload->display_errors('<p class="text-danger">', '</p>');
		 	$this->load->view('admin/header');
		 	$this->load->view('admin/sidebar');
			$this->load->view('admin/testimonial',$data);
			$this->load->view('admin/footer');
		 endif;
	}
	public function testimonial_list()
	{
		$this->check_login();
		$data['testimonial']=$this->model->testimonialFinder();
		$this->load->view('admin/header');
	 	$this->load->view('admin/sidebar');
		$this->load->view('admin/testimonial_list',$data);
		$this->load->view('admin/footer');
	}
	public function deleteTestimonial($id)
	{
		$data=$this->model->testimonialFinder($id);
		$image=$data[0]->image;
		if(file_exists($image)):
			unlink($image);
		endif;	
		if($this->model->deleteTestimonial($id)):
			 $this->session->set_flashdata('msg', "Testimonial deleted Successfully."); 
				 redirect(base_url().'admin/testimonial_list');
		else:
			$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
				 redirect(base_url().'admin/testimonial_list');
		endif;
	}
	public function editTestimonial($id)
	{
		$this->check_login();
		$data['testimonial']=$this->model->testimonialFinder($id);
		$this->load->view('admin/header');
	 	$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_testimonial',$data);
		$this->load->view('admin/footer');
	}
	public function updateTestimonial($id)
	{
		$this->check_login();
		$old_data=$this->model->testimonialFinder($id);
		$old_image=$old_data[0]->image;
		if($this->upload->do_upload('image')):
			if(file_exists($old_image)):
				unlink($old_image);
			endif;
		$image=$this->upload->data();
		$image_path="upload/".$image['raw_name'].$image['file_ext'];
		else:
		$image_path=$old_image;
		endif;
		$name=$this->input->post('name');
	 	$designation=$this->input->post('designation');
		$description=$this->input->post('description');
		$data=array(
					 'name'=>$name,
					 'designation'=>$designation,
					 'description'=>$description,
					 'image'=>$image_path
					 );
		if($this->model->updateTestimonial($data,$id)):
			 $this->session->set_flashdata('msg', "Testimonial updated Successfully."); 
				 redirect(base_url().'admin/testimonial_list');
		else:
			$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
				 redirect(base_url().'admin/testimonial_list');
		endif;
	}
	//13 Arp,2022
	public function company_list()
	{
		$this->check_login();
		$data['company_list']=$this->model->companyFinder();
		$this->load->view('admin/header');
	 	$this->load->view('admin/sidebar');
		$this->load->view('admin/company_list',$data);
		$this->load->view('admin/footer');
	}
	public function addCompany()
	{
		$data=$this->input->post();
		if($this->model->addCompany($data)):
			 $this->session->set_flashdata('msg', "Company added Successfully."); 
				 redirect(base_url().'admin/company_list');
		else:
			$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
				 redirect(base_url().'admin/company_list');
		endif;
	}
	public function deleteCompany($id)
	{
		$this->check_login();
		if($this->model->deleteCompany($id)):
			 $this->session->set_flashdata('msg', "Company deleted Successfully."); 
				 redirect(base_url().'admin/company_list');
		else:
			$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
				 redirect(base_url().'admin/company_list');
		endif;
	}
	public function product_list()
	{
		$this->check_login();
		$data['company_list']=$this->model->companyFinder();
		$data['product_list']=$this->model->productFinder();
		$this->load->view('admin/header');
	 	$this->load->view('admin/sidebar');
		$this->load->view('admin/product_list',$data);
		$this->load->view('admin/footer');
	}
	public function addProduct()
	{
		$data=$this->input->post();
		if($this->model->addProduct($data)):
			 $this->session->set_flashdata('msg', "Product added Successfully."); 
				 redirect(base_url().'admin/product_list');
		else:
			$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
				 redirect(base_url().'admin/product_list');
		endif;
	}
	public function deleteProduct($id)
	{
		if($this->model->deleteProduct($id)):
			 $this->session->set_flashdata('msg', "Product deleted Successfully."); 
				 redirect(base_url().'admin/product_list');
		else:
			$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
				 redirect(base_url().'admin/product_list');
		endif;
	}
	public function mfa_list()
	{
		$this->check_login();
		$data['mfa_list']=$this->model->mfaFinder();
		$this->load->view('admin/header');
	 	$this->load->view('admin/sidebar');
		$this->load->view('admin/mfa_list',$data);
		$this->load->view('admin/footer');
	}
	public function addMFA()
	{
		$data=$this->input->post();
		if($this->model->addMFA($data)):
			 $this->session->set_flashdata('msg', "MFA added Successfully."); 
				 redirect(base_url().'admin/mfa_list');
		else:
			$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
				 redirect(base_url().'admin/mfa_list');
		endif;
	}
	public function deleteMFA($id)
	{
		if($this->model->deleteMFA($id)):
			 $this->session->set_flashdata('msg', "MFA deleted Successfully."); 
				 redirect(base_url().'admin/mfa_list');
		else:
			$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
				 redirect(base_url().'admin/mfa_list');
		endif;
	}
	// 15 apr, 2022
	public function deleteRaisedTicket($id)
	{
		if($this->model->deleteRaisedTicket($id)):
			 $this->session->set_flashdata('msg', "Ticket deleted Successfully."); 
				 redirect(base_url().'admin/RaiseTicket');
		else:
			$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
				 redirect(base_url().'admin/RaiseTicket');
		endif;
	} 
	public function fa_list()
	{
		$this->check_login();
		$data['mfa_list']=$this->model->mfaFinder();
		$data['fa_list']=$this->model->faFinder();
		$this->load->view('admin/header');
	 	$this->load->view('admin/sidebar');
		$this->load->view('admin/fa_list',$data);
		$this->load->view('admin/footer');
	}
	public function addFA()
	{
		$data=$this->input->post();
		if($this->model->addFA($data)):
			 $this->session->set_flashdata('msg', "FA added Successfully."); 
				 redirect(base_url().'admin/fa_list');
		else:
			$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
				 redirect(base_url().'admin/fa_list');
		endif;
	}
	public function mfa_announcement()
	{
		$this->check_login();
		$data['mfa_announcement']=$this->model->mfaAnnouncementFinder();
		$this->load->view('admin/header');
	 	$this->load->view('admin/sidebar');
		$this->load->view('admin/mfa_announcement',$data);
		$this->load->view('admin/footer');
	}
	public function addMfaAnnouncement()
	{
		$announcement=$this->input->post('announcement');
		$type=$this->input->post('type');
		$data=array(
			'announcement'=>$announcement,
			'type'=>$type
		);
		if($this->model->addMfaAnnouncement($data)):
			 $this->session->set_flashdata('msg', "MFA announcement created Successfully."); 
				 redirect(base_url().'admin/mfa_announcement');
		else:
			$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
				 redirect(base_url().'admin/mfa_announcement');
		endif;
	}
	public function addFaAnnouncement()
	{
		$announcement=$this->input->post('announcement');
		$type=$this->input->post('type');
		$data=array(
			'announcement'=>$announcement,
			'type'=>$type
		);
		if($this->model->addFaAnnouncement($data)):
			 $this->session->set_flashdata('msg', "FA announcement created Successfully."); 
				 redirect(base_url().'admin/fa_announcement');
		else:
			$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
				 redirect(base_url().'admin/fa_announcement');
		endif;
	}
	public function deleteMfaAnnouncement($id)
	{
		if($this->model->deleteMfaAnnouncement($id)):
			 $this->session->set_flashdata('msg', "MFA announcement deleted Successfully."); 
				 redirect(base_url().'admin/mfa_announcement');
		else:
			$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
				 redirect(base_url().'admin/mfa_announcement');
		endif;
	}
	public function fa_announcement()
	{
		$this->check_login();
		$data['fa_announcement']=$this->model->faAnnouncementFinder();
		$this->load->view('admin/header');
	 	$this->load->view('admin/sidebar');
		$this->load->view('admin/fa_announcement',$data);
		$this->load->view('admin/footer');
	}
	public function deleteFaAnnouncement($id)
	{
		if($this->model->deleteFaAnnouncement($id)):
			 $this->session->set_flashdata('msg', "FA announcement deleted Successfully."); 
				 redirect(base_url().'admin/fa_announcement');
		else:
			$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
				 redirect(base_url().'admin/fa_announcement');
		endif;
	}
	public function lead_list()
	{
		$this->check_login();
		$data['lead_list']=$this->model->leadFinder();
		$this->load->view('admin/header');
	 	$this->load->view('admin/sidebar');
		$this->load->view('admin/lead_list',$data);
		$this->load->view('admin/footer');
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
		$data=array(
			'concern_name'=>$concern_name,
			'company_name'=>$company_name,
			'mobno'=>$mobno,
			'email'=>$email,
			'address'=>$address,
			'city'=>$city,
			'state'=>$state,
			'status'=>$status,
			'type'=>$type
		);
		if($this->model->addLead($data)):
			 $this->session->set_flashdata('msg', "Lead added Successfully."); 
				 redirect(base_url().'admin/lead_list');
		else:
			$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
				 redirect(base_url().'admin/lead_list');
		endif;
	}
	public function changeLeadStatus()
	{
		$status=$this->input->post('status');
		$id=$this->input->post('id');
		if(!empty($status)):
			if($this->model->changeLeadStatus($status,$id)):
			 $this->session->set_flashdata('msg', "Lead status changed Successfully."); 
				 redirect(base_url().'admin/lead_list');
			else:
				$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
					 redirect(base_url().'admin/lead_list');
			endif;
		else:
			$this->session->set_flashdata('msg', "Please select status."); 
				 redirect(base_url().'admin/lead_list');
		endif;
	}
	// 18 Apr, 2022
	public function portfolio()
	{
		$this->check_login();
		$this->load->view('admin/header');
	 	$this->load->view('admin/sidebar');
		$this->load->view('admin/portfolio');
		$this->load->view('admin/footer');
	}
	public function addPortfolio()
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('link', 'Link', 'required');
		 if ($this->form_validation->run() && $this->upload->do_upload('image')):
		 	$title=$this->input->post('title');
			$link=$this->input->post('link');
			$image=$this->upload->data();
			$image_path="upload/".$image['raw_name'].$image['file_ext'];
			$data=array(
					 'title'=>$title,
					 'link'=>$link,
					 'image'=>$image_path
					 );
			if($this->model->addPortfolio($data)):
				 $this->session->set_flashdata('msg', "Portfolio added Successfully."); 
   				 redirect(base_url().'admin/portfolio');
			else:
				$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
   				 redirect(base_url().'admin/portfolio');
			endif;
		 else:
		 	$data['upload_error']=$this->upload->display_errors('<p class="text-danger">', '</p>');
		 	$this->load->view('admin/header');
		 	$this->load->view('admin/sidebar');
			$this->load->view('admin/portfolio',$data);
			$this->load->view('admin/footer');
		 endif;
	}
	public function portfolio_list()
	{
		$this->check_login();
		$data['portfolio']=$this->model->portfolioFinder();
		$this->load->view('admin/header');
	 	$this->load->view('admin/sidebar');
		$this->load->view('admin/portfolio_list',$data);
		$this->load->view('admin/footer');
	}
	public function deletePortfolio($id)
	{
		$data=$this->model->portfolioFinder($id);
		$image=$data[0]->image;
		if(file_exists($image)):
			unlink($image);
		endif;
		if($this->model->deletePortfolio($id)):
			 $this->session->set_flashdata('msg', "Portfolio deleted Successfully."); 
				 redirect(base_url().'admin/portfolio_list');
		else:
			$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
				 redirect(base_url().'admin/portfolio_list');
		endif;
	}
	public function editPortfolio($id)
	{
		$this->check_login();
		$data['portfolio']=$this->model->portfolioFinder($id);
		$this->load->view('admin/header');
	 	$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_portfolio',$data);
		$this->load->view('admin/footer');
	}
	public function updatePortfolio($id)
	{
		$this->check_login();
		$old_data=$this->model->portfolioFinder($id);
		$old_image=$old_data[0]->image;
		 if($this->upload->do_upload('image')):
		 	if(file_exists($old_image)):
			unlink($old_image);
			endif;
		 $image=$this->upload->data();
		 $image_path="upload/".$image['raw_name'].$image['file_ext'];
		 else:
		 $image_path=$old_image;
		 endif;
	 	$title=$this->input->post('title');
		$link=$this->input->post('link');
		$data=array(
				 'title'=>$title,
				 'link'=>$link,
				 'image'=>$image_path
				 );
		if($this->model->updatePortfolio($data,$id)):
			 $this->session->set_flashdata('msg', "Portfolio updated Successfully."); 
				 redirect(base_url().'admin/portfolio_list');
		else:
			$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
				 redirect(base_url().'admin/portfolio_list');
		endif;
	}
	public function team()
	{
		$this->load->view('admin/header');
	 	$this->load->view('admin/sidebar');
		$this->load->view('admin/team');
		$this->load->view('admin/footer');
	}
	public function addTeam()
	{
		$this->form_validation->set_rules('name', 'name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('designation', 'Link', 'required');
		 if ($this->form_validation->run() && $this->upload->do_upload('image')):
		 	$name=$this->input->post('name');
			$designation=$this->input->post('designation');
			$fb=$this->input->post('fb');
			$insta=$this->input->post('insta');
			$twitter=$this->input->post('twitter');
			$linkedin=$this->input->post('linkedin');
			$image=$this->upload->data();
			$image_path="upload/".$image['raw_name'].$image['file_ext'];
			$data=array(
					 'name'=>$name,
					 'designation'=>$designation,
					 'fb'=>$fb,
					 'insta'=>$insta,
					 'twitter'=>$twitter,
					 'linkedin'=>$linkedin,
					 'image'=>$image_path
					 );
			if($this->model->addTeam($data)):
				 $this->session->set_flashdata('msg', "Team added Successfully."); 
   				 redirect(base_url().'admin/team');
			else:
				$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
   				 redirect(base_url().'admin/team');
			endif;
		 else:
		 	$data['upload_error']=$this->upload->display_errors('<p class="text-danger">', '</p>');
		 	$this->load->view('admin/header');
		 	$this->load->view('admin/sidebar');
			$this->load->view('admin/team',$data);
			$this->load->view('admin/footer');
		 endif;
	}
	public function team_list()
	{
		$this->check_login();
		$data['team']=$this->model->teamFinder();
		$this->load->view('admin/header');
	 	$this->load->view('admin/sidebar');
		$this->load->view('admin/team_list',$data);
		$this->load->view('admin/footer');
	}
	public function deleteTeam($id)
	{
		$this->check_login();
		$data=$this->model->teamFinder($id);
		$image=$data[0]->image;
		if(file_exists($image)):
			unlink($image);
		endif;
		if($this->model->deleteTeam($id)):
			 $this->session->set_flashdata('msg', "Team deleted Successfully."); 
				 redirect(base_url().'admin/team_list');
		else:
			$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
				 redirect(base_url().'admin/team_list');
		endif;
	}
	public function editTeam($id)
	{
		$data['team']=$this->model->teamFinder($id);
		$this->load->view('admin/header');
	 	$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_team',$data);
		$this->load->view('admin/footer');
	}
	public function updateTeam($id)
	{
		$old_data=$this->model->teamFinder($id);
		$old_image=$old_data[0]->image;
		 if($this->upload->do_upload('image')):
		 	if(file_exists($old_image)):
			unlink($old_image);
			endif;
		 $image=$this->upload->data();
		 $image_path="upload/".$image['raw_name'].$image['file_ext'];
		 else:
		 $image_path=$old_image;
		 endif;
	 		$name=$this->input->post('name');
			$designation=$this->input->post('designation');
			$fb=$this->input->post('fb');
			$insta=$this->input->post('insta');
			$twitter=$this->input->post('twitter');
			$linkedin=$this->input->post('linkedin');
		$data=array(
				 'name'=>$name,
				 'designation'=>$designation,
				 'fb'=>$fb,
				 'insta'=>$insta,
				 'twitter'=>$twitter,
				 'linkedin'=>$linkedin,
				 'image'=>$image_path
				 );
		if($this->model->updateTeam($data,$id)):
			 $this->session->set_flashdata('msg', "Team updated Successfully."); 
				 redirect(base_url().'admin/team_list');
		else:
			$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
				 redirect(base_url().'admin/team_list');
		endif;
	}
	//25 Apr, 2022
	//https://boxoutsolution.com/api/contact/contact_list
	public function boxoutsolution_enquiry()
	{
		$curl = curl_init();
		$url = "https://boxoutsolution.com/api/contact/contact_list";
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$curl_data = curl_exec($curl);
		curl_close($curl);
		$response_data = json_decode($curl_data);
		$data['enquiry']=$response_data->data;
		$this->load->view('admin/header');
	 	$this->load->view('admin/sidebar');
		$this->load->view('admin/boxout',$data);
		$this->load->view('admin/footer');
	}
	
}












