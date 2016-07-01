<?php /* Smarty version Smarty-3.1.18, created on 2016-03-13 02:31:40
         compiled from "simpla/design/html/images.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76164569056e4b4ec61f5c6-36666273%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8685d8683b553d8dc265945e7479dabb83a0b91' => 
    array (
      0 => 'simpla/design/html/images.tpl',
      1 => 1405446040,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76164569056e4b4ec61f5c6-36666273',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'theme' => 0,
    'message_error' => 0,
    'images_dir' => 0,
    'images' => 0,
    'image' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56e4b4ec685706_25991167',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e4b4ec685706_25991167')) {function content_56e4b4ec685706_25991167($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/ulafuacom/data/www/ulafua.com/Smarty/libs/plugins/modifier.truncate.php';
?><?php $_smarty_tpl->_capture_stack[0][] = array('tabs', null, null); ob_start(); ?>
	<li><a href="index.php?module=ThemeAdmin">Тема</a></li>
	<li><a href="index.php?module=TemplatesAdmin">Шаблоны</a></li>		
	<li><a href="index.php?module=StylesAdmin">Стили</a></li>		
	<li class="active"><a href="index.php?module=ImagesAdmin">Изображения</a></li>		
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable("Изображения", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>



<script>
$(function() {

	// Редактировать
	$("a.edit").click(function() {
		name = $(this).closest('li').attr('name');
		inp1 = $('<input type=hidden name="old_name[]">').val(name);
		inp2 = $('<input type=text name="new_name[]">').val(name);
		$(this).closest('li').find("p.name").html('').append(inp1).append(inp2);
		inp2.focus().select();
		return false;
	});
 

	// Удалить 
	$("a.delete").click(function() {
		name = $(this).closest('li').attr('name');
		$('input[name=delete_image]').val(name);
		$(this).closest("form").submit();
	});
	
	// Загрузить
	$("#upload_image").click(function() {
		$(this).closest('div').append($('<input type=file name=upload_images[]>'));
	});
	
	$("form").submit(function() {
		if($('input[name="delete_image"]').val()!='' && !confirm('Подтвердите удаление'))
			return false;	
	});

});
</script>


<h1>Изображения темы <?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
</h1>

<?php if ($_smarty_tpl->tpl_vars['message_error']->value) {?>
<!-- Системное сообщение -->
<div class="message message_error">
	<span class="text"><?php if ($_smarty_tpl->tpl_vars['message_error']->value=='permissions') {?>Установите права на запись для папки <?php echo $_smarty_tpl->tpl_vars['images_dir']->value;?>

	<?php } elseif ($_smarty_tpl->tpl_vars['message_error']->value=='name_exists') {?>Файл с таким именем уже существует
	<?php } elseif ($_smarty_tpl->tpl_vars['message_error']->value=='theme_locked') {?>Текущая тема защищена от изменений. Создайте копию темы.
	<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['message_error']->value;?>
<?php }?></span>
</div>
<!-- Системное сообщение (The End)-->
<?php }?>

<form method="post" enctype="multipart/form-data">
<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">
<input type="hidden" name="delete_image" value="">
<!-- Список файлов для выбора -->
<div class="block layer">
	<ul class="theme_images">
		<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['images']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
?>
			<li name='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value->name, ENT_QUOTES, 'UTF-8', true);?>
'>
			<a href='#' class='delete' title="Удалить"><img src='design/images/delete.png'></a>
			<a href='#' class='edit' title="Переименовать"><img src='design/images/pencil.png'></a>
			<p class="name"><?php echo smarty_modifier_truncate(htmlspecialchars($_smarty_tpl->tpl_vars['image']->value->name, ENT_QUOTES, 'UTF-8', true),16,'...');?>
</p>
			<div class="theme_image">
			<a class='preview' href='../<?php echo $_smarty_tpl->tpl_vars['images_dir']->value;?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value->name, ENT_QUOTES, 'UTF-8', true);?>
'><img src='../<?php echo $_smarty_tpl->tpl_vars['images_dir']->value;?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value->name, ENT_QUOTES, 'UTF-8', true);?>
'></a>
			</div>
			<p class=size><?php if ($_smarty_tpl->tpl_vars['image']->value->size>1024*1024) {?><?php echo round(($_smarty_tpl->tpl_vars['image']->value->size/1024/1024),2);?>
 МБ<?php } elseif ($_smarty_tpl->tpl_vars['image']->value->size>1024) {?><?php echo round(($_smarty_tpl->tpl_vars['image']->value->size/1024),2);?>
 КБ<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['image']->value->size;?>
 Байт<?php }?>, <?php echo $_smarty_tpl->tpl_vars['image']->value->width;?>
&times;<?php echo $_smarty_tpl->tpl_vars['image']->value->height;?>
 px</p>
			</li>
		<?php } ?>
	</ul>
</div>


<div class="block upload_image">
<span id="upload_image"><i class="dash_link">Добавить изображение</i></span>
</div>

<div class="block">
<input class="button_green button_save" type="submit" name="save" value="Сохранить" />
</div>

</form>
<?php }} ?>
