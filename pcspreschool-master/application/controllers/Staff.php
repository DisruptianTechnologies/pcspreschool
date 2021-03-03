<?php

class Staff extends CI_Controller{


	function __construct(){

	  parent::__construct();
	  {
		$this->load->model("Parent_model","mypm");
		$this->load->model("Child_model","mycm");
		$this->load->model("Staff_model","mysm");
		$this->load->model("Login_model","mylm");
		// $this->output->enable_profiler(TRUE);

	}
	
	}
	function index(){
		
		if($this->session->has_userdata("staff_id")){
		redirect("staff/home");
		}else{
		redirect("staff/login");
		}
		
	}
	
	function login(){
		
		$this->load->view("staff/login");
		
		
		
	}
	
	function loginStaff(){
		
		$loginData=$this->input->post();
		$this->form_validation->set_rules("loginUniq","Phone/Email","trim|required",array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules("password","Password","trim|required",array('required' => 'You must provide a %s.'));
		if ($this->form_validation->run() == false)
		{		$this->session->set_flashdata('valid_error',validation_errors());
				redirect("staff/login");
		}
		else{
			$staffData=$this->mylm->loginStaff($loginData);
			//can be replaced 
			if(!!$staffData){
				$this->session->set_userdata($staffData);
				redirect("staff/home");
			}else{
				$this->session->set_flashdata('valid_error',"Validation Error has occured, Try again after few minutes.If problem persists Contact Support");
				redirect("staff/login");
			}
			
		}

		
	}
	
	function home(){
		$date = new DateTime("now");
		$data["setting"]=$this->mysm->getPreschoolData($this->session->userdata("preschool_id"))[0];

		$data["childAttendanceStat"]=$this->mycm->getChildAttendanceCount($this->session->userdata("preschool_id"),$date->format('Y-m-d'));
		$data["childTotalCount"]=$this->mycm->getChildGraduatedCount($this->session->userdata("preschool_id"),UNGRADUATED);
		$data["staffAttendanceStat"]=$this->mysm->getStaffAttendanceCount($this->session->userdata("preschool_id"),$date->format('Y-m-d'));
		$data["staffAttendance"]=$this->mysm->getStaffAttendanceLimit($this->session->userdata("preschool_id"),null,10);
		$data["staffTotalCount"]=$this->mysm->getStaffEmployedCount($this->session->userdata("preschool_id"),EMPLOYED);
		$data["lastClockIn"]=$this->mysm->getStaffLastClockIn($this->session->userdata("preschool_id"),$this->session->userdata("staff_id"));
		$data["classData"]=$this->mysm->getClassData($this->session->userdata("preschool_id"));
		
		$this->load->view("staff/home",$data);
	
		// echo "<pre>";
		// print_r($_SESSION);
		// echo "</pre>";
	}

	function viewStaff($id=null){
		
		
		$data["classData"]=$this->mysm->getClassData($this->session->userdata("preschool_id"));
		$data["setting"]=$this->mysm->getPreschoolData($this->session->userdata("preschool_id"))[0];

		if($id==null){
			
		$data["staff"]=$this->mysm->getStaffData($this->session->userdata("preschool_id"));

		$this->load->view("staff/staffrecord",$data);
		}else{
			
		$data["staffData"]=$this->mysm->getStaffData($this->session->userdata("preschool_id"),$id);
		
			
		
		$data["staffData"]["schedule_day"]=($data["staffData"]["schedule_day"]==null || strlen($data["staffData"]["schedule_day"])<3)?"All":num_to_weekday(json_decode($data["staffData"]["schedule_day"]));			
		$this->load->view("staff/viewstaffrecord",$data);			
			
		}
		
		
	}
	
	function deleteStaff(){
		$staffId=$this->input->post("staff_id");
		$postData["employed"]=UNEMPLOYED;
		$this->mysm->updateStaffData($staffId,$postData);
		redirect($this->agent->referrer());
		
	}
	
	function editChild($id=null){
		if($id!=null){
			$data["classData"]=$this->mysm->getClassData($this->session->userdata("preschool_id"));
			$data["setting"]=$this->mysm->getPreschoolData($this->session->userdata("preschool_id"))[0];
			$data["child"]=$this->mycm->getChildData($this->session->userdata("preschool_id"),null,$id)[0];
			
			$this->load->view("staff/child/editchildrecord",$data);			
			
			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";
		}
		
		
	}
	
	function editingChild(){
				
		$arr_temp=explode("/",$this->agent->referrer());
		$id=array_pop($arr_temp);
		
		
		$postedData=$this->input->post();
		$postedData["picture"]=empty($_FILES['picture']['name'])?null:uploadPicture("picture","./px-includes/child/img/","child","staff/addchild");
		$postedData["dob"]=date("Y-m-d",strtotime($this->input->post("dob")));
		$postedData["preschool_id"]=$this->session->userdata("preschool_id");
		if($postedData["picture"]==null){
			unset($postedData["picture"]);
		}
		
		$this->mycm->updateChildData($id,$postedData);
		redirect($this->agent->referrer());
		
		
		
		
	}
	
	function changePassword(){
		
		$this->form_validation->set_rules('pass', 'Password', 'required');
		$this->form_validation->set_rules('cpass', 'Password Confirmation', 'required|matches[pass]');
				
		if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('error',validation_errors());
				redirect($this->agent->referrer());
				exit();
			
		}
		$staffId=$this->input->post("staff_id");
		$password=$this->input->post("pass");
		$this->mysm->setStaffPassword($this->session->userdata("preschool_id"),$staffId,$password);
		redirect($this->agent->referrer());

		
	}
	
