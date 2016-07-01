<?php /* Smarty version Smarty-3.1.18, created on 2016-03-13 02:31:35
         compiled from "simpla/design/html/styles.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8160499356e4b4e70bed87-59495304%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dae096532720832e6d8834330c848820539656dd' => 
    array (
      0 => 'simpla/design/html/styles.tpl',
      1 => 1405446108,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8160499356e4b4e70bed87-59495304',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'style_file' => 0,
    'theme' => 0,
    'message_error' => 0,
    'styles' => 0,
    's' => 0,
    'style_content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56e4b4e7112592_74297811',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e4b4e7112592_74297811')) {function content_56e4b4e7112592_74297811($_smarty_tpl) {?><?php $_smarty_tpl->_capture_stack[0][] = array('tabs', null, null); ob_start(); ?>
	<li><a href="index.php?module=ThemeAdmin">Тема</a></li>
	<li><a href="index.php?module=TemplatesAdmin">Шаблоны</a></li>		
	<li class="active"><a href="index.php?module=StylesAdmin">Стили</a></li>		
	<li><a href="index.php?module=ImagesAdmin">Изображения</a></li>		
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php if ($_smarty_tpl->tpl_vars['style_file']->value) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable("Стиль ".((string)$_smarty_tpl->tpl_vars['style_file']->value), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php }?>


<link rel="stylesheet" href="design/js/codemirror/lib/codemirror.css">
<script src="design/js/codemirror/lib/codemirror.js"></script>

<script src="design/js/codemirror/mode/css/css.js"></script>
<script src="design/js/codemirror/addon/selection/active-line.js"></script>
 

<style type="text/css">

.CodeMirror{
	font-family:'Courier New';
	margin-bottom:10px;
	border:1px solid #c0c0c0;
	background-color: #ffffff;
	height: auto;
	min-height: 300px;
	width:100%;
}
.CodeMirror-scroll
{
	overflow-y: hidden;
	overflow-x: auto;
}
</style>

<script>
$(function() {	
	// Сохранение кода аяксом
	function save()
	{
		$('.CodeMirror').css('background-color','#e0ffe0');
		content = editor.getValue();
		
		$.ajax({
			type: 'POST',
			url: 'ajax/save_style.php',
			data: {'content': content, 'theme':'<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
', 'style': '<?php echo $_smarty_tpl->tpl_vars['style_file']->value;?>
', 'session_id': '<?php echo $_SESSION['id'];?>
'},
			success: function(data){
			
				$('.CodeMirror').animate({'background-color': '#ffffff'});
			},
			dataType: 'json'
		});
	}

	// Нажали кнопку Сохранить
	$('input[name="save"]').click(function() {
		save();
	});
	
	// Обработка ctrl+s
	var isCtrl = false;
	var isCmd = false;
	$(document).keyup(function (e) {
		if(e.which == 17) isCtrl=false;
		if(e.which == 91) isCmd=false;
	}).keydown(function (e) {
		if(e.which == 17) isCtrl=true;
		if(e.which == 91) isCmd=true;
		if(e.which == 83 && (isCtrl || isCmd)) {
			save();
			e.preventDefault();
		}
	});
});
</script>


<h1>Тема <?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
, стиль <?php echo $_smarty_tpl->tpl_vars['style_file']->value;?>
</h1>

<?php if ($_smarty_tpl->tpl_vars['message_error']->value) {?>
<!-- Системное сообщение -->
<div class="message message_error">
	<span class="text">
	<?php if ($_smarty_tpl->tpl_vars['message_error']->value=='permissions') {?>Установите права на запись для файла <?php echo $_smarty_tpl->tpl_vars['style_file']->value;?>

	<?php } elseif ($_smarty_tpl->tpl_vars['message_error']->value=='theme_locked') {?>Текущая тема защищена от изменений. Создайте копию темы.
	<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['message_error']->value;?>
<?php }?>
	</span>
</div>
<!-- Системное сообщение (The End)-->
<?php }?>

<!-- Список файлов для выбора -->
<div class="block layer">
	<div class="templates_names">
		<?php  $_smarty_tpl->tpl_vars['s'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['s']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['styles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->_loop = true;
?>
			<a <?php if ($_smarty_tpl->tpl_vars['style_file']->value==$_smarty_tpl->tpl_vars['s']->value) {?>class="selected"<?php }?> href='index.php?module=StylesAdmin&file=<?php echo $_smarty_tpl->tpl_vars['s']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['s']->value;?>
</a>
		<?php } ?>
	</div>
</div>

<?php if ($_smarty_tpl->tpl_vars['style_file']->value) {?>
<div class="block">
<form>
	<textarea id="content" name="content" style="width:700px;height:500px;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['style_content']->value, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
</form>

<input class="button_green button_save" type="button" name="save" value="Сохранить" />
<div class="block">




<script>

var editor = CodeMirror.fromTextArea(document.getElementById("content"), {
		mode: "css",		
		lineNumbers: true,
		styleActiveLine: true,
		matchBrackets: false,
		enterMode: 'keep',
		indentWithTabs: false,
		indentUnit: 1,
		tabMode: 'classic'
	});
</script>


<?php }?><?php }} ?>
