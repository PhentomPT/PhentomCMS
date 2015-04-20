<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-10 14:30:29
         compiled from "/var/www/html/webapps/forum/view/home.html" */ ?>
<?php /*%%SmartyHeaderCode:199071726954bd379bf3a322-65771352%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ee79fbf5c6a22f89d9e6f384d3427703b5543bd' => 
    array (
      0 => '/var/www/html/webapps/forum/view/home.html',
      1 => 1425997748,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '199071726954bd379bf3a322-65771352',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54bd379c00e618_41631789',
  'variables' => 
  array (
    'categorys' => 0,
    'categorys_key' => 0,
    'topics_title' => 0,
    'posts_title' => 0,
    'last_post' => 0,
    'forums' => 0,
    'forum_key' => 0,
    'num_categorys' => 0,
    'forum' => 0,
    'img' => 0,
    'forums_key' => 0,
    'topics' => 0,
    'topics_key' => 0,
    'num_topics' => 0,
    'replys' => 0,
    'replays_key' => 0,
    'num_posts' => 0,
    'has_no_posts' => 0,
    'no_forum_in_category' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bd379c00e618_41631789')) {function content_54bd379c00e618_41631789($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['categorys_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['categorys_item']->_loop = false;
 $_smarty_tpl->tpl_vars['categorys_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['categorys']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['categorys_item']->key => $_smarty_tpl->tpl_vars['categorys_item']->value) {
$_smarty_tpl->tpl_vars['categorys_item']->_loop = true;
 $_smarty_tpl->tpl_vars['categorys_key']->value = $_smarty_tpl->tpl_vars['categorys_item']->key;
?>
	<div class='titles'>
		<div class='first_title'><?php echo $_smarty_tpl->tpl_vars['categorys']->value[$_smarty_tpl->tpl_vars['categorys_key']->value]['name'];?>
</div>
		<div class='second_title'><?php echo $_smarty_tpl->tpl_vars['topics_title']->value;?>
 / <?php echo $_smarty_tpl->tpl_vars['posts_title']->value;?>
</div>
		<div class='third_title uk-hidden-small'><?php echo $_smarty_tpl->tpl_vars['last_post']->value;?>
</div>
		<div class='clear'></div>
	</div>
	<?php $_smarty_tpl->tpl_vars['num_categorys'] = new Smarty_variable(0, null, 0);?>
	<?php  $_smarty_tpl->tpl_vars['forum_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['forum_item']->_loop = false;
 $_smarty_tpl->tpl_vars['forum_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['forums']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['forum_item']->key => $_smarty_tpl->tpl_vars['forum_item']->value) {
$_smarty_tpl->tpl_vars['forum_item']->_loop = true;
 $_smarty_tpl->tpl_vars['forum_key']->value = $_smarty_tpl->tpl_vars['forum_item']->key;
?>
		<?php if ($_smarty_tpl->tpl_vars['forums']->value[$_smarty_tpl->tpl_vars['forum_key']->value]['id_category']==$_smarty_tpl->tpl_vars['categorys']->value[$_smarty_tpl->tpl_vars['categorys_key']->value]['id']) {?>
			<?php $_smarty_tpl->tpl_vars['num_categorys'] = new Smarty_variable($_smarty_tpl->tpl_vars['num_categorys']->value+1, null, 0);?>
			<div class='forum_topics' style='background: <?php echo $_smarty_tpl->tpl_vars['forum']->value[$_smarty_tpl->tpl_vars['forum_key']->value]['color'];?>
;'>
				<?php if ($_smarty_tpl->tpl_vars['forums']->value[$_smarty_tpl->tpl_vars['forum_key']->value]['type']=="locked") {?>
					<?php $_smarty_tpl->tpl_vars['img'] = new Smarty_variable("lock", null, 0);?>
				<?php } else { ?>
					<?php $_smarty_tpl->tpl_vars['img'] = new Smarty_variable("comments-o", null, 0);?>
				<?php }?>
				<i class="uk-icon-<?php echo $_smarty_tpl->tpl_vars['img']->value;?>
 uk-icon-large"></i>
				<div class='first_forum_topic'>
					<a href='?page=forum&id=<?php echo $_smarty_tpl->tpl_vars['forums']->value[$_smarty_tpl->tpl_vars['forum_key']->value]['id'];?>
' class='forum_topic_title'><?php echo $_smarty_tpl->tpl_vars['forums']->value[$_smarty_tpl->tpl_vars['forum_key']->value]['name'];?>
</a><br />
					<a class='forum_topic_description'><?php echo $_smarty_tpl->tpl_vars['forums']->value[$_smarty_tpl->tpl_vars['forum_key']->value]['description'];?>
</a>
				</div>
				<?php $_smarty_tpl->tpl_vars['id_forum'] = new Smarty_variable($_smarty_tpl->tpl_vars['forums']->value[$_smarty_tpl->tpl_vars['forums_key']->value]['id'], null, 0);?>
				<?php $_smarty_tpl->tpl_vars['num_topics'] = new Smarty_variable(0, null, 0);?>
				<?php $_smarty_tpl->tpl_vars['num_posts'] = new Smarty_variable(0, null, 0);?>
				<?php  $_smarty_tpl->tpl_vars['topics_key'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['topics_key']->_loop = false;
 $_smarty_tpl->tpl_vars['topics_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['topics']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['topics_key']->key => $_smarty_tpl->tpl_vars['topics_key']->value) {
$_smarty_tpl->tpl_vars['topics_key']->_loop = true;
 $_smarty_tpl->tpl_vars['topics_key']->value = $_smarty_tpl->tpl_vars['topics_key']->key;
?>
					<?php if ($_smarty_tpl->tpl_vars['topics']->value[$_smarty_tpl->tpl_vars['topics_key']->value]['id_forum']==$_smarty_tpl->tpl_vars['forums']->value[$_smarty_tpl->tpl_vars['forum_key']->value]['id']) {?>
						<?php $_smarty_tpl->tpl_vars['num_topics'] = new Smarty_variable($_smarty_tpl->tpl_vars['num_topics']->value+1, null, 0);?>
						<?php  $_smarty_tpl->tpl_vars['replays_key'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['replays_key']->_loop = false;
 $_smarty_tpl->tpl_vars['replays_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['replys']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['replays_key']->key => $_smarty_tpl->tpl_vars['replays_key']->value) {
$_smarty_tpl->tpl_vars['replays_key']->_loop = true;
 $_smarty_tpl->tpl_vars['replays_key']->value = $_smarty_tpl->tpl_vars['replays_key']->key;
?>
							<?php if ($_smarty_tpl->tpl_vars['replys']->value[$_smarty_tpl->tpl_vars['replays_key']->value]['id_topic']==$_smarty_tpl->tpl_vars['topics']->value[$_smarty_tpl->tpl_vars['topics_key']->value]['id']) {?>
								<?php $_smarty_tpl->tpl_vars['num_posts'] = new Smarty_variable($_smarty_tpl->tpl_vars['num_posts']->value+1, null, 0);?>
							<?php }?>
						<?php } ?>
					<?php }?>
				<?php } ?>
				<div class='second_forum_topic'>
					<a class='topics_posts'><?php echo $_smarty_tpl->tpl_vars['num_topics']->value;?>
 / <?php echo $_smarty_tpl->tpl_vars['num_posts']->value;?>
</a>
				</div>
				<div class='third_forum_topic uk-hidden-small'>
					<?php if ($_smarty_tpl->tpl_vars['num_topics']->value==0) {?>
						<a class='last_post'><?php echo $_smarty_tpl->tpl_vars['has_no_posts']->value;?>
</a>
					<?php } else { ?>
						<a class='last_post'>By <a href='?page=profile&user=<?php echo $_smarty_tpl->tpl_vars['topics']->value[0]['posted_by'];?>
' class='user'><?php echo ucfirst($_smarty_tpl->tpl_vars['topics']->value[0]['posted_by']);?>
</a><br /><?php echo $_smarty_tpl->tpl_vars['topics']->value[0]['posted_time'];?>
 ago.</a>
					<?php }?>
				</div>
			</div>
		<?php }?>
	<?php } ?>
	<?php if ($_smarty_tpl->tpl_vars['num_categorys']->value==0) {?>
		<div class='forum_topics'>
			<i class="uk-icon-close uk-icon-large"></i>
			<div class='first_forum_topic'>
				<a class='forum_topic_title'><?php echo $_smarty_tpl->tpl_vars['no_forum_in_category']->value;?>
</a><br />
			</div>
		</div>
	<?php }?>
<?php } ?><?php }} ?>