	function editStaff($id=null){
		if($id!=null){
			$data["classData"]=$this->mysm->getClassData($this->session->userdata("preschool_id"));
			$data["setting"]=$this->mysm->getPreschoolData($this->session->userdata("preschool_id"))[0];
			$data["staff"]=$this->mysm->getStaffData($this->session->userdata("preschool_id"),$id);
			
			$this->load->view("staff/editstaffrecord",$data);			
			
			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";
		}
		
		
		
	}
	
	function editingStaff(){
		
		$arr_temp=explode("/",$this->agent->referrer());
		$id=array_pop($arr_temp);
		
		$postData=$this->input->post();
		$postData["class_id"]=json_encode($postData["classes"]);
		unset($postData["classes"]);
		$postData["dob"]=date("Y-m-d",strtotime($this->input->post("dob")));
		$postData["start_date"]=date("Y-m-d",strtotime($this->input->post("start_date")));
		$postData["schedule_day"]=json_encode($postData["schedule_day"]);
		$postData["picture"]=($_FILES["picture"]["name"]==null)?null:uploadPicture("picture","./px-includes/staff/img/","staff","staff/addstaff");
		$postData["preschool_id"]=$this->session->userdata("preschool_id");
		if($postData["picture"]==null){
		unset($postData["picture"]);
		
		}
		
		$this->mysm->updateStaffData($id,$postData);
		redirect($this->agent->referrer());
		echo "<pre>";
		print_r($postData);
		echo "<pre>";
		
	}

	function addStaff(){
		
		$data["classData"]=$this->mysm->getClassData($this->session->userdata("preschool_id"));
		$data["setting"]=$this->mysm->getPreschoolData($this->session->userdata("preschool_id"))[0];

		$this->load->view("staff/addstaffrecord",$data);
			
	}

	function addingStaff(){
		
		// $data["classData"]=$this->mysm->getClassData($this->session->userdata("preschool_id"));
		$postData=$this->input->post();
		$postData["class_id"]=json_encode($postData["classes"]);
		unset($postData["classes"]);
		$postData["dob"]=date("Y-m-d",strtotime($this->input->post("dob")));
		$postData["start_date"]=date("Y-m-d",strtotime($this->input->post("start_date")));
		$postData["schedule_day"]=json_encode($postData["schedule_day"]);
		$postData["picture"]=($_FILES["picture"]["name"]==null)?null:uploadPicture("picture","./px-includes/staff/img/","staff","staff/addstaff");
		$postData["preschool_id"]=$this->session->userdata("preschool_id");
		$this->mysm->setStaffData($postData);
		redirect("staff/addstaff");
			
		// echo "<pre>";
		// var_dump($postData);
		// echo "</pre>";
	}
	
