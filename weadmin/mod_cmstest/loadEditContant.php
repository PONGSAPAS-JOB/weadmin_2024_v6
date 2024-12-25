<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("config.php");
include("incModLang.php");

$valClassNav=2;
$valNav1=$langTxt["nav:home2"];
$valLinkNav1="../core/index.php";


			$sql = "SELECT   ";
			$sql .= "   ".$mod_tb_root."_id as  id, ".$mod_tb_root."_credate as credate , ".$mod_tb_root."_crebyid as crebyid, ".$mod_tb_root."_status as status,    ".$mod_tb_root."_sdate  as sdate	,    ".$mod_tb_root."_edate as edate ,    ".$mod_tb_root."_pic as pic , ".$mod_tb_root."_pic2 as pic2 , ".$mod_tb_root."_type as type , ".$mod_tb_root."_filevdo as filevdo, ".$mod_tb_root."_url as url,  ".$mod_tb_root."_gid as gid   ";

			if($_REQUEST['inputLt']=="Thai"){
				$sql .= " , ".$mod_tb_root."_subject as subject , ".$mod_tb_root."_subject2 as subject2  ,    ".$mod_tb_root."_title as title , ".$mod_tb_root."_title2 as title2, ".$mod_tb_root."_htmlfilename as htmlfilename  , ".$mod_tb_root."_htmlfilename2 as htmlfilename2  ,    ".$mod_tb_root."_metatitle  as	metatitle 	,    ".$mod_tb_root."_description as description  ,    ".$mod_tb_root."_keywords as keywords   ";
			}elseif($_REQUEST['inputLt']=="Eng"){
				$sql .= " , ".$mod_tb_root."_subjecten as subjecten  ,    ".$mod_tb_root."_titleen as titleen , ".$mod_tb_root."_htmlfilenameen as htmlfilenameen   ,    ".$mod_tb_root."_metatitleen as metatitleen  ,    ".$mod_tb_root."_descriptionen as descriptionen 	 ,    ".$mod_tb_root."_keywordsen as keywordsen   ";
			}else{
				$sql .= " , ".$mod_tb_root."_subjectcn as subjectcn  ,    ".$mod_tb_root."_titlecn as titlecn , ".$mod_tb_root."_htmlfilenamecn as htmlfilenamecn   ,    ".$mod_tb_root."_metatitlecn as metatitlecn  ,    ".$mod_tb_root."_descriptioncn as descriptioncn	 ,    ".$mod_tb_root."_keywordscn as keywordscn   ";
			}


			$sql .= " , ".$mod_tb_root."_picshow as picshow ,".$mod_tb_root."_picshow2 as picshow2, ".$mod_tb_root."_typec as typec,  ".$mod_tb_root."_typec2 as typec2, ".$mod_tb_root."_urlc as urlc, ".$mod_tb_root."_urlc2 as urlc2, ".$mod_tb_root."_target as target,  ".$mod_tb_root."_target2 as target2, ".$mod_tb_root."_outdesc as outdesc	FROM ".$mod_tb_root." WHERE ".$mod_tb_root."_masterkey='".$_POST["masterkey"]."' AND  ".$mod_tb_root."_id 	='".$_POST["valEditID"]."'";
			$Query=wewebQueryDB($coreLanguageSQL,$sql);
			$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
			// $Row=wewebNumRowsDB($coreLanguageSQL,$Query);
			$valid=$Row['id'];
			$valcredate=DateFormatInsertRe($Row['credate']);
			$valcreby=$Row['crebyid'];
			$valstatus=$Row['status'];
			if($Row['sdate']!="0000-00-00 00:00:00"){
			$valSdate=DateFormatInsertRe($Row['sdate']);
			}
			if($Row['edate']!="0000-00-00 00:00:00"){
			$valEdate=DateFormatInsertRe($Row['edate']);
			}
			$valPicName=$Row['pic'];
			$valPic=$mod_path_pictures."/".$Row['pic'];

			$valPicName2=$Row['pic2'];
			$valPic2=$mod_path_pictures."/".$Row['pic2'];
			$valType=$Row['type'];
			$valFilevdo=$Row['filevdo'];
			$valPathvdo=$mod_path_vdo."/".$Row['filevdo'];
			$valUrl=$Row['url'];
			$valGid=$Row['gid'];

			$valSubject=rechangeQuot($Row['subject']);
			$valSubject2=rechangeQuot($Row['subject2']);
			$valTitle=$Row['title'];
			$valTitle2=$Row['title2'];
			$valhtml=$mod_path_html."/".$Row['htmlfilename'];
			$valhtmlname=$Row['htmlfilename'];
			$valhtml2=$mod_path_html."/".$Row['htmlfilename2'];
			$valhtmlname2=$Row['htmlfilename2'];
			$valMetatitle=rechangeQuot($Row['metatitle']);
			$valDescription=rechangeQuot($Row['description']);
			$valKeywords=rechangeQuot($Row['keywords']);
			$valPicShow = $Row['picshow'];
			$valPicShow2 = $Row['picshow2'];
			$valTypeC = $Row['typec'];
			$valUrlC = $Row['urlc'];
			$valTarget = $Row['target'];
			$valTypeC2 = $Row['typec2'];
			$valUrlC2 = $Row['urlc2'];
			$valTarget2 = $Row['target2'];
			$valOutdesc = rechangeQuot($Row['outdesc']);
		 	$valPermission= getUserPermissionOnMenu($_SESSION[$valSiteManage."core_session_groupid"],$_POST["menukeyid"]);
// echo $Row;
// echo $Row[0];
// print_r($Row);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
<link href="../css/theme.css" rel="stylesheet"/>
<link href="js/uploadfile.css" rel="stylesheet"/>

<title><?php echo $core_name_title?></title>
<link href="../js/select2/css/select2.css" rel="stylesheet"/>
<script language="JavaScript"  type="text/javascript" src="../js/select2/js/select2.js"></script>

