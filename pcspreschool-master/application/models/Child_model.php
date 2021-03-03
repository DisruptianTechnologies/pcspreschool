<?php

class Child_model extends CI_Model{

	// Get data of child

	function getChildData($preschoolId,$classId=null,$childId=null){
	if($childId==null and $classId==null){
	$q=$this->db->query("
				SELECT 
				cs.id child_id,
				CONCAT(cs.`first_name`,' ',cs.`last_name`) child_name,
				cs.`gender`,
				cs.`roll_no`,
				cs.`picture`,
				cs.`dob`,
				cs.`address`,
				cs.`country`,
				cs.`graduated`,
				cs.`state`,
				cs.`zipcode`,
				cs.`allergy_type`,
				cs.`allergy_severity`,
				cl.`id` class_id,
				cl.name class_name
				FROM child AS cs
				INNER JOIN class cl ON ( cs.`class_id`=cl.`id`)
				WHERE cs.`preschool_id`=?
	",array($preschoolId));
	return $q->result_array();
	}
	if($childId!=null and $classId==null){
	// only if required
		$q=$this->db->query("SELECT 
				cs.id child_id,
				CONCAT(cs.`first_name`,' ',cs.`last_name`) child_name,
				cs.`first_name`,
				cs.`last_name`,
				cs.`gender`,
				cs.`picture`,
				cs.`roll_no`,
				cs.`dob`,
				cs.`address`,
				cs.`country`,
				cs.`graduated`,
				cs.`state`,
				cs.`zipcode`,
				cs.`allergy_type`,
				cs.`allergy_severity`,
				cl.`id` class_id,
				cl.`name` class_name
				FROM child AS cs
				INNER JOIN class cl ON ( cs.`class_id`=cl.`id`)
				WHERE cs.`preschool_id`=?
				AND cs.`id`=?
	",array($preschoolId,$childId));
	return $q->result_array();
	}
	if($classId!=null and $childId==null){
		$q=$this->db->query("SELECT 
			cs.id child_id,
			CONCAT(cs.`first_name`,' ',cs.`last_name`) child_name,
			cs.`first_name`,
			cs.`last_name`,
			cs.`gender`,
			cs.`picture`,
			cs.`dob`,
			cs.`roll_no`,
			cs.`address`,
			cs.`graduated`,
			cs.`country`,
			cs.`state`,
			cs.`zipcode`,
			cs.`allergy_type`,
			cs.`allergy_severity`,
			cl.`id` class_id,
			cl.name class_name
			FROM child AS cs
			INNER JOIN class cl ON ( cs.`class_id`=cl.`id`)
			WHERE cs.`preschool_id`=?
			AND cl.`id`=?
		",array($preschoolId,$classId));
	
		return $q->result_array();	
		
	}
	
	}
	
	function getChildDataByGraduation($preschoolId,$graduation){
		
			$q=$this->db->query("
				SELECT
				  cs.id child_id,
				  CONCAT (
					cs.`first_name`,
					' ',
					cs.`last_name`
				  ) child_name,
				  cs.`first_name`,
				  cs.`last_name`,
				  cs.`gender`,
				  cs.`picture`,
				  cs.`dob`,
				  cs.`roll_no`,
				  cs.`address`,
				  cs.`country`,
				  cs.`graduated`,
				  cs.`state`,
				  cs.`zipcode`,
				  cs.`allergy_type`,
				  cs.`allergy_severity`,
				  cs.`class_id` class_id
				  FROM
				  child AS cs
				WHERE cs.`preschool_id` = ?
				  AND cs.`graduated` = ?
		",array($preschoolId,$graduation));
	
		return $q->result_array();	
		
		
		
	}

	function getChildAttendanceTable($preschoolId,$classId){
		$q=$this->db->query("
		SELECT
		cs.id child_id,
		(SELECT att.attendance_date FROM child_attendance att WHERE att.`child_id`=cs.`id` ORDER BY att.`id` DESC LIMIT 1) last_attendance_date,
		(SELECT att.status FROM child_attendance att WHERE att.`child_id`=cs.`id` ORDER BY att.`id` DESC LIMIT 1) last_attendance_status,
		CONCAT (
		  cs.`first_name`,
		  ' ',
		  cs.`last_name`
		) child_name,
		cs.`gender`,
		cs.`picture`,
		cs.`graduated`,
		cs.`dob`,
		cs.`roll_no`,
		cl.`id` class_id,
		cl.name class_name FROM child AS cs
		INNER JOIN class cl
		  ON (cs.`class_id` = cl.`id`) WHERE cs.`preschool_id` = ?
		AND cl.`id` = ?
		",array($preschoolId,$classId));
		
		return $q->result_array();
		
		
		
		
	}

	function getChildParent($preschoolId,$childId){
		$q=$this->db->query("
		SELECT
		  ps.`id` parent_id,
		  ps.`name` parent_name,
		  ps.`picture`,
		  ps.`email`,
		  ps.`phone_number`,
		  ps.`parent_type`
		FROM
		  parent ps
		  LEFT JOIN child cs
			ON ((ps.id MEMBER OF (cs.parents_id)) = 1)
		WHERE cs.preschool_id = ?
		  AND cs.id = ?
				",array($preschoolId,$childId));
		
		return $q->result_array();
		

	}

	function getAllChildParent($preschoolId,$status=UNGRADUATED){
		$q=$this->db->query("
		SELECT
		  ps.`id` parent_id,
		  ps.`name` parent_name,
		  ps.`picture`,
		  ps.`email`,
		  ps.`phone_number`,
		  ps.`parent_type`
		FROM
		  parent ps
		  LEFT JOIN child cs
			ON ((ps.id MEMBER OF (cs.parents_id)) = 1)
		WHERE cs.preschool_id = ?
		AND cs.graduated=?
				",array($preschoolId,$status));
		
		return $q->result_array();
		

	}
	
	
	function getChildActivity($preschoolId,$date=null,$childId=null){
		if($childId==null and $date==null){
			$q=$this->db->query("
			SELECT * FROM child_activity WHERE preschool_id=?
			",array($preschoolId));
			return $q->result_array();
		}
		if($childId==null and $date!=null){
			$q=$this->db->query("
			SELECT * FROM child_activity WHERE preschool_id=? 
			AND DATE(create_timestamp)=?
			",array($preschoolId,$date));
			return $q->result_array();
		}
		if($childId!=null and $date==null){
			$q=$this->db->query("
			SELECT * FROM child_activity WHERE preschool_id=? 
			AND child_id=?
			",array($preschoolId,$childId));
			return $q->result_array();
		}
		if($childId!=null and $date!=null){
			$q=$this->db->query("
			SELECT * FROM child_activity WHERE preschool_id=? 
			AND child_id=?
			AND DATE(create_timestamp)=?
			",array($preschoolId,$childId,$date));
			return $q->result_array();
		}	
	
	}
	
	
	function getChildAttendance($preschoolId,$date=null,$childId=null){

		if($childId==null and $date!=null){
			$q=$this->db->query("
			SELECT * FROM child_attendance WHERE preschool_id=? 
			AND attendance_date=?
			",array($preschoolId,$date));
			return $q->result_array();
		}
		if($childId!=null and $date==null){
			$q=$this->db->query("
			SELECT * FROM child_attendance WHERE preschool_id=? 
			AND child_id=?
			",array($preschoolId,$childId));
			return $q->result_array();
		}
		if($childId!=null and $date!=null){
			$q=$this->db->query("
			SELECT * FROM child_attendance WHERE preschool_id=? 
			AND child_id=?
			AND attendance_date=?
			",array($preschoolId,$childId,$date));
			return $q->result_array();
		}	
	
	}
	
	function getChildAttendanceLimit($preschoolId,$childId=null,$limit=100){
		if($childId==null){
			$q=$this->db->query("SELECT
			      ca.child_id,
				  CONCAT(c.`first_name`,' ',c.`last_name`) child_name,
				  ca.`status`,
				  cl.`name`class_name,
				  ca.attendance_date
				FROM
				  child_attendance ca
				INNER JOIN child c ON (
				c.`id`=ca.`child_id`
				)
				INNER JOIN class cl ON(
				cl.`id`=c.`id`
				)
				WHERE sa.preschool_id=?
				ORDER BY ca.id DESC
				LIMIT ?
				",array($preschoolId,$limit));	
			return $q->result_array();
			
		}
		else{
			$q=$this->db->query("SELECT
				  ca.child_id,
				  CONCAT(c.`first_name`,' ',c.`last_name`) child_name,
				  ca.`status`,
				  cl.`name`class_name,
				  ca.attendance_date
				FROM
				  child_attendance ca
				INNER JOIN child c ON (
				c.`id`=ca.`child_id`
				)
				INNER JOIN class cl ON(
				cl.`id`=c.`id`
				)
				WHERE ca.`child_id` = ?
				ORDER BY ca.id DESC
				LIMIT ?",array($childId,$limit));	
			return $q->result_array();
		}
		
		
	}
	
	
	function getChildAttendancebyMonth($childId,$status,$month,$year){
		$q=$this->db->query("
				SELECT
		  ca.attendance_date
		FROM
		  `child_attendance` ca
		WHERE ca.`child_id` = ?
		  AND ca.`status`=?
		  AND MONTH (ca.attendance_date) = ?
		  AND YEAR (ca.attendance_date) = ?
		",array($childId,$status,$month,$year));
		if($q->num_rows()>0){
		$result=array_merge_recursive(...$q->result_array());
		}else{
		$result=null;
		}
		$result["count"]=$q->num_rows();
		return $result;
		
	}

	function getChildAttendanceCount($preschoolId,$date=null,$classId=null){

		if($classId==null and $date!=null){
			$q=$this->db->query("
					SELECT
					  COUNT(ca.`id`) AS ct_child
					FROM
					  `child_attendance` ca
					WHERE preschool_id=?
					AND ca.status=1
					AND attendance_date=?
			",array($preschoolId,$date));
			return $q->result_array()[0];
		}
		if($classId!=null and $date!=null){
			$q=$this->db->query("SELECT
				  COUNT(ca.`id`) AS ct_child
				FROM
				  `child_attendance` ca
				 LEFT JOIN child ch ON
				 (ch.`id`=ca.`child_id`
				 AND ch.`class_id`=?)
				WHERE ca.preschool_id=?
				AND ca.status=1
				AND attendance_date=?

			",array($classId,$preschoolId,$date));
			return $q->result_array()[0];
		}	
	
	}

	function getChildGraduatedCount($preschoolId,$graduated){
		
	$q=$this->db->query("
		SELECT 
			COUNT(ch.id) as ct_total
		FROM `child` ch
		WHERE ch.preschool_id=?
		AND ch.graduated=?
	",array($preschoolId,$graduated));
		
	return $q->result_array()[0];
				
	}

	function getChildDevelopment($preschoolId,$date=null,$childId=null){
		if($childId==null and $date==null){
			$q=$this->db->query("
			SELECT
			  chdev.`id`,
			  devd.`description` AS domain_descrip,
			  devs.`description` skill_descrip,
			  devi.`description` indicator_descrip
			FROM 
			child_development chdev
			INNER JOIN development_domain devd ON (chdev.`domain_id`=devd.`id`)
			INNER JOIN development_indicator devi ON (chdev.`indicator_id`=devi.`id`)
			INNER JOIN development_skill devs ON (chdev.`skill_id`=devs.`id`)
			WHERE chdev.preschool_id=?
			",array($preschoolId));
			return $q->result_array();
		}
		if($childId==null and $date!=null){
			$q=$this->db->query("
						SELECT
			  chdev.`id`,
			  devd.`description` AS domain_descrip,
			  devs.`description` skill_descrip,
			  devi.`description` indicator_descrip
			FROM 
			child_development chdev
			INNER JOIN development_domain devd ON (chdev.`domain_id`=devd.`id`)
			INNER JOIN development_indicator devi ON (chdev.`indicator_id`=devi.`id`)
			INNER JOIN development_skill devs ON (chdev.`skill_id`=devs.`id`)
			WHERE chdev.preschool_id=? 
			AND DATE(chdev.create_timestamp)=?
			",array($preschoolId,$date));
			return $q->result_array();
		}
		if($childId!=null and $date==null){
			$q=$this->db->query("
			SELECT
			  chdev.`id`,
			  devd.`description` AS domain_descrip,
			  devs.`description` skill_descrip,
			  devi.`description` indicator_descrip
			FROM 
			child_development chdev
			INNER JOIN development_domain devd ON (chdev.`domain_id`=devd.`id`)
			INNER JOIN development_indicator devi ON (chdev.`indicator_id`=devi.`id`)
			INNER JOIN development_skill devs ON (chdev.`skill_id`=devs.`id`)
			WHERE chdev.preschool_id=?
			AND chdev.child_id=?
			",array($preschoolId,$childId));
			return $q->result_array();
		}
		if($childId!=null and $date!=null){
			$q=$this->db->query("
			SELECT
			  chdev.`id`,
			  devd.`description` AS domain_descrip,
			  devs.`description` skill_descrip,
			  devi.`description` indicator_descrip
			FROM 
			child_development chdev
			INNER JOIN development_domain devd ON (chdev.`domain_id`=devd.`id`)
			INNER JOIN development_indicator devi ON (chdev.`indicator_id`=devi.`id`)
			INNER JOIN development_skill devs ON (chdev.`skill_id`=devs.`id`)
			WHERE chdev.preschool_id=?
			AND chdev.child_id=?
			AND DATE(chdev.create_timestamp)=?
			",array($preschoolId,$childId,$date));
			return $q->result_array();
		}	
	
	}

	
	function getChildFluid($preschoolId,$date=null,$childId=null){
		if($childId==null and $date==null){
			$q=$this->db->query("
			SELECT * FROM child_fluid WHERE preschool_id=?
			",array($preschoolId));
			return $q->result_array();
		}
		if($childId==null and $date!=null){
			$q=$this->db->query("
			SELECT * FROM child_fluid WHERE preschool_id=? 
			AND DATE(create_timestamp)=?
			",array($preschoolId,$date));
			return $q->result_array();
		}
		if($childId!=null and $date==null){
			$q=$this->db->query("
			SELECT * FROM child_fluid WHERE preschool_id=? 
			AND child_id=?
			",array($preschoolId,$childId));
			return $q->result_array();
		}
		if($childId!=null and $date!=null){
			$q=$this->db->query("
			SELECT * FROM child_fluid WHERE preschool_id=? 
			AND child_id=?
			AND DATE(create_timestamp)=?
			",array($preschoolId,$childId,$date));
			return $q->result_array();
		}	
	
	}


	function getChildFood($preschoolId,$date=null,$childId=null){
		if($childId==null and $date==null){
			$q=$this->db->query("
			SELECT * FROM child_food WHERE preschool_id=?
			",array($preschoolId));
			return $q->result_array();
		}
		if($childId==null and $date!=null){
			$q=$this->db->query("
			SELECT * FROM child_food WHERE preschool_id=? 
			AND DATE(create_timestamp)=?
			",array($preschoolId,$date));
			return $q->result_array();
		}
		if($childId!=null and $date==null){
			$q=$this->db->query("
			SELECT * FROM child_food WHERE preschool_id=? 
			AND child_id=?
			",array($preschoolId,$childId));
			return $q->result_array();
		}
		if($childId!=null and $date!=null){
			$q=$this->db->query("
			SELECT * FROM child_food WHERE preschool_id=? 
			AND child_id=?
			AND DATE(create_timestamp)=?
			",array($preschoolId,$childId,$date));
			return $q->result_array();
		}	
	
	}


	function getChildHealth($preschoolId,$date=null,$childId=null){
		if($childId==null and $date==null){
			$q=$this->db->query("
			SELECT * FROM child_health WHERE preschool_id=?
			",array($preschoolId));
			return $q->result_array();
		}
		if($childId==null and $date!=null){
			$q=$this->db->query("
			SELECT * FROM child_health WHERE preschool_id=? 
			AND DATE(create_timestamp)=?
			",array($preschoolId,$date));
			return $q->result_array();
		}
		if($childId!=null and $date==null){
			$q=$this->db->query("
			SELECT * FROM child_health WHERE preschool_id=? 
			AND child_id=?
			",array($preschoolId,$childId));
			return $q->result_array();
		}
		if($childId!=null and $date!=null){
			$q=$this->db->query("
			SELECT * FROM child_health WHERE preschool_id=? 
			AND child_id=?
			AND DATE(create_timestamp)=?
			",array($preschoolId,$childId,$date));
			return $q->result_array();
		}	
	
	}

	
	function getChildMood($preschoolId,$date=null,$childId=null){
		if($childId==null and $date==null){
			$q=$this->db->query("
			SELECT * FROM child_mood WHERE preschool_id=?
			",array($preschoolId));
			return $q->result_array();
		}
		if($childId==null and $date!=null){
			$q=$this->db->query("
			SELECT * FROM child_mood WHERE preschool_id=? 
			AND DATE(create_timestamp)=?
			",array($preschoolId,$date));
			return $q->result_array();
		}
		if($childId!=null and $date==null){
			$q=$this->db->query("
			SELECT * FROM child_mood WHERE preschool_id=? 
			AND child_id=?
			",array($preschoolId,$childId));
			return $q->result_array();
		}
		if($childId!=null and $date!=null){
			$q=$this->db->query("
			SELECT * FROM child_mood WHERE preschool_id=? 
			AND child_id=?
			AND DATE(create_timestamp)=?
			",array($preschoolId,$childId,$date));
			return $q->result_array();
		}	
	
	}

	function getChildNote($preschoolId,$noteId){
		
		$q=$this->db->query("
		SELECT
		cn.id note_id,
		DATE(cn.`create_timestamp`) AS 'date',
		TIME(cn.`create_timestamp`) AS 'time',
		cn.type,
		cn.`picture`,
		cn.`remarks` note,
		cn.seen_by_parent status
		FROM child_notes cn
		WHERE cn.`preschool_id`=?
		AND cn.`id`=?
		ORDER BY cn.id DESC
		",array($preschoolId,$noteId));
		return $q->result_array();
		
	}

	function getChildNotes($preschoolId,$childId=null){
			if($childId!=null){
			$q=$this->db->query("
			SELECT
			cn.id note_id,
			DATE(cn.`create_timestamp`) AS 'date',
			TIME(cn.`create_timestamp`) AS 'time',
			cn.type,
			cn.`picture`,
			cn.`remarks` note,
			cn.seen_by_parent status
			FROM child_notes cn
			WHERE cn.`preschool_id`=?
			AND cn.`child_id`=?
			ORDER BY cn.id DESC
			",array($preschoolId,$childId));
			return $q->result_array();
			}else{
			
			$q=$this->db->query("
			SELECT
			cn.id note_id,
			DATE(cn.`create_timestamp`) AS 'date',
			TIME(cn.`create_timestamp`) AS 'time',
			cn.type,
			cn.`picture`,
			cn.`remarks` note,
			cn.seen_by_parent status
			FROM child_notes cn
			WHERE cn.`preschool_id`=?
			ORDER BY cn.id DESC
			",array($preschoolId));
			return $q->result_array();				
				
				
				
			}
	
	
	}

	function getChildNotesCount($preschoolId,$seenStatus,...$childId){
		$joinedChildId=implode(",",$childId);
		$q=$this->db->query("SELECT
				  COUNT(id) as notes_count
				FROM
				  child_notes
				WHERE child_id IN ({$joinedChildId})
				AND seen_by_parent=?",array($seenStatus));
		return $q->result_array()[0];
		
		
	}
	
	function getChildSleep($preschoolId,$date=null,$childId=null){
		if($childId==null and $date==null){
			$q=$this->db->query("
			SELECT * FROM child_sleep WHERE preschool_id=?
			",array($preschoolId));
			return $q->result_array();
		}
		if($childId==null and $date!=null){
			$q=$this->db->query("
			SELECT * FROM child_sleep WHERE preschool_id=? 
			AND DATE(create_timestamp)=?
			",array($preschoolId,$date));
			return $q->result_array();
		}
		if($childId!=null and $date==null){
			$q=$this->db->query("
			SELECT * FROM child_sleep WHERE preschool_id=? 
			AND child_id=?
			",array($preschoolId,$childId));
			return $q->result_array();
		}
		if($childId!=null and $date!=null){
			$q=$this->db->query("
			SELECT * FROM child_sleep WHERE preschool_id=? 
			AND child_id=?
			AND DATE(create_timestamp)=?
			",array($preschoolId,$childId,$date));
			return $q->result_array();
		}	
	
	}


	function getChildSupplies($preschoolId,$date=null,$childId=null){
		if($childId==null and $date==null){
			$q=$this->db->query("
			SELECT * FROM child_supplies WHERE preschool_id=?
			",array($preschoolId));
			return $q->result_array();
		}
		if($childId==null and $date!=null){
			$q=$this->db->query("
			SELECT * FROM child_supplies WHERE preschool_id=? 
			AND DATE(create_timestamp)=?
			",array($preschoolId,$date));
			return $q->result_array();
		}
		if($childId!=null and $date==null){
			$q=$this->db->query("
			SELECT * FROM child_supplies WHERE preschool_id=? 
			AND child_id=?
			",array($preschoolId,$childId));
			return $q->result_array();
		}
		if($childId!=null and $date!=null){
			$q=$this->db->query("
			SELECT * FROM child_supplies WHERE preschool_id=? 
			AND child_id=?
			AND DATE(create_timestamp)=?
			",array($preschoolId,$childId,$date));
			return $q->result_array();
		}	
	
	}

	
	function getChildToilet($preschoolId,$date=null,$childId=null){
		if($childId==null and $date==null){
			$q=$this->db->query("
			SELECT * FROM child_toilet WHERE preschool_id=?
			",array($preschoolId));
			return $q->result_array();
		}
		if($childId==null and $date!=null){
			$q=$this->db->query("
			SELECT * FROM child_toilet WHERE preschool_id=? 
			AND DATE(create_timestamp)=?
			",array($preschoolId,$date));
			return $q->result_array();
		}
		if($childId!=null and $date==null){
			$q=$this->db->query("
			SELECT * FROM child_toilet WHERE preschool_id=? 
			AND child_id=?
			",array($preschoolId,$childId));
			return $q->result_array();
		}
		if($childId!=null and $date!=null){
			$q=$this->db->query("
			SELECT * FROM child_toilet WHERE preschool_id=? 
			AND child_id=?
			AND DATE(create_timestamp)=?
			",array($preschoolId,$childId,$date));
			return $q->result_array();
		}	
	
	}

	
	//Set Data of Child
	function setChildData($childData){
		return $this->db->insert("child",$childData);
		
	}


	function setChildActivity($childActivityData){
		return $this->db->insert("child_activity",$childActivityData);
		
	}
	
	
	function setChildAttendancePresent($childAttendanceData){
		$date=(new DateTime("now"))->format("Y-m-d");
		$childAttendanceData["attendance_date"]=$date;
		$childAttendanceData["status"]=PRESENT;
		return $this->db->insert("child_attendance",$childAttendanceData);
		
	}	
	function setChildAttendanceAbsent($childAttendanceData){
		$date=(new DateTime("now"))->format("Y-m-d");
		$childAttendanceData["attendance_date"]=$date;
		$childAttendanceData["status"]=ABSENT;
		return $this->db->insert("child_attendance",$childAttendanceData);
		
	}	
	function setChildAttendanceLeave($childAttendanceData){
		$date=(new DateTime("now"))->format("Y-m-d");
		$childAttendanceData["attendance_date"]=$date;
		$childAttendanceData["status"]=LEAVE;
		return $this->db->insert("child_attendance",$childAttendanceData);
		
	}	
	
	
	function setChildDevelopment($childDevelopmentData){
		return $this->db->insert("child_development",$childDevelopmentData);
		
	}
	
	
	function setChildFluid($childFluidData){
		return $this->db->insert("child_fluid",$childFluidData);
		
	}
	
	
	function setChildFood($childFoodData){
		return $this->db->insert("child_food",$childFoodData);
		
	}
	
	
	function setChildHealth($childHealthData){
		return $this->db->insert("child_health",$childHealthData);
		
	}
	
	
	function setChildMood($childMoodData){
		return $this->db->insert("child_mood",$childMoodData);
		
	}
	
	
	function setChildNotes($childNotesData){
		return $this->db->insert("child_notes",$childNotesData);
		
	}
	
	
	function setChildSleep($childSleepData){
		return $this->db->insert("child_sleep",$childSleepData);
		
	}
	
	
	function setChildSupplies($childSuppliesData){
		return $this->db->insert("child_supplies",$childSuppliesData);
		
	}
	
	
	function setChildToilet($childToiletData){
		return $this->db->insert("child_toilet",$childToiletData);
		
	}

	function updateChildData($cond,$postData){
	return $this->db->where("id",$cond)
				->update("child",$postData);
		
	}
	
	function updateChildClass($childId,$classId){
		$this->db->where("id",$childId);
		return $this->db->update("child",array("class_id"=>$classId));
		
	}

}
?>