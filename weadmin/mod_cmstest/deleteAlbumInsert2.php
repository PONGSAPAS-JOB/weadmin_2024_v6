<?php
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");

		
	$sql_fileTemp="SELECT ".$mod_tb_root_albumTemp."_filename2  FROM ".$mod_tb_root_albumTemp." 
	WHERE ".$mod_tb_root_albumTemp."_id 	='".$_REQUEST['valDelAlbum2']."' ";
	//print_pre($sql_fileNew);
	$query_fileTemp=wewebQueryDB($coreLanguageSQL,$sql_fileTemp);
	$row_fileTemp=wewebFetchArrayDB($coreLanguageSQL,$query_fileTemp);
	$downloadFile=$row_fileTemp[0];
	if(file_exists($mod_path_album."/".$downloadFile)) {
		@unlink($mod_path_album."/".$downloadFile);
	}
		if(file_exists($mod_path_album."/reB2_".$downloadFile)) {
		@unlink($mod_path_album."/reB2_".$downloadFile);
	}	
		if(file_exists($mod_path_album."/reO2_".$downloadFile)) {
		@unlink($mod_path_album."/reO2_".$downloadFile);
	}	
		
	$sql="DELETE FROM ".$mod_tb_root_albumTemp." WHERE   ".$mod_tb_root_albumTemp."_id='".$_REQUEST['valDelAlbum2']."' ";
	$Query=wewebQueryDB($coreLanguageSQL,$sql);
	
			
		$sql="SELECT ".$mod_tb_root_albumTemp."_id,".$mod_tb_root_albumTemp."_filename2 ,".$mod_tb_root_albumTemp."_download 
		FROM ".$mod_tb_root_albumTemp." WHERE ".$mod_tb_root_albumTemp."_contantid2 	='".$_REQUEST['valEditID']."'
		 ORDER BY ".$mod_tb_root_albumTemp."_id ASC";
			$query_file=wewebQueryDB($coreLanguageSQL,$sql);
			$number_row=wewebNumRowsDB($coreLanguageSQL,$query_file);
			if($number_row>=1){
			$txtFile="";
			while($row_file=wewebFetchArrayDB($coreLanguageSQL,$query_file)){
			$linkRelativePath = $mod_path_album."/".$row_file[1];
			$downloadFile = $row_file[1];
			$downloadID = $row_file[0];
			$countDownload= $row_file[2];
			$imageType = strstr($downloadFile,'.');	
																
				$txtFile .= "<img src=\"".$mod_path_album."/reO2_".$downloadFile."\"  width=\"50\" height=\"50\"   style=\"float:left;border:#c8c7cc solid 1px;margin-top:15px;\"  />";
				$txtFile .= "<div style=\"width:15px; height:15px;float:left;z-index:1; margin-left:-15px;cursor:pointer;margin-right:15px;margin-top:15px;\" onclick=\"document.myForm.valDelAlbum2.value=".$downloadID.";delAlbumUpload2('deleteAlbumInsert2.php')\"  title=\"Delete file\" ><img src=\"../img/btn/delete.png\" width=\"15\" height=\"15\"  border=\"0\"/></div>";

									
									 }}
			echo $txtFile;
include("../lib/disconnect.php");
			
?>