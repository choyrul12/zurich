<?php session_start(); ?>
<?PHP error_reporting(0); ?>
<?php include("partial/db.php"); ?>
<?php require("partial/settings.php"); ?>
<?php include("partial/class.upload.php"); ?>
<?php require("partial/class.phpmailer.php"); ?>
<?PHP
$action = "";	
$err_code = "";
$location = "index.php";
$today_time = date("YmdHis");
$base_url = "http://localhost:81/zurich/";
$upload_folder = "upload";
$upload_draft_folder = "upload/draft";


function clean_value($input_value){	
	if($input_value != NULL && $input_value != ""){
		$separator = array("/", "[", "]",  "!", "#", "$", "%", "^", "&", "*", "(", ")", "+", "=", "{", "}", "|", "\\", ":", ";", "<", ">", "?", "\"", "'");
		$output_value = str_replace($separator, "", $input_value."");	
		return $output_value;
	}
} 	
function UploadProcess(&$handle, $title) {
	global $dir_pics, $dir_dest;
	$handle->Process($dir_dest);
	if ($handle->processed) {
		/*echo 'ok';*/
	} else {
		/*echo '  Error: ' . $handle->error . '';*/
   }
}
function SendEmail($Email, $Title, $Content, $Attach = "") { 
	$status = "0";	
	$mail = new PHPMailer();    
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	
	$mail->Host = 'mail.rentaltouchscreen.com'; 
	$mail->Port = 465;  

	$mail->Username = 'lenovo@rentaltouchscreen.com'; 
	$mail->Password = "lenovo12345";	
	$mail->From = 'rsvp@lenovopartnerforum.com'; 
	$mail->FromName = 'Lenovo Invitation';
		
	//$mail->SMTPDebug  = 2;
	$mail->SMTPSecure = "ssl";
	
	$mail->AddAddress($Email);
	$mail->AddBCC("teddy_tanzil_t@yahoo.com");
	$mail->AddBCC("bobymgl@yahoo.com");
	$mail->Subject = $Title;								
	$mail->MsgHTML($Content);
	
	if($Attach != ""){
		$mail->AddAttachment($Attach, "E-Download.jpg");
	}
	
	if(!$mail->send()) {
		//echo $mail->ErrorInfo;
		$status = 0;
	} else {
		//echo "success";
		$status = 1;
	}
	return $status;
}

if(isset($_POST["action"])){
	$action = $_POST["action"];
	$today_time = date("YmdHis");
	$source = $_POST["source"];
	
	if($action == "1"){
	
		$err_code = "";
		if($_FILES['GalleryUpload']['name'] != ""){
			$file = $_FILES['GalleryUpload'];
			$GalleryUpload = $file['name'];
			$FileParts = explode(".",$GalleryUpload);
			$Name = $FileParts[0];
			$Extension = end($FileParts);	 
			$handle = new Upload($file);
			$dir_dest = $upload_draft_folder;
			if (!file_exists($dir_dest)) mkdir($dir_dest);
			if ($handle->uploaded) {					
				$handle->Process($dir_dest);
				if ($handle->processed) {
					/*echo 'ok';*/
				} else {
					$err_code = "18";
				}
			} else {
				$err_code = "18";
			}
			if ($handle->uploaded) {
				$FileName = $dir_dest."/".$handle->file_dst_name;
				$sql = "INSERT INTO tbdraftgallery (UserId,DraftImage)  VALUES ('".$_SESSION["SessionUserId"]."','".$FileName."')";
				mysql_query($sql);	
			} else {
				$err_code = "1";
			}
		}
		if($err_code != ""){
			$location = "galleryhome.php?a=-1&e=".$err_code;
		} else {
			$location = "galleryhome.php?a=1";
		}
	}
	
	
} else {
	if(isset($_GET["action"])){
		$action = $_GET["action"];	
		$today_time = date("YmdHis");
		/*logout*/
		if($action == "1"){
			unset($_SESSION['SessionUserId']);
			unset($_SESSION['SessionUserName']);
			unset($_SESSION['SessionUserEmail']);
			unset($_SESSION['SessionUserPhone']);
			unset($_SESSION['SessionIdAgen']);
			unset($_SESSION['SessionGroupId']);
			session_destroy();
			$location = "index.php";
		}
		
		if($action == "2"){
			$Id = $_GET["Id"];	
			$sqlData = "SELECT tbuser.* FROM tbuser ".
							"WHERE tbuser.Status = 'A' AND tbuser.Id = '".$Id."' LIMIT 1";
			$queryData = mysql_query($sqlData);	
			while($dataData = mysql_fetch_array($queryData)){ 
				$dataArray =  array(
					"Id" => $dataData['Id'], 
					"Title" => $dataData['Title'],
					"Name" => $dataData['Name'],
					"Email" => $dataData['Email'],
					"Age" => $dataData['Age'],
					"Phone" => $dataData['Phone'],
					"Address" => $dataData['Address'],
					"GroupId" => $dataData['GroupId'],
					"IdAgen" => $dataData['IdAgen']
				);
			}
			
			$_SESSION["SessionUserId"] = $dataArray['Id'];
			$_SESSION["SessionUserName"] = $dataArray['Name'];
			$_SESSION["SessionUserEmail"] = $dataArray['Email'];
			$_SESSION["SessionUserPhone"] = $dataArray['Phone'];
			$_SESSION["SessionIdAgen"] = $dataArray['IdAgen'];
			$_SESSION["SessionGroupId"] = $dataArray['GroupId'];
			
			$location = "dashboard.php";
		}
		
		if($action == "3"){
			$Id = $_GET["Id"];	
			$sqlData = "SELECT tbuser.* FROM tbuser ".
							"WHERE tbuser.Status = 'A' AND tbuser.Id = '".$Id."' LIMIT 1";
			$queryData = mysql_query($sqlData);	
			while($dataData = mysql_fetch_array($queryData)){ 
				$dataArray =  array(
					"Id" => $dataData['Id'], 
					"Title" => $dataData['Title'],
					"Name" => $dataData['Name'],
					"Email" => $dataData['Email'],
					"Age" => $dataData['Age'],
					"Phone" => $dataData['Phone'],
					"Address" => $dataData['Address'],
					"GroupId" => $dataData['GroupId'],
					"IdAgen" => $dataData['IdAgen']
				);
			}
			
			$_SESSION["SessionUserId"] = $dataArray['Id'];
			$_SESSION["SessionUserName"] = $dataArray['Name'];
			$_SESSION["SessionUserEmail"] = $dataArray['Email'];
			$_SESSION["SessionUserPhone"] = $dataArray['Phone'];
			$_SESSION["SessionIdAgen"] = $dataArray['IdAgen'];
			$_SESSION["SessionGroupId"] = $dataArray['GroupId'];
			
			//$location = "status.php?c=1";
			$location = "dashboard.php";
		}
		
	} else {
		/*No Action*/
		$location = "index.php";
	}
}
header('Location:'.$location);
die();
?>