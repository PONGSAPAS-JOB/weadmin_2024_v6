<?php
$menuActive = "new";
$menuDetail = "detail";
$menuDetail2 = "detail2";
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js' . $lastModify . '"></script>';
$HomePage = new HomePage;
$smarty->assign("HomePage", $HomePage);
$ContentID = ($url->segment[2]);
if ($ContentID <= 0) {
    $ContentID = ($url->segment[2]);
} else {
    $ContentID =  $ContentID;
}
switch ($url->segment[1]) {
    case 'detail':

        

        $callCms = $HomePage->callCms($config['cmstest']['masterkey'], $ContentID);
        $smarty->assign("callCms", $callCms);

        if ($callCms->_numOfRows < 1) {
            header("Location:" . $linklang . "/new");
            exit();
        }
        // print_pre($callCms);

        $callCmsRelate = $HomePage->callCmsRelate($config['cmstest']['masterkey'], $callCms->fields['id']);
        $smarty->assign("callCmsRelate", $callCmsRelate);

        $Call_Cma = $HomePage->Call_Cma($ContentID, $config['cma']['db']);
        $smarty->assign("call_news_album", $Call_Cma);
        // print_pre($Call_Cma);

        $Call_FileDownload = $HomePage->Call_FileDownload($ContentID, $config['cmf']['db']['main']);
        $smarty->assign("Call_FileDownload", $Call_FileDownload);

        $callCmsRelate = $HomePage->callCmsRelate($config['cmstest']['masterkey'], $callCms->fields['id'], 4);
        $smarty->assign("callCmsRelate", $callCmsRelate);

        /*## Start Update View #####*/
        if (!isset($_COOKIE['VIEW_DETAIL_' . $config['cmstest']['masterkey'] . '_' . $ContentID])) {
            setcookie("VIEW_DETAIL_" . $config['cmstest']['masterkey'] . '_' . $ContentID, true, time() + 600);
            $viewContent = $HomePage->updateView($ContentID, $config['cmstest']['masterkey'], $config['cmstest']['db']);
        }
        // print_pre($viewContent);
        /*## End Update View #####*/
        // print_pre($callCms->fields['ordernum']);
        $previousCms =  $HomePage->getPreviousCms($config['cmstest']['masterkey'],$ContentID, $callCms->fields['ordernum']);
        $nextCms =  $HomePage->getNextCms( $config['cmstest']['masterkey'],$ContentID, $callCms->fields['ordernum']);
        $smarty->assign("previousCms", $previousCms);
        $smarty->assign("nextCms", $nextCms);
        
        

        /*## Start SEO #####*/
        if ($callCms->fields['pic'] !== '') {
            $fullpath_pic = fileinclude($callCms->fields['pic'], 'real', $callCms->fields['masterkey'], 'link');
        } else {
            $fullpath_pic = '';
        }
        $smarty->assign("valSeoImages", $fullpath_pic);
        $seo_desc = ($callCms->fields['description'] != '' ? $callCms->fields['description'] : '');
        $seo_title = ($callCms->fields['metatitle'] != '' ? $callCms->fields['metatitle'] : $callCms->fields['subject']);
        $seo_keyword = ($callCms->fields['keywords'] != '' ? $callCms->fields['keywords'] : '');
        $seo_pic = ($callCms->fields['pic'] != '' ? $fullpath_pic : '');
        Seo($seo_title, $seo_desc, $seo_keyword);
        /*## End SEO #####*/
        // print_pre($seo_title);
        $settingPage = array(
            "page" => $menuActive,
            "template" => "detail.tpl",
            "display" => "page"
        );

        break;

    case 'detail2':

        $callCms = $HomePage->callCms($config['cmstest']['masterkey'], $ContentID);
        $smarty->assign("callCms", $callCms);

        if ($callCms->_numOfRows < 1) {
            header("Location:" . $linklang . "/new");
            exit();
        }
        // print_pre($callCms);
        // print_pre($callCms->fields['prev_id']);

        $callCmsRelate = $HomePage->callCmsRelate($config['cmstest']['masterkey'], $callCms->fields['id']);
        $smarty->assign("callCmsRelate", $callCmsRelate);

        $Call_Cma2 = $HomePage->Call_Cma2($ContentID, $config['cma']['db']);
        $smarty->assign("call_news_album2", $Call_Cma2);


        $Call_FileDownload2 = $HomePage->Call_FileDownload2($ContentID, $config['cmf']['db']['main']);
        $smarty->assign("Call_FileDownload2", $Call_FileDownload2);

        $callCmsRelate = $HomePage->callCmsRelate($config['cmstest']['masterkey'], $callCms->fields['id'], 4);
        $smarty->assign("callCmsRelate", $callCmsRelate);

        /*## Start Update View #####*/
        if (!isset($_COOKIE['VIEW_DETAIL_' . $config['cmstest']['masterkey'] . '_' . $ContentID])) {
            setcookie("VIEW_DETAIL_" . $config['cmstest']['masterkey'] . '_' . $ContentID, true, time() + 600);
            $viewContent = $HomePage->updateView($ContentID, $config['cmstest']['masterkey'], $config['cmstest']['db']);
        }
        /*## End Update View #####*/

        $previousCms2 =  $HomePage->getPreviousCms2($config['cmstest']['masterkey'],$ContentID, $callCms->fields['ordernum']);
        $nextCms2 =  $HomePage->getNextCms2( $config['cmstest']['masterkey'],$ContentID, $callCms->fields['ordernum']);
        $smarty->assign("previousCms2", $previousCms2);
        $smarty->assign("nextCms2", $nextCms2);

        /*## Start SEO #####*/
        if ($callCms->fields['pic'] !== '') {
            $fullpath_pic = fileinclude($callCms->fields['pic'], 'real', $callCms->fields['masterkey'], 'link');
        } else {
            $fullpath_pic = '';
        }
        $smarty->assign("valSeoImages", $fullpath_pic);
        $seo_desc = ($callCms->fields['description'] != '' ? $callCms->fields['description'] : '');
        $seo_title = ($callCms->fields['metatitle'] != '' ? $callCms->fields['metatitle'] : $callCms->fields['subject']);
        $seo_keyword = ($callCms->fields['keywords'] != '' ? $callCms->fields['keywords'] : '');
        $seo_pic = ($callCms->fields['pic'] != '' ? $fullpath_pic : '');
        Seo($seo_title, $seo_desc, $seo_keyword);
        /*## End SEO #####*/

        $settingPage = array(
            "page" => $menuActive,
            "template" => "detail2.tpl",
            "display" => "page"
        );

        break;

    default:

        $limit = $_REQUEST['limit'];
        $ordernews = $_REQUEST['ordernews'];
        $keywords = $_REQUEST['keywords'];
        if ($ordernews == "ASC") {
            $sorting = "ASC";
        } else {
            $sorting = "DESC";
        }
        if ($limit < 1 && empty($limit)) {
            $limit = 4;
        }
        $smarty->assign("limit", $limit);
        $smarty->assign("ordernews", $ordernews);
        $smarty->assign("keywords", $keywords);

        // print_pre($ordernews);

        // $callCmsTest = $HomePage->callCmsTest(null, null,$ordernews, null);

        // $smarty->assign("callCmsTest", $callCmsTest);
        // print_r($ordernews);


        $callCmsTest = $HomePage->callCmsTest($page['on'], $limit, $sorting, $config['cmstest']['masterkey'], $keywords, $ordernews);


        // print_pre($callCmsTest);
        $smarty->assign("masterkey", $config['cmstest']['masterkey']);
        $smarty->assign("callCmsTest", $callCmsTest);
        // print_pre($callCmsTest);

        /*## Start SEO #####*/

        $valPageHomeSeoTitle = $lang['menu']['new'];
        $valPageHomeSeoDesc = "";
        $valPageHomeSeokey = "";
        $valPageHomeSeoPic = "";
        $valDataHomeSiteSeo = Seo($valPageHomeSeoTitle, $valPageHomeSeoDesc, $valPageHomeSeokey, $valPageHomeSeoPic);
        $smarty->assign("seo", $valDataHomeSiteSeo);

        /*## End SEO #####*/

        /*## Set up pagination #####*/
        $pagination['total'] = $callCmsTest->_maxRecordCount;
        $pagination['totalpage'] = ceil(($pagination['total'] / $limit));
        $pagination['limit'] = $limit;
        $pagination['curent'] = $page['on'];
        $pagination['method'] = $page;
        $smarty->assign("pagination", $pagination);
        /*## Set up pagination #####*/
        /*## Set up pagination #####*/

        $urlfull = _FullUrl;
        $smarty->assign("urlfull", $urlfull);

        $settingPage = array(
            "page" => $menuActive,
            "template" => "index.tpl",
            "display" => "page"
        );

        break;
}
$segment = $url->segment[0];
$smarty->assign("segment", $segment);
$smarty->assign("menuActive", $menuActive);
$smarty->assign("fileInclude", $settingPage);
$smarty->assign("menuDetail", $menuDetail);
