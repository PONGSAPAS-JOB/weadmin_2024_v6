<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("config.php");
include("incModLang.php");

$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";

$sql = "SELECT   ";
$sql .= "   " . $mod_tb_root . "_id as id ,
      " . $mod_tb_root . "_credate as credate,
      " . $mod_tb_root . "_credate2 as credate2,
      " . $mod_tb_root . "_crebyid as crebyid,
      " . $mod_tb_root . "_status as status,
      " . $mod_tb_root . "_sdate as sdate,
      " . $mod_tb_root . "_edate as edate,
      " . $mod_tb_root . "_sdate2 as sdate2,
      " . $mod_tb_root . "_edate2 as edate2,
      " . $mod_tb_root . "_lastdate as lastdate,
      " . $mod_tb_root . "_lastbyid as lastbyid,
      " . $mod_tb_root . "_pic as pic ,
     " . $mod_tb_root . "_pic2 as pic2 ,
      " . $mod_tb_root . "_type as type,
      " . $mod_tb_root . "_filevdo as filevdo,
      " . $mod_tb_root . "_url as url ,
      " . $mod_tb_root . "_type2 as type2,
      " . $mod_tb_root . "_filevdo2 as filevdo2,
      " . $mod_tb_root . "_url2 as url2 ,
      " . $mod_tb_root . "_view as view,
      " . $mod_tb_root . "_gid as gid    ";

      if($_REQUEST['inputLt']=="Thai"){
        $sql .= " , ".$mod_tb_root."_subject as subject , ".$mod_tb_root."_subject2 as subject2  ,    ".$mod_tb_root."_title as title , ".$mod_tb_root."_title2 as title2, ".$mod_tb_root."_htmlfilename as htmlfilename  , ".$mod_tb_root."_htmlfilename2 as htmlfilename2  ,    ".$mod_tb_root."_metatitle  as	metatitle 	,    ".$mod_tb_root."_description as description  ,    ".$mod_tb_root."_keywords as keywords   ,    ".$mod_tb_root."_metatitle2  as	metatitle2 	,    ".$mod_tb_root."_description2 as description2  ,    ".$mod_tb_root."_keywords2 as keywords2   ";
    }elseif($_REQUEST['inputLt']=="Eng"){
        $sql .= " , ".$mod_tb_root."_subjecten as subjecten  ,    ".$mod_tb_root."_titleen as titleen , ".$mod_tb_root."_htmlfilenameen as htmlfilenameen   ,    ".$mod_tb_root."_metatitleen as metatitleen  ,    ".$mod_tb_root."_descriptionen as descriptionen 	 ,    ".$mod_tb_root."_keywordsen as keywordsen   ";
    }else{
        $sql .= " , ".$mod_tb_root."_subjectcn as subjectcn  ,    ".$mod_tb_root."_titlecn as titlecn , ".$mod_tb_root."_htmlfilenamecn as htmlfilenamecn   ,    ".$mod_tb_root."_metatitlecn as metatitlecn  ,    ".$mod_tb_root."_descriptioncn as descriptioncn	 ,    ".$mod_tb_root."_keywordscn as keywordscn   ";
    }


    $sql .= " , ".$mod_tb_root."_picshow as picshow ,".$mod_tb_root."_picshow2 as picshow2, ".$mod_tb_root."_typec as typec,  ".$mod_tb_root."_typec2 as typec2, ".$mod_tb_root."_urlc as urlc, ".$mod_tb_root."_urlc2 as urlc2, ".$mod_tb_root."_target as target,  ".$mod_tb_root."_target2 as target2, ".$mod_tb_root."_outdesc as outdesc	FROM ".$mod_tb_root." WHERE ".$mod_tb_root."_masterkey='".$_POST["masterkey"]."' AND  ".$mod_tb_root."_id 	='".$_POST["valEditID"]."'";
    $Query = wewebQueryDB($coreLanguageSQL,$sql);
$Row = wewebFetchArrayDB($coreLanguageSQL,$Query);
$valID = $Row['id'];
$valCredate = DateFormat($Row['credate']);
$valCredate2 = DateFormat($Row['credate2']);
$valCreby = $Row['crebyid'];
$valStatus = $Row['status'];
if ($valStatus == "Enable") {
    $valStatusClass = "fontContantTbEnable";
} elseif ($valStatus == "Related") {
    $valStatusClass = "fontContantTbRelated";
} else {
    $valStatusClass = "fontContantTbDisable";
}

if ($Row['sdate'] == "0000-00-00 00:00:00") {
    $valSdate = "-";
} else {
    $valSdate = DateFormatReal($Row['sdate']);
}
if ($Row['edate'] == "0000-00-00 00:00:00") {
    $valEdate = "-";
} else {
    $valEdate = DateFormatReal($Row['edate']);
}

