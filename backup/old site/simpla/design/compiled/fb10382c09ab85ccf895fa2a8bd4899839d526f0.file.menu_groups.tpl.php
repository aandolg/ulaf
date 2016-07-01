<?php /* Smarty version Smarty-3.1.18, created on 2016-03-09 17:49:45
         compiled from "simpla/design/html/menu_groups.tpl" */ ?>
<?php /*%%SmartyHeaderCode:103418591156e04619999dc6-02308057%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb10382c09ab85ccf895fa2a8bd4899839d526f0' => 
    array (
      0 => 'simpla/design/html/menu_groups.tpl',
      1 => 1405432432,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '103418591156e04619999dc6-02308057',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'manager' => 0,
    'menus' => 0,
    'm' => 0,
    'menu_groups' => 0,
    'menu_group' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56e04619a03b99_38411796',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e04619a03b99_38411796')) {function content_56e04619a03b99_38411796($_smarty_tpl) {?>
<?php $_smarty_tpl->_capture_stack[0][] = array('tabs', null, null); ob_start(); ?>
	<?php if (in_array('pages',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?>
	<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value) {
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
		<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'PagesAdmin','menu_id'=>$_smarty_tpl->tpl_vars['m']->value->id),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value->name;?>
</a></li>
	<?php } ?>
	<?php }?>
    <li class="active"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'DmenusGroupsAdmin'),$_smarty_tpl);?>
">Группы меню</a></li>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>


<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Группы меню', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>


<div id="header">
	<h1>Группы меню</h1>	
	<form method="post">
		название
		<input type="text" name="add_group" style="width:300px;margin:0 20px;">
		<a class="add" href="#" style="display:inline-block;float:none">Добавить</a>
		<div class="clear"></div>
		<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">
	</form>
</div>

<?php if ($_smarty_tpl->tpl_vars['menu_groups']->value) {?>
<div id="main_list" class="menu_groups">

	<form id="list_form" method="post">
	<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">
		
		<div id="list" class="menu_groups">	
			<?php  $_smarty_tpl->tpl_vars['menu_group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu_group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu_group']->key => $_smarty_tpl->tpl_vars['menu_group']->value) {
$_smarty_tpl->tpl_vars['menu_group']->_loop = true;
?>
			<div class="<?php if (!$_smarty_tpl->tpl_vars['menu_group']->value->visible) {?>invisible<?php }?> row">
		 		<div class="checkbox cell">
					<input type="checkbox" name="check[]" value="<?php echo $_smarty_tpl->tpl_vars['menu_group']->value->id;?>
" />				
				</div>
				<div class="cell">
					<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'DmenusGroupAdmin','menu_group_id'=>$_smarty_tpl->tpl_vars['menu_group']->value->id),$_smarty_tpl);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['menu_group']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a> 	 			
				</div>
				<div class="icons cell">
                    <a class="enable" title="Активна" href="#"></a>				
					<a class="delete"  title="Удалить" href="#"></a>
				</div>
				<div class="icons cell">
					id для вывода - <?php echo $_smarty_tpl->tpl_vars['menu_group']->value->id;?>

				</div>
				<div class="clear"></div>
			</div>
			<?php } ?>
		</div>
		
		<div id="action">
			<label id="check_all" class="dash_link">Выбрать все</label>
			
			<span id="select">
			<select name="action">
                <option value="enable">Сделать видимыми</option>
                <option value="disable">Сделать невидимыми</option>
				<option value="delete">Удалить</option>
			</select>
			</span>
			<input id="apply_action" class="button_green" type="submit" value="Применить">
		</div>
		
	</form>
</div>
<?php } else { ?>
Нет групп меню
<?php }?>


<script>
$(function() {
	
	$('.add').click(function(e){
		e.preventDefault();
		$(this).closest('form').submit();
	});
	
	// Раскраска строк
	function colorize()
	{
		$("#list div.row:even").addClass('even');
		$("#list div.row:odd").removeClass('even');
	}
	// Раскрасить строки сразу
	colorize();	
	
	// Выделить все
	$("#check_all").click(function() {
		$('#list input[type="checkbox"][name*="check"]').attr('checked', $('#list input[type="checkbox"][name*="check"]:not(:checked)').length>0);
	});	

	// Удалить
	$("a.delete").click(function() {
		$('#list input[type="checkbox"][name*="check"]').attr('checked', false);
		$(this).closest("div.row").find('input[type="checkbox"][name*="check"]').attr('checked', true);
		$(this).closest("form").find('select[name="action"] option[value=delete]').attr('selected', true);
		$(this).closest("form").submit();
	});
	
	// Подтверждение удаления
	$("form").submit(function() {
		if($('#list input[type="checkbox"][name*="check"]:checked').length>0)
			if($('select[name="action"]').val()=='delete' && !confirm('Подтвердите удаление'))
				return false;	
	});
    
    // Показать категорию
	$("a.enable").click(function() {
		var icon        = $(this);
		var line        = icon.closest(".row");
		var id          = line.find('input[type="checkbox"][name*="check"]').val();
		var state       = line.hasClass('invisible')?1:0;
		icon.addClass('loading_icon');
		$.ajax({
			type: 'POST',
			url: 'ajax/update_object.php',
			data: {'object': 'menu_group', 'id': id, 'values': {'visible': state}, 'session_id': '<?php echo $_SESSION['id'];?>
'},
			success: function(data){
				icon.removeClass('loading_icon');
				if(state)
					line.removeClass('invisible');
				else
					line.addClass('invisible');				
			},
			dataType: 'json'
		});	
		return false;	
	});
 	
});
</script>

<?php }} ?>