	function entries($classId){
		if(!!$classId){
			redirect("home");
		}
		$data['childDetails']=$this->mycm->getChildData($this->session->userdata("preschool_id"),$classId);
		$this->load->view("staff/entries",$data);
		
	}
	
	function addclass(){
		$data["classData"]=$this->mysm->getClassData($this->session->userdata("preschool_id"));
		$data["setting"]=$this->mysm->getPreschoolData($this->session->userdata("preschool_id"))[0];

		
		$this->load->view("staff/class/addclassrecord",$data);
		
	}
	
	function addingclass(){
		$postedData["preschool_id"]=$this->session->userdata("preschool_id");
		$postedData["name"]=$this->input->post("class_name");
		
		if(!$this->mysm->setClass($postedData)){
			$this->session->set_flashdata("error","Oops! Could not add Class");
		}
		redirect("staff/home");		
		
	}
	
	function selectedClass($id){
		$data["classData"]=$this->mysm->getClassData($this->session->userdata("preschool_id"));
		$data["setting"]=$this->mysm->getPreschoolData($this->session->userdata("preschool_id"))[0];

		$data["children"]=$this->mycm->getChildAttendanceTable($this->session->userdata("preschool_id"),$id);
		$this->load->view("staff/attendance/child/attendancerecord",$data);
		
	}
	
	function selectedChild($id){
		null;
		
	}
	
	function markChildPresent($id){
	$postData["preschool_id"]=$this->session->userdata("preschool_id");
	$postData["child_id"]=$id;
	$this->mycm->setChildAttendancePresent($postData);
	redirect($this->agent->referrer());
	}

	function markChildAbsent($id){
	$postData["preschool_id"]=$this->session->userdata("preschool_id");
	$postData["child_id"]=$id;
	$this->mycm->setChildAttendanceAbsent($postData);
	redirect($this->agent->referrer());		
	}

	function markChildLeave($id){
	$postData["preschool_id"]=$this->session->userdata("preschool_id");
	$postData["child_id"]=$id;
	$this->mycm->setChildAttendanceLeave($postData);
	redirect($this->agent->referrer());			
	}
	
	function addNote($id=null){
		$data["classData"]=$this->mysm->getClassData($this->session->userdata("preschool_id"));
		$data["setting"]=$this->mysm->getPreschoolData($this->session->userdata("preschool_id"))[0];

		if($id==null){
		$this->load->view("staff/note/noterecord");
		}
		else{
			
		$this->load->view("staff/note/addnoterecord",$data);

		}
		
		
	}
	
	function addingNote(){
		$postData=$this->input->post();
		$arr_temp=explode("/",$this->agent->referrer());
		$postData["child_id"]=array_pop($arr_temp);
		$postData["preschool_id"]=$this->session->userdata("preschool_id");
		$postData["picture"]=empty($_FILES["picture"]["name"])?null:uploadPicture("picture","./px-includes/preschool/img/","note",$this->agent->referrer());
		$this->mycm->setChildNotes($postData);
		redirect($this->agent->referrer());
		
		
		
	}
	
	function note($id){
		$data["classData"]=$this->mysm->getClassData($this->session->userdata("preschool_id"));
		$data["setting"]=$this->mysm->getPreschoolData($this->session->userdata("preschool_id"))[0];

		$data["child"]=$this->mycm->getChildData($this->session->userdata("preschool_id"),$id)[0];
		$data["notes"]=$this->mycm->getChildNotes($this->session->userdata("preschool_id"),$id);
		$this->load->view("staff/note/noterecord",$data);
	
	}
	