if ($Row['sdate2'] == "0000-00-00 00:00:00") {
    $valSdate2 = "-";
} else {
    $valSdate2 = DateFormatReal($Row['sdate2']);
}
if ($Row['edate2'] == "0000-00-00 00:00:00") {
    $valEdate2 = "-";
} else {
    $valEdate2 = DateFormatReal($Row['edate2']);
}

$valLastdate = DateFormat($Row['lastdate']);
$valLastby = $Row['lastbyid'];

$valPicName = $Row['pic'];
$valPic = $mod_path_pictures . "/" . $Row['pic'];
$valPicName2 = $Row['pic2'];
$valPic2 = $mod_path_pictures . "/" . $Row['pic2'];
$valType = $Row['type'];
$valType2 = $Row['type2'];
$valFilevdo = $Row['filevdo'];
$valPathvdo = $mod_path_vdo . "/" . $Row['filevdo'];
$valFilevdo2 = $Row['filevdo2'];
$valPathvdo2 = $mod_path_vdo . "/" . $Row['filevdo2'];
$valUrl = rechangeQuot($Row['url']);
$valUrl2 = rechangeQuot($Row['url2']);
$valView = number_format($Row['view']);

$valGid = $Row['gid'];

$valSubject = rechangeQuot($Row['subject']);
$valTitle = rechangeQuot($Row['title']);
$valSubject2 = rechangeQuot($Row['subject2']);
$valTitle2 = rechangeQuot($Row['title2']);
$valHtml = $mod_path_html . "/" . $Row['htmlfilename'];
$valHtml2 = $mod_path_html . "/" . $Row['htmlfilename2'];
$valMetatitle = rechangeQuot($Row['metatitle']);
$valDescription = rechangeQuot($Row['description']);
$valKeywords = rechangeQuot($Row['keywords']);
$valMetatitle2 = rechangeQuot($Row['metatitle2']);
$valDescription2 = rechangeQuot($Row['description2']);
$valKeywords2 = rechangeQuot($Row['keywords2']);
$valPicShow = $Row['picshow'];
$valTypec= $Row['typec'];
$valUrlc = $Row['urlc'];
$valTarget = $Row['target'];
$valPicShow2 = $Row['picshow2'];
$valTypec2 = $Row['typec2'];
$valUrlc2 = $Row['urlc2'];
$valTarget2 = $Row['target2'];
$valOutdesc = rechangeQuot($Row['outdesc']);

$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_REQUEST["menukeyid"]);

