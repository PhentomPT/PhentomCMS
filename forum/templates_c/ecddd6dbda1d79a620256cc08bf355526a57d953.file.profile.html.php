<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-16 15:09:41
         compiled from "/var/www/html/webapps/forum/view/profile.html" */ ?>
<?php /*%%SmartyHeaderCode:147081647354ff0007beb034-45122493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ecddd6dbda1d79a620256cc08bf355526a57d953' => 
    array (
      0 => '/var/www/html/webapps/forum/view/profile.html',
      1 => 1425999671,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '147081647354ff0007beb034-45122493',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54ff0007c444e3_60277173',
  'variables' => 
  array (
    'user_info' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54ff0007c444e3_60277173')) {function content_54ff0007c444e3_60277173($_smarty_tpl) {?><h1>Viewing profile - <?php echo ucfirst($_smarty_tpl->tpl_vars['user_info']->value[0]['username']);?>
</h1>
<div class="info">
	<div class="left">
			<img class='avatar' src='image/avatars/<?php echo $_smarty_tpl->tpl_vars['user_info']->value[0]['avatar'];?>
' alt='profile-photo' /><br />
			
			<?php if (!empty($_smarty_tpl->tpl_vars['user_info']->value[0]['special_rank'])) {?>
				<p><img src='image/ranks/<?php echo $_smarty_tpl->tpl_vars['user_info']->value[0]['special_rank'];?>
.png' alt='special-rank' /></p>
			<?php }?>
			
			<?php if ($_smarty_tpl->tpl_vars['user_info']->value[0]['rank']>=0&&$_smarty_tpl->tpl_vars['user_info']->value[0]['rank']<10) {?>
				<img src='image/ranks/newbie.png' alt='rank' />
			<?php } elseif ($_smarty_tpl->tpl_vars['user_info']->value[0]['rank']>=10&&$_smarty_tpl->tpl_vars['user_info']->value[0]['rank']<30) {?>
				<img src='image/ranks/senior.png' alt='rank' />
			<?php } elseif ($_smarty_tpl->tpl_vars['user_info']->value[0]['rank']>=30&&$_smarty_tpl->tpl_vars['user_info']->value[0]['rank']<60) {?>
				<img src='image/ranks/veteran.png' alt='rank' />
			<?php } elseif ($_smarty_tpl->tpl_vars['user_info']->value[0]['rank']>=60&&$_smarty_tpl->tpl_vars['user_info']->value[0]['rank']<100) {?>
				<img src='image/ranks/super_user.png' alt='rank' />
			<?php } elseif ($_smarty_tpl->tpl_vars['user_info']->value[0]['rank']>=100&&$_smarty_tpl->tpl_vars['user_info']->value[0]['rank']<150) {?>
				<img src='image/ranks/heroic_user.png' alt='rank' />
			<?php } elseif ($_smarty_tpl->tpl_vars['user_info']->value[0]['rank']>=200) {?>
				<img src='image/ranks/mythical.png' alt='rank' />
			<?php }?>
	</div>
	<div class="left">
		Username: <a class="user"><?php echo ucfirst($_smarty_tpl->tpl_vars['user_info']->value[0]['username']);?>
</a><br />
		<h3>User Info</h3>
	<p>Joined: <?php echo $_smarty_tpl->tpl_vars['user_info']->value[0]['join_date'];?>
 Ago</p>
	<p>Last visited: 07 Nov 2014 19:43</p>
	<p>Total posts: <?php echo $_smarty_tpl->tpl_vars['user_info']->value[0]['total_posts'];?>
</p>
	</div>
	<div class="clear"> </div>
</div>
<div class="info">
	<div class="left">
		<h3>Contact Info</h3>
	</div>
	<div class="left">
		<h3>User Statistics</h3>
		Joined: 16 Feb 2014 17:21<br />
		Last visited: 07 Nov 2014 19:43<br />
		Total posts: 30 | Search user’s posts (100.00% of all posts / 0.11 posts per day)<br />
		Most active forum: First forum (27 Posts / 90.00% of user’s posts)<br />
		Most active topic: Announce [Few Pages]	(22 Posts / 73.33% of user’s posts)<br />
	</div>
	<div class="clear"> </div>
</div><?php }} ?>