<script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
<script language="JavaScript" type="text/javascript">
function executeSubmit() {
	with(document.myForm) {
		// if(inputGroupID.value==0) {
		// 	inputGroupID.focus();
		// 	jQuery("#inputGroupID").addClass("formInputContantTbAlertY");
		// 	return false;
		// }else{
		// 	jQuery("#inputGroupID").removeClass("formInputContantTbAlertY");
		// }


		if(isBlank(inputSubject)) {
			inputSubject.focus();
			jQuery("#inputSubject").addClass("formInputContantTbAlertY");
			return false;
		}else{
			jQuery("#inputSubject").removeClass("formInputContantTbAlertY");
		}

		if(isBlank(inputSubject2)) {
			inputSubject2.focus();
			jQuery("#inputSubject2").addClass("formInputContantTbAlertY");
			return false;
		}else{
			jQuery("#inputSubject2").removeClass("formInputContantTbAlertY");
		}

		// if(isBlank(inputDescription)) {
		// 	inputDescription.focus();
		// 	jQuery("#inputDescription").addClass("formInputContantTbAlertY");
		// 	return false;
		// }else{
		// 	jQuery("#inputDescription").removeClass("formInputContantTbAlertY");
		// }

		var type = $('#inputTypeC:checked').val();
			if (type == 2) {
				if(isBlank(inputurlc)) {
				inputurlc.focus();
				jQuery("#inputurlc").addClass("formInputContantTbAlertY");
				return false;
				}else{
					jQuery("#inputurlc").removeClass("formInputContantTbAlertY");
				}


				if(inputurlc.value=="http://") {
					inputurlc.focus();
					jQuery("#inputurlc").addClass("formInputContantTbAlertY");
					return false;
			}else{
				jQuery("#inputurlc").removeClass("formInputContantTbAlertY");
			}
			}
			if (type == 1) {
			var alleditDetail = CKEDITOR.instances.editDetail.getData();
			if(alleditDetail=="") {
					jQuery("#inputEditHTML").addClass("formInputContantTbAlertY");
					window.location.hash = '#inputEditHTML';
					return false;
			}else{
					jQuery("#inputEditHTML").removeClass("formInputContantTbAlertY");
			}
				jQuery('#inputHtml').val(alleditDetail);
}
			var type2 = $('#inputTypeC2:checked').val();
			if (type2 == 2) {
				if(isBlank(inputurlc2)) {
				inputurlc2.focus();
				jQuery("#inputurlc2").addClass("formInputContantTbAlertY");
				return false;
				}else{
					jQuery("#inputurlc2").removeClass("formInputContantTbAlertY");
				}


				if(inputurlc2.value=="http://") {
					inputurlc2.focus();
					jQuery("#inputurlc2").addClass("formInputContantTbAlertY");
					return false;
			}else{
				jQuery("#inputurlc2").removeClass("formInputContantTbAlertY");
			}
			}
			if (type2 == 1) {
			var alleditDetail2 = CKEDITOR.instances.editDetail2.getData();
			if(alleditDetail2=="") {
					jQuery("#inputEditHTML2").addClass("formInputContantTbAlertY");
					window.location.hash = '#inputEditHTML2';
					return false;
			}else{
					jQuery("#inputEditHTML2").removeClass("formInputContantTbAlertY");
			}
				jQuery('#inputHtml2').val(alleditDetail2);
}
	}

	updateContactNew('updateContant.php');

}


function loadCheckUser() {
	with(document.myForm) {
		var inputValuename =document.myForm.inputUserName.value;
		}
		if( inputValuename!=''){
			checkUsermember(inputValuename);
		}
}



jQuery(document).ready(function(){

  jQuery('#myForm').keypress(function(e) {
    /* Start  Enter Check CKeditor */
	var focusManager = new CKEDITOR.focusManager( editDetail );
	var checkFocus =CKEDITOR.instances.editDetail.focusManager.hasFocus;
	var checkFocusTitle =jQuery("#inputDescription").is(":focus");

    if (e.which == 13) {
		//e.preventDefault();
			if(!checkFocusTitle){
				if(!checkFocus){
					executeSubmit();
					return false;
				}
		}
    }
 	/* End  Enter Check CKeditor */
  });
});


</script>
</head>

<body>
<form action="?" method="get" name="myForm" id="myForm"  enctype="multipart/form-data">
    <input name="execute" type="hidden" id="execute" value="update" />
    <input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST['menukeyid']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo $_REQUEST['inputSearch']?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo $_REQUEST['module_pageshow']?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo $_REQUEST['module_pagesize']?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo $_REQUEST['module_orderby']?>" />
    <input name="valEditID" type="hidden" id="valEditID" value="<?php echo $_REQUEST['valEditID']?>" />
    <input name="valDelFile" type="hidden" id="valDelFile" value="" />
	<input name="valDelFile2" type="hidden" id="valDelFile2" value="" />
    <input name="valDelAlbum" type="hidden" id="valDelAlbum" value="" />
	<input name="valDelAlbum2" type="hidden" id="valDelAlbum2" value="" />
    <input name="inputHtml" type="hidden" id="inputHtml" value="" />
	<input name="inputHtml2" type="hidden" id="inputHtml2" value="" />
    <input name="inputHtmlDel" type="hidden" id="inputHtmlDel" value="<?php echo $valhtmlname?>" />
	<input name="inputHtmlDel2" type="hidden" id="inputHtmlDel2" value="<?php echo $valhtmlname2?>" />
    <input name="inputLt" type="hidden" id="inputLt" value="<?php echo $_REQUEST['inputLt']?>" />
    <? include("./inc-input-array.php");?>
					<div class="divRightNav">
                        <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                        <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?php echo $valLinkNav1?>" target="_self"><?php echo $valNav1?></a> <img src="../img/btn/navblack.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('index.php')" target="_self"><?php echo $langMod["tit:inpName"]?></a> <img src="../img/btn/navblack.png" align="absmiddle" vspace="5" /> <?php echo $langMod["txt:titleedit"]?><?php if($_SESSION[$valSiteManage.'core_session_languageT']==2 || $_SESSION[$valSiteManage.'core_session_languageT']==3){?>(<?php echo getSystemLangTxt($_REQUEST['inputLt'],$langTxt["lg:thai"],$langTxt["lg:eng"])?>)<?php }?></span></td>
                        <td  class="divRightNavTb" align="right">



                        </td>
                        </tr>
                        </table>
					</div>
                            <div class="divRightHead">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?php echo $langMod["txt:titleedit"]?><?php if($_SESSION[$valSiteManage.'core_session_languageT']==2 || $_SESSION[$valSiteManage.'core_session_languageT']==3){?>(<?php echo getSystemLangTxt($_REQUEST['inputLt'],$langTxt["lg:thai"],$langTxt["lg:eng"])?>)<?php }?></span></td>
                                    <td align="left">
                                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                                <tr>
                                                    <td align="right">
                                                     <?php if($valPermission=="RW" ){?>
                                                        <div  class="btnSave" title="<?php echo $langTxt["btn:save"]?>" onclick="executeSubmit();"></div>
                                                      <?php }?>
                                                        <div  class="btnBack" title="<?php echo $langTxt["btn:back"]?>" onclick="btnBackPage('index.php')"></div>
                                                    </td>
                                                </tr>
                                            </table>
                                    </td>
                                  </tr>
                                </table>
                            </div>
                             <div class="divRightMain" >
     <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php echo $langMod["txt:subject"]?></span><br/>
    <span class="formFontTileTxt"><?php echo $langMod["txt:subjectDe"]?></span>    </td>
    </tr>
                            <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

        
      <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:subject"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputSubject" id="inputSubject" type="text"  class="formInputContantTb" value="<?php echo $valSubject?>"/></td>
  </tr>
    <tr >
    <td align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:title"]?><span class="fontContantAlert"></span></td>
    <td colspan="6" align="left"  valign="top"  class="formRightContantTb" >
      <textarea name="inputDescription" id="inputDescription" cols="45" rows="5" class="formTextareaContantTb"><?php echo $valTitle?></textarea>     </td>
  </tr>

  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:subject2"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputSubject2" id="inputSubject2" type="text"  class="formInputContantTb" value="<?php echo $valSubject2?>"/></td>
  </tr>
    <tr >
    <td align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:title2"]?><span class="fontContantAlert"></span></td>
    <td colspan="6" align="left"  valign="top"  class="formRightContantTb" >
      <textarea name="inputDescription2" id="inputDescription2" cols="45" rows="5" class="formTextareaContantTb"><?php echo $valTitle2?></textarea>     </td>
  </tr>