logs_access('3', 'View');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="robots" content="noindex, nofollow">
            <meta name="googlebot" content="noindex, nofollow">
                <link href="../css/theme.css" rel="stylesheet"/>

                <title><?php echo $core_name_title ?></title>
                <script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
                </head>

                <body>
                    <form action="?" method="get" name="myForm" id="myForm">
                        <input name="execute" type="hidden" id="execute" value="update" />
                        <input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST['masterkey'] ?>" />
                        <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST['menukeyid'] ?>" />
                        <input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo $_REQUEST['inputSearch'] ?>" />
                        <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo $_REQUEST['module_pageshow'] ?>" />
                        <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo $_REQUEST['module_pagesize'] ?>" />
                        <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo $_REQUEST['module_orderby'] ?>" />
                        <input name="valEditID" type="hidden" id="valEditID" value="<?php echo $_REQUEST['valEditID'] ?>" />
                        <input name="inputLt" type="hidden" id="inputLt" value="<?php echo $_REQUEST['inputLt'] ?>" />
                        <? include("./inc-input-array.php");?>
                        <?php if ($_REQUEST['viewID'] <= 0) { ?>
                            <div class="divRightNav">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                                    <tr>
                                        <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?php echo $valLinkNav1 ?>" target="_self"><?php echo $valNav1 ?></a> <img src="../img/btn/navblack.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('index.php')" target="_self"><?php echo $langMod["tit:inpName"] ?></a> <img src="../img/btn/navblack.png" align="absmiddle" vspace="5" /> <?php echo $langMod["txt:titleview"] ?><?php if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2 || $_SESSION[$valSiteManage . 'core_session_languageT'] == 3) { ?>(<?php echo getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"]) ?>)<?php } ?></span></td>
                                        <td  class="divRightNavTb" align="right">



                                        </td>
                                    </tr>
                                </table>
                            </div>
                        <?php } ?>
                        <div class="divRightHead">
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?php echo $langMod["txt:titleview"] ?><?php if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2 || $_SESSION[$valSiteManage . 'core_session_languageT'] == 3) { ?>(<?php echo getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"]) ?>)<?php } ?></span></td>
                                    <td align="left">
                                        <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                            <tr>
                                                <td align="right">
                                                    <?php if ($_REQUEST['viewID'] <= 0) { ?>
                                                        <?php if ($valPermission == "RW") { ?>
                                                            <div  class="btnEditView" title="<?php echo $langTxt["btn:edit"] ?>" onclick="
                                                                        document.myFormHome.valEditID.value =<?php echo $valID ?>;
                                                                        editContactNew('../<?php echo $mod_fd_root ?>/editContant.php')"></div>
                                                              <?php } ?>
                                                        <div  class="btnBack" title="<?php echo $langTxt["btn:back"] ?>" onclick="btnBackPage('index.php')"></div>
                                                    <?php } ?>
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
                                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:subject"] ?></span><br/>
                                        <span class="formFontTileTxt"><?php echo $langMod["txt:subjectDe"] ?></span>    </td>
                                </tr>
                               

                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:subject"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo $valSubject ?></div></td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:title"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo $valTitle ?></div></td>
                                </tr>

                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:subject2"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo $valSubject2 ?></div></td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:title2"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo $valTitle2 ?></div></td>
                                </tr>
                            </table>
                           <br />
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " style="display:show;">
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:pic"] ?></span><br/>
                                        <span class="formFontTileTxt"><?php echo $langMod["txt:picDe"] ?></span>    </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
                                            <img src="<?php echo $valPic ?>"  style="float:left;border:#c8c7cc solid 1px; max-width:600px;"  onerror="this.src='<?php echo "../img/btn/nopic.jpg" ?>'"  />
                                        </div></td>
                                </tr>
                                 <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $modTxtShowPic[0] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo $modTxtShowPic[$valPicShow] ?></div></td>
                                </tr>

                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
                                            <img src="<?php echo $valPic2 ?>"  style="float:left;border:#c8c7cc solid 1px; max-width:600px;"  onerror="this.src='<?php echo "../img/btn/nopic.jpg" ?>'"  />
                                        </div></td>
                                </tr>
                                 <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $modTxtShowPic[0] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo $modTxtShowPic[$valPicShow2] ?></div></td>
                                </tr>
                            </table>
                            <br />
   <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
        <tr >
            <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                <span class="formFontSubjectTxt"><?php echo $langMod["txt:groupType"] ?></span><br/>
                <span class="formFontTileTxt"><?php echo $langMod["txt:groupTypeDe"] ?></span>    </td>
        </tr>
        <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>
        <tr >
            <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:groupType"] ?>:</td>
            <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
            <div class="formDivView"><?php echo $modGroupType[$valTypec];?></div>

            </td>
        </tr>

        <tr id="boxInputlink"  <?php if($valTypec != 2){ ?> style="display:none;" <?php } ?>>
            <td width="18%" align="right"  valign="top"  class="formLeftContantTb" >ชื่อ URL :<span class="fontContantAlert"></span></td>
            <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><a href="<?php echo $valUrlc ?>" target="_blank"><?php echo $valUrlc?></a></div><br />
            </td>
        </tr>
    
        <tr id="boxInputlinkdesc"  <?php if($valTypec != 2){ ?> style="display:none;" <?php } ?>>
            <td width="18%" align="right"  valign="top"  class="formLeftContantTb" >หมายเหตุ :<span class="fontContantAlert"></span></td>
            <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo $valOutdesc?></div><br />
            </td>
        </tr>

        <tr>
            <td width="18%" align="right"  valign="top"  class="formLeftContantTb" >การแสดงผล :</td>
            <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
            <div class="formDivView"><?php echo $modTxtTarget[$valTarget];?></div>

            </td>
        </tr>
<!-- //////////////////////////////////////////////////////////// -->
        <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>
        <tr >
            <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:groupType2"] ?>:</td>
            <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
            <div class="formDivView"><?php echo $modGroupType[$valTypec2];?></div>

            </td>
        </tr>

        <tr id="boxInputlink2"  <?php if($valTypec2 != 2){ ?> style="display:none;" <?php } ?>>
            <td width="18%" align="right"  valign="top"  class="formLeftContantTb" >ชื่อ URL 2:<span class="fontContantAlert"></span></td>
            <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><a href="<?php echo $valUrlc2 ?>" target="_blank"><?php echo $valUrlc2?></a></div><br />
            </td>
        </tr>
    
        <tr id="boxInputlinkdesc2"  <?php if($valTypec2 != 2){ ?> style="display:none;" <?php } ?>>
            <td width="18%" align="right"  valign="top"  class="formLeftContantTb" >หมายเหตุ 2:<span class="fontContantAlert"></span></td>
            <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo $valOutdesc2?></div><br />
            </td>
        </tr>

        <tr>
            <td width="18%" align="right"  valign="top"  class="formLeftContantTb" >การแสดงผล 2:</td>
            <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
            <div class="formDivView"><?php echo $modTxtTarget[$valTarget2];?></div>

            </td>
        </tr>
    </table>
                            <br <?php if($valTypec == 2){ ?> style="display:none;" <?php } ?> />
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " <?php if($valTypec == 2){ ?> style="display:none;" <?php } ?>>
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:title"] ?></span><br/>
                                        <span class="formFontTileTxt"><?php echo $langMod["txt:titleDe"] ?></span>    </td>
                                </tr>
                                <tr >
                                    <td colspan="7" align="left"  valign="top" class="formTileTxt">
                                        <div  class="viewEditorTileTxt" >
                                            <?php
                                            if(is_file($valHtml)){
                                            $fd = @fopen($valHtml, "r");
                                            $contents = @fread($fd, filesize($valHtml));
                                            @ fclose($fd);
                                            echo txtReplaceHTML($contents);
                                            }
                                            ?>
                                        </div>       
                                    </td>
                                </tr>
                            </table>
                            <br <?php if($valTypec2 == 2){ ?> style="display:none;" <?php } ?> />
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " <?php if($valTypec2 == 2){ ?> style="display:none;" <?php } ?>>
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:title"] ?> 2</span><br/>
                                        <span class="formFontTileTxt"><?php echo $langMod["txt:titleDe"] ?></span>    </td>
                                </tr>
                                <tr >
                                    <td colspan="7" align="left"  valign="top" class="formTileTxt">
                                        <div  class="viewEditorTileTxt" >
                                            <?php
                                            if(is_file($valHtml2)){
                                            $fd = @fopen($valHtml2, "r");
                                            $contents2 = @fread($fd, filesize($valHtml2));
                                            @ fclose($fd);
                                            echo txtReplaceHTML($contents2);
                                            }
                                            ?>
                                        </div>       
                                    </td>
                                </tr>
                            </table>
                            <br<?php if($valTypec == 2){ ?> style="display:none;" <?php } ?> />
                            <table  width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " <?php if($valTypec == 2){ ?> style="display:none;" <?php } ?>>
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:album"] ?></span><br/>
                                        <span class="formFontTileTxt"><?php echo $langMod["txt:albumDe"] ?></span>    </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["txt:album"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
                                            <?php
                                            $sql_filetemp = "SELECT  " . $mod_tb_root_album . "_id," . $mod_tb_root_album . "_filename," . $mod_tb_root_album . "_name," . $mod_tb_root_album . "_download  FROM " . $mod_tb_root_album . " WHERE " . $mod_tb_root_album . "_contantid 	='" . $_REQUEST['valEditID'] . "'   ORDER BY " . $mod_tb_root_album . "_id ASC";
                                            $query_filetemp = wewebQueryDB($coreLanguageSQL,$sql_filetemp);
                                            $number_filetemp = wewebNumRowsDB($coreLanguageSQL,$query_filetemp);
                                            if ($number_filetemp >= 1) {
                                                $valAlbum = "";
                                                while ($row_filetemp = wewebFetchArrayDB($coreLanguageSQL,$query_filetemp)) {
                                                    $linkRelativePath = $mod_path_album . "/" . $row_filetemp[1];
                                                    $downloadFile = $row_filetemp[1];
                                                    $downloadID = $row_filetemp[0];
                                                    $downloadName = $row_filetemp[2];
                                                    $countDownload = $row_filetemp[3];
                                                    $imageType = strstr($downloadFile, '.');
                                                    ?>
                                                    <?php if ($_REQUEST['viewID'] <= 0) { ?>
                                                        <a rel="viewAlbum"  title=""  href="<?php echo $mod_path_album . "/reB_" . $downloadFile ?>">
                                                            <img src="<?php echo $mod_path_album . "/reO_" . $downloadFile ?>"  width="50" height="50"   style="float:left;border:#c8c7cc solid 1px;margin-bottom:15px;margin-right:15px;"  /></a>
                                                    <?php } else { ?>
                                                        <img src="<?php echo $mod_path_album . "/reO_" . $downloadFile ?>"  width="50" height="50"   style="float:left;border:#c8c7cc solid 1px;margin-bottom:15px;margin-right:15px;"  />
                                                    <?php } ?>
                                                <?php }
                                            } else { ?>
                                                -
                                            <?php } ?>
                                        </div></td>
                                </tr>
                            </table>

                            <br <?php if($valTypec2 == 2){ ?> style="display:none;" <?php } ?> />
                            <table  width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " <?php if($valTypec2 == 2){ ?> style="display:none;" <?php } ?>>
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:album"] ?> 2</span><br/>
                                        <span class="formFontTileTxt"><?php echo $langMod["txt:albumDe"] ?></span>    </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["txt:album"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
                                            <?php
                                            $sql_filetemp = "SELECT  " . $mod_tb_root_album . "_id," . $mod_tb_root_album . "_filename2," . $mod_tb_root_album . "_name," . $mod_tb_root_album . "_download  FROM " . $mod_tb_root_album . " WHERE " . $mod_tb_root_album . "_contantid2 	='" . $_REQUEST['valEditID'] . "'   ORDER BY " . $mod_tb_root_album . "_id ASC";
                                            $query_filetemp = wewebQueryDB($coreLanguageSQL,$sql_filetemp);
                                            $number_filetemp = wewebNumRowsDB($coreLanguageSQL,$query_filetemp);
                                            if ($number_filetemp >= 1) {
                                                $valAlbum = "";
                                                while ($row_filetemp = wewebFetchArrayDB($coreLanguageSQL,$query_filetemp)) {
                                                    $linkRelativePath = $mod_path_album . "/" . $row_filetemp[1];
                                                    $downloadFile = $row_filetemp[1];
                                                    $downloadID = $row_filetemp[0];
                                                    $downloadName = $row_filetemp[2];
                                                    $countDownload = $row_filetemp[3];
                                                    $imageType = strstr($downloadFile, '.');
                                                    ?>
                                                    <?php if ($_REQUEST['viewID'] <= 0) { ?>
                                                        <a rel="viewAlbum2"  title=""  href="<?php echo $mod_path_album . "/reB2_" . $downloadFile ?>">
                                                            <img src="<?php echo $mod_path_album . "/reO2_" . $downloadFile ?>"  width="50" height="50"   style="float:left;border:#c8c7cc solid 1px;margin-bottom:15px;margin-right:15px;"  /></a>
                                                    <?php } else { ?>
                                                        <img src="<?php echo $mod_path_album . "/reO2_" . $downloadFile ?>"  width="50" height="50"   style="float:left;border:#c8c7cc solid 1px;margin-bottom:15px;margin-right:15px;"  />
                                                    <?php } ?>
                                                <?php }
                                            } else { ?>
                                                -
                                            <?php } ?>
                                        </div></td>
                                </tr>
                            </table>
                            <br <?php if($valTypec == 2){ ?> style="display:none;" <?php } ?> />
                            <table  width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " <?php if($valTypec == 2){ ?> style="display:none;" <?php } ?>>
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:video"] ?></span><br/>
                                        <span class="formFontTileTxt"><?php echo $langMod["txt:videoDe"] ?></span>    </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["txt:video"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
                                            <?php
                                            if ($valType == "file") {
                                                if ($valFilevdo != "") {
                                                    $filename = $valFilevdo;
                                                    $arrstrfile = explode(".", $valFilevdo);
                                                    $filetype = strtolower($arrstrfile[sizeof($arrstrfile) - 1]);
                                                    ?>
                                                    <div id="areaPlayer" style="z-index:-1999; "></div>
                                                <?php } else { ?>
                                                    -
                                                <?php
                                                }
                                            } else {
                                                if ($valUrl != "") {
                                                    $myUrlArray = explode("v=", $valUrl);
                                                    $myUrlCut = $myUrlArray[1];
                                                    $myUrlCutArray = explode("&", $myUrlCut);
                                                    $myUrlCutAnd = $myUrlCutArray[0];
                                                    ?>
                                                    <iframe width="560" height="315" src="//www.youtube-nocookie.com/embed/<?php echo $myUrlCutAnd ?>" frameborder="0" allowfullscreen  style="z-index:-1999; "></iframe>
                                                    <?php } else { ?>
                                                    -
                                                    <?php }
                                                    } ?>

                                        </div></td>
                                </tr>
                            </table>
                            <br <?php if($valTypec2 == 2){ ?> style="display:none;" <?php } ?> />
                            <table  width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " <?php if($valTypec2 == 2){ ?> style="display:none;" <?php } ?>>
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:video"] ?> 2</span><br/>
                                        <span class="formFontTileTxt"><?php echo $langMod["txt:videoDe"] ?></span>    </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["txt:video"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
                                            <?php
                                            if ($valType2 == "file") {
                                                if ($valFilevdo2 != "") {
                                                    $filename = $valFilevdo2;
                                                    $arrstrfile = explode(".", $valFilevdo2);
                                                    $filetype = strtolower($arrstrfile[sizeof($arrstrfile) - 1]);
                                                    ?>
                                                    <div id="areaPlayer2" style="z-index:-1999; "></div>
                                                <?php } else { ?>
                                                    -
                                                <?php
                                                }
                                            } else {
                                                if ($valUrl2 != "") {
                                                    $myUrlArray = explode("v=", $valUrl2);
                                                    $myUrlCut = $myUrlArray[1];
                                                    $myUrlCutArray = explode("&", $myUrlCut);
                                                    $myUrlCutAnd = $myUrlCutArray[0];
                                                    ?>
                                                    <iframe width="560" height="315" src="//www.youtube-nocookie.com/embed/<?php echo $myUrlCutAnd ?>" frameborder="0" allowfullscreen  style="z-index:-1999; "></iframe>
                                             <?php } else { ?>
                                                    -
                                                 <?php }
                                                    } ?>

                                        </div></td>
                                </tr>
                            </table>
                            <br <?php if($valTypec == 2){ ?> style="display:none;" <?php } ?>/>
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " <?php if($valTypec == 2){ ?> style="display:none;" <?php } ?>>
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:attfile"] ?></span><br/>
                                        <span class="formFontTileTxt"><?php echo $langMod["txt:attfileDe"] ?></span>   </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["txt:attfile"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
                                            <?php
                                            $sql = "SELECT " . $mod_tb_file . "_id," . $mod_tb_file . "_filename," . $mod_tb_file . "_name," . $mod_tb_file . "_download FROM " . $mod_tb_file . " WHERE " . $mod_tb_file . "_contantid 	='" . $valID . "'  ORDER BY " . $mod_tb_file . "_id ASC";
                                            $query_file = wewebQueryDB($coreLanguageSQL,$sql);
                                            $number_row = wewebNumRowsDB($coreLanguageSQL,$query_file);
                                            if ($number_row >= 1) {
                                                $txtFile = "";
                                                while ($row_file = wewebFetchArrayDB($coreLanguageSQL,$query_file)) {
                                                    $linkRelativePath = $mod_path_file . "/" . $row_file[1];
                                                    $downloadFile = $row_file[1];
                                                    $downloadID = $row_file[0];
                                                    $downloadName = $row_file[2];
                                                    $countDownload = $row_file[3];
                                                    $imageType = strstr($downloadFile, '.');
                                                    ?>

                                                    <div  style="float:left; width:100%; height:30px; margin-bottom:15px;"><img src="<?php echo get_Icon($downloadFile) ?>" align="absmiddle" width="30"  /><a href="./get_Attached.php?linkPath=<?php echo $linkRelativePath ?>&amp;downloadFile=<?php echo $downloadFile ?>"><?php echo $downloadName . "" . $imageType ?></a> | <?php echo $langMod["file:type"] ?>: <?php echo $imageType ?> | <?php echo $langMod["file:size"] ?>: <?php echo get_IconSize($linkRelativePath) ?> | <?php echo $langMod["file:download"] ?>: <?php echo number_format($countDownload) ?></div>
                                                    <div></div>

                                                    <?php
                                                }
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                        </div>    </td>
                                </tr>
                            </table>
                            <br <?php if($valTypec2 == 2){ ?> style="display:none;" <?php } ?>/>
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " <?php if($valTypec2 == 2){ ?> style="display:none;" <?php } ?>>
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:attfile"] ?> 2</span><br/>
                                        <span class="formFontTileTxt"><?php echo $langMod["txt:attfileDe"] ?></span>   </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["txt:attfile"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
                                            <?php
                                            $sql = "SELECT " . $mod_tb_file . "_id," . $mod_tb_file . "_filename2," . $mod_tb_file . "_name," . $mod_tb_file . "_download FROM " . $mod_tb_file . " WHERE " . $mod_tb_file . "_contantid2 	='" . $valID . "'  ORDER BY " . $mod_tb_file . "_id ASC";
                                            $query_file = wewebQueryDB($coreLanguageSQL,$sql);
                                            $number_row = wewebNumRowsDB($coreLanguageSQL,$query_file);
                                            if ($number_row >= 1) {
                                                $txtFile = "";
                                                while ($row_file = wewebFetchArrayDB($coreLanguageSQL,$query_file)) {
                                                    $linkRelativePath = $mod_path_file . "/" . $row_file[1];
                                                    $downloadFile = $row_file[1];
                                                    $downloadID = $row_file[0];
                                                    $downloadName = $row_file[2];
                                                    $countDownload = $row_file[3];
                                                    $imageType = strstr($downloadFile, '.');
                                                    ?>

                                                    <div  style="float:left; width:100%; height:30px; margin-bottom:15px;"><img src="<?php echo get_Icon($downloadFile) ?>" align="absmiddle" width="30"  /><a href="./get_Attached.php?linkPath=<?php echo $linkRelativePath ?>&amp;downloadFile=<?php echo $downloadFile ?>"><?php echo $downloadName . "" . $imageType ?></a> | <?php echo $langMod["file:type"] ?>: <?php echo $imageType ?> | <?php echo $langMod["file:size"] ?>: <?php echo get_IconSize($linkRelativePath) ?> | <?php echo $langMod["file:download"] ?>: <?php echo number_format($countDownload) ?></div>
                                                    <div></div>

                                                    <?php
                                                }
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                        </div>    </td>
                                </tr>
                            </table>
                            <br <?php if($valTypec == 2){ ?> style="display:none;" <?php } ?> />
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " <?php if($valTypec == 2){ ?> style="display:none;" <?php } ?>>
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:seo"] ?></span><br/>
                                        <span class="formFontTileTxt"><?php echo $langMod["txt:seoDe"] ?></span>    </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["inp:seotitle"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo $valMetatitle ?></div></td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["inp:seodes"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo $valDescription ?></div></td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["inp:seokey"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo $valKeywords ?></div></td>
                                </tr>
                            </table>
                            <br <?php if($valTypec2 == 2){ ?> style="display:none;" <?php } ?> />
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " <?php if($valTypec2 == 2){ ?> style="display:none;" <?php } ?>>
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:seo"] ?> 2</span><br/>
                                        <span class="formFontTileTxt"><?php echo $langMod["txt:seoDe"] ?></span>    </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["inp:seotitle"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo $valMetatitle2 ?></div></td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["inp:seodes"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo $valDescription2 ?></div></td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["inp:seokey"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo $valKeywords2 ?></div></td>
                                </tr>
                            </table>
                            <br />
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:date"] ?></span><br/>
                                        <span class="formFontTileTxt"><?php echo $langMod["txt:dateDe"] ?></span>    </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:sdate"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo $valSdate ?></div></td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:edate"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo $valEdate ?></div> </td>
                                </tr>
                                <br/>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:sdate"] ?> 2:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo $valSdate2 ?></div></td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:edate"] ?> 2:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo $valEdate2 ?></div> </td>
                                </tr>


                            </table>
                            <br />
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php echo $langTxt["us:titleinfo"] ?></span><br/>
                                        <span class="formFontTileTxt"><?php echo $langTxt["us:titleinfoDe"] ?></span>     </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:view"] ?>:</td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                        <div class="formDivView"><?php echo $valView ?></div>         </td>
                                </tr>
                                <!--<tr <?php if($valTypec == 2){ ?> style="display:none;" <?php } ?>>
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" >URL :<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
                                    <?php  if ($_REQUEST['inputLt'] == "Thai") { ?>
                                    <a href="<?php echo loadGetURLByMod($core_full_path,'th',$mod_fd_frontdetailUrl,$valID,1)?>" target="_blank"><?php echo loadGetURLByMod($core_full_path,'th',$mod_fd_frontdetailUrl,$valID,1)?></a><br />
                                    <?php }else{ ?>
                                    <a href="<?php echo loadGetURLByMod($core_full_path,'en',$mod_fd_frontdetailUrl,$valID,1)?>" target="_blank"><?php echo loadGetURLByMod($core_full_path,'en',$mod_fd_frontdetailUrl,$valID,1)?></a><br />
                                     <?php   }  ?>
                                     </div></td>
                                </tr>-->
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:credate"] ?>:</td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                        <div class="formDivView"><?php echo $valCredate ?></div>         </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:credate"] ?> 2:</td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                        <div class="formDivView"><?php echo $valCredate2 ?></div>         </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:creby"] ?>:</td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                        <div class="formDivView">
                                            <?php
                                            if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
                                                echo getUserThai($valCreby);
                                            } else if ($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
                                                echo getUserEng($valCreby);
                                            }
                                            ?>
                                        </div>         </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:lastdate"] ?>:</td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                        <div class="formDivView"><?php echo $valLastdate ?></div>         </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:creby"] ?>:</td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                        <div class="formDivView">
                                            <?php
                                            if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
                                                echo getUserThai($valLastby);
                                            } else if ($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
                                                echo getUserEng($valLastby);
                                            }
                                            ?>
                                        </div>         </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["mg:status"] ?>:</td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                        <div class="formDivView">

                                            <?php if ($valStatus == "Enable") { ?>
                                                <span class="<?php echo $valStatusClass ?>"><?php echo $valStatus ?></span>
                                            <?php } else { ?>
                                                <span class="<?php echo $valStatusClass ?>"><?php echo $valStatus ?></span>
<?php } ?>
                                        </div>         </td>
                                </tr>
                            </table>
                            <br />     <?php if ($_REQUEST['viewID'] <= 0) { ?>

                                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" >

                                    <tr >
                                        <td colspan="7" align="right"  valign="top" height="20"></td>
                                    </tr>
                                    <tr >
                                        <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php echo $langTxt["btn:gototop"] ?>"><?php echo $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
                                    </tr>
<?php } ?>
                            </table>
                        </div>
                    </form>
                    <?php include("../lib/disconnect.php"); ?>
<?php if ($_REQUEST['viewID'] <= 0) { ?>
                        <link rel="stylesheet" type="text/css" href="../js/fancybox/jquery.fancybox.css" media="screen" />
                        <script language="JavaScript"  type="text/javascript" src="../js/fancybox/jquery.fancybox.js"></script>
                        <script type="text/javascript">
                                                                                  jQuery(function () {
                                                                                      jQuery('a[rel=viewAlbum]').fancybox({
                                                                                          'padding': 0,
                                                                                          'transitionIn': 'fade',
                                                                                          'transitionOut': 'fade',
                                                                                          'autoSize': false,
                                                                                      });
                                                                                  });
                        </script>

<script type="text/javascript">
                                                                                  jQuery(function () {
                                                                                      jQuery('a[rel=viewAlbum2]').fancybox({
                                                                                          'padding': 0,
                                                                                          'transitionIn': 'fade',
                                                                                          'transitionOut': 'fade',
                                                                                          'autoSize': false,
                                                                                      });
                                                                                  });
                        </script>
<?php } ?>

                    <script type='text/javascript' src='../<?php echo $mod_fd_root ?>/swfobject.js'></script>
                    <script type='text/javascript' src='../<?php echo $mod_fd_root ?>/silverlight.js'></script>
                    <script type='text/javascript' src='../<?php echo $mod_fd_root ?>/wmvplayer.js'></script>
                    <script type='text/javascript'>
                                                                              var filename = "<?php echo $filename ?>";
                                                                              var filetype = "<?php echo $filetype ?>";
                                                                              var cnt = document.getElementById("areaPlayer");
                                                                              if (filetype == "flv") {
                                                                                  var s1 = new SWFObject('../<?php echo $mod_fd_root ?>/player.swf', 'player', '560', '315', '9');
                                                                                  s1.addParam('allowfullscreen', 'true');
                                                                                  s1.addParam('wmode', 'transparent');
                                                                                  s1.addParam('allowscriptaccess', 'always');
                                                                                  s1.addParam('flashvars', 'file=<?php echo $mod_path_vdo ?>/' + filename);
                                                                                  s1.write('areaPlayer');
                                                                              } else/* if(filetype=="wmv")*/ {

                                                                                  var src = '../<?php echo $mod_fd_root ?>/wmvplayer.xaml';
                                                                                  var cfg = "";
                                                                                  var ply;
                                                                                  cfg = {
                                                                                      file: '<?php echo $mod_path_vdo ?>/' + filename,
                                                                                      image: '',
                                                                                      height: '315',
                                                                                      width: '560',
                                                                                      autostart: "false",
                                                                                      windowless: 'true',
                                                                                      showstop: 'true'
                                                                                  };
                                                                                  ply = new jeroenwijering.Player(cnt, src, cfg);
                                                                              }
                    </script>

<script type='text/javascript'>
                                                                              var filename = "<?php echo $filename ?>";
                                                                              var filetype = "<?php echo $filetype ?>";
                                                                              var cnt = document.getElementById("areaPlayer2");
                                                                              if (filetype == "flv") {
                                                                                  var s1 = new SWFObject('../<?php echo $mod_fd_root ?>/player.swf', 'player', '560', '315', '9');
                                                                                  s1.addParam('allowfullscreen', 'true');
                                                                                  s1.addParam('wmode', 'transparent');
                                                                                  s1.addParam('allowscriptaccess', 'always');
                                                                                  s1.addParam('flashvars', 'file=<?php echo $mod_path_vdo ?>/' + filename);
                                                                                  s1.write('areaPlayer2');
                                                                              } else/* if(filetype=="wmv")*/ {

                                                                                  var src = '../<?php echo $mod_fd_root ?>/wmvplayer.xaml';
                                                                                  var cfg = "";
                                                                                  var ply;
                                                                                  cfg = {
                                                                                      file: '<?php echo $mod_path_vdo ?>/' + filename,
                                                                                      image: '',
                                                                                      height: '315',
                                                                                      width: '560',
                                                                                      autostart: "false",
                                                                                      windowless: 'true',
                                                                                      showstop: 'true'
                                                                                  };
                                                                                  ply = new jeroenwijering.Player(cnt, src, cfg);
                                                                              }
                    </script>


                </body>
                </html>
