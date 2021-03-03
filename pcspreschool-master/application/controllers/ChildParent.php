<?php

class ChildParent extends CI_Controller{


	function __construct(){

	  parent::__construct();
	  
		$this->load->model("Parent_model","mypm");
		$this->load->model("Child_model","mycm");
		$this->load->model("Staff_model","mysm");
		$this->load->model("Login_model","mylm");
		$this->output->enable_profiler(TRUE);

		
	}
	
	function index(){
		if(!($this->session->has_userdata("parent_id"))){
			
			redirect("parent/login");
			
		}
		else{
			redirect("parent/home");
		}
	}
	
	function login(){
		
		$this->load->view("parent/login");
		
	}
	
	
	function loginParent(){
		
		$loginData=$this->input->post();
		$this->form_validation->set_rules("loginUniq","Phone/Email","trim|required",array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules("password","Password","trim|required",array('required' => 'You must provide a %s.'));
		if ($this->form_validation->run() == false)
		{		$this->session->set_flashdata('valid_error',validation_errors());
				redirect("parent/login");
		}
		else{
			$parentData=$this->mylm->loginParent($loginData);
			//can be replaced 
			if($parentData){
				$returnedChildData=$this->mypm->getParentChild($parentData["preschool_id"],$parentData["parent_id"]);
				$parentData["childData"]=array_merge_recursive(...$returnedChildData);
				$this->session->set_userdata($parentData);
				redirect("parent/home");
			}else{
				$this->session->set_flashdata('valid_error',"Password or Email is Wrong.<br/>If problem persists Contact Support");
				redirect("parent/login");
			}
			
		}
		
		
	}
	
	function home(){
		$childData=$this->session->userdata("childData");
		
		$data["unseenNotes"]=$this->mycm->getChildNotesCount($this->session->userdata("preschool_id"),0,...$childData["id"])["notes_count"];
		$data["unseenPtm"]=$this->mypm->getPtmCount($this->session->userdata("preschool_id"))["ptm_count"];
		$data["calendarEvent"]=$this->mypm->getCalenderEventCount($this->session->userdata("preschool_id"))["event_count"];
		$data["childAttendance"]=null;
		foreach($this->session->userdata("childData")["id"] as $childId){
		$data["childAttendance"][]=$this->mycm->getChildAttendanceLimit($this->session->userdata('preschool_id'),$childId,10);
		}
		$this->load->view("parent/home",$data);		
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
	}

	function childAttendance(){
		$childId=$this->input->post("childId");
		$data["childAttendance"]=$this->mycm->getChildAttendance($this->session->userdata("preschool_id"),null,$childId);
		$this->load->view("parent/attendancecalender",$data);
		
		
	}

	function schoolptm(){
		$data["ptmData"]=$this->mypm->getPtm($this->session->userdata("preschool_id"));
		$this->load->view("parent/ptmcalender",$data);
		
	}
	
	function fees(){
		// I dont understand this
		$data["feesData"]=$this->mypm->getFeeStatus($this->session->userdata("preschool_id"),$this->session->userdata("parent_id"));
		$this->load->view("parent/feesinfo",$data);
		
	}
	
	function childDiary(){
		$data["notesData"]=array();
		foreach($this->session->userdata("childData") as $child){
		$data["notesData"][]=$this->mycm->getChildNotes($this->session->userdata("preschool_id"),$child["id"]);
		}
		
		$this->load->view("parent/diary",$data);
		
	}
	
	function childactivities(){
		$postDate=$this->input->post("view_date");
		$data["childDevelopment"]=array();
		$data["childFluid"]=array();
		$data["childFood"]=array();
		$data["childMood"]=array();
		$data["childSleep"]=array();
		$data["childToilet"]=array();
		foreach($this->session->userdata("childData") as $child){
			$data["childDevelopment"][]=$this->mycm->getChildDevelopment($this->session->userdata("preschool_id"),$postDate,$child["id"]);
			$data["childFluid"][]=$this->mycm->getChildFluid($this->session->userdata("preschool_id"),$postDate,$child["id"]);
			$data["childFood"][]=$this->mycm->getChildFood($this->session->userdata("preschool_id"),$postDate,$child["id"]);
			$data["childMood"][]=$this->mycm->getChildMood($this->session->userdata("preschool_id"),$postDate,$child["id"]);
			$data["childSleep"][]=$this->mycm->getChildSleep($this->session->userdata("preschool_id"),$postDate,$child["id"]);
			$data["childToilet"][]=$this->mycm->getChildToilet($this->session->userdata("preschool_id"),$postDate,$child["id"]);
		
		}
		
		$this->load->view("parent/childactivity");
		
	}
	
	function profile(){
		$this->load->view("parent/profile");
		
	}
	
	function updateProfilePic(){
		$parentImg=array();
		$parentImg["img"]=empty($_FILES['profileImg']['name'])?null:$this->uploadPicture("profileImg","parent","parent","profile");
		$this->mypm->updateParentData($this->session->userdata("parent_id"),$parentImg);
		redirect("profile");
	}		
	
	function changePassword(){
		$confpassword=$this->input->post("confPassword");
		
		$newpassword=$this->input->post("newpassword");
		
		if($this->mylm->confirmPassword($confpassword,"parent",$this->session->userdata("id"))){
			$this->mylm->setParentPassword($this->session->userdata("preschool_id"),$this->session->userdata("parent_id"),$newpassword);
			$this->session->set_flashdata("status","New Password set");

		}else{
			$this->session->set_flashdata("status","Password Does Not Match");
		}
		
		redirect("profile");
	}
	
	//Support
	private function uploadPicture($pic,$type,$nameConvention,$redirectLink){
	
	
			$config['upload_path']          = './uploads/img/'.$type;
			$config['allowed_types']        = 'gif|jpg|png|webp';
			$config['max_size']             = 2048;
			$config['max_width']            = 1024;
			$config['max_height']           = 1024;
			$config['file_name']			=$nameConvention.rand(0,999)."_".time();

			$this->upload->initialize($config);	
			
			if ( !$this->upload->do_upload($pic))
			{
					$this->session->set_flashdata('error',$this->upload->display_errors());
				
					redirect($redirectLink);
			}				
			else{
					return $this->upload->data('file_name');
				
			}

		
	}
	
	






}
?>