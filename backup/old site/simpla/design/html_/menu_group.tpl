{* Вкладки *}
{capture name=tabs}
	{if in_array('pages', $manager->permissions)}
	{foreach from=$menus item=m}
		<li><a href="{url module=PagesAdmin menu_id=$m->id}">{$m->name}</a></li>
	{/foreach}
	{/if}
    <li><a href="{url module=DmenusGroupsAdmin}">Группы меню</a></li>
	<li class="active"><a href="{url module=DmenusGroupAdmin menu_group_id=$menu_group->id id=null}">Меню {$menu_group->name}</a></li>
{/capture}
{* Title *}
{$meta_title="Меню `$menu_group->name`" scope=parent}

{* Заголовок *}
<div id="header">
	<h1>Меню {$menu_group->name}</h1>
	<a class="add" href="{url module=DmenusAdmin menu_group_id=$menu_group->id id=null}">Добавить пункт меню</a>
</div>	
<!-- Заголовок (The End) -->

{if $categories}
<div id="main_list" class="categories">

	<form id="list_form" method="post">
	<input type="hidden" name="session_id" value="{$smarty.session.id}">
		<input type="text" name="group_name" value="{$menu_group->name}" style="width:200px;margin-right:20px;">
		<br>
		<br>
		{function name=categories_tree level=0}
			{if $categories}
			<div id="list" class="sortable">
			
				{foreach $categories as $category}
				<div class="{if !$category->visible}invisible{/if} row">		
					<div class="tree_row">
						<input type="hidden" name="positions[{$category->id}]" value="{$category->position}">
						<div class="move cell" style="margin-left:{$level*20}px"><div class="move_zone"></div></div>
						<div class="checkbox cell">
							<input type="checkbox" name="check[]" value="{$category->id}" />				
						</div>
						<div class="cell">
							<a href="{url module=DmenusAdmin id=$category->id}">{$category->name|escape}</a> 	 			
						</div>
						<div class="icons cell">
							<a class="preview" title="Предпросмотр в новом окне" href="../catalog/{$category->url}" target="_blank"></a>				
							<a class="enable" title="Активна" href="#"></a>
							<a class="delete" title="Удалить" href="#"></a>
						</div>
						<div class="clear"></div>
					</div>
					{categories_tree categories=$category->submenus level=$level+1}
				</div>
				{/foreach}
		
			</div>
			{/if}
		{/function}
		{categories_tree categories=$categories}
		
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
{else}
Нет категорий
{/if}

{literal}
<script>
$(function() {

	// Сортировка списка
	$(".sortable").sortable({
		items:".row",
		handle: ".move_zone",
		tolerance:"pointer",
		scrollSensitivity:40,
		opacity:0.7, 
		axis: "y",
		update:function()
		{
			$("#list_form input[name*='check']").attr('checked', false);
			$("#list_form").ajaxSubmit();
		}
	});
 
	// Выделить все
	$("#check_all").click(function() {
		$('#list input[type="checkbox"][name*="check"]:not(:disabled)').attr('checked', $('#list input[type="checkbox"][name*="check"]:not(:disabled):not(:checked)').length>0);
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
			data: {'object': 'dmenu', 'id': id, 'values': {'visible': state}, 'session_id': '{/literal}{$smarty.session.id}{literal}'},
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

	// Удалить 
	$("a.delete").click(function() {
		$('#list input[type="checkbox"][name*="check"]').attr('checked', false);
		$(this).closest("div.row").find('input[type="checkbox"][name*="check"]:first').attr('checked', true);
		$(this).closest("form").find('select[name="action"] option[value=delete]').attr('selected', true);
		$(this).closest("form").submit();
	});

	
	// Подтвердить удаление
	$("form").submit(function() {
		if($('select[name="action"]').val()=='delete' && !confirm('Подтвердите удаление'))
			return false;	
	});

});
</script>
{/literal}