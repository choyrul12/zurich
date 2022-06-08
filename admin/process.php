<?php session_start(); ?>
<?PHP error_reporting(0); ?>
<?php include("../partial/settings.php"); ?>
<?php include("../partial/db.php"); ?>
<?php include("../partial/class.upload.php"); ?>
<?PHP
$err_code = "";
$location = "index.php";
/*
1 login wrong
2 group name already used
3 email already used
4 pass can't be blank
5 upload fail
*/
	
function UploadProcess(&$handle, $title) {
	global $dir_pics, $dir_dest;
	$handle->Process($dir_dest);
	if ($handle->processed) {
		/*echo 'ok';*/
	} else {
		/*echo '  Error: ' . $handle->error . '';*/
   }
}
if(isset($_POST["action"])){
	$action = $_POST["action"];	
	$today_time = date("YmdHis");
	/*login*/
	if($action == "1"){
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		if($username == $admin_user && $password == $admin_pass){
			
		} else {
			$err_code = "1";
		}
		
		/*Validation*/
		if($err_code == ""){	
			$_SESSION[$session_name] = $session_value;
			$location = $default_page;
		} else {
			$location = "login.php?e=1"; /*with error*/
		}
	}
	
	/*add group*/
	if($action == "2"){
		$Name = $_POST["Name"];
		
		$sqlData = "SELECT COUNT(*) AS CountData FROM tbgroup WHERE STATUS = 'A' AND Name = '".$Name."'";
		$queryData = mysql_query($sqlData);	
		$dataExist = false;		
		while($dataData = mysql_fetch_array($queryData)){ 
			$CountData = $dataData['CountData'];
			if(intval($CountData) > 0){
				$dataExist = true;
			}
		}
		if($dataExist){
			$err_code = "2";
		}
		
		if($err_code == ""){
			$sql = "INSERT INTO tbgroup (Name,CreatedOn,Status)  VALUES ('".$Name."', NOW(),'A')";
			mysql_query($sql);		
			$group_id = mysql_insert_id();
			
			$location = "group.php?a=1&s=".$group_id;
		} else {
			$location = "group_add.php?a=0&e=".$err_code; /*with error*/
		}
	}
	
	/*edit group*/
	if($action == "3"){
		$Id = $_POST["Id"];
		$Name = $_POST["Name"];
		
		$sqlData = "SELECT COUNT(*) AS CountData FROM tbgroup WHERE STATUS = 'A' AND Name = '".$Name."' AND Id != '".$Id."'";
		$queryData = mysql_query($sqlData);	
		$dataExist = false;		
		while($dataData = mysql_fetch_array($queryData)){ 
			$CountData = $dataData['CountData'];
			if(intval($CountData) > 0){
				$dataExist = true;
			}
		}
		if($dataExist){
			$err_code = "2";
		}
		
		if($err_code == ""){
			$sql = "UPDATE tbgroup SET Name = '".$Name."', ModifiedOn = NOW() WHERE Id = '".$Id."'";
			mysql_query($sql);		
			
			$location = "group.php?a=1&s=".$Id;
		} else {
			$location = "group_edit.php?a=0&e=".$err_code."&Id=".$Id; /*with error*/
		}
	}

	/*edit user*/
	if($action == "4"){
		$Id = $_POST["Id"];
		$Email = $_POST["Email"];
		$Name = $_POST["Name"];
		$IdAgen = $_POST["IdAgen"];
		$Phone = $_POST["Phone"];
		
		if($err_code == ""){
			$sql = "UPDATE tbuser SET ".
					"Title = '".$Title."', ".
					"Name = '".$Name."', ".
					"Email = '".$Email."', ".
					"IdAgen = '".$IdAgen."', ".
					"Phone = '".$Phone."', ".
					"ModifiedOn = NOW() ".
					"WHERE Id = '".$Id."'";
			mysql_query($sql);		
			
			$location = "user.php?a=1&s=".$Id;
		} else {
			$location = "user_edit.php?a=0&e=".$err_code."&Id=".$Id; /*with error*/
		}
	}
	
	/*upload gallery*/
	if($action == "5"){
		$Name = $_POST["Name"]; 
		$Photo = $_POST["Photo"]; 
		$ThumbName = "";
		$PhotoName = "";
		
		if(isset($_FILES['Photo'])){
			$today_time = date("YmdHis");
			$file = $_FILES['Photo'];
			$UploadFile = $file['name'];
			$FileParts = explode(".",$UploadFile);
			$Name = $FileParts[0];
			$Extension = end($FileParts);	 
			$handle = new Upload($file);
			if ($handle->uploaded) {
				$dir_dest = "../upload";
				$dir_dest_name = "upload";
				$handle->Process($dir_dest);
				if ($handle->processed) {
					/*echo 'ok';*/
				} else {
					$err_code = "5";
				}
			} else {
				$err_code = "5";
			}

			if ($handle->uploaded) {
				if (!file_exists($dir_dest)) mkdir($dir_dest);
				$handle->file_new_name_body = $today_time."";
				$handle->file_new_name_ext = $Extension;
				$handle->file_overwrite = true;
				//$handle->image_resize         = true;
				//$handle->image_x              = 1024;
				//$handle->image_ratio_y        = true;
				UploadProcess($handle, 'File originale', '');
				
				$PhotoName = $dir_dest_name."/".$today_time.".".$Extension;
				
				$handle->file_new_name_body = $today_time."_thumb";
				$handle->file_new_name_ext = $Extension;
				$handle->file_overwrite = true;
				$handle->image_resize         = true;
				$handle->image_x              = 256;
				$handle->image_y              = 256;
				//$handle->image_ratio_y        = true;
				UploadProcess($handle, 'File originale', '');
				
				$ThumbName = $dir_dest_name."/".$today_time."_thumb.".$Extension;
			} else {
				$err_code = "5";
			}
		}
		
		if($err_code == ""){
			$sql = "INSERT INTO tbgallery (Name,GalleryThumb,GalleryImage,CreatedOn,Status)  VALUES ('".$Name."','".$ThumbName."','".$PhotoName."', NOW(),'A')";
			mysql_query($sql);		
			$group_id = mysql_insert_id();
			
			$location = "gallery.php?a=1&s=".$Id;
		} else {
			$location = "gallery_add.php?a=0&e=".$err_code."&Id=".$Id; /*with error*/
		}
	}
	
	
	/*add game*/
	if($action == "6"){
		$UserId = $_POST["UserId"];
		$GameId = $_POST["GameId"];
		$Score = $_POST["Score"];
		
		$GroupId = "";
		$Stage = 0;
		$Quest = 0;
		
		$sqlData = "SELECT * FROM tbuser WHERE Status = 'A' AND Id = '".$UserId."' LIMIT 1";
		$queryData = mysql_query($sqlData);	
		while($dataData = mysql_fetch_array($queryData)){ 
			$GroupId = $dataData['GroupId'];
		}
		
		if($err_code == ""){
			$sql = "INSERT INTO tbgameplay (GroupId,UserId,GameId,Stage,Quest,Score,CreatedOn,Status)  VALUES 
			('".$GroupId."','".$UserId."','".$GameId."', '".$Stage."', '".$Quest."', '".$Score."', NOW(),'A')";
			mysql_query($sql);		
			
			$location = "scoring.php?a=1&s=".$Id;
		} else {
			$location = "scoring_edit.php?a=0&e=".$err_code."&Id=".$Id; /*with error*/
		}
	}
	
	/*add prize*/
	if($action == "7"){
		$Name = $_POST["Name"];
		
		$sqlData = "SELECT COUNT(*) AS CountData FROM tbprize WHERE STATUS = 'A' AND Name = '".$Name."'";
		$queryData = mysql_query($sqlData);	
		$dataExist = false;		
		while($dataData = mysql_fetch_array($queryData)){ 
			$CountData = $dataData['CountData'];
			if(intval($CountData) > 0){
				$dataExist = true;
			}
		}
		if($dataExist){
			$err_code = "2";
		}
		
		if($err_code == ""){
			$sql = "INSERT INTO tbprize (Name,CreatedOn,Status)  VALUES ('".$Name."', NOW(),'A')";
			mysql_query($sql);		
			$prize_id = mysql_insert_id();
			
			$location = "prize.php?a=1&s=".$prize_id;
		} else {
			$location = "prize.php?a=0&e=".$err_code; /*with error*/
		}
	}
	
	/*edit prize*/
	if($action == "8"){
		$Id = $_POST["Id"];
		$Name = $_POST["Name"];
		
		$sqlData = "SELECT COUNT(*) AS CountData FROM tbprize WHERE STATUS = 'A' AND Name = '".$Name."' AND Id != '".$Id."'";
		$queryData = mysql_query($sqlData);	
		$dataExist = false;		
		while($dataData = mysql_fetch_array($queryData)){ 
			$CountData = $dataData['CountData'];
			if(intval($CountData) > 0){
				$dataExist = true;
			}
		}
		if($dataExist){
			$err_code = "2";
		}
		
		if($err_code == ""){
			$sql = "UPDATE tbprize SET Name = '".$Name."', ModifiedOn = NOW() WHERE Id = '".$Id."'";
			mysql_query($sql);		
			
			$location = "prize.php?a=1&s=".$Id;
		} else {
			$location = "prize_edit.php?a=0&e=".$err_code."&Id=".$Id; /*with error*/
		}
	}
	
	/*add doorprize*/
	if($action == "9"){
		$Name = $_POST["Name"];
		$BriId = $_POST["BriId"];
		$PrizeId = $_POST["PrizeId"];
		
		if($err_code == ""){
			$sql = "INSERT INTO tbdoorprize (Name,BriId,PrizeId,CreatedOn,Status)  VALUES ('".$Name."','".$BriId."','".$PrizeId."', NOW(),'A')";
			mysql_query($sql);		
			$prize_id = mysql_insert_id();
			
			$location = "doorprize.php?a=1";
		} else {
			$location = "doorprize.php?a=0&e=".$err_code; /*with error*/
		}
	}

	/*add user*/
	if($action == "10"){
		$Email = $_POST["Email"];
		$Name = $_POST["Name"];
		$IdAgen = $_POST["IdAgen"];
		//$Phone = $_POST["Phone"];
		
		if($err_code == ""){
			$sql = "INSERT INTO tbuser (Name,Email,IdAgen,Age) Value ".
					"('".$Name."','".$Email."','".$IdAgen."','')";
			mysql_query($sql);		
			
			$location = "user.php?a=1&s=".$Id;
		} else {
			$location = "user_add.php?a=0&e=".$err_code."&Id=".$Id; /*with error*/
		}
	}

} else {
	if(isset($_GET["action"])){
		$action = $_GET["action"];
		
		if($action == "1"){
			$Id = $_GET["Id"];
			$sqlData = "UPDATE tbuser SET Status = 'D' WHERE Id = '".$Id."'";
			mysql_query($sqlData);
			$location = "user.php"; 
		}
		
		if($action == "2"){
			$Id = $_GET["Id"];
			$sqlData = "UPDATE tbgallery SET Status = 'D' WHERE Id = '".$Id."'";
			mysql_query($sqlData);
			$location = "gallery.php"; 
		}
		
		if($action == "3"){
			$Id = $_GET["Id"];
			$sqlData = "UPDATE tbdraftgallery SET Status = 'D' WHERE Id = '".$Id."'";
			mysql_query($sqlData);
			$location = "draft.php"; 
		}
		
		if($action == "4"){
			$Id = $_GET["Id"];
			$DraftImage = "";
			
			$today_time = date("YmdHis");
			$_parent_folder = "../";
			$_upload_folder = "upload/";
			$_temp_folder = "upload/temp/";
			$_draft_folder = "upload/draft/";
			
			$sqlData = "SELECT * FROM tbdraftgallery WHERE Status = 'A' AND Id = '".$Id."' LIMIT 1";
			$queryData = mysql_query($sqlData);	
			while($dataData = mysql_fetch_array($queryData)){ 
				$DraftImage = $dataData['DraftImage'];
			}
			
			$filename = $_parent_folder.$DraftImage;
			$filetype = 1;   /*1 png  2 jpg*/
			$fileorient = 1;   /*1 P  2 L*/
			$fileext = "png";   /*png  jpg*/
			
			$fileinfo = getimagesize($filename);
			if( strpos( $fileinfo['mime'], 'png' ) !== false ){
				$filetype = 1;
				$fileext = "png";
			} else if( strpos( $fileinfo['mime'], 'jpeg' ) !== false ){
				$filetype = 2;
				$fileext = "jpg";
			}
			
			list($width, $height) = getimagesize($filename);
			if($height >= $width){ /*P*/
				$fileorient = 1;
			} else { /* L */
				$fileorient = 2;
			}
				
			if($fileorient == 2){					
				/*rotate*/
				$degrees = 270;
				$rotate_source = null;
				if($filetype == 1){
					$rotate_source = imagecreatefrompng($filename);
				} else if($filetype == 2){
					$rotate_source = imagecreatefromjpeg($filename);
				}
				$rotate_result = imagerotate($rotate_source, $degrees, 0);
				
				$rotate_name = "rotate".$today_time.".".$fileext;
				$filename = $_parent_folder.$_temp_folder.$rotate_name;
				if($filetype == 1){
					imagepng($rotate_result, $_parent_folder.$_temp_folder.$rotate_name);
				} else if($filetype == 2){
					imagejpeg($rotate_result, $_parent_folder.$_temp_folder.$rotate_name);
				}
				imagedestroy($rotate_source);
				imagedestroy($rotate_result);
			}
			
			/*resize*/
			list($width, $height) = getimagesize($filename);
			$newwidth = 730; //620 old 579 new
			$newheight = 1035; //1030 old 953 new
			$resize_thumb = imagecreatetruecolor($newwidth, $newheight);
			$resize_source = null;
			if($filetype == 1){
				$resize_source = imagecreatefrompng($filename);
			} else if($filetype == 2){
				$resize_source = imagecreatefromjpeg($filename);
			}
			imagecopyresized($resize_thumb, $resize_source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

			$resize_name = "resize".$today_time.".".$fileext;
			$filename = $_parent_folder.$_temp_folder.$resize_name;
			if($filetype == 1){
				imagepng($resize_thumb, $_parent_folder.$_temp_folder.$resize_name);
			} else if($filetype == 2){
				imagejpeg($resize_thumb, $_parent_folder.$_temp_folder.$resize_name);
			}
			imagedestroy($resize_source);
			imagedestroy($resize_thumb);
			
			/*watermark*/
			$frame = "t1.png";
			$random_gen = rand(1, 5);
			if($random_gen == 1){
				$frame = "t1.png";
			} else if($random_gen == 2){
				$frame = "t2.png";
			} else if($random_gen == 3){
				$frame = "t3.png";
			} else if($random_gen == 4){
				$frame = "t4.png";
			} else if($random_gen == 5){
				$frame = "t5.png";
			} 
			
			$stamp = imagecreatefrompng($_parent_folder.$_upload_folder.$frame);
			$stamp_source = null;
			if($filetype == 1){
				$stamp_source = imagecreatefrompng($filename);
			} else if($filetype == 2){
				$stamp_source = imagecreatefromjpeg($filename);
			}
			
			$marge_right = 0;
			$marge_bottom = 0;
			$sx = imagesx($stamp);
			$sy = imagesy($stamp);
			imagecopy($stamp_source, $stamp, imagesx($stamp_source) - $sx - $marge_right, imagesy($stamp_source) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
			
			$stamp_result = $today_time.".".$fileext;
			$filename = $_parent_folder.$_upload_folder.$stamp_result;
			if($filetype == 1){
				imagepng($stamp_source, $_parent_folder.$_upload_folder.$stamp_result);
			} else if($filetype == 2){
				imagejpeg($stamp_source, $_parent_folder.$_upload_folder.$stamp_result);
			}
			imagedestroy($stamp_source);

			
			/*thumb resize*/
			list($width, $height) = getimagesize($filename);
			$newwidth = 256;
			$newheight = 256;
			$resize_thumb = imagecreatetruecolor($newwidth, $newheight);
			$resize_source = null;
			if($filetype == 1){
				$resize_source = imagecreatefrompng($filename);
			} else if($filetype == 2){
				$resize_source = imagecreatefromjpeg($filename);
			}
			imagecopyresized($resize_thumb, $resize_source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

			$resize_name = $today_time."_thumb.".$fileext;
			$filename = $_parent_folder.$_upload_folder.$resize_name;
			if($filetype == 1){
				imagepng($resize_thumb, $_parent_folder.$_upload_folder.$resize_name);
			} else if($filetype == 2){
				imagejpeg($resize_thumb, $_parent_folder.$_upload_folder.$resize_name);
			}
			imagedestroy($resize_source);
			imagedestroy($resize_thumb);
			
			if (file_exists($_parent_folder.$_temp_folder."rotate".$today_time.".".$fileext)) { unlink($_parent_folder.$_temp_folder."rotate".$today_time.".".$fileext); } 
			if (file_exists($_parent_folder.$_temp_folder."resize".$today_time.".".$fileext)) { unlink($_parent_folder.$_temp_folder."resize".$today_time.".".$fileext); } 	
				
			
			if($err_code == ""){
				$Name = $today_time;
				$ThumbName = $_upload_folder.$today_time."_thumb.".$fileext;
				$PhotoName = $_upload_folder.$today_time.".".$fileext;
				$sql = "INSERT INTO tbgallery (Name,GalleryThumb,GalleryImage,CreatedOn,Status)  VALUES ('".$Name."','".$ThumbName."','".$PhotoName."', NOW(),'A')";
				mysql_query($sql);		
				
				$sql = "UPDATE tbdraftgallery SET Approved = 1 WHERE Id = '".$Id."'";
				mysql_query($sql);		
			} else {
				$location = "draft.php?a=0&e=".$err_code."&Id=".$Id; /*with error*/
			}
			$location = "draft.php";
		}
		
		if($action == "5"){
			$Id = $_GET["Id"];
			$sqlData = "UPDATE tbprize SET Status = 'D' WHERE Id = '".$Id."'";
			mysql_query($sqlData);
			$location = "prize.php"; 
		}
		
		if($action == "6"){
			$Id = $_GET["Id"];
			$sqlData = "UPDATE tbdoorprize SET Status = 'D' WHERE Id = '".$Id."'";
			mysql_query($sqlData);
			$location = "doorprize.php"; 
		}
		
		if($action == "7"){
			$Id = $_GET["Id"];
			$sqlData = "UPDATE tbgift SET FlagAmbil = '1' WHERE Id = '".$Id."'";
			mysql_query($sqlData);
			$location = "gift.php"; 
		}
		
		if($action == "8"){
			$Id = $_GET["Id"];
			$sqlData = "UPDATE tbuser SET FlagAmbil = '1' WHERE Id = '".$Id."'";
			mysql_query($sqlData);
			$location = "quizwinner.php"; 
		}
		
	}	
}
header('Location:'.$location);
die();
?>