</table>
        <br />
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " style="display:show;">
    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php echo $langMod["txt:pic"]?></span><br/>
    <span class="formFontTileTxt"><?php echo $langMod["txt:picDe"]?></span>    </td>
    </tr>
                            <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="file-input-wrapper">
  <button class="btn-file-input"><?php echo $langTxt["us:inputpicselect"]?></button>
  <input type="file" name="fileToUpload" id="fileToUpload" onchange="ajaxFileUpload();" />
</div>

<span class="formFontNoteTxt"><?php echo $langMod["inp:notepic"]?></span>
<div class="clearAll"></div>
<div id="boxPicNew" class="formFontTileTxt">
<?php if(is_file($valPic)){?>
		<img src="<?php echo $valPic?>"  style="float:left;border:#c8c7cc solid 1px;max-width:600px;"  />
		<div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUpload('deletePic.php')"  title="Delete file" ><img src="../img/btn/delete.png" width="22" height="22"  border="0"/></div>
  <input type="hidden" name="picname" id="picname" value="<?php echo $valPicName?>" />
  <?php }?>
</div></td>
  </tr>
   <tr>
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $modTxtShowPic[0]?></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <label>
    <div class="formDivRadioL"><input name="inputTypePic" id="inputTypePic" value="1" type="radio"  class="formRadioContantTb" <?php if($valPicShow!=2){?> checked="checked" <?php }?>  /></div>
    <div class="formDivRadioR"><?php echo $modTxtShowPic[1]?></div>
    </label>

    <label>
    <div class="formDivRadioL"><input name="inputTypePic" id="inputTypePic"  value="2"  type="radio"  class="formRadioContantTb" <?php if($valPicShow==2){?> checked="checked" <?php }?> /></div>
    <div class="formDivRadioR"><?php echo $modTxtShowPic[2]?></div>
    </label>
    </label>    </td>
      </tr> 

	  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="file-input-wrapper">
  <button class="btn-file-input"><?php echo $langTxt["us:inputpicselect"]?></button>
  <input type="file" name="fileToUpload2" id="fileToUpload2" onchange="ajaxFileUpload2();" />
</div>

<span class="formFontNoteTxt"><?php echo $langMod["inp:notepic"]?></span>
<div class="clearAll"></div>
<div id="boxPicNew2" class="formFontTileTxt">
<?php if(is_file($valPic2)){?>
		<img src="<?php echo $valPic2?>"  style="float:left;border:#c8c7cc solid 1px;max-width:600px;"  />
		<div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUpload2('deletePic2.php')"  title="Delete file" ><img src="../img/btn/delete.png" width="22" height="22"  border="0"/></div>
  <input type="hidden" name="picname2" id="picname2" value="<?php echo $valPicName2?>" />
  <?php }?>
