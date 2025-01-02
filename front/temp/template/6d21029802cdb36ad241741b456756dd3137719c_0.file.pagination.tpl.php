<?php
/* Smarty version 4.3.2, created on 2025-01-02 15:46:24
  from '/var/www/html/weadmin_2024_v5/front/template/default/pagination.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_67765260abc248_58944088',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d21029802cdb36ad241741b456756dd3137719c' => 
    array (
      0 => '/var/www/html/weadmin_2024_v5/front/template/default/pagination.tpl',
      1 => 1735807570,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67765260abc248_58944088 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/weadmin_2024_v5/front/libs/smarty4320/plugins/modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
if ((($tmp = $_smarty_tpl->tpl_vars['pagination']->value ?? null)===null||$tmp==='' ? null ?? null : $tmp)) {?>
    <div class="pagination-block mt0 border-no" data-aos="fade-up">
        <div class="row">
            <div class="col-md-auto d-flex align-items-center">
                <div class="pagination-label">
                    <?php echo $_smarty_tpl->tpl_vars['lang']->value['pagination']['total'];?>
<span> <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['pagination']->value['total']);?>
 </span><?php echo $_smarty_tpl->tpl_vars['lang']->value["list:item"];?>

                </div>
            </div>
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
                <div class="col-md">
                    <div class="pagination">
                        <ul>
                        <?php if ($_smarty_tpl->tpl_vars['pageStartShow']->value > 1) {?>
                            <li class="pagination-prev">
                                <a class="link" href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['page'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parambefor'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parameter'];?>
1">
                                    <span class="feather icon-chevrons-left"></span>
                                </a>
                            </li>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['pagination']->value['curent']-1 > 0) {?>
                          <li class="pagination-nav"><a class="link" href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['page'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parambefor'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parameter'];
echo $_smarty_tpl->tpl_vars['pagination']->value['curent']-1;?>
"><span class="link"><img src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/icon/prev-sm.svg" alt="<?php echo $_smarty_tpl->tpl_vars['lang']->value['pagination']['prev'];?>
"></span></a></li>
                        <?php }?>
    
                        <?php
$_smarty_tpl->tpl_vars['current'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['current']->step = 1;$_smarty_tpl->tpl_vars['current']->total = (int) ceil(($_smarty_tpl->tpl_vars['current']->step > 0 ? $_smarty_tpl->tpl_vars['pageEndShow']->value+1 - ($_smarty_tpl->tpl_vars['pageStartShow']->value) : $_smarty_tpl->tpl_vars['pageStartShow']->value-($_smarty_tpl->tpl_vars['pageEndShow']->value)+1)/abs($_smarty_tpl->tpl_vars['current']->step));
if ($_smarty_tpl->tpl_vars['current']->total > 0) {
for ($_smarty_tpl->tpl_vars['current']->value = $_smarty_tpl->tpl_vars['pageStartShow']->value, $_smarty_tpl->tpl_vars['current']->iteration = 1;$_smarty_tpl->tpl_vars['current']->iteration <= $_smarty_tpl->tpl_vars['current']->total;$_smarty_tpl->tpl_vars['current']->value += $_smarty_tpl->tpl_vars['current']->step, $_smarty_tpl->tpl_vars['current']->iteration++) {
$_smarty_tpl->tpl_vars['current']->first = $_smarty_tpl->tpl_vars['current']->iteration === 1;$_smarty_tpl->tpl_vars['current']->last = $_smarty_tpl->tpl_vars['current']->iteration === $_smarty_tpl->tpl_vars['current']->total;?>
                          <li class="num-page <?php if ($_smarty_tpl->tpl_vars['current']->value == $_smarty_tpl->tpl_vars['pagination']->value['curent']) {?>active<?php }?>"><a class="link" href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['page'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parambefor'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parameter'];
echo $_smarty_tpl->tpl_vars['current']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['txtLang']->value['tools:page'];?>
 <?php echo $_smarty_tpl->tpl_vars['current']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['current']->value;?>
</a></li>
                        <?php }
}
?>
    
                                                                              
                        <?php if ($_smarty_tpl->tpl_vars['pagination']->value['curent']+1 < $_smarty_tpl->tpl_vars['pagination']->value['totalpage']) {?>
                          <li class="pagination-nav"><a class="link" href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['page'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parambefor'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parameter'];
echo $_smarty_tpl->tpl_vars['pagination']->value['curent']+1;?>
"><span class="link"><img src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/icon/next-sm.svg" alt="<?php echo $_smarty_tpl->tpl_vars['lang']->value['pagination']['next'];?>
"></span></a></li>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['pagination']->value['curent']+2 < $_smarty_tpl->tpl_vars['pagination']->value['totalpage']) {?>
                            <li class="pagination-nav">
                                <a class="link" href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['page'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parambefor'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parameter'];
echo $_smarty_tpl->tpl_vars['pagination']->value['totalpage'];?>
">
                                    <span class="feather icon-chevrons-right" style="color:#c00000"></span>
                                </a>
                            </li>
                        <?php }?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
    <?php }
}
