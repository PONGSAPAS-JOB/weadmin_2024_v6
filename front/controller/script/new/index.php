<?php
$menuActive = "new";
$menuDetail = "detail";
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js"></script>';
$HomePage = new HomePage;
$ContantID = $url->segment[3];

switch ($url->segment[1]) {
    case 'detail':
        
       
         /*## Start Call News #####*/
         $callCmsTest = $HomePage->callCmsTest($ContantID);
         $smarty->assign("callCmsTest", $callCmsTest);
         /*## Start Call News #####*/

          /*## Start Call Product Contact#####*/
        $callCms = $HomePage->callCmsTest();
        $smarty->assign("callCms", $callCms);
        /*## Start Call Product Contact #####*/

        /*## Start Call ProductID Contact#####*/
        $smarty->assign("CmsTestID", $callCmsTest->fields['id']);
        /*## Start Call ProductID Contact#####*/

        /*## Start Update View #####*/
        if (!isset($_COOKIE['VIEW_DETAIL_' . $$config['cms']['masterkey'] . '_' . urldecode($ContantID)])) {
            setcookie("VIEW_DETAIL_" . $$config['cms']['masterkey'] . '_' . urldecode($ContantID), true, time() + 600);
            $viewContent = $HomePage->updateViewCmsTest($ContantID, $config['cms']['masterkey']);
        }
        /*## End Update View #####*/

         /*## Start SEO #####*/
         if($callCmsTest->fields['pic'] !== ''){
            $fullpath_pic = fileinclude($callCmsTest->fields['pic'],'real',$callCmsTest->fields['masterkey'],'link');
        }else{
            $fullpath_pic = '';
        }  
         $valPageHomeSeoTitle = ($callCmsTest["metatitle"] != '' ? $callCmsTest["metatitle"] : $callCmsTest["subject"]) . " - " . $settingsite["seo_title"];
         $valPageHomeSeoDesc =($callCmsTest["description"] != '' ? $callCmsTest["description"] : '');;
         $valPageHomeSeokey =($callCmsTest["keywords"] != '' ? $callCmsTest["keywords"] : '');
         $valPageHomeSeoPic =$callCmsTest["pic"]["pictures"];
         $valDataHomeSiteSeo = Seo($valPageHomeSeoTitle,$valPageHomeSeoDesc,$valPageHomeSeokey,$valPageHomeSeoPic);
         $smarty->assign("seo", $valDataHomeSiteSeo);
         
         /*## End SEO #####*/
       
        $urlfull = _FullUrl;
        $smarty->assign("urlfull", $urlfull);
        $settingPage = array(
            "page" => $menuActive,
            "template" => "detail.tpl",
            "display" => "page"
        );
        break;
        
        default:
        
        $limitnews = 4;
        $pagenow = $_GET['page'];
        $ordernews = $_GET['order'];
        $keywords = $_REQUEST['keywords'];
        if ($ordernews == '') {
            $ordernews = 'DESC';
        }
        if ($pagenow == '') {
            $pagenow = '1';
        }
        $form['keywords'] = trim($_REQUEST['keywords']);
        $smarty->assign("ordernews",$ordernews);
        $smarty->assign("keywords", $keywords);
      
        // print_pre($ordernews);
        
        // $callCmsTest = $HomePage->callCmsTest(null, null,$ordernews, null);
       
        // $smarty->assign("callCmsTest", $callCmsTest);
        // print_r($ordernews);
        // print('ttttt');
       
        $callCmsTest = $HomePage->callCmsTestPage(null, null, $page['on'], $limitnews, $ordernews, $form);
        $smarty->assign("callCmsTest", $callCmsTest);
         print_pre($callCmsTest);
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
      $pagination['totalpage'] = ceil(($pagination['total'] / $limitnews));
      $pagination['limit'] = $limitnews;
      $pagination['curent'] = $page['on'];
      $pagination['method'] = $page;
      $smarty->assign("pagination",$pagination);
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

$smarty->assign("menuActive", $menuActive);
$smarty->assign("fileInclude", $settingPage);
$smarty->assign("menuDetail", $menuDetail);
