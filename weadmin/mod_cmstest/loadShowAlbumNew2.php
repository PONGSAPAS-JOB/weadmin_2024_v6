<?php
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/classpic.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");

			$sql_filetemp="SELECT 
			 ".$mod_tb_root_albumTemp."_id,
			 ".$mod_tb_root_albumTemp."_filename2,
			 ".$mod_tb_root_albumTemp."_download
			 
			 FROM ".$mod_tb_root_albumTemp." WHERE ".$mod_tb_root_albumTemp."_contantid2 	='".$_REQUEST['valEditID']."'   
			ORDER BY ".$mod_tb_root_albumTemp."_id ASC";
			$query_filetemp=wewebQueryDB($coreLanguageSQL,$sql_filetemp);
		 	$number_filetemp=wewebNumRowsDB($coreLanguageSQL,$query_filetemp);
			if($number_filetemp>=1){
			$valAlbum="";
			while($row_filetemp=wewebFetchArrayDB($coreLanguageSQL,$query_filetemp)){
			$linkRelativePath = $mod_path_album."/".$row_filetemp[1];
			$downloadFile = $row_filetemp[1];
			$downloadID = $row_filetemp[0];
		
			$countDownload= $row_filetemp[2];
			$imageType = strstr($downloadFile,'.');														

				$valAlbum .= "<img src=\"".$mod_path_album."/reO2_".$downloadFile."\"  width=\"50\" height=\"50\"   style=\"float:left;border:#c8c7cc solid 1px;margin-top:15px;\"  />";
				$valAlbum .= "<div style=\"width:15px; height:15px;float:left;z-index:1; margin-left:-15px;cursor:pointer;margin-right:15px;margin-top:15px;\" onclick=\"document.myForm.valDelAlbum2.value=".$downloadID.";delAlbumUpload2('deleteAlbumInsert2.php');\"  title=\"Delete file\" ><img src=\"../img/btn/delete.png\" width=\"15\" height=\"15\"  border=\"0\"/></div>";
			}}
			echo $valAlbum;


include("../lib/disconnect.php");
?>
