<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-10 14:40:04
         compiled from "/var/www/html/webapps/forum/view/forum.html" */ ?>
<?php /*%%SmartyHeaderCode:36549851154c0dfd939bbb7-47859128%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '994b73f075b66f22deb2ce3e2b658a5b5132cd6c' => 
    array (
      0 => '/var/www/html/webapps/forum/view/forum.html',
      1 => 1425997734,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36549851154c0dfd939bbb7-47859128',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54c0dfd93a2225_62789566',
  'variables' => 
  array (
    'locked_forum' => 0,
    'num_topics' => 0,
    'topics' => 0,
    'topics_num' => 0,
    'page' => 0,
    'of' => 0,
    'topics_title' => 0,
    'announce' => 0,
    'topics_count' => 0,
    'topics_key' => 0,
    'replys_count' => 0,
    'num_replies' => 0,
    'views' => 0,
    'views_key' => 0,
    'num_views' => 0,
    'last_topic_count' => 0,
    'last_topic' => 0,
    'last_topic_key' => 0,
    'topics2_count' => 0,
    'topics2' => 0,
    'topics2_key' => 0,
    'replys_count2' => 0,
    'replys2_count' => 0,
    'num_replies2' => 0,
    'views2' => 0,
    'views2_key' => 0,
    'num_views2' => 0,
    'last_topic2_count' => 0,
    'last_topic2' => 0,
    'last_topic2_key' => 0,
    'last_topic_key2' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54c0dfd93a2225_62789566')) {function content_54c0dfd93a2225_62789566($_smarty_tpl) {?><div id="navigation">
	<a href="index.php"><button>Board index</button></a> >
	<a href=""><button>First Forum</button></a>
</div>

<h1>First forum</h1>
<?php if ($_smarty_tpl->tpl_vars['locked_forum']->value>0) {?>
	<button class='lock'>Forum Locked</button>
<?php } else { ?>
	<a href='?page=post'><button class='button'><i class="uk-icon-mail-reply"></i> Post a new topic</button></a>
<?php }?>

<?php $_smarty_tpl->tpl_vars['topics_num'] = new Smarty_variable(0, null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['num_topics']->value>0) {?>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['topics']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
		<?php $_smarty_tpl->tpl_vars['topics_num'] = new Smarty_variable($_smarty_tpl->tpl_vars['topics_num']->value+1, null, 0);?>
	<?php } ?>
<?php }?>

<a class='num_page base-color'><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
 1 <?php echo $_smarty_tpl->tpl_vars['of']->value;?>
 1</a><a class='num_topics base-color'><?php echo $_smarty_tpl->tpl_vars['topics_num']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['topics_title']->value;?>
</a>
<div class='clear'> </div>

<?php if ($_smarty_tpl->tpl_vars['announce']->value>0) {?>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['announce']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
		<div class='titles'>
			<div class='first_title'> Announcements </div>
			<div class='second_title'> Replies / Views </div>
			<div class='third_title uk-hidden-small'> Last post </div>
			<div class='clear'></div>
		</div>
		
		<?php if ($_smarty_tpl->tpl_vars['topics_count']->value==0) {?>
			<div class='forum_topics'>
				<i class="uk-icon-close uk-icon-large"></i>
				<div class='first_forum_topic'>
					<a class='forum_topic_title'>There are no Topics in this Forum.</a><br />
				</div>
			</div>
		<?php } else { ?>
			<?php  $_smarty_tpl->tpl_vars['topics_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['topics_item']->_loop = false;
 $_smarty_tpl->tpl_vars['topics_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['topics']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['topics_item']->key => $_smarty_tpl->tpl_vars['topics_item']->value) {
$_smarty_tpl->tpl_vars['topics_item']->_loop = true;
 $_smarty_tpl->tpl_vars['topics_key']->value = $_smarty_tpl->tpl_vars['topics_item']->key;
?>
				<div class='forum_topics'>
					<i class="uk-icon-bullhorn uk-icon-large"></i>
					<div class='first_forum_topic'>
						<a href='?page=topic&fid=<?php echo $_GET['id'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['topics']->value[$_smarty_tpl->tpl_vars['topics_key']->value]['id'];?>
' class='forum_topic_title'>Announcement: <?php echo $_smarty_tpl->tpl_vars['topics']->value[$_smarty_tpl->tpl_vars['topics_key']->value]['title'];?>
</a><br />
						<a class='forum_topic_description'>by <a href='?profile=<?php echo $_smarty_tpl->tpl_vars['topics']->value[$_smarty_tpl->tpl_vars['topics_key']->value]['posted_by'];?>
' class='user'><?php echo $_smarty_tpl->tpl_vars['topics']->value[$_smarty_tpl->tpl_vars['topics_key']->value]['posted_by'];?>
</a> » <?php echo $_smarty_tpl->tpl_vars['topics']->value[$_smarty_tpl->tpl_vars['topics_key']->value]['posted_time'];?>
 ago.</a>
					</div>
				
				<?php $_smarty_tpl->tpl_vars['num_replies'] = new Smarty_variable(0, null, 0);?>
				<?php $_smarty_tpl->tpl_vars['num_views'] = new Smarty_variable(0, null, 0);?>
				
				<?php if ($_smarty_tpl->tpl_vars['replys_count']->value>0) {?>
					<?php  $_smarty_tpl->tpl_vars['replys_count_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['replys_count_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['replys_count']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['replys_count_item']->key => $_smarty_tpl->tpl_vars['replys_count_item']->value) {
$_smarty_tpl->tpl_vars['replys_count_item']->_loop = true;
?>
						<?php $_smarty_tpl->tpl_vars['num_replies'] = new Smarty_variable($_smarty_tpl->tpl_vars['num_replies']->value+1, null, 0);?>
					<?php } ?>
					<?php  $_smarty_tpl->tpl_vars['views_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['views_item']->_loop = false;
 $_smarty_tpl->tpl_vars['views_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['views']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['views_item']->key => $_smarty_tpl->tpl_vars['views_item']->value) {
$_smarty_tpl->tpl_vars['views_item']->_loop = true;
 $_smarty_tpl->tpl_vars['views_key']->value = $_smarty_tpl->tpl_vars['views_item']->key;
?>
						<?php if ($_smarty_tpl->tpl_vars['views']->value[$_smarty_tpl->tpl_vars['views_key']->value]['id']==$_smarty_tpl->tpl_vars['topics']->value[$_smarty_tpl->tpl_vars['topics_key']->value]['id']) {?>
							<?php $_smarty_tpl->tpl_vars['num_views'] = new Smarty_variable($_smarty_tpl->tpl_vars['views']->value[$_smarty_tpl->tpl_vars['views_key']->value]['views'], null, 0);?>
						<?php }?>
					<?php } ?>
				<?php }?>
				
				<div class='second_forum_topic'>
					<a class='topics_posts'><?php echo $_smarty_tpl->tpl_vars['num_replies']->value;?>
/ <?php echo $_smarty_tpl->tpl_vars['num_views']->value;?>
</a>
				</div>
				
				<?php if ($_smarty_tpl->tpl_vars['last_topic_count']->value>0) {?>
					<?php  $_smarty_tpl->tpl_vars['last_topic_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['last_topic_item']->_loop = false;
 $_smarty_tpl->tpl_vars['last_topic_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['last_topic']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['last_topic_item']->key => $_smarty_tpl->tpl_vars['last_topic_item']->value) {
$_smarty_tpl->tpl_vars['last_topic_item']->_loop = true;
 $_smarty_tpl->tpl_vars['last_topic_key']->value = $_smarty_tpl->tpl_vars['last_topic_item']->key;
?>
						<?php if ($_smarty_tpl->tpl_vars['last_topic']->value[$_smarty_tpl->tpl_vars['last_topic_key']->value]['id_topic']==$_smarty_tpl->tpl_vars['topics']->value[$_smarty_tpl->tpl_vars['topics_key']->value]['id_topic']) {?>
							<div class='third_forum_topic uk-hidden-small'>
								<a class='last_post'>by <a href='?page=profile&user=<?php echo $_smarty_tpl->tpl_vars['last_topic']->value[$_smarty_tpl->tpl_vars['last_topic_key']->value]['posted_by'];?>
' class='user'><?php echo $_smarty_tpl->tpl_vars['last_topic']->value[$_smarty_tpl->tpl_vars['last_topic_key']->value]['posted_by'];?>
</a> ><br /> <?php echo $_smarty_tpl->tpl_vars['last_topic']->value[$_smarty_tpl->tpl_vars['last_topic_key']->value]['posted_time'];?>
 ago.</a>
							</div>
						<?php }?>
					<?php } ?>
				<?php } else { ?>
					<div class='third_forum_topic uk-hidden-small'>
						<a class='last_post'>Has no posts</a>
					</div>
				<?php }?>
				</div>
			<?php } ?>
		<?php }?>
	<?php } ?>
<?php }?>

<div class='titles'>
	<div class='first_title'> Topics </div>
	<div class='second_title'> Replies / Views </div>
	<div class='third_title'> Last post </div>
	<div class='clear'></div>
</div>

<?php if ($_smarty_tpl->tpl_vars['topics2_count']->value==0) {?>
			<div class='forum_topics'>
				<i class="uk-icon-close uk-icon-large"></i>
				<div class='first_forum_topic'>
					<a class='forum_topic_title'>There are no Topics in this Forum.</a><br />
				</div>
			</div>
		<?php } else { ?>
			<?php  $_smarty_tpl->tpl_vars['topics2_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['topics2_item']->_loop = false;
 $_smarty_tpl->tpl_vars['topics2_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['topics2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['topics2_item']->key => $_smarty_tpl->tpl_vars['topics2_item']->value) {
$_smarty_tpl->tpl_vars['topics2_item']->_loop = true;
 $_smarty_tpl->tpl_vars['topics2_key']->value = $_smarty_tpl->tpl_vars['topics2_item']->key;
?>
				<div class='forum_topics'>
					<i class="uk-icon-bullhorn uk-icon-large"></i>
					<div class='first_forum_topic'>
						<a href='?page=topic&fid=<?php echo $_GET['id'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['topics2']->value[$_smarty_tpl->tpl_vars['topics2_key']->value]['id'];?>
' class='forum_topic_title'>Announcement: <?php echo $_smarty_tpl->tpl_vars['topics2']->value[$_smarty_tpl->tpl_vars['topics2_key']->value]['title'];?>
</a><br />
						<a class='forum_topic_description'>By <a href='?page=profile&user=<?php echo $_smarty_tpl->tpl_vars['topics2']->value[$_smarty_tpl->tpl_vars['topics2_key']->value]['posted_by'];?>
' class='user'><?php echo ucfirst($_smarty_tpl->tpl_vars['topics2']->value[$_smarty_tpl->tpl_vars['topics2_key']->value]['posted_by']);?>
</a> » <?php echo $_smarty_tpl->tpl_vars['topics2']->value[$_smarty_tpl->tpl_vars['topics2_key']->value]['posted_time'];?>
 ago.</a>
					</div>
				
				<?php $_smarty_tpl->tpl_vars['num_replies2'] = new Smarty_variable(0, null, 0);?>
				<?php $_smarty_tpl->tpl_vars['num_views2'] = new Smarty_variable(0, null, 0);?>
				
				<?php if ($_smarty_tpl->tpl_vars['replys_count2']->value>0) {?>
					<?php  $_smarty_tpl->tpl_vars['replys2_count_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['replys2_count_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['replys2_count']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['replys2_count_item']->key => $_smarty_tpl->tpl_vars['replys2_count_item']->value) {
$_smarty_tpl->tpl_vars['replys2_count_item']->_loop = true;
?>
						<?php $_smarty_tpl->tpl_vars['num_replies2'] = new Smarty_variable($_smarty_tpl->tpl_vars['num_replies2']->value+1, null, 0);?>
					<?php } ?>
					<?php  $_smarty_tpl->tpl_vars['views2_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['views2_item']->_loop = false;
 $_smarty_tpl->tpl_vars['views2_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['views2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['views2_item']->key => $_smarty_tpl->tpl_vars['views2_item']->value) {
$_smarty_tpl->tpl_vars['views2_item']->_loop = true;
 $_smarty_tpl->tpl_vars['views2_key']->value = $_smarty_tpl->tpl_vars['views2_item']->key;
?>
						<?php if ($_smarty_tpl->tpl_vars['views2']->value[$_smarty_tpl->tpl_vars['views2_key']->value]['id']==$_smarty_tpl->tpl_vars['topics2']->value[$_smarty_tpl->tpl_vars['topics2_key']->value]['id']) {?>
							<?php $_smarty_tpl->tpl_vars['num_views2'] = new Smarty_variable($_smarty_tpl->tpl_vars['views2']->value[$_smarty_tpl->tpl_vars['views2_key']->value]['views'], null, 0);?>
						<?php }?>
					<?php } ?>
				<?php }?>
				
				<div class='second_forum_topic'>
					<a class='topics_posts'><?php echo $_smarty_tpl->tpl_vars['num_replies2']->value;?>
/ <?php echo $_smarty_tpl->tpl_vars['num_views2']->value;?>
</a>
				</div>
				
				<?php if ($_smarty_tpl->tpl_vars['last_topic2_count']->value>0) {?>
					<?php  $_smarty_tpl->tpl_vars['last_topic2_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['last_topic2_item']->_loop = false;
 $_smarty_tpl->tpl_vars['last_topic2_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['last_topic2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['last_topic2_item']->key => $_smarty_tpl->tpl_vars['last_topic2_item']->value) {
$_smarty_tpl->tpl_vars['last_topic2_item']->_loop = true;
 $_smarty_tpl->tpl_vars['last_topic2_key']->value = $_smarty_tpl->tpl_vars['last_topic2_item']->key;
?>
						<?php if ($_smarty_tpl->tpl_vars['last_topic2']->value[$_smarty_tpl->tpl_vars['last_topic2_key']->value]['id_topic']==$_smarty_tpl->tpl_vars['topics2']->value[$_smarty_tpl->tpl_vars['topics2_key']->value]['id_topic']) {?>
							<div class='third_forum_topic uk-hidden-small'>
								<a class='last_post'>By <a href='?profile=<?php echo $_smarty_tpl->tpl_vars['last_topic2']->value[$_smarty_tpl->tpl_vars['last_topic2_key']->value]['posted_by'];?>
' class='user'><?php echo ucfirst($_smarty_tpl->tpl_vars['last_topic2']->value[$_smarty_tpl->tpl_vars['last_topic_key2']->value]['posted_by']);?>
</a> ><br /> <?php echo $_smarty_tpl->tpl_vars['last_topic2']->value[$_smarty_tpl->tpl_vars['last_topic_key2']->value]['posted_time'];?>
 ago.</a>
							</div>
						<?php }?>
					<?php } ?>
				<?php } else { ?>
					<div class='third_forum_topic uk-hidden-small'>
						<a class='last_post'>Has no posts</a>
					</div>
				<?php }?>
				</div>
			<?php } ?>
		<?php }?>

<?php if ($_smarty_tpl->tpl_vars['locked_forum']->value>0) {?>
	<button class='lock'>Forum Locked</button>
<?php } else { ?>
	<a href='?post='><button class='button'><i class="uk-icon-mail-reply"></i> Post a new topic</button></a>
<?php }?>

<a class='num_page base-color'><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
 1 <?php echo $_smarty_tpl->tpl_vars['of']->value;?>
 1</a><a class='num_topics base-color'"><?php echo $_smarty_tpl->tpl_vars['topics_num']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['topics_title']->value;?>
</a>
<div class='clear'> </div><?php }} ?>
