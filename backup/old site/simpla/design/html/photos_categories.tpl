{* Вкладки *}
{capture name=tabs}
	{if in_array('blog', $manager->permissions)}<li><a href="index.php?module=BlogAdmin">Блог</a></li>{/if} 	
    <li><a href="index.php?module=PhotosAdmin">Фотографии</a></li>
	<li class="active"><a href="index.php?module=PhotosCategoriesAdmin">Альбомы фотографий</a></li>
{/capture}

{* Title *}
{$meta_title='Фотоальбомы' scope=parent}

{* Заголовок *}
<div id="header">
	<h1>Фотоальбомы</h1>
	<a class="add" href="{url module=PhotosCategoryAdmin return=$smarty.server.REQUEST_URI}">Добавить альбом</a>
</div>	
<!-- Заголовок (The End) -->

{if $categories}
<div id="main_list" class="categories">

	<form id="list_form" method="post">
	<input type="hidden" name="session_id" value="{$smarty.session.id}">
		
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
					<div class="image cell">
						{if $category->image}
							<a href="{url module=PhotosCategoryAdmin id=$category->id return=$smarty.server.REQUEST_URI}">
								<img src="../{$config->photos_categories_images_dir}{$category->image}" width="35" />
							</a>
						{/if}
					</div>
					<div class="name cell">
						<a href="{url module=PhotosCategoryAdmin id=$category->id return=$smarty.server.REQUEST_URI}">{$category->name|escape}</a> 	 			
					</div>
					<div class="icons cell">
						<a class="preview" title="Предпросмотр в новом окне" href="../photos/{$category->url}" target="_blank"></a>				
						<a class="enable" title="Активна" href="#"></a>
						<a class="delete" title="Удалить" href="#"></a>
					</div>
					<div class="clear"></div>
				</div>
				{categories_tree categories=$category->subcategories level=$level+1}
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
Нет альбомов
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
			data: {'object': 'photos_category', 'id': id, 'values': {'visible': state}, 'session_id': '{/literal}{$smarty.session.id}{literal}'},
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