<?PHP error_reporting(0); ?>
<?php include("partial/db.php"); ?>
<?php require("partial/settings.php"); ?>
<?php require("partial/class.phpmailer.php"); ?>
<?PHP
$api_status = "0";
$api_message = "-";
$action = "";	
$today_time = date("YmdHis");
$global_secret_key = $api_key;

$error_array = array(
"001" => "Email telah digunakan", 
"002" => "User tidak ditemukan", 
"003" => "Wrong Pass Key", 
"004" => "No Action Parameter", 
"005" => "No Score Set", 
"006" => "Stage is not Set", 
"007" => "Question is not Set", 
"008" => "Password tidak boleh kosong", 
"009" => "Password salah", 
"010" => "Pertanyaan telah dijawab", 
"011" => "No HP telah digunakan",
"012" => "Nama tidak boleh kosong",
"013" => "Email tidak boleh kosong",
"014" => "No HP tidak boleh kosong",
"015" => "Content Name is not Set",
"016" => "Identifier is not set",
"017" => "Upload size too big",
"018" => "Upload fail",
"019" => "User sudah melakukan ini",
"020" => "Artist is not exist",
"021" => "Anda memasukkan Kode yang salah",
"022" => "Barang sudah di ambil. Ayo cari yang lain lagi.",
"023" => "Paging is not set",
"024" => "Employee atau Agen Tidak ditemukan",
"025" => "Id Agen Tidak boleh kosong",
"026" => "Id Agen Telah dipakai",
"027" => "User telah registrasi"
);


