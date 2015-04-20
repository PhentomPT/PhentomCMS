<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-22 10:50:04
         compiled from "/var/www/html/webapps/forum/view/login.html" */ ?>
<?php /*%%SmartyHeaderCode:153570507354bfb4e35b3508-16164701%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '412a6697e2ea648fd36d3843b5fe1bc6342e7f3a' => 
    array (
      0 => '/var/www/html/webapps/forum/view/login.html',
      1 => 1421923165,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153570507354bfb4e35b3508-16164701',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54bfb4e36c5e96_99913371',
  'variables' => 
  array (
    'login' => 0,
    'error' => 0,
    '($_smarty_tpl->tpl_vars[\'error\']->value)' => 0,
    'email' => 0,
    'password' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bfb4e36c5e96_99913371')) {function content_54bfb4e36c5e96_99913371($_smarty_tpl) {?><div class="info">
	<h1><?php echo $_smarty_tpl->tpl_vars['login']->value;?>
</h1>
	<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
<?php $_tmp1=ob_get_clean();?><?php if (!empty($_tmp1)) {?>
		<div class='fail'><?php echo $_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['error']->value)]->value;?>
</div>
	<?php }?>
	<form action="" method="post" autocomplete="off">
		<input type="text" name="email" placeholder="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" required="required" class="form_login"/><br />
		<input type="password" name="password" placeholder="<?php echo $_smarty_tpl->tpl_vars['password']->value;?>
" required="required" class="form_login"/><br />
		<input type="hidden" name="login" value="login" />
		<input type="submit" value="<?php echo $_smarty_tpl->tpl_vars['login']->value;?>
" class="form_submit"/>
	</form>
</div><?php }} ?>
