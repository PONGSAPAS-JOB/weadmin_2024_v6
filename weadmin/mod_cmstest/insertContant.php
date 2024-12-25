<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");

if ($_REQUEST['execute'] == "insert") {
    $randomNumber = randomNameupdate(2);

    if (!is_dir($core_pathname_upload . "/" . $masterkey)) {
        mkdir($core_pathname_upload . "/" . $masterkey, 0777);
    }
    if (!is_dir($mod_path_html)) {
        mkdir($mod_path_html, 0777);
    }


    if (@file_exists($mod_path_html . "/" . $htmlfiledelete)) {
        @unlink($mod_path_html . "/" . $htmlfiledelete);
    }

    if (@file_exists($mod_path_html . "/" . $htmlfiledelete2)) {
        @unlink($mod_path_html . "/" . $htmlfiledelete2);
    }

    if ($_POST['inputHtml'] != "") {
        $filename = "html-".$randomNumber . ".html";
        $HTMLToolContent = str_replace("\\\"", "\"", $_POST['inputHtml']);
        $fp = fopen($mod_path_html . "/" . $filename, "w");
        chmod($mod_path_html . "/" . $filename, 0777);
        fwrite($fp, $HTMLToolContent);
        fclose($fp);
    }
    if ($_POST['inputHtml2'] != "") {
        $filename2 = "html2-".$randomNumber . ".html";
        $HTMLToolContent = str_replace("\\\"", "\"", $_POST['inputHtml2']);
        $fp = fopen($mod_path_html . "/" . $filename2, "w");
        chmod($mod_path_html . "/" . $filename2, 0777);
        fwrite($fp, $HTMLToolContent);
        fclose($fp);
    }


    $sql = "SELECT MAX(" . $mod_tb_root . "_order) FROM " . $mod_tb_root;
    $Query = wewebQueryDB($coreLanguageSQL,$sql);
    $Row = wewebFetchArrayDB($coreLanguageSQL,$Query);
    $maxOrder = $Row[0] + 1;

    $insert = array();
    $insert[$mod_tb_root . "_language"] = "'" . $_SESSION[$valSiteManage . 'core_session_language'] . "'";
    $insert[$mod_tb_root . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
    $insert[$mod_tb_root . "_subject"] = "'" . changeQuot($_REQUEST['inputSubject']) . "'";
    $insert[$mod_tb_root . "_title"] = "'" . changeQuot($_REQUEST['inputDescription']) . "'";

    $insert[$mod_tb_root . "_subject2"] = "'" . changeQuot($_REQUEST['inputSubject2']) . "'";
    $insert[$mod_tb_root . "_title2"] = "'" . changeQuot($_REQUEST['inputDescription2']) . "'";

    // $insert[$mod_tb_root . "_gid"] = "'" . $_POST["inputGroupID"] . "'";

    $insert[$mod_tb_root . "_pic"] = "'" . $_POST["picname"] . "'";
    $insert[$mod_tb_root . "_picshow"]="'".$_POST["inputTypePic"]."'";
    $insert[$mod_tb_root . "_pic2"] = "'" . $_POST["picname2"] . "'";
    $insert[$mod_tb_root . "_picshow2"]="'".$_POST["inputTypePic2"]."'";

    $insert[$mod_tb_root . "_type"] = "'" . $_POST["inputType"] . "'";
    $insert[$mod_tb_root . "_url"] = "'" . changeQuot($_REQUEST['inputurl']) . "'";
    $insert[$mod_tb_root . "_filevdo"] = "'" . $_POST["vdoname"] . "'";
    $insert[$mod_tb_root . "_htmlfilename"] = "'" . $filename . "'";
    $insert[$mod_tb_root . "_htmlfilename2"] = "'" . $filename2 . "'";
    $insert[$mod_tb_root . "_crebyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
    $insert[$mod_tb_root . "_creby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
    $insert[$mod_tb_root . "_lastbyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
    $insert[$mod_tb_root . "_lastby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
    $insert[$mod_tb_root . "_description"] = "'" . changeQuot($_REQUEST['inputTagDescription']) . "'";
    $insert[$mod_tb_root . "_keywords"] = "'" . changeQuot($_REQUEST['inputTagKeywords']) . "'";
    $insert[$mod_tb_root . "_metatitle"] = "'" . changeQuot($_REQUEST['inputTagTitle']) . "'";
    $insert[$mod_tb_root . "_sdate"] = "'" . DateFormatInsert($_REQUEST['sdateInput']) . "'";
    $insert[$mod_tb_root . "_edate"] = "'" . DateFormatInsert($_REQUEST['edateInput']) . "'";
    $insert[$mod_tb_root . "_typec"] = "'" . $_REQUEST["inputTypeC"] . "'";
    $insert[$mod_tb_root . "_urlc"] = "'" . $_REQUEST["inputurlc"] . "'";
    $insert[$mod_tb_root . "_target"] = "'" . $_REQUEST["inputTarget"] . "'";

    $insert[$mod_tb_root . "_typec2"] = "'" . $_REQUEST["inputTypeC2"] . "'";
    $insert[$mod_tb_root . "_urlc2"] = "'" . $_REQUEST["inputurlc2"] . "'";
    $insert[$mod_tb_root . "_target2"] = "'" . $_REQUEST["inputTarget2"] . "'";
    $insert[$mod_tb_root . "_outdesc"] = "'" . $_REQUEST["inputurlcdesc"] . "'";

    if ($_REQUEST['cdateInput'] != "") {
        $insert[$mod_tb_root . "_credate"] = "'" . DateFormatInsert($_REQUEST['cdateInput']) . "'";
    } else {
        $insert[$mod_tb_root . "_credate"] = "NOW()";
    }

    $insert[$mod_tb_root . "_lastdate"] = "NOW()";
    $insert[$mod_tb_root . "_status"] = "'Disable'";
    $insert[$mod_tb_root . "_pin"] = "'Unpin'";
    $insert[$mod_tb_root . "_order"] = "'" . $maxOrder . "'";
    $sql = "INSERT INTO " . $mod_tb_root . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
    // print_pre($sql);die;
    $Query = wewebQueryDB($coreLanguageSQL,$sql);
    $contantID = wewebInsertID($coreLanguageSQL);

    // print_pre($contantID);
    $sql_albumtemp = "SELECT " . $mod_tb_root_albumTemp . "_id," . $mod_tb_root_albumTemp . "_filename 
    FROM " . $mod_tb_root_albumTemp . " WHERE " . $mod_tb_root_albumTemp . "_contantid 	='" . $_REQUEST['valEditID'] . "' 
    ORDER BY " . $mod_tb_root_albumTemp . "_id ASC";

    $query_albumtemp = wewebQueryDB($coreLanguageSQL,$sql_albumtemp);
    $number_albumtemp = wewebNumRowsDB($coreLanguageSQL,$query_albumtemp);

    if ($number_albumtemp >= 1) {
        while ($row_albumtemp = wewebFetchArrayDB($coreLanguageSQL,$query_albumtemp)) {
            $downloadID = $row_albumtemp[0];
            $downloadFile = $row_albumtemp[1];
            $downloadName = $row_albumtemp[2];

            $insert = array();
            $insert[$mod_tb_root_album . "_contantid"] = "'" . $contantID . "'";
            $insert[$mod_tb_root_album . "_filename"] = "'" . $downloadFile . "'";
            $insert[$mod_tb_root_album . "_name"] = "'" . $downloadName . "'";
            $insert[$mod_tb_root_album . "_language"] = "'" . $_REQUEST['inputLt'] . "'";

            $sql = "INSERT INTO " . $mod_tb_root_album . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
            $Query = wewebQueryDB($coreLanguageSQL,$sql);
          //  print_pre($Query);

            $sql_del = "DELETE FROM " . $mod_tb_root_albumTemp . " WHERE   " . $mod_tb_root_albumTemp . "_id='" . $downloadID . "'";
            $Query_del = wewebQueryDB($coreLanguageSQL,$sql_del);
        }
    }

     // print_pre($contantID);
     $sql_albumtemp2 = "SELECT " . $mod_tb_root_albumTemp . "_id," . $mod_tb_root_albumTemp . "_filename2 
     FROM " . $mod_tb_root_albumTemp . " WHERE " . $mod_tb_root_albumTemp . "_contantid2 	='" . $_REQUEST['valEditID'] . "' 
     ORDER BY " . $mod_tb_root_albumTemp . "_id ASC";
 
     $query_albumtemp2 = wewebQueryDB($coreLanguageSQL,$sql_albumtemp2);
     $number_albumtemp2 = wewebNumRowsDB($coreLanguageSQL,$query_albumtemp2);
 
     if ($number_albumtemp2 >= 1) {
         while ($row_albumtemp2 = wewebFetchArrayDB($coreLanguageSQL,$query_albumtemp2)) {
             $downloadID2 = $row_albumtemp2[0];
             $downloadFile2 = $row_albumtemp2[1];
             $downloadName2 = $row_albumtemp2[2];
 
             $insert = array();
             $insert[$mod_tb_root_album . "_contantid2"] = "'" . $contantID . "'";
             $insert[$mod_tb_root_album . "_filename2"] = "'" . $downloadFile2 . "'";
             $insert[$mod_tb_root_album . "_name"] = "'" . $downloadName . "'";
             $insert[$mod_tb_root_album . "_language"] = "'" . $_REQUEST['inputLt'] . "'";
 
             $sql = "INSERT INTO " . $mod_tb_root_album . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
             $Query = wewebQueryDB($coreLanguageSQL,$sql);
           //  print_pre($Query);
 
             $sql_del = "DELETE FROM " . $mod_tb_root_albumTemp . " WHERE   " . $mod_tb_root_albumTemp . "_id='" . $downloadID2 . "'";
             $Query_del = wewebQueryDB($coreLanguageSQL,$sql_del);
         }
     }
 

    $sql_filetemp = "SELECT " . $mod_tb_fileTemp . "_id," . $mod_tb_fileTemp . "_filename," . $mod_tb_fileTemp . "_name  FROM " . $mod_tb_fileTemp . " WHERE " . $mod_tb_fileTemp . "_contantid 	='" . $_REQUEST['valEditID'] . "' ORDER BY " . $mod_tb_fileTemp . "_id ASC";
    $query_filetemp = wewebQueryDB($coreLanguageSQL,$sql_filetemp);
    $number_filetemp = wewebNumRowsDB($coreLanguageSQL,$query_filetemp);
    if ($number_filetemp >= 1) {
        while ($row_filetemp = wewebFetchArrayDB($coreLanguageSQL,$query_filetemp)) {
            $downloadID = $row_filetemp[0];
            $downloadFile = $row_filetemp[1];
            $downloadName = $row_filetemp[2];

            $insert = array();
            $insert[$mod_tb_file . "_contantid"] = "'" . $contantID . "'";
            $insert[$mod_tb_file . "_filename"] = "'" . $downloadFile . "'";
            $insert[$mod_tb_file . "_name"] = "'" . $downloadName . "'";
            $insert[$mod_tb_file . "_language"] = "'" . $_REQUEST['inputLt'] . "'";

            $sql = "INSERT INTO " . $mod_tb_file . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
            $Query = wewebQueryDB($coreLanguageSQL,$sql);
            
            // die($sql);
            $sql_del = "DELETE FROM " . $mod_tb_fileTemp . " WHERE   " . $mod_tb_fileTemp . "_id='" . $downloadID . "'";
            $Query_del = wewebQueryDB($coreLanguageSQL,$sql_del);
        }
    }

    $sql_filetemp = "SELECT " . $mod_tb_fileTemp . "_id," . $mod_tb_fileTemp . "_filename2," . $mod_tb_fileTemp . "_name  FROM " . $mod_tb_fileTemp . " WHERE " . $mod_tb_fileTemp . "_contantid2 	='" . $_REQUEST['valEditID'] . "' ORDER BY " . $mod_tb_fileTemp . "_id ASC";
    $query_filetemp = wewebQueryDB($coreLanguageSQL,$sql_filetemp);
    $number_filetemp = wewebNumRowsDB($coreLanguageSQL,$query_filetemp);
    if ($number_filetemp >= 1) {
        while ($row_filetemp = wewebFetchArrayDB($coreLanguageSQL,$query_filetemp)) {
            $downloadID = $row_filetemp[0];
            $downloadFile = $row_filetemp[1];
            $downloadName = $row_filetemp[2];

            $insert = array();
            $insert[$mod_tb_file . "_contantid2"] = "'" . $contantID . "'";
            $insert[$mod_tb_file . "_filename2"] = "'" . $downloadFile . "'";
            $insert[$mod_tb_file . "_name"] = "'" . $downloadName . "'";
            $insert[$mod_tb_file . "_language"] = "'" . $_REQUEST['inputLt'] . "'";

            $sql = "INSERT INTO " . $mod_tb_file . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
            $Query = wewebQueryDB($coreLanguageSQL,$sql);
            
            // die($sql);
            $sql_del = "DELETE FROM " . $mod_tb_fileTemp . " WHERE   " . $mod_tb_fileTemp . "_id='" . $downloadID . "'";
            $Query_del = wewebQueryDB($coreLanguageSQL,$sql_del);
        }
    }


    if (!empty($_POST['projectSelect'])) {
        foreach ($_POST['projectSelect'] as $listaddProject) {

            $insert = array();
            $insert[$mod_fd_project_news . "_nid"] = "'" . $contantID . "'";
            $insert[$mod_fd_project_news . "_pid"] = "'" . $listaddProject . "'";

            $sql = "INSERT INTO " . $mod_fd_project_news . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
            $Query = wewebQueryDB($coreLanguageSQL,$sql);
        }
    }


    logs_access('3', 'Insert');

    ## URL Search ###################################
    $txt_value_to = encodeURL("c=" . $contantID . "");

    $valUrlSearchTH = $mod_url_search_th . "/" . $contantID . "/";
    $valUrlSearchEN = $mod_url_search_en . "/" . $contantID . "/";


    $insertSch = array();
    $insertSch[$core_tb_search . "_language"] = "'" . $_REQUEST['inputLt'] . "'";
    $insertSch[$core_tb_search . "_contantid"] = "'" . $contantID . "'";
    $insertSch[$core_tb_search . "_masterkey"] = "'" . $_POST["masterkey"] . "'";
    $insertSch[$core_tb_search . "_subject"] = "'" . changeQuot($_POST["inputSubject"]) . "'";
    $insertSch[$core_tb_search . "_title"] = "'" . changeQuot($_POST["inputDescription"]) . "'";
    $insertSch[$core_tb_search . "_subject2"] = "'" . changeQuot($_REQUEST['inputSubject2']) . "'";
    $insertSch[$core_tb_search . "_title2"] = "'" . changeQuot($_REQUEST['inputDescription2']) . "'";
    $insertSch[$core_tb_search . "_keyword"] = "'" . addslashes($_POST["inputSubject"]) . " " . addslashes($_POST["inputDescription"]) . " " . htmlspecialchars($_POST['inputHtml']) . "'";
    $insertSch[$core_tb_search . "_url"] = "'" . $valUrlSearchTH . "'";
    $insertSch[$core_tb_search . "_urlen"] = "'" . $valUrlSearchEN . "'";
    $insertSch[$core_tb_search . "_edate"] = "'" . DateFormatInsert($_POST["edateInput"]) . "'";
    $insertSch[$core_tb_search . "_sdate"] = "'" . DateFormatInsert($_POST["sdateInput"]) . "'";
    $insertSch[$core_tb_search . "_status"] = "'Disable'";
    $sqlSch = "INSERT " . $core_tb_search . " (" . implode(",", array_keys($insertSch)) . ") VALUES (" . implode(",", array_values($insertSch)) . ")";
    $querySch = wewebQueryDB($coreLanguageSQL,$sqlSch);

    // print_pre($sqlSch);
}
?>
<?php include("../lib/disconnect.php"); ?>
<form action="index.php" method="post" name="myFormAction" id="myFormAction">
    <input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST['masterkey'] ?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST['menukeyid'] ?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo $_REQUEST['inputSearch'] ?>" />
    <? include("./inc-input-array.php");?>
</form>
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit();</script>
