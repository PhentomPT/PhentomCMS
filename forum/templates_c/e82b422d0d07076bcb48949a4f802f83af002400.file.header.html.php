<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-16 17:06:52
         compiled from "/var/www/html/webapps/forum/view/header.html" */ ?>
<?php /*%%SmartyHeaderCode:57275754954bd3671c0cfd8-74418033%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e82b422d0d07076bcb48949a4f802f83af002400' => 
    array (
      0 => '/var/www/html/webapps/forum/view/header.html',
      1 => 1426524652,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '57275754954bd3671c0cfd8-74418033',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54bd3671c3af68_98385479',
  'variables' => 
  array (
    'server_info' => 0,
    'menu_top' => 0,
    'key' => 0,
    'search' => 0,
    'menu_bar' => 0,
    'home' => 0,
    'rules' => 0,
    'members' => 0,
    'faq' => 0,
    'account' => 0,
    'notifications' => 0,
    'logout' => 0,
    'login' => 0,
    'register' => 0,
    'v_unanswered_posts' => 0,
    'v_active_topics' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bd3671c3af68_98385479')) {function content_54bd3671c3af68_98385479($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Forum - <?php echo $_smarty_tpl->tpl_vars['server_info']->value[0]['title'];?>
</title>
		<link rel="stylesheet" href="../core/ui/css/uikit.almost-flat.min.css" />
		<link rel="stylesheet" href="style/main.css" />
        <?php echo '<script'; ?>
 src="../core/ui/js/jquery.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="../core/ui/js/uikit.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="script/main.js"><?php echo '</script'; ?>
>
	</head>
	<body>
		<div id="top">
			<div id="title">	
					<a class="ftitle">Forum</a><br />
			</div>
			<div id="menu">
				<div class="uk-hidden-small">
					<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menu_top']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
						<a href="<?php echo $_smarty_tpl->tpl_vars['menu_top']->value[$_smarty_tpl->tpl_vars['key']->value]['link'];?>
"><button><i class="uk-icon-<?php echo $_smarty_tpl->tpl_vars['menu_top']->value[$_smarty_tpl->tpl_vars['key']->value]['icon'];?>
"></i> <?php echo $_smarty_tpl->tpl_vars['menu_top']->value[$_smarty_tpl->tpl_vars['key']->value]['name'];?>
</button></a>
					<?php } ?>
				</div>
			</div>
			<div class="clear"> </div>
			<div id="status">
				<form>
					<input class="search" type="text" placeholder="<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
" required="required" autocomplete="off"/>
					<input class="search_submit" type="submit" value="" />
				</form>
				<div class="uk-hidden-small">
					<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menu_bar']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
						<a href='<?php if ($_smarty_tpl->tpl_vars['menu_bar']->value[$_smarty_tpl->tpl_vars['key']->value]['link']=="?page=notifications") {
} else {
echo $_smarty_tpl->tpl_vars['menu_bar']->value[$_smarty_tpl->tpl_vars['key']->value]['link'];
}?>'><button class='acc_option'><i class="uk-icon-<?php echo $_smarty_tpl->tpl_vars['menu_bar']->value[$_smarty_tpl->tpl_vars['key']->value]['icon'];?>
"></i><?php if ($_smarty_tpl->tpl_vars['menu_bar']->value[$_smarty_tpl->tpl_vars['key']->value]['link']=="?page=notifications") {?><div class='notification'>9</div><?php }?> <?php echo $_smarty_tpl->tpl_vars['menu_bar']->value[$_smarty_tpl->tpl_vars['key']->value]['name'];?>
</button></a>
					<?php } ?>
				</div>
				<a href="#off-menu" class="uk-navbar-toggle uk-visible-small uk-align-right" data-uk-offcanvas></a>
				<div class="clear"> </div>
			</div>
			<div id="off-menu" class="uk-offcanvas">
				<div class="uk-offcanvas-bar">
					<ul class="uk-nav uk-nav-offcanvas">
						<li class="uk-nav-header">Menu</li>
						<li><a href="index.php"><i class="uk-icon-home"></i> <?php echo $_smarty_tpl->tpl_vars['home']->value;?>
</a></li>
						<li><a href="?page=rules"><i class="uk-icon-list-ul"></i> <?php echo $_smarty_tpl->tpl_vars['rules']->value;?>
</a></li>
						<li><a href="?page=members"><i class="uk-icon-group"></i> <?php echo $_smarty_tpl->tpl_vars['members']->value;?>
</a></li>
						<li><a href="?page=faq"><i class="uk-icon-book"></i> <?php echo $_smarty_tpl->tpl_vars['faq']->value;?>
</a></li>
						<li class="uk-nav-divider">C
						<?php if (!empty($_SESSION['username'])) {?>
							<li><a href='?page=account_panel'><i class="uk-icon-user"></i> <?php echo $_smarty_tpl->tpl_vars['account']->value;?>
</a></li>
							<!-- <li class="uk-parent">
                          		<a href="#">Parent</a>
                            	<div><ul class="uk-nav-sub uk-dropdown">
                                    <li><a href="">Sub item</a></li>
                           			<li><a href="">Sub item</a></li>
                            	</ul></div>
                            </li> -->
							<li><a href='?page=notifications'><i class="uk-icon-certificate"></i> <?php echo $_smarty_tpl->tpl_vars['notifications']->value;?>
</a></li>
							<li><a href='?page=logout'><i class="uk-icon-sign-out"></i> <?php echo $_smarty_tpl->tpl_vars['logout']->value;?>
</a></li>
						<?php } else { ?>
							<li><a href='?page=login'><i class="uk-icon-sign-in"></i> <?php echo $_smarty_tpl->tpl_vars['login']->value;?>
</a></li>
							<li><a href='?page=register'><i class="uk-icon-pencil"></i> <?php echo $_smarty_tpl->tpl_vars['register']->value;?>
</a></li>
						<?php }?>
					</ul>
				</div>
			</div>
		</div>
		<div id="middle">
			<div id="navigation">
				<a href=""><button><?php echo $_smarty_tpl->tpl_vars['v_unanswered_posts']->value;?>
</button></a>
				<a href=""><button><?php echo $_smarty_tpl->tpl_vars['v_active_topics']->value;?>
</button></a>
			</div><?php }} ?>
