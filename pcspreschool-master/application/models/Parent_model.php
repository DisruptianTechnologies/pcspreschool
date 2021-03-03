<?php

class Parent_model extends CI_Model{



	function getParentData($preschoolId,$parentId=null){
	if($parentId==null){
		$q=$this->db->query("SELECT
			ps.`id`,
			ps.`picture`,
			ps.`email`,
			ps.`name` parent_name,
			ps.`parent_type`,
			ps.`phone_number`
			FROM
			  `parent` ps
			WHERE ps.`preschool_id`=?
			",array($preschoolId));

		return $q->result_array();
	}else{
		$q=$this->db->query("SELECT
		ps.`id`,
		ps.`email`,
		ps.`picture`,
		ps.`name` parent_name,
		ps.`parent_type`,
		ps.`phone_number`
		FROM
		  `parent` ps
		WHERE ps.`preschool_id`=?
		and ps.`id`=?
		",array($preschoolId,$parentId));

		return $q->result_array()[0];	
	
	}


	}
	
	function checkParent($data){
		$q=	$this->db->select("id")
					->where($data)
					 ->get('parent');		
		
		if($q->num_rows()>0){
			return $q->result_array()[0];
			
		}
		else{
			return false;
			
		}
	}

	function getParentChild($preschoolId,$parentId){
		$q=$this->db->query("SELECT
				cs.id child_id,
				cs.`first_name`,
				cs.`last_name`,
				cs.`gender`,
				cs.`roll_no`,
				cs.`picture`,
				cs.`dob`,
				cs.`address`,
				cs.`country`,
				cs.`state`,
				cs.`zipcode`,
				cs.`allergy_type`,
				cs.`allergy_severity`,
				cs.`class_id`,
				cs.parents_id
				FROM
				  parent ps
				  LEFT JOIN child cs
					ON ((ps.id MEMBER OF (cs.parents_id)) = 1)
				WHERE ps.preschool_id = ?
				  AND ps.id =? ",array($preschoolId,$parentId));
		return $q->result_array();

	}	
	
	function getFeeStatus($preschoolId,$parentId){ 
		$q=$this->db->query("SELECT pfees.*
				FROM
				  parent_fees pfees
				  LEFT JOIN child cs
					ON (cs.`fees_status_id` = pfees.`id`)
				  LEFT JOIN parent ps
					ON ((ps.id MEMBER OF (cs.parents_id)) = 1)
				WHERE ps.preschool_id = ?
				  AND ps.id = ?",array($preschoolId,$parentId));
		return $q->result_array();
	}
	
	function getChildNotes($preschoolId,$parentId,$date=null){ 
		if($date==null){
			$q=$this->db->query("SELECT
				  cs.first_name,
				  cnot.*
				FROM
				  child_notes cnot
				  LEFT JOIN child cs
					ON (cs.id = cnot.`child_id`)
				  LEFT JOIN parent ps
					ON ((ps.id MEMBER OF (cs.parents_id)) = 1)
				WHERE ps.preschool_id = ?
				  AND ps.id = ?
				  AND (cnot.`type` <> 'ptm' AND cnot.`type` <> 'notice')",array($preschoolId,$parentId));
			return $q->result_array();
		}else{
			$q=$this->db->query("SELECT
			  cs.first_name,
			  cnot.*
			FROM
			  child_notes cnot
			  LEFT JOIN child cs
				ON (cs.id = cnot.`child_id`)
			  LEFT JOIN parent ps
				ON ((ps.id MEMBER OF (cs.parents_id)) = 1)
			WHERE ps.preschool_id = ?
			  AND ps.id = ?
			  AND DATE(cnot.`create_timestamp`)=?
			  AND (cnot.`type` <> 'ptm' AND cnot.`type` <> 'notice')",array($preschoolId,$parentId,$date));
		return $q->result_array();

		}
	
	}

	function getPtmCount($preschoolId){
		$q=$this->db->query("SELECT
					  COUNT(ap.id) ptm_count
					FROM
					  activity_planned ap
					WHERE ap.`preschool_id` = ?
					  AND ap.activity_date > DATE_ADD(NOW(), INTERVAL 10 DAY)
					  AND ap.`activity_date` < DATE_ADD(NOW(), INTERVAL 12 DAY)
					  AND ap.`activity_type_id`= 1",array($preschoolId));
		
		return $q->result_array()[0];
		
		
	}	
	
	function getPtm($preschoolId){
		$q=$this->db->query("SELECT
					  ap.id
					FROM
					  activity_planned ap
					WHERE ap.`preschool_id` = ?
					  AND ap.`activity_type_id`= 1",array($preschoolId));
		
		return $q->result_array();
		
		
	}
	
	function getCalenderEventCount($preschoolId){
		$q=$this->db->query("SELECT
					  COUNT(ap.id) as event_count
					FROM
					  activity_planned ap
					WHERE ap.`preschool_id` = ?
					  AND ap.activity_date > DATE_ADD(NOW(), INTERVAL 10 DAY)
					  AND ap.`activity_date` < DATE_ADD(NOW(), INTERVAL 12 DAY)
					  AND ap.`activity_type_id`<> 1",array($preschoolId));
		return $q->result_array()[0];
		
		
		
		
	}

	function setParentPassword($prechoolId,$parentId,$password){
		$newPassword=password_hash($password, PASSWORD_BCRYPT);
		 
		$this->db->where(array("id"=>$parentId));
		return $this->db->update("parent",array("password"=>$newPassword));
		
	}

	function setParentData($preschoolId,$parentData){
		$this->db->insert("parent",$parentData);
		$lastId=$this->db->insert_id();
		
		if($this->setParentPassword($preschoolId,$lastId,$parentData["phone_number"])){
			return $lastId;
		}else{
			return false;
		}
		
		
	}

	function updateParentData($parentId,$updateData){
		$this->db->where("id",$parentId);
		return $this->db->update("parent",$updateData);
		
	}
}
?>