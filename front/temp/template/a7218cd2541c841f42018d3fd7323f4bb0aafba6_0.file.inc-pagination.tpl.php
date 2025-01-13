<?php
/* Smarty version 4.3.2, created on 2025-01-03 10:17:57
  from '/var/www/html/weadmin_2024_v5/front/template/default/inc/inc-pagination.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_677756e5a19832_30919952',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7218cd2541c841f42018d3fd7323f4bb0aafba6' => 
    array (
      0 => '/var/www/html/weadmin_2024_v5/front/template/default/inc/inc-pagination.tpl',
      1 => 1730803429,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_677756e5a19832_30919952 (Smarty_Internal_Template $_smarty_tpl) {
if ((($tmp = $_smarty_tpl->tpl_vars['pagination']->value ?? null)===null||$tmp==='' ? null ?? null : $tmp)) {?>
    <div class="pagination-block">
        <div class="pagination">
            <ul class="item-list">
                <?php $_smarty_tpl->_assignInScope('pageStartShow', $_smarty_tpl->tpl_vars['pagination']->value['curent']-2);?>
                <?php $_smarty_tpl->_assignInScope('pageEndShow', $_smarty_tpl->tpl_vars['pagination']->value['curent']+2);?>
                <?php if ($_smarty_tpl->tpl_vars['pageStartShow']->value < 1) {?>
                    <?php $_smarty_tpl->_assignInScope('pageStartShow', 1);?>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['pageStartShow']->value-2 < 0) {?>
                    <?php ob_start();
echo $_smarty_tpl->tpl_vars['pageStartShow']->value-$_smarty_tpl->tpl_vars['pagination']->value['curent'];
$_prefixVariable2 = ob_get_clean();
ob_start();
echo 2+$_prefixVariable2;
$_prefixVariable3 = ob_get_clean();
$_smarty_tpl->_assignInScope('pageEndShow', $_smarty_tpl->tpl_vars['pageEndShow']->value+$_prefixVariable3);?>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['pageEndShow']->value >= $_smarty_tpl->tpl_vars['pagination']->value['totalpage']) {?>
                    <?php $_smarty_tpl->_assignInScope('pageEndShow', $_smarty_tpl->tpl_vars['pagination']->value['totalpage']);?>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['pagination']->value['total']-$_smarty_tpl->tpl_vars['pagination']->value['curent'] < 2) {?>
                    <?php ob_start();
echo $_smarty_tpl->tpl_vars['pagination']->value['totalpage']-$_smarty_tpl->tpl_vars['pagination']->value['curent'];
$_prefixVariable4 = ob_get_clean();
$_smarty_tpl->_assignInScope('startAdd', 2-$_prefixVariable4);?>
                    <?php $_smarty_tpl->_assignInScope('pageStartShow', $_smarty_tpl->tpl_vars['pageStartShow']->value-$_smarty_tpl->tpl_vars['startAdd']->value);?>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['pageStartShow']->value < 1) {?>
                    <?php $_smarty_tpl->_assignInScope('pageStartShow', 1);?>
                <?php }?>

                
                <?php if ($_smarty_tpl->tpl_vars['pageStartShow']->value > 1) {?>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['page'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parambefor'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parameter'];
echo $_smarty_tpl->tpl_vars['pagination']->value['curent']-1;?>
"
                            class="link"><span class="feather icon-chevron-left"></a>
                    </li>
                <?php }?>

                <?php
$_smarty_tpl->tpl_vars['current'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['current']->step = 1;$_smarty_tpl->tpl_vars['current']->total = (int) ceil(($_smarty_tpl->tpl_vars['current']->step > 0 ? $_smarty_tpl->tpl_vars['pageEndShow']->value+1 - ($_smarty_tpl->tpl_vars['pageStartShow']->value) : $_smarty_tpl->tpl_vars['pageStartShow']->value-($_smarty_tpl->tpl_vars['pageEndShow']->value)+1)/abs($_smarty_tpl->tpl_vars['current']->step));
if ($_smarty_tpl->tpl_vars['current']->total > 0) {
for ($_smarty_tpl->tpl_vars['current']->value = $_smarty_tpl->tpl_vars['pageStartShow']->value, $_smarty_tpl->tpl_vars['current']->iteration = 1;$_smarty_tpl->tpl_vars['current']->iteration <= $_smarty_tpl->tpl_vars['current']->total;$_smarty_tpl->tpl_vars['current']->value += $_smarty_tpl->tpl_vars['current']->step, $_smarty_tpl->tpl_vars['current']->iteration++) {
$_smarty_tpl->tpl_vars['current']->first = $_smarty_tpl->tpl_vars['current']->iteration === 1;$_smarty_tpl->tpl_vars['current']->last = $_smarty_tpl->tpl_vars['current']->iteration === $_smarty_tpl->tpl_vars['current']->total;?>
                    <li class="<?php if ($_smarty_tpl->tpl_vars['current']->value == $_smarty_tpl->tpl_vars['pagination']->value['curent']) {?>active<?php }?>">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['page'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parambefor'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parameter'];
echo $_smarty_tpl->tpl_vars['current']->value;?>
"
                            class="link"><?php echo $_smarty_tpl->tpl_vars['current']->value;?>
</a>
                    </li>
                <?php }
}
?>

                <?php if ($_smarty_tpl->tpl_vars['pagination']->value['curent']+1 < $_smarty_tpl->tpl_vars['pagination']->value['totalpage']) {?>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['page'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parambefor'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parameter'];
echo $_smarty_tpl->tpl_vars['pagination']->value['curent']+1;?>
"
                            class="link"><span class="feather icon-chevron-right"></span></a>
                    </li>
                <?php }?>

                            </ul>
        </div>
    </div>
<?php }
}
}
