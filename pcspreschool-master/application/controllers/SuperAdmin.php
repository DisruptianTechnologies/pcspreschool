<?php

class SuperAdmin extends CI_Controller{


	function __construct(){

	  parent::__construct();
	  {
		$this->load->model("Parent_model","mypm");
		$this->load->model("Child_model","mycm");
		$this->load->model("Staff_model","mysm");
		$this->load->model("Login_model","mylm");
		$this->load->model("SuperAdmin_model","mysam");
		// $this->output->enable_profiler(TRUE);

	}
	
	}
	function index(){
		
		if($this->session->has_userdata("admin_id")){
			redirect("superadmin/home");
		}else{
			echo rand()."<br/>";
			redirect("superadmin/login");
		}
		
	}
	//Login
	function login(){
		$this->load->view("superadmin/login");		
		
	}
	
	function loginSuperAdmin(){
		
		$loginData=$this->input->post();
		$this->form_validation->set_rules("loginUniq","Phone/Email","trim|required",array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules("password","Password","trim|required",array('required' => 'You must provide a %s.'));
		if ($this->form_validation->run() == false)
		{		$this->session->set_flashdata('valid_error',validation_errors());
				redirect("superadmin/login");
		}
		else{
			$adminData=$this->mylm->loginSuperAdmin($loginData);
			//can be replaced 
			if(!!$adminData){
				$this->session->set_userdata($adminData);
				echo "<pre>";
				print_r($_SESSION);
				echo "</pre>";
				redirect("superadmin/home");
			}else{
				$this->session->set_flashdata('valid_error',"Validation Error has occured, Try again after few minutes.If problem persists Contact Support");
				redirect("superadmin/login");
			}
			
		}

		
	}
	
	function logout(){
		
		$this->session->sess_destroy();
		redirect("superadmin/login");
		
	}
	
	//Home
	function home(){
		$data["preschools"]=$this->mysam->getPreschoolsByStatus(ACTIVE);
		$this->load->view("superadmin/preschool/preschoolrecord",$data);
	
		// echo "<pre>";
		// print_r($_SESSION);
		// echo "</pre>";
	}
	



	//Staff
	function addAdmin($id){
	
		$this->load->view("superadmin/staff/addstaffrecord");
			
	}

	function addingStaff(){
		
		$arr_temp=explode("/",$this->agent->referrer());
		$postData=$this->input->post();
		$postData["dob"]=date("Y-m-d",strtotime($this->input->post("dob")));

		$postData["picture"]=($_FILES["picture"]["name"]==null)?null:uploadPicture("picture","./px-includes/staff/img/","staff","superadmin/addadmin");
		$postData["preschool_id"]=array_pop($arr_temp);
		$postData["role"]=ADMIN;
		$this->mysm->setStaffData($postData);
		redirect("superadmin/home");
		
	}
	
	function viewadmin($id){
		if($id==null){
		return EXIT_USER_INPUT;
		}
		$data["staff"]=$this->mysm->getStaffByRole($id,ADMIN);
		$this->load->view("superadmin/staff/staffrecord",$data);
		
	}

	function editadmin($id){
		$arr_temp=explode("/",$this->agent->referrer());
		$preschoolId=array_pop($arr_temp);
		if($id==null){
		return EXIT_USER_INPUT;
		}
		$data["staff"]=$this->mysm->getStaffData($preschoolId,$id);
		$this->load->view("superadmin/staff/editstaffrecord",$data);
		
	}
	
	
	function editingAdmin(){
		
		$arr_temp=explode("/",$this->agent->referrer());
		$postData=$this->input->post();
		$postData["dob"]=date("Y-m-d",strtotime($this->input->post("dob")));

		$postData["picture"]=($_FILES["picture"]["name"]==null)?null:uploadPicture("picture","./px-includes/staff/img/","staff","superadmin/addadmin");
		if($postData["picture"]==null){
			unset($postData["picture"]);
		}
		$id=array_pop($arr_temp);
		$this->mysm->updateStaffData($id,$postData);
		redirect("superadmin/home");
		
	}
	
	
	function changeStatusAdmin(){
		$adminId=$this->input->post("admin_id");
		$postData["employed"]=($this->input->post("emp_stat")==EMPLOYED)?UNEMPLOYED:EMPLOYED;
		$this->mysm->updateStaffData($adminId,$postData);
		redirect($this->agent->referrer());
		
		
	}
	// Preschool
	
	function addPreschool(){
		
		$this->load->view("superadmin/preschool/addpreschoolrecord");
	}

	function addingPreschool(){
	$postData["logo"]=empty($_FILES['logo']['name'])?null:uploadToGallery("logo","logo","superadmin/addpreschool");	
	$postData["name"]=$this->input->post("preschool_name");	
	$postData["address"]=$this->input->post("address");	
	$postData["country"]=$this->input->post("country");	
	$postData["state"]=$this->input->post("state");	
	$postData["zipcode"]=$this->input->post("zipcode");	
	$postData["smtp_mail_address"]=$this->input->post("smtp_mail");	
	$postData["paytm_merchant_id"]=$this->input->post("paytm_id");	
	$this->mysam->setPreschool($postData);
	redirect("superadmin/home");
	}

	function inactivePreschool(){
		$preschoolId=$this->input->post("preschool_id");
		$postData["active"]=INACTIVE;
		$this->mysm->updatePreschoolData($preschoolId,$postData);
		redirect($this->agent->referrer());
		
		
	}
	
	function deletedPreschool(){
		$data["preschools"]=$this->mysam->getPreschoolsByStatus(INACTIVE);
		$this->load->view("superadmin/preschool/deletedpreschoolrecord",$data);
		
	}
	
	function activePreschool(){
		$preschoolId=$this->input->post("preschool_id");
		$postData["active"]=ACTIVE;
		$this->mysm->updatePreschoolData($preschoolId,$postData);
		redirect($this->agent->referrer());
		
		
	}
	
	function editPreschool($id){
		$data["preschool"]=$this->mysam->getPreschools($id)[0];
		$this->load->view("superadmin/preschool/editpreschoolrecord",$data);
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		
	}
	
	function editingPreschool(){
		$arr_temp=explode("/",$this->agent->referrer());
		$preschoolId=array_pop($arr_temp);
		$postData["logo"]=empty($_FILES['logo']['name'])?null:uploadToGallery("logo","logo","superadmin/addpreschool");	
		$postData["name"]=$this->input->post("preschool_name");	
		$postData["address"]=$this->input->post("address");	
		$postData["country"]=$this->input->post("country");	
		$postData["state"]=$this->input->post("state");	
		$postData["zipcode"]=$this->input->post("zipcode");	
		$postData["smtp_mail_address"]=$this->input->post("smtp_mail");	
		$postData["paytm_merchant_id"]=$this->input->post("paytm_id");	
		if($postData["logo"]==null){
			unset($postData["logo"]);
		}
		$this->mysm->updatePreschoolData($preschoolId,$postData);
		redirect($this->agent->referrer());
		
	}
	
	
}
?>