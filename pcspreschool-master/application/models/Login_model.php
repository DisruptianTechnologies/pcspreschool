<?php

class Login_model extends CI_Model{



	function loginParent($parentData){
	
		$q=$this->db->query("SELECT
			ps.`id` parent_id,
			ps.`email`,
			ps.`name`,
			ps.`picture`,
			ps.`parent_type`,
			ps.`password`,
			ps.`preschool_id`,
			ps.`phone_number`
			FROM
			  `parent` ps
			WHERE (ps.email=?
			OR ps.phone_number=?)
			",array($parentData['loginUniq'],$parentData['loginUniq']));
		
		$retParentData=$q->result_array()[0];
		if((password_verify($parentData['password'],$retParentData['password']) && $this->checkActivePreschool($retParentData["preschool_id"]))){
			unset($retParentData['password']);
			return $retParentData;
		}
		else{
			return false;
			
		}

	}


	function loginStaff($staffData){
		$q=$this->db->query("
				   SELECT
				  `id` staff_id,
				   CONCAT(`first_name`,' ',`last_name`) staff_name,
				  `email`,
				  `phone_number`,
				  `preschool_id`,
				  `dob`,
				  `role`,
				  `gender`,
				  `picture`,
				  `password`,
				  `class_id`,
				  `start_date`,
				  `schedule_day`,
				  `employed`,
				  `country`,
				  `state`,
				  `city`,
				  `zipcode`,
				  `address`,
				  `certification_names`
				FROM
				  `staff`
				  WHERE(
				  email=? OR
				  phone_number = ?)
				  AND employed=?
				",array($staffData['loginUniq'],$staffData['loginUniq'],EMPLOYED));
		$retStaffData=$q->result_array()[0];
		// return $retStaffData;
		if((password_verify($staffData['password'],$retStaffData['password']) && $this->checkActivePreschool($retStaffData["preschool_id"]))){
			unset($retStaffData['password']);
			return $retStaffData;
		}
		else{
			return false;
			
		}

	}
	
	function loginSuperAdmin($adminData){
		$q=$this->db->query("
				   SELECT
				  `id` admin_id,
				   CONCAT(`first_name`,' ',`last_name`) admin_name,
				  `email`,
				  `phone_number`,
				  `dob`,
				  `gender`,
				  `picture`,
				  `password`
				FROM
				  `super_admin`
				  WHERE(
				  email=? OR
				  phone_number = ?)
				  AND employed=?
				",array($adminData['loginUniq'],$adminData['loginUniq'],EMPLOYED));
		$retAdminData=$q->result_array()[0];
		// return $retStaffData;
		if((password_verify($adminData['password'],$retAdminData['password']))){
			unset($retAdminData['password']);
			return $retAdminData;
		}
		else{
			return false;
			
		}		
	
	}

	function confirmPassword($confPassword,$userTable,$id){
		$q=$this->db->query(
		"Select password from {$userTable} where id=?",array($id)
		);
		$hashPassword=$q->result_array()[0]["password"];
		if((password_verify($confPassword,$hashPassword))){
			return true;
		}
		return false;
	}


	function setParentPassword($prechoolId,$parentId,$password){
		 $newPassword=password_hash($password, PASSWORD_BCRYPT);
		 
		 $this->db->where(array("id"=>$parentId));
		 $this->db->update("parent",array("password"=>$newPassword));
		
		
	}

	function checkActivePreschool($preschoolId){
	$q=$this->db->select("active")->where("id",$preschoolId)->get("preschool");	
		if($q->num_rows()>0)
			return $q->result_array()[0]["active"]==ACTIVE;
		return false;
	}

}
?>