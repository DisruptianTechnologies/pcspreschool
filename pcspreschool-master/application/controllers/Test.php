<?php

class Test extends CI_Controller{

	function __construct(){

	  parent::__construct();
	  {
		$this->load->model("Parent_model","mypm");
		$this->load->model("Child_model","mycm");
		$this->load->model("Staff_model","mysm");
		$this->load->model("SuperAdmin_model","mysam");
		$this->output->enable_profiler(TRUE);



	  }
	}

	public function index(){
	// $data["childDetails"]=$this->mycm->getChildData();
	// $data["childDetails"]=$this->mycm->getChildParent(1,1);
	// $data["childDetails"]=$this->mycm->getChildActivity(1,1);
	// $data=$this->mysm->updateAllParentFees(array("preschool_fees_type"=>1,"fees_last_date"=>"2020-09-10"),16);
	echo rand()."<br/>";
	$data["staff"]=$this->mysm->getStaffName(1,EMPLOYED);
	echo "<pre>";
	print_r($data);
	echo "</pre>";

	}

	public function createStaff(){
		echo rand()."<br/>";
		$postedData=array();
		$postedData["preschool_id"]=$this->input->post("preschool");
		$postedData["first_name"]=$this->input->post("f_name");
		$postedData["last_name"]=$this->input->post("l_name");
		$postedData["email"]=$this->input->post("staff_email");
		$postedData["phone_number"]=$this->input->post("staff_phno");
		$postedData["dob"]=$this->input->post("staff_dob");
		$postedData["gender"]=$this->input->post("staff_gender");
		$postedData["password"]=$postedData["phone_number"];
		echo json_encode($this->mysm->setStaffData($postedData["preschool_id"],$postedData),JSON_FORCE_OBJECT);
		
		
		
		
	}

	public function createSuperAdmin(){
		echo rand()."<br/>";
		$postedData=array();
		$postedData["first_name"]=$this->input->post("f_name");
		$postedData["last_name"]=$this->input->post("l_name");
		$postedData["email"]=$this->input->post("admin_email");
		$postedData["phone_number"]=$this->input->post("admin_phno");
		$postedData["dob"]=$this->input->post("admin_dob");
		$postedData["gender"]=$this->input->post("admin_gender");
		$postedData["password"]=$postedData["phone_number"];
		echo json_encode($this->mysam->setAdmin($postedData),JSON_FORCE_OBJECT);
		
		
		
		
	}

	public function chat(){
		$this->load->view("test/chat");
	}

}
?>