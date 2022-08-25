<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model','model');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>'); 
	}
	public function index()
	{
		$data['creative']=$this->model->creative();
		$this->load->view('home/header');
		$this->load->view('home/index',$data);
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
		$res=$this->model->finder('blog',$id);
		$data['og_image']=base_url().$res[0]->image;
		$data['og_title']=$res[0]->title;
		$data['og_description']=$res[0]->description;
		$data['og_url']=base_url('home/blog_info/'.$id);
		$data['blog']=$this->model->finder('blog',$id);
		$data['recent_blog']=$this->model->recentBlog();
		$this->load->view('home/header',$data);
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
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required');
		$this->form_validation->set_rules('message', 'Message', 'trim|required');
		if($this->form_validation->run()):
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
			include APPPATH . 'third_party/phpmailer/PHPMailerAutoload.php';//new
				$mail=new PHPMailer;
				$mail->Host='smtp.hostinger.com';
				$mail->Port=465;
				//$mail->isSMTP();
				$mail->SMTPAuth=true;
				$mail->SMTPSecure='tls';
				$mail->Username='support@chatresh.com';//sender
				$mail->Password='Adminctech@2233';//password here
				$mail->setFrom('support@chatresh.com','Chatresh Technologies Pvt Ltd');
				$mail->addAddress($email);//receiver
				$mail->addReplyTo('noReply@chatresh.com','noReply');
				$mail->isHTML(true);
				$mail->Subject='Thank You for enquiry with us.';
				$mail->Body='Thank You for contacting with us.,<br>Our team will contact you as soon as possible.<br><br><br>We will always happy to help you.';
				if(!$mail->send()):
				$this->session->set_flashdata('msg', "Your message sent successfully. Thank You.".$mail->ErrorInfo); 
							redirect(base_url().'contact-us');
				else:
					$this->session->set_flashdata('msg', "Your message sent successfully. Thank You."); 
							redirect(base_url().'contact-us');
				endif;
  // 	 	$this->session->set_flashdata('msg', "Your message sent successfully. Thank You");
		// return redirect(base_url().'contact-us');
		else:
		$this->session->set_flashdata('msg', "Something went wrong. Try again.");
		return redirect(base_url().'contact-us');
		endif;
		else:
			$this->contact();
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
		//$this->load->view('home/promo_code',$data);
		$this->load->view('home/qr_code');
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
	//16 May, 2022
	public function career()
	{
		$data['career']=$this->model->career();
  	 	$this->load->view('home/header');
		$this->load->view('home/career',$data);
		$this->load->view('home/footer');
	}
	public function apply_job($id='')
	{
		if($id):
			$res=$this->model->jobExist($id);
			if($res>0):
			$res=$this->model->career($id);
			$data['job_title']=$res[0]->job_profile;
			$this->load->view('home/header');
			$this->load->view('home/job',$data);
			$this->load->view('home/footer');
			else:
				$this->career();
			endif;
		else:
			$this->career();
		endif;
	}
	public function submit_form()
	{
		$job_title=$this->input->post('job_title');
		$name=$this->input->post('name');
		$mobno=$this->input->post('mobno');
		$email=$this->input->post('email');
		$address=$this->input->post('address');
		$data=array(
			'job_title'=>$job_title,
			'name'=>$name,
			'mobno'=>$mobno,
			'email'=>$email,
			'address'=>$address
		);
		if($this->model->Creator('candidate',$data)):
  	 	$this->session->set_flashdata('msg', "Your form submitted successfully.");
		return redirect(base_url().'career');
		else:
		$this->session->set_flashdata('msg', "Something went wrong. Try again.");
		return redirect(base_url().'career');
		endif;
	}
	//22 june, 2022
	public function myPost()
	{
		$this->load->view('myPost');
	}
	public function loadData()
	{
		error_reporting(0);
		$page=$this->input->get('page');
		$start=$this->input->get('start');
		echo $this->model->loadData($page,$start);
	}
	//16 july, 2022
	public function info($url_slug)
	{
		$id=$this->model->findIdByUrlSlug($url_slug);
		$current_view=$this->model->blogCountFinder($id);
		$view=$current_view+1;
		$this->model->blogCountUpdater($id,$view);
		$res=$this->model->finder('blog',$id);
		$data['og_image']=base_url().$res[0]->image;
		$data['og_title']=$res[0]->title;
		$data['og_description']=$res[0]->description;
		$url_slug = url_title(strtolower($res[0]->title));
		$data['og_url']=base_url($url_slug);
		$data['blog']=$this->model->finder('blog',$id);
		$data['recent_blog']=$this->model->recentBlog();
		$this->load->view('home/header',$data);
		$this->load->view('home/blog_info',$data);
		$this->load->view('home/footer');
	}
	//18 july, 2022
	public function certificate()
	{

          $createimage = imagecreatefromjpeg(base_url('assets/home/img/about.jpg'));

          //this is going to be created once the generate button is clicked
          $output = "certificate.png";

          //then we make use of the imagecolorallocate inbuilt php function which i used to set color to the text we are displaying on the image in RGB format
          $white = imagecolorallocate($createimage, 205, 245, 255);
          $black = imagecolorallocate($createimage, 0, 0, 0);

          //Then we make use of the angle since we will also make use of it when calling the imagettftext function below
          $rotation = 0;

          //we then set the x and y axis to fix the position of our text name
          $origin_x = 100;
          $origin_y=160;
          
          $font_size = 10;
          
          $certificate_text = 'Player Of Code';

          //font directory for name
          $drFont = './system/fonts/texb.ttf';

          //function to display name on certificate picture
          $text1 = imagettftext($createimage, $font_size, $rotation, $origin_x, $origin_y, $black, $drFont, $certificate_text);
          imagepng($createimage,$output);
	
		echo '<img src="'.base_url().$output.'"/>';
			imagedestroy($createimage);
	}


}
