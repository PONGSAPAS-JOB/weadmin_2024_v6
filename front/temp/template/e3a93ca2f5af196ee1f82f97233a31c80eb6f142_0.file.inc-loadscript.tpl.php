<?php
/* Smarty version 4.3.2, created on 2024-11-06 08:59:50
  from '/var/www/html/weadmin_2024_v5/front/template/default/inc/inc-loadscript.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_672acd965e9ab4_91663013',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e3a93ca2f5af196ee1f82f97233a31c80eb6f142' => 
    array (
      0 => '/var/www/html/weadmin_2024_v5/front/template/default/inc/inc-loadscript.tpl',
      1 => 1730803429,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_672acd965e9ab4_91663013 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;<?php echo '</script'; ?>
>

<?php ob_start();
echo (($tmp = $_smarty_tpl->tpl_vars['assignjs']->value ?? null)===null||$tmp==='' ? null ?? null : $tmp);
$_prefixVariable3 = ob_get_clean();
if ($_prefixVariable3) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['assignjs']->value, 'addAssetScript');
$_smarty_tpl->tpl_vars['addAssetScript']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['addAssetScript']->value) {
$_smarty_tpl->tpl_vars['addAssetScript']->do_else = false;
echo $_smarty_tpl->tpl_vars['addAssetScript']->value;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
}
