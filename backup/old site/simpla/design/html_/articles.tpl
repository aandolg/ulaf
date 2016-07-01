{* Вкладки *}
{capture name=tabs}
    <li><a href="index.php?module=BlogAdmin">Блог</a></li>
    {if in_array('articles', $manager->permissions)}<li class="active"><a href="{url module=ArticlesAdmin id=null page=null}">Статьи</a></li>
	<li><a href="{url module=ArticleCategoriesAdmin id=null page=null}">Категории статей</a></li>{/if}
{/capture}

{* Title *}
{$meta_title='Статьи' scope=parent}

{* Поиск *}
{if $articles || $keyword}
<form method="get">
<div id="search">
	<input type="hidden" name="module" value='ArticlesAdmin'>
	<input class="search" type="text" name="keyword" value="{$keyword|escape}" />
	<input class="search_button" type="submit" value=""/>
</div>
</form>
{/if}
		
{* Заголовок *}
<div id="header">
	{if $keyword && $articles_count}
	<h1>{$articles_count|plural:'Нашлась':'Нашлись':'Нашлись'} {$articles_count} {$articles_count|plural:'статья':'статье':'статьи'}</h1>
	{elseif $articles_count}
	<h1>{$articles_count} {$articles_count|plural:'статья':'статье':'статьи'}</h1>
	{else}
	<h1>Нет статей</h1>
	{/if}
	<a class="add" href="{url module=ArticleAdmin return=$smarty.server.REQUEST_URI}">Добавить статью</a>
</div>	

{if $articles}
<div id="main_list">
	
	<!-- Листалка страниц -->
	{include file='pagination.tpl'}	
	<!-- Листалка страниц (The End) -->

	<form id="form_list" method="post">
	<input type="hidden" name="session_id" value="{$smarty.session.id}">
	
		<div id="list">
			{foreach $articles as $article}
			<div class="{if !$article->visible}invisible{/if} row">
				<input type="hidden" name="positions[{$article->id}]" value="{$article->position}">
		 		<div class="checkbox cell">
					<input type="checkbox" name="check[]" value="{$article->id}" />				
				</div>
				<div class="name cell">		
					<a href="{url module=ArticleAdmin id=$article->id return=$smarty.server.REQUEST_URI}">{$article->name|escape}</a>
					<br>
					{$article->date|date} → {$article->category}
				</div>
				<div class="icons cell">
					<a class="preview" title="Предпросмотр в новом окне" href="../article/{$article->url}" target="_blank"></a>
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
        <li category_id="{$c->id}" {if $category->id == $c->id}class="selected"{else}class="droppable category"{/if}><a href='{url keyword=null brand_id=null page=null category_id={$c->id}}'>{$c->name}</a></li>
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
		$('#list input[type="checkbox"][name*="check"]').attr('checked', 1-$('#list input[type="checkbox"][name*="check"]').attr('checked'));
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
			data: {'object': 'article', 'id': id, 'values': {'visible': state}, 'session_id': '{/literal}{$smarty.session.id}{literal}'},
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