<?php
/* Smarty version 4.3.2, created on 2025-01-08 11:16:11
  from '/var/www/html/weadmin_2024_v5/front/controller/script/new/template/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_677dfc0b005b36_82684220',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b18d44153f0c3b61ee535c86c6a394f08f81c43' => 
    array (
      0 => '/var/www/html/weadmin_2024_v5/front/controller/script/new/template/index.tpl',
      1 => 1736309769,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pagination.tpl' => 1,
  ),
),false)) {
function content_677dfc0b005b36_82684220 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="site-container">
    <h1>NEW</h1>

    <div style="background-image: url('../weadmin_2024_v5/uplode/core/pic-bg-20241226173518642127-1.png');"></div>
    <h1>NEW Page</h1>
    <div class="content" data-aos="fade-up">
        <div class="title">ระบบสารสนเทศที่เกี่ยวข้อง</div>
        <div class="desc">Related Information System</div>
        <img src="../weadmin_2024_v5/upload/core/Artboard – 12.png" alt="Related Information System">
    </div>
    <a class="link" href="../weadmin_2024_v5/home">
        < Home>
    </a>
    <h3>=========================================================================================</h3>
    <div class="new" style="background-color: #fff;">
        <div class="container-fluid-custom">
            <div class="row justify-content-sm-end">
                <div class="col-sm-auto">
                    <div class="filter">
                                                <form name="form-filter" id="form-filter" method="post" action="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['menuActive']->value;?>
">
                            <div class="row no-gutters">

                                <div class="col-sm-auto">
                                    <div class="form-group">
                                        <label class="visuallyhidden" for="showFilter">เลือก</label>
                                        <div class="select-wrapper">
                                            <select class="select-control" style="width: 100%;" name="ordernews"
                                                id="ordernews" onchange="submit();">
                                                <option value="DESC" <?php if ($_smarty_tpl->tpl_vars['ordernews']->value == 'DESC') {?> selected <?php }?>>ล่าสุด
                                                </option>
                                                <option value="ASC" <?php if ($_smarty_tpl->tpl_vars['ordernews']->value == 'ASC') {?> selected <?php }?>>เก่าสุด
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <h3>=========================================================================================
                                </h3>
                                <div class="col-sm-auto">
                                    <div class="block-control">
                                        <div class="form-group">
                                            <label class="visuallyhidden" for="showFilter">ค้นหา CMS</label>
                                            <input name="limit" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['limit']->value;?>
">
                                            <input name="keywords" type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
"
                                                placeholder="ค้นหา">
                                            <button type="submit" class="btn">
                                                <span class="feather icon-search">ค้นหา</span>
                                            </button>
                                        </div>
                                                                            </div>
                                </div>
                            </div>
                        </form>
                                            </div>
                </div>
            </div>

            <h2>=========================================================================================</h2>
            <div class="row" data-aos="fade-up">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['callCmsTest']->value, 'valueCmsTest', false, 'keyCmsTest');
$_smarty_tpl->tpl_vars['valueCmsTest']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['keyCmsTest']->value => $_smarty_tpl->tpl_vars['valueCmsTest']->value) {
$_smarty_tpl->tpl_vars['valueCmsTest']->do_else = false;
?>
                    <div class="col-lg-3 col-md-4 col-sm-6 ">

                        <div class="card">
                            <figure class="cover">
                            <img src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['valueCmsTest']->value['masterkey'];
$_prefixVariable1 = ob_get_clean();
echo fileinclude($_smarty_tpl->tpl_vars['valueCmsTest']->value['pic'],"pictures",$_prefixVariable1,"link");?>
" alt="<?php echo $_smarty_tpl->tpl_vars['valueCmsTest']->value['pic'];?>
">
                                    
                            </figure>
                            <div class="detail">
                                <div class="title -x2 typo-lg text-primary text-limit mb-3">
                                    <?php echo $_smarty_tpl->tpl_vars['valueCmsTest']->value["subject"];?>

                                </div>
                                <p class="desc text-limit -x3">
                                    <?php echo $_smarty_tpl->tpl_vars['valueCmsTest']->value["title"];?>

                                </p>
                                <div class="row no-gutters align-items-center justify-content-between">
                                    <div class="col-auto">
                                        <div class="date text-black">
                                            <?php echo DateThai($_smarty_tpl->tpl_vars['valueCmsTest']->value["credate"],'23','en','shot3');?>

                                        </div>
                                    </div>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/new/detail/<?php echo $_smarty_tpl->tpl_vars['valueCmsTest']->value["id"];?>
" class="link new-card">
                                        <div class="col-auto">
                                            <button type="button" class="btn fluid p-0">
                                                <div class="icon circle circle-border">
                                                    <span class="feather icon-arrow-right top-0">อ่านต่อ</span>
                                                </div>
                                            </button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <h2>=========================================================================================</h2>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
    </div>
</section><?php }
}
