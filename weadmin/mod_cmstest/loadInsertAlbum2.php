<?php
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/classpic.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");

			if(!is_dir($core_pathname_upload."/".$_REQUEST['masterkey'])) { mkdir($core_pathname_upload."/".$_REQUEST['masterkey'],0777); }
			if(!is_dir($mod_path_album)) { mkdir($mod_path_album,0777); }  
			

			$inputGallery=$_FILES['myfile2']['tmp_name'];
			$arrfile=$_FILES['myfile2'];
			$ERROR=$_FILES['myfile2']['error'];
			$TIME=time();
			$ret = array();
			
			if(!$ERROR) {
			$myNewRand = rand(119,999);
			$filename2 = "pic2-".$_REQUEST['myID']."-".$myNewRand."";

			$p=new pic();
			$p->addpic($arrfile);
			$p->chktypepic(); 
			$ext=$p->ret(); 
			$picname2=$filename2.".".$ext;
			
			##  Real ################################################################################
			if(copy($inputGallery,$mod_path_album."/".$picname2)){
				@chmod($mod_path_album."/".$picname2,0777);
			}
			
			$imgReal = $mod_path_album."/".$picname2; // File image location
			
			
			##  Pictures ################################################################################
			$arrImgInfo=getimagesize($imgReal);
			if($arrImgInfo[0]<=($sizeWidthPic+10)){
			
				if(copy($inputGallery,$mod_path_album."/reB2_".$picname2)){
					@chmod($mod_path_real."/reB2_".$picname2,0777);
				}
			
			}else{
				$newfilename = $mod_path_album."/reB2_".$picname2; // New file name for thumb
				$w = $sizeWidthAlbum;
				$h = $sizeHeightAlbum;
				$thumbnail = resize($imgReal, $w, $h, $newfilename);
			}
			

			##  Offilce ################################################################################
			$newfilename = $mod_path_album."/reO2_".$picname2; // New file name for thumb
			$w = $sizeWidthAlbumOff;
			$h = $sizeHeightAlbumOff;
			$thumbnail = resize($imgReal, $w, $h, $newfilename);

		$insert = array();
		$insert[$mod_tb_root_albumTemp."_contantid2"] = "'".$_REQUEST['myID']."'";
		$insert[$mod_tb_root_albumTemp."_filename2"] = "'".$picname2."'";
		$insert[$mod_tb_root_albumTemp."_language"]="'".$_REQUEST['langt']."'";
		
		$sql="INSERT INTO ".$mod_tb_root_albumTemp."(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);	
		
		}
		
  echo json_encode($ret);

include("../lib/disconnect.php");
?>