function SendEmail($Email, $Title, $Content, $Attach = "") { 
	$status = "0";	
	$mail = new PHPMailer();    
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	
	$mail->Host = 'mail.rentaltouchscreen.com'; 
	$mail->Port = 465;  

	$mail->Username = 'asd@asdasdasd.com'; 
	$mail->Password = "asdads1234";	
	$mail->From = 'admin@asd.com'; 
	$mail->FromName = 'ZURICH FESTIVAL';
		
	//$mail->SMTPDebug  = 2;
	$mail->SMTPSecure = "ssl";
	
	$mail->AddAddress($Email);
	//$mail->AddBCC("teddy_tanzil_t@yahoo.com");
	//$mail->AddBCC("bobymgl@yahoo.com");
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
function FillError($code, &$api_status, &$api_message){
	global $error_array;
	if($code != "" && $code != null) {
		$api_status = $code;
		$api_message = $error_array[$code];
	}
}
function RandomKey($length, $number = FALSE) {
    $pool = array_merge(range(0, 9), range('A', 'Z'));
    if ($number) {
        $pool = array_merge(range(0, 9));
    }
    $key = '';
    for ($i = 0; $i < $length; $i++) {
        $key .= $pool[mt_rand(0, count($pool) - 1)];
    }
    return $key;
}

function GenQR($Id, $IdAgen){
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'upload/qrcode'.DIRECTORY_SEPARATOR;
    $PNG_WEB_DIR = 'upload/qrcode/';
    include "phpqrcode/qrlib.php";    
    
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
    $filepathname = $PNG_TEMP_DIR.'test.png';
    
    /*L,M,Q,H*/
    $errorCorrectionLevel = 'H';
	/*1-10*/
    $matrixPointSize = 6;
	$keyword = "zurich";
	$data = md5($Id)."|".$keyword;
	
	//$data = $Id."|".$Phone."|".$keyword;
	//$data = $Id."|".$Phone."|".$Email;
    //$data = "13|081360149004|teddy.tanzil.t@gmail.com";
	
	$filename = $Id.'_'.$IdAgen.'.png';
	$filepathname = $PNG_TEMP_DIR.$Id.'_'.$IdAgen.'.png';
	
    QRcode::png($data, $filepathname, $errorCorrectionLevel, $matrixPointSize, 2);    
    
	return $filename;
}


if(isset($_POST["action"])){
	$action = $_POST["action"];
	$secret_key = $_POST["secret_key"];
				
	$sql = "INSERT INTO apilog VALUES (NOW(), '".json_encode($_POST)."')";
	mysql_query($sql);		

	if($secret_key != $global_secret_key){
		FillError("003", $api_status, $api_message);
		$json = array("status" => $api_status, "message" => $api_message);
        header('Content-Type: application/json');
        echo json_encode($json);
		exit;
	}

	if($action == "login"){		
		$Phone = $_POST["Phone"];
		$IdAgen = $_POST["IdAgen"];
		$dataDataArray = array();
		$dataArray = null;
		
		if($api_status == "0"){
			$sqlData = "SELECT COUNT(*) AS CountData FROM tbuser WHERE STATUS = 'A' AND Phone = '".$Phone."' AND WebRegis = 1 ";
			$queryData = mysql_query($sqlData);	
			$dataExist = false;		
			while($dataData = mysql_fetch_array($queryData)){ 
				$CountData = $dataData['CountData'];
				if(intval($CountData) > 0){
					$dataExist = true;
				}
			}
			if(!$dataExist){
				FillError("002", $api_status, $api_message);
			}
		}
		if($api_status == "0"){



			$sqlData = "SELECT COUNT(*) AS CountData FROM tbuser WHERE STATUS = 'A' AND Phone = '".$Phone."' AND (IdAgen = '".$IdAgen."' OR Email = '".$IdAgen."') AND WebRegis = 1 ";
			$queryData = mysql_query($sqlData);	
			$dataExist = false;	

			while($dataData = mysql_fetch_array($queryData)){ 
				$CountData = $dataData['CountData'];
				if(intval($CountData) > 0){
					$dataExist = true;
				}
			}
			if(!$dataExist){
				FillError("024", $api_status, $api_message);
			}
		}
		
		if($api_status == "0"){
			$sqlData = "SELECT tbuser.* FROM tbuser ".
						"WHERE tbuser.Status = 'A' AND tbuser.Phone = '".$Phone."' AND WebRegis = 1 LIMIT 1";
			$queryData = mysql_query($sqlData);	
			while($dataData = mysql_fetch_array($queryData)){ 
				/*$dataDataArray[] =  array(*/
				$dataArray =  array(
					"Id" => $dataData['Id'], 
					"Title" => $dataData['Title'],
					"Name" => $dataData['Name'],
					"Email" => $dataData['Email'],
					"Age" => $dataData['Age'],
					"Phone" => $dataData['Phone'],
					"Address" => $dataData['Address'],
					"IdAgen" => $dataData['IdAgen']
				);
			}
		}
		
		$json = array("status" => $api_status, "message" => $api_message, "user" => $dataArray);
        header('Content-Type: application/json');
        echo json_encode($json);
	}
	
	if($action == "register"){	
		$Email = $_POST["Email"];
		$Age = $_POST["Age"];
		$Address = $_POST["Address"];
		$Name = $_POST["Name"];
		$Phone = $_POST["Phone"];
		$IdAgen = $_POST["IdAgen"];
		$Employee = $_POST["Employee"];
		$Agent = $_POST["Agent"];
		$user_id = null;
		$dataArray = null;
		$Title = "";
		$EmployeeAgent = 1;
		if($Employee == 1){
			$EmployeeAgent = 1;	//Employee
		} else {
			$EmployeeAgent = 0; //Agent
		}
		
		if($api_status=="0"){	
			if($Name=="" || $Name==NULL){	
				FillError("012", $api_status, $api_message);
			}
		}
		
		if($EmployeeAgent == 1){
			if($api_status=="0"){	
				if($Email=="" || $Email==NULL){	
					FillError("013", $api_status, $api_message);
				}
			}
		}
		
		if($api_status=="0"){	
			if($Phone=="" || $Phone==NULL){	
				FillError("014", $api_status, $api_message);
			}
		}
		
		if($EmployeeAgent == 0){
			if($api_status=="0"){	
				if($IdAgen=="" || $IdAgen==NULL){	
					FillError("025", $api_status, $api_message);
				}
			}
		}
		
		if($EmployeeAgent == 1){
			if($api_status=="0"){	
				$sqlData = "SELECT COUNT(*) AS CountData FROM tbuser WHERE STATUS = 'A' AND UPPER(Email) = UPPER('".$Email."')";
				$queryData = mysql_query($sqlData);	
				$dataExist = false;		
				while($dataData = mysql_fetch_array($queryData)){ 
					$CountData = $dataData['CountData'];
					if(intval($CountData) > 0){
						$dataExist = true;
					}
				}
				if(!$dataExist){
					FillError("002", $api_status, $api_message);
				}
			}

			if($api_status=="0"){	
				$sqlData = "SELECT COUNT(*) AS CountData FROM tbuser WHERE STATUS = 'A' AND UPPER(Email) = UPPER('".$Email."') AND WebRegis = 1 ";
				$queryData = mysql_query($sqlData);	
				$dataExist = false;		
				while($dataData = mysql_fetch_array($queryData)){ 
					$CountData = $dataData['CountData'];
					if(intval($CountData) > 0){
						$dataExist = true;
					}
				}
				if($dataExist){
					FillError("027", $api_status, $api_message);
				}
			}

			if($api_status=="0"){	
				$sqlData = "SELECT COUNT(*) AS CountData FROM tbuser WHERE STATUS = 'A' AND Phone = '".$Phone."' AND UPPER(Email) != UPPER('".$Email."') AND WebRegis = 1";
				$queryData = mysql_query($sqlData);	
				$dataExist = false;		
				while($dataData = mysql_fetch_array($queryData)){ 
					$CountData = $dataData['CountData'];
					if(intval($CountData) > 0){
						$dataExist = true;
					}
				}
				if($dataExist){
					FillError("011", $api_status, $api_message);
				}
			}
		}
			
		if($EmployeeAgent == 0){
			if($api_status=="0"){	
				$sqlData = "SELECT COUNT(*) AS CountData FROM tbuser WHERE STATUS = 'A' AND UPPER(IdAgen) = UPPER('".$IdAgen."')";
				$queryData = mysql_query($sqlData);	
				$dataExist = false;		
				while($dataData = mysql_fetch_array($queryData)){ 
					$CountData = $dataData['CountData'];
					if(intval($CountData) > 0){
						$dataExist = true;
					}
				}
				if(!$dataExist){
					FillError("024", $api_status, $api_message);
				}
			}

			if($api_status=="0"){	
				$sqlData = "SELECT COUNT(*) AS CountData FROM tbuser WHERE STATUS = 'A' AND UPPER(IdAgen) = UPPER('".$IdAgen."') AND WebRegis = 1 ";
				$queryData = mysql_query($sqlData);	
				$dataExist = false;		
				while($dataData = mysql_fetch_array($queryData)){ 
					$CountData = $dataData['CountData'];
					if(intval($CountData) > 0){
						$dataExist = true;
					}
				}
				if($dataExist){
					FillError("027", $api_status, $api_message);
				}
			}

			if($api_status=="0"){	
				$sqlData = "SELECT COUNT(*) AS CountData FROM tbuser WHERE STATUS = 'A' AND Phone = '".$Phone."' AND UPPER(IdAgen) != UPPER('".$IdAgen."') AND WebRegis = 1";
				$queryData = mysql_query($sqlData);	
				$dataExist = false;		
				while($dataData = mysql_fetch_array($queryData)){ 
					$CountData = $dataData['CountData'];
					if(intval($CountData) > 0){
						$dataExist = true;
					}
				}
				if($dataExist){
					FillError("011", $api_status, $api_message);
				}
			}
		}

		if($api_status == "0"){
			if($EmployeeAgent == 1){ 
				$sqlData = "SELECT tbuser.* FROM tbuser ".
							"WHERE tbuser.Status = 'A' AND UPPER(tbuser.Email) = UPPER('".$Email."') LIMIT 1";
				$queryData = mysql_query($sqlData);	
				while($dataData = mysql_fetch_array($queryData)){ 
					$user_id = $dataData['Id'];
				}

				$sql = "UPDATE tbuser SET ".
						"Name = '".$Name."' , ".
						"Email = '".$Email."' , ".
						"Phone = '".$Phone."' , ".
						"WebRegis = 1  ".
						"WHERE Id = '".$user_id."' ";
				mysql_query($sql);
			} else {
				$sqlData = "SELECT tbuser.* FROM tbuser ".
							"WHERE tbuser.Status = 'A' AND UPPER(tbuser.IdAgen) = UPPER('".$IdAgen."') LIMIT 1";
				$queryData = mysql_query($sqlData);	
				while($dataData = mysql_fetch_array($queryData)){ 
					$user_id = $dataData['Id'];
				}

				$sql = "UPDATE tbuser SET ".
						"Name = '".$Name."' , ".
						"IdAgen = '".$IdAgen."' , ".
						"Phone = '".$Phone."',  ".
						"WebRegis = '1'  ".
						"WHERE Id = '".$user_id."' ";
				mysql_query($sql);
			}
			$api_message = "Register Successfull";
		}
		
		if($api_status=="0"){	
			$sqlData = "SELECT tbuser.* FROM tbuser ".
							"WHERE tbuser.Status = 'A' AND tbuser.Id = '".$user_id."' LIMIT 1";
			$queryData = mysql_query($sqlData);	
			while($dataData = mysql_fetch_array($queryData)){ 
				/*$dataDataArray[] =  array(*/
				$dataArray =  array(
					"Id" => $dataData['Id'], 
					"Title" => $dataData['Title'],
					"Name" => $dataData['Name'],
					"Email" => $dataData['Email'],
					"Age" => $dataData['Age'],
					"Phone" => $dataData['Phone'],
					"Address" => $dataData['Address'],
					"IdAgen" => $dataData['IdAgen']
				);
			}
		}

		if($api_status=="0"){
			$QRCode = GenQR($dataArray['Id'], $dataArray['IdAgen']);
			$sql = "UPDATE tbuser SET QRCode = '".$QRCode."' WHERE Id = ".$dataArray['Id']." ";
			mysql_query($sql);
				
			$QrGen = "1";
			$sql = "UPDATE tbuser SET QrGen = '".$QrGen."' WHERE Id = ".$dataArray['Id']." ";
			mysql_query($sql);
		}
		
		$json = array("status" => $api_status, "message" => $api_message, "user" => $dataArray);
        header('Content-Type: application/json');
        echo json_encode($json);
	}
	
	if($action == "get_content"){		
		$Name = $_POST["Content"];
		
		if($api_status=="0"){	
			if($Name=="" || $Name==NULL){	
				FillError("015", $api_status, $api_message);
			}
		}
		
		if($api_status=="0"){	
			$sqlData = "SELECT * FROM tbcontent WHERE Name = '".$Name."' AND Status = 'A'";
			$queryData = mysql_query($sqlData);	
			$dataArray = array();
			while($dataData = mysql_fetch_array($queryData)){ 
				$dataArray =  array(
					"Name" => $dataData['Name'],
					"Content" => $base_url.$dataData['Content']
				);
			}
		}
		
		$json = array("status" => $api_status, "message" => $api_message, "content" => $dataArray);
        header('Content-Type: application/json');
        echo json_encode($json);
	}
	
} else {
	if(isset($_GET["action"])){
		$action = $_GET["action"];	
		
		if($action == "1"){
			
		}
		
	} else {
		FillError("004", $api_status, $api_message);
		$json = array("status" => $api_status, "message" => $api_message);
        header('Content-Type: application/json');
        echo json_encode($json);
		exit;
	}
}
?>