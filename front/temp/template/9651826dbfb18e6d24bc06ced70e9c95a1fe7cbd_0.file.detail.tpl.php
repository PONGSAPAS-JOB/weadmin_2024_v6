<?php
/* Smarty version 4.3.2, created on 2025-01-08 16:18:21
  from '/var/www/html/weadmin_2024_v5/front/controller/script/new/template/detail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_677e42dd709c76_77171226',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9651826dbfb18e6d24bc06ced70e9c95a1fe7cbd' => 
    array (
      0 => '/var/www/html/weadmin_2024_v5/front/controller/script/new/template/detail.tpl',
      1 => 1736327898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_677e42dd709c76_77171226 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/weadmin_2024_v5/front/libs/smarty4320/plugins/modifier.number_format.php','function'=>'smarty_modifier_number_format',),1=>array('file'=>'/var/www/html/weadmin_2024_v5/front/libs/smarty4320/plugins/modifier.explode.php','function'=>'smarty_modifier_explode',),));
?>
<section class="site-container">
    <div class="default-header">
        <div class="breadcrumb-block">
            <div class="container">
                <div class="row align-items-center no-gutters">
                    <div class="col">
                        <ol class="breadcrumb">
                            <li>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/home" class="link" title="หน้าแรก">
                                    <span class="feather icon-home"></span>
                                    หน้าแรก/ HOME</a>
                            </li>
                            <li>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/new" class="link" title="ข่าวสาร">
                                    ข่าวสารและประชาสัมพันธ์ / News & Public Relations
                                </a>
                            </li>
                            <li class="active">
                                Detail 1 / <?php echo $_smarty_tpl->tpl_vars['callCms']->value->fields['subject'];?>

                            </li>
                        </ol>
                    </div>
                    <div style="display: flex;">
                        <div class="col-auto">
                            <div class="back-to-previous">
                                <a href="javascript:void(0)" onclick="history.back()" title="กลับ" class="link">
                                    <span class="feather icon-arrow-left"></span>
                                    กลับ/ BACK</a>
                            </div>
                        </div>

                        <div class="col-auto">
                            <div class="back-to-previous">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/new/detail2/<?php echo $_smarty_tpl->tpl_vars['callCms']->value->fields['id'];?>
" title="Detail 2" class="link"
                                    style="margin-left: 800px;">
                                    <span class="feather icon-arrow-left"></span>
                                    Detail 2 </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="default-body">
        <div class="home-content news-detail">

            
            <div class="gallery-detail">
                <div class="container">
                    <?php if ($_smarty_tpl->tpl_vars['call_news_album']->value->_numOfRows >= 1) {?>
                        <div class="gallery-detail-list" style="display: flex;">
                            <div class="slider slider-single">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['call_news_album']->value, 'valuecall_news_album', false, 'keycall_news_album');
$_smarty_tpl->tpl_vars['valuecall_news_album']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['keycall_news_album']->value => $_smarty_tpl->tpl_vars['valuecall_news_album']->value) {
$_smarty_tpl->tpl_vars['valuecall_news_album']->do_else = false;
?>
                                    <div class="item">
                                        <a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['callCms']->value->fields['masterkey'];
$_prefixVariable1 = ob_get_clean();
echo fileinclude($_smarty_tpl->tpl_vars['valuecall_news_album']->value['filename'],'album',$_prefixVariable1,'link');?>
"
                                            class="link" data-fancybox="gallery-detail">
                                            <div class="image">
                                                <div class="cover">
                                                    <img class="lazy" style="width: 100px; hight: 100px; display: flex;"
                                                        src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['callCms']->value->fields['masterkey'];
$_prefixVariable2 = ob_get_clean();
echo fileinclude($_smarty_tpl->tpl_vars['valuecall_news_album']->value['filename'],'album',$_prefixVariable2,'link');?>
"
                                                        alt="img <?php echo $_smarty_tpl->tpl_vars['keycall_news_album']->value;?>
">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </div>
                        </div>
                    <?php }?>
                    <div class="desc mt-5">
                        <h1>1 : <?php echo $_smarty_tpl->tpl_vars['callCms']->value->fields['subject'];?>
</h1>
                        <p>1 :<?php echo $_smarty_tpl->tpl_vars['callCms']->value->fields['title'];?>
</p>

                    </div>
                    </br>

                    <?php if (($_smarty_tpl->tpl_vars['callCms']->value->fields['url'] != '' && $_smarty_tpl->tpl_vars['callCms']->value->fields['url'] != '#') || $_smarty_tpl->tpl_vars['callCms']->value->fields['filevdo'] != '') {?>
                        <hr>
                    <?php }?>
                </div>
            </div>

            <div class="default-bar">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="whead-addon">
                                <div class="detail-info">
                                    <ul class="item-list">
                                        <li><?php echo DateThai($_smarty_tpl->tpl_vars['callCms']->value->fields['credate'],23,"en","shot3");?>
 </li>
                                        <li class="ml-2">
                                            <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['callCms']->value->fields['view']);?>

                                            <span class="feather icon-eye ml-2"></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="social-block">
                                <div class="social-title">แบ่งปัน/ Shere :</div>

                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $_smarty_tpl->tpl_vars['fullurl']->value;?>
" target="_blank"
                                    title="Facebook this post">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/icon/icon-facebook-B.svg" alt="Facebook this post">
                                </a>

                                <a href="https://twitter.com/intent/tweet?url=<?php echo $_smarty_tpl->tpl_vars['fullurl']->value;?>
" title="Twitter this post \"
                                        target="_blank" style="margin-left: 20px;">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/icon/icon-twitter-B.svg" alt="Twitter this post">
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="news" style="background-color: #aef3ff;">
                    <div class="container">
                        
                        <?php if ($_smarty_tpl->tpl_vars['callCms']->value->_numOfRows >= 1) {?>
                                                        <h1>HTML 1 :<?php echo $_smarty_tpl->tpl_vars['callCms']->value->fields['subject'];?>
</h1>
                            <div class="detail">

                                        <?php ob_start();
echo $_smarty_tpl->tpl_vars['callCms']->value->fields['masterkey'];
$_prefixVariable3 = ob_get_clean();
echo callHtml(fileinclude($_smarty_tpl->tpl_vars['callCms']->value->fields['htmlfilename'],"html",$_prefixVariable3));?>

                            </div>
                                                    <?php }?>
                        <hr>
                        <div class="main-slider" data-aos="fade-up">
                                    
                                        <?php if ($_smarty_tpl->tpl_vars['callCms']->value->fields['type'] == 'url') {?>
                                    <?php $_smarty_tpl->_assignInScope('myUrlArray', smarty_modifier_explode("v=",$_smarty_tpl->tpl_vars['callCms']->value->fields['url']));?>
                                    <?php $_smarty_tpl->_assignInScope('myUrlCut', $_smarty_tpl->tpl_vars['myUrlArray']->value[1]);?>
                                    <?php $_smarty_tpl->_assignInScope('myUrlCutArray', smarty_modifier_explode("&",$_smarty_tpl->tpl_vars['myUrlCut']->value));?>
                                    <?php $_smarty_tpl->_assignInScope('myUrlCutAnd', $_smarty_tpl->tpl_vars['myUrlCutArray']->value[0]);?>
                                    <div class="detail-vdo">
                                        <div class="iframe-container" data-aos="fade-up">
                                            <iframe src="https://www.youtube.com/embed/<?php echo $_smarty_tpl->tpl_vars['myUrlCutAnd']->value;?>
" title="YouTube video player"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['callCms']->value->fields['type'] == 'file') {?>
                                    <div class="item video">
                                        <a>
                                            <div class="video-container">
                                                <video class="slide-video slide-media" width="100%" loop autoplay muted>
                                                    <source
                                                        src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['callCms']->value->fields['masterkey'];
$_prefixVariable4 = ob_get_clean();
echo fileinclude($_smarty_tpl->tpl_vars['callCms']->value->fields['filevdo'],'vdo',$_prefixVariable4,'vdo');?>
"
                                                        type="video/mp4">
                                                                                                        Your browser does not support the video tag.
                                                </video>
                                            </div>
                                    
                                    </a>
                                    </div>
                                
                                        <?php }?>
                                    
                                    </div>
                    </div>
                <hr>
                    <?php if ($_smarty_tpl->tpl_vars['Call_FileDownload']->value->_numOfRows >= 1) {?>
                    <div class="document-downloads">
                        <div class="text-center" data-aos="fade-down">
                            <div class="h-title text-primary typo-topic">
                                <?php echo $_smarty_tpl->tpl_vars['lang']->value["detail"]["download_doc"]["th"];?>

                                <span class="typo-xxl text-secondary">/ </span>
                                <span class="typo-xxl"> DOCUMENT DOWNLOAD</span>
                            </div>
                        </div>
                        <div class="container">
                            <div class="download-slider" data-aos="fade-up">
                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Call_FileDownload']->value, 'Value_Call_FileDownload', false, 'Key_Call_FileDownload');
$_smarty_tpl->tpl_vars['Value_Call_FileDownload']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['Key_Call_FileDownload']->value => $_smarty_tpl->tpl_vars['Value_Call_FileDownload']->value) {
$_smarty_tpl->tpl_vars['Value_Call_FileDownload']->do_else = false;
?>
                                    <?php ob_start();
echo $_smarty_tpl->tpl_vars['callCms']->value->fields['masterkey'];
$_prefixVariable5 = ob_get_clean();
$_smarty_tpl->_assignInScope('fileinfo', get_Icon(fileinclude($_smarty_tpl->tpl_vars['Value_Call_FileDownload']->value['filename'],'file',$_prefixVariable5)));?>
                                    
                                    <div class="item">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/download/<?php ob_start();
echo $_smarty_tpl->tpl_vars['callCms']->value->fields['masterkey'];
$_prefixVariable6 = ob_get_clean();
echo fileinclude($_smarty_tpl->tpl_vars['Value_Call_FileDownload']->value['filename'],'file',$_prefixVariable6,'download');?>
&n=<?php echo $_smarty_tpl->tpl_vars['Value_Call_FileDownload']->value['name'];?>
&t=<?php echo encodeStr('md_cmf');?>
"
                                            class="link report">
                                            <div class="wrapper">
                                                <div class="row align-items-center" style="margin-top: 20px;">
                                                    <div class="col-12">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <img src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/icon/icon-downloads.svg"
                                                                    alt="icon downloads">
                                                            </div>
                                                            <div class="col">
                                                                <div class="title">
                                                                    <?php echo $_smarty_tpl->tpl_vars['Value_Call_FileDownload']->value['name'];?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row align-items-center pt-3">
                                                            <div class="col">
                                                                <div class="typo-xs">ขนาด/ Size :
                                                                    <?php ob_start();
echo $_smarty_tpl->tpl_vars['callCms']->value->fields['masterkey'];
$_prefixVariable7 = ob_get_clean();
echo get_IconSize(fileinclude($_smarty_tpl->tpl_vars['Value_Call_FileDownload']->value['filename'],'file',$_prefixVariable7));?>

                                                                </div>
                                                                <div class="typo-xs">ประเภทไฟล์/ Type : <?php echo $_smarty_tpl->tpl_vars['fileinfo']->value['type'];?>
</div>
                                                                <div class="typo-xs">จำนวนดาวน์โหลด/ Download :
                                                                    <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['Value_Call_FileDownload']->value['download']);?>
</div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <span class="feather icon-download"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
                        <hr>
            <?php if ($_smarty_tpl->tpl_vars['nextCms']->value || $_smarty_tpl->tpl_vars['previousCms']->value) {?>
                <div class="action -back-2-previous">
                   <div class="row action-top">
                      <div class="col-auto">
                         <?php if ($_smarty_tpl->tpl_vars['nextCms']->value) {?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/new/detail/<?php echo $_smarty_tpl->tpl_vars['nextCms']->value['id'];?>
" class="btn btn-lg btn-light">
                               <span class="feather icon-chevron-left"></span>
                               ต่อไป
                            </a>
                         <?php }?>
                      </div>
                      <div class="col-auto">
                         <?php if ($_smarty_tpl->tpl_vars['previousCms']->value) {?>
                               <a href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/new/detail/<?php echo $_smarty_tpl->tpl_vars['previousCms']->value['id'];?>
" class="btn btn-lg btn-light">
                                  ย้อนกลับ
                                  <span class="feather icon-chevron-right"></span>
                               </a>
                         <?php }?>
                      </div>
                   </div>
                </div>
             <?php }?>
        <hr>
        

        <?php if ($_smarty_tpl->tpl_vars['callCmsRelate']->value->_numOfRows >= 1) {?>
        <div class="text-center" data-aos="fade-down">
            <div class="h-title text-primary typo-topic">
                <?php echo $_smarty_tpl->tpl_vars['lang']->value["detail"]["related_news"]["th"];?>

                <span class="typo-xxl text-secondary">/ </span>
                <span class="typo-xxl"><?php echo strtoupper($_smarty_tpl->tpl_vars['lang']->value["detail"]["related_news"]["en"]);?>
</span>
            </div>
        </div>
        <div class="slider" data-aos="fade-up">


            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['callCmsRelate']->value, 'ValuecallCmsRelate', false, 'KeycallCmsRelate');
$_smarty_tpl->tpl_vars['ValuecallCmsRelate']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['KeycallCmsRelate']->value => $_smarty_tpl->tpl_vars['ValuecallCmsRelate']->value) {
$_smarty_tpl->tpl_vars['ValuecallCmsRelate']->do_else = false;
?>
            <div class="item">

                <div class="card">
                    <figure class="cover">
                    <img src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['ValuecallCmsRelate']->value['masterkey'];
$_prefixVariable8 = ob_get_clean();
echo fileinclude($_smarty_tpl->tpl_vars['ValuecallCmsRelate']->value['pic'],"pictures",$_prefixVariable8,"link");?>
" alt="<?php echo $_smarty_tpl->tpl_vars['ValuecallCmsRelate']->value['pic'];?>
">
                    </figure>
                    <div class="detail">
                        <div class="title typo-xl text-primary text-limit mb-3">
                            ชื่อCMS : <?php echo $_smarty_tpl->tpl_vars['ValuecallCmsRelate']->value['subject'];?>

                        </div>
                        <p class="desc text-limit -x4">
                            Title : <?php echo $_smarty_tpl->tpl_vars['ValuecallCmsRelate']->value['title'];?>

                        </p>
                        <div class="row no-gutters align-items-center justify-content-between">
                            <div class="col-auto">
                                <div class="date">
                                    <?php echo DateThai($_smarty_tpl->tpl_vars['ValuecallCmsRelate']->value['credate'],'23','en','shot3');?>

                                </div>
                            </div>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/new/detail/<?php echo $_smarty_tpl->tpl_vars['ValuecallCmsRelate']->value['id'];?>
" class="link">
                                <div class="col-auto">
                                    <button type="button" class="btn fluid p-0">
                                        <div class="icon circle circle-border">
                                            <span class="feather icon-arrow-right">อ่านต่อ</span>
                                                </div>
                                            </button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        <?php }?>


    
    </div>

    
    </div>
</section><?php }
}
