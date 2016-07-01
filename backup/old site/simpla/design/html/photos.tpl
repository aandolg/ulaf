{* Вкладки *}
{capture name=tabs}
	{if in_array('blog', $manager->permissions)}<li><a href="index.php?module=BlogAdmin">Блог</a></li>{/if} 	
    <li class="active"><a href="index.php?module=PhotosAdmin">Фотографии</a></li>
	<li><a href="index.php?module=PhotosCategoriesAdmin">Альбомы фотографий</a></li>
{/capture}

{* Title *}
{$meta_title='Фотоальбом' scope=parent}
		
{* Заголовок *}
<div id="header">
	{if $photos_count}
	<h1>{$photos_count} {$photos_count|plural:'фотография':'фотографий':'фотографии'} в {if $category}фотоальбоме {$category->name}{else}галерее{/if}</h1>
	{else}
	<h1>Нет фотографий</h1>
	{/if}
	<a class="add{if !$categories} disabled{/if}" href="{url module=PhotoAdmin return=$smarty.server.REQUEST_URI}">Добавить фото</a>
</div>	

{if $photos}
<div id="main_list">
	
	<!-- Листалка страниц -->
	{include file='pagination.tpl'}	
	<!-- Листалка страниц (The End) -->

	<form id="form_list" method="post">
	<input type="hidden" name="session_id" value="{$smarty.session.id}">
	
		<div id="list" class="sortable">
			{foreach $photos as $photo}
			<div class="{if !$photo->visible}invisible{/if} row">
				<input type="hidden" name="positions[{$photo->id}]" value="{$photo->position}">
				<div class="move cell" style="margin-left:{$level*20}px"><div class="move_zone"></div></div>
		 		<div class="checkbox cell">
					<input type="checkbox" name="check[]" value="{$photo->id}" />				
				</div>
                <div class="image cell">
    				{if $photo->filename}
    				    <a href="{url module=PhotoAdmin id=$photo->id return=$smarty.server.REQUEST_URI}"><img src="../{$config->photos_images_dir}{$photo->filename}" width="35" /></a>
    				{/if}
    			</div>
				<div class="name cell">		
					<a href="{url module=PhotoAdmin id=$photo->id return=$smarty.server.REQUEST_URI}">{$photo->name|escape}</a>
					<br>
					{$photo->date|date}
				</div>
				<div class="icons cell">
					<a class="enable" title="Активна" href="#"></a>
					<a class="delete" title="Удалить" href="#"></a>
				</div>
				<div class="clear"></div>
			</div>
			{/foreach}
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

	<!-- Листалка страниц -->
	{include file='pagination.tpl'}	
	<!-- Листалка страниц (The End) -->
	
</div>
{/if}

<div id="right_menu">
	<!-- Категории товаров -->
	{function name=categories_tree}
	{if $categories}
	<ul>
		{if $categories[0]->parent_id == 0}
		<li {if !$category->id}class="selected"{/if}><a href="{url category_id=null brand_id=null}">Все категории</a></li>	
		{/if}
		{foreach $categories as $c}
		<li category_id="{$c->id}" {if $category->id == $c->id}class="selected"{else}class="droppable category"{/if}><a href='{url page=null category_id={$c->id}}'>{$c->name}</a></li>
		{categories_tree categories=$c->subcategories}
		{/foreach}
	</ul>
	{/if}
	{/function}
	{categories_tree categories=$categories}
	<!-- Категории товаров (The End)-->
</div>

{* On document load *}
{literal}
<script>
$(function() {
    
	$('#header .add.disabled').click(function(){
		alert('У Вас нет ни одного альбома. Для добавления фотографий добавьте альбом');
		return false;
	});
    // Сортировка списка
	$(".sortable").sortable({
		items:".row",
		handle: ".move_zone",
		tolerance:"pointer",
		scrollSensitivity:40,
		opacity:0.7, 
		update:function()
		{
			$("#list input[name*='check']").attr('checked', false);
			$("#list").ajaxSubmit();
		}
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
		$(this).closest(".row").find('input[type="checkbox"][name*="check"]').attr('checked', true);
		$(this).closest("form").find('select[name="action"] option[value=delete]').attr('selected', true);
		$(this).closest("form").submit();
	});
	
	// Скрыт/Видим
	$("a.enable").click(function() {
		var icon        = $(this);
		var line        = icon.closest(".row");
		var id          = line.find('input[type="checkbox"][name*="check"]').val();
		var state       = line.hasClass('invisible')?1:0;
		icon.addClass('loading_icon');
		$.ajax({
			type: 'POST',
			url: 'ajax/update_object.php',
			data: {'object': 'photo', 'id': id, 'values': {'visible': state}, 'session_id': '{/literal}{$smarty.session.id}{literal}'},
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
	
	// Подтверждение удаления
	$("form").submit(function() {
		if($('select[name="action"]').val()=='delete' && !confirm('Подтвердите удаление'))
			return false;	
	});
});

</script>
{/literal}