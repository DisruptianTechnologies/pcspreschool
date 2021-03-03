<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
		 header("Content-type:application/json");
		$this->load->model("Parent_model","mypm");
		$this->load->model("Child_model","mycm");
		$this->load->model("Staff_model","mysm");
		$this->load->model("Login_model","mylm");
		}

    public function parentData($type=null,$preschoolId=null){
    // $postedData=json_decode(file_get_contents("php://input"));
		if($type=="login"){
			$postedData["loginUniq"]=$this->input->post("loginUniq");
			$postedData["password"]=$this->input->post("password");
			if(empty(trim($postedData["password"])) or empty(trim($postedData["loginUniq"]))){
			echo json_encode(array("result"=>false,"reason"=>"Insufficient parameters password"));
			exit();
			}
			$data=$this->mylm->loginParent($postedData);
			if($data){
			$data["childData"]=$this->mypm->getParentChild($data["preschool_id"],$data["parent_id"]);
            }
		}
		elseif($type=="all"){
			$preschoolId=($this->input->post("preschoolId")==null)?$this->session->userdata("preschool_id"):$this->input->post("preschoolId");
			$data=$this->mypm->getParentData($preschoolId);

			
		}
		elseif($type=="single"){
			null;
		}
		// if($type="all"){
			// $data=$this->mypm->getParentData($preschoolId);
		// }
		 if($data){
		    echo json_encode(array($data));
            exit();

		 }
		 else{
		     echo json_encode(array("result"=>false,"reason"=>"Invalid credentials passed"));


		 }
	
	}

    public function staffData($type=null,$preschoolId=null){
    // $postedData=json_decode(file_get_contents("php://input"));
		$data=null;
		if($type=="login"){
			$postedData["loginUniq"]=$this->input->post("loginUniq");
			$postedData["password"]=$this->input->post("password");
			if(empty(trim($postedData["password"])) or empty(trim($postedData["loginUniq"]))){
			echo json_encode(array("result"=>false,"reason"=>"Insufficient parameters password"));
			exit();
			}
				$data=$this->mylm->loginStaff($postedData);
			}
		elseif($type=="employed"){
			$preschoolId=($this->input->post("preschoolId")==null)?$this->session->userdata("preschool_id"):$this->input->post("preschoolId");
			$data=$this->mysm->getStaffByEmployment($preschoolId,EMPLOYED);

			
		}
		elseif($type=="single"){
			null;
		}
		// if($type="all"){
			// $data=$this->mypm->getParentData($preschoolId);
		// }
		 if($data){
		    echo json_encode(array($data));
            exit();

		 }
		 else{
		     echo json_encode(array("result"=>false,"reason"=>"Invalid credentials passed"));


		 }
	
	}
	
	 public function attendance()
    {   
		$postedData["preschool_id"]=$this->input->post("preschoolId");
		$postedData["childId"]=$this->input->post("childId");
		$postedData["month"]=$this->input->post("month");
		$postedData["year"]=$this->input->post("year");
		// $holiday=null;
		$date = new DateTime("now");
		$dcount=null;
		$data=array();
		if($postedData["month"]==$date->format("m")){
			
			
			$data["holiday"]=$this->mysm->getHolidaybyMonth($postedData["preschool_id"],$postedData["month"],$postedData["year"],$date->format("Y-m-d"));
			$dcount=$date->format("d");
			
		}else{
			$dcount=cal_days_in_month(CAL_GREGORIAN,$postedData["month"],$postedData["year"]);
			$data["holiday"]=$this->mysm->getHolidaybyMonth($postedData["preschool_id"],$postedData["month"],$postedData["year"]);
		}
		$data["present"]=$this->mycm->getChildAttendancebyMonth($postedData["childId"],PRESENT,$postedData["month"],$postedData["year"]);
		
		$data["absent"]=$this->mycm->getChildAttendancebyMonth($postedData["childId"],ABSENT,$postedData["month"],$postedData["year"]);
		
		$data["leave"]=$this->mycm->getChildAttendancebyMonth($postedData["childId"],LEAVE,$postedData["month"],$postedData["year"]);

			
		
		
			echo json_encode($data);


		
		
	}
	
	public function notes(){
		$preschoolId=$this->input->post("preschoolId");
		$childId=$this->input->post("childId");
		if($preschoolId==null){
		    
		echo json_encode(array("result"=>"failure","reason"=>"Preschool ID not provided"));
		exit();
		}
		if($childId==null){
		    
		echo json_encode(array("result"=>"failure","reason"=>"Child ID not provided"));
		exit();
		    
		}
		$data=$this->mycm->getChildNotes(1,1);
		foreach($data as $key=>$indiData){
		$data[$key]["time"]=date("h:i:s a",strtotime($indiData["time"]));
		}
		echo json_encode($data);

		
	}
	
	public function announcements(){
		$preschoolId=$this->input->post("preschoolId");
		if($preschoolId==null){
		    
		echo json_encode(array("result"=>"failure","reason"=>"Preschool ID not provided"));
		exit();
		}
		
		$data=$this->mysm->getPreschoolAnnouncements($preschoolId);
		if($data==null or empty($data)){
		echo json_encode(array("result"=>"failure","reason"=>"Announcements for given Preschool ID does not exist"));
		exit();
			
		}
		foreach($data as $key=>$indiData){
		$data[$key]["time"]=date("h:i:s a",strtotime($indiData["time"]));
		}	
		echo json_encode($data);

	}
	
	public function activity(){
		$preschoolId=$this->input->post("preschoolId");
		$month=$this->input->post("month");
		$year=$this->input->post("year");
		if($preschoolId==null || $month==null || $year==null ){
		    
		echo json_encode(array("result"=>"failure","reason"=>"Parameter is missing"));
		exit();
		}
				
		$data=$this->mysm->getPreschoolActivityByMonth($preschoolId,$month,$year);
		foreach($data as $key=>$activity){
		$data[$key]["class_name"]=($activity["class_id"]==null || strlen($activity["class_id"])<3)?"All":$this->mysm->getClassName(json_decode($activity["class_id"]));
		$data[$key]["class_id"]=json_decode($activity["class_id"]);
		}
		if($data==null or empty($data)){
		echo json_encode(array("result"=>"failure","reason"=>"Activities for given Preschool ID does not exist"));
		exit();
			
		}
		echo json_encode($data);	
		
	}
	public function mealplan(){
		$preschoolId=$this->input->post("preschoolId");

		if($preschoolId==null){
		    
		echo json_encode(array("result"=>"failure","reason"=>"Parameter is missing"));
		exit();
		}
		
		$data=$this->mysm->getMealPlan($preschoolId);
		foreach($data as $key=>$meal){
			$data[$key]["meal_weekday"]=num_to_weekday($meal["meal_weekday"]);
			$data[$key]["meal"]=json_decode($meal["meal"]);
		}
		
		if($data==null or empty($data)){
		echo json_encode(array("result"=>"failure","reason"=>"Meal Plan for given Preschool ID does not exist"));
		exit();
			
		}
		echo json_encode($data);
	}

	public function gallery(){
		$preschoolId=$this->input->post("preschoolId");

		if($preschoolId==null){
		    
		echo json_encode(array("result"=>"failure","reason"=>"Parameter is missing"));
		exit();
		}
		
		$data=$this->mysm->getGalleryData($preschoolId);

		if($data==null or empty($data)){
		echo json_encode(array("result"=>"failure","reason"=>"Gallery Data for given Preschool ID does not exist"));
		exit();
			
		}
		echo json_encode($data);
	}

	//Personal Usage
	
	public function communicate($sender="parent"){
		$rawPostedData=json_decode(file_get_contents("php://input"));

		if($sender=="parent"){
			$parentId=($this->input->post("parentId")==null)?$rawPostedData->parentId:$this->input->post("parentId");
			$preschoolId=($this->input->post("preschoolId")!=null)?$this->input->post("preschoolId"):$this->session->userdata("preschool_id");
			if($parentId==null || $preschoolId==null){
				
			echo json_encode(array("result"=>"failure","reason"=>"Parameter is missing"));
			exit();
		
			}else{
				$data=$this->mysm->getParentCommunicateChat($preschoolId,$parentId);
				echo json_encode($data);
			}			
		}elseif($sender=="staff"){
			
			$staffId=($this->input->post("staffId")==null)?$rawPostedData->staffId:$this->input->post("staffId");
			$preschoolId=($this->input->post("preschoolId")!=null)?$this->input->post("preschoolId"):$this->session->userdata("preschool_id");
			if($staffId==null || $preschoolId==null){
				
			echo json_encode(array("result"=>"failure","reason"=>"Parameter is missing"));
			exit();
		
			}else{
				$data=$this->mysm->getStaffCommunicateChat($preschoolId,$staffId);
				echo json_encode($data);
			}			
	
			
		}
		
	}	
	
	
	public function sendmessage($sender){
		if($sender==null){
		    
		echo json_encode(array("result"=>"failure","reason"=>"Parameter is missing"));
		exit();
	
		}
		
		$rawPostedData=json_decode(file_get_contents("php://input"));
		$sent=($sender=="parent")?SENDERPARENT:SENDERADMIN;

		$postData["preschool_id"]=($this->input->post("preschoolId")!=null)?$this->input->post("preschoolId"):$this->session->userdata("preschool_id");
		$postData["message"]=($this->input->post("message")==null)?$rawPostedData->message:$this->input->post("message");
		$postData["parent_id"]=($this->input->post("parentId")==null)?$rawPostedData->parentId:$this->input->post("parentId");
		$postData["sent"]=$sent;
		
		$data=$this->mysm->setParentCommunicateChat($postData);
		$setting=$this->mysm->getPreschoolData($postData["preschool_id"])[0];
		if($sender=="parent"){
		$admins=$this->mysm->getStaffByRole($postData["preschool_id"],ADMIN);
		$parent=$this->mypm->getParentData($postData["preschool_id"],$postData["parent_id"]);

		foreach($admins as $admin){
			$subject="Message from parent";
			sendingMail($setting,$parent["email"],$admin['email'],$subject,$postData["message"]);

			}
		}			
		elseif($sender=="admin"){
			$parent=$this->mypm->getParentData($postData["preschool_id"],$postData["parent_id"]);
			$subject="Message from Preschool Admin";
			sendingMail($setting,$setting["name"],$parent['email'],$subject,$postData["message"]);
				
		}
		
		}
	

	}
	
	public function sendmessagestaff($sender){
		if($sender==null){
		    
		echo json_encode(array("result"=>"failure","reason"=>"Parameter is missing"));
		exit();
	
		}
		
		$rawPostedData=json_decode(file_get_contents("php://input"));
		$sent=($sender=="staff")?SENDERSTAFF:SENDERADMIN;
		
		$postData["preschool_id"]=($this->input->post("preschoolId")!=null)?$this->input->post("preschoolId"):$this->session->userdata("preschool_id");
		$postData["message"]=($this->input->post("message")==null)?$rawPostedData->message:$this->input->post("message");
		$postData["staff_id"]=($this->input->post("staffId")==null)?$rawPostedData->staffId:$this->input->post("staffId");
		$postData["sent"]=$sent;
		
		$data=$this->mysm->setStaffCommunicateChat($postData);
		
		
		
		
	}		
	public function fees($type){
		if($type=="fetch"){
			$preschoolId=$this->input->post("preschoolId");
			$classId=$this->input->post("classId");
			if($preschoolId==null || $classId==null){
				
			echo json_encode(array("result"=>"failure","reason"=>"Parameter is missing"));
			exit();
		
			}
			$data=$this->mysm->getClassFeesData($preschoolId,$classId);
			if($data){
			echo json_encode($data);
			}
			else{
			echo json_encode(array("result"=>"empty result","reason"=>"Fees data for class does not exist."));
			}
		}
		elseif($type=="remaining"){
			$preschoolId=$this->input->post("preschoolId");
			$classId=$this->input->post("classId");
			$childId=$this->input->post("childId");
			if($preschoolId==null || $classId==null || $childId==null){
				
			echo json_encode(array("result"=>"failure","reason"=>"Parameter is missing"));
			exit();
		
			}
			$data=$this->mysm->getRemainingChildFees($preschoolId,$classId,$childId,UNPAID);
			if($data){
			echo json_encode($data);
			}
			else{
			echo json_encode(array("result"=>"empty result","reason"=>"Fees data for class does not exist."));
			}
		}elseif($type=="put"){
			$postData["preschool_id"]=$this->input->post("preschoolId");
			$postData["child_id"]=$this->input->post("childId");			
			$postData["transaction_id"]=$this->input->post("transactionId");			
			$postData["class_fees_id"]=$this->input->post("classFeesId");			
			$postData["payment_date"]=(new DateTime("now"))->format("Y-m-d");			
			$postData["payment_amount"]=$this->input->post("paymentAmount");			
			if($this->mysm->setChildFees($postData)){
				echo json_encode(array("result"=>"success"));
			}else{
				echo json_encode(array("result"=>"failure"));
				
			}
		}
		elseif($type=="history"){
			$preschoolId=$this->input->post("preschoolId");
			$childId=$this->input->post("childId");
			$data=$this->mysm->getChildFees($preschoolId,$childId);
			if($data){
				echo json_encode($data);
			}else{
				echo json_encode(array("result"=>"failure"));
				
				}
			}
		}
		
	function settings($type){
		$preschoolId=($this->input->post("preschoolId")!=null)?$this->input->post("preschoolId"):$this->session->userdata("preschool_id");
		if($preschoolId==null){
		echo json_encode(array("result"=>"failure","reason"=>"Parameter is missing"));
		
		}

		if($type=="all"){
		$data=$this->mysm->getPreschoolData($preschoolId);
		if($data){
			echo json_encode($data[0]);
		}else{
			echo json_encode(array("result"=>"failure","reason"=>"No Settings exist"));

			}
		}
		
	
	}
	
	function diaryEntry($type="all"){
		if($type=="add"){
			$postData["preschool_id"]=($this->input->post("preschoolId")==null)?$this->session->userdata("preschool_id"):$this->input->post("preschoolId");
			$postData["picture"]=empty($_FILES["picture"]["name"])?null:uploadPicture("picture","./px-includes/preschool/img/","note",$this->agent->referrer());
			$postData["type"]=$this->input->post("type");
			$postData["remarks"]=$this->input->post("description");
			$postData["child_id"]=$this->input->post("childId");
			if($this->mycm->setChildNotes($postData)){
				echo json_encode(array("result"=>"success"));
				
			}else{
				return json_encode(array("result"=>"fail"));
			}
		}
		if($type="fetch"){
			$preschoolId=($this->input->post("preschoolId")==null)?$this->session->userdata("preschool_id"):$this->input->post("preschoolId");
			$childId=$this->input->post("childId");
			// $data["child"]=$this->mycm->getChildData($this->session->userdata("preschool_id"),$id)[0];
			$data=$this->mycm->getChildNotes($preschoolId,$childId);
			echo json_encode($data);	
			
		}
		
		
		
	}
	
	function staffgallery($type="all"){
		if($type=="add"){
			$postData["preschool_id"]=($this->input->post("preschoolId")==null)?$this->session->userdata("preschool_id"):$this->input->post("preschoolId");
			if(uploadToGallery("picture","gallery","staff/addgallery")){
				echo json_encode(array("result"=>"success"));
				
			}else{
				return json_encode(array("result"=>"fail"));
			}
		}
		if($type="fetch"){
			$preschoolId=($this->input->post("preschoolId")==null)?$this->session->userdata("preschool_id"):$this->input->post("preschoolId");
			$data=$this->mysm->getGalleryData($preschoolId);
			if($data){
				echo json_encode($data);		
			}else{
				echo json_encode(array("result"=>"no data available"));		
			}
			
		}
		
	}

	
	
	
	
}