</div></td>
  </tr>
   <tr>
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $modTxtShowPic[0]?></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <label>
    <div class="formDivRadioL"><input name="inputTypePic2" id="inputTypePic2" value="1" type="radio"  class="formRadioContantTb" <?php if($valPicShow2!=2){?> checked="checked" <?php }?>  /></div>
    <div class="formDivRadioR"><?php echo $modTxtShowPic[1]?></div>
    </label>

    <label>
    <div class="formDivRadioL"><input name="inputTypePic2" id="inputTypePic2"  value="2"  type="radio"  class="formRadioContantTb" <?php if($valPicShow2==2){?> checked="checked" <?php }?> /></div>
    <div class="formDivRadioR"><?php echo $modTxtShowPic[2]?></div>
    </label>
    </label>    </td>
      </tr> 
  </table>
  <br />
			<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
				<tr >
					<td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
						<span class="formFontSubjectTxt"><?php echo  $langMod["txt:groupType"] ?></span><br/>
						<span class="formFontTileTxt"><?php echo  $langMod["txt:groupTypeDe"] ?></span>    </td>
				</tr>
				<tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>
				<tr >
					<td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["tit:groupType"] ?></td>
					<td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
						<label>
							<div class="formDivRadioL"><input name="inputTypeC" id="inputTypeC" value="1" class="formRadioContantTb" <?php if($valTypeC == 1){ ?> checked="checked" <?php } ?>   type="radio" onclick="jQuery('#boxInputlink').hide(); jQuery('#boxInputlinkdesc').hide();  jQuery('.ckabout').show(); jQuery('#boxInputTarget').hide();"/></div>
							<div class="formDivRadioR"><?php echo  $modGroupType[1]; ?></div>
						</label>

						<label>
							<div class="formDivRadioL"><input name="inputTypeC" id="inputTypeC" value="2" class="formRadioContantTb" <?php if($valTypeC == 2){ ?> checked="checked" <?php } ?>  type="radio" onclick="jQuery('#boxInputlink').show(); jQuery('#boxInputlinkdesc').show(); jQuery('.ckabout').hide(); jQuery('#boxInputTarget').show();"/></div>
							<div class="formDivRadioR"><?php echo  $modGroupType[2]; ?></div>
						</label>
					</td>
				</tr>

				<tr id="boxInputlink"  <?php if($valTypeC == 1){ ?> style="display:none;" <?php } ?>>
						<td width="18%" align="right"  valign="top"  class="formLeftContantTb" >ลิงค์ URL<span class="fontContantAlert">*</span></td>
						<td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><textarea name="inputurlc" id="inputurlc" cols="45" rows="5" class="formTextareaContantTb"><?php echo $valUrlC ?></textarea><br />
					<span class="formFontNoteTxt"><?php echo $langMod["edit:linknote"]?></span></td>
				</tr>

				<tr >
					<td width="18%" align="right"  valign="top"  class="formLeftContantTb" >การแสดงผล</td>
					<td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >


						<label>
							<div class="formDivRadioL"><input name="inputTarget" id="inputTarget" value="1" class="formRadioContantTb" <?php if($valTarget== 1){ ?> checked="checked" <?php } ?>   type="radio" /></div>
							<div class="formDivRadioR"><?php echo  $modTxtTarget[1]; ?></div>
						</label>

						<label>
							<div class="formDivRadioL"><input name="inputTarget" id="inputTarget" value="2" class="formRadioContantTb" <?php if($valTarget == 2){ ?> checked="checked" <?php } ?>  type="radio" /></div>
							<div class="formDivRadioR"><?php echo  $modTxtTarget[2]; ?></div>
						</label>
					</td>
				</tr>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
				<tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>
				<tr >
					<td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["tit:groupType2"] ?></td>
					<td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
						<label>
							<div class="formDivRadioL"><input name="inputTypeC2" id="inputTypeC2" value="1" class="formRadioContantTb" <?php if($valTypeC2 == 1){ ?> checked="checked" <?php } ?>   type="radio" onclick="jQuery('#boxInputlink2').hide(); jQuery('#boxInputlinkdesc').hide();  jQuery('.ckabout2').show(); jQuery('#boxInputTarget').hide();"/></div>
							<div class="formDivRadioR"><?php echo  $modGroupType[1]; ?></div>
						</label>

						<label>
							<div class="formDivRadioL"><input name="inputTypeC2" id="inputTypeC2" value="2" class="formRadioContantTb" <?php if($valTypeC2 == 2){ ?> checked="checked" <?php } ?>  type="radio" onclick="jQuery('#boxInputlink2').show(); jQuery('#boxInputlinkdesc').show(); jQuery('.ckabout2').hide(); jQuery('#boxInputTarget').show();"/></div>
							<div class="formDivRadioR"><?php echo  $modGroupType[2]; ?></div>
						</label>
					</td>
				</tr>

				<tr id="boxInputlink2"  <?php if($valTypeC2 == 1){ ?> style="display:none;" <?php } ?>>
						<td width="18%" align="right"  valign="top"  class="formLeftContantTb" >ลิงค์ URL 2<span class="fontContantAlert">*</span></td>
						<td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><textarea name="inputurlc2" id="inputurlc2" cols="45" rows="5" class="formTextareaContantTb"><?php echo $valUrlC2 ?></textarea><br />
					<span class="formFontNoteTxt"><?php echo $langMod["edit:linknote"]?></span></td>
				</tr>

				<tr >
					<td width="18%" align="right"  valign="top"  class="formLeftContantTb" >การแสดงผล</td>
					<td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >


						<label>
							<div class="formDivRadioL"><input name="inputTarget2" id="inputTarget2" value="1" class="formRadioContantTb" <?php if($valTarget2== 1){ ?> checked="checked" <?php } ?>   type="radio" /></div>
							<div class="formDivRadioR"><?php echo  $modTxtTarget[1]; ?></div>
						</label>

						<label>
							<div class="formDivRadioL"><input name="inputTarget2" id="inputTarget2" value="2" class="formRadioContantTb" <?php if($valTarget2 == 2){ ?> checked="checked" <?php } ?>  type="radio" /></div>
							<div class="formDivRadioR"><?php echo  $modTxtTarget[2]; ?></div>
						</label>
					</td>
				</tr>
			</table>
         <br  class="ckabout" <?php if($valTypeC == 2){ ?> style="display:none;" <?php } ?>/>
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ckabout" <?php if($valTypeC == 2){ ?> style="display:none;" <?php } ?>>
    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php echo $langMod["txt:title"]?></span><br/>
    <span class="formFontTileTxt"><?php echo $langMod["txt:titleDe"]?></span>    </td>
    </tr>
        <tr >
    <td colspan="7" align="center"  valign="top"  class="formRightContantTbEditor" >
       <div id="inputEditHTML" >
      <textarea name="editDetail" id="editDetail" >
      <?php
                    if (is_file($valhtml)) {
                        $fd = @fopen ($valhtml, "r");
                        $contents = @fread ($fd, @filesize ($valhtml));
                        @fclose ($fd);
                        echo txtReplaceHTML($contents);
                    }
	?>
      </textarea>
      </div></td>
    </tr>
  </table>
  <br  class="ckabout2" <?php if($valTypeC2 == 2){ ?> style="display:none;" <?php } ?>/>
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ckabout2" <?php if($valTypeC2 == 2){ ?> style="display:none;" <?php } ?>>
    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php echo $langMod["txt:title"]?> 2</span><br/>
    <span class="formFontTileTxt"><?php echo $langMod["txt:titleDe"]?></span>    </td>
    </tr>
        <tr >
    <td colspan="7" align="center"  valign="top"  class="formRightContantTbEditor" >
       <div id="inputEditHTML2" >
      <textarea name="editDetail2" id="editDetail2" >
      <?php
                    if (is_file($valhtml2)) {
                        $fd2 = @fopen ($valhtml2, "r");
                        $contents2 = @fread ($fd2, @filesize ($valhtml2));
                        @fclose ($fd2);
                        echo txtReplaceHTML($contents2);
                    }
	?>
      </textarea>
      </div></td>
    </tr>
  </table>
         <br class="ckabout" <?php if($valTypeC == 2){ ?> style="display:none;" <?php } ?>/>
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ckabout" <?php if($valTypeC == 2){ ?> style="display:none;" <?php } ?>>
    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php echo $langMod["txt:album"]?></span><br/>
    <span class="formFontTileTxt"><?php echo $langMod["txt:albumDe"]?></span>    </td>
    </tr>
                            <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div id="mulitplefileuploader" ><?php echo $langTxt["us:inputpicselect"]?></div>

