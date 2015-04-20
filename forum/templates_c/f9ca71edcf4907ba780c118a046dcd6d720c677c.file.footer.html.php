<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-10 10:54:37
         compiled from "/var/www/html/webapps/forum/view/footer.html" */ ?>
<?php /*%%SmartyHeaderCode:43573219454bd379c096499-86737038%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9ca71edcf4907ba780c118a046dcd6d720c677c' => 
    array (
      0 => '/var/www/html/webapps/forum/view/footer.html',
      1 => 1425984874,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '43573219454bd379c096499-86737038',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54bd379c0c8336_78161648',
  'variables' => 
  array (
    'flag' => 0,
    'item' => 0,
    'powered_by' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bd379c0c8336_78161648')) {function content_54bd379c0c8336_78161648($_smarty_tpl) {?>		</div>
		<div id="bottom">
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['flag']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
				<a href="?lang=<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
&callback_link=<?php echo $_SERVER['REQUEST_URI'];?>
"><img width="30" height="20" alt="<?php echo mb_strtoupper($_smarty_tpl->tpl_vars['item']->value, 'UTF-8');?>
" src="image/language/<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
.png"></a>
			<?php } ?><br/>
			<?php echo $_smarty_tpl->tpl_vars['powered_by']->value;?>
 <a href="http://phentom.net" target="_blank" style="text-decoration: none; color: #fff;"><b style="color: #357eca;">Phentom</b></a>
		</div>
	<body>
</html><?php }} ?>