	function viewnote($id){
	$data["classData"]=$this->mysm->getClassData($this->session->userdata("preschool_id"));
	$data["setting"]=$this->mysm->getPreschoolData($this->session->userdata("preschool_id"))[0];

	$data["note"]=$this->mycm->getChildNote($this->session->userdata("preschool_id"),$id)[0];
	$this->load->view("staff/note/viewnoterecord",$data);
	// echo "<pre>";
	// print_r($data);
	// echo "</pre>";
		
		
		
		
		
	}
	
	
	function attendance($id=null){
		$data["classData"]=$this->mysm->getClassData($this->session->userdata("preschool_id"));
		$data["setting"]=$this->mysm->getPreschoolData($this->session->userdata("preschool_id"))[0];

		if($id==null){
		$data["staff"]=$this->mysm->getStaffData($this->session->userdata("preschool_id"));
		$this->load->view("staff/attendance/attendancerecord",$data);
		}else{
		$data["staff"]=$this->mysm->getStaffData($this->session->userdata("preschool_id"),$id);
		$data["lastClockIn"]=$this->mysm->getStaffLastClockIn($this->session->userdata("preschool_id"),$id);
		$data["staffAttendance"]=$this->mysm->getStaffAttendance($this->session->userdata("preschool_id"),null,$id);
		$this->load->view("staff/attendance/viewattendancerecord",$data);
			
		}
		
		
	}
	
	function clockIn($id){
		$this->mysm->setStaffClockIn($this->session->userdata("preschool_id"),$id);
		redirect($this->agent->referrer());
		
	}

	function clockOut($id){
		$this->mysm->setStaffClockOut($this->session->userdata("preschool_id"),$id);
		redirect($this->agent->referrer());
	}

	function markAbsent($id){
		$this->mysm->setStaffAbsent($this->session->userdata("preschool_id"),$id);
		redirect($this->agent->referrer());
	}
	
	function markLeave($id){
		$this->mysm->setStaffLeave($this->session->userdata("preschool_id"),$id);
		redirect($this->agent->referrer());
	}
	
	function viewPreschoolActivity($id=null){
		$data["classData"]=$this->mysm->getClassData($this->session->userdata("preschool_id"));
		$data["setting"]=$this->mysm->getPreschoolData($this->session->userdata("preschool_id"))[0];

		if($id==null){			
		$data["activitiesjoined"]=$this->mysm->getAllPreschoolActivity($this->session->userdata("preschool_id"),"joined");	
		$data["activities"]=$this->mysm->getAllPreschoolActivity($this->session->userdata("preschool_id"));	
		foreach($data["activitiesjoined"] as $key=>$activity){
		$data["activitiesjoined"][$key]["class_name"]=($activity["class_id"]==null || strlen($activity["class_id"])<3)?"All":$this->mysm->getClassName(json_decode($activity["class_id"]));
			
		}
		$this->load->view("staff/preschoolactivities/activityrecord",$data);
				// echo "<pre>";
				// print_r($data);
				// echo "</pre>";
				
		}else{
	
		$data["activity"]=$this->mysm->getPreschoolActivity($this->session->userdata("preschool_id"),$id);	
		$this->load->view("staff/preschoolactivities/viewactivityrecord",$data);

		}
		
	}
	
	function addPreschoolActivity(){
		$data["classData"]=$this->mysm->getClassData($this->session->userdata("preschool_id"));
		$data["setting"]=$this->mysm->getPreschoolData($this->session->userdata("preschool_id"))[0];

		$this->load->view("staff/preschoolactivities/addactivityrecord",$data);

		
	}
	