<span class="formFontNoteTxt"><?php echo $langMod["inp:notealbum"]?></span>
<div class="clearAll"></div>
<div id="status" class="formFontTileTxt"></div>
<div id="boxAlbumNew" class="formFontTileTxt">
<?php
			 $sql_filetemp="SELECT  ".$mod_tb_root_album."_id,".$mod_tb_root_album."_filename,".$mod_tb_root_album."_name,".$mod_tb_root_album."_download  FROM ".$mod_tb_root_album." WHERE ".$mod_tb_root_album."_contantid 	='".$_REQUEST['valEditID']."'    ORDER BY ".$mod_tb_root_album."_id ASC";
			$query_filetemp=wewebQueryDB($coreLanguageSQL,$sql_filetemp);
		 	$number_filetemp=wewebNumRowsDB($coreLanguageSQL,$query_filetemp);
			if($number_filetemp>=1){
			$valAlbum="";
			while($row_filetemp=wewebFetchArrayDB($coreLanguageSQL,$query_filetemp)){
			$linkRelativePath = $mod_path_album."/".$row_filetemp[1];
			$downloadFile = $row_filetemp[1];
			$downloadID = $row_filetemp[0];
			$downloadName = $row_filetemp[2];
			$countDownload= $row_filetemp[3];
			$imageType = strstr($downloadFile,'.');

				$valAlbum .= "<img src=\"".$mod_path_album."/reO_".$downloadFile."\"  width=\"50\" height=\"50\"   style=\"float:left;border:#c8c7cc solid 1px;margin-top:15px;\"  />";
				$valAlbum .= "<div style=\"width:15px; height:15px;float:left;z-index:1; margin-left:-15px;cursor:pointer;margin-right:15px;margin-top:15px;\" onclick=\"document.myForm.valDelAlbum.value=".$downloadID.";delAlbumUpload('deleteAlbum.php');\"  title=\"Delete file\" ><img src=\"../img/btn/delete.png\" width=\"15\" height=\"15\"  border=\"0\"/></div>";
			}}
			echo $valAlbum;

?>
</div></td>
  </tr>
  </table>
       
  <br class="ckabout2" <?php if($valTypeC2 == 2){ ?> style="display:none;" <?php } ?>/>
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ckabout2" <?php if($valTypeC2 == 2){ ?> style="display:none;" <?php } ?>>
    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php echo $langMod["txt:album"]?> 2</span><br/>
    <span class="formFontTileTxt"><?php echo $langMod["txt:albumDe"]?></span>    </td>
    </tr>
                            <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div id="mulitplefileuploader2" ><?php echo $langTxt["us:inputpicselect"]?></div>

<span class="formFontNoteTxt"><?php echo $langMod["inp:notealbum"]?></span>
<div class="clearAll"></div>
<div id="status2" class="formFontTileTxt"></div>
<div id="boxAlbumNew2" class="formFontTileTxt">
<?php
			 $sql_filetemp="SELECT  ".$mod_tb_root_album."_id,".$mod_tb_root_album."_filename2,".$mod_tb_root_album."_name,".$mod_tb_root_album."_download  FROM ".$mod_tb_root_album." WHERE ".$mod_tb_root_album."_contantid2 	='".$_REQUEST['valEditID']."'    ORDER BY ".$mod_tb_root_album."_id ASC";
			$query_filetemp=wewebQueryDB($coreLanguageSQL,$sql_filetemp);
		 	$number_filetemp=wewebNumRowsDB($coreLanguageSQL,$query_filetemp);
			if($number_filetemp>=1){
			$valAlbum2="";
			while($row_filetemp=wewebFetchArrayDB($coreLanguageSQL,$query_filetemp)){
			$linkRelativePath = $mod_path_album."/".$row_filetemp[1];
			$downloadFile = $row_filetemp[1];
			$downloadID = $row_filetemp[0];
			$downloadName = $row_filetemp[2];
			$countDownload= $row_filetemp[3];
			$imageType = strstr($downloadFile,'.');

				$valAlbum2 .= "<img src=\"".$mod_path_album."/reO2_".$downloadFile."\"  width=\"50\" height=\"50\"   style=\"float:left;border:#c8c7cc solid 1px;margin-top:15px;\"  />";
				$valAlbum2 .= "<div style=\"width:15px; height:15px;float:left;z-index:1; margin-left:-15px;cursor:pointer;margin-right:15px;margin-top:15px;\" onclick=\"document.myForm.valDelAlbum2.value=".$downloadID.";delAlbumUpload2('deleteAlbum2.php');\"  title=\"Delete file\" ><img src=\"../img/btn/delete.png\" width=\"15\" height=\"15\"  border=\"0\"/></div>";
			}}
			echo $valAlbum2;

?>
</div></td>
  </tr>
  </table>
<table style="display:none;"  width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ckabout" <?php if($valTypeC == 2){ ?> style="display:none;" <?php } ?>>
    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php echo $langMod["txt:video"]?></span><br/>
    <span class="formFontTileTxt"><?php echo $langMod["txt:videoDe"]?></span>    </td>
    </tr>
                            <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

      <tr style="display:none;">
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:typevdo"]?></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <label>
    <div class="formDivRadioL"><input name="inputType" id="inputType" value="url" type="radio"  class="formRadioContantTb" onclick="jQuery('#boxInputfile').hide();jQuery('#boxInputlink').show();" <?php if($valType=="url"){?> checked="checked" <?php }?>  /></div>
    <div class="formDivRadioR"><?php echo $langMod["tit:linkvdo"]?></div>
    </label>

    <label>
    <div class="formDivRadioL"><input name="inputType" id="inputType"  value="file"  type="radio"  class="formRadioContantTb" onclick="jQuery('#boxInputlink').hide();jQuery('#boxInputfile').show();" <?php if($valType=="file"){?> checked="checked" <?php }?>  /></div>
    <div class="formDivRadioR"><?php echo $langMod["tit:uploadvdo"]?></div>
    </label>
    </label>   </td>
      </tr>
  <tr id="boxInputlink"  style="display:none;" >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" >ลิงค์ Youtube</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><textarea name="inputurl" id="inputurl" cols="45" rows="5" class="formTextareaContantTb"><?php echo $valUrl?></textarea><br />
		<span class="formFontNoteTxt"><?php echo $langMod["tit:linkvdonote"]?></span></td>
  </tr>
    <tr id="boxInputfile"  <?php if($valType=="url"){?> style="display:none;" <?php }?>>
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:uploadvdo"]?></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="file-input-wrapper">
  <button class="btn-file-input"><?php echo $langTxt["us:inputpicselect"]?></button>
  <input type="file" name="inputVideoUpload" id="inputVideoUpload" onchange="ajaxVideoUpload();" />
