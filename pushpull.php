<?php

	//breaking string into several sequences for var store
	//$actual_link = "$_SERVER[REQUEST_URI]";
	//$ur = explode('+', $ur);
	//$parsedurl = parse_url($actual_link, PHP_URL_QUERY);
	//echo $parsedurl;
	//$segment = (explode('&', $parsedurl)); 
	// print_r('print phone');
	// print_r($segment);
	//$sms = print_r($_REQUEST);
	$msisdn = $_REQUEST['msisdn'];
	$sms = $_REQUEST['sms'];

	$sms_body = explode(' ' , $sms);


	//$sms = explode('+', $sms_body[1]);
	// print_r($sms);
	//$phone_str = explode('phone=', $segment[0]); 
	
	//allocating values to respective vars
	

	$mobile_number = $msisdn;
	$hotkey = "RST";
	// $subhotkey = $sms_body[1];
	// $name = $sms_body[2];
	// $dob = $sms_body[3];	
	// $profession = $sms_body[4];
	// $location = $sms_body[5];

	$subhotkey = !empty($sms_body[1]) ? $sms_body[1] : "NULL";
	
	$firstname = !empty($sms_body[2]) ? $sms_body[2] : "NULL";

	$lastname = !empty($sms_body[3]) ? $sms_body[3] : "NULL";

	$dob = !empty($sms_body[4]) ? $sms_body[4] : "NULL";
	
	$profession = !empty($sms_body[5]) ? $sms_body[5] : "NULL";
	
	$location = !empty($sms_body[6]) ? $sms_body[6] : "NULL";

	//$points = 100;
	

	//db con
	$conn = mysqli_connect("localhost", "root", "", "loyaltydb");
	// $phone = mysqli_real_escape_string($conn, $phone);
	// $hotkey = mysqli_real_escape_string($conn, $hotkey);
	// $subhotkey = mysqli_real_escape_string($conn, $subhotkey);
	// $name = mysqli_real_escape_string($conn, $name);
	// $dob = mysqli_real_escape_string($conn, $dob);
	// $profession = mysqli_real_escape_string($conn, $profession);
	// $location = mysqli_real_escape_string($conn, $location);
	
	$status = 0;
	$reply_body = "";
	$sublength = strlen($subhotkey);
	
	if(!$conn)
	{
		die ("Connection failed: " . mysqli_connect_error());
	}
		
	else 
	{
		$sql1 = "SELECT * FROM customerinfo WHERE mobile_number = '$mobile_number'";
		$result = mysqli_query($conn, $sql1);
		$rowcount = mysqli_num_rows($result);

		//checks if number already registered
		if($rowcount)
		{
			$reply_body = "This number is already registered";
			$status = 0;
			echo $reply_body;
			$sql2 = "INSERT INTO smslog (hotkey, msisdn, sms_body, status, reply_body ) VALUES ('$hotkey', '$msisdn', '$sms', $status, '$reply_body')";
			mysqli_query($conn, $sql2);	
		}
		else //if(!$rowcount)
		{
			//checks if format is incorrect or not
			$arrlength = count($sms_body);
			if ($arrlength < 7 || $sms_body[0] != 'RST')
			{
				$reply_body = "Invalid format, please try again";
				$status = 0;
				echo $reply_body;

				
			}
			//checks subhotkey
			
			else if ($sublength < 1 || $sublength > 3)
			{
				$reply_body = "Subhotkey is incorrect, please try again";
				$status = 0;
				$sql2 = "INSERT INTO smslog (hotkey, msisdn, sms_body, status, reply_body ) VALUES ('$hotkey', '$msisdn', '$sms', $status, '$reply_body')";
				mysqli_query($conn, $sql2);
				echo $reply_body;
				
			}
			
			else //if ($sublength > 1 && $sublength <= 3)
			{
				$sqlshop = "SELECT * FROM shop_info WHERE shop_code = '$subhotkey'";
				$res = mysqli_query($conn, $sqlshop);
				$r_count = mysqli_num_rows($res);
				//checks if subkey exist or not
				if($r_count == 0)
				{
					$reply_body = "Restaurant doesn't exist, please type the right Restaurant Code";
					$reply_body = mysqli_real_escape_string($conn, $reply_body);
					addslashes($reply_body);
					echo $reply_body;
					$status = 0;
					$sql2 = "INSERT INTO smslog (hotkey, msisdn, sms_body, status, reply_body ) VALUES ('$hotkey', '$msisdn', '$sms', $status, '$reply_body')";
					mysqli_query($conn, $sql2);
					echo $reply_body;
				}
				else 
				{
					$status = 1;
					$reply_body = "Thank you for registering, you got 100 points!";
					
					$sql2 = "INSERT INTO smslog (hotkey, msisdn, sms_body, status, reply_body ) VALUES ('$hotkey', '$msisdn', '$sms', $status, '$reply_body')";
					$sql = "INSERT INTO customerinfo (mobile_number, first_name, last_name, dob, profession, location) VALUES ('$mobile_number', '$firstname', '$lastname', '$dob', '$profession','$location')";
					mysqli_query($conn, $sql);
					mysqli_query($conn, $sql2);
					echo $reply_body;

			 		
			 	}

			}
			
		}
	}

