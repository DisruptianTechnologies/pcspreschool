<?php

class Staff_model extends CI_Model{



	function getStaffData($preschoolId,$staffId=null){
	if($staffId==null){
		$q=$this->db->query("SELECT
					  `id` staff_id,
					  CONCAT(`first_name`,' ',`last_name`) staff_name,
					  `email`,
					  `phone_number`,
					  `dob`,
					  `role`,
					  `gender`,
					  `picture`,
					  `class_id`,
					  `start_date`,
					  `schedule_day`,
					  `country`,
					  `employed`,
					  `state`,
					  `city`,
					  `zipcode`,
					  `address`,
					  `certification_names`
					FROM
					  `staff`
					  WHERE 
					preschool_id=?
					",array($preschoolId));

		return $q->result_array();
	}else{
		$q=$this->db->query("SELECT
				  `id` staff_id,
				   CONCAT(`first_name`,' ',`last_name`) staff_name,
				   first_name,
				   last_name,
				  `email`,
				  `phone_number`,
				  `dob`,
				  `gender`,
				  `role`,
				  `picture`,
				  `class_id`,
				  `start_date`,
				  `schedule_day`,
				  `country`,
				  `state`,
				  `employed`,
				  `city`,
				  `zipcode`,
				  `address`,
				  `certification_names`
				FROM
				  `staff`
				  WHERE 
				  preschool_id=?
				  AND id=?
				",array($preschoolId,$staffId));

	return $q->result_array()[0];

	}


	}

	function getStaffByRole($preschoolId,$role){
		$q=$this->db->query("SELECT
		  `id` staff_id,
		   CONCAT(`first_name`,' ',`last_name`) staff_name,
		  `email`,
		  `phone_number`,
		  `dob`,
		  `gender`,
		  `picture`,
		  `class_id`,
		  `employed`,
		  `start_date`
		FROM
		  `staff`
		  WHERE 
		  preschool_id=?
		  AND role=?
		",array($preschoolId,$role));

	return $q->result_array();

		
	}
	
	function getStaffByEmployment($preschoolId,$employed){
		$q=$this->db->query("SELECT
		  `id` staff_id,
		   CONCAT(`first_name`,' ',`last_name`) staff_name,
		  `email`,
		  `phone_number`,
		  `dob`,
		  `gender`,
		  `picture`,
		  `class_id`,
		  `start_date`
		FROM
		  `staff`
		  WHERE 
		  preschool_id=?
		  AND employed=?
		",array($preschoolId,$employed));

	return $q->result_array();

		
	}
	
	function getClassData($preschoolId){
		$q=$this->db->query("SELECT
				  `id`,
				  `name`,
				  `preschool_id`
				FROM
				  `class` cl
				WHERE cl.`preschool_id`=?
				",array($preschoolId));
		
		return $q->result_array();
		
		
	}
	
	function getStaffAttendance($preschoolId,$date=null,$staffId=null){
		if($staffId==null and $date==null){
			$q=$this->db->query("
						SELECT  sa.staff_id,
						  CONCAT (
							s.`first_name`,
							' ',
							s.`last_name`
						  ) staff_name,
						  sa.`status`,
						  sa.`clock_in`,
						  sa.`clock_out`,
						  DATE (sa.`create_timestamp`) attendance_date
						FROM
						  staff_attendance sa
						  INNER JOIN staff s
							ON (s.`id` = sa.`staff_id`) WHERE preschool_id=?
			",array($preschoolId));
			return $q->result_array();
		}
		if($staffId==null and $date!=null){
			$q=$this->db->query("
						SELECT  sa.staff_id,
						  CONCAT (
							s.`first_name`,
							' ',
							s.`last_name`
						  ) staff_name,
						  sa.`status`,
						  sa.`clock_in`,
						  sa.`clock_out`,
						  DATE (sa.`create_timestamp`) attendance_date
						FROM
						  staff_attendance sa
						  INNER JOIN staff s
							ON (s.`id` = sa.`staff_id`) WHERE preschool_id=? 
			AND DATE(sa.create_timestamp)=?
			",array($preschoolId,$date));
			return $q->result_array();
		}
		if($staffId!=null and $date==null){
			$q=$this->db->query("
						 SELECT sa.staff_id,
						  CONCAT (
							s.`first_name`,
							' ',
							s.`last_name`
						  ) staff_name,
						  sa.`status`,
						  sa.`clock_in`,
						  sa.`clock_out`,
						  DATE (sa.`create_timestamp`) attendance_date
						FROM
						  staff_attendance sa
						  INNER JOIN staff s
							ON (s.`id` = sa.`staff_id`)
							WHERE sa.preschool_id=? 
			AND sa.staff_id=?
			",array($preschoolId,$staffId));
			return $q->result_array();
		}
		if($staffId!=null and $date!=null){
			$q=$this->db->query("
						SELECT sa.staff_id,
						  CONCAT (
							s.`first_name`,
							' ',
							s.`last_name`
						  ) staff_name,
						  sa.`status`,
						  sa.`clock_in`,
						  sa.`clock_out`,
						  DATE (sa.`create_timestamp`) attendance_date
						FROM
						  staff_attendance sa
						  INNER JOIN staff s
							ON (s.`id` = sa.`staff_id`)
							WHERE preschool_id=? 
			AND sa.staff_id=?
			AND DATE(sa.create_timestamp)=?
			",array($preschoolId,$staffId,$date));
			return $q->result_array();
		}	

	}
	
	function getStaffAttendanceLimit($preschoolId,$staffId=null,$limit=100){
		if($staffId==null){
			$q=$this->db->query("SELECT
						  sa.staff_id,
						  CONCAT (
							s.`first_name`,
							' ',
							s.`last_name`
						  ) staff_name,
						  sa.`status`,
						  sa.`clock_in`,
						  sa.`clock_out`,
						  DATE (sa.`create_timestamp`) attendance_date
						FROM
						  staff_attendance sa
						  INNER JOIN staff s
							ON (s.`id` = sa.`staff_id`)
						WHERE sa.preschool_id=?
						ORDER BY sa.id DESC
						LIMIT ?
					",array($preschoolId,$limit));	
			return $q->result_array();
			
		}
		else{
			$q=$this->db->query("SELECT
						  sa.staff_id,
						  CONCAT (
							s.`first_name`,
							' ',
							s.`last_name`
						  ) staff_name,
						  sa.`status`,
						  sa.`clock_in`,
						  sa.`clock_out`,
						  DATE (sa.`create_timestamp`) attendance_date
						FROM
						  staff_attendance sa
						  INNER JOIN staff s
							ON (s.`id` = sa.`staff_id`)
						WHERE sa.`staff_id` = ?
						ORDER BY sa.id DESC
				LIMIT ?",array($staffId,$limit));	
			return $q->result_array();
		}
		
		
	}
	
	function getStaffName($preschoolId,$employed){
		$q=$this->db->query("SELECT
						  s.id,
						  CONCAT(s.first_name, ' ', s.last_name) staff_name
						FROM
						  staff s
						WHERE 
						s.preschool_id=?
						AND s.employed =?",array($preschoolId,$employed));
		$result=array();
		foreach ($q->result_array() as $row)
		{
			$result[$row['id']]=ucwords(strtolower($row['staff_name']));
		}
		
		return $result;

	}
	
	function getStaffAttendanceCount($preschoolId,$date=null){
		$q=$this->db->query("SELECT
				  COUNT(sa.`id`) AS ct_staff
				FROM
				  `staff_attendance` sa
				WHERE sa.preschool_id=?
				AND sa.status=1
				AND DATE(sa.`create_timestamp`)=?
				",array($preschoolId,$date));
		return $q->result_array()[0];
		
		
	}

	function getStaffEmployedCount($preschoolId,$employed){
			
			$q=$this->db->query("
				SELECT 
					COUNT(ch.id) as ct_total
				FROM `staff` ch
				WHERE ch.preschool_id=?
				AND ch.employed=?
			",array($preschoolId,$employed));
				
			return $q->result_array()[0];				
		
	}
	
	function getStaffLastClockIn($preschoolId,$staffId){
		$q=$this->db->query(
		"SELECT
	  sa.`status`,
	  sa.`clock_in`,
	  sa.clock_out,
	  DATE (sa.`create_timestamp`) clock_date
	FROM
	  staff_attendance sa
	WHERE sa.`preschool_id` = ?
	  AND sa.`staff_id` = ?
	    ORDER BY id DESC
	LIMIT 1
		",array($preschoolId,$staffId));
		$st=$q->num_rows();
		if($st>0){
		
		return $q->result_array()[0];
		}
		else{
		return false;	
		}
		
		// return $q->result_array()[0];

	}
	
	function getHolidaybyMonth($preschoolId,$month,$year,$limit=null){
		if($limit==null){
		$q=$this->db->query("SELECT ho.holiday_date FROM holiday ho WHERE month(ho.holiday_date)=? AND year(ho.holiday_date)=? AND ho.preschool_id=?"
		,array($month,$year,$preschoolId));
		if($q->num_rows()>0){
		$result=array_merge_recursive(...$q->result_array());
		}
		$result["count"]=$q->num_rows();
		return $result;
		}
		else{
		$q=$this->db->query("SELECT ho.holiday_date FROM holiday ho WHERE month(ho.holiday_date)=? AND year(ho.holiday_date)=? AND ho.preschool_id=?
		AND ho.holiday_date<?"
		,array($month,$year,$preschoolId,$limit));
		if($q->num_rows()>0){

		$result=array_merge_recursive(...$q->result_array());
		}
		$result["count"]=$q->num_rows();
		return $result;
		}
		
	}

	//21-04-2020
	//pass PreschoolId to get its announcements ordered by creation time
	function getPreschoolAnnouncements($preschoolId,$announcementId=null){
		if($announcementId==null){
	$q=$this->db->query("
			SELECT 
		pann.`id` announcement_id,
		pann.`topic`,
		pann.`description`,
		pann.`attachment`,
		DATE(pann.`create_timestamp`) 'date',
		TIME(pann.`create_timestamp`) 'time'
		FROM 
		preschool_announcements pann
		WHERE pann.`preschool_id` =?
		ORDER BY pann.id DESC
	",array($preschoolId));
	return $q->result_array();
		}
		else{
	$q=$this->db->query("
			SELECT 
		pann.`id` announcement_id,
		pann.`topic`,
		pann.`description`,
		pann.`attachment`,
		DATE(pann.`create_timestamp`) 'date',
		TIME(pann.`create_timestamp`) 'time'
		FROM 
		preschool_announcements pann
		WHERE pann.`preschool_id` =?
		AND pann.`id` =?
		ORDER BY pann.id DESC
	",array($preschoolId,$announcementId));
	return $q->result_array()[0];
		}
	}		
	
	function getAllPreschoolActivity($preschoolId,$joined=null){
		if($joined!=null){
		$q=$this->db->query("
		SELECT
		  GROUP_CONCAT(ap.`id`) 'id',
		  GROUP_CONCAT(ap.`name`) 'name',
		  GROUP_CONCAT(ap.`description`) 'description',
		  GROUP_CONCAT(ap.`remarks`) 'remarks',
		  GROUP_CONCAT(ap.class_id) class_id,
		  ap.`activity_date`,
		  GROUP_CONCAT(ap.`create_timestamp`) create_timestamp
		FROM
		  `activity_planned` ap
		GROUP BY ap.`activity_date`
		ORDER BY activity_date DESC
		");
		return $q->result_array();
		}else{
			
		$q=$this->db->where("preschool_id",$preschoolId)
					->order_by("activity_date",'DESC')
					->get("activity_planned");
					
		return $q->result_array();
			
		}
		
	}
	
	function getPreschoolActivity($preschoolId,$id){
		$q=$this->db->query("
		SELECT
		  ap.`id`,
		  ap.`name`,
		  ap.class_id,
		  ap.`description` 'description',
		  ap.`remarks` 'remarks',
		  ap.`activity_date`,
		  ap.`create_timestamp` create_timestamp
		FROM
		  `activity_planned` ap
		WHERE
		ap.preschool_id=?
		ap.`id`=?
		",array($preschoolId,$id));
		return $q->result_array()[0];
		
	
	}

	function getPreschoolActivityByMonth($preschoolId,$month,$year){
		$q=$this->db->query("
		SELECT
		  ap.`id`,
		  ap.`name`,
		  ap.class_id,
		  ap.`description` 'description',
		  ap.`remarks` 'remarks',
		  ap.`activity_date`,
		  ap.`create_timestamp` create_timestamp
		FROM
		  `activity_planned` ap
		WHERE
		ap.preschool_id=?
		AND	MONTH(ap.`activity_date`)=?
		AND YEAR(ap.`activity_date`)=?
		",array($preschoolId,$month,$year));
		return $q->result_array();
		
	
	}
	
	function getClassName($arr){
		$temp_arr="(".implode(",",$arr).")";
		if(strlen($temp_arr)==2){
			return false;
		}
		$q=$this->db->query(
		"SELECT
	  GROUP_CONCAT(class.`name`) class_name
	FROM
	  class
	WHERE class.`id` IN  $temp_arr"
			);
	return $q->result_array()[0]["class_name"];
	}
	
	function getMealPlan($preschoolId){
		$q=$this->db->query("
			SELECT
		  `id`,
		  `preschool_id`,
		  `meal`,
		  `meal_weekday`,
		  `create_timestamp`
		FROM
		  `meal_plan`
		  WHERE preschool_id=?
		ORDER BY meal_weekday 

		",array($preschoolId));
		
		return $q->result_array();
		
	}
	function getParentCommunicateChat($preschoolId,$parentId){
		$q=$this->db->query("
		SELECT
		  `id`,
		  `preschool_id`,
		  `parent_id`,
		  `sent`,
		  `message`,
		  `create_timestamp`
		FROM
		  `parent_communication`
		WHERE parent_id=?
		AND preschool_id=?
		",array($parentId,$preschoolId));
		
		return $q->result_array();
	}

	function getStaffCommunicateChat($preschoolId,$staffId){
		$q=$this->db->query("
		SELECT
		  `id`,
		  `preschool_id`,
		  `staff_id`,
		  `sent`,
		  `message`,
		  `create_timestamp`
		FROM
		  `staff_communication`
		WHERE staff_id=?
		AND preschool_id=?
		",array($staffId,$preschoolId));
		
		return $q->result_array();
	}
	
	function getGalleryData($preschoolId){
		$q=$this->db->query(
		"SELECT
		  `id`,
		  `picture`,
		  `preschool_id`,
		  DATE(`create_timestamp`) 'date',
		  TIME(`create_timestamp`) 'time'
		FROM
		  `gallery`
		  WHERE preschool_id=?
		ORDER BY id DESC
		",array($preschoolId));
				
		return $q->result_array();

	}
	
	function getClassFeesData($preschoolId,$classId=null){
		if($classId==null){
			$q=$this->db->query(
				"SELECT
			  cf.`id` class_fees_id,
			  cf.`class_id`,
			  cf.`fees_type`,
			  cf.`amount`,
			  cf.`description`,
			  cf.`last_date`,
			  cl.`name` class_name,
			  cf.`create_timestamp`,
			  cf.`update_timestamp`
			FROM
			  `class_fees` cf
			  INNER JOIN class cl ON(cl.`id`=cf.`class_id`)
			WHERE cf.preschool_id=?
				"
			,array($preschoolId));
			return $q->result_array();
		}else{
			$q=$this->db->query(
			"SELECT
			  cf.`id` class_fees_id,
			  cf.`class_id`,
			  cf.`preschool_id`,
			  cf.`fees_type`,
			  cf.`amount`,
			  cf.`description`,
			  cf.`last_date`,
			  cl.`name` class_name,
			  cf.`create_timestamp`,
			  cf.`update_timestamp`
			FROM
			  `class_fees` cf
			  INNER JOIN class cl ON(cl.`id`=cf.`class_id`)
			WHERE cf.preschool_id=?
			AND cf.class_id=?
			"
			,array($preschoolId,$classId));
			return $q->result_array();			
		}
		
	}
	
	function getRemainingChildFees($preschoolId,$classId,$childId,$remaining){
		if($remaining==PAID){
			$q=$this->db->query("
			SELECT
			  cf.`id` class_fees_id,
			  cf.`class_id`,
			  cf.`preschool_id`,
			  cf.`fees_type`,
			  cf.`amount`,
			  cf.`description`,
			  cf.`last_date`,
			  cl.`name` class_name,
			  cf.`create_timestamp`,
			  cf.`update_timestamp`
			  fs.payment_date,
			  fs.transaction_id
			FROM
			  `class_fees` cf
			  INNER JOIN class cl
				ON (cl.`id` = cf.`class_id`)
			INNER JOIN fees fs ON (fs.`class_fees_id`=cf.`id` AND fs.`child_id`=?)
			WHERE cl.`id`=?
			and cf.preschool_id=?
			",array($childId,$classId,$preschoolId));
			return $q->result_array();
		}elseif($remaining==UNPAID){
			$q=$this->db->query("
			 SELECT
			  cf.`id` class_fees_id,
			  cf.`class_id`,
			  cf.`preschool_id`,
			  cf.`fees_type`,
			  cf.`amount`,
			  cf.`description`,
			  cf.`last_date`,
			  cl.`name` class_name,
			  cf.`create_timestamp`,
			  cf.`update_timestamp`
			FROM
			  `class_fees` cf
			  INNER JOIN class cl ON(cl.`id`=cf.`class_id` AND cl.`id`=?)
			WHERE cf.id NOT IN(SELECT fs.`class_fees_id` FROM fees fs WHERE fs.`child_id`=?)
			",array($classId,$childId));
			return $q->result_array();
			
			
		}
	}
	
	function getChildFees($preschoolId,$childId=null){
		if($childId==null){
		$q=$this->db->query("
		SELECT
		  fs.`id` fees_id,
		  fs.`child_id`,
		  CONCAT(cs.`first_name`,' ',cs.`last_name`) child_name,
		  fs.`preschool_id`,
		  fs.`payment_date`,
		  fs.`payment_amount`,
		  fs.`class_fees_id`,
		  fs.`transaction_id`,
		  fs.`create_timestamp`,
		  fs.`update_timestamp`,
		  clfs.`amount`,
		  clfs.`description`,
		  clfs.`fees_type`,
		  clfs.`last_date` class_fees_last_date,
		  cl.name class_name,
		  cs.roll_no
		FROM
		  `fees` fs
		  INNER JOIN class_fees clfs
			ON (fs.`class_fees_id` = clfs.`id`)
		  INNER JOIN class cl
			ON (cl.`id` = clfs.`class_id`)
		  INNER JOIN child cs ON(cs.`id`=fs.`child_id`)
		WHERE fs.`preschool_id`=?
		ORDER BY fs.id DESC
		",array($preschoolId));
		return $q->result_array();
		}else{
		$q=$this->db->query("
		SELECT
		  fs.`id` fees_id,
		  fs.`child_id`,
		  CONCAT(cs.`first_name`,' ',cs.`last_name`) child_name,
		  fs.`preschool_id`,
		  fs.`payment_date`,
		  fs.`payment_amount`,
		  fs.`class_fees_id`,
		  fs.`transaction_id`,
		  fs.`create_timestamp`,
		  fs.`update_timestamp`,
		  clfs.`amount`,
		  clfs.`description`,
		  clfs.`fees_type`,
		  clfs.`last_date` class_fees_last_date,
		  cl.name class_name,
		  cs.roll_no
		FROM
		  `fees` fs
		  INNER JOIN class_fees clfs
			ON (fs.`class_fees_id` = clfs.`id`)
		  INNER JOIN class cl
			ON (cl.`id` = clfs.`class_id`)
		  INNER JOIN child cs ON(cs.`id`=fs.`child_id`)
		WHERE fs.`preschool_id`=?
		AND fs.child_id=?
		ORDER BY fs.id DESC
		",array($preschoolId,$childId));
		return $q->result_array();
		}
		
		
	}
	
	function setStaffData($staffData){
		$this->db->insert("staff",$staffData);
		$lastId=$this->db->insert_id();
		if($this->setStaffPassword($staffData["preschool_id"],$lastId,$staffData["phone_number"])){
			return $lastId;
		}else{
			return false;
		}
		

	}
	
	

	function setStaffClockIn($preschoolId,$staffId){
		$date = new DateTime("now");
		
		$staffData=array(
		"staff_id"=>$staffId,
		"preschool_id"=>$preschoolId,
		"clock_in"=>$date->format('H:i:s'),
		"status"=>PRESENT
		);
		
		return $this->db->insert("staff_attendance",$staffData);

	}

	function setStaffAbsent($preschoolId,$staffId){
		
		$staffData=array(
		"staff_id"=>$staffId,
		"preschool_id"=>$preschoolId,
		"status"=>ABSENT
		);
		
		return $this->db->insert("staff_attendance",$staffData);

	}

	function setStaffLeave($preschoolId,$staffId){
		
		$staffData=array(
		"staff_id"=>$staffId,
		"preschool_id"=>$preschoolId,
		"status"=>LEAVE
		);
		
		return $this->db->insert("staff_attendance",$staffData);

	}


	function setStaffClockOut($preschoolId,$staffId){
		$date = new DateTime("now");
		
		$staffData=array(
		"clock_out"=>$date->format('H:i:s'),
		);
		
		$this->db->where(array("clock_out"=>null,"staff_id"=>$staffId));
		$this->db->update("staff_attendance",$staffData);

	}


	function setStaffPassword($preschoolId,$staffId,$password){
		$newPassword=password_hash($password, PASSWORD_BCRYPT);
		 
		$this->db->where(array("id"=>$staffId));
		return $this->db->update("staff",array("password"=>$newPassword));
		
	}

	function setClass($classData){
		return $this->db->insert("class",$classData);		
	}

	function setPreschoolAnnouncement($announcementData){
		if($this->db->insert("preschool_announcements",$announcementData))
			return $this->db->insert_id();
		else
			return False;

		
		
	}
	
	function setPreschoolActivity($activityData){
		
		return $this->db->insert("activity_planned",$activityData);
		
		
	}
	function setMealPlan($mealData){
		$check=array(
		"meal_weekday"=>$mealData["meal_weekday"],
		"preschool_id"=>$mealData["preschool_id"]
		
		);
		$q=$this->db->where($check)
					->get("meal_plan");
		if($q->num_rows()>0){
		$cond=$q->result_array()[0]["id"];
		return $this->db->where("id",$cond)->update("meal_plan",$mealData);
		}else{
			
		return $this->db->insert("meal_plan",$mealData);
			
		}
		
	}

	function setClassFeesData($feesData){
		$check=array(
		"class_id"=>$feesData["class_id"],
		"preschool_id"=>$feesData["preschool_id"],
		"fees_type"=>$feesData["fees_type"],
		"description"=>$feesData["description"]
		
		);
		$q=$this->db->where($check)
					->get("class_fees");
		if($q->num_rows()>0){
		$cond=$q->result_array()[0]["id"];
		return $this->db->where("id",$cond)->update("class_fees",$feesData);
		}else{
			
		return $this->db->insert("class_fees",$feesData);
			
		}
		
	}
	
	function setChildFees($feesData){
		return $this->db->insert("fees",$feesData);		

	}
	
	function setGalleryRecord($galleryData){
		return $this->db->insert("gallery",$galleryData);

		
	}
	
	function setParentCommunicateChat($chatData){
		
		return $this->db->insert("parent_communication",$chatData);
		
	}

	function setStaffCommunicateChat($chatData){
		
		return $this->db->insert("staff_communication",$chatData);
		
	}
	
	
	
	//Settings
	
	function getPreschoolData($preschoolId){
		$q=$this->db->where("id",$preschoolId)
		->get("preschool");
		return $q->result_array();
	}
	
	function updatePreschoolData($preschoolId,$postData){
		
		return $this->db->where("id",$preschoolId)
				->update("preschool",$postData);
		
	}
	
	function updateStaffData($cond,$postData){
	return $this->db->where("id",$cond)
				->update("staff",$postData);
		
	}


}
?>