</div>

<span class="formFontNoteTxt"><?php echo $langMod["tit:uploadvdonote"]?></span>
<div class="clearAll"></div>
<div id="boxVideoNew" class="formFontTileTxt">
<?php if(is_file($valPathvdo)){
			$linkRelativePath = $valPathvdo;
			$imageType = strstr($valFilevdo,'.');
?>
		 	<a href="javascript:void(0)"  onclick=" delVideoUpload('deleteVideo.php')" ><img src="../img/btn/delete.png" align="absmiddle" title="Delete file"  hspace="10"  vspace="10"   border="0" /></a>Video Upload | <?php echo $langMod["file:type"]?>: <?php echo $imageType?>  | <?php echo $langMod["file:size"]?>: <?php echo get_IconSize($linkRelativePath)?>
  <input type="hidden" name="picname" id="picname" value="<?php echo $valFilevdo?>" />
  <?php }?>
</div></td>
  </tr>
       </table>
         <br class="ckabout" <?php if($valTypeC == 2){ ?> style="display:none;" <?php } ?>/>
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ckabout" <?php if($valTypeC == 2){ ?> style="display:none;" <?php } ?>>
    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php echo $langMod["txt:attfile"]?></span><br/>
    <span class="formFontTileTxt"><?php echo $langMod["txt:attfileDe"]?></span>    </td>
    </tr>
                            <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

  <tr style="display:none;" >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["inp:chfile"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputFileName" id="inputFileName" type="text"  class="formInputContantTb"/></td>
  </tr>
   <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="file-input-wrapper">
  <button class="btn-file-input"><?php echo $langTxt["us:inputpicselect"]?></button>
  <input type="file" name="inputFileUpload" id="inputFileUpload" onchange="ajaxFileUploadDoc();" />
</div>
<span class="formFontNoteTxt"><?php echo $langMod["inp:notefile"]?></span>
<div class="clearAll"></div>
<div id="boxFileNew" class="formFontTileTxt">
<?php
			$sql="SELECT ".$mod_tb_file."_id,".$mod_tb_file."_filename,".$mod_tb_file."_name,".$mod_tb_file."_download FROM ".$mod_tb_file." WHERE ".$mod_tb_file."_contantid 	='".$valid."' ORDER BY ".$mod_tb_file."_id ASC";
			$query_file=wewebQueryDB($coreLanguageSQL,$sql);
			$number_row=wewebNumRowsDB($coreLanguageSQL,$query_file);
			if($number_row>=1){
			$txtFile="";
			while($row_file=wewebFetchArrayDB($coreLanguageSQL,$query_file)){
			$linkRelativePath = $mod_path_file."/".$row_file[1];
			$downloadFile = $row_file[1];
			$downloadID = $row_file[0];
			$downloadName = $row_file[2];
			$countDownload= $row_file[3];
			$imageType = strstr($downloadFile,'.');
			$txtFile .= "<a href=\"javascript:void(0)\"  onclick=\"document.myForm.valDelFile.value=".$downloadID.";delFileUpload('deleteFile.php');\" ><img src=\"../img/btn/delete.png\" align=\"absmiddle\" title=\"Delete file\"  hspace=\"10\"  vspace=\"10\"   border=\"0\" /></a>".$downloadName."".$imageType." | ".$langMod["file:type"].": ".$imageType."  | ".$langMod["file:size"].": ".get_IconSize($linkRelativePath)."<br/>";
		 }}

		 echo $txtFile;
?>
</div></td>
  </tr>
  </table>
  <br class="ckabout2" <?php if($valTypeC2 == 2){ ?> style="display:none;" <?php } ?>/>
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ckabout2" <?php if($valTypeC2 == 2){ ?> style="display:none;" <?php } ?>>
    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php echo $langMod["txt:attfile"]?> 2</span><br/>
    <span class="formFontTileTxt"><?php echo $langMod["txt:attfileDe"]?></span>    </td>
    </tr>
                            <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

  <tr style="display:none;" >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["inp:chfile"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputFileName2" id="inputFileName2" type="text"  class="formInputContantTb"/></td>
  </tr>
   <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="file-input-wrapper">
  <button class="btn-file-input"><?php echo $langTxt["us:inputpicselect"]?></button>
  <input type="file" name="inputFileUpload2" id="inputFileUpload2" onchange="ajaxFileUploadDoc2();" />
</div>
<span class="formFontNoteTxt"><?php echo $langMod["inp:notefile"]?></span>
<div class="clearAll"></div>
<div id="boxFileNew2" class="formFontTileTxt">
<?php
			$sql="SELECT ".$mod_tb_file."_id,".$mod_tb_file."_filename2,".$mod_tb_file."_name,".$mod_tb_file."_download FROM ".$mod_tb_file." WHERE ".$mod_tb_file."_contantid2 	='".$valid."' ORDER BY ".$mod_tb_file."_id ASC";
			$query_file=wewebQueryDB($coreLanguageSQL,$sql);
			$number_row=wewebNumRowsDB($coreLanguageSQL,$query_file);
			if($number_row>=1){
			$txtFile="";
			while($row_file=wewebFetchArrayDB($coreLanguageSQL,$query_file)){
			$linkRelativePath = $mod_path_file."/".$row_file[1];
			$downloadFile = $row_file[1];
			$downloadID = $row_file[0];
			$downloadName = $row_file[2];
			$countDownload= $row_file[3];
			$imageType = strstr($downloadFile,'.');
			$txtFile .= "<a href=\"javascript:void(0)\"  onclick=\"document.myForm.valDelFile2.value=".$downloadID.";delFileUpload2('deleteFile2.php');\" ><img src=\"../img/btn/delete.png\" align=\"absmiddle\" title=\"Delete file\"  hspace=\"10\"  vspace=\"10\"   border=\"0\" /></a>".$downloadName."".$imageType." | ".$langMod["file:type"].": ".$imageType."  | ".$langMod["file:size"].": ".get_IconSize($linkRelativePath)."<br/>";
		 }}

		 echo $txtFile;
?>
</div></td>
  </tr>
  </table>
         <br class="ckabout"<?php if($valTypeC == 2){ ?> style="display:none;" <?php } ?>/>
				
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ckabout" <?php if($valTypeC == 2){ ?> style="display:none;" <?php } ?>>
    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php echo $langMod["txt:seo"]?></span><br/>
    <span class="formFontTileTxt"><?php echo $langMod["txt:seoDe"]?></span>    </td>
    </tr>
                            <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["inp:seotitle"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagTitle" id="inputTagTitle" type="text"  class="formInputContantTb" value="<?php echo $valMetatitle?>"/><br />
<span class="formFontNoteTxt"><?php echo $langMod["inp:seotitlenote"]?></span></td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["inp:seodes"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagDescription" id="inputTagDescription"  type="text"  class="formInputContantTb" value="<?php echo $valDescription?>"/><br />
<span class="formFontNoteTxt"><?php echo $langMod["inp:seodesnote"]?></span></td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["inp:seokey"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagKeywords" id="inputTagKeywords"  type="text"  class="formInputContantTb" value="<?php echo $valKeywords?>"/><br />
<span class="formFontNoteTxt"><?php echo $langMod["inp:seokeynote"]?></span></td>
  </tr>
  </table>
         <br />
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php echo $langMod["txt:datec"]?></span><br/>
    <span class="formFontTileTxt"><?php echo $langMod["txt:datecDe"]?></span>    </td>
    </tr>
                            <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:credate"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="cdateInput" id="cdateInput" type="text"  class="formInputContantTbShot" value="<?php echo $valcredate?>"/></td>
  </tr>
  </table>
         <br />
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php echo $langMod["txt:date"]?></span><br/>
    <span class="formFontTileTxt"><?php echo $langMod["txt:dateDe"]?></span>    </td>
    </tr>
                            <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:sdate"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="sdateInput" id="sdateInput" type="text"  class="formInputContantTbShot" value="<?php echo $valSdate?>"/></td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:edate"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="edateInput" id="edateInput"  type="text"  class="formInputContantTbShot" value="<?php echo $valEdate?>"/><br />
<span class="formFontNoteTxt"><?php echo $langMod["inp:notedate"]?></span></td>
  </tr>




  </table>
         <br />
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" >

   <tr >
      <td colspan="7" align="right"  valign="top" height="20"></td>
      </tr>
    <tr >
    <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php echo $langTxt["btn:gototop"]?>"><?php echo $langTxt["btn:gototop"]?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
    </tr>
  </table>
  </div>
</form>
<script type="text/javascript" src="../js/ajaxfileupload.js"></script>
<script type="text/javascript" src="../../ckeditor/ckeditor.js"></script>
<script type="text/javascript" language="javascript">
	/*################################# Upload Pic #######################*/
	function ajaxFileUpload(){
		var valuepicname = jQuery("input#picname").val();

		 jQuery.blockUI({
				message: jQuery('#tallContent'),
				css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
				}
			});


		jQuery.ajaxFileUpload({
				url:'loadUpdatePic.php?myID=<?php echo $_POST["valEditID"]?>&masterkey=<?php echo $_REQUEST['masterkey']?>&langt=<?php echo $_REQUEST['inputLt']?>&delpicname='+valuepicname+'&menuid=<?php echo $_REQUEST['menukeyid']?>',
				secureuri:false,
				fileElementId:'fileToUpload',
				dataType: 'json',
				success: function (data, status){
					if(typeof(data.error) != 'undefined')
					{

						if(data.error != '')
						{
							alert(data.error);

						}else
						{
							jQuery("#boxPicNew").show();
							jQuery("#boxPicNew").html(data.msg);
							setTimeout(jQuery.unblockUI, 200);
						}
					}
				},
				error: function (data, status, e)
				{
					alert(e);
				}
			}
		)
		return false;

	}
	function ajaxFileUpload2(){
		var valuepicname = jQuery("input#picname2").val();

		 jQuery.blockUI({
				message: jQuery('#tallContent'),
				css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
				}
			});


		jQuery.ajaxFileUpload({
				url:'loadUpdatePic2.php?myID=<?php echo $_POST["valEditID"]?>&masterkey=<?php echo $_REQUEST['masterkey']?>&langt=<?php echo $_REQUEST['inputLt']?>&delpicname='+valuepicname+'&menuid=<?php echo $_REQUEST['menukeyid']?>',
				secureuri:false,
				fileElementId:'fileToUpload2',
				dataType: 'json',
				success: function (data, status){
					if(typeof(data.error) != 'undefined')
					{

						if(data.error != '')
						{
							alert(data.error);

						}else
						{
							jQuery("#boxPicNew2").show();
							jQuery("#boxPicNew2").html(data.msg);
							setTimeout(jQuery.unblockUI, 200);
						}
					}
				},
				error: function (data, status, e)
				{
					alert(e);
				}
			}
		)
		return false;

	}
	/*############################# Upload Album ##################################

	function ajaxFileUploadAlbum(){
		 jQuery.blockUI({
				message: jQuery('#tallContent'),
				css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
				}
			});


		jQuery.ajaxFileUpload({
				url:'loadUpdateAlbum.php?myID=<?php echo $_POST["valEditID"]?>&masterkey=<?php echo $_REQUEST['masterkey']?>&langt=<?php echo $_REQUEST['inputLt']?>&menuid=<?php echo $_REQUEST['menukeyid']?>',
				secureuri:true,
				fileElementId:'inputAlbumUpload',
				dataType: 'json',
				success: function (data, status){
					if(typeof(data.error) != 'undefined'){

						if(data.error != ''){
							alert(data.error);
						}else{
							jQuery("#boxAlbumNew").show();
							jQuery("#boxAlbumNew").html(data.msg);
							setTimeout(jQuery.unblockUI, 200);
						}

					}
				},
				error: function (data, status, e){
					alert(e);
				}
			}
		)

		return false;

	}*/

	/*################################# Upload Video #######################*/
	function ajaxVideoUpload(){
		var valuevdoname = jQuery("input#vdoname").val();

		 jQuery.blockUI({
				message: jQuery('#tallContent'),
				css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
				}
			});


		jQuery.ajaxFileUpload({
				url:'loadUpdateVideo.php?myID=<?php echo $_POST["valEditID"]?>&masterkey=<?php echo $_REQUEST['masterkey']?>&langt=<?php echo $_REQUEST['inputLt']?>&delvdoname='+valuevdoname+'&menuid=<?php echo $_REQUEST['menukeyid']?>',
				secureuri:false,
				fileElementId:'inputVideoUpload',
				dataType: 'json',
				success: function (data, status){
					if(typeof(data.error) != 'undefined')
					{

						if(data.error != '')
						{
							alert(data.error);

						}else
						{
							jQuery("#boxVideoNew").show();
							jQuery("#boxVideoNew").html(data.msg);
							setTimeout(jQuery.unblockUI, 200);
						}
					}
				},
				error: function (data, status, e)
				{
					alert(e);
				}
			}
		)
		return false;

	}

	/*############################# Upload File ####################################*/
	function ajaxFileUploadDoc(){
		var valuefilename = jQuery("input#inputFileName").val();
		 jQuery.blockUI({
				message: jQuery('#tallContent'),
				css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
				}
			});


		jQuery.ajaxFileUpload({
				url:'loadUpdateFile.php?myID=<?php echo $_POST["valEditID"]?>&masterkey=<?php echo $_REQUEST['masterkey']?>&langt=<?php echo $_REQUEST['inputLt']?>&nametodoc='+valuefilename+'&menuid=<?php echo $_REQUEST['menukeyid']?>',
				secureuri:true,
				fileElementId:'inputFileUpload',
				dataType: 'json',
				success: function (data, status){
					if(typeof(data.error) != 'undefined'){

						if(data.error != ''){
							alert(data.error);
						}else{
							jQuery("#boxFileNew").show();
							jQuery("#boxFileNew").html(data.msg);
							document.myForm.inputFileName.value ="";
							setTimeout(jQuery.unblockUI, 200);
						}

					}
				},
				error: function (data, status, e){
					alert(e);
				}
			}
		)

		return false;

	}


	/*############################# Upload File 2 ####################################*/
	function ajaxFileUploadDoc2(){
		var valuefilename = jQuery("input#inputFileName2").val();
		 jQuery.blockUI({
				message: jQuery('#tallContent'),
				css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
				}
			});


		jQuery.ajaxFileUpload({
				url:'loadUpdateFile2.php?myID=<?php echo $_POST["valEditID"]?>&masterkey=<?php echo $_REQUEST['masterkey']?>&langt=<?php echo $_REQUEST['inputLt']?>&nametodoc='+valuefilename+'&menuid=<?php echo $_REQUEST['menukeyid']?>',
				secureuri:true,
				fileElementId:'inputFileUpload2',
				dataType: 'json',
				success: function (data, status){
					if(typeof(data.error) != 'undefined'){

						if(data.error != ''){
							alert(data.error);
						}else{
							jQuery("#boxFileNew2").show();
							jQuery("#boxFileNew2").html(data.msg);
							document.myForm.inputFileName2.value ="";
							setTimeout(jQuery.unblockUI, 200);
						}

					}
				},
				error: function (data, status, e){
					alert(e);
				}
			}
		)

		return false;

	}

