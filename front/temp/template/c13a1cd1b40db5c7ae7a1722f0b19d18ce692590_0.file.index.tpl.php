<?php
/* Smarty version 4.3.2, created on 2024-12-26 17:43:32
  from '/var/www/html/weadmin_2024_v5/front/controller/script/home/template/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_676d3354b5bfa9_47586714',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c13a1cd1b40db5c7ae7a1722f0b19d18ce692590' => 
    array (
      0 => '/var/www/html/weadmin_2024_v5/front/controller/script/home/template/index.tpl',
      1 => 1735209811,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_676d3354b5bfa9_47586714 (Smarty_Internal_Template $_smarty_tpl) {
?><h1>HOME</h1>

<div style="background-image: url('../weadmin_2024_v5/uplode/core/pic-bg-20241226173518642127-1.png');"></div>
<h1>HOME Page</h1>
<div class="content" data-aos="fade-up">
    <div class="title">ระบบสารสนเทศที่เกี่ยวข้อง</div>
    <div class="desc">Related Information System</div>
    <img src="../weadmin_2024_v5/upload/core/pic-bg-20241226173518642127-1.png" alt="Related Information System">
</div>

<h1>======================================================================================================</h1>
<ul>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['callTopGraphic']->value, 'valuecallTopGraphic', false, 'keycallTopGraphic');
$_smarty_tpl->tpl_vars['valuecallTopGraphic']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['keycallTopGraphic']->value => $_smarty_tpl->tpl_vars['valuecallTopGraphic']->value) {
$_smarty_tpl->tpl_vars['valuecallTopGraphic']->do_else = false;
?>
        <li><?php echo $_smarty_tpl->tpl_vars['valuecallTopGraphic']->value['subject'];?>
</li>
        <a href="<?php echo $_smarty_tpl->tpl_vars['valuecallTopGraphic']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['valuecallTopGraphic']->value['url'];?>
</a>
        <li><img src="../weadmin_2024_v5/upload/tg/office/<?php echo $_smarty_tpl->tpl_vars['valuecallTopGraphic']->value['pic'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['valuecallTopGraphic']->value['pic'];?>
"></li>
        <h2>======================================================================================================</h2>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>
<h1>======================================================================================================</h1>
<ul>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['callCmsTest']->value, 'valuecallCmsTest', false, 'keycallCmsTest');
$_smarty_tpl->tpl_vars['valuecallCmsTest']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['keycallCmsTest']->value => $_smarty_tpl->tpl_vars['valuecallCmsTest']->value) {
$_smarty_tpl->tpl_vars['valuecallCmsTest']->do_else = false;
?>
        <li><?php echo $_smarty_tpl->tpl_vars['valuecallCmsTest']->value['subject'];?>
</li>
        <li><?php echo $_smarty_tpl->tpl_vars['valuecallCmsTest']->value['subject2'];?>
</li>
        <li><img src="../weadmin_2024_v5/upload/cms/pictures/<?php echo $_smarty_tpl->tpl_vars['valuecallCmsTest']->value['pic'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['valuecallCmsTest']->value['pic'];?>
"></li>
        <h2>======================================================================================================</h2>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>
<?php }
}
