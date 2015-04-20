<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-22 11:01:15
         compiled from "/var/www/html/webapps/forum/view/register.html" */ ?>
<?php /*%%SmartyHeaderCode:18801304654c0c512dbab39-90400525%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7584ad495cd3ee15fbd90b99d43e08038684dce' => 
    array (
      0 => '/var/www/html/webapps/forum/view/register.html',
      1 => 1421923203,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18801304654c0c512dbab39-90400525',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54c0c512dc3007_22577014',
  'variables' => 
  array (
    'register' => 0,
    'error' => 0,
    '($_smarty_tpl->tpl_vars[\'error\']->value)' => 0,
    'email' => 0,
    'username' => 0,
    'password' => 0,
    'verify_password' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54c0c512dc3007_22577014')) {function content_54c0c512dc3007_22577014($_smarty_tpl) {?><div class="info">
	<h1><?php echo $_smarty_tpl->tpl_vars['register']->value;?>
</h1>
	<?php if (!empty($_smarty_tpl->tpl_vars['error']->value)) {?>
		<div class='fail'><?php echo $_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['error']->value)]->value;?>
</div>
	<?php }?>
	<form action="" method="post" autocomplete="off">
		<input type="email" name="email" placeholder="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" required="required" class="form_login"/><br />
		<input type="text" name="username" placeholder="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" required="required" class="form_login"/><br />
		<input type="password" name="password" placeholder="<?php echo $_smarty_tpl->tpl_vars['password']->value;?>
" required="required" class="form_login"/><br />
		<input type="password" name="password_verify" placeholder="<?php echo $_smarty_tpl->tpl_vars['verify_password']->value;?>
" required="required" class="form_login"/><br />
		<input type="hidden" name="register" value="register" />
		<input type="submit" value="<?php echo $_smarty_tpl->tpl_vars['register']->value;?>
" class="form_submit"/>
	</form>
</div><?php }} ?>