	function addingPreschoolActivity(){
		$this->form_validation->set_rules('topic','Topic','trim|required',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('description','Description','trim|required',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('activitydate','Activity Date','trim|required',array('required' => 'You must provide a %s.'));
		
		if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('error',validation_errors());
				redirect("staff/addPreschoolActivity");
			
		}
		else{
			$postData["name"]=$this->input->post("topic");
			$postData["description"]=$this->input->post("description");
			$postData["activity_date"]=date("Y-m-d",strtotime($this->input->post("activitydate")));
			$postData["preschool_id"]=$this->session->userdata("preschool_id");
			$postData["remarks"]=$this->input->post("remark");
			$conv=$this->input->post("classes");
			$postData["class_id"]=json_encode($conv);

			$this->mysm->setPreschoolActivity($postData);
			
				redirect("staff/addPreschoolActivity");
				// echo "<pre>";
				// print_r($postData);
				// echo "</pre>";
		}
	}
	
	function announcement($id=null){
		
		$data["classData"]=$this->mysm->getClassData($this->session->userdata("preschool_id"));
		$data["setting"]=$this->mysm->getPreschoolData($this->session->userdata("preschool_id"))[0];

		if($id==null){
		$data["announcements"]=$this->mysm->getPreschoolAnnouncements($this->session->userdata("preschool_id"));
		$this->load->view("staff/announcement/announcementrecord",$data);
		}else{
		$data["announcement"]=$this->mysm->getPreschoolAnnouncements($this->session->userdata("preschool_id"),$id);		
			
			
		$this->load->view("staff/announcement/viewannouncementrecord",$data);
		}
	
	}

	function addAnnouncement(){
		
		$data["classData"]=$this->mysm->getClassData($this->session->userdata("preschool_id"));
		$data["setting"]=$this->mysm->getPreschoolData($this->session->userdata("preschool_id"))[0];

		$this->load->view("staff/announcement/addannouncementrecord",$data);
		
		
	}
	
	function addingAnnouncement(){
		
		$data["setting"]=$this->mysm->getPreschoolData($this->session->userdata("preschool_id"))[0];

		$this->form_validation->set_rules('topic','Topic','trim|required',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('description','Description','trim|required',array('required' => 'You must provide a %s.'));
		
		if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('valid_error',validation_errors());
				redirect("staff/addannouncement");
			
		}
		else{
			$postData["topic"]=$this->input->post("topic");
			$postData["description"]=$this->input->post("description");
			$postData["attachment"]=empty($_FILES['attachment']['name'])?null:uploadAttachment("attachment",pathinfo($_FILES['attachment']["name"],PATHINFO_EXTENSION),"staff/addannouncement");
			$postData["preschool_id"]=$this->session->userdata("preschool_id");
			$smsCheck=$this->input->post("sms_check");
			$this->mysm->setPreschoolAnnouncement($postData);
			if($smsCheck==ACTIVE){
				$message=ucfirst($postData["topic"])." ".$postData["description"];
				// foreach( as $to){
					$to=$this->mycm->getAllChildParent($this->session->userdata("preschool_id"));
					// echo "<pre>";
					// print_r($message);
					// print_r();
					// echo "</pre>";
					sendingSMS($message,array_merge_recursive(...$to)["phone_number"],$data["setting"]);
				// }
			}
			
				redirect("staff/addannouncement");
		}		
		
	}
	
	function mealPlan(){
		$data["classData"]=$this->mysm->getClassData($this->session->userdata("preschool_id"));
		$data["setting"]=$this->mysm->getPreschoolData($this->session->userdata("preschool_id"))[0];

		$data["meals"]=$this->mysm->getMealPlan($this->session->userdata("preschool_id"));
		$this->load->view("staff/mealplan/mealplanrecord",$data);
		
		
	}
	
	function addMealPlan(){
		$data["classData"]=$this->mysm->getClassData($this->session->userdata("preschool_id"));
		$data["setting"]=$this->mysm->getPreschoolData($this->session->userdata("preschool_id"))[0];

		$this->load->view("staff/mealplan/addmealplanrecord",$data);
	}
	
	function addingMealPlan(){

		$postData["meal_weekday"]=$this->input->post("meal_weekday");
		$conv=$this->input->post("mult");
		$postData["meal"]=json_encode(array_merge_recursive(...$conv)["meal"]);
		if(strlen($postData["meal"])<4){
			$this->session->set_flashdata('error',"No Meal Added");
			redirect("staff/addmealplan");
			exit();
		}
		$postData["preschool_id"]=$this->session->userdata("preschool_id");
		$this->mysm->setMealPlan($postData);
		redirect("staff/mealplan");
		
	}
	
	function childAttendance($id=null){

		if($id==null){
		return;
		}
		$data["classData"]=$this->mysm->getClassData($this->session->userdata("preschool_id"));
		$data["setting"]=$this->mysm->getPreschoolData($this->session->userdata("preschool_id"))[0];
		
		$data["childAttendance"]=$this->mycm->getChildAttendance($this->session->userdata("preschool_id"),null,$id);
		$data["child"]=$this->mycm->getChildData($this->session->userdata("preschool_id"),null,$id)[0];
		$this->load->view("staff/attendance/child/viewattendancerecord",$data);
		
	}

	function viewChild($id){
		$data["classData"]=$this->mysm->getClassData($this->session->userdata("preschool_id"));
		$data["setting"]=$this->mysm->getPreschoolData($this->session->userdata("preschool_id"))[0];

		$data["childData"]=$this->mycm->getChildData($this->session->userdata("preschool_id"),null,$id)[0];
		$data["parents"]=$this->mycm->getChildParent($this->session->userdata("preschool_id"),$id);
		$this->load->view("staff/child/viewchildrecord",$data);
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
	}
	
	function deleteChild(){
		$childId=$this->input->post("child_id");
		$postData["class_id"]=null;
		$postData["graduated"]=GRADUATED;
		$this->mycm->updateChildData($childId,$postData);
		redirect($this->agent->referrer());
		
	}
	function addChild(){
		$data["classData"]=$this->mysm->getClassData($this->session->userdata("preschool_id"));
		$data["setting"]=$this->mysm->getPreschoolData($this->session->userdata("preschool_id"))[0];

		$this->load->view("staff/child/addchildrecord",$data);
		
		
	}
	
	function addingChild(){
		$postedData=$this->input->post();
		$this->form_validation->set_rules('first_name','First Name','trim|required',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('last_name','Last Name','trim|required',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('dob','DoB','trim|required',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('gender','Gender','trim|required',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('state','State','trim|required',array('required' => 'You must provide a %s.'));
		
		if ($this->form_validation->run() == FALSE)
		{		$this->session->set_flashdata('error',validation_errors());
				redirect("staff/addchild");
		}
		else{
			$postedData["picture"]=empty($_FILES['picture']['name'])?null:uploadPicture("picture","./px-includes/child/img/","child","staff/addchild");
			$postedData["dob"]=date("Y-m-d",strtotime($this->input->post("dob")));
			$postedData["parents_id"]=array();
			$postedData["preschool_id"]=$this->session->userdata("preschool_id");
			$postedParentData=$this->input->post("parent");
			foreach($postedParentData as $k=>$v){
				$parentData['name']=$v['name'];
				$parentData['email']=$v['email'];
				$parentData['phone_number']=$v['phno'];
				$parentData['parent_type']=$v['parent_type'];
				$parentData['preschool_id']=$postedData["preschool_id"];
				$parentId=$this->mypm->checkParent($parentData);
				if($parentId!=false){
					$postedData['parents_id'][]=$parentId["id"];
					continue;
				}
				$postedData['parents_id'][]=$this->mypm->setParentData($postedData["preschool_id"],$parentData);
				
			}
			$postedData['parents_id']=json_encode($postedData['parents_id']);
			unset($postedData["parent"]);
			// echo "<pre>";
			// print_r($postedData);
			// echo "</pre>";
			if(!($this->mycm->setChildData($postedData))){
				$this->session->set_flashdata("error","Oops! Could not add Child");
			}else{
			redirect("staff/selectedclass/".$postedData['class_id']);
			}
		}	
		
	}

	function deletedChildren(){
		$data["classData"]=$this->mysm->getClassData($this->session->userdata("preschool_id"));
		$data["setting"]=$this->mysm->getPreschoolData($this->session->userdata("preschool_id"))[0];

		$data["children"]=$this->mycm->getChildDataByGraduation($this->session->userdata("preschool_id"),GRADUATED);
		$this->load->view("staff/child/deletedchildrecord",$data);
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		
		
	}
	
	function gallery(){
		$data["classData"]=$this->mysm->getClassData($this->session->userdata("preschool_id"));
		$data["setting"]=$this->mysm->getPreschoolData($this->session->userdata("preschool_id"))[0];

		$data["images"]=$this->mysm->getGalleryData($this->session->userdata("preschool_id"));
		$this->load->view("staff/gallery/galleryrecord",$data);

	}
	
	function addGallery(){
		$data["classData"]=$this->mysm->getClassData($this->session->userdata("preschool_id"));
		$data["setting"]=$this->mysm->getPreschoolData($this->session->userdata("preschool_id"))[0];

		$this->load->view("staff/gallery/addgalleryrecord",$data);

	}
	function addingGallery(){
		$postData["picture"]=uploadToGallery("picture","gallery","staff/addgallery");

		$postData["preschool_id"]=$this->session->userdata("preschool_id");
		$this->mysm->setGalleryRecord($postData);
		redirect($this->agent->referrer());
	}


	function fees(){
		$data["classData"]=$this->mysm->getClassData($this->session->userdata("preschool_id"));
		$data["setting"]=$this->mysm->getPreschoolData($this->session->userdata("preschool_id"))[0];

		$data["fees"]=$this->mysm->getClassFeesData($this->session->userdata("preschool_id"));
		$this->load->view("staff/fees/feesrecord",$data);
		
		
	}
	
	function addfees(){
		$data["classData"]=$this->mysm->getClassData($this->session->userdata("preschool_id"));
		$data["setting"]=$this->mysm->getPreschoolData($this->session->userdata("preschool_id"))[0];

		$this->load->view("staff/fees/addfeesrecord",$data);
		
		
	}

	function addingfees(){
		$postData["preschool_id"]=$this->session->userdata("preschool_id");
		$postData["fees_type"]=$this->input->post("fees_type");
		if($postData["fees_type"]==0){
			$postData["description"]=$this->input->post("selected_month");
		
		}elseif($postData["fees_type"]==1){
			$postData["description"]=$this->input->post("description");
		}
		$postData["last_date"]=$this->input->post("last_date");
		$postData["class_id"]=$this->input->post("class_id");
		$postData["amount"]=$this->input->post("amount");
		$this->mysm->setClassFeesData($postData);
		redirect($this->agent->referrer());

	}
	
	function viewfeespayment(){
		$data["setting"]=$this->mysm->getPreschoolData($this->session->userdata("preschool_id"))[0];
		$data["classData"]=$this->mysm->getClassData($this->session->userdata("preschool_id"));
		$data["fees"]=$this->mysm->getChildFees($this->session->userdata("preschool_id"));
		$this->load->view("staff/fees/childfeesrecord",$data);

		
		
		
	}

	function communicate($to){
		$data["setting"]=$this->mysm->getPreschoolData($this->session->userdata("preschool_id"))[0];
		$data["classData"]=$this->mysm->getClassData($this->session->userdata("preschool_id"));
		if($to=="parent"){	
		$data["parents"]=$this->mypm->getParentData($this->session->userdata("preschool_id"));
		$this->load->view("staff/communicate/parentcommunicate",$data);
			
		}if($to=="staff"){	
		$data["staffs"]=$this->mypm->getParentData($this->session->userdata("preschool_id"));
		$this->load->view("staff/communicate/staffcommunicate",$data);
			
		}

	}
	//Sending SMS


	
	

	function logout(){
		
		$this->session->sess_destroy();
		redirect("staff/login");
		
	}
	
	
	
	//Settings
	function settings(){
		$data["classData"]=$this->mysm->getClassData($this->session->userdata("preschool_id"));
		$data["setting"]=$this->mysm->getPreschoolData($this->session->userdata("preschool_id"))[0];
		$this->load->view("staff/setting/adminsetting",$data);
		// echo "<pre>";
		// print_r($data);
		// echo "<pre>";
	}
	
	function changingSettings(){
		$preschoolId=$this->session->userdata("preschool_id");
		$postData["smtp_mail_address"]=$this->input->post("smtp_mail");
		$postData["smtp_host"]=$this->input->post("smtp_host");
		$postData["smtp_password"]=$this->input->post("smtp_password");
		$postData["smtp_port"]=$this->input->post("smtp_port");
		
		$postData["paytm_merchant_id"]=$this->input->post("merchant_id");
		
		$postData["msg91_auth_key"]=$this->input->post("sms_auth_key");
		$postData["msg91_sender_id"]=strtoupper($this->input->post("sms_sender_id"));
		
		$postData["logo"]=empty($_FILES['logo']['name'])?null:uploadToGallery("logo","logo","superadmin/addpreschool");	
		
		$postData["name"]=$this->input->post("preschool_name");
		if($postData["logo"]==null){
			unset($postData["logo"]);
		}
		$this->mysm->updatePreschoolData($preschoolId,$postData);
		redirect($this->agent->referrer());
	}
	
}
?>