/*################### Load FCK Editor ######################*/
	jQuery(function() {
		onLoadFCK();
	});
	jQuery(function() {
		onLoadFCK2();
	});



 </script>

   <script type="text/javascript" src="js/jquery.uploadfile.js"></script>
<script type="text/javascript" language="javascript">
jQuery(document).ready(function(){
var vajSelectFile=0;
var valUploadFile=0;
var settings = {
    url: "loadUpdateAlbum.php?myID=<?php echo $_POST["valEditID"]?>&masterkey=<?php echo $_REQUEST['masterkey']?>&langt=<?php echo $_REQUEST['inputLt']?>&menuid=<?php echo $_REQUEST['menukeyid']?>",
    dragDrop:false,
    fileName: "myfile",
    allowedTypes:"jpg,png,gif",
    returnType:"json",
	onSelect:function(files){
	   vajSelectFile=files.length;
	},

	 onSuccess:function(files,data,xhr){
	    valUploadFile=valUploadFile+1;
		if(vajSelectFile==valUploadFile){
				loadShowPhotoUpdate('loadShowAlbumNewUpdate.php','boxAlbumNew');
			//	alert('goooo');
			 valUploadFile=0;
	   }
    },
	showStatusAfterSuccess:false,
	showAbort:false,
	showDone:false,
    showDelete:false,
    deleteCallback: function(data,pd)
	{
    for(var i=0;i<data.length;i++) {

        $.post("delete.php",{op:"delete",name:data[i]},
        function(resp, textStatus, jqXHR)
        {

            //Show Message
            jQuery("#status").append("<div>File Deleted</div>");
        });

     }
    pd.statusbar.hide(); //You choice to hide/not.

}
}
var uploadObj = jQuery("#mulitplefileuploader").uploadFile(settings);


});

    $(document).ready(function () {
        $(".selectProject").select2();
    });
 </script>


