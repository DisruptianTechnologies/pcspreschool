<?php



function sellipses($string,$limit){
	if(strlen($string)>=$limit){
	return substr($string,0,$limit-3).'...';
	}
	else{
		return $string;
	}
	
}

function weekday_num_to_text($array,$arrkey){
	$arr=$array;
	$weekdayTemp=array("monday","tuesday","wednesday","thursday","friday","saturday","sunday");
		foreach($array as $key=>$val){
			$arr[$key][$arrkey]=$weekdayTemp[$val[$arrkey]];
				// echo "<pre>";
				// print_r($arr[$key][$arrkey]);
				// echo "</pre>";

		}
	
	return $arr;
	
}

function num_to_weekday($weekday){
	if(is_array($weekday)){
		$temp=array();
		foreach($weekday as $day){
			$temp[]=num_to_weekday($day);
		}
			return $temp;
	}
	else{
	return array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday")[$weekday];
	}
}

function json_to_str($json){
	$a=json_decode($json);
	if(is_array($a)){
	return implode(',',array_map('ucfirst',$a));
	}
	else{
	return $a;
	}
}

function check_today_attendance($lastattendancedate,$status){
	if($lastattendancedate==(new DateTime("now"))->format("Y-m-d")){
		if($status==1){	
			return "Present";
		}elseif($status==0){
			return "Absent";
		}elseif($status==2){
			return "Leave";
		}
		
		
		
		
	}
	else{
		
		return "Undefined";
	}

}

function attendance_status($status){
	
	if(strlen($status)>0)
	return array("Absent","Present","Leave")[$status];
	else{
		return "None";
	}
}

function uploadPicture($pic,$path,$nameConvention,$redirectLink){

		$ci =& get_instance();
		$config=array();
		$config['upload_path']          = $path;
		$config['allowed_types']        = 'jpg|png|webp';
		$config['max_size']             = 2048;
		$config['max_width']            = 1024;
		$config['max_height']           = 1024;
		$config['file_name']			=$nameConvention."_".rand(0,999)."_".time();

		$ci->upload->initialize($config);	
		
		if ( !$ci->upload->do_upload($pic))
		{
				$ci->session->set_flashdata('error',$ci->upload->display_errors());
			
				redirect($redirectLink);
		}				
		else{
				return $path.$ci->upload->data('file_name');
			
		}

	
}

function uploadToGallery($pic,$nameConvention,$redirectLink){

		$ci =& get_instance();
		$config=array();
		$path="./px-includes/preschool/img/";
		$config['upload_path']          = $path;
		$config['allowed_types']        = 'jpg|png|webp';
		$config['max_size']             = 6048;
		$config['file_name']			=$nameConvention."_".rand(0,999)."_".time();

		$ci->upload->initialize($config);	
		
		if ( !$ci->upload->do_upload($pic))
		{
				$ci->session->set_flashdata('error',$ci->upload->display_errors());
			
				redirect($redirectLink);
		}				
		else{
				return $path.$ci->upload->data('file_name');
			
		}

	
}

function uploadAttachment($file,$fileType,$redirectLink){
		$ci =& get_instance();
		if($fileType=="pdf"){
			$path="./px-includes/preschool/pdf/";
		}
		else{
			$path="./px-includes/preschool/img/";
		}

		$config=array();
		$config['upload_path']          = $path;
		$config['allowed_types']        = 'jpg|pdf|png|webp';
		$config['max_size']             = 4048;

		$config['file_name']			=rand(0,999)."_".time();

		$ci->upload->initialize($config);	
		
		if ( !$ci->upload->do_upload($file))
		{
				$ci->session->set_flashdata('error',$ci->upload->display_errors());
			
				redirect($redirectLink);
		}				
		else{
				return $path.$ci->upload->data('file_name');
			
		}

}

function num_to_seen($num){
	return array("Unseen","Seen")[$num];

}
	
function in_json_checkbox($f,$json){
	$arr=json_decode($json);
	if($arr){
		if( in_array($f,$arr)){
			return "checked";
		}
	}
}

function in_array_select($a,$b){
	if($a==$b)
		return "selected";
	
}

function num_to_role($a){
	
return array("Staff","Admin")[$a];	
}

function num_to_employment($a){

return array("Not Employed","Employed")[$a];	

}

function get_last_value($uri){
	$last_value=array_pop($ar);
	return $last_value;
}

function num_to_month($num){
	
return array("January","February","March","April","May","June","July","August","September","October","November","December")[$num-1];	
	
}

function num_to_fees_type($a){
	return array("Regular","Other")[$a];
	
}


function sendingSMS($message,$to,$setting){
	
	
	$curl = curl_init();
	$postfield=array(
	"sender"=>$setting["msg91_sender_id"],
	"country"=>"91",
	"route"=>"4",
	"sms"=>array(array(
			"message"=>$message,
			"to"=>$to)
			)
	);
	// echo json_encode($postfield);
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://api.msg91.com/api/v2/sendsms",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => json_encode($postfield),
	  CURLOPT_SSL_VERIFYHOST => 0,
	  CURLOPT_SSL_VERIFYPEER => 0,
	  CURLOPT_HTTPHEADER => array(
		"authkey: ".$setting["msg91_auth_key"],
		"content-type: application/json"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  echo $response;
	}	
	
}

function sendingMail($setting,$fromAlias,$to,$subject,$message){
	
	$ci =& get_instance();

	$config["protocol"]='smtp';
	$config["smtp_host"]=$setting["smtp_host"];
	$config["smtp_port"]=$setting["smtp_port"];
	$config["smtp_timeout"]='7';
	$config["smtp_user"]=$setting["smtp_mail_address"];
	$config["smtp_pass"]=$setting["smtp_pass"];
	$config["charset"]='utf-8';
	$config["mailtype"]="\r\n";
	$config["validation"]= FALSE;
	
	$ci->email->initialize($config);
	
	$ci->email->from($setting["smtp_mail_address"],$fromAlias);
	$ci->email->to($to);
	$ci->email->subject($subject);
	$ci->email->message($message);

	if($ci->email->send()){
		echo true;
	}else{
		echo false;
	}
}

?>
