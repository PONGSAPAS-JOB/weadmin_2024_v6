<?php
## Mod Table ###################################
$mod_tb_root = "md_cmstest"; 
$mod_tb_root_group = "md_cmg";

$mod_tb_file = "md_cmf";
$mod_tb_fileTemp = "md_cmtp";
$mod_tb_root_album = "md_cma";
$mod_tb_root_albumTemp = "md_cmatp";

## Mod Folder ###################################
$mod_fd_root = "mod_cmstest";

$mod_fd_frontUrl = "career/list";
$mod_fd_frontdetailUrl = "career/detail";
## Setting Value ###################################
$modTxtShowPic=array("แสดงรูปภาพในหน้ารายละเอียด","ไม่แสดง","แสดง");
$modGroupType =array("","รายละเอียดภายในเว็บไซต์" ,"เชื่อมโยงภายนอก");
$modTxtTarget=array("","เปิดหน้าต่างเดิม","เปิดหน้าต่างใหม่");

## Setting Value Status  ###################################
$modTxtStatusName=array("Home","Enable","Disable");
$mod_array_search =array();
array_push($mod_array_search,'<input name="inputStatusName" type="hidden" id="inputStatusName" value="'.$_REQUEST['inputStatusName'].'" />');

## URL Search ###################################
$mod_url_search_th = "th/news_detail";
$mod_url_search_en = "en/news_detail";


## Size Photo ###################################
$sizeWidthPic="265";
$sizeHeightPic="175";

$sizeWidthPicG="580";
$sizeHeightPicG="295";

$sizeWidthOff="50";
$sizeHeightOff="50";

$sizeWidthAlbum="980";
$sizeHeightAlbum="490";

$sizeWidthAlbumOff="250";
$sizeHeightAlbumOff="125";

## Mod Path RSS ###################################
$mod_fullpath_pictures  = $core_fullpath_rss."/".$masterkey."/pictures";
## Mod Path ###################################

$mod_path_html        = $core_pathname_upload."/".$masterkey."/html";
$mod_path_html_fornt  = $core_pathname_upload_fornt."/".$masterkey."/html";

$mod_path_file        = $core_pathname_upload."/".$masterkey."/file";
$mod_path_file_fornt  = $core_pathname_upload_fornt."/".$masterkey."/file";

$mod_path_pictures        = $core_pathname_upload."/".$masterkey."/pictures";
$mod_path_pictures_fornt  = $core_pathname_upload_fornt."/".$masterkey."/pictures";

$mod_path_office        = $core_pathname_upload."/".$masterkey."/office";
$mod_path_office_fornt  = $core_pathname_upload_fornt."/".$masterkey."/office";

$mod_path_real        = $core_pathname_upload."/".$masterkey."/real";
$mod_path_real_fornt  = $core_pathname_upload_fornt."/".$masterkey."/real";

$mod_path_album        = $core_pathname_upload."/".$masterkey."/album";
$mod_path_album_fornt  = $core_pathname_upload_fornt."/".$masterkey."/album";

$mod_path_vdo        = $core_pathname_upload."/".$masterkey."/vdo";
$mod_path_vdo_fornt  = $core_pathname_upload_fornt."/".$masterkey."/vdo";

?>