<script type="text/javascript" language="javascript">
jQuery(document).ready(function(){
var vajSelectFile2=0;
var valUploadFile2=0;
var settings = {
    url: "loadUpdateAlbum2.php?myID=<?php echo $_POST["valEditID"]?>&masterkey=<?php echo $_REQUEST['masterkey']?>&langt=<?php echo $_REQUEST['inputLt']?>&menuid=<?php echo $_REQUEST['menukeyid']?>",
    dragDrop:false,
    fileName: "myfile2",
    allowedTypes:"jpg,png,gif",
    returnType:"json",
	onSelect:function(files){
	   vajSelectFile2=files.length;
	},

	 onSuccess:function(files,data,xhr){
	    valUploadFile2=valUploadFile2+1;
		if(vajSelectFile2==valUploadFile2){
				loadShowPhotoUpdate('loadShowAlbumNewUpdate2.php','boxAlbumNew2');
			//	alert('goooo');
			 valUploadFile2=0;
	   }
    },
	showStatusAfterSuccess:false,
	showAbort:false,
	showDone:false,
    showDelete:false,
    deleteCallback: function(data,pd)
	{
    for(var i=0;i<data.length;i++) {

        $.post("delete.php",{op:"delete",name:data[i]},
        function(resp, textStatus, jqXHR)
        {

            //Show Message
            jQuery("#status2").append("<div>File Deleted</div>");
        });

     }
    pd.statusbar.hide(); //You choice to hide/not.

}
}
var uploadObj = jQuery("#mulitplefileuploader2").uploadFile(settings);


});

    $(document).ready(function () {
        $(".selectProject2").select2();
    });
 </script>


 <?php if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){?>
 <script language="JavaScript"  type="text/javascript" src="../js/datepickerThai.js"></script>
 <?php }else{?>
 <script language="JavaScript"  type="text/javascript" src="../js/datepickerEng.js"></script>
 <?php }?>
 <?php include("../lib/disconnect.php");?>

</body>
</html>
