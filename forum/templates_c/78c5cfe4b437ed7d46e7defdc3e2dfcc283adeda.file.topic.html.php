<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-16 16:13:48
         compiled from "/var/www/html/webapps/forum/view/topic.html" */ ?>
<?php /*%%SmartyHeaderCode:104588107654fee8fbeca512-54210228%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '78c5cfe4b437ed7d46e7defdc3e2dfcc283adeda' => 
    array (
      0 => '/var/www/html/webapps/forum/view/topic.html',
      1 => 1425998854,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104588107654fee8fbeca512-54210228',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54fee8fbef1036_63560107',
  'variables' => 
  array (
    'locked' => 0,
    'replys_num' => 0,
    'get_topic' => 0,
    'key' => 0,
    'topic_user' => 0,
    'replys' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54fee8fbef1036_63560107')) {function content_54fee8fbef1036_63560107($_smarty_tpl) {?><div id="navigation">
	<a href="index.php"><button>Board index</button></a> >
	<a href="?page=forum&id=<?php echo $_GET['fid'];?>
"><button>First Forum</button></a> >
	<a href=""><button>First Topic</button></a>
</div>
<?php if ($_smarty_tpl->tpl_vars['locked']->value=="locked") {?>
	<button class="lock">Topic Locked</button>
<?php } else { ?>
	<a><button class="button reply"><i class="uk-icon-mail-reply"></i> Post a reply</button></a>
<?php }?>

<a class="num_page base-color">Page 1 of 1</a><a class="num_topics base-color"><?php echo $_smarty_tpl->tpl_vars['replys_num']->value;?>
 replys</a>
<div class="clear"> </div>

<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['get_topic']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
<h1 style="text-align: center;"><?php echo ucfirst($_smarty_tpl->tpl_vars['get_topic']->value[$_smarty_tpl->tpl_vars['key']->value]['title']);?>
</h1>
<div class="topic">
	<div class="user_topic">
		<a href="?page=profile&user=<?php echo $_smarty_tpl->tpl_vars['get_topic']->value[$_smarty_tpl->tpl_vars['key']->value]['username'];?>
" class="user" style="font-size: 20px;"><?php echo ucfirst($_smarty_tpl->tpl_vars['get_topic']->value[$_smarty_tpl->tpl_vars['key']->value]['username']);?>
</a><br />
		<img class="avatar" src="image/avatars/<?php echo $_smarty_tpl->tpl_vars['get_topic']->value[$_smarty_tpl->tpl_vars['key']->value]['avatar'];?>
" style="padding-left: 0;" alt="profile-photo" /><br />
		<?php if (!empty($_smarty_tpl->tpl_vars['topic_user']->value[$_smarty_tpl->tpl_vars['key']->value]['special_rank'])) {?>
			<p><img src="image/ranks/<?php echo $_smarty_tpl->tpl_vars['get_topic']->value[$_smarty_tpl->tpl_vars['key']->value]['special_rank'];?>
.png" alt="special-rank" /></p>
		<?php }?>
		
		<?php if ($_smarty_tpl->tpl_vars['get_topic']->value[$_smarty_tpl->tpl_vars['key']->value]['rank']>=0&&$_smarty_tpl->tpl_vars['get_topic']->value[$_smarty_tpl->tpl_vars['key']->value]['rank']<10) {?>
			<img src="image/ranks/newbie.png" alt="rank" /><br/>
		<?php } elseif ($_smarty_tpl->tpl_vars['get_topic']->value[$_smarty_tpl->tpl_vars['key']->value]['rank']>=10&&$_smarty_tpl->tpl_vars['get_topic']->value[$_smarty_tpl->tpl_vars['key']->value]['rank']<30) {?>
			<img src="image/ranks/senior.png" alt="rank" /><br/>
		<?php } elseif ($_smarty_tpl->tpl_vars['get_topic']->value[$_smarty_tpl->tpl_vars['key']->value]['rank']>=30&&$_smarty_tpl->tpl_vars['get_topic']->value[$_smarty_tpl->tpl_vars['key']->value]['rank']<60) {?>
			<img src="image/ranks/veteran.png" alt="rank" /><br/>
		<?php } elseif ($_smarty_tpl->tpl_vars['get_topic']->value[$_smarty_tpl->tpl_vars['key']->value]['rank']>=60&&$_smarty_tpl->tpl_vars['get_topic']->value[$_smarty_tpl->tpl_vars['key']->value]['rank']<100) {?>
			<img src="image/ranks/super_user.png" alt="rank" /><br/>
		<?php } elseif ($_smarty_tpl->tpl_vars['get_topic']->value[$_smarty_tpl->tpl_vars['key']->value]['rank']>=100&&$_smarty_tpl->tpl_vars['get_topic']->value[$_smarty_tpl->tpl_vars['key']->value]['rank']<150) {?>
			<img src="image/ranks/heroic_user.png" alt="rank" /><br/>
		<?php } elseif ($_smarty_tpl->tpl_vars['get_topic']->value[$_smarty_tpl->tpl_vars['key']->value]['rank']>=200) {?>
			<img src="image/ranks/mythical.png" alt="rank" /><br/>
		<?php }?>
		<b>Posts</b>: 30
		<p><b>Joined</b>: <?php echo $_smarty_tpl->tpl_vars['get_topic']->value[$_smarty_tpl->tpl_vars['key']->value]['join_date'];?>
 Ago</p>
		<?php if (!empty($_SESSION['username'])&&$_SESSION['username']!=$_smarty_tpl->tpl_vars['get_topic']->value[$_smarty_tpl->tpl_vars['key']->value]['posted_by']) {?>
				<a href="?topic=<?php echo $_GET['id'];?>
&fid=<?php echo $_GET['fid'];?>
&rep=<?php echo $_smarty_tpl->tpl_vars['get_topic']->value[$_smarty_tpl->tpl_vars['key']->value]['posted_by'];?>
&by=<?php echo $_SESSION['username'];?>
"><img src="image/rep.ico" style="height: 30px;" alt="add_rep"/></a>
				<img src="image/report.ico" style="height: 30px;" alt="report"/>
		<?php }?>
	</div>
	<div class="info_align_left">
		<h3><?php echo ucfirst($_smarty_tpl->tpl_vars['get_topic']->value[$_smarty_tpl->tpl_vars['key']->value]['title']);?>
</h3>
		<p><?php echo $_smarty_tpl->tpl_vars['get_topic']->value[$_smarty_tpl->tpl_vars['key']->value]['posted_time'];?>
 Ago.</p>
		<?php echo $_smarty_tpl->tpl_vars['get_topic']->value[$_smarty_tpl->tpl_vars['key']->value]['content'];?>

	</div>
	<div class="clear"> </div>
</div>
<?php } ?>

<?php if ($_smarty_tpl->tpl_vars['replys_num']->value>0) {?>
	<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['replys']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
	<div class="topic">
		<div class="user_topic">
			<a href="?page=profile&user=<?php echo $_smarty_tpl->tpl_vars['replys']->value[$_smarty_tpl->tpl_vars['key']->value]['username'];?>
" class="user" style="font-size: 20px;"><?php echo ucfirst($_smarty_tpl->tpl_vars['replys']->value[$_smarty_tpl->tpl_vars['key']->value]['username']);?>
</a><br />
			<img class="avatar" src="image/avatars/<?php echo $_smarty_tpl->tpl_vars['replys']->value[$_smarty_tpl->tpl_vars['key']->value]['avatar'];?>
" style="padding-left: 0;" alt="profile-photo" /><br />
			<?php if (!empty($_smarty_tpl->tpl_vars['replys']->value[$_smarty_tpl->tpl_vars['key']->value]['special_rank'])) {?>
				<img src="image/ranks/$replys.$key.special_rank}.png" alt="special-rank" /><br />
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['replys']->value[$_smarty_tpl->tpl_vars['key']->value]['rank']>=0&&$_smarty_tpl->tpl_vars['replys']->value[$_smarty_tpl->tpl_vars['key']->value]['rank']<10) {?>
				<img src="image/ranks/newbie.png" alt="rank" /><br/>
			<?php } elseif ($_smarty_tpl->tpl_vars['replys']->value[$_smarty_tpl->tpl_vars['key']->value]['rank']>=10&&$_smarty_tpl->tpl_vars['replys']->value[$_smarty_tpl->tpl_vars['key']->value]['rank']<30) {?>
				<img src="image/ranks/senior.png" alt="rank" /><br/>
			<?php } elseif ($_smarty_tpl->tpl_vars['replys']->value[$_smarty_tpl->tpl_vars['key']->value]['rank']>=30&&$_smarty_tpl->tpl_vars['replys']->value[$_smarty_tpl->tpl_vars['key']->value]['rank']<60) {?>
				<img src="image/ranks/veteran.png" alt="rank" /><br/>
			<?php } elseif ($_smarty_tpl->tpl_vars['replys']->value[$_smarty_tpl->tpl_vars['key']->value]['rank']>=60&&$_smarty_tpl->tpl_vars['replys']->value[$_smarty_tpl->tpl_vars['key']->value]['rank']<100) {?>
				<img src="image/ranks/super_user.png" alt="rank" /><br/>
			<?php } elseif ($_smarty_tpl->tpl_vars['replys']->value[$_smarty_tpl->tpl_vars['key']->value]['rank']>=100&&$_smarty_tpl->tpl_vars['replys']->value[$_smarty_tpl->tpl_vars['key']->value]['rank']<150) {?>
				<img src="image/ranks/heroic_user.png" alt="rank" /><br/>
			<?php } elseif ($_smarty_tpl->tpl_vars['replys']->value[$_smarty_tpl->tpl_vars['key']->value]['rank']>=200) {?>
				<img src="image/ranks/mythical.png" alt="rank" /><br/>
			<?php }?>
			<b>Posts</b>: 30
			<p><b>Joined</b>: <?php echo $_smarty_tpl->tpl_vars['replys']->value[$_smarty_tpl->tpl_vars['key']->value]['join_date'];?>
 Ago</p>
			<?php if (!empty($_SESSION['username'])&&$_SESSION['username']!=$_smarty_tpl->tpl_vars['replys']->value[$_smarty_tpl->tpl_vars['key']->value]['posted_by']) {?>
				<a href="?page=rep&tid=<?php echo $_GET['id'];?>
&fid=<?php echo $_GET['fid'];?>
&rep=<?php echo $_smarty_tpl->tpl_vars['replys']->value[$_smarty_tpl->tpl_vars['key']->value]['posted_by'];?>
&by=<?php echo $_SESSION['username'];?>
"><img src="image/rep.ico" style="height: 30px;" alt="add_rep"/></a>
				<img src="image/report.ico" style="height: 30px;" alt="report"/>
			<?php }?>
		</div>			
		<div class="info_align_left">
			<h3>RE: <?php echo ucfirst($_smarty_tpl->tpl_vars['replys']->value[$_smarty_tpl->tpl_vars['key']->value]['title']);?>
</h3>
			<p><?php echo $_smarty_tpl->tpl_vars['replys']->value[$_smarty_tpl->tpl_vars['key']->value]['posted_time'];?>
 Ago.</p>
			<?php echo $_smarty_tpl->tpl_vars['replys']->value[$_smarty_tpl->tpl_vars['key']->value]['content'];?>

		</div>
		<div class="clear"> </div>
	</div>
	<?php } ?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['locked']->value=="locked") {?>
	<button class="lock">Topic Locked</button>
<?php } else { ?>
	<a><button class="button reply"><i class="uk-icon-mail-reply"></i> Post a reply</button></a>
<?php }?>
	<a class="num_page base-color">Page 1 of 1</a><a class="num_topics base-color"><?php echo $_smarty_tpl->tpl_vars['replys_num']->value;?>
 replys</a>
<div class="clear"> </div>
<div id="blank" class="hide">
	<div class="info">
	<h3>Reply</h3>
	<div id="reply_box">
		<div id="bbcodes">
			<img src="image/bbcode/text_bold.png" alt="bold" />
			<img src="image/bbcode/text_italic.png" alt="italic" />
			<img src="image/bbcode/page_white_code.png" alt="quote" />
			<img src="image/bbcode/page_white_code.png" alt="code" />
			<img src="image/bbcode/image.png" alt="image" />
			<img src="image/bbcode/world_link.png" alt="link" /><br />
			<img src="image/bbcode/0.gif" alt="smile" />
			<img src="image/bbcode/1.gif" alt="smile" />
			<img src="image/bbcode/2.gif" alt="smile" />
			<img src="image/bbcode/3.gif" alt="smile" />
			<img src="image/bbcode/4.gif" alt="smile" />
			<img src="image/bbcode/5.gif" alt="smile" />
			<img src="image/bbcode/6.gif" alt="smile" />
			<img src="image/bbcode/7.gif" alt="smile" />
			<img src="image/bbcode/8.gif" alt="smile" />
			<img src="image/bbcode/9.gif" alt="smile" />
		</div>
		<form action="" method="post">
		<textarea required="required" placeholder="Right you reply here" ></textarea><br />
		<input type="submit" class="form_submit" value="Reply" />
		</form>
	</div>
</div>
</div><?php }} ?>
