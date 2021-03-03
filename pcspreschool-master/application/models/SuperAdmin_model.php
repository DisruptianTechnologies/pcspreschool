<?php

class SuperAdmin_model extends CI_Model{



	function setAdmin($staffData){
		$this->db->insert("super_admin",$staffData);
		$lastId=$this->db->insert_id();
		if($this->setAdminPassword($lastId,$staffData["phone_number"])){
			return $lastId;
		}else{
			return false;
		}
		

	}
	
	function setAdminPassword($adminId,$password){
		$newPassword=password_hash($password, PASSWORD_BCRYPT);
		 
		$this->db->where(array("id"=>$adminId));
		return $this->db->update("super_admin",array("password"=>$newPassword));
	}		

	function getPreschools($id=null){
		if($id){
			$q=$this->db->where("id",$id)->get("preschool");
		return $q->result_array(); 
		}else{
			$q=$this->db->get("preschool");
		return $q->result_array();
		}
	}
	
	function getPreschoolsByStatus($status){
		$q=$this->db->query("
		SELECT *
		FROM `preschool`
		WHERE active = ?"
		,array($status));
		return $q->result_array();		
		
		
		
		
	}

	
	//SET
	
	function setPreschool($preschoolData){
		
		return $this->db->insert("preschool",$preschoolData);
		
		
	}



}
?>