<?php
/* Smarty version 4.3.2, created on 2025-01-02 18:01:42
  from '/var/www/html/weadmin_2024_v5/front/controller/script/new/template/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6776721627ec96_51468481',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b18d44153f0c3b61ee535c86c6a394f08f81c43' => 
    array (
      0 => '/var/www/html/weadmin_2024_v5/front/controller/script/new/template/index.tpl',
      1 => 1735815699,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pagination.tpl' => 1,
  ),
),false)) {
function content_6776721627ec96_51468481 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/weadmin_2024_v5/front/libs/smarty4320/plugins/modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>
<h1>NEW</h1>

<div style="background-image: url('../weadmin_2024_v5/uplode/core/pic-bg-20241226173518642127-1.png');"></div>
<h1>NEW Page</h1>
<div class="content" data-aos="fade-up">
    <div class="title">ระบบสารสนเทศที่เกี่ยวข้อง</div>
    <div class="desc">Related Information System</div>
    <img src="../weadmin_2024_v5/upload/core/Artboard – 12.png" alt="Related Information System">
</div>
<a class="link" href="../weadmin_2024_v5/home">< Home ></a>
<h3>=========================================================================================</h3>
<div class="col-md col">
            <div class="form-group">
              <div class="row align-items-center">
                <div class="col-auto">
                  <span class="title typo-lg fw-bold">
                    ค้นหา
                    <div class="title typo-md">Search</div>
                  </span>
                </div>
                <div class="col">   
                  <div class="search" data-aos="fade-up">
                    <div class="input-group">
                      <div class="form-outline" style="width: 100%;">
                        <label class="visuallyhidden" for="search">Search</label>
                        <input name="keywords" type="text" id="search" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['keywords'];?>
" />
                      </div>
                      <button type="button" class="btn">
                        <span class="feather icon-search"></span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
                        <h3>=========================================================================================</h3>
    <div class="product-block">
        <div class="container">
            <div class="category" data-aos="fade-up">
                <div class="text"><?php echo $_smarty_tpl->tpl_vars['lang']->value['pagination']['total'];?>
 <span><?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['pagination']->value['total']);?>
</span> <?php echo $_smarty_tpl->tpl_vars['lang']->value["list:item"];?>
</div>
                <div class="default-block">
                    <form action="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['menuActive']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['callCmsTest']->value->fields['gid'];?>
" name="myForm" method="GET">
                    <label class="label" for="category"><?php echo $_smarty_tpl->tpl_vars['lang']->value["sorting:item"];?>
</label>
                    <select name="order" onchange="document.myForm.submit();" class="select-control style2" id="category" style="width: 100%;">
                        <option value="DESC" <?php if ($_smarty_tpl->tpl_vars['ordernews']->value == 'DESC') {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['lang']->value["post:last"];?>
</option>
                        <option value="ASC" <?php if ($_smarty_tpl->tpl_vars['ordernews']->value == 'ASC') {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['lang']->value["post:old"];?>
</option>
                    </select>
                    <form >
                </div>
            </div>
            <h2>=========================================================================================</h2>
            <div class="product-service">
                <div class="product-list" data-aos="fade-up">
                    <ul class="item-list">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['callCmsTest']->value, 'valuecallCmsTest', false, 'keycallCmsTest');
$_smarty_tpl->tpl_vars['valuecallCmsTest']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['keycallCmsTest']->value => $_smarty_tpl->tpl_vars['valuecallCmsTest']->value) {
$_smarty_tpl->tpl_vars['valuecallCmsTest']->do_else = false;
?>
                            <li class="item" data-aos="fade-up">
                                
                                    <div class="wrapper">
                                        <div class="image">
                                            <div class="cover"><img src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['valuecallCmsTest']->value['masterkey'];
$_prefixVariable1 = ob_get_clean();
echo fileinclude($_smarty_tpl->tpl_vars['valuecallCmsTest']->value['pic'],'pictures',$_prefixVariable1,'link');?>
" alt="our project 01"></div>
                                        </div>
                                        <div class="content">
                                            <div class="title under-line text-limit"><?php echo $_smarty_tpl->tpl_vars['valuecallCmsTest']->value['subject'];?>
</div>
                                            <div class="desc text-limit">
                                                <?php echo $_smarty_tpl->tpl_vars['valuecallCmsTest']->value['title'];?>

                                            </div>

                                            <div class="action">
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['menuActive']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['menuDetail']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['valuecallCmsTest']->value['id'];?>
" class="link">
                                                <div class="view-more"><?php echo $_smarty_tpl->tpl_vars['lang']->value['system']['viewsmore'];?>
 <span><img src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/icon/next.svg" alt="next"></span></div>
                                                </a>
                                                </div>
                                        </div>
                                    </div>
                                
                            </li>
                            <h1>=========================================================================================</h1>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>
                </div>
            </div>
            <div class="pagination-wrapper"> 
                <?php if ($_smarty_tpl->tpl_vars['callCmsTest']->value->_numOfRows > 0) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'title'), 0, false);
?>
                <?php }?>   
                            </div>
        </div>
    </div>
</div><?php }
}
